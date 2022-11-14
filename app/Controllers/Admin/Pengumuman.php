<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PostModel;

class Pengumuman extends BaseController
{
    function __construct()
    {
        
        $this->validation = \Config\Services::validation();
        $this->m_post = new PostModel();
        helper('global_helper');
        //untuk konfigurasi internal
        $this->halaman_controller = "pengumuman";
        $this->halaman_label = "Pengumuman";
    }

    public function index()
    {
        $data = [];

        if ($this->request->getMethod(true)=='POST') {
            if ($this->request->getVar('aksi') == 'hapus' && $this->request->getVar('id')) {
                $data = $this->m_post->getPost($this->request->getVar('id'));// ambil data
                //dd($dataKelas);
                if ($data['post_id']) { #memastikan ada data
                    
                    $aksi = $this->m_post->hapus($this->request->getVar('id'));
                    //dd($aksi);
                    if ($aksi == true) {
                        //session()->setFlashdata('success', 'Data telah dihapus');
                        return json_encode(array("status" => TRUE));
                    } else {
                        //session()->setFlashdata('warning', 'Data gagal dihapus');
                        return json_encode(array("status" => false));
                    }
                }
                //return redirect()->to("admin/" . $this->halaman_controller);
            }
        }

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
        return view("admin/$this->halaman_controller/view", $data);
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
                    'post_status' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Pilih status agenda'
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
                    $aksi = $this->m_post->insertPost($record, $post_type);
                    if($aksi){
                        return json_encode(array("msg" => "success", "pesan" => "Data berhasil disimpan."));
                    }else{
                        return json_encode(array("msg" => "error", "pesan" => "Data gagal disimpan."));
                    }
                }
            }else{
                $data = $this->m_post->getPost($this->request->getVar('post_id'));// ambil data
                $aturan = [
                    'post_title' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Judul harus diisi'
                        ]
                    ],
                    'post_status' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Pilih status agenda'
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
                    $post_thumbnail = $data['post_thumbnail'];
                    if($file->getName()){
                        $nm_file = $file->getRandomName();
                        $path = 'upload/'.$this->halaman_controller;
                        $post_thumbnail = $path.'/'.$nm_file;
                        $file->move($path, $nm_file);
                        @unlink($data['post_thumbnail']);
                    }
                    $record = [
                        'post_id' => $data['post_id'],
                        'username' => session()->get('akun_username'),
                        'post_title' => $this->request->getVar('post_title'),
                        'post_status' => $this->request->getVar('post_status'),
                        'post_thumbnail' => $post_thumbnail,
                        'post_description' => $this->request->getVar('post_description'),
                        'post_content' => $this->request->getVar('post_content'),
                        'post_keyword' => $this->request->getVar('post_keyword')
                        
                    ];
                    $post_type = $this->halaman_controller;
                    $aksi = $this->m_post->insertPost($record, $post_type);
                    if($aksi){
                        return json_encode(array("msg" => "success", "pesan" => "Data berhasil diupdate."));
                    }else{
                        return json_encode(array("msg" => "error", "pesan" => "Data gagal diupdate."));
                    }
                }
            }
        }
        if(isset($post_id)){
            $data = $this->m_post->getPost($post_id);
        }
        $data['templateJudul'] = 'Tambah '. $this->halaman_label;
        $data['templateBreadcrumb'] = [$this->halaman_controller, 'tambah'] ;
        $data['controller'] = $this->halaman_controller;
        $data['metode']    = 'tambah';
        return view("admin/$this->halaman_controller/tambah", $data);
    }

    
}
