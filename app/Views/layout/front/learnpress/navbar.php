<!-- Header -->
  <header id="header" class="header">
    <div class="header-top bg-white-f1 sm-text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <div class="widget no-border m-0">
              <ul class="list-inline sm-text-center mt-5">
                <li> <i class="fa fa-phone text-theme-colored"></i> Call Us at <a href="https://api.whatsapp.com/send?phone=<?=konfigurasi_get('no_wa')['konfigurasi_value']?>"><?=konfigurasi_get('no_wa')['konfigurasi_value']?></a> </li>
                <li> <i class="fa fa-envelope-o text-theme-colored"></i> <a href="#"><?=(empty(konfigurasi_get('email')['konfigurasi_value']))?konfigurasi_get('email')['konfigurasi_default']:konfigurasi_get('email')['konfigurasi_value'];?></a> </li>
              </ul>
            </div>
          </div>
          <div class="col-md-5">
            <div class="widget no-border m-0">
              <ul class="styled-icons icon-circled icon-dark icon-theme-colored icon-sm pull-right flip sm-pull-none sm-text-center">
              	<?php if(konfigurasi_get('facebook')['konfigurasi_value']){ ?>
                <li><a href="<?=konfigurasi_get('facebook')['konfigurasi_value']?>"><i class="fa fa-facebook text-white"></i></a></li>
                <?php }?>
                <?php if(konfigurasi_get('twitter')['konfigurasi_value']){ ?>
                <li><a href="<?=konfigurasi_get('twitter')['konfigurasi_value']?>"><i class="fa fa-twitter text-white"></i></a></li>
                <?php }?>
                <?php if(konfigurasi_get('youtube')['konfigurasi_value']){ ?>
                <li><a href="<?=konfigurasi_get('youtube')['konfigurasi_value']?>"><i class="fa fa-youtube text-white"></i></a></li>
                <?php }?>
                <?php if(konfigurasi_get('no_wa')['konfigurasi_value']){ ?>
                <li><a href="https://api.whatsapp.com/send?phone=<?=konfigurasi_get('no_wa')['konfigurasi_value']?>"><i class="fa fa-whatsapp text-white"></i></a></li>
                <?php }?>
                <li><a href="#"><i class="fa fa-instagram text-white"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-nav">
      <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
        <div class="container">
          <nav id="menuzord-right" class="menuzord default">
            <a class="menuzord-brand pull-left flip" href="javascript:void(0)">
              <img src="<?=(empty(konfigurasi_get('logo')['konfigurasi_value']))?base_url(konfigurasi_get('logo')['konfigurasi_default']):base_url(konfigurasi_get('logo')['konfigurasi_value']);?>" alt="">
            </a>
            <ul class="menuzord-menu">
              <li class="active">
                <a href="<?=base_url()?>#home">Home</a>
              </li>
              <li ><a href="<?=base_url()?>#blog">Artikel</a>
                <ul class="dropdown">
                  <li><a href="<?=base_url('artikel')?>">Berita</a></li>
                  <li><a href="<?=base_url('pengumuman')?>">Pengumuman</a></li>
                  <li><a href="<?=base_url('agenda')?>">Agenda</a></li>
                  
                </ul>
              </li>

              <li>
                <a href="<?=base_url('galeri')?>">Galeri</a>
                
              </li>
              <li>
                <a href="#">PPDB</a>
                <ul class="dropdown">
                  <li><a href="<?=base_url('formulir-ppdb')?>">Formulir PPDB</a></li>
                  
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>