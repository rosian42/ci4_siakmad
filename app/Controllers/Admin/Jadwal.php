<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\JadwalModel;
use Config\Services;

class Jadwal extends BaseController
{
    function __construct()
    {

        $this->validation = \Config\Services::validation();

        helper('global_helper');
        //untuk konfigurasi internal
        $this->halaman_controller = "jadwal";
        $this->halaman_label = "Jadwal";
    }

    public function index()
    {
        $request = Services::request();
        $datatable = new JadwalModel($request);

        $data = [];
        

        $data['templateJudul'] = $this->halaman_label;
        $data['controller'] = $this->halaman_controller;
        $data['metode']    = 'index';

        return view("admin/" . $this->halaman_controller . "/view", $data);
    }

    function ajaxList()
    {
        $request = Services::request();
        $datatable = new JadwalModel($request);

        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->nm_mapel;
                $row[] = cmb_dinamis('id_guru', 'tb_guru', 'nama_lengkap', 'id_guru', $list->id_guru,'select_guru','id="id_guru'.$list->id_jadwal.'" onchange="update_jadwal('."'id_guru','".$list->id_jadwal."'".')"');
                $row[] = $list->nm_kelas;
                $row[] = cmb_dinamis('hari', 'tb_option', 'opt_val', 'opt_id', $list->hari,'select_hari','id="hari'.$list->id_jadwal.'" onchange="update_jadwal('."'hari','".$list->id_jadwal."'".')"',null,null,'hari');
                $row[] = cmb_dinamis('jam', 'tb_option', 'opt_val', 'opt_id', $list->jam,'select_jam','id="jam'.$list->id_jadwal.'" onchange="update_jadwal('."'jam','".$list->id_jadwal."'".')"',null,null,'jam_pelajaran');
                $row[] = '<a onclick="hapus('."'".$list->id_jadwal."'".'); return false;" role="button" class="btn btn-xs btn-danger" data-placement="top" title="Hapus"><i class="fa fa-trash"></i>del</a>
                    <a onclick="copyJadwal('."'".$list->id_jadwal."'".'); return false;" role="button" class="btn btn-xs btn-primary" data-placement="top" title="Duplikat"><i class="fa fa-copy"></i>Copy</a>
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

    function generateJadwal()
    {
        $request = Services::request();
        $model = new JadwalModel($request);

        if($this->request->getMethod()=="post"){
            //$data = $this->request->getVar();
            $aturan = [
                'th_pelajaran' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Pilih tahun pelajaran'
                    ]
                ],
                'semester' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Pilih semester'
                    ]
                ],
                'id_tingkat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Pilih tingkatan kelas'
                    ]
                ],
                'kd_kelas' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Pilih kelas'
                    ]
                ]
            ];

            if(!$this->validate($aturan)){
                echo json_encode(array("msg" => "invalid", "validation" => $this->validation->getErrors())); 
            }else{
                
                $aksi = $model->generateJadwal();
                if($aksi != false){
                    
                    echo json_encode(array("msg" => "success", "pesan" => "Data berhasil disimpan."));
                    
                }else{
                    echo json_encode(array("msg" => "error", "pesan" => "Mata pelajaran tidak ditemukan"));

                }

            }
        }
    }

    function hapus()
    {
        $request = Services::request();
        $model = new JadwalModel($request);
        if ($request->getMethod(true)=='POST') {
            if ($this->request->getVar('aksi') == 'hapus' && $this->request->getVar('id')) {
                $dataJadwal = $model->getData($this->request->getVar('id'));
                //dd($dataKelas);
                if ($dataJadwal['id_jadwal']) { #memastikan ada data
                    
                    $aksi = $model->hapus($this->request->getVar('id'));
                    //dd($aksi);
                    if ($aksi == true) {
                        //session()->setFlashdata('success', 'Data telah dihapus');
                        echo json_encode(array("status" => TRUE));
                    } else {
                        //session()->setFlashdata('warning', 'Data gagal dihapus');
                        echo json_encode(array("status" => false));
                    }
                }
                //return redirect()->to("admin/" . $this->halaman_controller);
            }
        }
    }

    function updateJadwal()
    {
        $request = Services::request();
        $model = new JadwalModel($request);
        if ($request->getMethod(true)=='POST') {
            $record = [
                'id_jadwal' => $this->request->getVar('id_jadwal'),
                $this->request->getVar('field') => $this->request->getVar('val')
            ];
            $aksi = $model->simpanJadwal($record);
            if($aksi != false){
                echo json_encode(array("status" => true));
            }else{
                echo json_encode(array("status" => false));
            }
        }
    }

    function copyJadwal()
    {
        $request = Services::request();
        $model = new JadwalModel($request);
        if ($request->getMethod(true)=='POST') {
            $aksi = $model->simpanJadwal($this->request->getVar('id_jadwal'));
            if ($aksi == true) {
                //session()->setFlashdata('success', 'Data telah dihapus');
                echo json_encode(array("status" => TRUE));
            } else {
                //session()->setFlashdata('warning', 'Data gagal dihapus');
                echo json_encode(array("status" => false));
            }
        }
    }
    
    function cekJadwal()
    {
        $request = Services::request();
        $model = new JadwalModel($request);

        if($this->request->getMethod()=="post"){
            $aturan = [
                'th_pelajaran' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Pilih tahun pelajaran'
                    ]
                ],
                'semester' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Pilih semester'
                    ]
                ],
                'id_tingkat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Pilih tingkatan kelas'
                    ]
                ],
                'kd_kelas' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Pilih kelas'
                    ]
                ]
            ];

            if(!$this->validate($aturan)){
                echo json_encode(array("msg" => "invalid", "validation" => $this->validation->getErrors())); 
            }else{
                
                $aksi = $model->cekJadwal();
                if($aksi){
                    
                    echo json_encode(array("msg" => "success", "pesan" => "Data berhasil disimpan."));
                    
                }else{
                    echo json_encode(array("msg" => "error", "pesan" => "Mata pelajaran tidak ditemukan"));

                }

            }
        }
    }

    function cetakJadwal()
    {
        $request = Services::request();
        $model = new JadwalModel($request);
        if ($request->getMethod(true) === 'GET') {
            $aksi = $model->cekJadwal();
        }
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'margin_left' => 10,
                                'margin_right' => 10,
                                'margin_top' => 40,
                                'margin_bottom' => 10,]);
        $html = view("admin/$this->halaman_controller/cetak_jadwal",["data" => $aksi]);
        $output ="Jadwal.pdf";
        $stylesheet = file_get_contents('./assets/mpdfstyletables.css');
        $mpdf->defaultheaderline = 0;
        $mpdf->SetHeader("<div ><img src='".base_url()."assets/images/kop.jpg'></div>");
        $mpdf->WriteHTML($stylesheet, 1); // The parameter 1 tells that this is css/style only and no body/html/text
        
        $mpdf->WriteHTML($html);
        $mpdf->Output($output,'I');
        exit(); 
    }
}
