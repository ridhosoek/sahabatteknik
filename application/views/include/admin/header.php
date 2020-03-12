<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Title</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="<?=  base_url()?>assets/font-awesome/css/font-awesome.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/_all-skins.min.css">
    <link href="<?php echo base_url(); ?>assets/jqueryui/jquery-ui.min.css" rel="stylesheet" />
  </head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php
          $this->load->view('include/admin/header_menu');
          $this->load->view('include/admin/sidebar');
        ?>