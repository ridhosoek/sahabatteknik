<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small> Barang </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url()?>pengurus"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Input Data Barang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- COLOR PALETTE -->
      <div class="box box-default color-palette-box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-tag"></i>Tambah Barang</h3>
        </div>
        <div class="box-body">
          <?php if ($this->session->flashdata('success')): ?>
          <div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>
         <p>
           <a href="<?php echo base_url();?>admin/barang/" class="btn btn-danger">Kembali</a>
         </p>
         <form method="post" enctype="multipart/form-data" >
            <div class="form-group">
              <label>Kelompok</label>
              <select name="idkelompok" class ="form-control">
	            <option value="">- pilih -</option>
              <?php foreach ($kelompok as $data): ?>
                <option value="<?php echo $data->ID_KELOMPOK ?>"><?php echo $data->NAMA_KELOMPOK ?></option>
              <?php endforeach; ?>
	            </select>
            </div>

            <div class="form-group">
              <label>Nama Barang</label>
              <input type="text" name="namabarang" placeholder="Isi Nama Barang" required="" class="form-control">
            </div>
            <div class="form-group">
              <label>Satuan</label>
              <input type="text" name="satuan" placeholder="Isi Satuan" required="" class="form-control">
            </div>
            <div class="form-group">
              <label>Harga</label>
              <input type="text" id=hargaf name="harga" placeholder="Isi Harga" required="" class="form-control">
            </div>
            <div class="form-group">
            <label>Qty</label>
				    <input type="number" name="qty" placeholder="isi qty" required="" class="form-control">
			      </div>
          <input class="btn btn-success" type="submit" name="btn" value="Save" />
          </form>
        </div>
        <!-- /.box-body -->
      </div>
      
    </section>
    <!-- /.content -->
  </div>
  <script>
  $(document).ready(function(){
        // $('#harga').autoNumeric('init');
		new AutoNumeric('#hargaf', {decimalPlaces: 0, unformatOnSubmit: true});
		
    });
  </script>