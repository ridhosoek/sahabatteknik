<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("kelompok_model");
        $this->load->library('form_validation');
    }

    public function index(){
        $this->load->view('include/admin/header.php');
        $this->load->view('admin/index');
        $this->load->view('include/admin/footer.php');
    }

    public function kelompok(){
        $data["kelompok"] = $this->kelompok_model->getAll();
        $this->load->view('include/admin/header.php');
        $this->load->view('master/kelompok/data_kelompok',$data);
        $this->load->view('include/admin/footer.php');
    }

    public function tambahkelompok(){
        $this->load->view('include/admin/header.php');

        $kelompok = $this->kelompok_model;
        $validation = $this->form_validation;
        $validation->set_rules($kelompok->rules());

        if ($validation->run()) {
            $kelompok->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view('master/kelompok/tambah_kelompok');
        $this->load->view('include/admin/footer.php');
    }


    public function editkelompok($id = null)
    {
        $this->load->view('include/admin/header.php');
        if (!isset($id)) redirect('master/kelompok');
       
        $kelompok = $this->kelompok_model;
        $validation = $this->form_validation;
        $validation->set_rules($kelompok->rules());

        if ($validation->run()) {
            $kelompok->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["kelompok"] = $kelompok->getById($id);
        if (!$data["kelompok"]) show_404();
        
        $this->load->view("master/kelompok/edit_kelompok", $data);
        $this->load->view('include/admin/footer.php');
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->kelompok_model->delete($id)) {
            redirect(site_url('master/kelompok'));
        }
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

