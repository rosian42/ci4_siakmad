<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class MapelModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_mapel';
    protected $primaryKey       = 'id_mapel';
    //protected $useAutoIncrement = true;
    //protected $insertID         = 0;
    //protected $returnType       = 'array';
    //protected $useSoftDeletes   = false;
    //protected $protectFields    = true;
    protected $allowedFields    = ['kd_mapel', 'nm_mapel'];

    // Dates
    //protected $useTimestamps = false;
    //protected $dateFormat    = 'datetime';
    //protected $createdField  = 'created_at';
    //protected $updatedField  = 'updated_at';
    //protected $deletedField  = 'deleted_at';

    // Validation
    /*protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];*/

    protected $column_order = ['kd_mapel', 'nm_mapel'];
    protected $column_search = ['nm_mapel'];
    protected $order = ['kd_mapel' => 'ASC'];
    protected $request;
    protected $db;
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
            $data[$key]=bersihkan_html($value);
        }


        if(isset($data['id_mapel'])){
            $aksi = $builder->save($data);
            $id = $data['id_mapel'];
        }else{
            $aksi = $builder->save($data);
            $id = $builder->getInsertID();
        }

        if($aksi){
            return $id;
        }else{
            return false;
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
        if($builder->delete()){
            return true;
        }else{
            return false;
        }

    }
}
