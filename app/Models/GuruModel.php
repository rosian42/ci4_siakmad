<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

use Michalsn\Uuid\UuidModel;

class GuruModel extends Model
{
    
    //protected $uuidFields = ['id_guru'];
    protected $DBGroup          = 'default';
    protected $table            = 'tb_guru';
    protected $primaryKey       = 'id_guru';
    /*protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;*/
    protected $allowedFields    = ['id_guru', 'nip', 'nama_lengkap', 'tmp_lahir', 'tgl_lahir', 'alamat', 'no_telp', 'email', 'foto', 'id_mapel'];

    /*
    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
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
    protected $afterDelete    = [];
    */

    protected $column_order = ['nip', 'nama_lengkap'];
    protected $column_search = ['nip', 'nama_lengkap'];
    protected $order = ['nip' => 'asc'];
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

        if(isset($data['id_guru'])){
            $aksi = $builder->replace($data);
            $id = $data['id_guru'];
        }else{
            $builder->set('id_guru', 'UUID()', FALSE);
            $aksi = $builder->insert($data);
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
