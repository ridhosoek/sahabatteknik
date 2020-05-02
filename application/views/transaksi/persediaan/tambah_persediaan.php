<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <!-- COLOR PALETTE -->
	  <div class="row">
	  <!-- <form method="post" enctype="multipart/form-data" > -->
	  <div class="col-md-6">
	  <div class="box box-default color-palette-box">

        <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-tag"></i>Data Persediaan</h3>
        </div>
        <div class="box-body">
            <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success" role="alert">
		    <?php echo $this->session->flashdata('success'); ?>
		    </div>
		    <?php endif; ?>
            	<div class="form-group">
                        <label>No Penjualan</label>
                        <input type="text" id="idpersediaan" name="idpersediaan" value="PR<?=time() ?>" readonly required="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="tanggal">
                    </div>
                <div class="form-group">
                    <label>User</label>
                    <input type="text" name="iduser" required="" class="form-control">
				</div>
				<div class="form-group">
                    <label>Total Persediaan</label>
                    <input type="text" name="total" required="" class="form-control">
                </div>
            <!-- </form> -->
        </div>
        <!-- /.box-body -->
    </div>
	  </div>

	  <div class="col-md-6">
	  <div class="box box-default color-palette-box">

	  <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-tag"></i>Data Barang</h3>
        </div>
        <div class="box-body">
			
				<div class="form-group col-md-6">
                    <label>Nama Barang</label>
                    <select name="namabarang[]" id="namaBarang" class="form-control" onchange="autofill();" >
                        <option value="">- pilih -</option>
                        <?php foreach ($barang as $data): ?>
                        <option value="<?php echo $data->ID_BARANG ?>"id="<?=$data->QTY?>"><?php echo $data->NAMA_BARANG ?></option>
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
                <div class="form-group col-1">
					<label for="">&nbsp;</label>
					<button type="button" class="btn btn-primary btn-block" id="tambah" ><i class="fa fa-plus"></i></button>
				</div>
           
        </div>
<!-- /.box-body -->
		</div>
	</div>
 </div>
    
    <div class="box box-default color-palette-box">
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
			<!-- </form> -->
        <!-- /.box-body -->
    </div>
      
    </section>
    <!-- /.content -->
</div>

  <!-- http://mfikri.com/artikel/select-ajax-codeigniter untuk penggunaan id barang ke nama barang-->
  <!-- penggunaan id barang ke nama barang--> -->
