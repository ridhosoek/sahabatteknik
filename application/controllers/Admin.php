<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function index(){
        $this->load->view('include/admin/header.php');
        $this->load->view('admin/index');
        $this->load->view('include/admin/footer.php');
    }

    public function kelompok(){
        $this->load->view('include/admin/header.php');
        $this->load->view('master/kelompok/data_kelompok');
        $this->load->view('include/admin/footer.php');
    }

    public function tambahkelompok(){
        $this->load->view('include/admin/header.php');
        $this->load->view('master/kelompok/tambah_kelompok');
        $this->load->view('include/admin/footer.php');
    }

    public function barang(){
        $this->load->view('include/admin/header.php');
        $this->load->view('master/kelompok/data_barang');
        $this->load->view('include/admin/footer.php');
    }

    public function tambahbarang(){
        $this->load->view('include/admin/header.php');
        $this->load->view('master/kelompok/tambah_barang');
        $this->load->view('include/admin/footer.php');
    }
}

