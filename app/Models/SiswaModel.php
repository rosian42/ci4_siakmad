<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class SiswaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_siswa';
    protected $primaryKey       = 'id_siswa';
    
    protected $protectFields    = false;
    protected $allowedFields    = [];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $column_order = ['th_masuk', 'nisn', 'nama_siswa'];
    protected $column_search = ['nisn', 'nama_siswa'];
    protected $order = ['th_masuk' => 'asc'];
    protected $request;
    //protected $db;
    protected $dt;

    public function __construct(RequestInterface $request)
    {
        parent::__construct();
        //$this->db = db_connect();
        $this->request = $request;
        $this->dt = $this->table($this->table);
    }

    private function getDatatablesQuery()
    {
        $this->dt->select('tb_siswa.id_siswa, tb_siswa.th_masuk, tb_siswa.nama_siswa, tb_siswa.nisn,
                            tb_siswa.tmp_lahir, tb_siswa.tgl_lahir, tb_siswa.foto_siswa, status.opt_val as stat_pd, jns_tinggal.opt_val as jns_tinggal
                            ');
        $this->dt->join('tb_option as status','status.opt_id = tb_siswa.stat_pd AND status.opt_group = "status_siswa"','left');
        $this->dt->join('tb_option as jns_tinggal','jns_tinggal.opt_id = tb_siswa.jns_tinggal AND jns_tinggal.opt_group = "jenis_tinggal"','left');
        $i = 0;
        foreach ($this->column_search as $item) {
            if ($this->request->getPost('search')['value']) {
                if ($i === 0) {
                    $this->dt->groupStart();
                    $this->dt->like($item, $this->request->getPost('search')['value']);
                } else {
                    $this->dt->orLike($item, $this->request->getPost('search')['value']);
                }
                if (count($this->column_search) - 1 == $i)
                    $this->dt->groupEnd();
            }
            $i++;
        }

        if ($this->request->getPost('order')) {
            $this->dt->orderBy($this->column_order[$this->request->getPost('order')['0']['column']], $this->request->getPost('order')['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->dt->orderBy(key($order), $order[key($order)]);
        }
    }

    public function getDatatables()
    {
        $this->getDatatablesQuery();
        if ($this->request->getPost('length') != -1)
            $this->dt->limit($this->request->getPost('length'), $this->request->getPost('start'));
        $query = $this->dt->get();
        return $query->getResult();
    }

    public function countFiltered()
    {
        $this->getDatatablesQuery();
        return $this->dt->countAllResults();
    }

    public function countAll()
    {
        $tbl_storage = $this->db->table($this->table);
        return $tbl_storage->countAllResults();
    }

    // untuk update / simpan data
    public function simpanData($data)
    {
        helper('global_helper');
        $builder = $this->table($this->table);
        foreach ($data as $key => $value) {
            $data[$key] = bersihkan_html($value);
        }

        if (isset($data['id_siswa'])) {
            $builder->replace($data);
            return true;
        } else {
            $builder->set('id_siswa', 'UUID()', FALSE);
            $builder->save($data);
            //$id = $builder->getInsertID();
            return true;
        }
        
    }

    //fungsi ambil data
    function getData($id)
    {
        $builder = $this->table($this->table);
        $builder->where($this->primaryKey, $id);
        $query = $builder->get();
        return $query->getRowArray();
    }

    function hapus($id)
    {
        $builder = $this->table($this->table);
        $builder->where($this->primaryKey, $id);
        if ($builder->delete()) {
            return true;
        } else {
            return false;
        }
    }
}
