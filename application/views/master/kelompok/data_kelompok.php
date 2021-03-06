<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data kelompok
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Kelompok</li>
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
                <th scope="col">Nama Kelompok</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($kelompok as $data=>$ndata): ?>    
            <tr>
                <td width="50">
                  <?php echo ($data+1) ?>
                </td>
                <td width="150" hidden>
								  <?php echo $ndata->ID_KELOMPOK ?>
								</td>
								<td>
									<?php echo $ndata->NAMA_KELOMPOK ?>
                </td>
                <td>
                    <a href=<?php echo site_url('admin/editkelompok/'.$ndata->ID_KELOMPOK) ?>>
                    <button type="button" class="btn btn-primary btn-xs">Edit</button></a>
                    <a onclick="deleteConfirm('<?php echo site_url('admin/deletekelompok/'.$ndata->ID_KELOMPOK) ?>')" href="#!" class="btn btn-danger btn-xs">Hapus</a>
                </td>
            </tr>
                <?php endforeach; ?>
            </tbody>
            <p>
                <a href="<?php echo base_url();?>admin/tambahkelompok/" class="btn btn-primary">Tambah Data</a>
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