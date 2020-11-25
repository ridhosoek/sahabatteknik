<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <small>user</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url() ?>pengurus"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Input Data User</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- COLOR PALETTE -->
    <div class="box box-default color-palette-box">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-tag"></i>Tambah User</h3>
      </div>
      <div class="box-body">
        <?php if ($this->session->flashdata('success')) : ?>
          <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php endif; ?>
        <p>
          <a href="<?php echo base_url(); ?>admin/user/" class="btn btn-danger">Kembali</a>
        </p>
        <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Username" required="" class="form-control">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="text" name="password" placeholder="Isi password" required="" class="form-control">
          </div>
          <input class="btn btn-success" type="submit" name="btn" value="Save" />
        </form>
      </div>
      <!-- /.box-body -->
    </div>

  </section>
  <!-- /.content -->
</div>