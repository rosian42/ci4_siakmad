<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\TahunAkademikModel;

use Config\Services;

class TahunAkademik extends BaseController
{
    function __construct()
    {
        
        $this->validation = \Config\Services::validation();
        //$this->m_tahunakademik = new TahunAkademikModel();
        helper('global_helper');
        //untuk konfigurasi internal
        $this->halaman_controller = "tahunakademik";
        $this->halaman_label = "Tahun Akademik";
    }

    public function index()
    {
        $data = [];
        $data['templateJudul'] = $this->halaman_label;

        return view("admin/".$this->halaman_controller."/view", $data);
    }

    function ajaxList()
    {
        $request = Services::request();
        $datatable = new TahunAkademikModel($request);

        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->name;
                $row[] = $list->email;
                $data[] = $row;
            }

            $output = [
                'draw' => $request->getPost('draw'),
                'recordsTotal' => $datatable->countAll(),
                'recordsFiltered' => $datatable->countFiltered(),
                'data' => $data
            ];

            echo json_encode($output);
        }
    }

    public function tambah()
    {
        $data = [];
        $data['templateJudul'] = $this->halaman_label;
        $data['controller'] = $this->halaman_controller;
        $data['metode']    = 'tambah';

        if($this->request->getMethod()=="post"){
            $data = $this->request->getVar(); //Setiap yang diinput akan dikembalikan ke view
            $aturan = [
                'tahun_akademik' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Tahun akademik harus diisi'
                    ]
                ],
                'semester' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Pilih Semester'
                    ]
                ],
                'is_aktif' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Pilih aktif atau tidak aktif'
                    ]
                ]
            ];
            

            if(!$this->validate($aturan)){
                //session()->setFlashdata('warning', $this->validation->getErrors());
                return redirect()->to('admin/'.$this->halaman_controller.'/tambah')->withInput()->with('validation', $this->validation);
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

        return view('admin/'.$this->halaman_controller.'/tambah', $data);
    }
}
