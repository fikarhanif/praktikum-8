<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Content Headers (Page header) -->
<section class="content-header">
  <h1>
    Data Petugas
    <small>Tambah Data Petugas</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Data Petugas</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="callout callout-success" style="display: none">
    <h4>Selamat!</h4>
    <p>Berhasil Tambah Data.</p>
  </div>
  <div class="callout callout-danger" style="display: none">
    <h4>Peringatan!</h4>
    <p></p>
  </div>
  <a href="<?php echo base_url('petugas'); ?>" class="btn btn-primary"><i class="fa fa-backward"></i> Kembali ke List Petugas</a>
  <form id="formInput" method="POST">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Tambah Data Petugas</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" class="form-control" placeholder="Masukan nama..." required>
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" class="form-control" placeholder="Masukan username..." required>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="alamat" class="form-control" placeholder="Masukan alamat..." required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" placeholder="Masukan password..." required>
            </div>
            <div class="form-group">
              <label>Konfirmasi Password</label>
              <input type="password" name="konfirmasi_password" class="form-control" placeholder="Masukan konfirmasi password..." required>
            </div>
          </div>
        </div>
      </div>
      <div class="box-footer clearfix">
        <button type="submit" class="btn btn-success">Simpan Data Petugas</button>
      </div>
    </div>
  </form>
</section>
<!-- /.content -->
<script>
$(function(){
  $("#formInput").submit(function(e){
    dataForm = $(this).serializeArray();
    $.ajax({
      method : 'POST',
      url : '<?php echo base_url("petugas/store");?>',
      data : dataForm,
      success : function(data){
        data = $.parseJSON(data);
        if(data.status == 1){
          $('.callout-success').fadeIn();
          setTimeout(function(){ 
          $('.callout-success').fadeOut("slow");
          }, 3000);
          $('#formInput')[0].reset();
        }else {
          $('.callout-danger').find('p').html(data.message);
          $('.callout-danger').fadeIn();
          setTimeout(function(){ 
          $('.callout-danger').fadeOut("slow");
          }, 3000); 
        }
      },
      error: function( json )
        {
          $('.callout-danger').find('p').html("Gagal menambah data");
          $('.callout-danger').fadeIn();
          setTimeout(function(){ 
          $('.callout-danger').fadeOut("slow");
          }, 3000);          
        }
    })
    e.preventDefault();
  });
})
</script>