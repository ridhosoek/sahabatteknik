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
        $this->load->view('master/barang/data_barang');
        $this->load->view('include/admin/footer.php');
    }

    public function tambahbarang(){
        $this->load->view('include/admin/header.php');
        $this->load->view('master/barang/tambah_barang');
        $this->load->view('include/admin/footer.php');
    }
    public function pelanggan(){
        $this->load->view('include/admin/header.php');
        $this->load->view('master/pelanggan/data_pelanggan');
        $this->load->view('include/admin/footer.php');
    }
    public function tambahpelanggan(){
        $this->load->view('include/admin/header.php');
        $this->load->view('master/pelanggan/tambah_pelanggan');
        $this->load->view('include/admin/footer.php');
    }
    public function user(){
        $this->load->view('include/admin/header.php');
        $this->load->view('master/user/data_user');
        $this->load->view('include/admin/footer.php');
    }
    public function tambahuser(){
        $this->load->view('include/admin/header.php');
        $this->load->view('master/user/tambah_user');
        $this->load->view('include/admin/footer.php');
    }
}

