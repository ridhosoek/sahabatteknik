<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <!-- COLOR PALETTE -->
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
                <div class="form-group">
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
                <div class="form-group">
                    <label>Nama Barang</label>
                    <select name="namabarang[]" id="namaBarang" class ="form-control" >
	                	<option value="">- pilih -</option>
                    	<?php foreach ($barang as $data): ?>
                    	<option value="<?php echo $data->ID_BARANG ?>"><?php echo $data->NAMA_BARANG ?></option>
                   		<?php endforeach; ?>
	                </select>
                </div>
                <div class="form-group">
                    <label>Satuan</label>
                    <input type="text" id="satuan" name="satuan[]" placeholder="Isi Satuan" required="" class="form-control" >
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="text" id="harga" name="harga[]" placeholder="Isi Harga" required="" class="form-control">
                </div>
                <div class="form-group">
                    <label>Qty</label>
				    <input type="number" id="qty" name="qty[]" placeholder="isi qty" required="" class="form-control">
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
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>

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

  </script>
<!-- <script>
    
    function click() {
        alert('data');
    }
    $(document).ready(function(){
			$('tfoot').hide()

			$(document).keypress(function(event){
		    	if (event.which == '13') {
		      		event.preventDefault();
			   	}
			})
            
            $('#idBarang').on('change', function(){
            //     if($(this).val() == ''){ // or this.value == 'volvo'
            //     //     $('#nama_barang option:lt(1)').remove();
            // }
            // alert('test');
                console.log("test");    
            })

			$('#nama_barang').on('change', function(){

				if($(this).val() == '') reset()
				else {
					const url_get_all_barang = $('#content').data('url') + '/get_all_barang'
					$.ajax({
						url: url_get_all_barang,
						type: 'POST',
						dataType: 'json',
						data: {nama_barang: $(this).val()},
						success: function(data){
							$('input[name="kode_barang"]').val(data.kode_barang)
							$('input[name="harga_barang"]').val(data.harga_jual)
							$('input[name="jumlah"]').val(1)
							$('input[name="satuan"]').val(data.satuan)
							$('input[name="max_hidden"]').val(data.stok)
							$('input[name="jumlah"]').prop('readonly', false)
							$('button#tambah').prop('disabled', false)

							$('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga_barang"]').val())
							
							$('input[name="jumlah"]').on('keydown keyup change blur', function(){
								$('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga_barang"]').val())
							})
						}
					})
				}
			})

			$(document).on('click', '#tambah', function(e){
				const url_keranjang_barang = $('#content').data('url') + '/keranjang_barang'
				const data_keranjang = {
					nama_barang: $('select[name="nama_barang"]').val(),
					harga_barang: $('input[name="harga_barang"]').val(),
					jumlah: $('input[name="jumlah"]').val(),
					satuan: $('input[name="satuan"]').val(),
					sub_total: $('input[name="sub_total"]').val(),
				}

				if(parseInt($('input[name="max_hidden"]').val()) <= parseInt(data_keranjang.jumlah)) {
					alert('stok tidak tersedia! stok tersedia : ' + parseInt($('input[name="max_hidden"]').val()))	
				} else {
					$.ajax({
						url: url_keranjang_barang,
						type: 'POST',
						data: data_keranjang,
						success: function(data){
							if($('select[name="nama_barang"]').val() == data_keranjang.nama_barang) $('option[value="' + data_keranjang.nama_barang + '"]').hide()
							reset()

							$('table#keranjang tbody').append(data)
							$('tfoot').show()

							$('#total').html('<strong>' + hitung_total() + '</strong>')
							$('input[name="total_hidden"]').val(hitung_total())
						}
					})
				}

			})


			$(document).on('click', '#tombol-hapus', function(){
				$(this).closest('.row-keranjang').remove()

				$('option[value="' + $(this).data('nama-barang') + '"]').show()

				if($('tbody').children().length == 0) $('tfoot').hide()
			})

			$('button[type="submit"]').on('click', function(){
				$('input[name="kode_barang"]').prop('disabled', true)
				$('select[name="nama_barang"]').prop('disabled', true)
				$('input[name="harga_barang"]').prop('disabled', true)
				$('input[name="jumlah"]').prop('disabled', true)
				$('input[name="sub_total"]').prop('disabled', true)
			})

			function hitung_total(){
				let total = 0;
				$('.sub_total').each(function(){
					total += parseInt($(this).text())
				})

				return total;
			}

			function reset(){
				$('#nama_barang').val('')
				$('input[name="kode_barang"]').val('')
				$('input[name="harga_barang"]').val('')
				$('input[name="jumlah"]').val('')
				$('input[name="sub_total"]').val('')
				$('input[name="jumlah"]').prop('readonly', true)
				$('button#tambah').prop('disabled', true)
			}
		})
</script> -->