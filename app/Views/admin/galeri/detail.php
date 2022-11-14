<?= $this->extend('layout/admin');?>
<?= $this->section('content');?>
<!-- Ekko Lightbox -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/ekko-lightbox/ekko-lightbox.css">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<!-- Toastr -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/toastr/toastr.min.css">
<!-- dropzonejs -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/dropzone/min/dropzone.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/dist/css/adminlte.min.css">
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?=$templateJudul;?></h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-right">
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h4 class="card-title">Detail Album <?=$galeri_name?></h4>
                        </div>
                        <div class="card-body">
                            <!--<form action="/" enctype="multipart/form-data" method="post">-->
                            <!--<div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group row ">
                                        <label class="col-sm-2 col-form-label">Nama Album</label>
                                        <div class="col-sm-10">
                                            <input type="text" hidden placeholder="Nama Album" id="galeri_id"
                                                name="galeri_id" class="form-control" value="<?=$galeri_id?>">
                                            <?=$galeri_name?>

                                        </div>

                                    </div>

                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group row ">
                                        <label class="col-sm-2 col-form-label">Deskripsi</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="galeri_description"
                                                name="galeri_description" rows="3"><?=$galeri_description?></textarea>

                                        </div>

                                    </div>
                                </div>
                                
                            </div>-->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group row ">
                                        <label class="col-sm-2 col-form-label">Upload Foto</label>
                                        
                                        <div class="col-sm-10">
                                            <!--
                                            <div class="previews dropzone" id="my-dropzone" name="mainFileUploader">
                                                <div class="fallback">
                                                    <input type="file" name="file" multiple>
                                                </div>
                                            </div>
                                            -->
                                            
                                            <div id="actions" class="row">
                                                <div class="col-lg-6">
                                                    <div class="btn-group w-100">
                                                        <span class="btn btn-success col fileinput-button">
                                                            <i class="fas fa-plus"></i>
                                                            <span>Add files</span>
                                                        </span>
                                                        <button type="submit" class="btn btn-primary col start">
                                                            <i class="fas fa-upload"></i>
                                                            <span>Start upload</span>
                                                        </button>
                                                        <button type="reset" class="btn btn-warning col cancel">
                                                            <i class="fas fa-times-circle"></i>
                                                            <span>Cancel upload</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 d-flex align-items-center">
                                                    <div class="fileupload-process w-100">
                                                        <div id="total-progress"
                                                            class="progress progress-striped active" role="progressbar"
                                                            aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                            <div class="progress-bar progress-bar-success"
                                                                style="width:0%;" data-dz-uploadprogress></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table table-striped files" id="previews">
                                                <div id="template" class="row mt-2">
                                                    <div class="col-auto">
                                                        <span class="preview"><img src="data:," alt=""
                                                                data-dz-thumbnail /></span>
                                                    </div>
                                                    <div class="col d-flex align-items-center">
                                                        <p class="mb-0">
                                                            <span class="lead" data-dz-name></span>
                                                            (<span data-dz-size></span>)
                                                        </p>
                                                        <strong class="error text-danger" data-dz-errormessage></strong>
                                                    </div>
                                                    <div class="col-4 d-flex align-items-center">
                                                        <div class="progress progress-striped active w-100"
                                                            role="progressbar" aria-valuemin="0" aria-valuemax="100"
                                                            aria-valuenow="0">
                                                            <div class="progress-bar progress-bar-success"
                                                                style="width:0%;" data-dz-uploadprogress></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto d-flex align-items-center">
                                                        <div class="btn-group">
                                                            <button class="btn btn-primary start">
                                                                <i class="fas fa-upload"></i>
                                                                <span>Start</span>
                                                            </button>
                                                            <button data-dz-remove class="btn btn-warning cancel">
                                                                <i class="fas fa-times-circle"></i>
                                                                <span>Cancel</span>
                                                            </button>
                                                            <button data-dz-remove class="btn btn-danger delete">
                                                                <i class="fas fa-trash"></i>
                                                                <span>Delete</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                        
                                    </div>
                                </div>

                            </div>
                            <!--</form>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" id="submit-all" class="btn btn-primary col start">
                                        <i class="fas fa-upload"></i>
                                        <span>Start upload</span>
                                    </button>
                                </div>
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php if(count($Galeri)>0) {
                                    foreach ($Galeri as $key) {
                                        
                                 ?>
                                <div class="col-sm-2">
                                    <a href="<?=base_url()."/".$key['galeri_detail_name'];?>" data-toggle="lightbox" data-gallery="gallery">
                                        <img src="<?=base_url()."/".$key['galeri_detail_name'];?>" class="img-fluid mb-2"/>
                                    </a>
                                </div>
                                <?php } } ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

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
    <!-- Ekko Lightbox -->
    <script src="<?=base_url('assets/admin');?>/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?=base_url('assets/admin');?>/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/toastr/toastr.min.css">
    <!-- dropzonejs -->
    <script src="<?=base_url('assets/admin');?>/plugins/dropzone/min/dropzone.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url('assets/admin');?>/dist/js/adminlte.js"></script>


    <script>
    $(function() {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: false
            });
        });

        // DropzoneJS Demo Code Start
        Dropzone.autoDiscover = false

        // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
        var previewNode = document.querySelector("#template")
        previewNode.id = ""
        var previewTemplate = previewNode.parentNode.innerHTML
        previewNode.parentNode.removeChild(previewNode)
        
        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
            url: "<?php echo site_url("admin/$controller/detail/$galeri_id");?>", // Set the url
            maxFilesize: 2,
            method: "post",
            acceptedFiles: "image/*",
            dictInvalidFileType: "Tipe file tidak diizinkan",
            //autoProcessQueue: false,
            //uploadMultiple: true,
            parallelUploads: 100,
            //maxFiles: 100,
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            previewTemplate: previewTemplate,
            autoQueue: false, // Make sure the files aren't queued until manually added
            previewsContainer: "#previews", // Define the container to display the previews
            clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
        })

        myDropzone.on("addedfile", function(file) {
            // Hookup the start button
            file.previewElement.querySelector(".start").onclick = function() {
                
                myDropzone.enqueueFile(file)
            }
        })

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
        })

        myDropzone.on("sending", function(file) {
            // Show the total progress bar when upload starts
            document.querySelector("#total-progress").style.opacity = "1"
            // And disable the start button
            file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
        })

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function(progress) {
            document.querySelector("#total-progress").style.opacity = "0";
            Swal.fire({
                title: 'Upload foto berhasil',
                text: "",
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                allowOutsideClick: false
            }).then((result) => {
                location.reload();
            });
        })

        // Setup the buttons for all transfers
        // The "add files" button doesn't need to be setup because the config
        // `clickable` has already been specified.
        document.querySelector("#actions .start").onclick = function() {
            
            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
            
        }
        document.querySelector("#actions .cancel").onclick = function() {
            myDropzone.removeAllFiles(true)
        }
        // DropzoneJS Demo Code End
       
        
    });

    function simpan() {
        //var form = $('#form_simpan');
        var data = new FormData($("#form_simpan")[0]);
        $('#form_simpan').find('.invalid-feedback').text('');
        $('#form_simpan').find('input').removeClass('is-invalid');
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
                        if (data.msg == 'success') {
                            table.ajax.reload(null, false);
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal
                                        .resumeTimer)
                                }
                            })

                            Toast.fire({
                                icon: data.msg,
                                title: data.pesan
                            })

                        } else if (data.msg == 'invalid') {

                            $.each(data.validation, function(key, value) {
                                $('#' + key).addClass('is-invalid');
                                $('#' + key).parents('.form-group').find(
                                    '.invalid-feedback').text(value);
                            });

                        } else {
                            table.ajax.reload(null, false);
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal
                                        .resumeTimer)
                                }
                            })

                            Toast.fire({
                                icon: data.msg,
                                title: data.pesan
                            })
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr
                            .responseText);
                    }
                });
            }
        })

    }

    function hapus(id) {
        //var link = "<?=site_url("admin/$controller/$metode/?aksi=hapus&id=")?>" + id;
        Swal.fire({
            title: 'Are you sure?',
            text: "Data akan dipindahkan ke recycle bin!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            allowOutsideClick: false
        }).then((result) => {
            //window.location.href = link;
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?php echo site_url("admin/$controller");?>",
                    type: "post",
                    data: "aksi=hapus&id=" + id,
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
                        if (data.status) {

                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal
                                        .resumeTimer)
                                }
                            })
                            Toast.fire({
                                icon: 'success',
                                title: "Data sudah dipindahkan ke tempat sampah"
                            })
                            location.reload();

                        } else {

                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal
                                        .resumeTimer)
                                }
                            })

                            Toast.fire({
                                icon: 'error',
                                title: 'Data gagal dihapus'
                            })
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        Swal.close();
                        //$(".overlay").css("display","none");
                        console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr
                            .responseText);
                    }
                });
            }
        });
    }
    </script>
    <?=$this->endSection();?>