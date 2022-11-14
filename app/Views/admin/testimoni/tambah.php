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
                    <a class="btn btn-sm btn-success" href="<?=base_url("admin/$controller/$metode")?>">Tambah</a>
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
                    <div class="card-body">
                        <form class="form-horizontal" id="form_simpan" enctype="multipart/form-data">

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="testimoni_name">Nama Pemberi
                                    Testimoni</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" hidden id="id" name="id"
                                        value="<?php echo (isset($id))?$id:""?>" />
                                    <input type="text" class="form-control" id="testimoni_name"
                                        placeholder="Nama Pemberi Testimoni" name="testimoni_name"
                                        value="<?php echo (isset($testimoni_name))?$testimoni_name:""?>">
                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="testimoni_position">Jabatan Pemberi
                                    Testimoni</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="testimoni_position"
                                        placeholder="Jabatan Pemberi Testimoni" name="testimoni_position"
                                        value="<?php echo (isset($testimoni_position))?$testimoni_position:""?>">
                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="testimoni_content" class="col-sm-3 col-form-label">Konten</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control summernote" id="testimoni_content"
                                        name="testimoni_content"><?php echo (isset($testimoni_content))?$testimoni_content:""?></textarea>
                                    <div class="invalid-feedback">
                                    </div>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="testimoni_img" class="col-sm-3 col-form-label">Foto</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" accept="image/*" class="custom-file-input"
                                                id="testimoni_img" name="testimoni_img"
                                                oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                                            <label class="custom-file-label" for="testimoni_img">Choose file</label>
                                        </div>
                                        <div class="invalid-feedback">

                                        </div>

                                    </div>
                                    <div class="col-sm-4 pt-2">
                                        <div class="position-relative">
                                            <img id="pic"
                                                <?php echo(isset($testimoni_img))?"src='".base_url($testimoni_img)."'":""?>
                                                class="img-fluid" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="is_aktif">Status</label>
                                <div class="col-sm-9">
                                    <select name="is_aktif" id="is_aktif" class="form-control select2">
                                        <option value="Y"
                                            <?php echo (isset($is_aktif) && $is_aktif=="Y")?"selected":"";?>> Aktif
                                        </option>
                                        <option value="N"
                                            <?php echo (isset($is_aktif) && $is_aktif=="N")?"selected":"";?>> Tidak
                                            Aktif </option>
                                    </select>
                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                            </div>




                        </form>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="button" onclick="simpan()" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <!-- /.card -->


            </div>
            <!--/.col (left) -->

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->


<script src="<?=base_url('assets/admin');?>/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url('assets/admin');?>/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets/admin');?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?=base_url('assets/admin');?>/plugins/select2/js/select2.full.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?=base_url('assets/admin');?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?=base_url('assets/admin');?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?=base_url('assets/admin');?>/plugins/toastr/toastr.min.js"></script>
<!-- Summernote -->
<script src="<?=base_url('assets/admin');?>/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/summernote/summernote-file.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/summernote/summernote-ext-rtl.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/admin');?>/dist/js/adminlte.js"></script>

<script>
$(function() {
    //Initialize Select2 Elements
    $('.select2').select2({
        placeholder: "----Pilih Opsi----",
        allowClear: true
    });
    $('.summernote').summernote({
        tabsize: 2,
        height: 500,
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
    bsCustomFileInput.init();
})

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
                url: "<?php echo site_url("admin/$controller/$metode");?>",
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
                            title: "<?=$label;?> berhasil disimpan",
                            showDenyButton: true,
                            showCancelButton: true,
                            confirmButtonText: 'Kembali Ke Daftar',
                            denyButtonText: "Tambah <?=$label;?>",
                            denyButtonColor: '#3085d6',
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "<?=base_url("admin/$controller")?>";
                            } else if (result.isDenied) {
                                window.location.href =
                                    "<?=base_url("admin/$controller/$metode")?>";
                            } else {
                                $('#id').val(data.id);
                            }

                        })

                    } else if (data.msg == 'invalid') {

                        Swal.fire({
                            icon: 'warning',
                            title: 'Periksa kembali data!!',
                            allowOutsideClick: false,
                        }).then(() => {
                            $.each(data.validation, function(key, value) {
                                if (key != testimoni_img) {
                                    $('#' + key).addClass('is-invalid');

                                    $('#' + key).parents('.form-group').find(
                                            '.invalid-feedback')
                                        .text(value);
                                } else {
                                    $('#' + key).addClass('is-invalid');

                                    $('#' + key).parents('.form-group').find(
                                            '.invalid-feedback')
                                        .text(value);
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