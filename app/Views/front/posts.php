<?= $this->extend('layout/front/learnpress/temp_home');?>
<?= $this->section('content');?>
<!-- Start main-content -->
<div class="main-content">
<!-- Section: inner-header -->
<section class="inner-header divider parallax layer-overlay overlay-dark-8" data-bg-img="<?=base_url('assets/learnpress');?>/images/bg/bg6.jpg">
  <div class="container pt-60 pb-60">
    <!-- Section Content -->
    <div class="section-content">
      <div class="row">
        <div class="col-md-12 text-center">
          <h3 class="font-28 text-white"><?=strtoupper($post_type)?></h2>
          
        </div>
      </div>
    </div>
  </div>      
</section>

<section>
  <div class="container">
    <div class="row multi-row-clearfix">
      <div class="blog-posts">
        <?php 
          foreach ($record as $key => $value) {
        ?>
        <div class="col-md-4">
          <article class="post clearfix mb-30 bg-lighter">
            <div class="entry-header">
              <div class="post-thumb thumb"> 
                <img src="<?=base_url($value['post_thumbnail']);?>" alt="><?=$value['post_title'];?>" class="img-responsive img-fullwidth"> 
              </div>
            </div>
            <div class="entry-content border-1px p-20 pr-10">
              <div class="entry-meta media mt-0 no-bg no-border">
                <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                    <ul>
                      <li class="font-16 text-white font-weight-600"><?=substr(tgl_indonesia_short($value['post_time']),0,2);?></li>
                      <li class="font-12 text-white text-uppercase"><?=substr(tgl_indonesia_short($value['post_time']),3,3);?></li>
                    </ul>
                  </div>
                <div class="media-body pl-15">
                  <div class="event-content pull-left flip">
                    <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a href="<?php echo set_post_link($value['post_id']);?>"><?=$value['post_title'];?></a></h4>
                    <span class="mb-10 text-gray-darkgray mr-10 font-13"><?=post_penulis($value['username']);?></span>                    
                  </div>
                </div>
              </div>
              <p class="mt-10"><?=(isset($value['post_description']))?substr($value['post_description'], 0,75):substr(bersihkan_html($value['post_content']), 0,75);?></p>
              <a href="<?php echo set_post_link($value['post_id']);?>" class="btn-read-more">Read more</a>
              <div class="clearfix"></div>
            </div>
          </article>
        </div>
      <?php } ?>
        
        <?php 
          echo $pager->simpleLinks('ft','front');
        ?>
      </div>
    </div>
  </div>
</section> 
</div>
<!-- end main-content -->
<?= $this->endSection();?>
