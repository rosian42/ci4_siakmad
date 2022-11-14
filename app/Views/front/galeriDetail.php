<?= $this->extend('layout/front/learnpress/temp_home');?>
<?= $this->section('content');?>			
			
  <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="images/bg/bg6.jpg">
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-white text-center"><?=$galeri['galeri_name']?></h2>
              
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            

            

            <!-- Portfolio Gallery Grid -->
            <div class="gallery-isotope grid-3 gutter-small clearfix" data-lightbox="gallery">
              <!-- Portfolio Item Start -->
              <?php
              	foreach($galeriDetail as $key => $value ) {
              ?>
              <div class="gallery-item">
                <div class="thumb">
                  <img class="img-fullwidth" src="<?=base_url($value['galeri_detail_name'])?>" alt="project">
                  <div class="overlay-shade"></div>
                  
                  <div class="icons-holder">
                    <div class="icons-holder-inner">
                      <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                        <a href="<?=base_url($value['galeri_detail_name'])?>" data-lightbox-gallery="gallery" ><i class="fa fa-picture-o"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          		<?php } ?>
              <!-- Portfolio Item End -->

            </div>
            <!-- End Portfolio Gallery Grid -->


          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->
<?=$this->endSection();?>