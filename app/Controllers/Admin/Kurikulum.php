<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\KurikulumModel;

use Config\Services;



class Kurikulum extends BaseController
{
    function __construct()
    {
        
        $this->validation = \Config\Services::validation();
        
        helper('global_helper');
        //untuk konfigurasi internal
        $this->halaman_controller = "kurikulum";
        $this->halaman_label = "Kurikulum";
    }

    public function index()
    {
        $request = Services::request();
        $datatable = new KurikulumModel($request);

        $data = [];
        if($this->request->getVar('aksi')=='hapus' && $this->request->getVar('id')){
            $dataKurikulum = $datatable->getData($this->request->getVar('id'));
            //dd($dataKelas);
            if($dataKurikulum['id_kurikulum']){ #memastikan ada data
                
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
        $datatable = new KurikulumModel($request);

        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                //$link_delete = site_url("admin/$this->halaman_controller/?aksi=hapus&id=").$list->id_tahun_akademik;
                $link_edit = site_url("admin/$this->halaman_controller/edit/").$list->id_kurikulum;
                $link_detail = site_url("admin/$this->halaman_controller/detail/").$list->id_kurikulum;
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->nm_kurikulum;
                $row[] = $list->is_aktif=='Y'?'Aktif':'Tidak Aktif';
                $row[] = '<a onclick="hapus('."'".$list->id_kurikulum."'".'); return false;" class="btn btn-xs btn-danger" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>
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
        $model = new KurikulumModel($request);
        
        $data = [];
        

        if($this->request->getMethod()=="post"){
            $data = $this->request->getVar(); //Setiap yang diinput akan dikembalikan ke view
            $aturan = [
                'nm_kurikulum' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Nama kurikulum harus diisi'
                    ]
                ],
                'is_aktif' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Pilih aktif atau tidak aktif'
                    ]
                ]
            ];
            

