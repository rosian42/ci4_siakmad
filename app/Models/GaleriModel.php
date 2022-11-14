<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class GaleriModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_galeri';
    protected $primaryKey       = 'galeri_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['galeri_name', 'galeri_description', 'galeri_slug', 'galeri_cover'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $column_order = ['galeri_id'];
    protected $column_search = ['galeri_name'];
    protected $order = ['galeri_id' => 'desc'];
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

    function setTitleSeo($title){
        $builder = $this->table($this->table);
        $url = strip_tags($title);
        $url = preg_replace('/[^A-Za-z0-9]/'," ", $url);
        $url = trim($url);
        $url = preg_replace('/[^A-Za-z0-9]/',"-", $url);
        $url = strtolower($url);

        $builder->where('galeri_name', $title);
        $jumlah = $builder->countAllResults();
        if($jumlah > 0){
            $jumlah = $jumlah + 1;
            return $url."-".$jumlah;
        }

        return $url;
    }

    private function getDatatablesQuery()
    {
        $this->dt->where('deleted_at', null);
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

        if(isset($data['galeri_id'])){
            $aksi = $builder->save($data);
            $id = $data['galeri_id'];
        }else{
            $data['galeri_slug'] = $this->setTitleSeo($data['galeri_name']);
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
        if ($builder->delete()) {
            return true;
        } else {
            return false;
        }
    }

    function getGaleriBySlug($galeri_slug)
    {
        $builder = $this->table($this->table);
        $builder->where('galeri_slug', $galeri_slug);
        $query = $builder->get();
        return $query->getRowArray();
    }
}
