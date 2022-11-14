<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KonfigurasiModel;

class Konfigurasi extends BaseController
{
    function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->konfigurasiModel = new KonfigurasiModel();
        helper('global_helper');
        //untuk konfigurasi internal
        $this->halaman_controller = "konfigurasi";
        $this->halaman_label = "Konfigurasi";
    }

    public function index()
    {
        $data = [];

        
        $data['web_title'] = konfigurasi_get('web_title')['konfigurasi_value'];
        $data['tagline'] = konfigurasi_get('tagline')['konfigurasi_value'];
        $data['meta_description'] = konfigurasi_get('meta_description')['konfigurasi_value'];
        $data['meta_keyword'] = konfigurasi_get('meta_keyword')['konfigurasi_value'];
        $data['logo'] = konfigurasi_get('logo')['konfigurasi_value'];
        $data['favicon'] = konfigurasi_get('favicon')['konfigurasi_value'];
        $data['nama_sekolah'] = konfigurasi_get('nama_sekolah')['konfigurasi_value'];
        $data['npsn'] = konfigurasi_get('npsn')['konfigurasi_value'];
        $data['deskripsi_sekolah'] = konfigurasi_get('deskripsi_sekolah')['konfigurasi_value'];
        $data['alamat_sekolah'] = konfigurasi_get('alamat_sekolah')['konfigurasi_value'];
        $data['no_telp'] = konfigurasi_get('no_telp')['konfigurasi_value'];
        $data['no_wa'] = konfigurasi_get('no_wa')['konfigurasi_value'];
        $data['email'] = konfigurasi_get('email')['konfigurasi_value'];
        $data['logo_sekolah'] = konfigurasi_get('logo_sekolah')['konfigurasi_value'];
        $data['kop_surat'] = konfigurasi_get('kop_surat')['konfigurasi_value'];
        $data['website'] = konfigurasi_get('website')['konfigurasi_value'];
        
        $data['templateJudul'] = $this->halaman_label;
        $data['controller'] = $this->halaman_controller;
        $data['metode']    = 'index';
        return view("admin/".$this->halaman_controller."/view", $data);
    }

    function simpanKonfigurasiWebsite()
    {
        if($this->request->getMethod() == 'post'){
            /** Kombinasi Nama dan Value 
             * konfigurasi_name = set_socials_twitter
             * konfigurasi_value = link
            */
            
            if($this->request->getVar('group')=='website'){
                if(!empty($this->request->getVar('web_title'))){
                    $konfigurasi_name = "web_title";
                    $dataSimpan = [
                        'konfigurasi_value' => $this->request->getVar('web_title'),
                        'konfigurasi_group' => 'umum',
                        'konfigurasi_default' => 'SIAKMAD'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }else{
                    $konfigurasi_name = "web_title";
                    $dataSimpan = [
                        'konfigurasi_value' => null,
                        'konfigurasi_group' => 'umum',
                        'konfigurasi_default' => 'SIAKMAD'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }

                if(!empty($this->request->getVar('tagline'))){
                    $konfigurasi_name = "tagline";
                    $dataSimpan = [
                        'konfigurasi_value' => $this->request->getVar('tagline'),
                        'konfigurasi_group' => 'umum',
                        'konfigurasi_default' => 'Sistem Informasi Akademik Madrasah'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }else{
                    $konfigurasi_name = "tagline";
                    $dataSimpan = [
                        'konfigurasi_value' => null,
                        'konfigurasi_group' => 'umum',
                        'konfigurasi_default' => 'Sistem Informasi Akademik Madrasah'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }

                if(!empty($this->request->getVar('meta_description'))){
                    $konfigurasi_name = "meta_description";
                    $dataSimpan = [
                        'konfigurasi_value' =>$this->request->getVar('meta_description'),
                        'konfigurasi_group' => 'umum',
                        'konfigurasi_default' => 'SIAKMAD adalah Sistem Informasi Akademik Untuk Madrasah Ibtidaiyyah / Sekolah Dasar'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }else{
                    $konfigurasi_name = "meta_description";
                    $dataSimpan = [
                        'konfigurasi_value' =>null,
                        'konfigurasi_group' => 'umum',
                        'konfigurasi_default' => 'SIAKMAD adalah Sistem Informasi Akademik Untuk Madrasah Ibtidaiyyah / Sekolah Dasar'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }

                if(!empty($this->request->getVar('meta_keyword'))){
                    $konfigurasi_name = "meta_keyword";
                    $dataSimpan = [
                        'konfigurasi_value' => $this->request->getVar('meta_keyword'),
                        'konfigurasi_group' => 'umum',
                        'konfigurasi_default' => 'siakad, sistem informasi, sistem informasi akademik, siakad sekolah, siakad online, ppdb sekolah, ppdb online'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }else{
                    $konfigurasi_name = "meta_keyword";
                    $dataSimpan = [
                        'konfigurasi_value' => null,
                        'konfigurasi_group' => 'umum',
                        'konfigurasi_default' => 'siakad, sistem informasi, sistem informasi akademik, siakad sekolah, siakad online, ppdb sekolah, ppdb online'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }
                
                $fileLogo = $this->request->getFile('logo');
                if(!empty($fileLogo)){
                    if($fileLogo->getName()){
                        $nm_logo = $fileLogo->getRandomName();
                        $path = 'upload/'.$this->halaman_controller;
                        if($fileLogo->move($path, $nm_logo)){
                            $konfigurasi_name = "logo";
                            $dataSimpan = [
                                'konfigurasi_value' => $path.'/'.$nm_logo,
                                'konfigurasi_group' => 'umum',
                                'konfigurasi_default' => 'assets/front/images/logo.png'
                            ];
                            konfigurasi_set($konfigurasi_name, $dataSimpan);
                        };      
                    }
                }else{
                    $konfigurasi_name = "logo";
                    $dataSimpan = [
                        'konfigurasi_value' => konfigurasi_get('logo')['konfigurasi_value'],
                        'konfigurasi_group' => 'umum',
                        'konfigurasi_default' => 'assets/front/images/logo.png'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }

                $fileFav = $this->request->getFile('favicon');
                if(!empty($fileFav)){
                    if($fileFav->getName()){
                        $nm_favicon = $fileFav->getRandomName();
                        $path = 'upload/'.$this->halaman_controller;
                        if($fileFav->move($path, $nm_favicon)){
                            $konfigurasi_name = "favicon";
                            $dataSimpan = [
                                'konfigurasi_value' => $path.'/'.$nm_favicon,
                                'konfigurasi_group' => 'umum',
                                'konfigurasi_default' => 'assets/front/images/fav.ico'
                            ];
                            konfigurasi_set($konfigurasi_name, $dataSimpan);
                        };
                    }
                }else{
                    $konfigurasi_name = "favicon";
                    $dataSimpan = [
                        'konfigurasi_value' => konfigurasi_get('favicon')['konfigurasi_value'],
                        'konfigurasi_group' => 'umum',
                        'konfigurasi_default' => 'assets/front/images/fav.ico'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }

                return json_encode(array("msg" => "success", "pesan" => "Data berhasil disimpan."));
            }
            
            if($this->request->getVar('group')=='profil'){
                if(!empty($this->request->getVar('npsn'))){
                    $konfigurasi_name = "npsn";
                    $dataSimpan = [
                        'konfigurasi_value' => $this->request->getVar('npsn'),
                        'konfigurasi_group' => 'profil_sekolah',
                        'konfigurasi_default' => '123456'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }else{
                    $konfigurasi_name = "npsn";
                    $dataSimpan = [
                        'konfigurasi_value' => null,
                        'konfigurasi_group' => 'profil_sekolah',
                        'konfigurasi_default' => '123456'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }

                if(!empty($this->request->getVar('nama_sekolah'))){
                    $konfigurasi_name = "nama_sekolah";
                    $dataSimpan = [
                        'konfigurasi_value' => $this->request->getVar('nama_sekolah'),
                        'konfigurasi_group' => 'profil_sekolah',
                        'konfigurasi_default' => 'MI SIAKMAD WATES'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }else{
                    $konfigurasi_name = "nama_sekolah";
                    $dataSimpan = [
                        'konfigurasi_value' => null,
                        'konfigurasi_group' => 'profil_sekolah',
                        'konfigurasi_default' => 'MI SIAKMAD WATES'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }

                if(!empty($this->request->getVar('deskripsi_sekolah'))){
                    $konfigurasi_name = "deskripsi_sekolah";
                    $dataSimpan = [
                        'konfigurasi_value' => $this->request->getVar('deskripsi_sekolah'),
                        'konfigurasi_group' => 'profil_sekolah',
                        'konfigurasi_default' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }else{
                    $konfigurasi_name = "deskripsi_sekolah";
                    $dataSimpan = [
                        'konfigurasi_value' => null,
                        'konfigurasi_group' => 'profil_sekolah',
                        'konfigurasi_default' => 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }

                if(!empty($this->request->getVar('alamat_sekolah'))){
                    $konfigurasi_name = "alamat_sekolah";
                    $dataSimpan = [
                        'konfigurasi_value' => $this->request->getVar('alamat_sekolah'),
                        'konfigurasi_group' => 'profil_sekolah',
                        'konfigurasi_default' => 'Dsn. Sumberbening Ds. Sumberagung Kec. Wates Kab. Kediri'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }else{
                    $konfigurasi_name = "alamat_sekolah";
                    $dataSimpan = [
                        'konfigurasi_value' => null,
                        'konfigurasi_group' => 'profil_sekolah',
                        'konfigurasi_default' => 'Dsn. Sumberbening Ds. Sumberagung Kec. Wates Kab. Kediri'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }

                if(!empty($this->request->getVar('no_telp'))){
                    $konfigurasi_name = "no_telp";
                    $dataSimpan = [
                        'konfigurasi_value' => $this->request->getVar('no_telp'),
                        'konfigurasi_group' => 'profil_sekolah',
                        'konfigurasi_default' => '089606230110'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }else{
                    $konfigurasi_name = "no_telp";
                    $dataSimpan = [
                        'konfigurasi_value' => null,
                        'konfigurasi_group' => 'profil_sekolah',
                        'konfigurasi_default' => '089606230110'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }

                if(!empty($this->request->getVar('no_wa'))){
                    $konfigurasi_name = "no_wa";
                    $dataSimpan = [
                        'konfigurasi_value' => $this->request->getVar('no_wa'),
                        'konfigurasi_group' => 'profil_sekolah',
                        'konfigurasi_default' => '089606230110'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }else{
                    $konfigurasi_name = "no_wa";
                    $dataSimpan = [
                        'konfigurasi_value' => null,
                        'konfigurasi_group' => 'profil_sekolah',
                        'konfigurasi_default' => '089606230110'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }
                if(!empty($this->request->getVar('email'))){
                    $konfigurasi_name = "email";
                    $dataSimpan = [
                        'konfigurasi_value' => $this->request->getVar('email'),
                        'konfigurasi_group' => 'profil_sekolah',
                        'konfigurasi_default' => 'rosian42@gmail.com'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }else{
                    $konfigurasi_name = "email";
                    $dataSimpan = [
                        'konfigurasi_value' => null,
                        'konfigurasi_group' => 'profil_sekolah',
                        'konfigurasi_default' => 'rosian42@gmail.com'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }
                if(!empty($this->request->getVar('website'))){
                    $konfigurasi_name = "website";
                    $dataSimpan = [
                        'konfigurasi_value' => $this->request->getVar('website'),
                        'konfigurasi_group' => 'profil_sekolah',
                        'konfigurasi_default' => 'rosian42.com'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }else{
                    $konfigurasi_name = "website";
                    $dataSimpan = [
                        'konfigurasi_value' => null,
                        'konfigurasi_group' => 'profil_sekolah',
                        'konfigurasi_default' => 'rosian42.com'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }
                if(!empty($this->request->getVar('facebook'))){
                    $konfigurasi_name = "facebook";
                    $dataSimpan = [
                        'konfigurasi_value' => $this->request->getVar('facebook'),
                        'konfigurasi_group' => 'profil_sekolah',
                        'konfigurasi_default' => 'facebook.com'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }else{
                    $konfigurasi_name = "facebook";
                    $dataSimpan = [
                        'konfigurasi_value' => null,
                        'konfigurasi_group' => 'profil_sekolah',
                        'konfigurasi_default' => 'facebook.com'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }
                if(!empty($this->request->getVar('twitter'))){
                    $konfigurasi_name = "twitter";
                    $dataSimpan = [
                        'konfigurasi_value' => $this->request->getVar('twitter'),
                        'konfigurasi_group' => 'profil_sekolah',
                        'konfigurasi_default' => 'twitter.com'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }else{
                    $konfigurasi_name = "twitter";
                    $dataSimpan = [
                        'konfigurasi_value' => null,
                        'konfigurasi_group' => 'profil_sekolah',
                        'konfigurasi_default' => 'twitter.com'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }
                if(!empty($this->request->getVar('youtube'))){
                    $konfigurasi_name = "youtube";
                    $dataSimpan = [
                        'konfigurasi_value' => $this->request->getVar('youtube'),
                        'konfigurasi_group' => 'profil_sekolah',
                        'konfigurasi_default' => 'youtube.com'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }else{
                    $konfigurasi_name = "youtube";
                    $dataSimpan = [
                        'konfigurasi_value' => null,
                        'konfigurasi_group' => 'profil_sekolah',
                        'konfigurasi_default' => 'youtube.com'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }
                $fileLogoSekolah = $this->request->getFile('logo_sekolah');
                if(!empty($fileLogoSekolah)){
                    if($fileLogoSekolah->getName()){
                        $nm_logo = $fileLogoSekolah->getRandomName();
                        $path = 'upload/'.$this->halaman_controller;
                        if($fileLogoSekolah->move($path, $nm_logo)){
                            $konfigurasi_name = "logo_sekolah";
                            $dataSimpan = [
                                'konfigurasi_value' => $path.'/'.$nm_logo,
                                'konfigurasi_group' => 'profil_sekolah',
                                'konfigurasi_default' => 'assets/front/images/logo.png'
                            ];
                            konfigurasi_set($konfigurasi_name, $dataSimpan);
                        }
                    }
                }else{
                    $konfigurasi_name = "logo_sekolah";
                    $dataSimpan = [
                        'konfigurasi_value' => konfigurasi_get('logo_sekolah')['konfigurasi_value'],
                        'konfigurasi_group' => 'profil_sekolah',
                        'konfigurasi_default' => 'assets/front/images/logo.png'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }
                $fileKop = $this->request->getFile('kop_surat');
                if(!empty($fileKop)){
                    if($fileKop->getName()){
                        $nm_kop = $fileKop->getRandomName();
                        $path = 'upload/'.$this->halaman_controller;
                        if($fileKop->move($path, $nm_kop)){
                            $konfigurasi_name = "kop_surat";
                            $dataSimpan = [
                                'konfigurasi_value' => $path.'/'.$nm_kop,
                                'konfigurasi_group' => 'profil_sekolah',
                                'konfigurasi_default' => 'assets/front/images/kop.png'
                            ];
                            konfigurasi_set($konfigurasi_name, $dataSimpan);
                        }
                    }
                }else{
                    $konfigurasi_name = "kop_surat";
                    $dataSimpan = [
                        'konfigurasi_value' => konfigurasi_get('kop_surat')['konfigurasi_value'],
                        'konfigurasi_group' => 'profil_sekolah',
                        'konfigurasi_default' => 'assets/front/images/kop.png'
                    ];
                    konfigurasi_set($konfigurasi_name, $dataSimpan);
                }
                return json_encode(array("msg" => "success", "pesan" => "Data berhasil disimpan."));
            }

            if($this->request->getVar('group')=='ppdb'){
                
            }
        }
    }

    function ppdb()
    {
        $data = [];

        
        $data['status_ppdb'] = konfigurasi_get('status_ppdb')['konfigurasi_value'];
        $data['tahun_ppdb'] = konfigurasi_get('tahun_ppdb')['konfigurasi_value'];
        $data['kuota_ppdb'] = konfigurasi_get('kuota_ppdb')['konfigurasi_value'];
        $data['mulai_ppdb'] = konfigurasi_get('mulai_ppdb')['konfigurasi_value'];
        $data['akhir_ppdb'] = konfigurasi_get('akhir_ppdb')['konfigurasi_value'];

        if($this->request->getMethod() == 'post'){
            if(!empty($this->request->getVar('status_ppdb'))){
                $konfigurasi_name = "status_ppdb";
                $dataSimpan = [
                    'konfigurasi_value' => $this->request->getVar('status_ppdb'),
                    'konfigurasi_group' => $this->request->getVar('group'),
                    'konfigurasi_default' => 'inactive'
                ];
                konfigurasi_set($konfigurasi_name, $dataSimpan);
            }else{
                $konfigurasi_name = "status_ppdb";
                $dataSimpan = [
                    'konfigurasi_value' => null,
                    'konfigurasi_group' => $this->request->getVar('group'),
                    'konfigurasi_default' => 'inactive'
                ];
                konfigurasi_set($konfigurasi_name, $dataSimpan);
            }

            if(!empty($this->request->getVar('tahun_ppdb'))){
                $konfigurasi_name = "tahun_ppdb";
                $dataSimpan = [
                    'konfigurasi_value' => $this->request->getVar('tahun_ppdb'),
                    'konfigurasi_group' => $this->request->getVar('group'),
                    'konfigurasi_default' => null
                ];
                konfigurasi_set($konfigurasi_name, $dataSimpan);
            }else{
                $konfigurasi_name = "tahun_ppdb";
                $dataSimpan = [
                    'konfigurasi_value' => null,
                    'konfigurasi_group' => $this->request->getVar('group'),
                    'konfigurasi_default' => null
                ];
                konfigurasi_set($konfigurasi_name, $dataSimpan);
            }
            if(!empty($this->request->getVar('kuota_ppdb'))){
                $konfigurasi_name = "kuota_ppdb";
                $dataSimpan = [
                    'konfigurasi_value' => $this->request->getVar('kuota_ppdb'),
                    'konfigurasi_group' => $this->request->getVar('group'),
                    'konfigurasi_default' => null
                ];
                konfigurasi_set($konfigurasi_name, $dataSimpan);
            }else{
                $konfigurasi_name = "kuota_ppdb";
                $dataSimpan = [
                    'konfigurasi_value' => null,
                    'konfigurasi_group' => $this->request->getVar('group'),
                    'konfigurasi_default' => null
                ];
                konfigurasi_set($konfigurasi_name, $dataSimpan);
            }
            if(!empty($this->request->getVar('mulai_ppdb'))){
                $konfigurasi_name = "mulai_ppdb";
                $dataSimpan = [
                    'konfigurasi_value' => $this->request->getVar('mulai_ppdb'),
                    'konfigurasi_group' => $this->request->getVar('group'),
                    'konfigurasi_default' => null
                ];
                konfigurasi_set($konfigurasi_name, $dataSimpan);
            }else{
                $konfigurasi_name = "mulai_ppdb";
                $dataSimpan = [
                    'konfigurasi_value' => null,
                    'konfigurasi_group' => $this->request->getVar('group'),
                    'konfigurasi_default' => null
                ];
                konfigurasi_set($konfigurasi_name, $dataSimpan);
            }
            if(!empty($this->request->getVar('akhir_ppdb'))){
                $konfigurasi_name = "akhir_ppdb";
                $dataSimpan = [
                    'konfigurasi_value' => $this->request->getVar('akhir_ppdb'),
                    'konfigurasi_group' => $this->request->getVar('group'),
                    'konfigurasi_default' => null
                ];
                konfigurasi_set($konfigurasi_name, $dataSimpan);
            }else{
                $konfigurasi_name = "akhir_ppdb";
                $dataSimpan = [
                    'konfigurasi_value' => null,
                    'konfigurasi_group' => $this->request->getVar('group'),
                    'konfigurasi_default' => null
                ];
                konfigurasi_set($konfigurasi_name, $dataSimpan);
            }
            return json_encode(array("msg" => "success", "pesan" => "Data berhasil disimpan."));
        }
        
        $data['templateJudul'] = $this->halaman_label." PPDB";
        $data['controller'] = $this->halaman_controller;
        $data['metode']    = 'ppdb';
        return view("admin/".$this->halaman_controller."/".$data['metode'], $data);
    }
}
