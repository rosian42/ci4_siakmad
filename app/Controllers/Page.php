<?php

namespace App\Controllers;
use App\Models\PostModel;

class Page extends BaseController
{
    function __construct()
    {
        
        $this->m_post = new PostModel();
        helper('global_helper');
    }
    public function index($seo_title)
    {
        $data = [];
        $dataArtikel = $this->m_post->getPostBySeo($seo_title);
        //dd($dataArtikel);
        $data['type'] = $dataArtikel['post_type'];
        if($data['type'] != 'page'){
        	return redirect()->to('');
        }

        $data['judul'] = $dataArtikel['post_title'];
        $data['deskripsi'] = $dataArtikel['post_description'];
        $data['konten'] = $dataArtikel['post_content'];
        $data['penulis'] = $dataArtikel['username'];
        $data['tanggal'] = $dataArtikel['post_time'];
        $data['thumbnail'] = $dataArtikel['post_thumbnail'];

        echo view('depan/v_templateheader', $data);
        echo view('depan/v_page', $data);
        echo view('depan/v_templatefooter', $data);
    }
}
