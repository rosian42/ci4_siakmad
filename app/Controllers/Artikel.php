<?php

namespace App\Controllers;
use App\Models\PostModel;

class Artikel extends BaseController
{
    function __construct()
    {
        
        $this->m_post = new PostModel();
        helper('global_helper');
    }
    /*
    public function index($seo_title=null)
    {
        $data = [];
        $dataArtikel = $this->m_post->getPostBySeo($seo_title);
        //dd($dataArtikel);
        $data['type'] = $dataArtikel['post_type'];
        if($data['type'] != 'artikel'){
        	return redirect()->to('');
        }

        $data['judul'] = $dataArtikel['post_title'];
        $data['deskripsi'] = $dataArtikel['post_description'];
        $data['konten'] = $dataArtikel['post_content'];
        $data['penulis'] = $dataArtikel['username'];
        $data['tanggal'] = $dataArtikel['post_time'];
        $data['thumbnail'] = $dataArtikel['post_thumbnail'];

        echo view('front/v_templateheader', $data);
        echo view('front/v_artikel', $data);
        echo view('front/v_templatefooter', $data);
    }
    */

    function index($seo_title=null)
    {
        $data = [];
        $dataArtikel = $this->m_post->getPostBySeo($seo_title);
        //dd($dataArtikel);
        $data['type'] = $dataArtikel['post_type'];
        if($data['type'] != 'artikel'){
            return redirect()->to('');
        }

        $data['judul'] = $dataArtikel['post_title'];
        $data['deskripsi'] = $dataArtikel['post_description'];
        $data['konten'] = $dataArtikel['post_content'];
        $data['penulis'] = $dataArtikel['username'];
        $data['tanggal'] = $dataArtikel['post_time'];
        $data['thumbnail'] = $dataArtikel['post_thumbnail'];

        
        return view('front/posts', $data);
        
    }
}
