<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Penjualan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Penjualan</li>
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
                <th scope="col">No.</th>
                <th scope="col">No. Transaksi</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Pelanggan</th>
                <th scope="col">Kasir</th>
                <th scope="col">Total</th>
                <th scope="col">Bayar</th>
                <th scope="col">Kembalian</th>
                <th scope="col">Detail</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($penjualan as $data=>$ndata): ?>
            <tr>
                <td width="50">
								  <?php echo ($data+1) ?>
								</td>
                <td width="150">
                  <?php echo $ndata->ID_PENJUALAN ?>
								</td>
								<td width="150">
                  <?php echo $ndata->TANGGAL ?>
                </td>
                <td width="200">
								  <?php echo $ndata->NAMA_PELANGGAN ?>
                </td>
                <td>
                  <?php echo $ndata->ID_USER ?>
                </td>
                <td>
                  <?php echo $ndata->TOTAL ?>
                </td>
                <td>
								  <?php echo $ndata->BAYAR ?>
                </td>
                <td>
                  <?php echo $ndata->KEMBALIAN ?>
                </td>
                <td>
                  <a data-toggle="modal" data-target="#modal-detail" ><i class="fa fa-eye"></i></a>
                </td>
                <td>
                <a href=#>
                    <button type="button" class="btn btn-primary btn-xs">Edit</button></a>
                    <a onclick="deleteConfirm('<?php echo site_url('admin/deletepenjualan/'.$ndata->ID_PENJUALAN) ?>')" href="#!" class="btn btn-danger btn-xs">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
           </tbody>
            <p>
                <a href="<?php echo base_url();?>admin/tambahpenjualan/" class="btn btn-primary">Tambah Data</a>
            </p>
            </table>
        </div>
        <!-- /.box-body -->
      </div>
      
    </section>
    <div class="modal fade" id="modal-detail">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Detail Penjualan</h4>
                  </div>
                  <div class="modal-body table-responsive">
                    <table class="table table-bordered table-striped" id="table">
                      <thead>
                        <h5>No Penjualan</h5>
                        <tr>
                          <td>Nama Barang</td>
                          <td>Qty</td>
                          <td>Satuan</td>
                          <td>Harga Modal</td>
                          <td>Harga Jual</td>
                          <td>Subtotal</td>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($penjualandetail as $data): ?>
                        <tr>
                          <td>
                          <?php echo $data->NAMA_BARANG ?>
                          </td>
                          <td>
                          <?php echo $data->QTY ?>
                          </td>
                          <td>
                          <?php echo $data->SATUAN ?>
                          </td>
                          <td>
                          <?php echo $data->HARGAMODAL ?>
                          </td>
                          <td>
                          <?php echo $data->HARGA ?>
                          </td>
                          <td>
                          <?php echo $data->SUBTOTAL ?>
                          </td>

                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
    </div>

    <!-- /.content -->
  </div>
<script>
    function deleteConfirm(url){
	    $('#btn-delete').attr('href', url);
	    $('#deleteModal').modal();
      }
</script>
  