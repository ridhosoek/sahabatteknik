<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>pelanggan</small>
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
        <?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>
        <p>
          <a href="<?php echo base_url();?>admin/pelanggan/" class="btn btn-danger">Kembali</a>
        </p>
        <form method="post" enctype="multipart/form-data" >
            <div class="form-group">
              <input type="hidden" class="form-control <?php echo form_error('idpelanggan') ? 'is-invalid':'' ?>"
			  type="text" name="idpelanggan" value="<?php echo $pelanggan->ID_PELANGGAN ?>" />
			      <div class="invalid-feedback">
			      <?php echo form_error('name') ?>
			      </div>
            </div>
            <div class="form-group">
              <label>Nama Pelanggan</label>
              <input class="form-control <?php echo form_error('namapelanggan') ? 'is-invalid':'' ?>"
			  type="text" name="namapelanggan" value="<?php echo $pelanggan->NAMA_PELANGGAN ?>" />
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>"
			  type="text" name="alamat" value="<?php echo $pelanggan->ALAMAT ?>" />
            </div>
            <div class="form-group">
              <label>Nomor Hp</label>
              <input class="form-control <?php echo form_error('nomorhp') ? 'is-invalid':'' ?>"
			  type="text" name="nomorhp" value="<?php echo $pelanggan->NOMOR_HP ?>" />
            </div>
            <input class="btn btn-success" type="submit" name="btn" value="Save" />
          </form>
        </div>
        <!-- /.box-body -->
      </div>
      
    </section>
    <!-- /.content -->
  </div>