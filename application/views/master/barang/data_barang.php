<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Barang
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Barang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- COLOR PALETTE -->
      <div class="box box-default color-palette-box">
        <!-- <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-tag"></i>Tambah Event</h3>
        </div> -->
        <div class="box-body">
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Kelompok</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Satuan</th>
                <th scope="col">Harga</th>
                <th scope="col">QTY</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($barang as $data=>$ndata): ?>
            <tr>
                <td width="50">
								  <?php echo ($data+1) ?>
								</td>
                <td width="150">
								  <?php echo $ndata->ID_KELOMPOK ?>
								</td>
								<td hidden>
									<?php echo $ndata->ID_BARANG ?>
                </td>
                <td>
									<?php echo $ndata->NAMA_BARANG ?>
                </td>
                <td>
									<?php echo $ndata->SATUAN ?>
                </td>
                <td id=harga>
									<?php echo $ndata->HARGA ?>
                </td>
                <td>
									<?php echo $ndata->QTY ?>
                </td>
                <td>
                <a href=<?php echo site_url('admin/editbarang/'.$ndata->ID_BARANG) ?>>
                    <button type="button" class="btn btn-primary btn-xs">Edit</button></a>
                    <a onclick="deleteConfirm('<?php echo site_url('admin/deletebarang/'.$ndata->ID_BARANG) ?>')" href="#!" class="btn btn-danger btn-xs">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            <p>
                <a href="<?php echo base_url();?>admin/tambahbarang/" class="btn btn-primary">Tambah Data</a>
            </p>
            </table>
        </div>
        <!-- /.box-body -->
      </div>
      


    </section>
    <script>
      function deleteConfirm(url){
	    $('#btn-delete').attr('href', url);
	    $('#deleteModal').modal();
      }

      $(document).ready(function(){
        // $('#harga').autoNumeric('init');
		new AutoNumeric('#harga', { currencySymbol : 'Rp.' , decimalPlaces: 0});

    });
    </script>
    <!-- /.content -->
  </div>