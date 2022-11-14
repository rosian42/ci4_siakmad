<?= $this->extend('layout/front/learnpress/temp_home');?>
<?= $this->section('content');?>
<!-- Select2 -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/select2/css/select2.min.css">
<link rel="stylesheet"
    href="<?=base_url('assets/admin');?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<!-- Toastr -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/toastr/toastr.min.css">
<!-- daterange picker -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/daterangepicker/daterangepicker.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet"
    href="<?=base_url('assets/admin');?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">


<div class="main-content">
	<!-- Section: inner-header -->
	<section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?=base_url('assets/learnpress');?>/images/bg/bg6.jpg">
	  <div class="container pt-70 pb-20">
	    <!-- Section Content -->
	    <div class="section-content">
	      <div class="row">
	        <div class="col-md-12">
	          <h2 class="title text-white text-center">FORMULIR PPDB <?=konfigurasi_get('tahun_ppdb')['konfigurasi_value']?></h2>
	        </div>
	      </div>
	    </div>
	  </div>
	</section>
	<section>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="border-1px p-25">
              <form id="form_ppdb" name="form_ppdb" class="form-horizontal form-group-sm" enctype="multipart/form-data">
	              	
              	<div class="row">
              		<h4 class="text-theme-colored text-uppercase m-0">IDENTITAS SISWA</h4>
	              	<div class="line-bottom mb-30"></div>
	              	<div class="col-12 col-lg-6">
	                    <div class="form-group row ">
	                        <label class="col-sm-4 col-form-label">Nama Siswa</label>
	                        <div class="col-sm-8">
	                            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" />

	                            <div class="invalid-feedback">

	                            </div>
	                        </div>
	                    </div>

	                    <div class="form-group row ">
	                        <label class="col-sm-4 col-form-label">NISN <small><em>(Jika
	                                    ada)</em></small></label>
	                        <div class="col-sm-8">
	                            <input type="text" class="form-control" id="nisn" name="nisn" />
	                            <div class="invalid-feedback">

	                            </div>
	                        </div>
	                    </div>
	                    <div class="form-group row ">
                            <label class="col-sm-4 col-form-label">No. KK</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control required" id="no_kk" maxlength="16"
                                    name="no_kk" />

                                <div class="invalid-feedback">

                                </div>
                            </div>
                        </div>
	                    <div class="form-group row ">
	                        <label class="col-sm-4 col-form-label">NIK</label>
	                        <div class="col-sm-8">

	                            <input type="text" class="form-control" id="nik" maxlength="16"
	                                name="nik" />
	                            <div class="invalid-feedback">

	                            </div>
	                        </div>
	                    </div>

	                    <div class="form-group row ">
	                        <label class="col-sm-4 col-form-label">Tempat Lahir</label>
	                        <div class="col-sm-8">
	                            <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" />

	                            <div class="invalid-feedback">

	                            </div>
	                        </div>
	                    </div>

	                    <div class="form-group row ">
	                        <label class="col-sm-4 col-form-label">Tgl Lahir</label>
	                        <div class="col-sm-8">

	                            <input name="tgl_lahir" id="tgl_lahir" class="form-control date-picker" type="text" placeholder="Tanggal Lahir" aria-required="true">
	                            <div class="invalid-feedback">

                                </div>
	                        </div>
	                    </div>

	                    <div class="form-group row">
	                        <label class="col-sm-4 col-form-label">Gender</label>
	                        <div class="col-sm-8">
	                            <?php
	                                //$selected =(isset($kd_tingkatan))?$kd_tingkatan:'';
	                                //$extra = ($validation->hasError('kd_tingkatan'))?'is-invalid':'';
	                                echo cmb_dinamis('gender', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="gender"',null,null, 'gender');
	                                ?>
	                            <div class="invalid-feedback">

	                            </div>
	                        </div>
	                    </div>

	                    <div class="form-group row">
	                        <label class="col-sm-4 col-form-label">Agama</label>
	                        <div class="col-sm-8">
	                            <?php
	                                
	                                echo cmb_dinamis('agama', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="agama"',null,null, 'agama');
	                                ?>
	                            <div class="invalid-feedback">

	                            </div>
	                        </div>
	                    </div>

	                    <div class="form-group row">
	                        <label class="col-sm-4 col-form-label">Jml. Saudara</label>
	                        <div class="col-sm-8">
	                            <input type="number" class="form-control" id="jml_saudara"
	                                name="jml_saudara" />
	                            <div class="invalid-feedback">

	                            </div>
	                        </div>
	                    </div>

	                    <div class="form-group row">
	                        <label class="col-sm-4 col-form-label">Asal Sekolah</label>
	                        <div class="col-sm-8">
	                            <input type="text" class="form-control" id="asal_sekolah"
	                                name="asal_sekolah" />

	                            <div class="invalid-feedback">

	                            </div>
	                        </div>
	                    </div>

	                    <div class="form-group row">
	                        <label class="col-sm-4 col-form-label">Punya KKS/PIP/PKH?</label>
	                        <div class="col-sm-8">
	                            <select name="kks_pip_pkh" onchange="getKKS()" id="kks_pip_pkh"
	                                class="form-control select2">
	                                <option></option>
	                                <option value="Y"> Ya </option>
	                                <option value="N"> Tidak </option>
	                            </select>
	                            <div class="invalid-feedback">

	                            </div>
	                        </div>
	                    </div>
	                    <div class="form-group row" id="box_no_kks" hidden>
	                        <label class="col-sm-4 col-form-label">No. KKS/PIP/PKH</label>
	                        <div class="col-sm-8">
	                            <input type="text" class="form-control" id="no_kks_pip_pkh"
	                                name="no_kks_pip_pkh" />

	                            <div class="invalid-feedback">

	                            </div>
	                        </div>
	                    </div>
	                    <div class="form-group row ">
	                        <label class="col-sm-4 col-form-label">Foto</label>
	                        <div class="col-sm-8">
	                            
	                            <input type="file" accept="image/*" class="custom-file-input" id="foto_siswa" name="foto_siswa" oninput="pic.src=window.URL.createObjectURL(this.files[0])"> 
	                            <div class="invalid-feedback">

	                            </div>

	                            <div class="col-sm-4 pt-2">
	                                <div class="position-relative">
	                                    <img id="pic" class="img-fluid" />
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-12 col-lg-6">
	                    <div class="form-group row ">
	                        <label class="col-sm-4 col-form-label">Alamat</label>
	                        <div class="col-sm-8">
	                            <input type="text" class="form-control" id="alamat" name="alamat" />
	                            <span id="helpBlock2" class="help-block">Sesuaikan dengan Alamat di Kartu Keluarga</span>
	                            <div class="invalid-feedback">

	                            </div>
	                        </div>

	                    </div>
	                    
	                    <div class="form-group row ">
	                        <label class="col-sm-4 col-form-label">Propinsi</label>
	                        <div class="col-sm-8">

	                            <select name="prop" id="prop" class="form-control select2">

	                            </select>
	                            <div class="invalid-feedback">

	                            </div>
	                        </div>
	                    </div>
	                    <div class="form-group row ">
	                        <label class="col-sm-4 col-form-label">Kabupaten</label>
	                        <div class="col-sm-8">

	                            <select name="kab" id="kab" class="form-control select2">

	                            </select>
	                            <div class="invalid-feedback">

	                            </div>
	                        </div>
	                    </div>
	                    <div class="form-group row ">
	                        <label class="col-sm-4 col-form-label">Kecamatan</label>
	                        <div class="col-sm-8">

	                            <select name="kec" id="kec" class="form-control select2">

	                            </select>
	                            <div class="invalid-feedback">

	                            </div>
	                        </div>
	                    </div>
	                    <div class="form-group row ">
	                        <label class="col-sm-4 col-form-label">Desa</label>
	                        <div class="col-sm-8">

	                            <select name="desa" id="desa" class="form-control select2">

	                            </select>
	                            <div class="invalid-feedback">

	                            </div>
	                        </div>
	                    </div>

	                    <div class="form-group row ">
	                        <label class="col-sm-4 col-form-label">Kodepos</label>
	                        <div class="col-sm-8">
	                            <input type="text" class="form-control" id="kodepos" name="kodepos" />


	                            <div class="invalid-feedback">

	                            </div>
	                        </div>
	                    </div>
	                    <div class="form-group row ">
	                        <label class="col-sm-4 col-form-label">Jns. Domisili</label>
	                        <div class="col-sm-8">
	                            <?php
	                                
	                                echo cmb_dinamis('jns_tinggal', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="jns_tinggal" onchange="getDomisili()"',null,null, 'jenis_tinggal');
	                                ?>

	                            <div class="invalid-feedback">

	                            </div>
	                        </div>
	                    </div>
	                    <div class="form-group row " id="box_pondok" hidden>
	                        <label class="col-sm-4 col-form-label">Nama Pondok</label>
	                        <div class="col-sm-8">
	                            <input type="text" class="form-control" id="nm_pondok" name="nm_pondok" />

	                            <div class="invalid-feedback">

	                            </div>
	                        </div>
	                    </div>
	                    <div class="form-group row " id="box_alamat_pondok" hidden>
	                        <label class="col-sm-4 col-form-label">Alamat Domisili</label>
	                        <div class="col-sm-8">
	                            <input type="text" class="form-control" id="alamat_domisili"
	                                name="alamat_domisili" />
	                            <div class="invalid-feedback">

	                            </div>
	                        </div>
	                    </div>
	                    <div class="form-group row ">
	                        <label class="col-sm-4 col-form-label">Jarak</label>
	                        <div class="col-sm-8">
	                            <?php
	                                
	                                echo cmb_dinamis('jarak', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="jarak"',null,null, 'jarak');
	                                ?>

	                            <div class="invalid-feedback">

	                            </div>
	                        </div>
	                    </div>
	                    <div class="form-group row ">
	                        <label class="col-sm-4 col-form-label">Transportasi</label>
	                        <div class="col-sm-8">
	                            <?php
	                                
	                                echo cmb_dinamis('transportasi', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="transportasi"',null,null, 'transportasi');
	                                ?>

	                            <div class="invalid-feedback">

	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="row">
	            	<h4 class="text-theme-colored text-uppercase m-0">IDENTITAS ORANG TUA</h4>
	              	<div class="line-bottom mb-30"></div>
                    <div class="col-12 col-lg-6">
                        <h5 class="mt-1 mb-1">Identitas Ayah</h5>
                        <hr>
                        <div class="form-group row ">
                            <label class="col-sm-4 col-form-label">Nama Ayah</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nm_ayah" name="nm_ayah" />

                                <div class="invalid-feedback">

                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-4 col-form-label">NIK</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nik_ayah" maxlength="16"
                                    name="nik_ayah" />

                                <div class="invalid-feedback">

                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-4 col-form-label">Status Ayah</label>
                            <div class="col-sm-8">
                                <?php
                                    
                                    echo cmb_dinamis('stts_ayah', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="stts_ayah"',null,null, 'status_ortu');
                                    ?>
                                <div class="invalid-feedback">

                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-4 col-form-label">No. HP Ayah</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="hp_ayah" maxlength="16"
                                    name="hp_ayah" />

                                <div class="invalid-feedback">

                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-4 col-form-label">Pekerjaan Ayah</label>
                            <div class="col-sm-8">
                                <?php
                                    
                                    echo cmb_dinamis('kerja_ayah', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="kerja_ayah"',null,null, 'jenis_pekerjaan');
                                    ?>
                                <div class="invalid-feedback">

                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-4 col-form-label">Pendidikan Ayah</label>
                            <div class="col-sm-8">
                                <?php
                                    
                                    echo cmb_dinamis('pddk_ayah', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="pddk_ayah"',null,null, 'jenjang_pendidikan');
                                    ?>
                                <div class="invalid-feedback">

                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-4 col-form-label">Penghasilan Ayah</label>
                            <div class="col-sm-8">
                                <?php
                                    
                                    echo cmb_dinamis('penghasilan_ayah', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="penghasilan_ayah"',null,null, 'penghasilan');
                                    ?>
                                <div class="invalid-feedback">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <h5 class="mt-1 mb-1">Identitas Ibu</h5>
                        <hr>
                        <div class="form-group row ">
                            <label class="col-sm-4 col-form-label">Nama Ibu</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nm_ibu" name="nm_ibu" />

                                <div class="invalid-feedback">

                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-4 col-form-label">NIK</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nik_ibu" maxlength="16"
                                    name="nik_ibu" />

                                <div class="invalid-feedback">

                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-4 col-form-label">Status Ibu</label>
                            <div class="col-sm-8">
                                <?php
                                    
                                    echo cmb_dinamis('stts_ibu', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="stts_ibu"',null,null, 'status_ortu');
                                    ?>
                                <div class="invalid-feedback">

                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-4 col-form-label">No. HP Ibu</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="hp_ibu" maxlength="16"
                                    name="hp_ibu" />

                                <div class="invalid-feedback">

                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-4 col-form-label">Pekerjaan Ibu</label>
                            <div class="col-sm-8">
                                <?php
                                    
                                    echo cmb_dinamis('kerja_ibu', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="kerja_ibu"',null,null, 'jenis_pekerjaan');
                                    ?>
                                <div class="invalid-feedback">

                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-4 col-form-label">Pendidikan Ibu</label>
                            <div class="col-sm-8">
                                <?php
                                    
                                    echo cmb_dinamis('pddk_ibu', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="pddk_ibu"',null,null, 'jenjang_pendidikan');
                                    ?>
                                <div class="invalid-feedback">

                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-4 col-form-label">Penghasilan Ibu</label>
                            <div class="col-sm-8">
                                <?php
                                    
                                    echo cmb_dinamis('penghasilan_ibu', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="penghasilan_ibu"',null,null, 'penghasilan');
                                    ?>
                                <div class="invalid-feedback">

                                </div>
                            </div>
                        </div>
                    </div>
	            </div>
	            <div class="row">
	            	<h4 class="text-theme-colored text-uppercase m-0">IDENTITAS WALI</h4>
	              	<div class="line-bottom mb-30"></div>
	              	<div class="col-12 col-lg-6">
	              		<div class="form-group row ">
                            <label class="col-sm-4 col-form-label">Pilih Wali</label>
                            <div class="col-sm-8">
                                <label class="radio-inline" for="wali_ayah">
                                    <input type="radio" name="wali" id="wali_ayah" value="Ayah">
                                    Ayah
                                </label>
                                <label class="radio-inline" for="wali_ibu">
                                    <input type="radio" name="wali" id="wali_ibu" value="Ibu">Ibu
                               	</label>
                                
                                <label class="radio-inline" for="wali_lain">
                                    <input class="form-check-input" type="radio" name="wali" id="wali_lain" value="Lainnya">Lainnya
                                </label>
                                <div class="invalid-feedback">

                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-4 col-form-label">Nama Wali</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nm_wali" name="nm_wali" />

                                <div class="invalid-feedback">

                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-4 col-form-label">Hubungan Keluarga</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="hub_wali" name="hub_wali" />

                                <div class="invalid-feedback">

                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-4 col-form-label">NIK</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nik_wali" maxlength="16"
                                    name="nik_wali" />

                                <div class="invalid-feedback">

                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-4 col-form-label">Status Wali</label>
                            <div class="col-sm-8">
                                <?php
                                            
                                    echo cmb_dinamis('stts_wali', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="stts_wali"',null,null, 'status_ortu');
                                ?>
                                <div class="invalid-feedback">

                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-4 col-form-label">No. HP Wali</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="hp_wali" name="hp_wali" />

                                <div class="invalid-feedback">

                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-4 col-form-label">Pekerjaan Wali</label>
                            <div class="col-sm-8">
                                <?php
                                            
                                    echo cmb_dinamis('kerja_wali', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="kerja_wali"',null,null, 'jenis_pekerjaan');
                                ?>
                                <div class="invalid-feedback">

                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="col-sm-4 col-form-label">Penghasilan Wali</label>
                            <div class="col-sm-8">
                                <?php
                                    echo cmb_dinamis('penghasilan_wali', 'tb_option', 'opt_val', 'opt_id', null, null, 'id="penghasilan_wali"',null,null, 'penghasilan');
                                ?>
                                <div class="invalid-feedback">

                                </div>
                            </div>
                        </div>
	              	</div>

	            </div>
                <div class="form-group mb-0 mt-20">
                	<div class="col-sm-offset-2 col-sm-10">
                  		<!--<input name="form_botcheck" class="form-control" type="hidden" value="">-->
                  		<button type="button" onclick="simpan()" class="btn btn-dark btn-theme-colored" data-loading-text="Please wait...">Submit</button>
                  	</div>
                </div>
              </form>
              <!-- Appointment Form Validation-->
              <script type="text/javascript">
              	$(function() {
              		$('.select2').select2({
				        placeholder: "----Pilih Opsi----",
				        allowClear: true
				    });
				    $('.date-picker').datepicker({
					    format: "yyyy-mm-dd",
					    autoclose: true
					});
					$('[data-mask]').inputmask();
					$('input[name=wali]').click(function() {
				        if ($('input[name=wali]:checked').val() == 'Ayah') {
				            $('#hub_wali').val('Ayah');
				            $('#nm_wali').val($('#nm_ayah').val());
				            $('#nik_wali').val($('#nik_ayah').val());
				            $('#stts_wali').val($('#stts_ayah option:selected').val()).trigger('change');
				            $('#hp_wali').val($('#hp_ayah').val());
				            $('#kerja_wali').val($('#kerja_ayah option:selected').val()).trigger('change');
				            $('#penghasilan_wali').val($('#penghasilan_ayah option:selected').val()).trigger('change');
				        } else if ($('input[name=wali]:checked').val() == 'Ibu') {
				            $('#hub_wali').val('Ibu');
				            $('#nm_wali').val($('#nm_ibu').val());
				            $('#nik_wali').val($('#nik_ibu').val());
				            $('#stts_wali').val($('#stts_ibu option:selected').val()).trigger('change');
				            $('#hp_wali').val($('#hp_ibu').val());
				            $('#kerja_wali').val($('#kerja_ibu option:selected').val()).trigger('change');
				            $('#penghasilan_wali').val($('#penghasilan_ibu option:selected').val()).trigger('change');
				        } else {
				            $('#hub_wali').val('');
				            $('#nm_wali').val('');
				            $('#nik_wali').val('');
				            $('#stts_wali').val('').trigger('change');
				            $('#hp_wali').val('');
				            $('#kerja_wali').val('').trigger('change');
				            $('#penghasilan_wali').val('').trigger('change');
				        }
				    });
					$('#prop').select2({
				        placeholder: '--- Cari Propinsi ---',
				        minimumInputLength: 1,
				        allowClear: true,
				        ajax: {
				            url: '<?=base_url('admin/cari/getWilayahAutoComplete')?>',
				            dataType: 'json',
				            delay: 250,
				            data: function(params) {
				                return {
				                    search: params.term,
				                    page: params.page,
				                    field: 'provinsi',
				                    groupBy: 'provinsi',
				                };
				            },
				            processResults: function(data, params) {
				                params.page = params.page || 1;
				                return {
				                    results: data,
				                    pagination: {
				                        more: (params.page * 5) < data.length
				                    }
				                };
				            },
				            cache: true
				        }
				    });
				    $('#kab').select2({
				        placeholder: '--- Cari Kabupaten ---',
				        minimumInputLength: 1,
				        allowClear: true,
				        ajax: {
				            url: '<?=base_url('admin/cari/getKabAutoComplete')?>',
				            dataType: 'json',
				            delay: 250,
				            data: function(params) {
				                return {
				                    search: params.term,
				                    page: params.page,
				                    field: 'kabupaten',
				                    groupBy: 'kabupaten',
				                    whereProp: $('#prop option:selected').val(),
				                };
				            },
				            processResults: function(data, params) {
				                params.page = params.page || 1;
				                return {
				                    results: data,
				                    pagination: {
				                        more: (params.page * 5) < data.length
				                    }
				                };
				            },
				            cache: true
				        }
				    });
				    $('#kec').select2({
				        placeholder: '--- Cari Kecamatan ---',
				        minimumInputLength: 1,
				        allowClear: true,
				        ajax: {
				            url: '<?=base_url('admin/cari/getKecAutoComplete')?>',
				            dataType: 'json',
				            delay: 250,
				            data: function(params) {
				                return {
				                    search: params.term,
				                    page: params.page,
				                    field: 'kecamatan',
				                    groupBy: 'kecamatan',
				                    whereProp: $('#prop option:selected').val(),
				                    whereKab: $('#kab option:selected').val(),
				                };
				            },
				            processResults: function(data, params) {
				                params.page = params.page || 1;
				                return {
				                    results: data,
				                    pagination: {
				                        more: (params.page * 5) < data.length
				                    }
				                };
				            },
				            cache: true
				        }
				    });
				    $('#desa').select2({
				        placeholder: '--- Cari Desa ---',
				        minimumInputLength: 1,
				        allowClear: true,
				        ajax: {
				            url: '<?=base_url('admin/cari/getDesaAutoComplete')?>',
				            dataType: 'json',
				            delay: 250,
				            data: function(params) {
				                return {
				                    search: params.term,
				                    page: params.page,
				                    field: 'kelurahan',
				                    groupBy: '',
				                    whereProp: $('#prop option:selected').val(),
				                    whereKab: $('#kab option:selected').val(),
				                    whereKec: $('#kec option:selected').val(),
				                };
				            },
				            processResults: function(data, params) {
				                params.page = params.page || 1;
				                return {
				                    results: $.map(data, function(item) {
				                        return {
				                            text: item.text + " (" + item.kodepos + ")",
				                            id: item.id,
				                            kodepos: item.kodepos
				                        }
				                    }),
				                    pagination: {
				                        more: (params.page * 5) < data.length
				                    }
				                };
				            },
				            cache: true
				        }
				    }).on('select2:select', function(e) {
				        var data = $(this).select2('data')[0];
				        $('#kodepos').val(data.kodepos);
				    });
				    $(document).on('select2:open', () => {
				        document.querySelector('.select2-search__field').focus();
				    });

				    
              	});
                function getKKS() {
				    var val = $('#kks_pip_pkh option:selected').val();
				    if (val == "Y") {
				        $('#box_no_kks').attr('hidden', false)
				    } else {
				        $('#box_no_kks').attr('hidden', true)
				    }
				}

				function getDomisili() {
				    var val = $('#jns_tinggal option:selected').val();
				    if (val == 4 || val == 5) {
				        $('#box_pondok, #box_alamat_pondok').attr('hidden', false)
				    } else if (val == 3 || val == 6) {
				        $('#box_pondok').attr('hidden', true)
				        $('#box_alamat_pondok').attr('hidden', false)
				    } else {
				        $('#box_pondok, #box_alamat_pondok').attr('hidden', true)
				    }
				}

				function simpan() {
				    //var form = $('#form_simpan');
				    var data = new FormData($("#form_ppdb")[0]);
				    $('#form_ppdb').find('.invalid-feedback').text('');
				    Swal.fire({
				        title: 'Anda yakin akan menyimpan data ??',
				        showCancelButton: true,
				        confirmButtonText: 'Ya',
				        allowOutsideClick: false,
				    }).then((result) => {

				        if (result.isConfirmed) {
				            $.ajax({
				                url: "<?php echo site_url("formulir-ppdb");?>",
				                type: "post",
				                data: data,
				                processData: false,
				                contentType: false,
				                dataType: 'json',
				                beforeSend: function() {
				                    Swal.fire({
				                        title: 'Please Wait!!',
				                        allowOutsideClick: false,
				                        showConfirmButton: false,
				                        didOpen: () => {
				                            Swal.showLoading()
				                        },
				                    });
				                },
				                success: function(data) {
				                	Swal.close();
				                    if (data.msg == 'success') {
				                        const Toast = Swal.mixin({
				                            toast: true,
				                            position: 'top-end',
				                            showConfirmButton: false,
				                            timer: 3000,
				                            timerProgressBar: true,
				                            didOpen: (toast) => {
				                                toast.addEventListener('mouseenter', Swal.stopTimer)
				                                toast.addEventListener('mouseleave', Swal.resumeTimer)
				                            }
				                        })

				                        Toast.fire({
				                            icon: data.msg,
				                            title: data.pesan
				                        })

				                    } else if (data.msg == 'invalid') {

				                        $.each(data.validation, function(key, value) {
				                            $('#' + key).addClass('is-invalid');
				                            $('#' + key).parents('.form-group').find('.invalid-feedback')
				                                .css("color","red");
				                            $('#' + key).parents('.form-group').find('.invalid-feedback')
				                                .text(value);
				                        });

				                    } else {
				                        const Toast = Swal.mixin({
				                            toast: true,
				                            position: 'top-end',
				                            showConfirmButton: false,
				                            timer: 3000,
				                            timerProgressBar: true,
				                            didOpen: (toast) => {
				                                toast.addEventListener('mouseenter', Swal.stopTimer)
				                                toast.addEventListener('mouseleave', Swal.resumeTimer)
				                            }
				                        })

				                        Toast.fire({
				                            icon: data.msg,
				                            title: data.pesan
				                        })
				                    }
				                },
				                error: function(xhr, ajaxOptions, thrownError) {
				                	Swal.close();
				                    console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				                }
				            });
				        }
				    })

				}
              </script>
            </div>
          </div>
        </div>
      </div>
    </section>

</div>
<!-- SweetAlert2 -->
<script src="<?=base_url('assets/admin');?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?=base_url('assets/admin');?>/plugins/toastr/toastr.min.js"></script>
<!-- Select2 -->
<script src="<?=base_url('assets/admin');?>/plugins/select2/js/select2.full.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?=base_url('assets/admin');?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- InputMask -->
<script src="<?=base_url('assets/admin');?>/plugins/moment/moment.min.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?=base_url('assets/admin');?>/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=base_url('assets/admin');?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<?=$this->endSection();?>