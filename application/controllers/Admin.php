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
        $this->load->library('pdf');
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
     
        $this->load->view("master/barang/edit_barang", $data);
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
        $data["penjualan"] = $this->penjualan_model->getAllPenjualan();
        $data["penjualandetail"] = $this->penjualan_model->getByBarangPenjualan();
        $this->load->view('include/admin/header.php');
        $this->load->view('transaksi/penjualan/data_penjualan',$data);
        $this->load->view('include/admin/footer.php');
    }

   
    public function tambahpenjualan(){
        // $data["user"] = $this->user_model->getAll();
       
        $this->load->view('include/admin/header.php');
        $data["barang"] = $this->barang_model->getAll();
        $data["pelanggan"] = $this->pelanggan_model->getAll();

        // $this->output->set_content_type('application/json');
        $this->load->model('Penjualan_model');
        $detail_data = $this->input->post('data_table');
        $status = $this->Penjualan_model->saveDetail($detail_data);
        // $penjualan->saveDetail($detail_data);

        $penjualan = $this->penjualan_model;
        $validation = $this->form_validation;
        $validation->set_rules($penjualan->rules());
        
        
        if ($validation->run()) {
            
            $penjualan->save();
            // simpan ke detail
            
            // $this->load->model('Penjualan_model');
            // $detail_data = $this->input->post('data_table');
            // $status = $this->Penjualan_model->saveDetail($detail_data);
           
            //echo json_encode(array('status' => $penjualan));

            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view('transaksi/penjualan/tambah_penjualan',$data);
        $this->load->view('include/admin/footer.php');
    }

    public function deletepenjualan($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->penjualan_model->delete($id)) {
            $this->penjualan_model->deletepenjualan($id);
            $data["penjualan"] = $this->penjualan_model->getAllPenjualan();
            $data["penjualandetail"] = $this->penjualan_model->getByBarangPenjualan();
            $this->load->view('include/admin/header.php');
            $this->load->view('transaksi/penjualan/data_penjualan',$data);
            $this->load->view('include/admin/footer.php');
        }
    }

    public function cariBarang(){
        $idbarang=$_GET['idbarang'];
        $cari =$this->penjualan_model->getBarangById($idbarang)->result();
        echo json_encode($cari);
    } 

    public function cariDetailPenjualan(){
        $idpenjualan=$_GET['idpenjualan'];
        $cari =$this->penjualan_model->getByBarangPenjualan($idpenjualan)->result();
        echo json_encode($cari);
    } 

    public function persediaan(){
        $data["persediaan"] = $this->persediaan_model->getAll();
        $data["persediaandetail"] = $this->persediaan_model->getByBarangpersediaan();
         $this->load->view('include/admin/header.php');
         $this->load->view('transaksi/persediaan/data_persediaan',$data);
         $this->load->view('include/admin/footer.php');
    }

    public function tambahpersediaan(){

        $dataBrg["barang"] = $this->barang_model->getAll();
        $this->load->view('include/admin/header.php');
        $this->load->view('transaksi/persediaan/tambah_persediaan',$dataBrg);
        $this->load->view('include/admin/footer.php');
    }

    public function deletepersediaan($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->persediaan_model->delete($id)) {
            $this->persediaan_model->deletepersediaan($id);
            $data["persedian"] = $this->persediaan_model->getAll();
            $data["persediaandetail"] = $this->persediaan_model->getByBarangPersediaan();
            $this->load->view('include/admin/header.php');
            $this->load->view('transaksi/persediaan/data_persediaan',$data);
            $this->load->view('include/admin/footer.php');
        }
    }

    public function LaporanBarang()
	{
        $pdf = new FPDF('P', 'mm','Letter');

        $pdf->AddPage();

        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,7,'DAFTAR BARANG',0,1,'C');
        $pdf->Cell(10,7,'',0,1);

        $pdf->SetFont('Arial','B',10);

        $pdf->Cell(8,6,'No',1,0,'C');
        $pdf->Cell(100,6,'Nama Barang',1,0,'C');
        $pdf->Cell(60,6,'Satuan',1,0,'C');
        $pdf->Cell(35,6,'Harga',1,0,'C');
        $pdf->Cell(15,6,'Stok',1,1,'C');

        $pdf->SetFont('Arial','',10);
        $barang = $this->db->get('barang')->result();
        $no=0;
        foreach ($barang as $data){
            $pdf->Cell(8,6,$no,1,0);
            $pdf->Cell(100,6,$data->NAMA_BARANG,1,0);
            $pdf->Cell(100,6,$data->SATUAN,1,0);
            $pdf->Cell(35,6,"Rp ".number_format($data->HARGA, 0, ".", "."),1,0);
            $pdf->Cell(15,6,$data->QTY,1,1);
            $no++;
        }
        $pdf->Output();
	}

}