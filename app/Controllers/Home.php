<?php

namespace App\Controllers;
use App\Models\PostModel;

class Home extends BaseController
{
    function __construct()
    {
        $this->m_post = new PostModel();
        helper('global_helper');
    }
    public function index()
    {
        $data = [];

        $post_type = 'artikel';
        $jumlah_baris = 5;
        $kata_kunci = '';
        $group_dataset = 'ft';

        /** Mengambil page_id konfigurasi untuk halaman depan */ 
        $konfigurasi_name = 'set_halaman_depan';
        $konfigurasi = konfigurasi_get($konfigurasi_name);
        $page_id = $konfigurasi['konfigurasi_value'];
        //dd($page_id);
        /** mengambil data dari PostModel untuk id page_id */
        $dataHalaman = $this->m_post->getPost($page_id);
        //dd($dataHalaman);
        $data['type'] = $dataHalaman['post_type'];
        $data['judul'] = $dataHalaman['post_title'];
        $data['deskripsi'] = $dataHalaman['post_description'];
        $data['thumbnail'] = $dataHalaman['post_thumbnail'];

        $hasil = $this->m_post->listPost($post_type, $jumlah_baris, $kata_kunci, $group_dataset);
        $data['record'] = $hasil['record'];
        $data['pager'] = $hasil['pager'];
        echo view('depan/v_templateheader', $data);
        echo view('depan/v_home', $data);
        echo view('depan/v_templatefooter', $data);
    }
}
