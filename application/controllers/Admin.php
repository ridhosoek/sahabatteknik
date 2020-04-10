<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("kelompok_model");
        $this->load->model("barang_model");
        $this->load->model("pelanggan_model");
        $this->load->model("user_model");
        $this->load->model("penjualan_model");
        $this->load->model("persediaan_model");
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

    public function deletekelompok($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->kelompok_model->delete($id)) {
            $data["kelompok"] = $this->kelompok_model->getAll();
            $this->load->view('include/admin/header.php');
            $this->load->view('master/kelompok/data_kelompok',$data);
            $this->load->view('include/admin/footer.php');
        }
    }

    public function barang(){
        $data["barang"] = $this->barang_model->getAllBarang();
        $this->load->view('include/admin/header.php');
        $this->load->view('master/barang/data_barang',$data);
        $this->load->view('include/admin/footer.php');
    }

    public function tambahbarang(){
        $this->load->view('include/admin/header.php');
        $dataK["kelompok"] = $this->kelompok_model->getAll();

        $barang = $this->barang_model;
        $validation = $this->form_validation;
        $validation->set_rules($barang->rules());

        if ($validation->run()) {
            $barang->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view('master/barang/tambah_barang',$dataK);
        $this->load->view('include/admin/footer.php');
    }

    public function editbarang($id = null)
    {
        $this->load->view('include/admin/header.php');
        if (!isset($id)) redirect('master/barang');
       
        $barang = $this->barang_model;
        $validation = $this->form_validation;
        $validation->set_rules($barang->rules());

        if ($validation->run()) {
            $barang->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["barang"] = $barang->getById($id);
        if (!$data["barang"]) show_404();

        $dataK["kelompok"] = $barang->getById($id);
        if (!$dataK["kelompok"]) show_404();
        
        $this->load->view("master/barang/edit_barang", $data,$dataK);
        $this->load->view('include/admin/footer.php');
    }
    public function deletebarang($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->barang_model->delete($id)) {
            $data["barang"] = $this->barang_model->getAll();
            $this->load->view('include/admin/header.php');
            $this->load->view('master/barang/data_barang',$data);
            $this->load->view('include/admin/footer.php');
        }
    }

    public function pelanggan(){
        $data["pelanggan"] = $this->pelanggan_model->getAll();
        $this->load->view('include/admin/header.php');
        $this->load->view('master/pelanggan/data_pelanggan',$data);
        $this->load->view('include/admin/footer.php');
    }

    public function tambahpelanggan(){
        $this->load->view('include/admin/header.php');

        $pelanggan = $this->pelanggan_model;
        $validation = $this->form_validation;
        $validation->set_rules($pelanggan->rules());

        if ($validation->run()) {
            $pelanggan->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }


        $this->load->view('master/pelanggan/tambah_pelanggan');
        $this->load->view('include/admin/footer.php');
    }
    
    public function editpelanggan($id = null)
    {
        $this->load->view('include/admin/header.php');
        if (!isset($id)) redirect('master/pelanggan');
       
        $pelanggan = $this->pelanggan_model;
        $validation = $this->form_validation;
        $validation->set_rules($pelanggan->rules());

        if ($validation->run()) {
            $pelanggan->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["pelanggan"] = $pelanggan->getById($id);
        if (!$data["pelanggan"]) show_404();
        
        $this->load->view("master/pelanggan/edit_pelanggan", $data);
        $this->load->view('include/admin/footer.php');
    }
    public function deletepelanggan($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->pelanggan_model->delete($id)) {
            $data["pelanggan"] = $this->pelanggan_model->getAll();
            $this->load->view('include/admin/header.php');
            $this->load->view('master/pelanggan/data_pelanggan',$data);
            $this->load->view('include/admin/footer.php');
        }
    }

    public function user(){
        $data["user"] = $this->user_model->getAll();
        $this->load->view('include/admin/header.php');
        $this->load->view('master/user/data_user', $data);
        $this->load->view('include/admin/footer.php');
    }
    public function tambahuser(){
        $this->load->view('include/admin/header.php');

        $user = $this->user_model;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());

        if ($validation->run()) {
            $user->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $this->load->view('master/user/tambah_user');
        $this->load->view('include/admin/footer.php');
    }

    public function edituser($id = null)
    {
        $this->load->view('include/admin/header.php');
        if (!isset($id)) redirect('master/user');
       
        $user = $this->user_model;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());

        if ($validation->run()) {
            $user->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["user"] = $user->getById($id);
        if (!$data["user"]) show_404();
        
        $this->load->view("master/user/edit_user", $data);
        $this->load->view('include/admin/footer.php');
    }

    public function deleteuser($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->user_model->delete($id)) {
            $data["user"] = $this->user_model->getAll();
            $this->load->view('include/admin/header.php');
            $this->load->view('master/user/data_user',$data);
            $this->load->view('include/admin/footer.php');
        }
    }

    public function penjualan(){
        // $data["user"] = $this->user_model->getAll();
        $this->load->view('include/admin/header.php');
        $this->load->view('transaksi/penjualan/data_penjualan');
        $this->load->view('include/admin/footer.php');
    }

    public function tambahpenjualan(){
        // $data["user"] = $this->user_model->getAll();
        $dataBrg["barang"] = $this->barang_model->getAll();
        $dataPgn["pelanggan"] = $this->pelanggan_model->getAll();
        $this->load->view('include/admin/header.php');
        $this->load->view('transaksi/penjualan/tambah_penjualan',$dataBrg,$dataPgn);
        $this->load->view('include/admin/footer.php');
    }

    public function persediaan(){
         // $data["user"] = $this->user_model->getAll();
         $this->load->view('include/admin/header.php');
         $this->load->view('transaksi/persediaan/data_persediaan');
         $this->load->view('include/admin/footer.php');
    }

    public function tambahpersediaan(){
        // $data["user"] = $this->user_model->getAll();
        $dataBrg["barang"] = $this->barang_model->getAll();
        $this->load->view('include/admin/header.php');
        $this->load->view('transaksi/persediaan/tambah_persediaan',$dataBrg);
        $this->load->view('include/admin/footer.php');
    }
}