<script>
    $(document).ready(function(){
        $('#tambah').on('click', function(){
            var persediaan = {};
            var idBarang = $('#namaBarang option:selected').val();
            var namaBarang = $('#namaBarang option:selected').text();
            var qtyTersedia = $("input[name='qtytersedia']" ).val();
            var qtyDiminta = $("input[name='qtydiminta']" ).val();

            if ($('#id'+idBarang).length == 1) {
                alert('sudah ada ' );
            } else {
                if(idBarang ==  '') {
                    alert("Pilih Barang Dahulu");
                }
                else if(qtyDiminta < 1){
                    alert("Qty harus lebih > 0 ");
                    return false;
                }
                else {
                    var idpersediaan = $('#idpersediaan').val();
                    var satuanBarang = $('#satuan').val();
                    var hargaBarang = $('#harga').val();
                    var qtyBarang = $('#qty').val();
                    var hargaJual = $('#hargaj').val();

                    var tambah_keranjang;
                    tambah_keranjang = '<tr id="id'+idBarang+'">';
                    //pindah ke array
                    tambah_keranjang += '<input type="hidden" name="idpersediaan[]" value="'+idpersediaan+'"/>';
                    tambah_keranjang += '<input type="hidden" name="idbarang[]" value="'+idBarang+'"/>';
                    tambah_keranjang += '<input type="hidden" name="hargabarang[]" value="'+hargaBarang+'"/>';
                    tambah_keranjang += '<input type="hidden" name="qtybarang[]" value="'+qtyBarang+'"/>';
                    tambah_keranjang += '<input type="hidden" name="satuanbarang[]" value="'+satuanBarang+'"/>';
                    tambah_keranjang += '<input type="hidden" name="hargajual[]" value="'+hargaJual+'"/>';
                    tambah_keranjang += '<input type="hidden" name="subtotal[]" value="'+parseInt(hargaBarang) * parseInt(qtyBarang) +'"/>';
                    //

                    tambah_keranjang += '<td>'+namaBarang+'</td>';
                    tambah_keranjang += '<td>'+hargaBarang+'</td>';
                    tambah_keranjang += '<td>'+qtyBarang+'</td>';
                    tambah_keranjang += '<td>'+satuanBarang+'</td>';
                    tambah_keranjang += '<td>'+parseInt(hargaBarang) * parseInt(qtyBarang) +'</td>';
                    tambah_keranjang += '<input type="hidden" class="subtotal" name = "subtotal" value="'+parseInt(hargaBarang) * parseInt(qtyBarang) +'" />'
                    // tambah_keranjang += '<td><button class="btn btn-danger"><i class="fa fa-trash-o" onclick="hapusBaris('+idBarang+','+parseInt(hargaBarang) * parseInt(qtyBarang) +')"></i>&nbsp;&nbsp;Hapus</button></td>';
                    tambah_keranjang += '<td><button type="button" class="btn btn-danger" onclick="remove(id'+ idBarang +','+ parseInt(hargaBarang) * parseInt(qtyBarang)+')"><i class="fa fa-trash-o" ></i>&nbsp;&nbsp;Hapus</button></td>';
                    tambah_keranjang += '</tr>';
                }
                var total = parseInt(hargaBarang) * parseInt(qtyBarang);
                $(".subtotal").each(function(){
                    var subtotal = parseInt($(this).val());
                    if (!isNaN(subtotal)) {
                        total += subtotal
                    }
                })
                $("input[name='total_hidden']").val(total);
                // $('#total').append(total);
                $('#keranjang').append(tambah_keranjang);
            }

            

        });

        //  $('#submit').on('click', function(){
        $("#submit").click(function() {

            var idpersediaan = [];
            $( "input[name='idpersediaan[]']" ).each(function() {
                idpersediaan.push($( this ).val());
            });

            var idBarang = [];
            $( "input[name='idbarang[]']" ).each(function() {
                idBarang.push($( this ).val());
            });
            var hargaBarang = [];
            $( "input[name='hargabarang[]']" ).each(function() {
                hargaBarang.push($( this ).val());
            });
            var hargaJual = [];
            $( "input[name='hargajual[]']" ).each(function() {
                hargaJual.push($( this ).val());
            });
            var qtyBarang = [];
            $( "input[name='qtybarang[]']" ).each(function() {
                qtyBarang.push($( this ).val());
            });
            var satuanBarang = [];
            $( "input[name='satuanbarang[]']" ).each(function() {
                satuanBarang.push($( this ).val());
            });
            var subTotal = [];
            $( "input[name='subtotal[]']" ).each(function() {
                subTotal.push($( this ).val());
            });
            var persediaan = [];
            for (var i = 0, len = idBarang.length; i < len; i++) {
                persediaan.push({
                    "idpersediaan" : idpersediaan[i],
                    "idBarang" : idBarang[i],
                    "hargaBarang" : hargaBarang[i],
                    "hargaJual" : hargaJual[i],
                    "qtyBarang" : qtyBarang[i],
                    "satuanBarang" : satuanBarang[i],
                    "subTotal" : subTotal[i]
                })
            }
            var total = $("input[name='total_hidden']").val();
            var savepersediaan = {persediaan, total};
            
            var datadetail = { 'data_table' : persediaan };
            $.ajax({

                data : datadetail,
                type : 'POST',
                url : "<?php echo base_url();?>admin/tambahpersediaan",
                crossOrigin : false,
                dataType : 'json',
                success : function(result){
                    if(result.status == "Success"){
                        alert("Berhasil Simpan");
                    }else{
                        alert("Gagal Simpan");
                    }

                }
            });
            // event.preventDefault();
        });
     
       
    });

    function remove(id , harga) {
        $(id).remove();
        var total = $("input[name='total_hidden']").val() - harga;
        $("input[name='total_hidden']").val(total);
    }

    function autofill(){
        var idBarang =document.getElementById('namaBarang').value;
        $.ajax({
            url:"<?php echo base_url();?>admin/cariBarang?idbarang="+idBarang,
        //    data:'?idbarang='+idBarang,
            success:function(data){
            var hasil = JSON.parse(data);
                $.each(hasil, function(key,val){
                    console.log(val)
                    document.getElementById('satuan').value=val.SATUAN;
                    document.getElementById('hargaj').value=val.HARGA;
                    document.getElementById('qtytersedia').value=val.QTY;
                    });
                // console.log(hasil)
            }

        });

    }

</script>