            if(!$this->validate($aturan)){
                
               // return redirect()->to('admin/'.$this->halaman_controller.'/tambah')->withInput()->with('validation', $this->validation);
                //dd($this->validation->getRules());
                session()->setFlashdata('validation', $this->validation);
            }else{
                
                $record = [
                    'nm_kurikulum' => $this->request->getVar('nm_kurikulum'),
                    'is_aktif' => $this->request->getVar('is_aktif')

                ];
                //dd($record);
                $aksi = $model->simpanData($record);
                if($aksi != false){
                    $id = $aksi;
                    //dd($aksi);
                    session()->setFlashdata('success', 'Data berhasil disimpan');
                    return redirect()->to('admin/'.$this->halaman_controller);
                }else{
                    session()->setFlashdata('warning', ['Gagal menyimpan data']);
                    return redirect()->to('admin/'.$this->halaman_controller.'/tambah')->withInput()->with('validation', $this->validation);
                }
            }
        }
        $data['templateJudul'] = $this->halaman_label;
        $data['controller'] = $this->halaman_controller;
        $data['metode']    = 'tambah';
        $data['validation'] = $this->validation;

        return view('admin/'.$this->halaman_controller.'/tambah', $data);
    }

    function edit($id)
    {
        $request = Services::request();
        $model = new KurikulumModel($request);
        
        $data = [];
        $dataKurikulum = $model->getData($id);
        if(empty($dataKurikulum)){
            return redirect()->to('admin/'.$this->halaman_controller);
        }
        $data = $dataKurikulum;
        if($this->request->getMethod()=="post"){
            $data = $this->request->getVar(); //Setiap yang diinput akan dikembalikan ke view
            $aturan = [
                'nm_kurikulum' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Nama kurikulum harus diisi'
                    ]
                ],
                'is_aktif' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Pilih aktif atau tidak aktif'
                    ]
                ]
            ];
            

            if(!$this->validate($aturan)){
                //return redirect()->to('admin/'.$this->halaman_controller.'/tambah')->withInput()->with('validation', $this->validation);
                session()->setFlashdata('validation', $this->validation);
            }else{
                
                $record = [
                    'id_kurikulum' => $id,
                    'nm_kurikulum' => $this->request->getVar('nm_kurikulum'),
                    'is_aktif' => $this->request->getVar('is_aktif')
                ];
                
                $aksi = $model->simpanData($record);
                if($aksi != false){
                    
                    session()->setFlashdata('success', 'Data berhasil diupdate');
                    return redirect()->to('admin/'.$this->halaman_controller);
                }else{
                    session()->setFlashdata('warning', ['Gagal update data']);
                    return redirect()->to('admin/'.$this->halaman_controller.'/edit/'.$id);
                }
            }
        }

        $data['templateJudul'] = $this->halaman_label;
        $data['controller'] = $this->halaman_controller;
        $data['metode']    = 'edit';
        $data['validation'] = $this->validation;
        
        return view('admin/'.$this->halaman_controller.'/tambah', $data);
        
    }

    public function detail($id)
    {
        $request = Services::request();
        $datatable = new KurikulumModel($request);

        $data = [];
        $dataKurikulum = $datatable->getData($id);
        if(empty($dataKurikulum)){
            return redirect()->to('admin/'.$this->halaman_controller);
        }
        $data = $dataKurikulum;
        
        if($this->request->getVar('aksi')=='hapus' && $this->request->getVar('id')){
            $kurikulumDetailModel = new \App\Models\KurikulumDetailModel($request);
            $dataKurikulumDetail = $kurikulumDetailModel->getData($this->request->getVar('id'));
            //dd($dataKelas);
            if($dataKurikulumDetail['id_kurikulum_detail']){ #memastikan ada data
                
                $aksi = $kurikulumDetailModel->hapus($this->request->getVar('id'));
                if($aksi == true){
                    session()->setFlashdata('success', 'Data telah dihapus');
                    //echo json_encode(array("status" => TRUE));
                }else{
                    session()->setFlashdata('warning', 'Data gagal dihapus');
                    //echo json_encode(array("status" => false));
                }
            }
            return redirect()->to("admin/".$this->halaman_controller."/detail/".$id);
        }
        
        $data['templateJudul'] = $dataKurikulum['nm_kurikulum'];
        $data['controller'] = $this->halaman_controller;
        $data['metode']    = 'detail';

        return view("admin/".$this->halaman_controller."/detail", $data);
    }

    function ajaxListDetailKurikulum()
    {
        $request = Services::request();
        $datatable = new \App\Models\KurikulumDetailModel($request);

        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->kd_mapel;
                $row[] = $list->nm_mapel;
                $row[] = '<a onclick="hapus('."'".$list->id_kurikulum_detail."'".'); return false;" class="btn btn-xs btn-danger" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>
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

    public function simpanDetailKurikulum()
    {
        $request = Services::request();
        $model = new \App\Models\KurikulumDetailModel($request);
        
        $data = [];
        

        if($this->request->getMethod()=="post"){
            $data = $this->request->getVar(); //Setiap yang diinput akan dikembalikan ke view
            $aturan = [
                'id_kurikulum' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Pilih salah satu kurikulum'
                    ]
                ],
                'id_mapel' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Pilih mata pelajaran'
                    ]
                ],
                'kd_tingkatan_detail' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Pilih tingkatan kelas'
                    ]
                ]
            ];
            

            if(!$this->validate($aturan)){
                
               // return redirect()->to('admin/'.$this->halaman_controller.'/tambah')->withInput()->with('validation', $this->validation);
                //session()->setFlashdata('validation', $this->validation);
                
                echo json_encode(array("status" => FALSE, "validation" => $this->validation->getErrors()));
            }else{
                
                $record = [
                    'id_kurikulum' => $this->request->getVar('id_kurikulum'),
                    'id_mapel' => $this->request->getVar('id_mapel'),
                    'id_tingkat' => $this->request->getVar('kd_tingkatan_detail')

                ];
                //dd($record);
                $aksi = $model->simpanData($record);
                if($aksi != false){
                    $id = $aksi;
                    //dd($aksi);
                    //session()->setFlashdata('success', 'Data berhasil disimpan');
                    echo json_encode(array("status" => true));
                }else{
                    //session()->setFlashdata('warning', ['Gagal menyimpan data']);
                    //return redirect()->to('admin/'.$this->halaman_controller.'/tambah')->withInput()->with('validation', $this->validation);
                    echo json_encode(array("status" => false));

                }
            }
        }
        //$data['templateJudul'] = $this->halaman_label;
        //$data['controller'] = $this->halaman_controller;
        //$data['metode']    = 'tambah';
        //$data['validation'] = $this->validation;

        //return view('admin/'.$this->halaman_controller.'/tambah', $data);
    }
}
