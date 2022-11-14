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
                <div class="col-sm-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Filter Data</h3>
                        </div> <!-- /.card-body -->
                        <div class="card-body pad ">
                            <form class="form-horizontal">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group row ">
                                            <label class="col-sm-4 col-form-label">Th. Pelajaran</label>
                                            <div class="col-sm-8">
                                                <?php
				                                
				                                echo cmb_dinamis('th_pelajaran', 'tb_tahun_akademik', 'tahun_akademik', 'id_tahun_akademik', null, null, 'id="th_pelajaran"');
				                                ?>

                                            </div>
                                            <div id="invalid_th_pelajaran" class="invalid-feedback">

                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <label class="col-sm-4 col-form-label">Semester</label>
                                            <div class="col-sm-8">
                                                <select name="semester" id="semester" class="form-control select2">
                                                    <option></option>
                                                    <option value="1">Ganjil</option>
                                                    <option value="2">Genap</option>
                                                </select>

                                            </div>
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row ">
                                            <label class="col-sm-4 col-form-label">Tingkatan Kelas</label>
                                            <div class="col-sm-8">
                                                <?php
			                  						echo cmb_dinamis('id_tingkat', 'tb_tingkatan_kelas', 'nm_tingkatan_kelas', 'id_tingkat', null, null,'id="id_tingkat"');
			                
				                                ?>

                                            </div>
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <label class="col-sm-4 col-form-label">Kelas</label>
                                            <div class="col-sm-8">
                                                <select name="kd_kelas" id="kd_kelas" class="form-control select2">
                                                    <option></option>

                                                </select>

                                            </div>
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-sm btn-primary" onclick="generateJadwal()">Generate Jadwal</a>
                            <a class="btn btn-sm btn-primary" href="javascript:void(0)" onclick="reload_table()">Refresh
                                Tabel</a>
                            <a class="btn btn-sm btn-primary" onclick="cetakJadwal()" role="button"
                                href="javascript:void(0)">Cetak Jadwal</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
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
                                        <th>Mata Pelajaran</th>
                                        <th>Guru</th>
                                        <th>Kelas</th>
                                        <th>Hari</th>
                                        <th>Jam</th>
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
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



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
<!-- date-range-picker -->
<script src="<?=base_url('assets/admin');?>/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=base_url('assets/admin');?>/plugins/moment/moment.min.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
</script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/admin');?>/dist/js/adminlte.js"></script>

<script>
var table;
$(function() {
    $('.select2').select2({
        placeholder: "----Pilih Opsi----",
        allowClear: true
    });
    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });

    $('#id_tingkat').on('select2:select', function(e) {
        var selectedTingkatan = $(this).find(':selected').val();
        loadKelas(selectedTingkatan);

    })
    $('#kd_kelas').on('select2:select', function(e) {

        loadJadwal();

    })
})

function loadKelas(kd_tingkatan) {

    $.ajax({
        url: "<?php echo site_url('admin/cari/getKelas');?>",
        method: "POST",
        data: {
            kd_tingkatan: kd_tingkatan
        },
        success: function(html) {
            $("#kd_kelas").html(html);
            //loadPelajaran();
        }
    })
}

function loadJadwal() {
    table = $('#data').DataTable({
        "destroy": true,
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
                data.th_pelajaran = $('#th_pelajaran').val();
                data.id_tingkat = $('#id_tingkat').val();
                data.kd_kelas = $('#kd_kelas').val();
                data.semester = $('#semester').val();
            }
        },
        "columnDefs": [{
            "targets": [],
            "orderable": false,
        }, ],
        "drawCallback": function(dt) {
            //console.log("draw() callback; initializing Select2's.");
            $('.select_guru, .select_hari, .select_jam').select2({
                placeholder: "----Pilih Opsi----",
                allowClear: true,
                width: "13em"
            });

        }
    });
}

function reload_table() {
    table.ajax.reload(null, false); //reload datatable ajax 
}

function generateJadwal() {
    var th_pelajaran = $('#th_pelajaran option:selected').val();
    var semester = $('#semester option:selected').val();
    var id_tingkat = $('#id_tingkat option:selected').val();
    var kd_kelas = $('#kd_kelas option:selected').val();
    Swal.fire({
        title: 'Anda yakin akan membuat jadwal pelajaran ' + $('#kelas option:selected').text() + ' ??',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        allowOutsideClick: false,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "<?php echo site_url("admin/$controller/generateJadwal");?>",
                type: "post",
                data: {
                    th_pelajaran: th_pelajaran,
                    semester: semester,
                    id_tingkat: id_tingkat,
                    kd_kelas: kd_kelas
                },
                dataType: 'json',
                success: function(data) {
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
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: data.msg,
                            title: data.pesan
                        })
                    } else if (data.msg == 'invalid') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: JSON.stringify(data.validation)
                        })
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
                url: "<?php echo site_url("admin/$controller/hapus");?>",
                type: "post",
                data: "aksi=hapus&id=" + id,
                dataType: 'json',
                success: function(data) {
                    if (data.status) {
                        table.ajax.reload(null, false);
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
                            title: "Data sudah dipindahkan ke tempat sampah"
                        })

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
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'error',
                            title: 'Data gagal dihapus'
                        })
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        }
    });
}

function update_jadwal(field, id_jadwal) {
    var val = $("#" + field + id_jadwal).val();
    $.ajax({
        type: 'post',
        url: "<?php echo site_url("admin/$controller/updateJadwal");?>",
        data: {
            field: field,
            id_jadwal: id_jadwal,
            val: val
        },
        dataType: 'json',
        success: function(data) {
            if (data.status) {

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
                    title: "Data berhasil diupdate"
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
                    icon: 'error',
                    title: 'Data gagal diupdate'
                })
            }
        }
    })
}

function copyJadwal(id_jadwal) {
    $.ajax({
        type: 'post',
        url: "<?php echo site_url("admin/$controller/copyJadwal");?>",
        data: {
            id_jadwal: id_jadwal
        },
        dataType: 'json',
        success: function(data) {
            if (data.status) {
                table.ajax.reload(null, false);
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
                    title: "Data berhasil dicopy"
                })

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
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'error',
                    title: 'Data gagal dicopy'
                })
            }
        }
    })
}

function cetakJadwal() {
    var th_pelajaran = $('#th_pelajaran option:selected').val();
    var semester = $('#semester option:selected').val();
    var id_tingkat = $('#id_tingkat option:selected').val();
    var kd_kelas = $('#kd_kelas option:selected').val();
    var link = "<?=site_url("admin/$controller/cetakJadwal/?th_pelajaran=")?>" + th_pelajaran + "&semester=" +
        semester + "&id_tingkat=" + id_tingkat + "&kd_kelas=" + kd_kelas;
    Swal.fire({
        title: 'Anda yakin akan mencetak jadwal pelajaran ' + $('#kelas option:selected').text() + ' ??',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        allowOutsideClick: false,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "<?php echo site_url("admin/$controller/cekJadwal");?>",
                type: "post",
                data: {
                    th_pelajaran: th_pelajaran,
                    semester: semester,
                    id_tingkat: id_tingkat,
                    kd_kelas: kd_kelas
                },
                dataType: 'json',
                success: function(data) {
                    if (data.msg == 'success') {
                        halaman = window.open(link, "",
                            "width=800,height=600,status=1,scrollbar=yes");
                        return false;
                    } else if (data.msg == 'invalid') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: JSON.stringify(data.validation)
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Data Jadwal tidak ditemukan'
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
</script>