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

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-edit"></i>
                                Filter
                            </h3>
                        </div>
                        <div class="card-body pad table-responsive">
                            <div class="form-group row ">
                                <label class="col-sm-4 col-form-label">Tingkat Kelas</label>
                                <div class="col-sm-8">
                                    <?php
                                
                                echo cmb_dinamis('kd_tingkatan', 'tb_tingkatan_kelas', 'nm_tingkatan_kelas', 'id_tingkat', null, null, 'id="kd_tingkatan" onchange="reload_table()"');
                                ?>

                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-sm btn-primary" href="<?=base_url("admin/$controller")?>">Kembali</a>
                            <a class="btn btn-sm btn-primary" href="javascript:void(0)" onclick="reload_table()">Refresh
                                Tabel</a>
                            <a class="btn btn-sm btn-primary" role="button" href="javascript:void(0)"
                                data-toggle="modal" data-target="#tambahModal"
                                data-id_kurikulum="<?=$id_kurikulum;?>">Tambah</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-8">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-edit"></i>
                                Data Pelajaran
                            </h3>
                        </div>
                        <div class="card-body pad table-responsive">
                            <table id="data" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>

                            </table>
                        </div>

                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
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
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Detail Kurikulum</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form_detail_kurikulum" enctype="multipart/form-data">
                    <div class="form-group row ">
                        <label class="col-sm-3 col-form-label">Kurikulum</label>
                        <div class="col-sm-9">
                            <?php
                  //$selected =(isset($kd_tingkatan))?$kd_tingkatan:'';
                  //$class = ($validation->hasError('kd_tingkatan'))?'is-invalid':'';
                  echo cmb_dinamis('id_kurikulum', 'tb_kurikulum', 'nm_kurikulum', 'id_kurikulum', null, null, 'id="id_kurikulum"');
                ?>
                            <div class="invalid-feedback">

                            </div>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-3 col-form-label">Mata Pelajaran</label>
                        <div class="col-sm-9">
                            <?php
                  //$selected =(isset($kd_tingkatan))?$kd_tingkatan:'';
                  //$class = ($validation->hasError('kd_tingkatan'))?'is-invalid':'';
                  echo cmb_dinamis('id_mapel', 'tb_mapel', 'nm_mapel', 'id_mapel',null,null, 'id="id_mapel"');
                ?>
                            <div class="invalid-feedback">

                            </div>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-3 col-form-label">Tingkat Kelas</label>
                        <div class="col-sm-9">
                            <?php
                  
                  echo cmb_dinamis('kd_tingkatan_detail', 'tb_tingkatan_kelas', 'nm_tingkatan_kelas', 'id_tingkat',null,null,'id="kd_tingkatan_detail"');
                ?>
                            <div class="invalid-feedback">

                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="simpan()">Simpan</button>
            </div>
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
<!-- AdminLTE App -->
<script src="<?=base_url('assets/admin');?>/dist/js/adminlte.js"></script>

<script>
var table;
$(function() {

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
            "url": "<?php echo site_url("admin/$controller/ajaxListDetailKurikulum") ?>",
            "type": "POST",
            "data": function(data) {
                data.id_kurikulum = "<?=$id_kurikulum;?>";
                data.id_tingkat = $('#kd_tingkatan').val();
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
    $('#tambahModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('id_kurikulum') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        $(this).find('#id_kurikulum').val(recipient).trigger('change');
        //modal.find('.modal-title').text('New message to ' + recipient)
        //modal.find('.modal-body input').val(recipient)
    })

    $('#tambahModal').on('hidden.bs.modal', function() {
        var modal = $(this)

        $(this).find('.invalid-feedback').text('');
        $(this).find('.select2').val('').trigger('change');
    });
});

function reload_table() {
    table.ajax.reload(null, false); //reload datatable ajax 
}

function hapus(id) {
    var link = "<?=site_url("admin/$controller/$metode/$id_kurikulum/?aksi=hapus&id=")?>" + id;
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
        /*
        if (result.isConfirmed) {
          $.ajax({
               url:"<?php echo site_url('admin/');?><?=$controller;?>",
               type:"get",
               data: {aksi:hapus, id:id},
               dataType:'json',
               success: function(data){
                    if (data.status) {
                        
                        Swal.fire({
                          title: "Berhasil....!",
                          text: "Data berhasil dihapus",
                          icon: "success",
                        }).then(function () {
                          reload_table();
                
                        });
                    }else{
                        
                        Swal.fire({
                          title: "Ooooppsss....!",
                          text: " Gagal. ",
                          icon: "error",
                    }).then(function () {
                        reload_table();
                
                    });
                      } 
               },
               error: function (xhr, ajaxOptions, thrownError) {
                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
              }
           });
          
        }
        */
    });
}

function simpan() {

    var data = $('#form_detail_kurikulum').serialize();
    $('#form_detail_kurikulum').find('.invalid-feedback').text('');
    Swal.fire({
        title: 'Anda yakin akan menyimpan detail kurikulum ??',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        allowOutsideClick: false,
    }).then((result) => {

        if (result.isConfirmed) {
            $.ajax({
                url: "<?php echo site_url("admin/$controller/simpanDetailKurikulum");?>",
                type: "post",
                data: data,
                dataType: 'json',
                success: function(data) {
                    if (data.status) {
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
                            icon: 'success',
                            title: 'Berhasil disimpan!!'
                        })

                    } else {
                        $.each(data.validation, function(key, value) {
                            $('#' + key).addClass('is-invalid');

                            $('#' + key).parents('.form-group').find('.invalid-feedback')
                                .text(value);
                        });


                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
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