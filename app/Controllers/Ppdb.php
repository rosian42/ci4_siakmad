<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SiswaModel;
use Config\Services;

class Ppdb extends BaseController
{
    function __construct()
    {

        $this->validation = \Config\Services::validation();

        helper('global_helper');
    }

    public function index()
    {
        $request = Services::request();
        $model = new SiswaModel($request);

        $status_ppdb = konfigurasi_get('status_ppdb')['konfigurasi_value'];
        if ($status_ppdb == 'active') {
            $data = [];
            if($this->request->getMethod()=="post"){
                if($this->request->getVar('kks_pip_pkh')=="Y"){ // cek value punya KKS
                    $ruleNoKKS = 'required';
                }else{
                    $ruleNoKKS = 'permit_empty';
                }
                if($this->request->getVar('jns_tinggal')==4 ||$this->request->getVar('jns_tinggal')==5){ // cek Jns Tinggal
                    $ruleNamaPondok = 'required';
                    $ruleAlamatPondok = 'required';
                }elseif($this->request->getVar('jns_tinggal')==3 ||$this->request->getVar('jns_tinggal')==6){
                    $ruleNamaPondok = 'permit_empty';
                    $ruleAlamatPondok = 'required';
                }else{
                    $ruleNamaPondok = 'permit_empty';
                    $ruleAlamatPondok = 'permit_empty';
                }
                $aturan = [
                    'stat_pd' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Pilih status peserta didik'
                        ]
                    ],
                    'nama_siswa' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Nama siswa harus diisi'
                        ]
                    ],
                    'nik' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'NIK Siswa harus diisi'
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
                    'gender' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Pilih jenis kelamin siswa'
                        ]
                    ],
                    'agama' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Pilih Agama Siswa'
                        ]
                    ],
                    'jml_saudara' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Jumlah saudara harus diisi'
                        ]
                    ],
                    'asal_sekolah' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Asal sekolah harus diisi'
                        ]
                    ],
                    'kks_pip_pkh' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Pilih punya KKS/PIP/PKH atau tidak'
                        ]
                    ],
                    'foto_siswa' => [
                        'rules' => 'is_image[foto_siswa]|mime_in[foto_siswa,image/jpg,image/jpeg,image/png]',
                        'errors' => [
                            'is_image' => 'Yang Anda upload bukan gambar',
                            'mime_in' => 'Ekstensi file yang anda upload tidak diijinkan. Upload gambar dengan ekstensi jpg | jpeg | png'
                        ]
                    ],
                    'alamat' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Alamat harus diisi'
                        ]
                    ],
                    'prop' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Pilih propinsi'
                        ]
                    ],
                    'kab' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Pilih Kabupaten'
                        ]
                    ],
                    'kec' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Pilih Kecamatan'
                        ]
                    ],
                    'desa' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Pilih Desa'
                        ]
                    ],
                    'kodepos' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Kodepos harus diisi'
                        ]
                    ],
                    'jns_tinggal' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Pilih jenis tempat tinggal'
                        ]
                    ],
                    'jarak' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Pilih jarak tempuh'
                        ]
                    ],
                    'transportasi' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Pilih transportasi'
                        ]
                    ],
                    'no_kk' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Nomor kartu keluarga harus diisi'
                        ]
                    ],
                    'nm_ayah' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Nama ayah harus diisi'
                        ]
                    ],
                    'nik_ayah' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'NIK ayah harus diisi'
                        ]
                    ],
                    'stts_ayah' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Pilih status ayah'
                        ]
                    ],
                    'hp_ayah' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'No. HP ayah harus diisi'
                        ]
                    ],
                    'pddk_ayah' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Pilih pendidikan terakhir ayah'
                        ]
                    ],
                    'kerja_ayah' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Pilih pekerjaan ayah'
                        ]
                    ],
                    'penghasilan_ayah' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Pilih penghasilan bulanan ayah'
                        ]
                    ],
                    'nm_ibu' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Nama ibu harus diisi'
                        ]
                    ],
                    'nik_ibu' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'NIK ibu harus diisi'
                        ]
                    ],
                    'stts_ibu' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Pilih status ibu'
                        ]
                    ],
                    'hp_ibu' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'No. HP ibu harus diisi'
                        ]
                    ],
                    'pddk_ibu' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Pilih pendidikan terakhir ibu'
                        ]
                    ],
                    'kerja_ibu' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Pilih pekerjaan ibu'
                        ]
                    ],
                    'penghasilan_ibu' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Pilih penghasilan bulanan ibu'
                        ]
                    ],
                    'nm_wali' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Nama wali harus diisi'
                        ]
                    ],
                    'hub_wali' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Hubungan wali dengan peserta didik harus diisi'
                        ]
                    ],
                    'stts_wali' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Pilih status wali'
                        ]
                    ],
                    'hp_wali' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'No. HP wali harus diisi'
                        ]
                    ],
                    'kerja_wali' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Pilih pekerjaan wali'
                        ]
                    ],
                    'penghasilan_wali' => [
                        'rules' => 'required',
                        'errors' => [
                            'required'=>'Pilih penghasilan bulanan wali'
                        ]
                    ],
                    'no_kks_pip_pkh' => [
                        'rules' => $ruleNoKKS,
                        'errors' => [
                            'required'=>'No. KKS/PIP/PKH harus diisi'
                        ]
                    ],
                    'nm_pondok' => [
                        'rules' => $ruleNamaPondok,
                        'errors' => [
                            'required'=>'Nama pondok / panti asuhan harus diisi'
                        ]
                    ],
                    'alamat_domisili' => [
                        'rules' => $ruleAlamatPondok,
                        'errors' => [
                            'required'=>'Alamat domisili tinggal harus diisi'
                        ]
                    ]
                ];
                
                $file = $this->request->getFile('foto_siswa');
    
                if(!$this->validate($aturan)){
                    return json_encode(array("msg" => "invalid", "validation" => $this->validation->getErrors()));
                }else{
                    $foto = "assets/admin/dist/img/no-pict.jpg";
                    if($file->getName()){
                        $nm_foto = $file->getRandomName();
                        $nmFolder    = str_replace( "'", "", $this->request->getVar('nama_siswa'));
                        $path = 'berkas/'.$this->halaman_controller.'/'.$nmFolder;
                        $foto = $path.'/'.$nm_foto;
                        $file->move($path, $nm_foto);
                    }
                    $record = [
                        'th_masuk' => $this->request->getVar('th_masuk'),
                        'nisn' => $this->request->getVar('nisn'),
                        'nik' => $this->request->getVar('nik'),
                        'nama_siswa' => $this->request->getVar('nama_siswa'),
                        'tmp_lahir' => $this->request->getVar('tmp_lahir'),
                        'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                        'gender' => $this->request->getVar('gender'),
                        'agama' => $this->request->getVar('agama'),
                        'stat_pd' => $this->request->getVar('stat_pd'),
                        'alamat' => $this->request->getVar('alamat'),
                        'desa' => $this->request->getVar('desa'),
                        'kec' => $this->request->getVar('kec'),
                        'kab' => $this->request->getVar('kab'),
                        'kodepos' => $this->request->getVar('kodepos'),
                        'prop' => $this->request->getVar('prop'),
                        'jml_saudara' => $this->request->getVar('jml_saudara'),
                        'asal_sekolah' => $this->request->getVar('asal_sekolah'),
                        'transportasi' => $this->request->getVar('transportasi'),
                        'kks_pip_pkh' => $this->request->getVar('kks_pip_pkh'),
                        'no_kks_pip_pkh' => $this->request->getVar('no_kks_pip_pkh'),
                        'jns_tinggal' => $this->request->getVar('jns_tinggal'),
                        'nm_pondok' => $this->request->getVar('nm_pondok'),
                        'alamat_domisili' => $this->request->getVar('alamat_domisili'),
                        'jarak' => $this->request->getVar('jarak'),
                        'no_kk' => $this->request->getVar('no_kk'),
                        'nm_ayah' => $this->request->getVar('nm_ayah'),
                        'nik_ayah' => $this->request->getVar('nik_ayah'),
                        'stts_ayah' => $this->request->getVar('stts_ayah'),
                        'hp_ayah' => $this->request->getVar('hp_ayah'),
                        'kerja_ayah' => $this->request->getVar('kerja_ayah'),
                        'pddk_ayah' => $this->request->getVar('pddk_ayah'),
                        'penghasilan_ayah' => $this->request->getVar('penghasilan_ayah'),
                        'nm_ibu' => $this->request->getVar('nm_ibu'),
                        'nik_ibu' => $this->request->getVar('nik_ibu'),
                        'stts_ibu' => $this->request->getVar('stts_ibu'),
                        'hp_ibu' => $this->request->getVar('hp_ibu'),
                        'kerja_ibu' => $this->request->getVar('kerja_ibu'),
                        'pddk_ibu' => $this->request->getVar('pddk_ibu'),
                        'penghasilan_ibu' => $this->request->getVar('penghasilan_ibu'),
                        'nm_wali' => $this->request->getVar('nm_wali'),
                        'hub_wali' => $this->request->getVar('hub_wali'),
                        'nik_wali' => $this->request->getVar('nik_wali'),
                        'stts_wali' => $this->request->getVar('stts_wali'),
                        'hp_wali' => $this->request->getVar('hp_wali'),
                        'kerja_wali' => $this->request->getVar('kerja_wali'),
                        'penghasilan_wali' => $this->request->getVar('penghasilan_wali'),
                        'foto_siswa' => $foto
                    ];
                    
                    $aksi = $model->simpanData($record);
                    if($aksi != false){
                        return json_encode(array("msg" => "success", "pesan" => "Data berhasil disimpan."));
                    }else{
                        return json_encode(array("msg" => "error", "pesan" => "Data gagal disimpan."));
                    }
                }
            }
            return view('front/form_ppdb', $data);
        } else {
            echo "Status PPDB inactive";
        }
        
        
    }
}
