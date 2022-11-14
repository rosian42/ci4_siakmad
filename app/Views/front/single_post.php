<?= $this->extend('layout/front/learnpress/temp_single');?>
<?= $this->section('content');?>
<!-- Start main-content -->
<div class="main-content">
	<!-- Section: inner-header -->
	<section class="inner-header divider parallax layer-overlay overlay-dark-8" data-bg-img="images/bg/bg6.jpg">
	  <div class="container pt-60 pb-60">
	    <!-- Section Content -->
	    <div class="section-content">
	      <div class="row">
	        <div class="col-md-12 text-center">
	          <h2 class="title text-white"><?=$post['post_title'];?></h2>
	        </div>
	      </div>
	    </div>
	  </div>
	</section>

	<!-- Section: Blog -->
	<section>
	  <div class="container mt-30 mb-30 pt-30 pb-30">
	    <div class="row">
	      <div class="col-md-9">
	        <div class="blog-posts single-post">
	          <article class="post clearfix mb-0">
	            <div class="entry-header">
	              <div class="post-thumb thumb"> <img src="<?=base_url($post['post_thumbnail']);?>" alt="<?=$post['post_title'];?>" class="img-responsive img-fullwidth"> </div>
	            </div>
	            <div class="entry-content">
	              <div class="entry-meta media no-bg no-border mt-15 pb-20">
	                <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
	                  <ul>
	                    <li class="font-16 text-white font-weight-600"><?=substr(tgl_indonesia_short($post['post_time']),0,2);?></li>
	                    <li class="font-12 text-white text-uppercase"><?=substr(tgl_indonesia_short($post['post_time']),3,3);?></li>
	                  </ul>
	                </div>
	                <div class="media-body pl-15">
	                  <div class="event-content pull-left flip">
	                    <h3 class="entry-title text-white text-uppercase pt-0 mt-0"><a href="<?php echo set_post_link($post['post_id']);?>"><?=$post['post_title'];?></a></h3>
	                    <span class="mb-10 text-gray-darkgray mr-10 font-13"><?=post_penulis($post['username']);?></span>
	                  </div>
	                </div>
	              </div>
	              <p class="mb-15"><?=$post['post_content'];?></p>
	              <div class="mt-30 mb-0">
	                <h5 class="pull-left flip mt-10 mr-20 text-theme-colored">Share:</h5>
	                <ul class="styled-icons icon-circled m-0">
	                  <li><a href="http://www.facebook.com/sharer.php?href=<?php echo set_post_link($post['post_id']);?>" target="_blank" data-bg-color="#3A5795"><i class="fa fa-facebook text-white"></i></a></li>
	                  <li><a href="#" data-bg-color="#55ACEE"><i class="fa fa-twitter text-white"></i></a></li>
	                  <li><a href="#" data-bg-color="#A11312"><i class="fa fa-google-plus text-white"></i></a></li>
	                </ul>
	              </div>
	            </div>
	          </article>
	          
	        </div>
	      </div>
	      <div class="col-md-3">
	        <div class="sidebar sidebar-left mt-sm-30">
	          
	          	<div class="widget">
	              <h5 class="widget-title line-bottom">Berita Terbaru</h5>
	              <div class="owl-carousel-1col" data-dots="true">
	                <?php
		                $beritaTerbaru = dataDinamis('posts', ['post_type' => 'artikel','post_status'=> 'active', 'deleted_at'=>null], 'post_time DESC', null, '5');
		                foreach ($beritaTerbaru as $key) {
		                
		               
		            ?>
	                <div class="item">
	                  <img src="<?=base_url($key->post_thumbnail);?>" alt="">
	                  <h4 class="title"><a href="<?php echo set_post_link($key->post_id);?>"><?=$key->post_title;?></a></h4>
	                  <p><?=(isset($key->post_description))?substr($key->post_description,0,75)."...":substr(bersihkan_html($key->post_content), 0, 75)."...";?></p>
	                </div>
	            	<?php } ?>
	                
	              </div>
	            </div>
				<div class="widget">
	              <h5 class="widget-title line-bottom">Pengumuman Terbaru</h5>
	              <div class="owl-carousel-1col" data-dots="true">
	                <?php
		                $beritaTerbaru = dataDinamis('posts', ['post_type' => 'pengumuman','post_status'=> 'active', 'deleted_at'=>null], 'post_time DESC', null, '5');
		                foreach ($beritaTerbaru as $key) {
		                
		               
		            ?>
	                <div class="item">
	                  <img src="<?=base_url($key->post_thumbnail);?>" alt="">
	                  <h4 class="title"><a href="<?php echo set_post_link($key->post_id);?>"><?=$key->post_title;?></a></h4>
	                  <p><?=(isset($key->post_description))?substr($key->post_description,0,75)."...":substr(bersihkan_html($key->post_content), 0, 75)."...";?></p>
	                </div>
	            	<?php } ?>
	                
	              </div>
	            </div>
	            <div class="widget">
	              <h5 class="widget-title line-bottom">Agenda</h5>
	              <div class="owl-carousel-1col" data-dots="true">
	                <?php
		                $beritaTerbaru = dataDinamis('posts', ['post_type' => 'agenda','post_status'=> 'active', 'deleted_at'=>null], 'post_time DESC', null, '5');
		                foreach ($beritaTerbaru as $key) {
		                
		               
		            ?>
	                <div class="item">
	                  <img src="<?=base_url($key->post_thumbnail);?>" alt="">
	                  <h4 class="title"><a href="<?php echo set_post_link($key->post_id);?>"><?=$key->post_title;?></a></h4>
	                  <p><?=(isset($key->post_description))?substr($key->post_description,0,75)."...":substr(bersihkan_html($key->post_content), 0, 75)."...";?></p>
	                </div>
	            	<?php } ?>
	                
	              </div>
	            </div>	          
	          	
	        </div>
	      </div>
	    </div>
	  </div>
	</section> 
</div>  
<!-- end main-content -->
<?= $this->endSection();?>
