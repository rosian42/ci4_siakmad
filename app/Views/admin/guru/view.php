<?= $this->extend('layout/admin');?>
<?= $this->section('content');?>
<!-- Select2 -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/select2/css/select2.min.css">
<link rel="stylesheet"
    href="<?=base_url('assets/admin');?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
    href="<?=base_url('assets/admin');?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<!-- Toastr -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/toastr/toastr.min.css">
<!-- daterange picker -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/daterangepicker/daterangepicker.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet"
    href="<?=base_url('assets/admin');?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/dist/css/adminlte.min.css">

<!-- Content Wrapper. Contains page content -->
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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-right">
                                <a class="btn btn-sm btn-success" role="button" href="javascript:void(0)"
                                    data-toggle="modal" data-target="#tambahModal">Tambah</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="data" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIP</th>
                                        <th>NUPTK</th>
                                        <th>TTL</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="tambahModal" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="form-horizontal" id="form_simpan" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Guru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row ">
                        <label class="col-sm-3 col-form-label">NIP</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" hidden id="id_guru" name="id_guru" />
                            <input type="text" class="form-control" id="nip" name="nip" />
                            <div class="invalid-feedback">

                            </div>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-3 col-form-label">NUPTK</label>
                        <div class="col-sm-9">

                            <input type="text" class="form-control" id="nuptk" name="nuptk" />
                            <div class="invalid-feedback">

                            </div>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" />

                            <div class="invalid-feedback">

                            </div>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" />

                            <div class="invalid-feedback">

                            </div>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-3 col-form-label">Tgl Lahir</label>
                        <div class="col-sm-9">

                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" id="tgl_lahir"
                                    data-toggle="datetimepicker" name="tgl_lahir" data-target="#reservationdate"
                                    placeholder="YYYY-MM-DD" />
                                <div class="input-group-append" data-target="#reservationdate"
                                    data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                <div class="invalid-feedback">

                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="form-group row ">
                        <label class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="alamat" name="alamat" />

                            <div class="invalid-feedback">

                            </div>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-3 col-form-label">No. Telp.</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="no_telp" name="no_telp"
                                data-inputmask="'mask': ['9999-9999-999[9] [x99999]']" data-mask />

                            <div class="invalid-feedback">

                            </div>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email" />

                            <div class="invalid-feedback">

                            </div>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-3 col-form-label">Foto</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" accept="image/*" class="custom-file-input" id="foto" name="foto"
                                        oninput="pic.src=window.URL.createObjectURL(this.files[0])"> >
                                    <label class="custom-file-label" for="input_post_thumbnail">Choose file</label>
                                </div>

                            </div>

                            <div class="invalid-feedback">

                            </div>

                            <div class="col-sm-4 pt-2">
                                <div class="position-relative">
                                    <img id="pic" class="img-fluid" />
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn_simpan" onclick="simpan()">SImpan </button>
                </div>
            </form>
        </div>
    </div>
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
<!-- DataTables  & Plugins -->
<script src="<?=base_url('assets/admin');?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/jszip/jszip.min.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
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
var table;
$(function() {
    bsCustomFileInput.init();
    $('[data-mask]').inputmask();
    table = $('#data').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": false,
        "info": false,
        "autoWidth": false,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?php echo site_url("admin/$controller/ajaxList") ?>",
            "type": "POST",
            "data": function(data) {


            }
        },
        "columnDefs": [{
            "targets": [],
            "orderable": false,
        }, ],
    });

    //Initialize Select2 Elements
    $('.select2').select2({
        placeholder: "----Pilih Opsi----",
        allowClear: true
    });
    $('#reservationdate').datetimepicker({
        format: 'YYYY-MM-DD',
        viewMode: 'years'

    });


    $('#tambahModal').on('hidden.bs.modal', function() {
        var modal = $(this)
        $(this).find('input').removeClass('is-invalid');
        $(this).find('.invalid-feedback').text('');
        $(this).find('form').trigger('reset');
        $(this).find('#pic').removeAttr('src');

    });


});

function reload_table() {
    table.ajax.reload(null, false); //reload datatable ajax 
}

function hapus(id) {
    var link = "<?=site_url("admin/$controller/$metode/?aksi=hapus&id=")?>" + id;
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        allowOutsideClick: false
    }).then((result) => {
        window.location.href = link;

    });
}

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
                success: function(data) {
                    if (data.msg == 'success') {
                        table.ajax.reload(null, false);
                        $('#tambahModal').modal('hide');
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

                    } else if (data.msg == 'invalid') {

                        $.each(data.validation, function(key, value) {
                            $('#' + key).addClass('is-invalid');

                            $('#' + key).parents('.form-group').find('.invalid-feedback')
                                .text(value);
                        });

                    } else {
                        table.ajax.reload(null, false);
                        $('#tambahModal').modal('hide');
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
                    console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        }
    })

}

function edit(id) {
    $.ajax({
        type: "post",
        url: "<?php echo site_url("admin/$controller/getData");?>",
        data: "id=" + id,
        dataType: 'json',
        success: function(response) {
            if (response.msg) {
                $('#tambahModal').modal('show');
                $('#exampleModalLabel').text('Edit Guru');
                $.each(response.data, function(key, value) {

                    if (key != "foto") {
                        $('#' + key).val(value);
                    } else if (key == "foto") {
                        $('#pic').attr('src', "<?=base_url()?>/" + value);
                    }
                    //$('#tambahModal').parents('.form-group').find('#'+key).val(value);
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oopsss',
                    text: 'blablabla'
                })
            }
        }
    })
}
</script>

<?php 
    $session = \Config\Services::session();
    if($session->getFlashdata('warning')):?>
<script type="text/javascript">
toastr.error("<?php echo $session->getFlashdata('warning')?>");
</script>

<?php elseif($session->getFlashdata('success')):?>
<script type="text/javascript">
toastr.success("<?php echo $session->getFlashdata('success')?>");
</script>

<?php else:?>

<?php endif;?>


<?= $this->endSection();?>