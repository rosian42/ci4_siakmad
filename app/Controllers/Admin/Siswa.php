<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SiswaModel;
use Config\Services;

class Siswa extends BaseController
{
    function __construct()
    {
        
        $this->validation = \Config\Services::validation();
        
        helper('global_helper');
        //untuk konfigurasi internal
        $this->halaman_controller = "siswa";
        $this->halaman_label = "Siswa";
    }

    public function index()
    {
        $request = Services::request();
        $datatable = new SiswaModel($request);
        
        $data = [];
        if($this->request->getVar('aksi')=='hapus' && $this->request->getVar('id')){
            $dataSiswa = $datatable->getData($this->request->getVar('id'));
            //dd($dataKelas);
            if($dataSiswa['id_siswa']){ #memastikan ada data
                if($dataSiswa['foto_siswa'] != 'assets/admin/dist/img/no-pict-siswa.jpg'){
                    @unlink($dataSiswa['foto_siswa']);
                }
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
        $datatable = new SiswaModel($request);

        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                //$link_delete = site_url("admin/$this->halaman_controller/?aksi=hapus&id=").$list->id_tahun_akademik;
                
                $link_detail = site_url("admin/$this->halaman_controller/detail/").$list->id_siswa;
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->nama_lengkap;
                $row[] = $list->nisn;
                $row[] = $list->tmp_lahir.", ".$list->tgl_lahir;
                $row[] = '<img src="'.base_url().'/'.$list->foto_siswa.'"  class="profile-user-img img-fluid img-circle">';
                $row[] = '<a onclick="hapus('."'".$list->id_siswa."'".'); return false;" role="button" class="btn btn-xs btn-danger" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>
                            <a role="button" href="javascript:void(0)" onclick="edit('."'".$list->id_siswa."'".')" class="btn btn-xs btn-warning" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a> 
                            <a href="'.$link_detail.'" role="button" class="btn btn-xs btn-primary" data-placement="top" title="Detail"><i class="fa fa-eye"></i></a>
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
