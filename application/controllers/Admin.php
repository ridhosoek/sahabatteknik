<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function index(){
        $this->load->view('include/admin/header.php');
        $this->load->view('admin/index');
        $this->load->view('include/admin/footer.php');
    }
}