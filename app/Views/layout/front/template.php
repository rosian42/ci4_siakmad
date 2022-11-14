<!DOCTYPE html>
<html lang="id">


<head>
    <title>
        <?=(empty(konfigurasi_get('web_title')['konfigurasi_value']))?konfigurasi_get('web_title')['konfigurasi_default']:konfigurasi_get('web_title')['konfigurasi_value'];?> <?=(empty(konfigurasi_get('tagline')['konfigurasi_value']))?" | ".konfigurasi_get('tagline')['konfigurasi_default']:" | ".konfigurasi_get('tagline')['konfigurasi_value'];?>
    </title>
    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?=(empty(konfigurasi_get('meta_description')['konfigurasi_value']))?konfigurasi_get('meta_description')['konfigurasi_default']:konfigurasi_get('meta_description')['konfigurasi_value'];?>">
    <meta name="keyword" content="<?=(empty(konfigurasi_get('meta_keyword')['konfigurasi_value']))?konfigurasi_get('meta_keyword')['konfigurasi_default']:konfigurasi_get('meta_keyword')['konfigurasi_value'];?>">
    <!-- FAV ICON(BROWSER TAB ICON) -->
    <link rel="shortcut icon" href="<?=(empty(konfigurasi_get('favicon')['konfigurasi_value']))?base_url(konfigurasi_get('favicon')['konfigurasi_default']):base_url(konfigurasi_get('favicon')['konfigurasi_value']);?>" type="image/x-icon">
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CJosefin+Sans:600,700" rel="stylesheet">
    <!-- FONTAWESOME ICONS -->
    <link rel="stylesheet" href="<?=base_url('assets/front');?>/css/font-awesome.min.css">
    <!-- ALL CSS FILES -->
    <link href="<?=base_url('assets/front');?>/css/materialize.css" rel="stylesheet">
    <link href="<?=base_url('assets/front');?>/css/bootstrap.css" rel="stylesheet" />
    <link href="<?=base_url('assets/front');?>/css/style.css" rel="stylesheet" />
    <!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
    <link href="<?=base_url('assets/front');?>/css/style-mob.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <?=$this->include('layout/front/navbar');?>
    

	<?= $this->renderSection('content');?>



    <!-- FOOTER -->
    <section class="wed-hom-footer">
        <div class="container">
            <?php if(!empty(konfigurasi_get('deskripsi_sekolah')['konfigurasi_value'])){ ?>
           <div class="row">
                <div class="col-md-12">
                <h4>Tentang Kami</h4>
                <p><?=konfigurasi_get('deskripsi_sekolah')['konfigurasi_value'];?></p>
                <p></p>
              </div>
            </div>
            <?php }?>
            <div class="row wed-foot-link-1">
                <div class="col-md-4 foot-tc-mar-t-o">
                    <h4>Get In Touch</h4>
                    <p>Alamat: <?=(empty(konfigurasi_get('alamat_sekolah')['konfigurasi_value']))?konfigurasi_get('alamat_sekolah')['konfigurasi_default']:konfigurasi_get('alamat_sekolah')['konfigurasi_value'];?></p>
                    <p>Phone: <?=(empty(konfigurasi_get('no_telp')['konfigurasi_value']))?konfigurasi_get('no_telp')['konfigurasi_default']:konfigurasi_get('no_telp')['konfigurasi_value'];?></p>
                    <p>Whatsapp: <?=(empty(konfigurasi_get('no_wa')['konfigurasi_value']))?konfigurasi_get('no_wa')['konfigurasi_default']:konfigurasi_get('no_wa')['konfigurasi_value'];?></p>
                    <p>Email: <?=(empty(konfigurasi_get('email')['konfigurasi_value']))?konfigurasi_get('email')['konfigurasi_default']:konfigurasi_get('email')['konfigurasi_value'];?></p>
                </div>
                <div class="col-md-4">
                    <h4>DOWNLOAD OUR FREE MOBILE APPS</h4>
                    <ul>
                        <li><a href="#"><span class="sprite sprite-android"></span></a>
                        </li>
                        <li><a href="#"><span class="sprite sprite-ios"></span></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4>SOCIAL MEDIA</h4>
                    <ul>
                        <?php if(konfigurasi_get('facebook')['konfigurasi_value']){ ?>
                        <li><a href="<?=konfigurasi_get('facebook')['konfigurasi_value']?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </li>
                        <?php }?>
                        <?php if(konfigurasi_get('twitter')['konfigurasi_value']){ ?>
                        <li><a href="<?=konfigurasi_get('twitter')['konfigurasi_value']?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        </li>
                        <?php }?>
                        <?php if(konfigurasi_get('youtube')['konfigurasi_value']){ ?>
                        <li><a href="<?=konfigurasi_get('youtube')['konfigurasi_value']?>"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                        </li>
                        <?php }?>
                        <?php if(konfigurasi_get('no_wa')['konfigurasi_value']){ ?>
                        <li><a href="https://api.whatsapp.com/send?phone=<?=konfigurasi_get('no_wa')['konfigurasi_value']?>"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- COPY RIGHTS -->
    <section class="wed-rights">
        <div class="container">
            <div class="row">
                <div class="copy-right">
                   <a target="_blank" href="https://www.templateshub.net">Templates Hub</a>
                </div>
            </div>
        </div>
    </section>

    <!--SECTION LOGIN, REGISTER AND FORGOT PASSWORD-->
    <section>
        <!-- LOGIN SECTION -->
        <div id="modal1" class="modal fade" role="dialog">
            <div class="log-in-pop">
                <div class="log-in-pop-left">
                    <h1>Hello...</h1>
                    <p>Don't have an account? Create your account. It's take less then a minutes</p>
                    <h4>Login with social media</h4>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
                        </li>
                        <li><a href="#"><i class="fa fa-google"></i> Google+</a>
                        </li>
                        <li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
                        </li>
                    </ul>
                </div>
                <div class="log-in-pop-right">
                    <a href="#" class="pop-close" data-dismiss="modal"><img src="images/cancel.png" alt="" />
                    </a>
                    <h4>Login</h4>
                    <p>Don't have an account? Create your account. It's take less then a minutes</p>
                    <form class="s12">
                        <div>
                            <div class="input-field s12">
                                <input type="text" data-ng-model="name" class="validate">
                                <label>User name</label>
                            </div>
                        </div>
                        <div>
                            <div class="input-field s12">
                                <input type="password" class="validate">
                                <label>Password</label>
                            </div>
                        </div>
                        <div>
                            <div class="s12 log-ch-bx">
                                <p>
                                    <input type="checkbox" id="test5" />
                                    <label for="test5">Remember me</label>
                                </p>
                            </div>
                        </div>
                        <div>
                            <div class="input-field s4">
                                <input type="submit" value="Login" class="waves-effect waves-light log-in-btn"> </div>
                        </div>
                        <div>
                            <div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal3">Forgot password</a> | <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal2">Create a new account</a> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- REGISTER SECTION -->
        <div id="modal2" class="modal fade" role="dialog">
            <div class="log-in-pop">
                <div class="log-in-pop-left">
                    <h1>Hello...</h1>
                    <p>Don't have an account? Create your account. It's take less then a minutes</p>
                    <h4>Login with social media</h4>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
                        </li>
                        <li><a href="#"><i class="fa fa-google"></i> Google+</a>
                        </li>
                        <li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
                        </li>
                    </ul>
                </div>
                <div class="log-in-pop-right">
                    <a href="#" class="pop-close" data-dismiss="modal"><img src="images/cancel.png" alt="" />
                    </a>
                    <h4>Create an Account</h4>
                    <p>Don't have an account? Create your account. It's take less then a minutes</p>
                    <form class="s12">
                        <div>
                            <div class="input-field s12">
                                <input type="text" data-ng-model="name1" class="validate">
                                <label>User name</label>
                            </div>
                        </div>
                        <div>
                            <div class="input-field s12">
                                <input type="email" class="validate">
                                <label>Email id</label>
                            </div>
                        </div>
                        <div>
                            <div class="input-field s12">
                                <input type="password" class="validate">
                                <label>Password</label>
                            </div>
                        </div>
                        <div>
                            <div class="input-field s12">
                                <input type="password" class="validate">
                                <label>Confirm password</label>
                            </div>
                        </div>
                        <div>
                            <div class="input-field s4">
                                <input type="submit" value="Register" class="waves-effect waves-light log-in-btn"> </div>
                        </div>
                        <div>
                            <div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal1">Are you a already member ? Login</a> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- FORGOT SECTION -->
        <div id="modal3" class="modal fade" role="dialog">
            <div class="log-in-pop">
                <div class="log-in-pop-left">
                    <h1>Hello... </h1>
                    <p>Don't have an account? Create your account. It's take less then a minutes</p>
                    <h4>Login with social media</h4>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
                        </li>
                        <li><a href="#"><i class="fa fa-google"></i> Google+</a>
                        </li>
                        <li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
                        </li>
                    </ul>
                </div>
                <div class="log-in-pop-right">
                    <a href="#" class="pop-close" data-dismiss="modal"><img src="images/cancel.png" alt="" />
                    </a>
                    <h4>Forgot password</h4>
                    <p>Don't have an account? Create your account. It's take less then a minutes</p>
                    <form class="s12">
                        <div>
                            <div class="input-field s12">
                                <input type="text" data-ng-model="name3" class="validate">
                                <label>User name or email id</label>
                            </div>
                        </div>
                        <div>
                            <div class="input-field s4">
                                <input type="submit" value="Submit" class="waves-effect waves-light log-in-btn"> </div>
                        </div>
                        <div>
                            <div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal1">Are you a already member ? Login</a> | <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal2">Create a new account</a> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- SOCIAL MEDIA SHARE -->
    <section>
        <div class="icon-float">
            <ul>
                <li><a href="#" class="sh">1k <br> Share</a> </li>
                <li><a href="#" class="fb1"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                <li><a href="#" class="gp1"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                <li><a href="#" class="tw1"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                <li><a href="#" class="li1"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                <li><a href="#" class="wa1"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>
                <li><a href="#" class="sh1"><i class="fa fa-envelope-o" aria-hidden="true"></i></a> </li>
            </ul>
        </div>
    </section>

    <!--Import jQuery before materialize.js-->
    <script src="<?=base_url('assets/front');?>/js/main.min.js"></script>
    <script src="<?=base_url('assets/front');?>/js/bootstrap.min.js"></script>
    <script src="<?=base_url('assets/front');?>/js/materialize.min.js"></script>
    <script src="<?=base_url('assets/front');?>/js/custom.js"></script>
</body>

</html>