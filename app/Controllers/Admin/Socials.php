<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\PostModel;
class Socials extends BaseController
{
	function __construct()
    {
    	
    	$this->validation = \Config\Services::validation();
    	$this->m_post = new PostModel();
    	helper('global_helper');
    	//untuk konfigurasi internal
    	$this->halaman_controller = "socials";
    	$this->halaman_label = "Social Media";
    }

	public function index()
	{
		$data = [];
		if($this->request->getMethod() == 'post'){
			/** Kombinasi Nama dan Value 
			 * konfigurasi_name = set_socials_twitter
			 * konfigurasi_value = link
			*/
			$konfigurasi_name = "set_socials_twitter";
			$dataSimpan = [
				'konfigurasi_value' => $this->request->getVar('set_socials_twitter')
			];
			konfigurasi_set($konfigurasi_name, $dataSimpan);

			$konfigurasi_name = "set_socials_fb";
			$dataSimpan = [
				'konfigurasi_value' => $this->request->getVar('set_socials_fb')
			];
			konfigurasi_set($konfigurasi_name, $dataSimpan);

			$konfigurasi_name = "set_socials_github";
			$dataSimpan = [
				'konfigurasi_value' => $this->request->getVar('set_socials_github')
			];
			konfigurasi_set($konfigurasi_name, $dataSimpan);

			session()->setFlashdata('success', 'Data berhasil disimpan');
			return redirect()->to('admin/'.$this->halaman_controller);
		}
		$konfigurasi_name = "set_socials_twitter";
		$data['set_socials_twitter'] = konfigurasi_get($konfigurasi_name)['konfigurasi_value'];

		$konfigurasi_name = "set_socials_fb";
		$data['set_socials_fb'] = konfigurasi_get($konfigurasi_name)['konfigurasi_value'];

		$konfigurasi_name = "set_socials_github";
		$data['set_socials_github'] = konfigurasi_get($konfigurasi_name)['konfigurasi_value'];

		$data['templateJudul'] = $this->halaman_label;
		echo view('admin/v_templateheader', $data);
		echo view('admin/v_socials', $data);
		echo view('admin/v_templatefooter', $data);
	}

}
?>