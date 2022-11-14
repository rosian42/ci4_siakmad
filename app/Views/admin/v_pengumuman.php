<?= $this->extend('layout/admin');?>
<?= $this->section('content');?>
<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<!-- Select2 -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- daterange picker -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/daterangepicker/daterangepicker.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- summernote -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/summernote/summernote-bs4.css">

<!-- SweetAlert2 -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<!-- Toastr -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/plugins/toastr/toastr.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?=base_url('assets/admin');?>/dist/css/adminlte.min.css">

<div class="card-header">
    <i class="fas fa-table me-1"></i>
    <?=$templateJudul;?>
</div>
<div class="card-body">

    <div class="row mb-3">
        <div class="col-lg-3 pt-1 pb-1">
            <form action="" method="get">
                <input type="text" placeholder="Kata Kunci" name="kata_kunci" class="form-control" value="<?=$kata_kunci;?>">
            </form>
        </div>
        <div class="col-lg-9 pt-1 pb-1 text-end">
            <a class="btn btn-sm btn-success" role="button" href="javascript:void(0)" data-toggle="modal" data-target="#tambahModal">Tambah</a>
        </div>
    </div>

    <table id="data" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="col-1">No.</th>
                <th class="col-6">Pengumuman</th>
                <th class="col-3">Tanggal</th>
                <th class="col-2 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                
                foreach ($record as $value) {
                    
            ?>
            <tr>
                <td><?=$nomor++;?></td>
                <td><?=$value['post_title'];?></td>
                <td><?=tgl_indonesia($value['post_time']);?></td>
                <td>
                    <a href="javascript:void(0)" role="button" onclick="edit('<?=$value['post_id'];?>')" class="btn btn-sm btn-warning" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                    <a onclick="hapus(<?=$value['post_id'];?>)" role="button" role="button" class="btn btn-sm btn-danger" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
    <?php
        echo $pager->links('dt','datatable');
    ?>
</div>

<!-- Modal -->
	<div class="modal fade" id="tambahModal" data-backdrop="static"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-xl" role="document">
	    <div class="modal-content">
	      <form class="form-horizontal" id="form_simpan" enctype="multipart/form-data">
	        <div class="modal-header">
	          <h5 class="modal-title" id="exampleModalLabel">Tambah Pengumuman</h5>
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button>
	        </div>
	        <div class="modal-body">
	            <div class="form-group row ">
	              <label  class="col-sm-3 col-form-label">Judul Pengumuman</label>
	              <div class="col-sm-9">
	                  <input type="text" class="form-control" hidden id="post_id" name="post_id"  />
	                  <input type="text" class="form-control" id="post_title" placeholder="Judul Pengumuman" name="post_title" >
	                  <div class="invalid-feedback">
	                    
	                  </div>
	              </div>
	            </div>

	            <div class="form-group row">
	                <label class="col-sm-3 col-form-label">Status</label>
	                <div class="col-sm-9">
	                    <select name="post_status" id="post_status" class="form-control select2">
	                        <option></option>
	                        <option value="active"> Aktif </option>
	                        <option value="inactive"> Tidak Aktif </option>
	                    </select>
	                    <div class="invalid-feedback">

	                    </div>
	                </div>
	            </div>

	            <div class="form-group row ">
	              <label  class="col-sm-3 col-form-label">Deskripsi</label>
	              <div class="col-sm-9">
	                  
	                  <textarea class="form-control" id="post_description" name="post_description" rows="3"></textarea>
	                  <div class="invalid-feedback">
	                    
	                  </div>
	              </div>
	            </div>

	            <div class="form-group row ">
	              <label  class="col-sm-3 col-form-label">Konten</label>
	              <div class="col-sm-9">
	                  <textarea class="form-control summernote" id="post_content" name="post_content" rows="10"></textarea>
	                  
	                  <div class="invalid-feedback">
	                    
	                  </div>
	              </div>
	            </div>

	            
	            
	            <div class="form-group row ">
	              <label  class="col-sm-3 col-form-label">Gambar Utama</label>
	              <div class="col-sm-9">
	                  	<div class="input-group">
  					         <div class="custom-file">
  						          <input type="file" accept="image/*" class="custom-file-input" id="post_thumbnail" name="post_thumbnail" oninput="pic.src=window.URL.createObjectURL(this.files[0])"> > 
                        		<label class="custom-file-label" for="post_thumbnail">Choose file</label>
  					         </div>
	  				
	  				    </div>
	                  
	                	<div id="slider_img_invalid" class="invalid-feedback">
	                    
	                  	</div>

	                  <div class="col-sm-4 pt-2">
	                    <div class="position-relative">
	                      <img id="pic" class="img-fluid" />
	                    </div>
	                  </div>
	              </div>
	            </div>
	            
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	          <button type="button" class="btn btn-primary" id="btn_simpan" onclick="simpan()" >Simpan </button>
	        </div>
	      </form>
	    </div>
	  </div>
	</div>
	<!-- End Modal -->
<!-- jQuery -->
<script src="<?=base_url('assets/admin');?>/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url('assets/admin');?>/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets/admin');?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?=base_url('assets/admin');?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/jszip/jszip.min.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Select2 -->
<script src="<?=base_url('assets/admin');?>/plugins/select2/js/select2.full.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?=base_url('assets/admin');?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<!-- SweetAlert2 -->
<script src="<?=base_url('assets/admin');?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?=base_url('assets/admin');?>/plugins/toastr/toastr.min.js"></script>
<!-- InputMask -->
<script src="<?=base_url('assets/admin');?>/plugins/moment/moment.min.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?=base_url('assets/admin');?>/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=base_url('assets/admin');?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?=base_url('assets/admin');?>/plugins/summernote/summernote-bs4.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/summernote/summernote-file.js"></script>
<script src="<?=base_url('assets/admin');?>/plugins/summernote/summernote-ext-rtl.js"></script>

<!-- AdminLTE App -->
<script src="<?=base_url('assets/admin');?>/dist/js/adminlte.js"></script>


<script>
  $(function () {
    
    $('#data').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": false,
    });

    $('.select2').select2({
    	placeholder: "----Pilih Opsi----",
	        allowClear: true
    });
	bsCustomFileInput.init();

	$('.summernote').summernote({
			dialogsInBody: true,
            toolbar: [
	          ['style', ['style']],
	          ['font', ['bold', 'underline', 'clear']],
	          ['fontname', ['fontname']],
	          ['fontsize', ['fontsize']],
	          ['font', ['strikethrough', 'superscript', 'subscript']],
	          
	          ['color', ['color']],
	          ['para', ['ul', 'ol', 'paragraph']],
	          ['table', ['table']],
	          ['insert', ['ltr','rtl', 'link', 'picture', 'video', 'file']],
	          ['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']],
	        ],
	        height: "300px",
	        callbacks: {
		        
	            onImageUpload: function (image) {

	                uploadImage(image[0]);
	                /*for (let i=0; i<image.length; i++) {
	                	$.upload(image[i]);
	                }*/
	            },
	            onMediaDelete: function(target){
	            	deleteImage(target[0].src);
	            }
	            ,
	            onFileUpload: function(file) {
	                myOwnCallBack(file[0]);
	            }
			}
			
    });
	


	$('#reservationdate').datetimepicker({
        format: 'YYYY-MM-DD',
        viewMode: 'years'

    });

	$('#tambahModal').on('hidden.bs.modal', function() {
        var modal = $(this)
        $(this).find('input').removeClass('is-invalid');
        $(this).find('form').trigger('reset');
        $(this).find('.summernote').summernote('code','');
        $(this).find('.select2').val('').trigger('change');
        $(this).find('.invalid-feedback').text('');
        $(this).find('#pic').removeAttr('src');
        $(this).find('#slider_img_invalid').text('');

    });
  });

  function simpan() {
	    //var form = $('#form_simpan');
	    var data = new FormData($("#form_simpan")[0]);
	    $('#form_simpan').find('.invalid-feedback').text('');
	    Swal.fire({
	        title: 'Anda yakin akan menyimpan data ??',
	        showCancelButton: true,
	        confirmButtonText: 'Ya',
	        allowOutsideClick: false,
	        
	    }).then((result) => {

	        if (result.isConfirmed) {
	            $.ajax({
	                url: "<?php echo site_url("admin/$controller/tambah");?>",
	                type: "post",
	                data: data,
	                processData: false,
	                contentType: false,
	                dataType: 'json',
	                beforeSend:	function(){
        							Swal.fire({
        								title: 'Please Wait!!',
        								allowOutsideClick: false,
        								showConfirmButton: false,
        								didOpen: ()=>{
        									Swal.showLoading()
        								},
        							});
        						},
	                success: function(data) {
	                	Swal.close();
	                		//$(".overlay").css("display","none");
	                    if (data.msg == 'success') {
	                        location.reload();

	                    } else if (data.msg == 'invalid') {

	                        $.each(data.validation, function(key, value) {
	                        	if(key != post_thumbnail){
		                            $('#' + key).addClass('is-invalid');

		                            $('#' + key).parents('.form-group').find('.invalid-feedback')
		                                .text(value);
		                        }else{
		                        	$('#' + key).addClass('is-invalid');

		                            $('#slider_img_invalid').text(value);
		                        }
	                        });

	                    } else {
	                        $('#tambahModal').modal('hide');
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
	                		//$(".overlay").css("display","none");
	                    console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
	                }
	            });
	        }
	    })

	}

	function edit(id) {
	    $.ajax({
	        type: "post",
	        url: "<?php echo site_url("admin/$controller/getData");?>",
	        data: "id=" + id,
	        dataType: 'json',
	        success: function(response) {
	            if (response.msg) {
	                $('#tambahModal').modal('show');
	                $('#exampleModalLabel').text('Edit Slider');
	                $.each(response.data, function(key, value) {

	                    if (key != "post_thumbnail") {
	                        if($('#'+key).is('.select2')){
	                            $('#' + key).val(value).trigger('change');                           
	                        }else if($('#'+key).is('.summernote')){
	                        		$('#' + key).summernote('code',value);
	                        }else if($('#'+key).is('textarea')){
	                        		$('#' + key).text(value);
	                        }else{
	                            $('#' + key).val(value);
	                        }
	                    } else if (key == "post_thumbnail") {
	                        $('#pic').attr('src', "<?=base_url()?>/" + value);
	                    }
	                    
	                });
	            } else {
	                Swal.fire({
	                    icon: 'error',
	                    title: 'Oopsss',
	                    text: 'blablabla'
	                })
	            }
	        }
    	})
	}

	function hapus(id) {
    //var link = "<?=site_url("admin/$controller/$metode/?aksi=hapus&id=")?>" + id;
	    Swal.fire({
	        title: 'Are you sure?',
	        text: "Data akan dipindahkan ke recycle bin!",
	        icon: 'warning',
	        showCancelButton: true,
	        confirmButtonColor: '#3085d6',
	        cancelButtonColor: '#d33',
	        confirmButtonText: 'Yes, delete it!',
	        allowOutsideClick: false
	    }).then((result) => {
	        //window.location.href = link;
	        if (result.isConfirmed) {
	            $.ajax({
	                url: "<?php echo site_url("admin/$controller/hapus");?>",
	                type: "post",
	                data: "aksi=hapus&id="+id,
	                dataType: 'json',
	                beforeSend:	function(){
        							Swal.fire({
        								title: 'Please Wait!!',
        								allowOutsideClick: false,
        								showConfirmButton: false,
        								didOpen: ()=>{
        									Swal.showLoading()
        								},
        							});
        						},
	                success: function(data) {
	                	Swal.close();
	                	//$(".overlay").css("display","none");
	                    if (data.status) {
	                        
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
	                            icon: 'success',
	                            title: "Data sudah dipindahkan ke tempat sampah"
	                        })
	                        location.reload();

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
	                            icon: 'error',
	                            title: 'Data gagal dihapus'
	                        })
	                    }
	                },
	                error: function(xhr, ajaxOptions, thrownError) {
	                	Swal.close();
	                		//$(".overlay").css("display","none");
	                    console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
	                }
	            });
	        }
    	});
	}

	function uploadImage(image) {
	    var data = new FormData();
	    data.append("image", image, image.name);
	    $.ajax({
	        url: "<?php echo site_url('admin/summernote/upload_image')?>",
	        cache: false,
	        contentType: false,
	        processData: false,
	        data: data,
	        type: "POST",
	        success: function(url) {
				$('.summernote').summernote("insertImage", url);
	        },
	        error: function(data) {
	            console.log(data);
	        }
	    });
	}

	function deleteImage(src) {
	    $.ajax({
	        data: {src : src},
	        type: "POST",
	        url: "<?php echo site_url('admin/summernote/delete_image')?>",
	        cache: false,
	        success: function(response) {
	            console.log(response);
	        }
	    });
	}

	function myOwnCallBack(file) {
	    let data = new FormData();
	    data.append("file", file, file.name);
	    $.ajax({
	        data: data,
	        type: "POST",
	        url: "<?php echo site_url('admin/summernote/upload_file')?>", //Your own back-end uploader
	        cache: false,
	        contentType: false,
	        processData: false,
	        /*xhr: function() { //Handle progress upload
	            let myXhr = $.ajaxSettings.xhr();
	            if (myXhr.upload) myXhr.upload.addEventListener('progress', progressHandlingFunction, false);
	            return myXhr;
	        },*/
	        success: function(url) {
	            var HTMLstring = '<iframe src="'+url+'" width="100%" height="600" allow="autoplay"></iframe>';
	            $('.summernote').summernote('editor.pasteHTML', HTMLstring);
	            /*if(reponse.status === true) {
	                let listMimeImg = ['image/png', 'image/jpeg', 'image/jpg', 'image/webp', 'image/gif', 'image/svg'];
	                let listMimeAudio = ['audio/mpeg', 'audio/ogg', 'audio/mp3'];
	                let listMimeVideo = ['video/mpeg', 'video/mp4', 'video/webm'];
	                let elem;
	 
	                if (listMimeImg.indexOf(file.type) > -1) {
	                    //Picture
	                    $('.tugas').summernote('editor.insertImage', reponse.filename);
	                } else if (listMimeAudio.indexOf(file.type) > -1) {
	                    //Audio
	                    elem = document.createElement("audio");
	                    elem.setAttribute("src", reponse.filename);
	                    elem.setAttribute("controls", "controls");
	                    elem.setAttribute("preload", "metadata");
	                    $('.tugas').summernote('editor.insertNode', elem);
	                } else if (listMimeVideo.indexOf(file.type) > -1) {
	                    //Video
	                    elem = document.createElement("video");
	                    elem.setAttribute("src", reponse.filename);
	                    elem.setAttribute("controls", "controls");
	                    elem.setAttribute("preload", "metadata");
	                    $('.tugas').summernote('editor.insertNode', elem);
	                } else {
	                    //Other file type
	                    var node;
	                    node = document.createElement("a");
	                    let linkText = document.createTextNode(file.name);
	                    node.appendChild(linkText);
	                    node.title = file.name;
	                    node.href = reponse.filename;
	                    $('.tugas').summernote('insertNode', node);
	                }
	            }*/
	        }
	    });
	}
	 
	function progressHandlingFunction(e) {
	    if (e.lengthComputable) {
	        //Log current progress
	        console.log((e.loaded / e.total * 100) + '%');
	 
	        //Reset progress on complete
	        if (e.loaded === e.total) {
	            console.log("Upload finished.");
	        }
	    }
	}
</script>
<?=$this->endSection();?>                        