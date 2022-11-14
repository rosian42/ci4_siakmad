<?= $this->extend('layout/admin');?>
<?= $this->section('content');?>
<!-- Select2 -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/select2/css/select2.min.css">
<link rel="stylesheet"
    href="<?=base_url('assets/admin');?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<!-- SweetAlert2 -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<!-- Toastr -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/toastr/toastr.min.css">
<!-- daterange picker -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/daterangepicker/daterangepicker.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet"
    href="<?=base_url('assets/admin');?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- summernote -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/summernote/summernote-bs4.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/dist/css/adminlte.min.css">


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
            <div class="row ">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-edit"></i>
                                <?=$templateJudul;?>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="overlay-wrapper">
                                <div class="overlay dark " style="display:none;"><i
                                        class="fas fa-3x fa-sync-alt fa-spin"></i>
                                    <div class="text-bold pt-2">Loading...</div>
                                </div>
                                <div class="row">

                                    <div class="col-3 col-sm-2">
                                        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
                                            aria-orientation="vertical">
                                            <a class="nav-link active" id="vert-tabs-website-tab" data-toggle="pill"
                                                href="#vert-tabs-website" role="tab" aria-controls="vert-tabs-website"
                                                aria-selected="true">Website</a>
                                            <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill"
                                                href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile"
                                                aria-selected="false">Profil</a>
                                            <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill"
                                                href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages"
                                                aria-selected="false">Messages</a>
                                            <a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill"
                                                href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings"
                                                aria-selected="false">Settings</a>
                                        </div>
                                    </div>
                                    <div class="col-9 col-sm-10">
                                        <div class="tab-content" id="vert-tabs-tabContent">
                                            <div class="tab-pane text-left fade show active" id="vert-tabs-website"
                                                role="tabpanel" aria-labelledby="vert-tabs-website-tab">
                                                <form class="form-horizontal" id="form_website"
                                                    enctype="multipart/form-data">
                                                    <div class="form-group row">
                                                        <label for="web_title" class="col-sm-2 col-form-label">Nama
                                                            Website</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="group"
                                                                placeholder="Nama Website" name="group" hidden
                                                                value="website">
                                                            <input type="text" class="form-control" id="web_title"
                                                                placeholder="Nama Website" name="web_title"
                                                                value="<?php echo (!empty($web_title))?$web_title:null?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="tagline"
                                                            class="col-sm-2 col-form-label">Tagline</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="tagline"
                                                                placeholder="Tagline" name="tagline"
                                                                value="<?php echo (!empty($tagline))?$tagline:null?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="meta_description"
                                                            class="col-sm-2 col-form-label">Deskripsi Web</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control"
                                                                id="meta_description" placeholder="Deskripsi Web"
                                                                name="meta_description"
                                                                value="<?php echo (!empty($meta_description))?$meta_description:null?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="meta_keyword"
                                                            class="col-sm-2 col-form-label">Keyword</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="meta_keyword"
                                                                placeholder="Tagline" name="meta_keyword"
                                                                value="<?php echo (!empty($meta_keyword))?$meta_keyword:null?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="logo" class="col-sm-2 col-form-label">Logo
                                                            Web</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" accept="image/*"
                                                                        class="custom-file-input" id="logo" name="logo"
                                                                        oninput="pic_logo.src=window.URL.createObjectURL(this.files[0])">
                                                                    >
                                                                    <label class="custom-file-label" for="logo">Choose
                                                                        file</label>
                                                                </div>

                                                            </div>


                                                            <div class="col-sm-4 pt-2">
                                                                <div class="position-relative">
                                                                    <img id="pic_logo" class="img-fluid"
                                                                        <?php echo (!empty($logo))?"src='".base_url($logo)."'":""?> />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="favicon"
                                                            class="col-sm-2 col-form-label">Favicon</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" accept="image/ico"
                                                                        class="custom-file-input" id="favicon"
                                                                        name="favicon"
                                                                        oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                                                                    >
                                                                    <label class="custom-file-label"
                                                                        for="favicon">Choose file</label>
                                                                </div>

                                                            </div>


                                                            <div class="col-sm-4 pt-2">
                                                                <div class="position-relative">
                                                                    <img id="pic" class="img-fluid"
                                                                        <?php echo (!empty($favicon))?"src='".base_url($favicon)."'":""?> />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="offset-sm-2 col-sm-10">
                                                            <button type="button" id="simpan_website"
                                                                onclick="simpan_konfigurasi_web('website')"
                                                                class="btn btn-danger">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel"
                                                aria-labelledby="vert-tabs-profile-tab">
                                                <form class="form-horizontal" id="form_profil"
                                                    enctype="multipart/form-data">
                                                    <div class="form-group row">
                                                        <label for="npsn" class="col-sm-2 col-form-label">NPSN</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="group"
                                                                name="group" hidden value="profil">
                                                            <input type="text" class="form-control" id="npsn"
                                                                placeholder="NPSN" name="npsn"
                                                                value="<?php echo (!empty($npsn))?$npsn:null?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="nama_sekolah" class="col-sm-2 col-form-label">Nama
                                                            Sekolah</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="nama_sekolah"
                                                                placeholder="Nama Sekolah" name="nama_sekolah"
                                                                value="<?php echo (!empty($nama_sekolah))?$nama_sekolah:null?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="nama_sekolah"
                                                            class="col-sm-2 col-form-label">Deskripsi Sekolah</label>
                                                        <div class="col-sm-10">
                                                            <textarea class="form-control" rows="10"
                                                                id="deskripsi_sekolah"
                                                                name="deskripsi_sekolah"><?php echo (!empty($deskripsi_sekolah))?$deskripsi_sekolah:null?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="alamat_sekolah"
                                                            class="col-sm-2 col-form-label">Alamat</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="alamat_sekolah"
                                                                placeholder="Alamat Sekolah" name="alamat_sekolah"
                                                                value="<?php echo (!empty($alamat_sekolah))?$alamat_sekolah:null?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="no_telp" class="col-sm-2 col-form-label">No.
                                                            Telp</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="no_telp"
                                                                placeholder="Nomor Telepon" name="no_telp"
                                                                value="<?php echo (!empty($no_telp))?$no_telp:null?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="no_wa" class="col-sm-2 col-form-label">No.
                                                            WA</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="no_wa"
                                                                placeholder="Nomor Whatsapp" name="no_wa"
                                                                value="<?php echo (!empty($no_wa))?$no_wa:null?>"
                                                                data-inputmask="'mask': ['6299999999999[9]']" data-mask>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="email" class="col-sm-2 col-form-label">Email
                                                            Sekolah</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="email"
                                                                placeholder="Email" name="email"
                                                                value="<?php echo (!empty($email))?$email:null?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="website"
                                                            class="col-sm-2 col-form-label">Website</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="website"
                                                                placeholder="Website" name="website"
                                                                value="<?php echo (!empty($website))?$website:null?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="website"
                                                            class="col-sm-2 col-form-label">Facebook</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="facebook"
                                                                placeholder="Link Facebook" name="facebook"
                                                                value="<?php echo (!empty($facebook))?$facebook:null?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="website"
                                                            class="col-sm-2 col-form-label">Twitter</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="twitter"
                                                                placeholder="Link Twitter" name="twitter"
                                                                value="<?php echo (!empty($twitter))?$twitter:null?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="website"
                                                            class="col-sm-2 col-form-label">Youtube</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="youtube"
                                                                placeholder="Link Channel Youtube" name="youtube"
                                                                value="<?php echo (!empty($youtube))?$youtube:null?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="logo_sekolah" class="col-sm-2 col-form-label">Logo
                                                            Sekolah</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" accept="image/*"
                                                                        class="custom-file-input" id="logo_sekolah"
                                                                        name="logo_sekolah"
                                                                        oninput="pic_logo_sekolah.src=window.URL.createObjectURL(this.files[0])">
                                                                    >
                                                                    <label class="custom-file-label"
                                                                        for="logo_sekolah">Choose file</label>
                                                                </div>

                                                            </div>


                                                            <div class="col-sm-4 pt-2">
                                                                <div class="position-relative">
                                                                    <img id="pic_logo_sekolah" class="img-fluid"
                                                                        <?php echo (!empty($logo_sekolah))?"src='".base_url($logo_sekolah)."'":""?> />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="kop_surat" class="col-sm-2 col-form-label">Kop
                                                            Surat</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" accept="image/*"
                                                                        class="custom-file-input" id="kop_surat"
                                                                        name="kop_surat"
                                                                        oninput="pic_kop_surat.src=window.URL.createObjectURL(this.files[0])">
                                                                    >
                                                                    <label class="custom-file-label"
                                                                        for="favicon">Choose file</label>
                                                                </div>

                                                            </div>


                                                            <div class="col-sm-4 pt-2">
                                                                <div class="position-relative">
                                                                    <img id="pic_kop_surat" class="img-fluid"
                                                                        <?php echo (!empty($kop_surat))?"src='".base_url($kop_surat)."'":""?> />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="offset-sm-2 col-sm-10">
                                                            <button type="button"
                                                                onclick="simpan_konfigurasi_web('profil')"
                                                                class="btn btn-danger">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel"
                                                aria-labelledby="vert-tabs-messages-tab">
                                                Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris.
                                                Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu
                                                massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla.
                                                Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit
                                                condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis
                                                velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum
                                                odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla
                                                lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id
                                                fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt
                                                eleifend ac ornare magna.
                                            </div>
                                            <div class="tab-pane fade" id="vert-tabs-settings" role="tabpanel"
                                                aria-labelledby="vert-tabs-settings-tab">
                                                Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna,
                                                iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit
                                                dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie
                                                tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec
                                                interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget
                                                aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo
                                                dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan
                                                ex sit amet facilisis.
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

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
<!-- Summernote -->
<script src="<?=base_url('assets/admin');?>/plugins/summernote/summernote-bs4.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?=base_url('assets/admin');?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?=base_url('assets/admin');?>/plugins/toastr/toastr.min.js"></script>
<!-- Select2 -->
<script src="<?=base_url('assets/admin');?>/plugins/select2/js/select2.full.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?=base_url('assets/admin');?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- InputMask -->
<script src="<?=base_url('assets/admin');?>/plugins/moment/moment.min.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?=base_url('assets/admin');?>/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=base_url('assets/admin');?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
</script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/admin');?>/dist/js/adminlte.js"></script>

<script>
$(function() {
    $('[data-mask]').inputmask();
    bsCustomFileInput.init();
    $('#deskripsi_sekolah').summernote({
        tabsize: 2,
        height: 200
    });
})

function simpan_konfigurasi_web(group) {
    if (group == 'website') {
        var data = new FormData($("#form_website")[0]);
    } else if (group == 'profil') {
        var data = new FormData($("#form_profil")[0]);
    }


    Swal.fire({
        title: 'Anda yakin akan menyimpan data ??',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        allowOutsideClick: false,
    }).then((result) => {

        if (result.isConfirmed) {
            $.ajax({
                url: "<?php echo site_url("admin/$controller/simpanKonfigurasiWebsite");?>",
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
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: data.msg,
                            title: data.pesan
                        })

                    } else {

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: data.msg,
                            title: data.pesan
                        })
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    Swal.close();
                    console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        }
    })

}
</script>

<?= $this->endSection();?>