
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
		  <label for="input_set_socials_twitter" class="form-label">Twitter</label>
		  <input type="text" class="form-control" id="input_set_socials_twitter" placeholder="Link Twitter" name="set_socials_twitter" value="<?php echo (isset($set_socials_twitter))?$set_socials_twitter:""?>"> 
		</div>

		<div class="mb-3">
		  <label for="input_set_socials_fb" class="form-label">Facebook</label>
		  <input type="text" class="form-control" id="input_set_socials_fb" placeholder="Link Facebook" name="set_socials_fb" value="<?php echo (isset($set_socials_fb))?$set_socials_fb:""?>"> 
		</div>
		<div class="mb-3">
		  <label for="input_set_socials_github" class="form-label">Github</label>
		  <input type="text" class="form-control" id="input_set_socials_github" placeholder="Link Github" name="set_socials_github" value="<?php echo (isset($set_socials_github))?$set_socials_github:""?>"> 
		</div>
		
		<div>
			<input type="submit" class="btn btn-primary" name="submit" value="Simpan">
		</div>
	</form>
</div>
