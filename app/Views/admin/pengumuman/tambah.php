<?= $this->extend('layout/admin');?>
<?= $this->section('content');?>
<!-- Select2 -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/select2/css/select2.min.css">
<link rel="stylesheet"
    href="<?=base_url('assets/admin');?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- summernote -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/summernote/summernote-bs4.min.css">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<!-- Toastr -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/toastr/toastr.min.css">
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/bootstrap-tagsinput/tagsinput.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/dist/css/adminlte.min.css">
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?=$templateJudul;?></h1>
            </div>
            <div class="col-sm-6">
                <div class="float-right">
                    <a class="btn btn-sm btn-primary" href="<?=base_url("admin/$controller")?>">Daftar</a>
                    <a class="btn btn-sm btn-success" href="<?=base_url("admin/$controller/tambah")?>">Tambah</a>
                </div>
            </div>

        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">

                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" id="form_simpan" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group row ">
                                <label class="col-sm-3 col-form-label">Judul Pengumuman</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" hidden id="post_id" name="post_id"
                                        value="<?php echo (isset($post_id))?$post_id:""?>" />
                                    <input type="text" class="form-control" id="post_title"
                                        placeholder="Judul Pengumuman" name="post_title"
                                        value="<?php echo (isset($post_title))?$post_title:""?>">
                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select name="post_status" id="post_status" class="form-control select2">
                                        <option></option>
                                        <option value="active"
                                            <?php echo (isset($post_status) && $post_status=="active")?"selected":"";?>>
                                            Aktif </option>
                                        <option value="inactive"
                                            <?php echo (isset($post_status) && $post_status=="inactive")?"selected":"";?>>
                                            Tidak Aktif </option>
                                    </select>
                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                            </div>

                            <div class="form-group row ">
                                <label class="col-sm-3 col-form-label">Deskripsi</label>
                                <div class="col-sm-9">

                                    <textarea class="form-control" id="post_description" name="post_description"
                                        rows="3"><?php echo (isset($post_description))?$post_description:""?></textarea>
                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                            </div>

                            <div class="form-group row ">
                                <label class="col-sm-3 col-form-label">Konten</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control summernote" id="post_content" name="post_content"
                                        rows="10"><?php echo (isset($post_content))?$post_content:""?></textarea>

                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="post_keyword">Keyword</label>
                                <div class="col-sm-9">
                                    <input type="text" id="post_keyword" class="form-control" placeholder="Pisahkan Keyword dengan koma" name="post_keyword" value="<?php echo (isset($post_keyword))?$post_keyword:""?>" data-role="tagsinput">
                                    
                                </div>
                            </div>


                            <div class="form-group row ">
                                <label class="col-sm-3 col-form-label">Gambar Utama</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" accept="image/*" class="custom-file-input"
                                                id="post_thumbnail" name="post_thumbnail"
                                                oninput="pic.src=window.URL.createObjectURL(this.files[0])"> >
                                            <label class="custom-file-label" for="post_thumbnail">Choose file</label>
                                        </div>

                                    </div>

                                    <div id="slider_img_invalid" class="invalid-feedback">

                                    </div>

                                    <div class="col-sm-4 pt-2">
                                        <div class="position-relative">
                                            <img id="pic"
                                                <?php echo(isset($post_thumbnail))?"src='".base_url($post_thumbnail)."'":""?>
                                                class="img-fluid" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="button" onclick="simpan()" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->


            </div>
            <!--/.col (left) -->

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

<!-- jQuery -->
<script src="<?=base_url('assets/admin');?>/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url('assets/admin');?>/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets/admin');?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/bootstrap-tagsinput/tagsinput.js"></script>
<!-- Select2 -->
<script src="<?=base_url('assets/admin');?>/plugins/select2/js/select2.full.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?=base_url('assets/admin');?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?=base_url('assets/admin');?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?=base_url('assets/admin');?>/plugins/toastr/toastr.min.js"></script>
<!-- InputMask -->
<script src="<?=base_url('assets/admin');?>/plugins/moment/moment.min.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?=base_url('assets/admin');?>/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=base_url('assets/admin');?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
</script>
<!-- Summernote -->
<script src="<?=base_url('assets/admin');?>/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/summernote/summernote-file.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/summernote/summernote-ext-rtl.js"></script>

<!-- AdminLTE App -->
<script src="<?=base_url('assets/admin');?>/dist/js/adminlte.js"></script>

<script>
$(function() {

    $('.select2').select2({
        placeholder: "----Pilih Opsi----",
        allowClear: true
    });
    bsCustomFileInput.init();

    $('.summernote').summernote({
        dialogsInBody: true,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['font', ['strikethrough', 'superscript', 'subscript']],

            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['ltr', 'rtl', 'link', 'picture', 'video', 'file']],
            ['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']],
        ],
        height: "300px",
        callbacks: {

            onImageUpload: function(image) {

                uploadImage(image[0]);
                /*for (let i=0; i<image.length; i++) {
                	$.upload(image[i]);
                }*/
            },
            onMediaDelete: function(target) {
                deleteImage(target[0].src);
            },
            onFileUpload: function(file) {
                myOwnCallBack(file[0]);
            }
        }

    });
    $('#reservationdate').datetimepicker({
        format: 'YYYY-MM-DD',
        viewMode: 'years'

    });

});

