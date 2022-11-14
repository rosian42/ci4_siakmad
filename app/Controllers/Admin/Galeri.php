<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GaleriModel;
use App\Models\GaleriDetailModel;
use Config\Services;
class Galeri extends BaseController
{
    function __construct()
    {

        $this->validation = \Config\Services::validation();
        //untuk konfigurasi internal
        $this->halaman_controller = "galeri";
        $this->halaman_label = "Galeri";
    }

    public function index()
    {
        $request = Services::request();
        $datatable = new GaleriModel($request);
        
        $data = [];

        if ($this->request->getMethod(true)=='POST') {
            if ($this->request->getVar('aksi') == 'hapus' && $this->request->getVar('galeri_id')) {
                $dataTesti = $datatable->getData($this->request->getVar('galeri_id'));// ambil data
                //dd($dataKelas);
                if ($dataTesti['id']) { #memastikan ada data

                    $aksi = $datatable->hapus($this->request->getVar('galeri_id'));
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

        $data['templateJudul'] = 'Halaman '.$this->halaman_label;
        $data['controller'] = $this->halaman_controller;
        $data['metode']    = 'index';
        return view("admin/$this->halaman_controller/".$data['metode'], $data);
    }

    function ajaxList()
    {
        $request = Services::request();
        $datatable = new GaleriModel($request);

        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                $link_detail= base_url("admin/$this->halaman_controller/detail")."/".$list->galeri_id;
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->galeri_name;
                $row[] = '<a onclick="hapus('."'".$list->galeri_id."'".')" role="button" class="btn btn-xs btn-danger" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>
                <a role="button" href="'.$link_detail.'" class="btn btn-xs btn-warning" data-placement="top" title="Detail"><i class="fa fa-eye"></i></a>
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

    function tambah()
    {
        $request = Services::request();
        $model = new GaleriModel($request);
        
        if($this->request->getMethod()=="post"){
            $aturan = [
                'galeri_name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Nama album harus diisi'
                    ]
                ]
            ];
            if(!$this->validate($aturan)){
                echo json_encode(array("msg" => "invalid", "validation" => $this->validation->getErrors()));
            }else{
                $record = [
                    'galeri_name' => $this->request->getVar('galeri_name')
                ];
                $aksi = $model->simpanData($record);
                if($aksi){
                    echo json_encode(array("msg" => "success", "pesan" => "Data berhasil disimpan."));
                }else{
                    echo json_encode(array("msg" => "error", "pesan" => "Data gagal disimpan."));
                }
            }
        }
    }

    function detail($galeri_id='')
    {
        helper(['form', 'url']);
        $request = Services::request();
        $model = new GaleriModel($request);
        $detailGaleri = new GaleriDetailModel();

        $data = [];
        
        $dataGaleri = $model->getData($galeri_id);// ambil data
        if (empty($dataGaleri)) {
            return redirect()->to('admin/'.$this->halaman_controller);
        }
        
        if($this->request->getMethod()=="post"){
            
            $direktori = 'upload/'.$this->halaman_controller."/".$dataGaleri['galeri_slug'];
            if($file= $this->request->getFile('file')){
                if($file->isValid() && ! $file->hasMoved()){
                    $name = $file->getRandomName();
                    $file->move($direktori,$name);
                    $dataImg = [
                        "galeri_id" => $galeri_id,
                        "galeri_detail_name" => $direktori."/".$name
                    ];
                    $detailGaleri->insert($dataImg);
                }
            }
            
        }
        $data = $dataGaleri;
        $data['Galeri'] = $detailGaleri->where('galeri_id', $dataGaleri['galeri_id'])->findAll();
        $data['templateJudul'] = 'Detail '.$this->halaman_label;
        $data['controller'] = $this->halaman_controller;
        $data['metode']    = 'detail';
        return view("admin/$this->halaman_controller/".$data['metode'], $data);
    }
}
