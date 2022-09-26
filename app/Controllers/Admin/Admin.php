<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Admin extends BaseController
{
    function __construct()
    {
    	$this->m_admin = new AdminModel();
    	$this->validation = \Config\Services::validation();
    	helper('cookie');
    	helper('global_helper');
    }
    public function login()
    {

    	if(get_cookie("cookie_username") && get_cookie("cookie_password")){
    		$username = get_cookie("cookie_username");
    		$password = get_cookie("cookie_password");

    		$dataAkun = $this->m_admin->getData($username);
    		if($password != $dataAkun['password']){
    			$err[] = "Password salah atau username tidak ditemukan";
    			session()->setFlashdata("username", $username);
    			session()->setFlashdata("warning", $err);

    			delete_cookie('cookie_username');
    			delete_cookie('cookie_password');
    			return redirect()->to("admin/login");
    		}
    		$akun =[
    			'akun_username' => $dataAkun['username'],
    			'akun_nama_lengkap' => $dataAkun['nama_lengkap'],
    			'akun_email' => $dataAkun['email']
    		];
    		session()->set($akun);
    		return redirect()->to('admin/sukses');
    	}
    	if($this->request->getMethod() == 'post'){
    		$rules = [
    			'username' => [
    				'rules' => 'required',
    				'errors' =>[
    					'required' => 'Username harus diisi'
    				]
    			],
    			'password' => [
    				'rules' => 'required',
    				'errors' =>[
    					'required' => 'Password harus diisi'
    				]	
    			]
    		];
    		if (!$this->validate($rules)) {
    			session()->setFlashdata("warning", $this->validation->getErrors());
    			return redirect()->to("admin/login");
    		}

    		$username = $this->request->getVar('username');
    		$password = $this->request->getVar('password');
    		$remember_me = $this->request->getVar('remember_me');

    		$dataAkun = $this->m_admin->getData($username);
    		if(!password_verify($password, $dataAkun['password'])){
    			$err[] = 'Password salah atau username tidak ditemukan';
    			session()->setFlashdata("username", $username);
    			session()->setFlashdata("warning", $err);
    			return redirect()->to("admin/login");
    		}

    		if($remember_me == 1){
    			set_cookie("cookie_username", $username, 3600*24*30);
    			set_cookie("cookie_password", $dataAkun['password'], 3600*24*30);
    		}

    		$akun = [
    			'akun_username' => $dataAkun['username'],
    			'akun_nama_lengkap' => $dataAkun['nama_lengkap'],
    			'akun_email' => $dataAkun['email']
    		];
    		session()->set($akun);
    		return redirect()->to('admin/sukses')->withCookies();
    	}
        echo view('admin/v_login');
    }

    public function sukses()
    {
    	return redirect()->to('admin/dashboard');
    	//print_r(session()->get());
    	//echo "isian cookie username".get_cookie('cookie_username')." dan password ".get_cookie('cookie_password');
    }

    public function logout()
    {
    	delete_cookie('cookie_username');
    	delete_cookie('cookie_password');
    	session()->destroy();
    	if(session()->get('akun_username') != ''){
    		session()->setFlashdata('success', 'Anda telah keluar');
    	}
    	//echo view('admin/v_login');
    	return redirect()->to('admin/login')->withCookies();
    }

    public function lupapassword()
    {
    	$err = [];
    	if($this->request->getMethod() == 'post'){
    		$username = $this->request->getVar('username');
    		if($username == ''){
    			$err[]= 'Silahkan masukkan Username atau Email Anda';
    		}
    		if(empty($err)){
    			$data = $this->m_admin->getData($username);
    			if(empty($data)){
    				$err[] = "Akun anda tidak ditemukan";
    			}
    		}
    		if(empty($err)){
    			$email = $data['email'];
    			$token= md5(date('ymdhis'));
    			$link = site_url('admin/resetpassword/?email=').$email."&token=".$token;
    			$attachment ='';
    			$to = $email;
    			$tittle = "Reset Password";
    			$message = "Berikut ini adalah link untuk reset password Anda.";
    			$message .="Silahkan klik link berikut ini ".$link;
    			kirim_email($attachment, $to, $tittle, $message);

    			$dataUpdate = [
    				'email' => $email,
    				'token' => $token
    			];
    			$this->m_admin->updateData($dataUpdate);
    			session()->setFlashdata("success", "Email untuk reset password terkirim ke email anda");
    		}
    		if($err){
    			session()->setFlashdata("username",$username);
    			session()->setFlashdata("warning",$err);
    		}
    		return redirect()->to('admin/lupapassword');
    	}
    	echo view('admin/v_lupapassword');
    }

    public function resetpassword()
    {
    	$err = [];
    	$email = $this->request->getVar('email');
    	$token = $this->request->getVar('token');
    	if($email != '' && $token != ''){
    		$dataAkun	= $this->m_admin->getData($email);
    		if($dataAkun['token'] != $token){
    			$err[] = "Token tidak valid";
    		}
    	}else{
    		$err[] = "Parameter yang dikirim tidak valid";
    	}

    	if($err){
    		session()->setFlashdata('warning',$err);
    	}

    	if($this->request->getMethod() == 'post'){
    		$aturan = [
    			'password' => [
    				'rules' => 'required|min_length[8]',
    			    'errors' => [
    			    	'required' => 'Password harus diisi',
    			    	'min_length' => 'Password kurang dari 8 karakter'
    			    ]
    			],
    			'konfirmasi_password' => [
    				'rules' => 'required|min_length[8]|matches[password]',
    			    'errors' => [
    			    	'required' => 'Konfirmasi Password harus diisi',
    			    	'min_length' => 'KonfirmasiPassword kurang dari 8 karakter',
    			    	'matches' => 'Konfirmasi password tidak sesuai dengan password yang diisikan'
    			    ]
    			]
    		];
    		if(!$this->validate($aturan)){
    			session()->setFlashdata('warning',$this->validation->getErrors());
    		}else{
    			$dataUpdate = [
    				'email' => $email,
    				'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
    				'token' => null
    			];
    			$this->m_admin->updateData($dataUpdate);
    			delete_cookie('cookie_username');
    			delete_cookie('cookie_password');
    			session()->setFlashdata('success', 'Password berhasil diupdate silahkan login kembali');
    			return redirect()->to('admin/login')->withCookies();
    		}
    	}
    	echo view('admin/v_resetpassword');
    }
}
