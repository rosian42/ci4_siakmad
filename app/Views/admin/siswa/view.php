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
                                        <th>Th. Masuk</th>
                                        <th>NAMA</th>
                                        <th>NISN</th>
                                        <th>TTL</th>
                                        <th>DOMISILI</th>
                                        <th>STATUS</th>
                                        <th>FOTO</th>
                                        <th>AKSI</th>
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
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form class="form-horizontal" id="form_simpan" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h5 class="card-title">IDENTITAS PESERTA DIDIK</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Tahun Masuk</label>
                                        <div class="col-sm-9">
                                            <?php
                                              //$selected =(isset($kd_tingkatan))?$kd_tingkatan:'';
                                              //$extra = ($validation->hasError('kd_tingkatan'))?'is-invalid':'';
                                              echo cmb_dinamis('th_masuk', 'tb_tahun_akademik', 'tahun_akademik', 'tahun_akademik', null, null, 'id="th_masuk"',null,null, null);
                                            ?>
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Status Siswa</label>
                                        <div class="col-sm-9">
                                            <?php
                                              //$selected =(isset($kd_tingkatan))?$kd_tingkatan:'';
                                              //$extra = ($validation->hasError('kd_tingkatan'))?'is-invalid':'';
                                              echo cmb_dinamis('stat_pd', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="stat_pd"',null,null, 'status_siswa');
                                            ?>
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group row ">
                                        <label class="col-sm-3 col-form-label">Nama Siswa</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" />

                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row ">
                                        <label class="col-sm-3 col-form-label">NISN <small><em>(Jika
                                                    ada)</em></small></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" hidden id="id_siswa"
                                                name="id_siswa" />
                                            <input type="text" class="form-control" id="nisn" name="nisn" />
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row ">
                                        <label class="col-sm-3 col-form-label">NIK</label>
                                        <div class="col-sm-9">

                                            <input type="text" class="form-control" id="nik" maxlength="16"
                                                name="nik" />
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

                                            <div class="input-group date" id="reservationdate"
                                                data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input"
                                                    id="tgl_lahir" data-toggle="datetimepicker" name="tgl_lahir"
                                                    data-target="#reservationdate" placeholder="YYYY-MM-DD" />
                                                <div class="input-group-append" data-target="#reservationdate"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                                <div class="invalid-feedback">

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Gender</label>
                                        <div class="col-sm-9">
                                            <?php
                                                //$selected =(isset($kd_tingkatan))?$kd_tingkatan:'';
                                                //$extra = ($validation->hasError('kd_tingkatan'))?'is-invalid':'';
                                                echo cmb_dinamis('gender', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="gender"',null,null, 'gender');
                                                ?>
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Agama</label>
                                        <div class="col-sm-9">
                                            <?php
                                                
                                                echo cmb_dinamis('agama', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="agama"',null,null, 'agama');
                                                ?>
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Jml. Saudara</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="jml_saudara"
                                                name="jml_saudara" />
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Asal Sekolah</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="asal_sekolah"
                                                name="asal_sekolah" />

                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Punya KKS/PIP/PKH?</label>
                                        <div class="col-sm-9">
                                            <select name="kks_pip_pkh" onchange="getKKS()" id="kks_pip_pkh"
                                                class="form-control select2">
                                                <option></option>
                                                <option value="Y"> Ya </option>
                                                <option value="N"> Tidak </option>
                                            </select>
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row" id="box_no_kks" hidden>
                                        <label class="col-sm-3 col-form-label">No. KKS/PIP/PKH</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="no_kks_pip_pkh"
                                                name="no_kks_pip_pkh" />

                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="col-sm-3 col-form-label">Foto</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" accept="image/*" class="custom-file-input"
                                                        id="foto_siswa" name="foto_siswa"
                                                        oninput="pic.src=window.URL.createObjectURL(this.files[0])"> 
                                                    <label class="custom-file-label" for="input_post_thumbnail">Choose
                                                        file</label>
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
                                <div class="col-12 col-lg-6">
                                    <div class="form-group row ">
                                        <label class="col-sm-3 col-form-label">Alamat<small><em>(Sesuaikan dengan
                                                    KK)</em></small></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="alamat" name="alamat" />

                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row ">
                                        <label class="col-sm-3 col-form-label">Propinsi</label>
                                        <div class="col-sm-9">

                                            <select name="prop" id="prop" class="form-control select2">

                                            </select>
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="col-sm-3 col-form-label">Kabupaten</label>
                                        <div class="col-sm-9">

                                            <select name="kab" id="kab" class="form-control select2">

                                            </select>
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="col-sm-3 col-form-label">Kecamatan</label>
                                        <div class="col-sm-9">

                                            <select name="kec" id="kec" class="form-control select2">

                                            </select>
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="col-sm-3 col-form-label">Desa</label>
                                        <div class="col-sm-9">

                                            <select name="desa" id="desa" class="form-control select2">

                                            </select>
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row ">
                                        <label class="col-sm-3 col-form-label">Kodepos</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="kodepos" name="kodepos" />


                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="col-sm-3 col-form-label">Jns. Domisili</label>
                                        <div class="col-sm-9">
                                            <?php
                                                
                                                echo cmb_dinamis('jns_tinggal', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="jns_tinggal" onchange="getDomisili()"',null,null, 'jenis_tinggal');
                                                ?>

                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row " id="box_pondok" hidden>
                                        <label class="col-sm-3 col-form-label">Nama Pondok</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nm_pondok" name="nm_pondok" />

                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row " id="box_alamat_pondok" hidden>
                                        <label class="col-sm-3 col-form-label">Alamat Domisili</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="alamat_domisili"
                                                name="alamat_domisili" />
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="col-sm-3 col-form-label">Jarak</label>
                                        <div class="col-sm-9">
                                            <?php
                                                
                                                echo cmb_dinamis('jarak', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="jarak"',null,null, 'jarak');
                                                ?>

                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="col-sm-3 col-form-label">Transportasi</label>
                                        <div class="col-sm-9">
                                            <?php
                                                
                                                echo cmb_dinamis('transportasi', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="transportasi"',null,null, 'transportasi');
                                                ?>

                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h5>IDENTITAS ORANG TUA</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-group row ">
                                        <label class="col-sm-3 col-form-label">No. KK</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="no_kk" maxlength="16"
                                                name="no_kk" />

                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <h5 class="mt-1 mb-1">Identitas Ayah</h5>
                                    <hr>
                                    <div class="form-group row ">
                                        <label class="col-sm-3 col-form-label">Nama Ayah</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nm_ayah" name="nm_ayah" />

                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="col-sm-3 col-form-label">NIK</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nik_ayah" maxlength="16"
                                                name="nik_ayah" />

                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="col-sm-3 col-form-label">Status Ayah</label>
                                        <div class="col-sm-9">
                                            <?php
                                                
                                                echo cmb_dinamis('stts_ayah', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="stts_ayah"',null,null, 'status_ortu');
                                                ?>
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="col-sm-3 col-form-label">No. HP Ayah</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="hp_ayah" maxlength="16"
                                                name="hp_ayah" />

                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="col-sm-3 col-form-label">Pekerjaan Ayah</label>
                                        <div class="col-sm-9">
                                            <?php
                                                
                                                echo cmb_dinamis('kerja_ayah', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="kerja_ayah"',null,null, 'jenis_pekerjaan');
                                                ?>
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="col-sm-3 col-form-label">Pendidikan Ayah</label>
                                        <div class="col-sm-9">
                                            <?php
                                                
                                                echo cmb_dinamis('pddk_ayah', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="pddk_ayah"',null,null, 'jenjang_pendidikan');
                                                ?>
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="col-sm-3 col-form-label">Penghasilan Ayah</label>
                                        <div class="col-sm-9">
                                            <?php
                                                
                                                echo cmb_dinamis('penghasilan_ayah', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="penghasilan_ayah"',null,null, 'penghasilan');
                                                ?>
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <h5 class="mt-1 mb-1">Identitas Ibu</h5>
                                    <hr>
                                    <div class="form-group row ">
                                        <label class="col-sm-3 col-form-label">Nama Ibu</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nm_ibu" name="nm_ibu" />

                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="col-sm-3 col-form-label">NIK</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nik_ibu" maxlength="16"
                                                name="nik_ibu" />

                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="col-sm-3 col-form-label">Status Ibu</label>
                                        <div class="col-sm-9">
                                            <?php
                                                
                                                echo cmb_dinamis('stts_ibu', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="stts_ibu"',null,null, 'status_ortu');
                                                ?>
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="col-sm-3 col-form-label">No. HP Ibu</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="hp_ibu" maxlength="16"
                                                name="hp_ibu" />

                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="col-sm-3 col-form-label">Pekerjaan Ibu</label>
                                        <div class="col-sm-9">
                                            <?php
                                                
                                                echo cmb_dinamis('kerja_ibu', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="kerja_ibu"',null,null, 'jenis_pekerjaan');
                                                ?>
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="col-sm-3 col-form-label">Pendidikan Ibu</label>
                                        <div class="col-sm-9">
                                            <?php
                                                
                                                echo cmb_dinamis('pddk_ibu', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="pddk_ibu"',null,null, 'jenjang_pendidikan');
                                                ?>
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="col-sm-3 col-form-label">Penghasilan Ibu</label>
                                        <div class="col-sm-9">
                                            <?php
                                                
                                                echo cmb_dinamis('penghasilan_ibu', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="penghasilan_ibu"',null,null, 'penghasilan');
                                                ?>
                                            <div class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h5>IDENTITAS WALI</h5>
                        </div>
                        <div class="card-body">

                            <div class="form-group row ">
                                <label class="col-sm-3 col-form-label">Pilih Wali</label>
                                <div class="col-sm-9">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="wali" id="wali_ayah"
                                            value="Ayah">
                                        <label class="form-check-label" for="wali_ayah">Ayah</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="wali" id="wali_ibu"
                                            value="Ibu">
                                        <label class="form-check-label" for="wali_ibu">Ibu</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="wali" id="wali_lain"
                                            value="Lainnya">
                                        <label class="form-check-label" for="wali_lain">Lainnya</label>
                                    </div>
                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="col-sm-3 col-form-label">Nama Wali</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nm_wali" name="nm_wali" />

                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="col-sm-3 col-form-label">Hubungan Keluarga</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="hub_wali" name="hub_wali" />

                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="col-sm-3 col-form-label">NIK</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nik_wali" maxlength="16"
                                        name="nik_wali" />

                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="col-sm-3 col-form-label">Status Wali</label>
                                <div class="col-sm-9">
                                    <?php
                                                
                                        echo cmb_dinamis('stts_wali', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="stts_wali"',null,null, 'status_ortu');
                                    ?>
                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="col-sm-3 col-form-label">No. HP Wali</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="hp_wali" name="hp_wali" />

                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="col-sm-3 col-form-label">Pekerjaan Wali</label>
                                <div class="col-sm-9">
                                    <?php
                                                
                                        echo cmb_dinamis('kerja_wali', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="kerja_wali"',null,null, 'jenis_pekerjaan');
                                    ?>
                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="col-sm-3 col-form-label">Penghasilan Wali</label>
                                <div class="col-sm-9">
                                    <?php
                                        echo cmb_dinamis('penghasilan_wali', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="penghasilan_wali"',null,null, 'penghasilan');
                                    ?>
                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn_simpan" onclick="simpan()">Simpan </button>
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
        $(this).find('form').trigger('reset');
        $(this).find('.select2').val('').trigger('change');
        $(this).find('.invalid-feedback').text('');
        $(this).find('#pic').removeAttr('src');

    });

    $('input[name=wali]').click(function() {
        if ($('input[name=wali]:checked').val() == 'Ayah') {
            $('#hub_wali').val('Ayah');
            $('#nm_wali').val($('#nm_ayah').val());
            $('#nik_wali').val($('#nik_ayah').val());
            $('#stts_wali').val($('#stts_ayah option:selected').val()).trigger('change');
            $('#hp_wali').val($('#hp_ayah').val());
            $('#kerja_wali').val($('#kerja_ayah option:selected').val()).trigger('change');
            $('#penghasilan_wali').val($('#penghasilan_ayah option:selected').val()).trigger('change');
        } else if ($('input[name=wali]:checked').val() == 'Ibu') {
            $('#hub_wali').val('Ibu');
            $('#nm_wali').val($('#nm_ibu').val());
            $('#nik_wali').val($('#nik_ibu').val());
            $('#stts_wali').val($('#stts_ibu option:selected').val()).trigger('change');
            $('#hp_wali').val($('#hp_ibu').val());
            $('#kerja_wali').val($('#kerja_ibu option:selected').val()).trigger('change');
            $('#penghasilan_wali').val($('#penghasilan_ibu option:selected').val()).trigger('change');
        } else {
            $('#hub_wali').val('');
            $('#nm_wali').val('');
            $('#nik_wali').val('');
            $('#stts_wali').val('').trigger('change');
            $('#hp_wali').val('');
            $('#kerja_wali').val('').trigger('change');
            $('#penghasilan_wali').val('').trigger('change');
        }
    })
    // Autocomplete Select2
    $('#prop').select2({
        placeholder: '--- Cari Propinsi ---',
        minimumInputLength: 1,
        allowClear: true,
        ajax: {
            url: '<?=base_url('admin/cari/getWilayahAutoComplete')?>',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    search: params.term,
                    page: params.page,
                    field: 'provinsi',
                    groupBy: 'provinsi',
                };

            },
            processResults: function(data, params) {
                params.page = params.page || 1;
                return {
                    results: data,
                    pagination: {
                        more: (params.page * 5) < data.length
                    }
                };
            },
            cache: true
        }

    });
    $('#kab').select2({
        placeholder: '--- Cari Kabupaten ---',
        minimumInputLength: 1,
        allowClear: true,
        ajax: {
            url: '<?=base_url('admin/cari/getKabAutoComplete')?>',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    search: params.term,
                    page: params.page,
                    field: 'kabupaten',
                    groupBy: 'kabupaten',
                    whereProp: $('#prop option:selected').val(),
                };

            },
            processResults: function(data, params) {
                params.page = params.page || 1;
                return {
                    results: data,
                    pagination: {
                        more: (params.page * 5) < data.length
                    }
                };
            },
            cache: true
        }

    });
    $('#kec').select2({
        placeholder: '--- Cari Kecamatan ---',
        minimumInputLength: 1,
        allowClear: true,
        ajax: {
            url: '<?=base_url('admin/cari/getKecAutoComplete')?>',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    search: params.term,
                    page: params.page,
                    field: 'kecamatan',
                    groupBy: 'kecamatan',
                    whereProp: $('#prop option:selected').val(),
                    whereKab: $('#kab option:selected').val(),
                };

            },
            processResults: function(data, params) {
                params.page = params.page || 1;
                return {
                    results: data,
                    pagination: {
                        more: (params.page * 5) < data.length
                    }
                };
            },
            cache: true
        }

    });
    $('#desa').select2({
        placeholder: '--- Cari Desa ---',
        minimumInputLength: 1,
        allowClear: true,
        ajax: {
            url: '<?=base_url('admin/cari/getDesaAutoComplete')?>',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    search: params.term,
                    page: params.page,
                    field: 'kelurahan',
                    groupBy: '',
                    whereProp: $('#prop option:selected').val(),
                    whereKab: $('#kab option:selected').val(),
                    whereKec: $('#kec option:selected').val(),
                };

            },
            processResults: function(data, params) {
                params.page = params.page || 1;
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.text + " (" + item.kodepos + ")",
                            id: item.id,
                            kodepos: item.kodepos
                        }
                    }),
                    pagination: {
                        more: (params.page * 5) < data.length
                    }
                };
            },
            cache: true
        }

    }).on('select2:select', function(e) {
        //console.log($(this).select2('data')[0]);
        //var data = $(this).find(':selected').val();
        //console.log($(this).select2('data')[0]);
        var data = $(this).select2('data')[0];
        $('#kodepos').val(data.kodepos);
    });
    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
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
                $('#exampleModalLabel').text('Edit Siswa');
                $.each(response.data, function(key, value) {

                    if (key != "foto_siswa") {
                        if ($('#' + key).is('.select2')) {
                            //$('#' + key).val(value).trigger('change');
                            if (key != "prop" || key != "kab" || key != "kec" || key != "desa") {
                                $('#' + key).val(value).trigger('change');
                            }
                            if (key == "prop" || key == "kab" || key == "kec" || key == "desa") {
                                var newOption = new Option(value, value, true, true);
                                $('#' + key).append(newOption).trigger('change');
                            }
                        } else {
                            $('#' + key).val(value);
                        }
                    } else if (key == "foto_siswa") {
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

function getKKS() {
    var val = $('#kks_pip_pkh option:selected').val();
    if (val == "Y") {
        $('#box_no_kks').attr('hidden', false)
    } else {
        $('#box_no_kks').attr('hidden', true)
    }
}

function getDomisili() {
    var val = $('#jns_tinggal option:selected').val();
    if (val == 4 || val == 5) {
        $('#box_pondok, #box_alamat_pondok').attr('hidden', false)
    } else if (val == 3 || val == 6) {
        $('#box_pondok').attr('hidden', true)
        $('#box_alamat_pondok').attr('hidden', false)
    } else {
        $('#box_pondok, #box_alamat_pondok').attr('hidden', true)
    }
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