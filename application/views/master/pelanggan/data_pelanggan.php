<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data pelanggan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">pelanggan</li>
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
                <th scope="col">ID pelanggan</th>
                <th scope="col">Nama pelanggan</th>
                <th scope="col">Alamat</th>
                <th scope="col">Nomor Hp</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($pelanggan as $data): ?>    
            <tr>
                <td width="150">
								  <?php echo $data->ID_PELANGGAN ?>
								</td>
								<td>
									<?php echo $data->NAMA_PELANGGAN ?>
                </td>
                <td>
									<?php echo $data->ALAMAT ?>
                </td>
                <td>
									<?php echo $data->NOMOR_HP ?>
                </td>
                <td>
                    <a href=<?php echo site_url('admin/editpelanggan/'.$data->ID_PELANGGAN) ?>>
                    <button type="button" class="btn btn-primary btn-xs">Edit</button></a>
                    <a onclick="deleteConfirm('<?php echo site_url('admin/deletepelanggan/'.$data->ID_PELANGGAN) ?>')" href="#!" class="btn btn-danger btn-xs">Hapus</a>
                </td>
            </tr>
                <?php endforeach; ?>
            </tbody>
            <p>
                <a href="<?php echo base_url();?>admin/tambahpelanggan/" class="btn btn-primary">Tambah Data</a>
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
    </script>

    <!-- /.content -->
  </div>