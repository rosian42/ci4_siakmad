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
                @unlink($dataGuru['foto']);
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
                $row[] = '<a onclick="hapus('."'".$list->id_guru."'".'); return false;" role="button" class="btn btn-xs btn-danger" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>
                            <a role="button" href="javascript:void(0)" onclick="edit('."'".$list->id_guru."'".')" class="btn btn-xs btn-warning" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a> 
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

    public function tambah()
    {
        $request = Services::request();
        $model = new GuruModel($request);
        
        $data = [];
        

        if($this->request->getMethod()=="post"){
            if(empty($this->request->getVar('id_guru'))){
                $aturan = [
                    'nip' => [
                        'rules' => 'required|is_unique[tb_guru.nip]',
                        'errors' => [
                            'required'=>'NUPTK harus diisi',
                            'is_unique' => 'NUPTK '.$this->request->getVar('nip').' sudah ada.'
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
                    ],
                    'foto' => [
                        'rules' => 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                        'errors' => [
                            'is_image' => 'Yang Anda upload bukan gambar',
                            'mime_in' => 'Ekstensi file yang anda upload tidak diijinkan. Upload gambar dengan ekstensi jpg | jpeg | png'
                        ]
                    ]
                ];
                
                $file = $this->request->getFile('foto');
    
                if(!$this->validate($aturan)){
                    
                    echo json_encode(array("msg" => "invalid", "validation" => $this->validation->getErrors()));
                    
                }else{
                    $foto = "assets/admin/dist/img/no-pict.jpg";
                    if($file->getName()){
                        $nm_foto = $file->getRandomName();
                        $nmFolder    = str_replace( "'", "", $this->request->getVar('nama_lengkap'));
                        $path = 'berkas/'.$this->halaman_controller.'/'.$nmFolder;
                        $foto = $path.'/'.$nm_foto;
                        $file->move($path, $nm_foto);
                    }
                    
                    
                    $record = [
                        'nip' => $this->request->getVar('nip'),
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
                        
                        echo json_encode(array("msg" => "success", "pesan" => "Data berhasil disimpan."));
                        
                    }else{
                        echo json_encode(array("msg" => "error", "pesan" => "Data gagal disimpan."));
    
                    }
    
                }
            }else{
                $dataGuru = $model->getData($this->request->getVar('id_guru'));// ambil data guru
                if($dataGuru['nip']==$this->request->getVar('nip')){ // cek NIP diganti atau tidak
                    $ruleNIP = 'required';
                }else{
                    $ruleNIP = 'required|is_unique[tb_guru.nip]';
                }

                $aturan = [
                    'nip' => [
                        'rules' => $ruleNIP,
                        'errors' => [
                            'required'=>'NUPTK harus diisi',
                            'is_unique' => 'NUPTK '.$this->request->getVar('nip').' sudah ada.'
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
                    ],
                    'foto' => [
                        'rules' => 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                        'errors' => [
                            'is_image' => 'Yang Anda upload bukan gambar',
                            'mime_in' => 'Ekstensi file yang anda upload tidak diijinkan. Upload gambar dengan ekstensi jpg | jpeg | png'
                        ]
                    ]
                ];

                $file = $this->request->getFile('foto');
    
                if(!$this->validate($aturan)){
                    
                    echo json_encode(array("msg" => "invalid", "validation" => $this->validation->getErrors()));
                    
                }else{
                    $foto = $dataGuru['foto'];
                    if($file->getName()){
                        $nm_foto = $file->getRandomName();
                        $nmFolder    = str_replace( "'", "", $this->request->getVar('nama_lengkap'));
                        $path = 'berkas/'.$this->halaman_controller.'/'.$nmFolder;
                        $foto = $path.'/'.$nm_foto;
                        $file->move($path, $nm_foto);
                        @unlink($dataGuru['foto']);
                    }
                    
                    
                    $record = [
                        'id_guru' => $dataGuru['id_guru'],
                        'nip' => $this->request->getVar('nip'),
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
                        
                        echo json_encode(array("msg" => "success", "pesan" => "Data berhasil diupdate."));
                        
                    }else{
                        echo json_encode(array("msg" => "error", "pesan" => "Data gagal diupdate."));
    
                    }
    
                }
            }
            
            
        }
        
    }

    public function getData()
    {
        $request = Services::request();
        $model = new GuruModel($request);
        
        $data = [];
        
        $dataGuru = $model->getData($this->request->getVar('id'));

        if(empty($dataGuru)){
            echo json_encode(array("msg" => false));
        }else{
            echo json_encode(array("msg" => true, "data" => $dataGuru));
        }
        
    }
}
