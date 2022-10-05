<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;


use App\Models\KelasModel;

use Config\Services;

class Kelas extends BaseController
{
    function __construct()
    {
        
        $this->validation = \Config\Services::validation();
        
        helper('global_helper');
        //untuk konfigurasi internal
        $this->halaman_controller = "kelas";
        $this->halaman_label = "Kelas";
    }

    public function index()
    {
        $request = Services::request();
        $datatable = new KelasModel($request);

        $data = [];
        if($this->request->getVar('aksi')=='hapus' && $this->request->getVar('id')){
            $dataKelas = $datatable->getData($this->request->getVar('id'));
            //dd($dataKelas);
            if($dataKelas['kd_kelas']){ #memastikan ada data
                
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
        $datatable = new KelasModel($request);

        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                //$link_delete = site_url("admin/$this->halaman_controller/?aksi=hapus&id=").$list->id_tahun_akademik;
                $link_edit = site_url("admin/$this->halaman_controller/edit/").$list->kd_kelas;
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->kd_kelas;
                $row[] = $list->nm_kelas;
                $row[] = $list->nm_tingkatan_kelas;
                $row[] = '<a onclick="hapus('."'".$list->kd_kelas."'".'); return false;" class="btn btn-sm btn-danger"> Del</a>
                            <a href="'.$link_edit.'" class="btn btn-sm btn-warning"> Edit</a>
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
        $model = new KelasModel($request);
        
        $data = [];
        

        if($this->request->getMethod()=="post"){
            $data = $this->request->getVar(); //Setiap yang diinput akan dikembalikan ke view
            $aturan = [
                'kd_kelas' => [
                    'rules' => 'required|is_unique[tb_kelas.kd_kelas]',
                    'errors' => [
                        'required'=>'Kode kelas harus diisi',
                        'is_unique' => 'Kode kelas '.$this->request->getVar('kd_kelas').' sudah ada. Silahkan buat kode yang lain'
                    ]
                ],
                'nm_kelas' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Nama kelas tidak boleh kosong'
                    ]
                ],
                'kd_tingkatan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Tingkatan kelas tidak boleh kosong'
                    ]
                ]
            ];
            

            if(!$this->validate($aturan)){
                
               // return redirect()->to('admin/'.$this->halaman_controller.'/tambah')->withInput()->with('validation', $this->validation);
                session()->setFlashdata('validation', $this->validation);
            }else{
                
                $record = [
                    'kd_kelas' => $this->request->getVar('kd_kelas'),
                    'nm_kelas' => $this->request->getVar('nm_kelas'),
                    'kd_tingkatan' => $this->request->getVar('kd_tingkatan')

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
        $model = new KelasModel($request);
        
        $data = [];
        $dataKelas = $model->getData($id);
        if(empty($dataKelas)){
            return redirect()->to('admin/'.$this->halaman_controller);
        }
        $data = $dataKelas;
        if($this->request->getMethod()=="post"){
            $data = $this->request->getVar(); //Setiap yang diinput akan dikembalikan ke view
            $aturan = [
                'kd_kelas' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Kode kelas harus diisi'
                    ]
                ],
                'nm_kelas' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Nama kelas tidak boleh kosong'
                    ]
                ],
                'kd_tingkatan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Tingkatan kelas tidak boleh kosong'
                    ]
                ]
            ];
            

            if(!$this->validate($aturan)){
                //return redirect()->to('admin/'.$this->halaman_controller.'/tambah')->withInput()->with('validation', $this->validation);
                session()->setFlashdata('validation', $this->validation);
            }else{
                
                $record = [
                    'kd_kelas' => $id,
                    'nm_kelas' => $this->request->getVar('nm_kelas'),
                    'kd_tingkatan' => $this->request->getVar('kd_tingkatan')
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
}
