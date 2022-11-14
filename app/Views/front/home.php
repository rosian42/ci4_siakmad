<?= $this->extend('layout/front/learnpress/temp_home');?>
<?= $this->section('content');?>


<!-- Revolution Slider 5.x CSS settings -->
<link  href="<?=base_url('assets/learnpress');?>/js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css"/>
<link  href="<?=base_url('assets/learnpress');?>/js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css"/>
<link  href="<?=base_url('assets/learnpress');?>/js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css"/>
<!-- Revolution Slider 5.x SCRIPTS -->
<script src="<?=base_url('assets/learnpress');?>/js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
<script src="<?=base_url('assets/learnpress');?>/js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>

<!-- Start main-content -->
  <div class="main-content">
    <!-- Section: home -->
    <section id="home">
        
      <!-- Slider Revolution Start -->
      <div class="rev_slider_wrapper">
        <div class="rev_slider" data-version="5.0">
          <ul>
            <?php
              $slider = dataDinamis('tb_slider', ['is_aktif'=> 'Y', 'deleted_at'=>null], 'created_at DESC', null, null);
              $no=1;
              
              foreach ($slider as $key) {
              $noIndex = $no++;
             
            ?>
            <!-- SLIDE 1 -->
            <li data-index="rs-<?=$noIndex?>" data-transition="slidingoverlayhorizontal" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="<?=base_url().'/'.$key->slider_img;?>" data-rotate="0" data-saveperformance="off" data-title="<?=$key->slider_title;?>" data-description="">
              <!-- MAIN IMAGE -->
              <img src="<?=base_url().'/'.$key->slider_img;?>"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="10" data-no-retina>
              <!-- LAYERS -->

              <!-- LAYER NR. 1 -->
              <div class="tp-caption tp-resizeme text-uppercase text-white font-raleway"
                id="rs-<?=$noIndex?>-layer-1"

                data-x="['left']"
                data-hoffset="['30']"
                data-y="['middle']"
                data-voffset="['-110']" 
                data-fontsize="['100']"
                data-lineheight="['110']"
                data-width="none"
                data-height="none"
                data-whitespace="nowrap"
                data-transform_idle="o:1;s:500"
                data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                data-start="1000" 
                data-splitin="none" 
                data-splitout="none" 
                data-responsive_offset="on"
                style="z-index: 7; white-space: nowrap; font-weight:700;"><?=$key->slider_title;?>
              </div>

              <!-- LAYER NR. 2 -->
              <div class="tp-caption tp-resizeme text-uppercase text-white font-raleway bg-theme-colored-transparent border-left-theme-color-2-6px pl-20 pr-20"
                id="rs-<?=$noIndex?>-layer-2"

                data-x="['left']"
                data-hoffset="['35']"
                data-y="['middle']"
                data-voffset="['-25']" 
                data-fontsize="['35']"
                data-lineheight="['54']"
                data-width="none"
                data-height="none"
                data-whitespace="nowrap"
                data-transform_idle="o:1;s:500"
                data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                data-start="1000" 
                data-splitin="none" 
                data-splitout="none" 
                data-responsive_offset="on"
                style="z-index: 7; white-space: nowrap; font-weight:600;"><?=$key->slider_subtitle;?> 
              </div>

              <!-- LAYER NR. 3 -->
              <div class="tp-caption tp-resizeme text-white" 
                id="rs-<?=$noIndex?>-layer-3"

                data-x="['left']"
                data-hoffset="['35']"
                data-y="['middle']"
                data-voffset="['35']"
                data-fontsize="['16']"
                data-lineheight="['28']"
                data-width="none"
                data-height="none"
                data-whitespace="nowrap"
                data-transform_idle="o:1;s:500"
                data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                data-start="1400" 
                data-splitin="none" 
                data-splitout="none" 
                data-responsive_offset="on"
                style="z-index: 5; white-space: nowrap; letter-spacing:0px; font-weight:400;"><?=$key->slider_description;?>
              </div>

              <!-- LAYER NR. 4 -->
              <div class="tp-caption tp-resizeme" 
                id="rs-<?=$noIndex?>-layer-4"

                data-x="['left']"
                data-hoffset="['35']"
                data-y="['middle']"
                data-voffset="['100']"
                data-width="none"
                data-height="none"
                data-whitespace="nowrap"
                data-transform_idle="o:1;"
                data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
                data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                data-start="1400" 
                data-splitin="none" 
                data-splitout="none" 
                data-responsive_offset="on"
                style="z-index: 5; white-space: nowrap; letter-spacing:1px;">
                <?php if($key->slider_btntext){?>
                <a class="btn btn-colored btn-lg btn-flat btn-theme-colored border-left-theme-color-2-6px pl-20 pr-20" target="_blank" href="<?=$key->slider_link;?>"><?=$key->slider_btntext;?></a> 
                <?php } ?>
              </div>
            </li>
          <?php } ?>
          </ul>
        </div>
        <!-- end .rev_slider -->
      </div>
      <!-- end .rev_slider_wrapper -->
      <script>
        $(document).ready(function(e) {
          $(".rev_slider").revolution({
            sliderType:"standard",
            sliderLayout: "auto",
            dottedOverlay: "none",
            delay: 5000,
            navigation: {
                keyboardNavigation: "off",
                keyboard_direction: "horizontal",
                mouseScrollNavigation: "off",
                onHoverStop: "off",
                touch: {
                    touchenabled: "on",
                    swipe_threshold: 75,
                    swipe_min_touches: 1,
                    swipe_direction: "horizontal",
                    drag_block_vertical: false
                },
              arrows: {
                style:"zeus",
                enable:true,
                hide_onmobile:true,
                hide_under:600,
                hide_onleave:true,
                hide_delay:200,
                hide_delay_mobile:1200,
                tmp:'<div class="tp-title-wrap">    <div class="tp-arr-imgholder"></div> </div>',
                left: {
                  h_align:"left",
                  v_align:"center",
                  h_offset:30,
                  v_offset:0
                },
                right: {
                  h_align:"right",
                  v_align:"center",
                  h_offset:30,
                  v_offset:0
                }
              },
              bullets: {
                enable:true,
                hide_onmobile:true,
                hide_under:600,
                style:"metis",
                hide_onleave:true,
                hide_delay:200,
                hide_delay_mobile:1200,
                direction:"horizontal",
                h_align:"center",
                v_align:"bottom",
                h_offset:0,
                v_offset:30,
                space:5,
                tmp:'<span class="tp-bullet-img-wrap">  <span class="tp-bullet-image"></span></span><span class="tp-bullet-title">{{title}}</span>'
              }
            },
            responsiveLevels: [1240, 1024, 778],
            visibilityLevels: [1240, 1024, 778],
            gridwidth: [1170, 1024, 778, 480],
            gridheight: [650, 768, 960, 720],
            lazyType: "none",
            parallax: {
                origo: "slidercenter",
                speed: 1000,
                levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 100, 55],
                type: "scroll"
            },
            shadow: 0,
            spinner: "off",
            stopLoop: "on",
            stopAfterLoops: 0,
            stopAtSlide: -1,
            shuffle: "off",
            autoHeight: "off",
            fullScreenAutoWidth: "off",
            fullScreenAlignForce: "off",
            fullScreenOffsetContainer: "",
            fullScreenOffset: "0",
            hideThumbsOnMobile: "off",
            hideSliderAtLimit: 0,
            hideCaptionAtLimit: 0,
            hideAllCaptionAtLilmit: 0,
            debugMode: false,
            fallbacks: {
                simplifyAll: "off",
                nextSlideOnWindowFocus: "off",
                disableFocusListener: false,
            }
          });
        });
      </script>
      <!-- Slider Revolution Ends -->

    </section>

    <!-- Section: About -->
    <section id="about">
      <div class="container mt-0 pb-70 pt-0">
        <div class="section-content">
          <div class="row mt-10">
            <div class="col-sm-12 col-md-6 mb-sm-20 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
              <h3 class="text-uppercase mt-0">Welcome To <span class="text-theme-color-2">  LearnPress </span></h3>
              <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisi cing elit. Quos dolo rem consequ untur, natus laudantium commodi earum aliquid in ullam.Lorem ipsum.</p>
              <p class="mb-15">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum sunt ut dolorem laboriosam culpa excepturi sed distinctio eius! Ut magnam numquam libero quia vero blanditiis fugit corporis quisquam, debitis quidem laudantium deleniti.</p>
              <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum sunt ut dolorem laboriosam culpa excepturi sed distinctio eius! Ut magnam numquam libero quia vero blanditiis fugit corporis quisquam, debitis quidem laudantium deleniti.</p>
              <a class="btn btn-colored btn-theme-colored btn-lg text-uppercase font-13 mt-0" href="#">View Details</a> 
            </div>
            <div class="col-sm-12 col-md-6 mt-0 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
              <div class="video-popup">                
                <a href="https://www.youtube.com/watch?v=pW1uVUg5wXM" data-lightbox-gallery="youtube-video" title="Video">
                  <img alt="" src="<?=base_url('assets/learnpress');?>/images/about/5.jpg" class="img-responsive img-fullwidth mt-10 ml-30 ml-xs-0 ml-sm-0">
                </a>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Blog -->
    <section id="blog">
      <div class="container pt-70">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="mt-0 line-height-1 text-uppercase">Berita  <span class="text-theme-color-2"> Terbaru</span></h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
              <div class="owl-carousel-3col owl-nav-top mb-sm-0" data-dots="true">
              <?php
                $beritaTerbaru = dataDinamis('posts', ['post_type' => 'artikel','post_status'=> 'active', 'deleted_at'=>null], 'post_time DESC', null, '5');
                foreach ($beritaTerbaru as $key) {
                
               
              ?>
              <div class="item">
                <article class="post clearfix maxwidth600 mb-sm-30 wow fadeInRight" data-wow-delay=".2s">
                  <div class="entry-header">
                    <div class="post-thumb thumb"> <img src="<?=base_url(LOKASI_UPLOAD."/".$key->post_thumbnail);?>" alt="" class="img-responsive img-fullwidth" style="height: 200px;"> </div>
                    
                  </div>
                  <div class="entry-content border-1px p-20">
                    <h4 class="entry-title mt-0 pt-0"><a href="<?php echo set_post_link($key->post_id);?>"><?=$key->post_title;?></a></h4>
                      <span class="text-theme-colored mr-10 font-14"><?=post_penulis($key->username);?> | <i class="fa fa-calendar mr-5 text-theme-colored"></i> <?=tgl_indonesia($key->post_time);?></span>
                    
                    <p class="text-left mb-20 mt-5 font-13"><?=(isset($key->post_description))?substr($key->post_description,0,100):substr(bersihkan_html($key->post_content), 0, 100);?></p>
                    
                    <a class="btn btn-flat btn-dark btn-theme-colored btn-sm pull-left" href="<?php echo set_post_link($key->post_id);?>">Read more</a>
                    <div class="clearfix"></div>
                  </div>
                </article>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: events -->
    <section class="divider parallax layer-overlay overlay-dark-8" data-stellar-background-ratio="0.5" data-bg-img="<?=base_url('assets/learnpress');?>/images/bg/bg1.jpg">
      <div class="container pt-40 pb-60">
        <div class="section-content">
          <div class="row">
            <div class="col-md-6 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
              <h3 class="text-uppercase ml-15 title line-bottom text-white">Agenda</h3>
              <div class="bxslider bx-nav-top p-0 m-0">
                <?php
                  $agenda = dataDinamis('posts', ['post_type' => 'agenda','post_status'=> 'active', 'deleted_at'=>null], 'post_time DESC', null, '5');
                  foreach ($agenda as $key) {
                  
                 
                ?>
                <div class="col-xs-12 pr-0 col-sm-6 col-md-6 mb-20">
                  <div class="pricing table-horizontal maxwidth400">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="thumb">
                        <img class="img-fullwidth mb-sm-0" src="<?=base_url().'/'.$key->post_thumbnail;?>" alt="">
                        </div>
                      </div>
                      <div class="col-md-6 p-10 pl-sm-50">
                        <h4 class="mt-0 mb-5 mt-10"><a href="<?php echo set_post_link($key->post_id);?>" class="text-white"><?=$key->post_title;?></a></h4>
                        <ul class="list-inline font-16 mb-5 text-white">
                          <li class="pr-0"><i class="fa fa-calendar mr-5"></i> <?=YMDtotglindo($key->event_date);?> </li>
                    
                        </ul>
                        <p class="mb-0 font-13 text-white mr-5 pr-10"><?=(isset($key->post_description))?substr($key->post_description,0,75):substr(bersihkan_html($key->post_content), 0, 75);?></p>
                        <a class="font-16  text-white mt-20" href="<?php echo set_post_link($key->post_id);?>">Read More →</a>
                      </div>
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
            <div class="col-md-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
              <h3 class="text-uppercase ml-15 title line-bottom text-white">Pengumuman</h3>
              <div class="bxslider bx-nav-top p-0 m-0">
                <?php
                  $pengumuman = dataDinamis('posts', ['post_type' => 'pengumuman','post_status'=> 'active', 'deleted_at'=>null], 'post_time DESC', null, '5');
                  foreach ($pengumuman as $key) {
                  
                 
                ?>
                <div class="col-xs-12 pr-0 col-sm-6 col-md-6 mb-20">
                  <div class="pricing table-horizontal maxwidth400">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="thumb">
                        <img class="img-fullwidth mb-sm-0" src="<?=base_url().'/'.$key->post_thumbnail;?>" alt="">
                        </div>
                      </div>
                      <div class="col-md-6 p-10 pl-sm-50">
                        <h4 class="mt-0 mb-5 mt-10"><a href="<?php echo set_post_link($key->post_id);?>" class="text-white"><?=$key->post_title;?></a></h4>
                        <ul class="list-inline font-16 mb-5 text-white">
                          <li class="pr-0"><i class="fa fa-calendar mr-5"></i> <?=tgl_indonesia($key->post_time);?> </li>
                    
                        </ul>
                        <p class="mb-0 font-13 text-white mr-5 pr-10"><?=(isset($key->post_description))?substr($key->post_description,0,75):substr(bersihkan_html($key->post_content), 0, 75);?></p>
                        <a class="font-16  text-white mt-20" href="<?php echo set_post_link($key->post_id);?>">Read More →</a>
                      </div>
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: teachers -->
    <section>
      <div class="container pt-70 pb-40">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="mt-0 line-height-1 text-uppercase"><span class="text-theme-color-2">Guru</span></h2>
            </div>
          </div>
        </div>
        <div class="row multi-row-clearfix">
          <div class="col-md-12">
            <div class="owl-carousel-4col" data-nav="true">
              <?php
                $guru = dataDinamis('tb_guru', null, null, null);
                foreach ($guru as $key) {
              ?>
              <div class="item">
                <div class="hover-effect mb-30">
                  <div class="thumb">
                    <img class="img-fullwidth" alt="" src="<?=base_url().'/'.$key->foto?>">
                    <div class="hover-link">
                      <ul class="styled-icons icon-dark icon-theme-colored icon-circled icon-sm">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="details p-15 pt-10 pb-10">
                    <h4 class="title mb-5"><?=$key->nama_lengkap?></h4>
                    <!--<h5 class="sub-title mt-0 mb-15">Teacher's Designation</h5>-->
                    <a class="btn btn-theme-colored btn-sm" href="page-doctor-details.html">view details</a>
                  </div>
                </div>
              </div>
            <?php } ?>
              
            </div>
          </div>
        </div>
      </div>
    </section>

    
    
<!-- Section: Client Say -->
    <section class="divider parallax layer-overlay overlay-dark-4" data-background-ratio="0.5" data-bg-img="<?=base_url('assets/learnpress');?>/images/bg/bg2.jpg">
      <div class="container pt-60 pb-60">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <h2 class="text-uppercase mt-0 pb-0  text-center text-white">Testimoni</h2>
            <div class="owl-carousel-1col" data-dots="true">
              <?php 
                    $testi = dataDinamis('tb_testimoni', ['is_aktif'=> 'Y', 'deleted_at'=>null], 'created_at DESC', null, null);
                    foreach ($testi as $key) {
              ?>
              <div class="item">
                <div class="testimonial-wrapper text-center">
                  <div class="thumb"><img class="" alt="" src="<?=base_url($key->testimoni_img);?>"></div>
                  <div class="content pt-10">
                    <p class="lead text-white"><?=$key->testimoni_content;?></p>
                    <h4 class="author text-white mb-0"><?=$key->testimoni_name;?></h4>
                    <h6 class="title text-white mt-0 mb-15"><?=$key->testimoni_position;?></h6>
                  </div>
                </div>
              </div>
            <?php } ?>
              
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
      (Load Extensions only on Local File Systems ! 
       The following part can be removed on Server for On Demand Loading) --> 
<script type="text/javascript" src="<?=base_url('assets/learnpress');?>/js/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script> 
<script type="text/javascript" src="<?=base_url('assets/learnpress');?>/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script> 
<script type="text/javascript" src="<?=base_url('assets/learnpress');?>/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script> 
<script type="text/javascript" src="<?=base_url('assets/learnpress');?>/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script> 
<script type="text/javascript" src="<?=base_url('assets/learnpress');?>/js/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script> 
<script type="text/javascript" src="<?=base_url('assets/learnpress');?>/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script> 
<script type="text/javascript" src="<?=base_url('assets/learnpress');?>/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script> 
<script type="text/javascript" src="<?=base_url('assets/learnpress');?>/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script> 
<script type="text/javascript" src="<?=base_url('assets/learnpress');?>/js/revolution-slider/js/extensions/revolution.extension.video.min.js"></script>
<?=$this->endSection('content');?>         
