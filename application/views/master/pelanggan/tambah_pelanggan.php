<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>Pelanggan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url()?>pengurus"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Input Data Pelanggan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- COLOR PALETTE -->
      <div class="box box-default color-palette-box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-tag"></i>Tambah Pelanggan</h3>
        </div>
        <div class="box-body">
          <?php
          $akun=isset($_SESSION['akunadmin'])?'admin':'pengurus';
          ?>
         <p>
           <a href="<?php echo base_url();?>admin/kelompok/" class="btn btn-danger">Kembali</a>
         </p>
        <form method="post">
            <div class="form-group">
              <label>ID Pelanggan</label>
              <input type="text" name="judul" required="" class="form-control">
            </div>
            <div class="form-group">
              <label>Nama Pelanggan</label>
              <input type="text" name="judul" placeholder="Isi Nama Pelanggan" required="" class="form-control">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="judul" placeholder="Isi Alamat" required="" class="form-control">
            </div>
            <div class="form-group">
              <label>Nomor HP</label>
              <input type="text" name="judul" placeholder="Isi Nomor HP" required="" class="form-control">
            </div>
            <button class="btn btn-primary" type="submit">Simpan</button>
          </form>
        </div>
        <!-- /.box-body -->
      </div>
      


    </section>
    <!-- /.content -->
  </div>