<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <!-- COLOR PALETTE -->
	  <div class="row">
	  <div class="col-md-6">
	  <div class="box box-default color-palette-box">

        <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-tag"></i>Data Penjualan</h3>
        </div>
        <div class="box-body">
            <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success" role="alert">
		    <?php echo $this->session->flashdata('success'); ?>
		    </div>
		    <?php endif; ?>
            <form method="post" enctype="multipart/form-data" >
                <div class="form-group">
                    <label>No Penjualan</label>
                    <input type="text" name="idpenjualan" value="PJ<?= time() ?>" readonly class="form-control">
                </div>
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="text" name="satuan" name="tanggal" value="<?= date('d/m/Y') ?>" readonly class="form-control">
                </div>
                <div class="form-group">
                    <label>Pelanggan</label>
                    <select name="idpelanggan" class ="form-control">
	                <option value="">- pilih -</option>
                    <?php foreach ($pelanggan as $data): ?>
                    <option value="<?php echo $data->ID_PELANGGAN ?>"><?php echo $data->NAMA_PELANGGAN ?></option>
                    <?php endforeach; ?>
	                </select>
                </div>
                <div class="form-group">
                    <label>Kasir</label>
                    <input type="text" name="iduser" required="" class="form-control">
                </div>
            </form>
        </div>
        <!-- /.box-body -->
    </div>
	  </div>

	  <div class="col-md-6">
	  <div class="box box-default color-palette-box">

<div class="box-header with-border">
<h3 class="box-title"><i class="fa fa-tag"></i>Pembayaran</h3>
</div>
<div class="box-body">

	<form method="post" enctype="multipart/form-data" >
		<div class="form-group">
			<label>Total Penjualan</label>
			<input type="text" name="idpenjualan" value="PJ<?= time() ?>" readonly class="form-control">
		</div>
		<div class="form-group">
			<label>Tanggal</label>
			<input type="text" name="satuan" name="tanggal" value="<?= date('d/m/Y') ?>" readonly class="form-control">
		</div>
		<div class="form-group">
			<label>Pelanggan</label>
			<select name="idpelanggan" class ="form-control">
			<option value="">- pilih -</option>
			<?php foreach ($pelanggan as $data): ?>
			<option value="<?php echo $data->ID_PELANGGAN ?>"><?php echo $data->NAMA_PELANGGAN ?></option>
			<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group">
			<label>Kasir</label>
			<input type="text" name="iduser" required="" class="form-control">
		</div>
	</form>
</div>
<!-- /.box-body -->
</div>
	  </div>
	  </div>
    

    <div class="box box-default color-palette-box">

        <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-tag"></i>Data Barang</h3>
        </div>
        <div class="box-body">
            <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success" role="alert">
		    <?php echo $this->session->flashdata('success'); ?>
		    </div>
		    <?php endif; ?>
            <form method="post" enctype="multipart/form-data" >
                <div class="form-group col-md-6">
                    <label>ID Barang</label>
                    <select name="idbarang[]" id="idBarang" class ="form-control">
						<option value="">- pilih -</option>
						<?php foreach ($barang as $data): ?>
						<option value="<?php echo $data->ID_BARANG ?>"><?php echo $data->ID_BARANG ?></option>

						<?php endforeach; ?>
					<!-- <option value="2" selected>TEst</option>
					<option value="1" >TwEst</option> -->
	                </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Nama Barang</label>
                    <select name="namabarang[]" id="namaBarang" class ="form-control" >
	                	<option value="">- pilih -</option>
                    	<?php foreach ($barang as $data): ?>
                    	<option value="<?php echo $data->ID_BARANG ?>"><?php echo $data->NAMA_BARANG ?></option>
                   		<?php endforeach; ?>
	                </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Satuan</label>
                    <input type="text" id="satuan" name="satuan[]" placeholder="Isi Satuan" required="" class="form-control" >
                </div>
                <div class="form-group col-md-6">
                    <label>Harga Modal</label>
                    <input type="text" id="harga" name="harga[]" placeholder="Isi Harga" required="" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>Qty</label>
				    <input type="number" id="qty" name="qty[]" placeholder="isi qty" required="" class="form-control">
                </div>
				<div class="form-group col-md-6">
                    <label>Harga Jual</label>
                    <input type="text" id="hargaj" name="harga[]" placeholder="Isi Harga" required="" class="form-control">
                </div>
                <div class="form-group col-1">
					<label for="">&nbsp;</label>
					<button type="button" class="btn btn-primary btn-block" id="tambah" ><i class="fa fa-plus"></i></button>
				</div>
                <div class="keranjang" div>
					<table class="table table-bordered" id="keranjang">
						<thead>
							<tr>
								<td width="35%">Nama Barang</td>
								<td width="15%">Harga</td>
								<td width="15%">Jumlah</td>
								<td width="10%">Satuan</td>
								<td width="10%">Sub Total</td>
								<td width="15%">Aksi</td>
							</tr>
						</thead>
						<tbody id="keranjang">
						</tbody>
						<tfoot>
							<tr>
								<td colspan="4" align="right"><strong>Total : </strong></td>
								<td id="total"></td>
								<td>
								<input type="hidden" name="total_hidden" value="">
								<input type="hidden" name="max_hidden" value="">
								<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
								</td>
							</tr>
						</tfoot>
					</table>
				</div>
            </form>
        </div>
        <!-- /.box-body -->
    </div>
      
    </section>
    <!-- /.content -->
</div>

  <!-- http://mfikri.com/artikel/select-ajax-codeigniter untuk penggunaan id barang ke nama barang-->
  <script>
    $(document).ready(function(){
		var data = [];
        $('#tambah').on('click', function(){
			var penjualan = {};
            var idBarang = $('#idBarang option:selected').val();
            var namaBarang = $('#namaBarang option:selected').text();
            var satuanBarang = $('#satuan').val();
            var hargaBarang = $('#harga').val();
            var qtyBarang = $('#qty').val();

			
			penjualan.id_Barang = idBarang;
			penjualan.nama_Barang = namaBarang;
			penjualan.satuan_Barang = satuanBarang;
			penjualan.harga_Barang = hargaBarang;
			penjualan.qty_Barang = qtyBarang;
			data.push(penjualan)
			
			console.log(data);
			// console.log(data.length);
			var tambah_keranjang;
			tambah_keranjang = '<tr>';
			tambah_keranjang += '<td>'+data[data.length -1]['nama_Barang']+'</td>';
			tambah_keranjang += '<td>'+data[data.length -1]['harga_Barang']+'</td>';
			tambah_keranjang += '<td>'+data[data.length -1]['qty_Barang']+'</td>';
			tambah_keranjang += '<td>'+data[data.length -1]['satuan_Barang']+'</td>';
			tambah_keranjang += '<td>'+data[data.length -1]['harga_Barang'] * data[data.length -1]['qty_Barang'] +'</td>';
			tambah_keranjang += '<td><button type="submit" class="btn btn-danger"><i class="fas fa-trash-o"></i>&nbsp;&nbsp;Hapus</button></td>';
			tambah_keranjang += '</tr>';


			$('#keranjang').append(tambah_keranjang);
        });
    })
	$(document).ready(function(){
        // $('#harga').autoNumeric('init');
		new AutoNumeric('#harga', { currencySymbol : 'Rp.' , decimalPlaces: 0});

    });
  </script>
