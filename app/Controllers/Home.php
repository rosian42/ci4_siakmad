<?php

namespace App\Controllers;
use App\Models\PostModel;
use App\Models\CariModel;
use App\Models\GaleriModel;
use Config\Services;

class Home extends BaseController
{
    public $rowperpage = 4; 
    function __construct()
    {
        $this->m_post = new PostModel();
        
        $this->m_cari = new CariModel();
        helper('global_helper');
    }
    /*
    public function index()
    {
        $data = [];

        $post_type = 'artikel';
        $jumlah_baris = 5;
        $kata_kunci = '';
        $group_dataset = 'ft';

        /** Mengambil page_id konfigurasi untuk halaman depan  
        $konfigurasi_name = 'set_halaman_depan';
        $konfigurasi = konfigurasi_get($konfigurasi_name);
        $page_id = $konfigurasi['konfigurasi_value'];
        //dd($page_id);
        /** mengambil data dari PostModel untuk id page_id 
        $dataHalaman = $this->m_post->getPost($page_id);
        //dd($dataHalaman);
        $data['type'] = $dataHalaman['post_type'];
        $data['judul'] = $dataHalaman['post_title'];
        $data['deskripsi'] = $dataHalaman['post_description'];
        $data['thumbnail'] = $dataHalaman['post_thumbnail'];

        $hasil = $this->m_post->listPost($post_type, $jumlah_baris, $kata_kunci, $group_dataset);

        $data['record'] = $hasil['record'];
        $data['pager'] = $hasil['pager'];
        //echo view('depan/v_templateheader', $data);
        echo view('depan/v_home', $data);
        //echo view('depan/v_templatefooter', $data);
    }*/

    public function index()
    {
        return view('front/home');
    }

    function artikel($seo_title=null)
    {
        
        $post_type = 'artikel';
        $jumlah_baris = 6;
        $kata_kunci = '';
        $group_dataset = 'ft';

        $data = [];
        if(isset($seo_title)){
            $data['post'] = $this->m_post->getPostBySeo($seo_title);
            return view('front/single_post',$data);
            //echo $seo_title; 
        }
        $hasil = $this->m_post->listPost($post_type, $jumlah_baris, $kata_kunci, $group_dataset);

        $data['post_type'] = $post_type;
        $data['record'] = $hasil['record'];
        $data['pager'] = $hasil['pager'];
        return view('front/posts', $data);
        
    }

    function pengumuman($seo_title=null)
    {
        $post_type = 'pengumuman';
        $jumlah_baris = 6;
        $kata_kunci = '';
        $group_dataset = 'ft';

        $data = [];
        if(isset($seo_title)){
            $data['post'] = $this->m_post->getPostBySeo($seo_title);
            return view('front/single_post',$data);
        }
        $hasil = $this->m_post->listPost($post_type, $jumlah_baris, $kata_kunci, $group_dataset);

        $data['post_type'] = $post_type;
        $data['record'] = $hasil['record'];
        $data['pager'] = $hasil['pager'];
        return view('front/posts', $data);
    }

    function agenda($seo_title=null)
    {
        $post_type = 'agenda';
        $jumlah_baris = 6;
        $kata_kunci = '';
        $group_dataset = 'ft';

        $data = [];
        if(isset($seo_title)){
            $data['post'] = $this->m_post->getPostBySeo($seo_title);
            return view('front/single_post',$data);
        }
        $hasil = $this->m_post->listPost($post_type, $jumlah_baris, $kata_kunci, $group_dataset);

        $data['post_type'] = $post_type;
        $data['record'] = $hasil['record'];
        $data['pager'] = $hasil['pager'];
        return view('front/posts', $data);
    }

    function galeri($galeri_slug=null)
    {
        $request = Services::request();
        $model = new GaleriModel($request);
        $jumlah_baris = 6;
        $group_dataset = 'ft';

        $data = [];
        if(isset($galeri_slug)){
            $detailGaleri = new \App\Models\GaleriDetailModel;
            $data['galeri'] = $model->getGaleriBySlug($galeri_slug);
            $data['galeriDetail'] = $detailGaleri->where('galeri_id', $data['galeri']['galeri_id'])->findAll();
            return view('front/galeriDetail',$data);
        }
        
        $data['record'] = $model->where(['deleted_at'=>null])->paginate(6,'ft');
        $data['pager'] = $model->pager;
        
        return view('front/galeri', $data);
    }


    
}
