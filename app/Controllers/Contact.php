<?php

namespace App\Controllers;
use App\Models\PostModel;

class Contact extends BaseController
{
    function __construct()
    {
        $this->m_post = new PostModel();
        $this->validation = \Config\Services::validation();
        helper('global_helper');
    }
    public function index()
    {
        $data = [];

        if($this->request->getMethod() == "post"){
            $data = $this->request->getVar();
            $aturan = [
                'kontak_nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama tidak boleh kosong'
                    ]
                ],
                'kontak_email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'Email tidak boleh kosong',
                        'valid_email' => 'Email tidak valid'
                    ]
                ],
                'kontak_tel' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Telephon atau HP tidak boleh kosong'
                    ]
                ],
                'kontak_pesan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Pesan tidak boleh kosong'
                    ]
                ]
            ];

            if(!$this->validate($aturan)){
                session()->setFlashdata('warning', $this->validation->getErrors());
                
            }else{
                $attachment = "";
                $to = EMAIL_ALAMAT_PENGIRIM;
                $tittle = "[Dari Halaman Kontak]";
                $message = "Berikut ini ada email baru yang masuk dengan detail sebagai berikut:<br/>";
                $message .= "<b>Nama</b><br/>";
                $message .= $data['kontak_nama']."<br/>";
                $message .= "<b>Email</b><br/>";
                $message .= $data['kontak_email']."<br/>";
                $message .= "<b>Telephon</b><br/>";
                $message .= $data['kontak_tel']."<br/>";
                $message .= "<b>Pesan</b><br/>";
                $message .= $data['kontak_pesan']."<br/>";
                $message .= ".............................................<br/>";
                $message .= "Silahkan replay email tersebut ke email pengirim";
                
                kirim_email($attachment, $to, $tittle, $message);
                session()->setFlashdata('success', 'Pesan sudah kami terima. Silahkan tunggu balasan dari kami.');
                return redirect()->to('contact');
            }

        }

        /** Mengambil page_id konfigurasi untuk halaman depan */ 
        $konfigurasi_name = 'set_halaman_kontak';
        $konfigurasi = konfigurasi_get($konfigurasi_name);
        $page_id = $konfigurasi['konfigurasi_value'];
        
        /** mengambil data dari PostModel untuk id page_id */
        $dataHalaman = $this->m_post->getPost($page_id);
        //dd($dataHalaman);
        $data['type'] = $dataHalaman['post_type'];
        $data['judul'] = $dataHalaman['post_title'];
        $data['deskripsi'] = $dataHalaman['post_description'];
        $data['thumbnail'] = $dataHalaman['post_thumbnail'];
        $data['konten'] = $dataHalaman['post_content'];

        echo view('depan/v_templateheader', $data);
        echo view('depan/v_contact', $data);
        echo view('depan/v_templatefooter', $data);
    }
}
