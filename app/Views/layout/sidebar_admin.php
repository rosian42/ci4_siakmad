  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="<?=base_url('assets/admin');?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="<?=base_url('assets/admin');?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                      alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block"><?=session()->get('akun_nama_lengkap');?></a>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="<?=site_url('admin/artikel')?>" class="nav-link">
                                  <i class="nav-icon far fa-circle"></i>
                                  <p>Artikel</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?=site_url('admin/page')?>" class="nav-link">
                                  <i class="nav-icon far fa-circle"></i>
                                  <p>Page</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?=site_url('admin/agenda')?>" class="nav-link">
                                  <i class="nav-icon far fa-circle"></i>
                                  <p>Agenda</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?=site_url('admin/pengumuman')?>" class="nav-link">
                                  <i class="nav-icon far fa-circle"></i>
                                  <p>Pengumuman</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?=site_url('admin/slider')?>" class="nav-link">
                                  <i class="nav-icon far fa-circle"></i>
                                  <p>Slider</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?=site_url('admin/testimoni')?>" class="nav-link">
                                  <i class="nav-icon far fa-circle"></i>
                                  <p>Testimoni</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?=site_url('admin/galeri')?>" class="nav-link">
                                  <i class="nav-icon far fa-circle"></i>
                                  <p>Galeri</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-header">ADMINISTRASI</li>

                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-bars"></i>
                          <p>
                              Data Master
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="<?=site_url('admin/tahunakademik')?>" class="nav-link">
                                  <i class="nav-icon far fa-calendar-alt"></i>
                                  <p>Tahun Akademik</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?=site_url('admin/tingkatankelas')?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Tingkat Kelas</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?=site_url('admin/kelas')?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Kelas</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?=site_url('admin/mapel')?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Mata Pelajaran</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?=site_url('admin/kurikulum')?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Kurikulum</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="<?=site_url('admin/guru')?>" class="nav-link">
                          <i class="nav-icon far fa-user"></i>
                          <p>
                              Guru
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="<?=site_url('admin/siswa')?>" class="nav-link">
                          <i class="nav-icon far fa-user"></i>
                          <p>
                              Siswa
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="<?=site_url('admin/jadwal')?>" class="nav-link">
                          <i class="nav-icon far fa-user"></i>
                          <p>
                              Jadwal
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-bars"></i>
                          <p>
                              PPDB
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="<?=site_url('admin/konfigurasi/ppdb')?>" class="nav-link">
                                  <i class="nav-icon far fa-calendar-alt"></i>
                                  <p>Setting PPDB</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?=site_url('admin/tingkatankelas')?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Tingkat Kelas</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?=site_url('admin/kelas')?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Kelas</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?=site_url('admin/mapel')?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Mata Pelajaran</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="<?=site_url('admin/kurikulum')?>" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Kurikulum</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="<?=site_url('admin/konfigurasi')?>" class="nav-link">
                          <i class="nav-icon far fa-user"></i>
                          <p>
                              Konfigurasi
                          </p>
                      </a>
                  </li>


              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>