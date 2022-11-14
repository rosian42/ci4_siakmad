<?= $this->extend('layout/admin');?>
<?= $this->section('content');?>
<!-- Select2 -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/select2/css/select2.min.css">
<link rel="stylesheet"
    href="<?=base_url('assets/admin');?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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
                <!-- Horizontal Form -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title"><?=strtoupper($metode)." ".strtoupper($templateJudul);?></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="" method="post">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="kd_kelas" class="col-sm-2 col-form-label">Kode Kelas</label>
                                <div class="col-sm-10">
                                    <input type="text" <?=($metode=='tambah')?'':'readonly';?>
                                        class="form-control <?=($validation->hasError('kd_kelas'))?'is-invalid':'';?>"
                                        id="kd_kelas" name="kd_kelas" placeholder="Misal : 1-A"
                                        value="<?php echo (isset($kd_kelas))?$kd_kelas:''?>">
                                    <div class="invalid-feedback">
                                        <?=$validation->getError('kd_kelas');?>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nm_kelas" class="col-sm-2 col-form-label">Nama Kelas</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control <?=($validation->hasError('nm_kelas'))?'is-invalid':'';?>"
                                        id="nm_kelas" name="nm_kelas" placeholder="Mis. : Kelas 1-A"
                                        value="<?php echo (isset($nm_kelas))?$nm_kelas:''?>">
                                    <div class="invalid-feedback">
                                        <?=$validation->getError('nm_kelas');?>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group row ">
                                <label class="col-sm-2 col-form-label">Tingkat Kelas</label>
                                <div class="col-sm-10">
                                    <?php
                          $selected =(isset($kd_tingkatan))?$kd_tingkatan:'';
                          $class = ($validation->hasError('kd_tingkatan'))?'is-invalid':'';
                          echo cmb_dinamis('kd_tingkatan', 'tb_tingkatan_kelas', 'nm_tingkatan_kelas', 'id_tingkatan_kelas', $selected, $class, 'id="kd_tingkatan"');
                        ?>
                                    <div class="invalid-feedback">
                                        <?=$validation->getError('kd_tingkatan');?>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <input type="submit" class="btn btn-info float-right" value="SIMPAN" />
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

<script src="<?=base_url('assets/admin');?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets/admin');?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?=base_url('assets/admin');?>/plugins/select2/js/select2.full.min.js"></script>
<!-- Toastr -->
<script src="<?=base_url('assets/admin');?>/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/admin');?>/dist/js/adminlte.js"></script>


<script>
$(function() {
    //Initialize Select2 Elements
    $('.select2').select2({
        placeholder: "----Pilih Opsi----",
        allowClear: true
    });

})
</script>

<?php 
    $session = \Config\Services::session();
    if($session->getFlashdata('warning')):?>
<script type="text/javascript">
toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.');
</script>

<?php elseif($session->getFlashdata('success')):?>
<script type="text/javascript">
toastr.success("<?php echo $session->getFlashdata('success')?>");
</script>

<?php else:?>

<?php endif;?>

<?=$this->endSection();?>