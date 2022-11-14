<?php

namespace App\Models;

use CodeIgniter\Model;

class ServersideModel extends Model
{
    protected $dt;
    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    protected function _get_datatables_query($table, $column_order, $column_search, $order)
    {
        $this->dt = $this->db->table($table);
        //jika ingin join formatnya adalah sebagai berikut :
        //$this->builder->join('tabel_lain','tabel_lain.kolom_yang_sama = pengguna.kolom_yang_sama','left');
        //end Join
        $i = 0;
        foreach ($column_search as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->dt->groupStart();
                    $this->dt->like($item, $_POST['search']['value']);
                } else {
                    $this->dt->orLike($item, $_POST['search']['value']);
                }
                if (count($column_search) - 1 == $i)
                $this->dt->groupEnd();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->dt->orderBy($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($order)) {
            $order = $order;
            $this->dt->orderBy(key($order), $order[key($order)]);
        }
    }  

    public function get_datatables($table, $column_order, $column_search, $order, $data = '')
    {
        $this->_get_datatables_query($table, $column_order, $column_search, $order);
        if ($_POST['length'] != -1)
            $this->dt->limit($_POST['length'], $_POST['start']);
        if ($data) {
            $this->dt->where($data);
        }
        $query = $this->dt->get();
        return $query->getResult();
    }

    public function count_filtered($table, $column_order, $column_search, $order, $data = '')
    {
        $this->_get_datatables_query($table, $column_order, $column_search, $order);
        if ($data) {
            $this->dt->where($data);
        }
        $this->dt->get();
        return $this->dt->countAll();
    }

    public function count_all($table, $data = '')
    {
        if ($data) {
            $this->dt->where($data);
        }
        $this->dt->from($table);

        return $this->dt->countAll();
    }
}