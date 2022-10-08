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
                $row[] = $list->tmp_lahir.", ".$lis->tgl_lahir;
                $row[] = $list->foto;
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
}
