<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Summernote extends BaseController
{
    //upload image summernote
    function upload_image(){
        if($this->request->getFile('image')){
            $dataImage = $this->request->getFile('image');
            $fileName = $dataImage->getRandomName();
            $dataImage->move("upload/posts/", $fileName);
            echo base_url("upload/posts/$fileName");
        }
    }
    
    function upload_file(){
        if($this->request->getFile('file')){
            $dataFile = $this->request->getFile('file');
            $fileName = $dataFile->getRandomName();
            $dataFile->move("upload/posts/", $fileName);
            echo base_url("upload/posts/$fileName");
        }
    }

    //Delete image summernote
    function delete_image(){
        $src = $this->request->getVar('src');
        $file_name = str_replace(base_url()."/", '', $src);
        if(@unlink($file_name)){
            echo 'File Delete Successfully';
        }
    }
}