function simpan() {
    //var form = $('#form_simpan');
    var data = new FormData($("#form_simpan")[0]);
    $('#form_simpan').find('.invalid-feedback').text('');
    Swal.fire({
        title: 'Anda yakin akan menyimpan data ??',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        allowOutsideClick: false,

    }).then((result) => {

        if (result.isConfirmed) {
            $.ajax({
                url: "<?php echo site_url("admin/$controller/tambah");?>",
                type: "post",
                data: data,
                processData: false,
                contentType: false,
                dataType: 'json',
                beforeSend: function() {
                    Swal.fire({
                        title: 'Please Wait!!',
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading()
                        },
                    });
                },
                success: function(data) {
                    Swal.close();
                    //$(".overlay").css("display","none");
                    if (data.msg == 'success') {

                        Swal.fire({
                            icon: 'success',
                            title: 'Data berhasil disimpan',
                            showDenyButton: true,
                            showCancelButton: true,
                            confirmButtonText: 'Kembali Ke Daftar',
                            denyButtonText: 'Tambah Pengumuman',
                            denyButtonColor: '#3085d6',
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "<?=base_url("admin/$controller")?>";
                            } else if (result.isDenied) {
                                window.location.href =
                                    "<?=base_url("admin/$controller/tambah")?>";
                            } else {
                                $('#post_id').val(data.post_id);
                            }

                        })

                    } else if (data.msg == 'invalid') {

                        Swal.fire({
                            icon: 'warning',
                            title: 'Periksa kembali data!!',
                            allowOutsideClick: false,
                        }).then(() => {
                            $.each(data.validation, function(key, value) {
                                if (key != post_thumbnail) {
                                    $('#' + key).addClass('is-invalid');

                                    $('#' + key).parents('.form-group').find(
                                            '.invalid-feedback')
                                        .text(value);
                                } else {
                                    $('#' + key).addClass('is-invalid');

                                    $('#slider_img_invalid').text(value);
                                }
                            });
                        })



                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Data gagal disimpan',
                            allowOutsideClick: false,
                        })
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    //$(".overlay").css("display","none");
                    console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        }
    })

}

function uploadImage(image) {
    var data = new FormData();
    data.append("image", image, image.name);
    $.ajax({
        url: "<?php echo site_url('admin/summernote/upload_image')?>",
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: "POST",
        success: function(url) {
            $('.summernote').summernote("insertImage", url);
        },
        error: function(data) {
            console.log(data);
        }
    });
}

function deleteImage(src) {
    $.ajax({
        data: {
            src: src
        },
        type: "POST",
        url: "<?php echo site_url('admin/summernote/delete_image')?>",
        cache: false,
        success: function(response) {
            console.log(response);
        }
    });
}

function myOwnCallBack(file) {
    let data = new FormData();
    data.append("file", file, file.name);
    $.ajax({
        data: data,
        type: "POST",
        url: "<?php echo site_url('admin/summernote/upload_file')?>", //Your own back-end uploader
        cache: false,
        contentType: false,
        processData: false,
        /*xhr: function() { //Handle progress upload
            let myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) myXhr.upload.addEventListener('progress', progressHandlingFunction, false);
            return myXhr;
        },*/
        success: function(url) {
            var HTMLstring = '<iframe src="' + url +
                '" width="100%" height="600" allow="autoplay"></iframe>';
            $('.summernote').summernote('editor.pasteHTML', HTMLstring);
            /*if(reponse.status === true) {
	                let listMimeImg = ['image/png', 'image/jpeg', 'image/jpg', 'image/webp', 'image/gif', 'image/svg'];
	                let listMimeAudio = ['audio/mpeg', 'audio/ogg', 'audio/mp3'];
	                let listMimeVideo = ['video/mpeg', 'video/mp4', 'video/webm'];
	                let elem;
	 
	                if (listMimeImg.indexOf(file.type) > -1) {
	                    //Picture
	                    $('.tugas').summernote('editor.insertImage', reponse.filename);
	                } else if (listMimeAudio.indexOf(file.type) > -1) {
	                    //Audio
	                    elem = document.createElement("audio");
	                    elem.setAttribute("src", reponse.filename);
	                    elem.setAttribute("controls", "controls");
	                    elem.setAttribute("preload", "metadata");
	                    $('.tugas').summernote('editor.insertNode', elem);
	                } else if (listMimeVideo.indexOf(file.type) > -1) {
	                    //Video
	                    elem = document.createElement("video");
	                    elem.setAttribute("src", reponse.filename);
	                    elem.setAttribute("controls", "controls");
	                    elem.setAttribute("preload", "metadata");
	                    $('.tugas').summernote('editor.insertNode', elem);
	                } else {
	                    //Other file type
	                    var node;
	                    node = document.createElement("a");
	                    let linkText = document.createTextNode(file.name);
	                    node.appendChild(linkText);
	                    node.title = file.name;
	                    node.href = reponse.filename;
	                    $('.tugas').summernote('insertNode', node);
	                }
	            }*/
        }
    });
}

function progressHandlingFunction(e) {
    if (e.lengthComputable) {
        //Log current progress
        console.log((e.loaded / e.total * 100) + '%');

        //Reset progress on complete
        if (e.loaded === e.total) {
            console.log("Upload finished.");
        }
    }
}
</script>
<?=$this->endSection();?>