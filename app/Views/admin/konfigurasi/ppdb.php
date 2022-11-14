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

                            <div class="row">
                                <div class="col-12">
                                    <form class="form-horizontal" id="form_setting_ppdb"
                                        enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label for="status_ppdb" class="col-sm-2 col-form-label">Status PPDB</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="group"
                                                    name="group" hidden value="ppdb">
                                                <select name="status_ppdb" id="status_ppdb" class="form-control select2">
			                                        <option value="active"
			                                            <?php echo (isset($status_ppdb) && $status_ppdb=="active")?"selected":"";?>>
			                                            Aktif </option>
			                                        <option value="inactive"
			                                            <?php echo (isset($status_ppdb) && $status_ppdb=="inactive")?"selected":"";?>>
			                                            Tidak Aktif </option>
			                                    </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tahun_ppdb" class="col-sm-2 col-form-label">Tahun PPDB</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="tahun_ppdb"
                                                    placeholder="Tahun PPDB" name="tahun_ppdb"
                                                    value="<?php echo (!empty($tahun_ppdb))?$tahun_ppdb:null?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kuota_ppdb"
                                                class="col-sm-2 col-form-label">Kuota PPDB</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="kuota_ppdb"
                                                    placeholder="Kuota PPDB" name="kuota_ppdb"
                                                    value="<?php echo (!empty($kuota_ppdb))?$kuota_ppdb:null?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="mulai_ppdb"
                                                class="col-sm-2 col-form-label">Tgl. Mulai</label>
                                            <div class="col-sm-10">
                                                <div class="input-group date" id="reservationdate-mulai"
                                                data-target-input="nearest">
	                                                <input type="text" class="form-control datetimepicker-input"
	                                                    id="mulai_ppdb" data-toggle="datetimepicker" name="mulai_ppdb"
	                                                    data-target="#reservationdate-mulai" placeholder="YYYY-MM-DD" value="<?php echo (!empty($mulai_ppdb))?$mulai_ppdb:null?>"/>
	                                                <div class="input-group-append" data-target="#reservationdate-mulai"
	                                                    data-toggle="datetimepicker">
	                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
	                                                </div>
	                                                
	                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="akhir_ppdb"
                                                class="col-sm-2 col-form-label">Tgl. Akhir</label>
                                            <div class="col-sm-10">
                                                <div class="input-group date" id="reservationdate-akhir"
                                                data-target-input="nearest">
	                                                <input type="text" class="form-control datetimepicker-input"
	                                                    id="akhir_ppdb" data-toggle="datetimepicker" name="akhir_ppdb"
	                                                    data-target="#reservationdate-akhir" placeholder="YYYY-MM-DD" value="<?php echo (!empty($akhir_ppdb))?$akhir_ppdb:null?>"/>
	                                                <div class="input-group-append" data-target="#reservationdate-akhir"
	                                                    data-toggle="datetimepicker">
	                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
	                                                </div>
	                                                
	                                            </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="button"
                                                    onclick="simpan_konfigurasi()"
                                                    class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>
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
    $('#reservationdate-mulai, #reservationdate-akhir').datetimepicker({
        format: 'YYYY-MM-DD',
        viewMode: 'years'

    });
})

function simpan_konfigurasi() {
    
    var data = new FormData($("#form_setting_ppdb")[0]);
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