<?= $this->extend('layout/admin');?>
<?= $this->section('content');?>
<!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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
                    <label for="nm_kurikulum" class="col-sm-2 col-form-label">Nama Kurikulum</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control <?=($validation->hasError('nm_kurikulum'))?'is-invalid':'';?>" id="nm_kurikulum" name="nm_kurikulum" placeholder="Misal : Kurikulum K-13" value="<?php echo (isset($nm_kurikulum))?$nm_kurikulum:''?>">
                      <div class="invalid-feedback">
                        <?=$validation->getError('nm_kurikulum');?>
                      </div>

                    </div>
                  </div>

                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">is Active</label>
                    <div class="col-sm-10">
                      <select name="is_aktif" class="form-control select2 <?=($validation->hasError('is_aktif'))?'is-invalid':'';?>">
                        <option></option>
                        <option value="Y" <?php echo (isset($is_aktif) && $is_aktif=="Y")?"selected":"";?>> Aktif </option>
                        <option value="N" <?php echo (isset($is_aktif) && $is_aktif=="N")?"selected":"";?>> Tidak Aktif </option>
                      </select>
                      <div class="invalid-feedback">
                          <?=$validation->getError('is_aktif');?>
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
$(function () {
    //Initialize Select2 Elements
  $('.select2').select2({
    placeholder: "-- Pilih Opsi --",
    allowClear: true
  });
	
})
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

<?=$this->endSection();?>