<?= $this->extend('layout/front/template');?>
<?= $this->section('content');?>

	<!-- SLIDER -->
    <section>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item slider1 active">
                    <img src="<?=base_url('assets/front');?>/images/slider/1.jpg" alt="">
                    <div class="carousel-caption slider-con">
                        <h2>Welcome to <span>University</span></h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                        <a href="#" class="bann-btn-1">All Courses</a><a href="#" class="bann-btn-2">Read More</a>
                    </div>
                </div>
                <div class="item">
                    <img src="<?=base_url('assets/front');?>/images/slider/2.jpg" alt="">
                    <div class="carousel-caption slider-con">
                        <h2>Admission open <span>2018</span></h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                        <a href="#" class="bann-btn-1">Admission</a><a href="#" class="bann-btn-2">Read More</a>
                    </div>
                </div>
                <div class="item">
                    <img src="<?=base_url('assets/front');?>/images/slider/3.jpg" alt="">
                    <div class="carousel-caption slider-con">
                        <h2>Education <span>Master</span></h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                        <a href="#" class="bann-btn-1">All Courses</a><a href="#" class="bann-btn-2">Read More</a>
                    </div>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <i class="fa fa-chevron-left slider-arr"></i>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <i class="fa fa-chevron-right slider-arr"></i>
            </a>
        </div>
    </section>

    <!-- BERITA TERBARU -->
    <section class="pop-cour">
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="con-title">
                    <h2>Berita <span>Terbaru</span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <?php
                            $countRecord = count($record);
                            $col1 = array_slice($record, 0, $countRecord/2 + 0.5);
                            $col2 = array_slice($record, $countRecord/2 + 0.5, $countRecord);
                            foreach ($col1 as $key => $value) {
                            
                         
                        ?>
                        <!--POPULAR COURSES-->
                        <div class="home-top-cour">
                            <!--POPULAR COURSES IMAGE-->
                            <div class="col-md-3"> <img src="<?=base_url(LOKASI_UPLOAD."/".$value['post_thumbnail']);?>" alt=""> </div>
                            <!--POPULAR COURSES: CONTENT-->
                            <div class="col-md-9 home-top-cour-desc">
                                <a href="<?php echo set_post_link($value['post_id']);?>">
                                    <h3><?=$value['post_title'];?></h3>
                                </a>
                                <p><?=substr(strip_tags($value['post_content']),0,150);?></p> 
                                <div class="hom-list-share">
                                    <ul>
                                        <li><a href="course-details.html"><i class="fa fa-bar-chart" aria-hidden="true"></i> Book Now</a> </li>
                                        <li><a href="course-details.html"><i class="fa fa-eye" aria-hidden="true"></i>10 Aavailable</a> </li>
                                        <li><a href="course-details.html"><i class="fa fa-share-alt" aria-hidden="true"></i> 570</a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <?php
                            
                            foreach ($col2 as $key => $value) {
                            
                         
                        ?>
                        <!--POPULAR COURSES-->
                        <div class="home-top-cour">
                            <!--POPULAR COURSES IMAGE-->
                            <div class="col-md-3"> <img src="<?=base_url(LOKASI_UPLOAD."/".$value['post_thumbnail']);?>" alt=""> </div>
                            <!--POPULAR COURSES: CONTENT-->
                            <div class="col-md-9 home-top-cour-desc">
                                <a href="<?php echo set_post_link($value['post_id']);?>">
                                    <h3><?=$value['post_title'];?></h3>
                                </a>
                                <p><?=substr(strip_tags($value['post_content']),0,150);?></p> 
                                <div class="hom-list-share">
                                    <ul>
                                        <li><a href="course-details.html"><i class="fa fa-bar-chart" aria-hidden="true"></i> Book Now</a> </li>
                                        <li><a href="course-details.html"><i class="fa fa-eye" aria-hidden="true"></i>10 Aavailable</a> </li>
                                        <li><a href="course-details.html"><i class="fa fa-share-alt" aria-hidden="true"></i> 570</a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

<?=$this->endSection('content');?>         
