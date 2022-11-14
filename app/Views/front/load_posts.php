<?php


	        foreach ($records as $key) {
	        
	       
	    ?>
        <div class="col-sm-6 col-md-3 col-lg-3">
          <article class="post clearfix maxwidth600 mb-30">
            <div class="entry-header">
              <div class="post-thumb thumb"> <img src="<?=base_url($key['post_thumbnail']);?>" alt="" class="img-responsive img-fullwidth"> </div>
            </div>
            <div class="entry-content border-1px p-20">
              <h5 class="entry-title mt-0 pt-0"><a href="<?php echo set_post_link($key['post_id']);?>"><?=$key['post_title'];?></a></h5>
              <ul class="list-inline entry-date font-12 mt-5">
                <li class="pr-0"><a class="text-theme-colored" href="javascript:void(0)"><?=post_penulis($key['username']);?> |</a></li>
                <li class="pl-0"><span class="text-theme-colored"><?=tgl_indonesia($key['post_time']);?></span></li>
              </ul>

              <p class="text-left mb-20 mt-15 font-13">
              	<?php
              		echo (isset($key['post_description']))?substr($key['post_description'], 0, 100):substr(bersihkan_html($key['post_content']), 0, 100)
              	?>
              </p>
              <a class="btn btn-dark btn-theme-colored btn-xs btn-flat mt-0" href="<?php echo set_post_link($key['post_id']);?>">Read more</a>
              <div class="clearfix"></div>
            </div>
          </article>
        </div>
        <?php } ?>