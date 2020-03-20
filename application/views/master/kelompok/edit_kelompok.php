<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>Kelompok</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url()?>pengurus"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Input Data Kelompok</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- COLOR PALETTE -->
      <div class="box box-default color-palette-box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-tag"></i>Tambah Kelompok</h3>
        </div>
        <div class="box-body">
        <?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>
        <p>
          <a href="<?php echo base_url();?>admin/kelompok/" class="btn btn-danger">Kembali</a>
        </p>
        <form method="post" enctype="multipart/form-data" >
            <div class="form-group">
              <label>ID Kelompok</label>
              <input class="form-control <?php echo form_error('idkelompok') ? 'is-invalid':'' ?>"
			  type="text" name="idkelompok" value="<?php echo $kelompok->ID_KELOMPOK ?>" />
			<div class="invalid-feedback">
			<?php echo form_error('name') ?>
			</div>
            </div>
            <div class="form-group">
              <label>Nama Kelompok</label>
              <input type="text" name="namakelompok" placeholder="Isi Nama Kelompok" required="" class="form-control" value="<?php echo $kelompok->NAMA_KELOMPOK ?>">
            </div>
            <input class="btn btn-success" type="submit" name="btn" value="Save" />
          </form>
        </div>
        <!-- /.box-body -->
      </div>
      
    </section>
    <!-- /.content -->
  </div>