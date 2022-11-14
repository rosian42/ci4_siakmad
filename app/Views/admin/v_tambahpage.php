
<?= $this->extend('layout/admin');?>
<?= $this->section('content');?>
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <!-- Theme style -->
	<link rel="stylesheet" href="<?=base_url('assets/admin');?>/dist/css/adminlte.min.css">
 <!-- summernote -->
 <link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/summernote/summernote-bs4.min.css">
  	<?php
		    $halaman = "page";
	?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?=$templateJudul;?></h1>
      </div>
      <div class="col-sm-6">
        <div class="float-right">
        	<a class="btn btn-sm btn-primary" href="<?=base_url("admin/$halaman")?>">Daftar</a>
        	<a class="btn btn-sm btn-success" href="<?=base_url("admin/$halaman/tambah")?>">Tambah</a>
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
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="" method="post" enctype="multipart/form-data">
            <div class="card-body">
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
			<div class="form-group">
				<label for="input_post_title">Judul</label>
				<input type="text" class="form-control" id="input_post_title" placeholder="Judul Artikel" name="post_title" value="<?php echo (isset($post_title))?$post_title:""?>">
			</div>
			<div class="form-group">
				<label for="input_post_status" class="form-label">Status</label>
				<select name="post_status" class="form-control select2">
					<option value="active" <?php echo (isset($post_status) && $post_status=="active")?"selected":"";?>> Aktif </option>
					<option value="inactive" <?php echo (isset($post_status) && $post_status=="inactive")?"selected":"";?>> Tidak Aktif </option>
				</select>
			</div>
			<?php
				if(isset($post_thumbnail)){
			?>
					<div class="col-sm-4">
            <div class="position-relative">
              <img src="<?php echo base_url(LOKASI_UPLOAD."/".$post_thumbnail);?>" class="img-fluid">
              
            </div>
          </div>
					
			<?php
				}
			?>
			<div class="form-group">
				<label for="input_post_thumbnail" class="form-label">Thumbnail</label>
				<div class="input-group">
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="input_post_thumbnail" name="post_thumbnail" > 
                            <label class="custom-file-label" for="input_post_thumbnail">Choose file</label>
					</div>
				
				</div>
			</div>
			<div class="form-group">
				<label for="input_post_deskripsi" class="form-label">Deskripsi</label>
  				<textarea class="form-control" id="input_post_deskripsi" name="post_description" rows="3"><?php echo (isset($post_description))?$post_description:""?></textarea>
                </div>

			<div class="form-group">
				<label for="summernote" class="form-label">Konten</label>
				<textarea class="form-control summernote" id="summernote" name="post_content" rows="10"><?php echo (isset($post_content))?$post_content:""?></textarea>
			</div>

			<div class="form-group">
				<div class="col-lg-3">
					<input type="checkbox" name="set_halaman_depan" value="1" 
					<?php echo (isset($set_halaman_depan))?'checked':''?>
					/> Halaman Depan?
				</div>
				<div class="col-lg-3">
					<input type="checkbox" name="set_halaman_kontak" value="1" 
					<?php echo (isset($set_halaman_kontak))?'checked':''?>
					/> Halaman Kontak?
				</div>
			</div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.card -->


      </div>
      <!--/.col (left) -->

    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>

    <!-- Main content -->


<script src="<?=base_url('assets/admin');?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets/admin');?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?=base_url('assets/admin');?>/plugins/select2/js/select2.full.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?=base_url('assets/admin');?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/admin');?>/dist/js/adminlte.js"></script>

<!-- Summernote -->
<script src="<?=base_url('assets/admin');?>/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/summernote/summernote-file.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/summernote/summernote-ext-rtl.js"></script>
<script>
$(function () {
    //Initialize Select2 Elements
  $('.select2').select2();
	$('.summernote').summernote({
            tabsize: 2,
            height: 200,
            callbacks: {
		        
	            onImageUpload: function (image) {

	                uploadImage(image[0]);
	                /*for (let i=0; i<image.length; i++) {
	                	$.upload(image[i]);
	                }*/
	            },
	            onMediaDelete: function(target){
	            	deleteImage(target[0].src);
	            }
	            ,
	            onFileUpload: function(file) {
	                myOwnCallBack(file[0]);
	            }
						}
   });
	bsCustomFileInput.init();
})
function uploadImage(image) {
    var data = new FormData();
    data.append("image", image, image.name);
    $.ajax({
        url: "<?php echo site_url('admin/summernote/upload_image')?>",
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: "POST",
        success: function(url) {
			$('.summernote').summernote("insertImage", url);
        },
        error: function(data) {
            console.log(data);
        }
    });
}

function deleteImage(src) {
    $.ajax({
        data: {src : src},
        type: "POST",
        url: "<?php echo site_url('admin/summernote/delete_image')?>",
        cache: false,
        success: function(response) {
            console.log(response);
        }
    });
}

function myOwnCallBack(file) {
    let data = new FormData();
    data.append("file", file, file.name);
    $.ajax({
        data: data,
        type: "POST",
        url: "<?php echo site_url('admin/summernote/upload_file')?>", //Your own back-end uploader
        cache: false,
        contentType: false,
        processData: false,
        /*xhr: function() { //Handle progress upload
            let myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) myXhr.upload.addEventListener('progress', progressHandlingFunction, false);
            return myXhr;
        },*/
        success: function(url) {
            var HTMLstring = '<iframe src="'+url+'" width="100%" height="600" allow="autoplay"></iframe>';
            $('.summernote').summernote('editor.pasteHTML', HTMLstring);
            /*if(reponse.status === true) {
                let listMimeImg = ['image/png', 'image/jpeg', 'image/jpg', 'image/webp', 'image/gif', 'image/svg'];
                let listMimeAudio = ['audio/mpeg', 'audio/ogg', 'audio/mp3'];
                let listMimeVideo = ['video/mpeg', 'video/mp4', 'video/webm'];
                let elem;
 
                if (listMimeImg.indexOf(file.type) > -1) {
                    //Picture
                    $('.tugas').summernote('editor.insertImage', reponse.filename);
                } else if (listMimeAudio.indexOf(file.type) > -1) {
                    //Audio
                    elem = document.createElement("audio");
                    elem.setAttribute("src", reponse.filename);
                    elem.setAttribute("controls", "controls");
                    elem.setAttribute("preload", "metadata");
                    $('.tugas').summernote('editor.insertNode', elem);
                } else if (listMimeVideo.indexOf(file.type) > -1) {
                    //Video
                    elem = document.createElement("video");
                    elem.setAttribute("src", reponse.filename);
                    elem.setAttribute("controls", "controls");
                    elem.setAttribute("preload", "metadata");
                    $('.tugas').summernote('editor.insertNode', elem);
                } else {
                    //Other file type
                    var node;
                    node = document.createElement("a");
                    let linkText = document.createTextNode(file.name);
                    node.appendChild(linkText);
                    node.title = file.name;
                    node.href = reponse.filename;
                    $('.tugas').summernote('insertNode', node);
                }
            }*/
        }
    });
}
	 
function progressHandlingFunction(e) {
    if (e.lengthComputable) {
        //Log current progress
        console.log((e.loaded / e.total * 100) + '%');
 
        //Reset progress on complete
        if (e.loaded === e.total) {
            console.log("Upload finished.");
        }
    }
}
</script>


<?=$this->endSection();?>  