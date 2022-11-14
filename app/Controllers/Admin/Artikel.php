<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\PostModel;
class Artikel extends BaseController
{
	function __construct()
    {
    	
    	$this->validation = \Config\Services::validation();
    	$this->m_post = new PostModel();
    	helper('global_helper');
    	//untuk konfigurasi internal
    	$this->halaman_controller = "artikel";
    	$this->halaman_label = "Artikel";
    }

	public function index()
	{
		$data = [];
		if ($this->request->getMethod(true)=='POST') {
			if($this->request->getVar('aksi')=='hapus' && $this->request->getVar('id')){
				$dataPost = $this->m_post->getPost($this->request->getVar('id'));
				if($dataPost['post_id']){ #memastikan ada data
					//@unlink($dataPost['post_thumbnail']);
					$aksi = $this->m_post->hapus($this->request->getVar('id'));
					if($aksi == true){
						return json_encode(array("status" => TRUE));
					}else{
						return json_encode(array("status" => false));
					}
				}
			}
		}
		$data['templateJudul'] = 'Halaman '.$this->halaman_label;
		$post_type = $this->halaman_controller;
		$jumlah_baris = 10;
		$kata_kunci =$this->request->getVar('kata_kunci');
		$group_dataset = 'dt';
		$hasil = $this->m_post->listPost($post_type, $jumlah_baris, $kata_kunci, $group_dataset);
		$data['record'] = $hasil['record'];
		$data['pager'] = $hasil['pager'];
		$data['kata_kunci'] = $kata_kunci;
		$currentPage = $this->request->getVar('page_dt');
		$data['nomor'] = nomor($currentPage, $jumlah_baris);
		$data['templateJudul'] = 'Halaman '.$this->halaman_label;
        $data['controller'] = $this->halaman_controller;
        $data['metode']    = 'index';
		return view("admin/$this->halaman_controller/".$data['metode'], $data);
	}

	public function tambah($post_id=null)
	{
		$data = [];
		if($this->request->getMethod()=="post"){
			if(empty($this->request->getVar('post_id'))){
				$aturan = [
					'post_title' => [
						'rules' => 'required',
						'errors' => [
							'required'=>'Judul harus diisi'
						]
					],
					'post_content' => [
						'rules' => 'required',
						'errors' => [
							'required'=>'Konten harus diisi'
						]
					],
					'post_thumbnail' => [
						'rules' => 'is_image[post_thumbnail]',
						'errors' => [
							'is_image' => 'Hanya gambar yang diperbolehkan untuk diupload'
						]
					]
				];
				$file = $this->request->getFile('post_thumbnail');

				if(!$this->validate($aturan)){
                    return json_encode(array("msg" => "invalid", "validation" => $this->validation->getErrors()));
					
				}else{
					$post_thumbnail = "";
					if($file->getName()){
						$nm_file = $file->getRandomName();
                        $path = 'upload/'.$this->halaman_controller;
                        $post_thumbnail = $path.'/'.$nm_file;
                        $file->move($path, $nm_file);
					}
					$record = [
						'username' => session()->get('akun_username'),
						'post_title' => $this->request->getVar('post_title'),
						'post_status' => $this->request->getVar('post_status'),
						'post_thumbnail' => $post_thumbnail,
						'post_description' => $this->request->getVar('post_description'),
						'post_content' => $this->request->getVar('post_content'),
						'post_keyword' => $this->request->getVar('post_keyword')
					];
					$post_type = $this->halaman_controller;
					$aksi = $this->m_post->insertPost($record, $post_type );
					if($aksi != false){
						$page_id = $aksi;
						
						
						return json_encode(array("msg" => "success", "pesan" => "Artikel berhasil disimpan.", "post_id" => $aksi));
					}else{
						return json_encode(array("msg" => "error", "pesan" => "Artikel gagal disimpan."));
					}
				}
			}else{
				$dataPost = $this->m_post->getPost($this->request->getVar('post_id'));
				$aturan = [
					'post_title' => [
						'rules' => 'required',
						'errors' => [
							'required'=>'Judul harus diisi'
						]
					],
					'post_content' => [
						'rules' => 'required',
						'errors' => [
							'required'=>'Konten harus diisi'
						]
					],
					'post_thumbnail' => [
						'rules' => 'is_image[post_thumbnail]',
						'errors' => [
							'is_image' => 'Hanya gambar yang diperbolehkan untuk diupload'
						]
					]
				];
				$file = $this->request->getFile('post_thumbnail');

				if(!$this->validate($aturan)){
					return json_encode(array("msg" => "invalid", "validation" => $this->validation->getErrors()));
				}else{
					$post_thumbnail = $dataPost['post_thumbnail'];
					if($file->getName()){

						$nm_file = $file->getRandomName();
                        $path = 'upload/'.$this->halaman_controller;
                        $post_thumbnail = $path.'/'.$nm_file;
                        $file->move($path, $nm_file);
                        if($dataPost['post_thumbnail']){
							@unlink($dataPost['post_thumbnail']);
						}
					}
					$record = [
						'username' => session()->get('akun_username'),
						'post_title' => $this->request->getVar('post_title'),
						'post_status' => $this->request->getVar('post_status'),
						'post_thumbnail' => $post_thumbnail,
						'post_description' => $this->request->getVar('post_description'),
						'post_content' => $this->request->getVar('post_content'),
						'post_keyword' => $this->request->getVar('post_keyword'),
						'post_id' => $dataPost['post_id']
					];
					$post_type = $this->halaman_controller;
					$aksi = $this->m_post->insertPost($record, $post_type);
					if($aksi != false){
						$page_id = $post_id;
						
						return json_encode(array("msg" => "success", "pesan" => "Artikel berhasil disimpan.", "post_id" => $aksi));
					}else{
						return json_encode(array("msg" => "error", "pesan" => "Data gagal disimpan."));
					}
				}
			}
		}
		if(isset($post_id)){
            $data = $this->m_post->getPost($post_id);
            $data['templateJudul'] = 'Edit '. $this->halaman_label;
        }else{
        	$data['templateJudul'] = 'Tambah '. $this->halaman_label;
        }
        
        $data['templateBreadcrumb'] = [$this->halaman_controller, 'tambah'] ;
        $data['controller'] = $this->halaman_controller;
        $data['label'] = $this->halaman_label;
        $data['metode']    = 'tambah';
        return view("admin/$this->halaman_controller/".$data['metode'], $data);
	}

	

}
?>