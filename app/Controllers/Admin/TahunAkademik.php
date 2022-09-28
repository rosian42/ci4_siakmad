<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\TahunAkademikModel;

use Config\Services;

class TahunAkademik extends BaseController
{
    function __construct()
    {
        
        $this->validation = \Config\Services::validation();
        
        helper('global_helper');
        //untuk konfigurasi internal
        $this->halaman_controller = "tahunakademik";
        $this->halaman_label = "Tahun Akademik";
    }

    public function index()
    {
        $request = Services::request();
        $datatable = new TahunAkademikModel($request);

        $data = [];
        if($this->request->getVar('aksi')=='hapus' && $this->request->getVar('id')){
			$dataTahunAkademik = $datatable->getData($this->request->getVar('id'));
			if($dataTahunAkademik['id_tahun_akademik']){ #memastikan ada data
				
				$aksi = $datatable->hapus($this->request->getVar('id'));
				if($aksi == true){
					session()->setFlashdata('success', 'Data telah dihapus');
				}else{
					session()->setFlashdata('warning', ['Data gagal dihapus']);
				}
			}
			return redirect()->to("admin/".$this->halaman_controller);
		}
        $data['templateJudul'] = $this->halaman_label;

        return view("admin/".$this->halaman_controller."/view", $data);
    }

    function ajaxList()
    {
        $request = Services::request();
        $datatable = new TahunAkademikModel($request);

        if ($request->getMethod(true) === 'POST') {
            $lists = $datatable->getDatatables();
            $data = [];
            $no = $request->getPost('start');

            foreach ($lists as $list) {
                $link_delete = site_url("admin/$this->halaman_controller/?aksi=hapus&id=").$list->id_tahun_akademik;
                $link_edit = site_url("admin/$this->halaman_controller/edit/").$list->id_tahun_akademik;
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list->tahun_akademik;
                $row[] = $list->semester==1?'Ganjil':'Genap';
                $row[] = $list->is_aktif=='Y'?'Aktif':'Tidak Aktif';
                $row[] = '<a href="'.$link_delete.'" onclick="return confirm("Yakin akan menghapus data ini?")" class="btn btn-sm btn-danger"> Del</a>
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
        $model = new TahunAkademikModel($request);
        
        $data = [];
        $data['templateJudul'] = $this->halaman_label;
        $data['controller'] = $this->halaman_controller;
        $data['metode']    = 'tambah';
        $data['validation'] = $this->validation;

        if($this->request->getMethod()=="post"){
            $data = $this->request->getVar(); //Setiap yang diinput akan dikembalikan ke view
            $aturan = [
                'tahun_akademik' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Tahun akademik harus diisi'
                    ]
                ],
                'semester' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Pilih Semester'
                    ]
                ],
                'is_aktif' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Pilih aktif atau tidak aktif'
                    ]
                ]
            ];
            

            if(!$this->validate($aturan)){
                //session()->setFlashdata('warning', $this->validation->getErrors());
                //$validation = \Config\Services::validation();
                //dd($validation);
                return redirect()->to('admin/'.$this->halaman_controller.'/tambah')->withInput()->with('validation', $this->validation);
            }else{
                
                $record = [
                    'tahun_akademik' => $this->request->getVar('tahun_akademik'),
                    'semester' => $this->request->getVar('semester'),
                    'is_aktif' => $this->request->getVar('is_aktif')
                ];
                
                $aksi = $model->simpanData($record);
                if($aksi != false){
                    $id = $aksi;
                    
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
        $model = new TahunAkademikModel($request);
        
        $data = [];
        $dataTahunAkademik = $model->getData($id);
		if(empty($dataTahunAkademik)){
			return redirect()->to('admin/'.$this->halaman_controller);
		}
		$data = $dataTahunAkademik;
		if($this->request->getMethod()=="post"){
			$data = $this->request->getVar(); //Setiap yang diinput akan dikembalikan ke view
			$aturan = [
                'tahun_akademik' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Tahun akademik harus diisi'
                    ]
                ],
                'semester' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'=>'Pilih Semester'
                    ]
                ],
                'is_aktif' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Pilih aktif atau tidak aktif'
                    ]
                ]
            ];
			

			if(!$this->validate($aturan)){
				return redirect()->to('admin/'.$this->halaman_controller.'/tambah')->withInput()->with('validation', $this->validation);
			}else{
				
				$record = [
                    'tahun_akademik' => $this->request->getVar('tahun_akademik'),
                    'semester' => $this->request->getVar('semester'),
                    'is_aktif' => $this->request->getVar('is_aktif'),
                    'id_tahun_akademik' => $id
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
