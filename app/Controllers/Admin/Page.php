<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\PostModel;
class Page extends BaseController
{
	function __construct()
    {
    	
    	$this->validation = \Config\Services::validation();
    	$this->m_post = new PostModel();
    	helper('global_helper');
    	//untuk konfigurasi internal
    	$this->halaman_controller = "page";
    	$this->halaman_label = "Page";
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
						// Masukkan Konfigurasi Halaman
						// kalau dimaksud sebagai halaman depan => tabel konfigurasi kombinasi name = set_halaman_depan value = $page_id
						$set_halaman_depan = $this->request->getVar('set_halaman_depan');
						$set_halaman_kontak = $this->request->getVar('set_halaman_kontak');
						$page_id_depan = '';
						$page_id_kontak ='';
						/** set halaman depan */
						$konfigurasi_name = 'set_halaman_depan';
						$dataGet = konfigurasi_get($konfigurasi_name);
						if($set_halaman_depan == '1'){
							$page_id_depan = $page_id;
						}
						if($dataGet['konfigurasi_value'] == $page_id && $set_halaman_depan != 1){
							$page_id_depan = '';
						}
						$dataSet = [
							'konfigurasi_value' => $page_id_depan,
							'konfigurasi_group' => 'pengaturan_website',
                        	'konfigurasi_default' => null
						];
						konfigurasi_set($konfigurasi_name, $dataSet);

						/** set halaman kontak */
						$konfigurasi_name = 'set_halaman_kontak';
						$dataGet = konfigurasi_get($konfigurasi_name);

						if($set_halaman_kontak == '1'){
							$page_id_kontak = $page_id;
						}
						if($dataGet['konfigurasi_value'] == $page_id && $set_halaman_kontak != 1){
							$page_id_kontak = '';
						}
						$dataSet = [
							'konfigurasi_value' => $page_id_kontak,
							'konfigurasi_group' => 'pengaturan_website',
                        	'konfigurasi_default' => null
						];
						konfigurasi_set($konfigurasi_name, $dataSet);
						/** ------ */
						
						return json_encode(array("msg" => "success", "pesan" => "Data berhasil disimpan.", "post_id" => $aksi));
					}else{
						return json_encode(array("msg" => "error", "pesan" => "Data gagal disimpan."));
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
						// Masukkan Konfigurasi Halaman
						// kalau dimaksud sebagai halaman depan => tabel konfigurasi kombinasi name = set_halaman_depan value = $page_id
						$set_halaman_depan = $this->request->getVar('set_halaman_depan');
						$set_halaman_kontak = $this->request->getVar('set_halaman_kontak');
						
						/** set halaman depan */
						$konfigurasi_name = 'set_halaman_depan';
						$dataGet = konfigurasi_get($konfigurasi_name);
						//dd($dataGet);
						if($set_halaman_depan == '1'){
							$page_id_depan = $page_id;
						}
						if($dataGet['konfigurasi_value'] == $page_id && $set_halaman_depan != 1){
							$page_id_depan = '';
						}
						if (isset($page_id_depan)) {
							$dataSet = [
								'konfigurasi_value' => $page_id_depan,
								'konfigurasi_group' => 'pengaturan_website',
                        		'konfigurasi_default' => null
							];
							konfigurasi_set($konfigurasi_name, $dataSet);
							
						}

						/** set halaman kontak */
						$konfigurasi_name = 'set_halaman_kontak';
						$dataGet = konfigurasi_get($konfigurasi_name);

						if($set_halaman_kontak == '1'){
							$page_id_kontak = $page_id;
						}
						if($dataGet['konfigurasi_value'] == $page_id && $set_halaman_kontak != 1){
							$page_id_kontak = '';
						}

						if (isset($page_id_kontak)) {
							
							$dataSet = [
								'konfigurasi_value' => $page_id_kontak,
								'konfigurasi_group' => 'pengaturan_website',
                        		'konfigurasi_default' => null
							];
							konfigurasi_set($konfigurasi_name, $dataSet);
						}
						/** ------ */
						return json_encode(array("msg" => "success", "pesan" => "Data berhasil disimpan.", "post_id" => $aksi));
					}else{
						return json_encode(array("msg" => "error", "pesan" => "Data gagal disimpan."));
					}
				}
			}
		}
		if(isset($post_id)){
            $data = $this->m_post->getPost($post_id);
            /** ambil dari konfigurasi */
			$dataGet = konfigurasi_get('set_halaman_depan');
			if($dataGet['konfigurasi_value'] == $post_id){
				$data['set_halaman_depan'] = 1;
			}
			$dataGet = konfigurasi_get('set_halaman_kontak');
			if($dataGet['konfigurasi_value'] == $post_id){
				$data['set_halaman_kontak'] = 1;
			}
        }
        $data['templateJudul'] = 'Tambah '. $this->halaman_label;
        $data['templateBreadcrumb'] = [$this->halaman_controller, 'tambah'] ;
        $data['controller'] = $this->halaman_controller;
        $data['metode']    = 'tambah';
        return view("admin/$this->halaman_controller/".$data['metode'], $data);
		
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
					$page_id = $post_id;
					// Masukkan Konfigurasi Halaman
					// kalau dimaksud sebagai halaman depan => tabel konfigurasi kombinasi name = set_halaman_depan value = $page_id
					$set_halaman_depan = $this->request->getVar('set_halaman_depan');
					$set_halaman_kontak = $this->request->getVar('set_halaman_kontak');
					
					/** set halaman depan */
					$konfigurasi_name = 'set_halaman_depan';
					$dataGet = konfigurasi_get($konfigurasi_name);
					//dd($dataGet);
					if($set_halaman_depan == '1'){
						$page_id_depan = $page_id;
					}
					if($dataGet['konfigurasi_value'] == $page_id && $set_halaman_depan != 1){
						$page_id_depan = '';
					}
					if (isset($page_id_depan)) {
						$dataSet = [
							'konfigurasi_value' => $page_id_depan
						];
						konfigurasi_set($konfigurasi_name, $dataSet);
						
					}

					/** set halaman kontak */
					$konfigurasi_name = 'set_halaman_kontak';
					$dataGet = konfigurasi_get($konfigurasi_name);

					if($set_halaman_kontak == '1'){
						$page_id_kontak = $page_id;
					}
					if($dataGet['konfigurasi_value'] == $page_id && $set_halaman_kontak != 1){
						$page_id_kontak = '';
					}

					if (isset($page_id_kontak)) {
						
						$dataSet = [
							'konfigurasi_value' => $page_id_kontak
						];
						konfigurasi_set($konfigurasi_name, $dataSet);
					}
					/** ------ */
					if($file->getName()){
						if($dataPost['post_thumbnail']){
							@unlink(LOKASI_UPLOAD."/".$dataPost['post_thumbnail']);
						}
						//$lokasi_direktori = "upload";
						$lokasi_direktori = LOKASI_UPLOAD;
						$file->move($lokasi_direktori, $post_thumbnail);
					}
					session()->setFlashdata('success', 'Page berhasil diupdate');
					return redirect()->to('admin/'.$this->halaman_controller.'/edit/'.$post_id);
				}else{
					session()->setFlashdata('warning', ['Gagal update artikel']);
					return redirect()->to('admin/'.$this->halaman_controller.'/edit/'.$post_id);
				}
			}
		}

		/** ambil dari konfigurasi */
		$dataGet = konfigurasi_get('set_halaman_depan');
		if($dataGet['konfigurasi_value'] == $post_id){
			$data['set_halaman_depan'] = 1;
		}
		$dataGet = konfigurasi_get('set_halaman_kontak');
		if($dataGet['konfigurasi_value'] == $post_id){
			$data['set_halaman_kontak'] = 1;
		}
		$data['templateJudul'] = 'Edit '.$this->halaman_label;
		//echo view('admin/v_templateheader', $data);
		return view('admin/v_tambahpage', $data);
		//echo view('admin/v_templatefooter', $data);
	}
}
?>