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
		if($this->request->getVar('aksi')=='hapus' && $this->request->getVar('post_id')){
			$dataPost = $this->m_post->getPost($this->request->getVar('post_id'));
			if($dataPost['post_id']){ #memastikan ada data
				@unlink(LOKASI_UPLOAD."/".$dataPost['post_thumbnail']);
				$aksi = $this->m_post->hapus($this->request->getVar('post_id'));
				if($aksi == true){
					session()->setFlashdata('success', 'Artikel telah dihapus');
				}else{
					session()->setFlashdata('warning', ['Artikel gagal dihapus']);
				}
			}
			return redirect()->to("admin/".$this->halaman_controller);
		}
		$data['templateJudul'] = 'Halaman '.$this->halaman_label;
		$post_type = $this->halaman_controller;
		$jumlah_baris = 3;
		$kata_kunci =$this->request->getVar('kata_kunci');
		$group_dataset = 'dt';
		$hasil = $this->m_post->listPost($post_type, $jumlah_baris, $kata_kunci, $group_dataset);
		$data['record'] = $hasil['record'];
		$data['pager'] = $hasil['pager'];
		$data['kata_kunci'] = $kata_kunci;
		$currentPage = $this->request->getVar('page_dt');
		$data['nomor'] = nomor($currentPage, $jumlah_baris);
		//echo view('admin/v_templateheader', $data);
		return view('admin/v_artikel', $data);
		//echo view('admin/v_templatefooter', $data);
	}

	public function tambah()
	{
		$data = [];
		if($this->request->getMethod()=="post"){
			$data = $this->request->getVar(); //Setiap yang diinput akan dikembalikan ke view
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
				session()->setFlashdata('warning', $this->validation->getErrors());
			}else{
				$post_thumbnail = "";
				if($file->getName()){
					$post_thumbnail = $file->getRandomName();
				}
				$record = [
					'username' => session()->get('akun_username'),
					'post_title' => $this->request->getVar('post_title'),
					'post_status' => $this->request->getVar('post_status'),
					'post_thumbnail' => $post_thumbnail,
					'post_description' => $this->request->getVar('post_description'),
					'post_content' => $this->request->getVar('post_content')
				];
				$post_type = $this->halaman_controller;
				$aksi = $this->m_post->insertPost($record, $post_type );
				if($aksi != false){
					$page_id = $aksi;
					if($file->getName()){
						//$lokasi_direktori = "upload";
						$lokasi_direktori = LOKASI_UPLOAD;
						$file->move($lokasi_direktori, $post_thumbnail);
					}
					session()->setFlashdata('success', 'Artikel berhasil disimpan');
					return redirect()->to('admin/'.$this->halaman_controller.'/edit/'.$page_id);
				}else{
					session()->setFlashdata('warning', ['Gagal menyimpan artikel']);
					return redirect()->to('admin/'.$this->halaman_controller.'/tambah');
				}
			}
		}
		$data['templateJudul'] = 'Tambah '. $this->halaman_label;
		$data['templateBreadcrumb'] = [$this->halaman_controller, 'tambah'] ;
		//echo view('admin/v_templateheader', $data);
		return view('admin/v_tambahartikel', $data);
		//echo view('admin/v_templatefooter', $data);
	}

	function edit($post_id)
	{
		$data = [];
		$dataPost = $this->m_post->getPost($post_id);
		if(empty($dataPost)){
			return redirect()->to('admin/'.$this->halaman_controller);
		}
		$data = $dataPost;
		if($this->request->getMethod()=="post"){
			$data = $this->request->getVar(); //Setiap yang diinput akan dikembalikan ke view
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
				session()->setFlashdata('warning', $this->validation->getErrors());
			}else{
				$post_thumbnail = $dataPost['post_thumbnail'];
				if($file->getName()){
					$post_thumbnail = $file->getRandomName();
				}
				$record = [
					'username' => session()->get('akun_username'),
					'post_title' => $this->request->getVar('post_title'),
					'post_status' => $this->request->getVar('post_status'),
					'post_thumbnail' => $post_thumbnail,
					'post_description' => $this->request->getVar('post_description'),
					'post_content' => $this->request->getVar('post_content'),
					'post_id' => $post_id
				];
				$post_type = $this->halaman_controller;
				$aksi = $this->m_post->insertPost($record, $post_type);
				if($aksi != false){
					$page_id = $aksi;
					if($file->getName()){
						if($dataPost['post_thumbnail']){
							@unlink(LOKASI_UPLOAD."/".$dataPost['post_thumbnail']);
						}
						//$lokasi_direktori = "upload";
						$lokasi_direktori = LOKASI_UPLOAD;
						$file->move($lokasi_direktori, $post_thumbnail);
					}
					session()->setFlashdata('success', 'Artikel berhasil diupdate');
					return redirect()->to('admin/'.$this->halaman_controller.'/edit/'.$post_id);
				}else{
					session()->setFlashdata('warning', ['Gagal update artikel']);
					return redirect()->to('admin/'.$this->halaman_controller.'/edit/'.$post_id);
				}
			}
		}
		$data['templateJudul'] = 'Edit '.$this->halaman_label;
		echo view('admin/v_templateheader', $data);
		echo view('admin/v_tambahartikel', $data);
		echo view('admin/v_templatefooter', $data);
	}


}
?>