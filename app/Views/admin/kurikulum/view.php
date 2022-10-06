<?= $this->extend('layout/admin');?>
<?= $this->section('content');?>

<!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
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
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="float-right">
	            	<a class="btn btn-sm btn-success" href="<?=base_url("admin/$controller/tambah")?>">Tambah</a>
	            </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="data" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                  	<th>No</th>
                    <th>Nama Kurikulum</th>
                    <th>Is Aktif</th>
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
          <!-- /.col -->
        </div>
        <!-- /.row -->
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
<!-- AdminLTE App -->
<script src="<?=base_url('assets/admin');?>/dist/js/adminlte.js"></script>

<script>
  var table;
  $(function () {
    
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
    			"type": "POST"
    		},
    		"columnDefs": [{
    			"targets": [],
    			"orderable": false,
    		}, ],
    });
  });

  function reload_table()
  {
      table.ajax.reload(null,false); //reload datatable ajax 
  }

  function hapus(id) {
    var link = "<?=site_url("admin/$controller/?aksi=hapus&id=")?>"+id;
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