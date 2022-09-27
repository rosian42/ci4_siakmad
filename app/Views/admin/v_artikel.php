<?= $this->extend('layout/admin');?>
<?= $this->section('content');?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  	<!-- Theme style -->
	<link rel="stylesheet" href="<?=base_url('assets/admin');?>/dist/css/adminlte.min.css">
<?php
    $halaman = "artikel";
?>
<div class="card-header">
    <i class="fas fa-table me-1"></i>
    DataTable Example
</div>
<div class="card-body">

    <div class="row mb-3">
        <div class="col-lg-3 pt-1 pb-1">
            <form action="" method="get">
                <input type="text" placeholder="Kata Kunci" name="kata_kunci" class="form-control" value="<?=$kata_kunci;?>">
            </form>
        </div>
        <div class="col-lg-9 pt-1 pb-1 text-end">
            <a href="<?=site_url("admin/$halaman/tambah")?>" class="btn btn-primary">Tambah</a>
        </div>
    </div>
    <?php
        $session = \Config\Services::session();
        if($session->getFlashdata('warning')){
    ?>
    <div class="alert alert-warning">
        <ul>
            <?php
                foreach($session->getFlashdata('warning') as $val)
                {
            ?>
                <li><?=$val;?></li>
            <?php       
                } 
            ?>
        </ul>
    </div>
    <?php       
        } 
        if ($session->getFlashdata('success')) {
    ?>
    <div class="alert alert-success"><?php echo $session->getFlashdata('success')?></div>
    <?php
        }
    ?>
    <table id="data" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="col-1">No.</th>
                <th class="col-6">Judul</th>
                <th class="col-3">Tanggal</th>
                <th class="col-2 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                
                foreach ($record as $value) {
                    $post_id = $value['post_id'];
                    $link_delete = site_url("admin/$halaman/?aksi=hapus&post_id=").$post_id;
                    $link_edit = site_url("admin/$halaman/edit/").$post_id;
            ?>
            <tr>
                <td><?=$nomor++;?></td>
                <td><?=$value['post_title'];?></td>
                <td><?=tgl_indonesia($value['post_time']);?></td>
                <td>
                    <a href="<?=$link_edit;?>" class="btn btn-sm btn-warning"> Edit</a>
                    <a href="<?=$link_delete;?>" onclick="return confirm('Yakin akan menghapus data ini?')" class="btn btn-sm btn-danger"> Del</a>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
    <?php
        echo $pager->links('dt','datatable');
    ?>
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
<!-- AdminLTE App -->
<script src="<?=base_url('assets/admin');?>/dist/js/adminlte.js"></script>

<script>
  $(function () {
    
    $('#data').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": false,
    });
  });
</script>
<?=$this->endSection();?>                        