<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\TingkatanKelasModel;

use Config\Services;

class TingkatanKelas extends BaseController
{
    function __construct()
    {
        
        $this->validation = \Config\Services::validation();
        
        helper('global_helper');
        //untuk konfigurasi internal
        $this->halaman_controller = "tingkatankelas";
        $this->halaman_label = "Tingkatan Kelas";
    }

    public function index()
    {
        $request = Services::request();
        $datatable = new TingkatanKelasModel($request);

        $data = [];
        if($this->request->getVar('aksi')=='hapus' && $this->request->getVar('id')){
            $dataTingkatanKelas = $datatable->getData($this->request->getVar('id'));
            if($dataTingkatanKelas['id_tingkatan_kelas']){ #memastikan ada data
                
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
        $datatable = new TingkatanKelasModel($request);

        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                //$link_delete = site_url("admin/$this->halaman_controller/?aksi=hapus&id=").$list->id_tahun_akademik;
                $link_edit = site_url("admin/$this->halaman_controller/edit/").$list->id_tingkat;
                $no++;
                $row = [];
                $row[] = $list->id_tingkatan_kelas;
                $row[] = $list->nm_tingkatan_kelas;
                $row[] = '<a onclick="hapus('.$list->id_tingkat.'); return false;" class="btn btn-sm btn-danger"> Del</a>
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
        $model = new TingkatanKelasModel($request);
        
        $data = [];
        $data['templateJudul'] = $this->halaman_label;
        $data['controller'] = $this->halaman_controller;
        $data['metode']    = 'tambah';
        $data['validation'] = $this->validation;

        if($this->request->getMethod()=="post"){
            $data = $this->request->getVar(); //Setiap yang diinput akan dikembalikan ke view
            $aturan = [
                'id_tingkatan_kelas' => [
                    'rules' => 'required|is_unique[tb_tingkatan_kelas.id_tingkatan_kelas]',
                    'errors' => [
                        'required'=>'Kode tingkatan kelas harus diisi',
                        'is_unique' => 'Kode tingkatan '.$this->request->getVar('id_tingkatan_kelas').' sudah ada. Silahkan buat kode yang lain'
                    ]
                ],
                'nm_tingkatan_kelas' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Nama tingkatan kelas tidak boleh kosong'
                    ]
                ]
            ];
            

            if(!$this->validate($aturan)){
                
                return redirect()->to('admin/'.$this->halaman_controller.'/tambah')->withInput()->with('validation', $this->validation);
            }else{
                
                $record = [
                    'id_tingkatan_kelas' => $this->request->getVar('id_tingkatan_kelas'),
                    'nm_tingkatan_kelas' => $this->request->getVar('nm_tingkatan_kelas')
                ];
                //dd($record);
                $aksi = $model->simpanData($record);
                if($aksi != false){
                    $id = $aksi;
                    //dd($aksi);
                    session()->setFlashdata('success', 'Data berhasil disimpan');
                    return redirect()->to('admin/'.$this->halaman_controller.'/edit/'.$id);
                }else{
                    session()->setFlashdata('warning', ['Gagal menyimpan artikel']);
                    return redirect()->to('admin/'.$this->halaman_controller.'/tambah')->withInput()->with('validation', $this->validation);
                }
            }
        }

        return view('admin/'.$this->halaman_controller.'/tambah', $data);
    }

    function edit($id)
    {
        $request = Services::request();
        $model = new TingkatanKelasModel($request);
        
        $data = [];
        $dataTingkatanKelas = $model->getData($id);
        if(empty($dataTingkatanKelas)){
            return redirect()->to('admin/'.$this->halaman_controller);
        }
        $data = $dataTingkatanKelas;
        if($this->request->getMethod()=="post"){
            $data = $this->request->getVar(); //Setiap yang diinput akan dikembalikan ke view
            $aturan = [
                'id_tingkatan_kelas' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Kode tingkatan kelas harus diisi'
                    ]
                ],
                'nm_tingkatan_kelas' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Nama tingkatan kelas tidak boleh kosong'
                    ]
                ]
            ];
            

            if(!$this->validate($aturan)){
                return redirect()->to('admin/'.$this->halaman_controller.'/tambah')->withInput()->with('validation', $this->validation);
            }else{
                
                $record = [
                    'id_tingkatan_kelas' => $this->request->getVar('id_tingkatan_kelas'),
                    'nm_tingkatan_kelas' => $this->request->getVar('nm_tingkatan_kelas'),
                    'id_tingkat' => $id
                ];
                
                $aksi = $model->simpanData($record);
                if($aksi != false){
                    
                    session()->setFlashdata('success', 'Data berhasil diupdate');
                    return redirect()->to('admin/'.$this->halaman_controller.'/edit/'.$id);
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
