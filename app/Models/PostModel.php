<?php
namespace App\Models;
use CodeIgniter\Model;
class PostModel extends Model
{
	protected $table = "posts";
	protected $primaryKey = "post_id";
	protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
	protected $allowedFields = ['username', 'post_title', 'event_date','post_title_seo', 'post_status', 'post_type', 'post_thumbnail', 'post_description', 'post_content', 'post_keyword'];

	// Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

	function setTitleSeo($title){
		$builder = $this->table($this->table);
		$url = strip_tags($title);
		$url = preg_replace('/[^A-Za-z0-9]/'," ", $url);
		$url = trim($url);
		$url = preg_replace('/[^A-Za-z0-9]/',"-", $url);
		$url = strtolower($url);

		$builder->where('post_title', $title);
		$jumlah = $builder->countAllResults();
		if($jumlah > 0){
			$jumlah = $jumlah + 1;
			return $url."-".$jumlah;
		}

		return $url;
	}

	function insertPost($data, $post_type)
	{
		helper('global_helper');
		$builder = $this->table($this->table);
		$data['post_type'] = $post_type;
		/*
		foreach ($data as $key => $value) {
			$data[$key]=bersihkan_html($value);
		}*/
		if(isset($data['post_id'])){
			$aksi = $builder->save($data);
			$id = $data['post_id'];
		}else{
			/**
			 * syarat title_seo = hanya huruf dan angka
			 * 
			 * title = Hello World
			 * title_seo = hello-world
			 * 
			 * title = Hello World 
			 * title_seo = hello-word-2
				
			*/

			$data['post_title_seo'] = $this->setTitleSeo($data['post_title']);
			$aksi = $builder->save($data);
			$id = $builder->getInsertID();
		}

		if($aksi){
			return $id;
		}else{
			return false;
		}

	}

	function listPost($post_type, $jumlah_baris, $kata_kunci = null, $group_dataset = null){
		$builder = $this->table($this->table);
		//$kata_kunci = Hello World
		$arr_katakunci = explode(" ", $kata_kunci);
		// query = "select * from post where post_type='artikel' and (post_title like '%hello%' or post_description like '%hello%')";
		$builder->groupStart();
		for($x=0; $x<count($arr_katakunci); $x++){
			$builder->orLike('post_title', $arr_katakunci[$x]);
			$builder->orLike('post_description', $arr_katakunci[$x]);
			$builder->orLike('post_content', $arr_katakunci[$x]);
		}
		$builder->groupEnd();
		$builder->where('post_type', $post_type);
		$builder->where('deleted_at', null);
		$builder->orderBy('post_time', 'desc');
		$data['record'] = $builder->paginate($jumlah_baris, $group_dataset);
		$data['pager'] = $builder->pager;
		return $data;
	}

	function getPost($post_id)
	{
		//dd($post_id);
		$builder = $this->table($this->table);
		$builder->where('post_id', $post_id);
		$query = $builder->get();
		return $query->getRowArray();
	}

	function hapus($post_id)
	{
		$builder = $this->table($this->table);
		$builder->where('post_id', $post_id);
		if($builder->delete()){
			return true;
		}else{
			return false;
		}

	}

	function getPostBySeo($post_title_seo)
	{
		$builder = $this->table($this->table);
		$builder->where('post_title_seo', $post_title_seo);
		$query = $builder->get();
		return $query->getRowArray();
	}

}
