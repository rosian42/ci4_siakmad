<footer id="footer" class="footer bg-black-222" data-bg-img="<?=base_url('assets/learnpress');?>/images/footer-bg.png">
    <div class="container pt-70 pb-40">
      <div class="row">
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <img class="mt-10 mb-15" alt="" src="<?=(empty(konfigurasi_get('logo')['konfigurasi_value']))?base_url(konfigurasi_get('logo')['konfigurasi_default']):base_url(konfigurasi_get('logo')['konfigurasi_value']);?>">
            <p class="font-16 mb-10"><?=konfigurasi_get('deskripsi_sekolah')['konfigurasi_value'];?></p>
            <!--<a class="font-14" href="#"><i class="fa fa-angle-double-right text-theme-colored"></i> Read more</a>-->
            <ul class="styled-icons icon-dark mt-20">
              <?php if(konfigurasi_get('facebook')['konfigurasi_value']){ ?>
              <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".1s" data-wow-offset="10"><a href="<?=konfigurasi_get('facebook')['konfigurasi_value']?>" data-bg-color="#3B5998"><i class="fa fa-facebook"></i></a></li>
              <?php }?>
              <?php if(konfigurasi_get('twitter')['konfigurasi_value']){ ?>
              <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s" data-wow-offset="10"><a href="<?=konfigurasi_get('twitter')['konfigurasi_value']?>" data-bg-color="#02B0E8"><i class="fa fa-twitter"></i></a></li>
              <?php }?>
              <?php if(konfigurasi_get('youtube')['konfigurasi_value']){ ?>
              <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".5s" data-wow-offset="10"><a href="<?=konfigurasi_get('youtube')['konfigurasi_value']?>" data-bg-color="#C22E2A"><i class="fa fa-youtube"></i></a></li>
              <?php }?>
              <?php if(konfigurasi_get('no_wa')['konfigurasi_value']){ ?>
              <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".3s" data-wow-offset="10"><a href="https://api.whatsapp.com/send?phone=<?=konfigurasi_get('no_wa')['konfigurasi_value']?>" data-bg-color="#05A7E3"><i class="fa fa-whatsapp"></i></a></li>
              <?php }?>
              <?php if(konfigurasi_get('instagram')['konfigurasi_value']){ ?>
              <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".4s" data-wow-offset="10"><a href="#" data-bg-color="#A11312"><i class="fa fa-instagram"></i></a></li>
              <?php }?>
              
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title line-bottom">Useful Links</h5>
            <ul class="list angle-double-right list-border">
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Donor Privacy Policy</a></li>
              <li><a href="#">Disclaimer</a></li>
              <li><a href="#">Terms of Use</a></li>
              <li><a href="#">Media Center</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title line-bottom">Contact</h5>
            <ul class="list-border">
              <li><a href="#"><?=konfigurasi_get('no_telp')['konfigurasi_value']?></a></li>
              <li><a href="#"><?=konfigurasi_get('email')['konfigurasi_value']?></a></li>
              <li><a href="https://api.whatsapp.com/send?phone=<?=konfigurasi_get('no_wa')['konfigurasi_value']?>"><?=konfigurasi_get('no_wa')['konfigurasi_value']?></a></li>
              <li><a href="#" class="lineheight-20"></a><?=konfigurasi_get('alamat_sekolah')['konfigurasi_value']?></li>
            </ul>
            
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom bg-black-333">
      <div class="container pt-20 pb-20">
        <div class="row">
          <div class="col-md-6">
            <p class="font-11 text-black-777 m-0"><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>
          </div>
          <div class="col-md-6 text-right">
            
          </div>
        </div>
      </div>
    </div>
  </footer>
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper --> 

<!-- Footer Scripts --> 
<!-- JS | Custom script for all pages --> 
<script src="<?=base_url('assets/learnpress');?>/js/custom.js"></script>


</body>

<!-- index-mp-layout209:18-->
</html>