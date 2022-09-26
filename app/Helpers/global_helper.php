<?php
function kirim_email($attachment, $to, $tittle, $message)
{
	$email = \Config\Services::email();
	$email_pengirim = EMAIL_ALAMAT_PENGIRIM;
	$email_nama		= EMAIL_NAMA_PENGIRIM;

	$config['protocol']	= "smtp";
	$config['SMTPHost']	= "smtp.gmail.com";
	$config['SMTPUser']	= $email_pengirim;
	$config['SMTPPass']	= EMAIL_PASSWORD;
	$config['SMTPPort']	= 587;
	$config['SMTPCrypto']	= "tls";
	$config['mailtype']	= "html";

	$email->initialize($config);
	$email->setFrom($email_pengirim, $email_nama);
	$email->setTo($to);
	if($attachment){
		$email->attach($attachment);
	}
	$email->setSubject($tittle);
	$email->setMessage($message);

	if(!$email->send()){
		$data = $email->printDebugger(['headers']);
		print_r($data);
		return false;
	}else{
		return true;
	}

}
//fungsi untuk memberikan nomor urut di tabel paginasi
function nomor($currentPage, $jmlBaris){
	if(is_null($currentPage)){
		$nomor = 1;
	}else{
		$nomor = 1+($jmlBaris)*($currentPage - 1);
	}
	return $nomor;
}

function tgl_indonesia($param){
	$split1 = explode(" ", $param);
	$tanggal = $split1[0];
	$waktu = $split1[1];

	$bulan = [
		'1' => 'Januari', 'Pebruari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'Nopember', 'Desember'
	];
	$hari = [
		'1' => 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Ahad'	
	];
	$split2 = explode("-", $tanggal);

	$num = date('N',strtotime($tanggal));
	return $hari[$num].", ".$split2[2]." ".$bulan[(int)$split2[1]]." ".$split2[0];
}

function bersihkan_html($html){
	$config = HTMLPurifier_Config::createDefault();
	$config->set('URI.AllowedSchemes', array('data'=>true));
	$purifier = new HTMLPurifier($config);
	$clean_html = $purifier->purify($html);
	return $clean_html;
}

/** paramater konfigurasi_name = bisa diisikan semisal set_halaman_depan, set_halamana_kontak */
function konfigurasi_get($konfigurasi_name){
	$model = new \App\Models\KonfigurasiModel;
	$filter = [
		'konfigurasi_name' => $konfigurasi_name
	];
	$data = $model->getData($filter);
	if($data){
		return $data;
	}else{
		$model->updateData($filter);
		$data = $model->getData($filter);
		return $data;
	}
	//return $data;
}

function konfigurasi_set($konfigurasi_name, $data_baru)
{
	$model = new \App\Models\KonfigurasiModel;
	$dataGet = konfigurasi_get($konfigurasi_name);
	$dataUpdate = [
		'id' =>$dataGet['id'],
		'konfigurasi_name' => $konfigurasi_name,
		'konfigurasi_value' => $data_baru['konfigurasi_value']
	];
	$model->updateData($dataUpdate);
}

function post_penulis($username)
{
	$model = new \App\Models\AdminModel;
	$data = $model->getData($username);
	return $data['nama_lengkap'];
}

function set_post_link($post_id)
{ 
	$model = new \App\Models\PostModel;
	$data = $model->getPost($post_id);
	$type = $data['post_type'];
	$seo = $data['post_title_seo'];
	return site_url($type.'/'.$seo);	
}
?>
