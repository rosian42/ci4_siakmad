<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TestimoniModel;
use Config\Services;
class Testimoni extends BaseController
{
    function __construct()
    {
        
        $this->validation = \Config\Services::validation();
        
        //untuk konfigurasi internal
        $this->halaman_controller = "testimoni";
        $this->halaman_label = "Testimoni";
    }

    public function index()
    {
        $request = Services::request();
        $datatable = new TestimoniModel($request);
        
        $data = [];

        if ($this->request->getMethod(true)=='POST') {
            if ($this->request->getVar('aksi') == 'hapus' && $this->request->getVar('id')) {
                $dataTesti = $datatable->getData($this->request->getVar('id'));// ambil data
                //dd($dataKelas);
                if ($dataTesti['id']) { #memastikan ada data
                    
                    $aksi = $datatable->hapus($this->request->getVar('id'));
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
        $datatable = new TestimoniModel($request);

        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                $link_edit= base_url("admin/$this->halaman_controller/tambah")."/".$list->id;
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->testimoni_name;
                $row[] = $list->testimoni_position;
                $row[] = $list->is_aktif=='Y'?'<div class="alert alert-success">Aktif</div>':'<div class="alert alert-danger">Tidak Aktif</div>';
                $row[] = '<a onclick="hapus('."'".$list->id."'".')" role="button" class="btn btn-xs btn-danger" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>
                    <a role="button" href="'.$link_edit.'" class="btn btn-xs btn-warning" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
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

    public function tambah($id=null)
    {
        $request = Services::request();
        $model = new TestimoniModel($request);
        $data = [];
        if($this->request->getMethod()=="post"){
            if(empty($this->request->getVar('id'))){
                $aturan = [
                    'testimoni_name' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Nama Pemberi Testimoni harus diisi'
                        ]
                    ],
                    'testimoni_position' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Jabatan Pemberi Testimoni harus diisi'
                        ]
                    ],
                    'testimoni_content' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Konten harus diisi'
                        ]
                    ],
                    'is_aktif' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Pilih aktif atau tidak'
                        ]
                    ],
                    'testimoni_img' => [
                        'rules' => 'is_image[testimoni_img]',
                        'errors' => [
                            'is_image' => 'Hanya gambar yang diperbolehkan untuk diupload'
                        ]
                    ]
                ];
                $file = $this->request->getFile('testimoni_img');
                if(!$this->validate($aturan)){
                    
                    return json_encode(array("msg" => "invalid", "validation" => $this->validation->getErrors()));
                    
                }else{
                    $testimoni_img = "";
                    if($file->getName()){
                        $nm_file = $file->getRandomName();
                        $path = 'upload/'.$this->halaman_controller;
                        $testimoni_img = $path.'/'.$nm_file;
                        $file->move($path, $nm_file);
                    }
                    
                    $record = [
                        'testimoni_name' => $this->request->getVar('testimoni_name'),
                        'testimoni_position' => $this->request->getVar('testimoni_position'),
                        'testimoni_img' => $testimoni_img,
                        'testimoni_content' => $this->request->getVar('testimoni_content'),
                        'is_aktif' => $this->request->getVar('is_aktif')
                    ];
                    $aksi = $model->simpanData($record);
                    if($aksi){
                        return json_encode(array("msg" => "success", "pesan" => "Data berhasil disimpan.", "id" => $aksi));
                    }else{
                        return json_encode(array("msg" => "error", "pesan" => "Data gagal disimpan."));
                    }
                }
            }else{
                $dataTesti = $model->getData($this->request->getVar('id'));// ambil data
                $aturan = [
                    'testimoni_name' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Nama Pemberi Testimoni harus diisi'
                        ]
                    ],
                    'testimoni_position' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Jabatan Pemberi Testimoni harus diisi'
                        ]
                    ],
                    'testimoni_content' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Konten harus diisi'
                        ]
                    ],
                    'is_aktif' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Pilih aktif atau tidak'
                        ]
                    ],
                    'testimoni_img' => [
                        'rules' => 'is_image[testimoni_img]',
                        'errors' => [
                            'is_image' => 'Hanya gambar yang diperbolehkan untuk diupload'
                        ]
                    ]
                ];

                $file = $this->request->getFile('testimoni_img');
    
                if(!$this->validate($aturan)){
                    return json_encode(array("msg" => "invalid", "validation" => $this->validation->getErrors()));
                }else{
                    $testimoni_img = $dataTesti['testimoni_img'];
                    if($file->getName()){
                        $nm_file = $file->getRandomName();
                        $path = 'upload/'.$this->halaman_controller;
                        $testimoni_img = $path.'/'.$nm_file;
                        $file->move($path, $nm_file);
                        @unlink($dataTesti['testimoni_img']);
                    }
                    $record = [
                        'id' => $dataTesti['id'],
                        'testimoni_name' => $this->request->getVar('testimoni_name'),
                        'testimoni_position' => $this->request->getVar('testimoni_position'),
                        'testimoni_img' => $testimoni_img,
                        'testimoni_content' => $this->request->getVar('testimoni_content'),
                        'is_aktif' => $this->request->getVar('is_aktif')
                    ];
                    
                    $aksi = $model->simpanData($record);
                    if($aksi){
                        return json_encode(array("msg" => "success", "pesan" => "Data berhasil diupdate.", "id" => $aksi));
                    }else{
                        return json_encode(array("msg" => "error", "pesan" => "Data gagal diupdate."));
                    }
                }
            }
        }
        if(isset($id)){
            $data = $model->getData($id);
        }
        $data['templateJudul'] = 'Tambah '. $this->halaman_label;
        $data['templateBreadcrumb'] = [$this->halaman_controller, 'tambah'] ;
        $data['controller'] = $this->halaman_controller;
        $data['metode']    = 'tambah';
        $data['label']    = $this->halaman_label;
        return view("admin/$this->halaman_controller/".$data['metode'], $data);
    }
}
