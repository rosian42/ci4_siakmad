
<div class="card-header">
    <i class="fas fa-table me-1"></i>
    <?=$templateJudul?>
</div>
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
	<form action="" method="post" enctype="multipart/form-data">
	    <div class="mb-3">
		  <label for="input_post_title" class="form-label">Judul</label>
		  <input type="text" class="form-control" id="input_post_title" placeholder="Judul Artikel" name="post_title" value="<?php echo (isset($post_title))?$post_title:""?>"> 
		</div>
		<div class="mb-3">
		  <label for="input_post_status" class="form-label">Status</label>
		  <select name="post_status" class="form-select">
		  	<option></option>
		  	<option value="active" <?php echo (isset($post_status) && $post_status=="active")?"selected":"";?>> Aktif </option>
		  	<option value="inactive" <?php echo (isset($post_status) && $post_status=="inactive")?"selected":"";?>> Tidak Aktif </option>
		  </select>
		</div>
		<?php
			if(isset($post_thumbnail)){
		?>
			<div class="mb-3">
				<img src="<?php echo base_url(LOKASI_UPLOAD."/".$post_thumbnail);?>" class="pb-2 mb-2 img-thumbnail w-50" />
			</div>
		<?php
			}
		?>
		<div class="mb-3">
		  <label for="input_post_thumbnail" class="form-label">Thumbnail</label>
		  <input type="file" class="form-control" id="input_post_thumbnail" name="post_thumbnail" > 
		</div>
		<div class="mb-3">
		  <label for="input_post_deskripsi" class="form-label">Deskripsi</label>
		  <textarea class="form-control" id="input_post_deskripsi" name="post_description" rows="3"><?php echo (isset($post_description))?$post_description:""?></textarea>
		</div>
		<div class="mb-3">
		  <label for="summernote" class="form-label">Konten</label>
		  <textarea class="form-control" id="summernote" name="post_content" rows="10"><?php echo (isset($post_content))?$post_content:""?></textarea>
		</div>
		<div>
			<input type="submit" class="btn btn-primary" name="submit" value="Simpan Artikel">
		</div>
	</form>
</div>
                        