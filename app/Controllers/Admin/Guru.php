<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GuruModel;
use Config\Services;

class Guru extends BaseController
{
    function __construct()
    {
        
        $this->validation = \Config\Services::validation();
        
        helper('global_helper');
        //untuk konfigurasi internal
        $this->halaman_controller = "guru";
        $this->halaman_label = "Guru";
    }

    public function index()
    {
        $request = Services::request();
        $datatable = new GuruModel($request);
        
        $data = [];
        if($this->request->getVar('aksi')=='hapus' && $this->request->getVar('id')){
            $dataGuru = $datatable->getData($this->request->getVar('id'));
            //dd($dataKelas);
            if($dataGuru['id_guru']){ #memastikan ada data
                @unlink(LOKASI_UPLOAD."/".$dataGuru['foto']);
                $aksi = $datatable->hapus($this->request->getVar('id'));
                if($aksi == true){
                    session()->setFlashdata('success', 'Data telah dihapus');
                    //echo json_encode(array("status" => TRUE));
                }else{
                    session()->setFlashdata('warning', 'Data gagal dihapus');
                    //echo json_encode(array("status" => false));
                }
            }
            return redirect()->to("admin/".$this->halaman_controller);
        }
        $data['templateJudul'] = $this->halaman_label;
        $data['controller'] = $this->halaman_controller;
        $data['metode']    = 'index';

        return view("admin/".$this->halaman_controller."/view", $data);
    }

    function ajaxList()
    {
        $request = Services::request();
        $datatable = new GuruModel($request);

        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                //$link_delete = site_url("admin/$this->halaman_controller/?aksi=hapus&id=").$list->id_tahun_akademik;
                $link_edit = site_url("admin/$this->halaman_controller/edit/").$list->id_guru;
                $link_detail = site_url("admin/$this->halaman_controller/detail/").$list->id_guru;
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->nama_lengkap;
                $row[] = $list->nip;
                $row[] = $list->tmp_lahir.", ".$list->tgl_lahir;
                $row[] = '<img src="'.base_url().'/'.$list->foto.'"  class="profile-user-img img-fluid img-circle">';
                $row[] = '<a onclick="hapus('."'".$list->id_guru."'".'); return false;" class="btn btn-xs btn-danger" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>
                            <a href="'.$link_edit.'" class="btn btn-xs btn-warning" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a> 
                            <a href="'.$link_detail.'" class="btn btn-xs btn-primary" data-placement="top" title="Detail"><i class="fa fa-eye"></i></a>
                        ';
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
        $request = Services::request();
        $model = new GuruModel($request);
        
        $data = [];
        

        if($this->request->getMethod()=="post"){
            $data = $this->request->getVar(); //Setiap yang diinput akan dikembalikan ke view
            $aturan = [
                'nuptk' => [
                    'rules' => 'required|is_unique[tb_guru.nip]',
                    'errors' => [
                        'required'=>'NUPTK harus diisi',
                        'is_unique' => 'NUPTK '.$this->request->getVar('nuptk').' sudah ada.'
                    ]
                ],
                'nama_lengkap' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Nama lengkap harus diisi'
                    ]
                ],
                'tmp_lahir' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Tempat lahir harus diisi'
                    ]
                ],
                'tgl_lahir' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Tanggal lahir harus diisi'
                    ]
                ],
                'alamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Alamat harus diisi'
                    ]
                ],
                'no_telp' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Nomor telepon harus diisi'
                    ]
                ],
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required'=>'Email harus diisi',
                        'valid_email' => 'Alamat Email tidak valid'
                    ]
                ]
            ];
            //dd($this->request->getVar());
            $file = $this->request->getFile('foto');

            if(!$this->validate($aturan)){
                
               // return redirect()->to('admin/'.$this->halaman_controller.'/tambah')->withInput()->with('validation', $this->validation);
                //dd($this->validation->getRules());
                echo json_encode(array("msg" => "invalid", "validation" => $this->validation->getErrors()));
                
            }else{
                $foto = "assets/admin/dist/img/no-pict.jpg";
                
                
                if($file->getName()){
                    $nm_foto = $file->getRandomName();
                    $nmFolder    = str_replace( "'", "", $this->request->getVar('nama_lengkap'));
                    $path = 'berkas/'.$this->halaman_controller.'/'.$nmFolder;
                    /*if (!is_dir(WRITEPATH.'berkas/'.$this->halaman_controller.'/'.$nmFolder)) {
                        mkdir(WRITEPATH.'berkas/'.$this->halaman_controller.'/'.$nmFolder, 0777, TRUE);
                    }*/
                    $foto = $path.'/'.$nm_foto;
                    $file->move($path, $nm_foto);
                }
                
                /*
                if (!is_dir(WRITEPATH.'berkas/'.$this->halaman_controller.'/'.$nmFolder)) {
                    mkdir(WRITEPATH.'berkas/'.$this->halaman_controller.'/'.$nmFolder, 0777, TRUE);
                }
                */
                
                $record = [
                    'nip' => $this->request->getVar('nuptk'),
                    'nama_lengkap' => $this->request->getVar('nama_lengkap'),
                    'tmp_lahir' => $this->request->getVar('tmp_lahir'),
                    'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                    'alamat' => $this->request->getVar('alamat'),
                    'no_telp' => $this->request->getVar('no_telp'),
                    'email' => $this->request->getVar('email'),
                    'foto' => $foto
                ];
                //dd($record);
                $aksi = $model->simpanData($record);
                if($aksi != false){
                    $id = $aksi;
                    //dd($aksi);
                    /*
                    if($file->getName()){
                        //$lokasi_direktori = "upload";
                        $lokasi_direktori = WRITEPATH.'upload';
                        $file->move(WRITEPATH . 'uploads', $nm_foto);
                    }
                    */
                    echo json_encode(array("msg" => "success"));
                    
                    //session()->setFlashdata('success', 'Data berhasil disimpan');
                    //return redirect()->to('admin/'.$this->halaman_controller);
                }else{
                    //session()->setFlashdata('warning', ['Gagal menyimpan data']);
                    //return redirect()->to('admin/'.$this->halaman_controller.'/tambah')->withInput()->with('validation', $this->validation);
                    echo json_encode(array("msg" => "error"));

                }

            }
        }
        
    }
}
