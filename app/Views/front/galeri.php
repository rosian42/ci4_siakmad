<?= $this->extend('layout/front/learnpress/temp_home');?>
<?= $this->section('content');?>
<div class="main-content bg-lighter">
	<!-- Section: inner-header -->
	<section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?=base_url('assets/learnpress');?>/images/bg/bg6.jpg">
	  <div class="container pt-70 pb-20">
	    <!-- Section Content -->
	    <div class="section-content">
	      <div class="row">
	        <div class="col-md-12">
	          <h2 class="title text-white text-center">Gallery</h2>
	        </div>
	      </div>
	    </div>
	  </div>
	</section>

	<!-- Section: Gallery -->
	<section id="gallery">
	 <div class="container pt-50 pb-30">
	    <div class="section-content">
	    <div class="row">
	      <div class="col-md-12">
	        
	        <!-- Portfolio Gallery Grid -->
	        <div id="grid" class="gallery-isotope grid-3 gutter clearfix">

	          <!-- Portfolio Item Start -->
	          <?php 
		          foreach ($record as $key => $value) {
		          	$imgPrev = getPrevAlbum($value['galeri_id']);
		        ?>
	          <div class="gallery-item wheel">
	            <div class="work-gallery">
	              <div class="gallery-thumb">
	                <img class="img-fullwidth" alt="" src="<?=base_url($imgPrev['galeri_detail_name']);?>">
	                <div class="gallery-overlay"></div>                  
	                <div class="gallery-contect">
	                  <ul class="styled-icons icon-bordered icon-circled icon-sm">
	                    <li><a href="<?php echo base_url("galeri/".$value['galeri_slug']);?>"><i class="fa fa-link"></i></a></li>
	                  </ul>
	                </div> 
	              </div>
	              <div class="gallery-bottom-part text-center">
	                <h4 class="title text-uppercase font-raleway font-weight-500 m-0"><?=$value['galeri_name'];?></h4>
	              </div>
	            </div>
	          </div>
	          <?php } ?>
	          <!-- Portfolio Item End -->

	          
	        </div>
	        <?php 
		          echo $pager->simpleLinks('ft','front');
		        ?>
	        <!-- End Portfolio Gallery Grid -->
	      </div>
	    </div>
	    </div>
	  </div >
	</section>

</div>
<?= $this->endSection();?>
