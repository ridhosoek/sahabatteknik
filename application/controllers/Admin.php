<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    // function __construct(){
	// 	parent::__construct();
	
	// 	if($this->session->userdata('status') != "login"){
	// 		redirect(base_url("login_page.php"));
	// 	}
	// }
 
	// function index(){
	// 	$this->load->view('v_admin');
	// }
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
        // if($this->session->userdata('status') != "login"){
        //     // redirect(base_url("login_page.php"));
        //     $this->load->view("admin/login_page.php");
        //     print base_url;
		// }
    }

    public function index(){
        if($this->session->userdata('status') != "login"){
            // redirect(base_url("login_page.php"));
            $this->load->view("admin/login_page.php");
            // print base_url;
		} else {
            $this->load->view('include/admin/header.php');
            $this->load->view('admin/index');
            $this->load->view('include/admin/footer.php');
        }
        // $this->load->view("admin/login_page.php");
        // if($this->input->post()){
        //     if($this->user_model->doLogin()) redirect(site_url('admin'));
        // }

    }

    public function kelompok(){
        $data["kelompok"] = $this->kelompok_model->getAll();
        $this->load->
        view('include/admin/header.php');
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
        $kelompok = $this->kelompok_model;
        $validation = $this->form_validation;
        $validation->set_rules($barang->rules());

        if ($validation->run()) {
            $barang->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["barang"] = $barang->getById($id);
        $data["kelompok"] = $kelompok->getAll();
        if (!$data["barang"]) show_404();
     
        $this->load->view("master/barang/edit_barang", $data);
        $this->load->view('include/admin/footer.php');
    }
    public function deletebarang($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->barang_model->delete($id)) {
            $data["barang"] = $this->barang_model->getAllBarang();
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

        $this->load->view('include/admin/header.php');
        $data["barang"] = $this->barang_model->getAll();

        // $this->output->set_content_type('application/json');
        $this->load->model('Persediaan_model');
        $detail_data = $this->input->post('data_table');
        $status = $this->Persediaan_model->saveDetail($detail_data);
        // $penjualan->saveDetail($detail_data);

        $persediaan = $this->persediaan_model;
        $validation = $this->form_validation;
        $validation->set_rules($persediaan->rules());
                
        if ($validation->run()) {
            
            $persediaan->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view('transaksi/persediaan/tambah_persediaan',$data);
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
        $pdf->Cell(0,7,'CV SAHABAT TEKNIK',0,1,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(0,7,'Jl Mahkamah No 24 Medan',0,1,'C');
        $pdf->Cell(0,7,'==============================================================================',0,1,'C');
        $pdf->Cell(10,7,'',0,1);

        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(0,7,'DAFTAR BARANG',0,1,'C');
        $pdf->Cell(10,7,'',0,1);

        $pdf->SetFont('Arial','B',10);

        $pdf->Cell(8,6,'No',1,0,'C');
        $pdf->Cell(45,6,'Kelompok',1,0,'C');
        $pdf->Cell(75,6,'Nama Barang',1,0,'C');
        $pdf->Cell(20,6,'Satuan',1,0,'C');
        $pdf->Cell(30,6,'Harga',1,0,'C');
        $pdf->Cell(15,6,'Stok',1,1,'C');

        $pdf->SetFont('Arial','',10);
        $barang = $this->barang_model->getAllBarang();
        $no=1;
        foreach ($barang as $data){
            $pdf->Cell(8,6,$no,1,0);
            $pdf->Cell(45,6,$data->NAMA_KELOMPOK,1,0);
            $pdf->Cell(75,6,$data->NAMA_BARANG,1,0);
            $pdf->Cell(20,6,$data->SATUAN,1,0);
            $pdf->Cell(30,6,"Rp ".number_format($data->HARGA, 0, ".", "."),1,0,'R');
            $pdf->Cell(15,6,$data->QTY,1,1,'R');
            $no++;
        }
        $pdf->Output('I','databarang.pdf');
    }
    
    public function LaporanPenjualan()
	{
        $pdf = new FPDF('P', 'mm','Letter');

        $pdf->AddPage();

        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,7,'CV SAHABAT TEKNIK',0,1,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(0,7,'Jl Mahkamah No 24 Medan',0,1,'C');
        $pdf->Cell(0,7,'==============================================================================',0,1,'C');
        $pdf->Cell(10,7,'',0,1);

        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(0,7,'LAPORAN PENJUALAN',0,1,'C');
        $pdf->Cell(10,7,'',0,1);
        

        $penjualan = $this->penjualan_model->getAllPenjualan();
        $no=1;
        foreach ($penjualan as $data){
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(0,6,"No Penjualan : " .$data->ID_PENJUALAN,0,1);
            $pdf->Cell(0,6,"Tanggal : " .$data->TANGGAL,0,1);
            $pdf->Cell(0,6,"Pelanggan : " .$data->NAMA_PELANGGAN,0,1);

            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(8,6,'No',1,0,'C');
            $pdf->Cell(60,6,'Nama Barang',1,0,'C');
            $pdf->Cell(20,6,'Satuan',1,0,'C');
            $pdf->Cell(27,6,'Harga Modal',1,0,'C');
            $pdf->Cell(27,6,'Harga Jual',1,0,'C');
            $pdf->Cell(15,6,'Qty',1,0,'C');
            $pdf->Cell(30,6,'Sub Total',1,1,'C');

            $pdf->SetFont('Arial','',10);
            $barang = $this->penjualan_model->getPenjualanID($data->ID_PENJUALAN);
            $no=1;
            foreach ($barang as $datas){
                $pdf->Cell(8,6,$no,1,0);
                $pdf->Cell(60,6,$datas->NAMA_BARANG,1,0);
                $pdf->Cell(20,6,$datas->SATUAN,1,0);
                $pdf->Cell(27,6,"Rp ".number_format($datas->HARGAMODAL, 0, ".", "."),1,0,'R');
                $pdf->Cell(27,6,"Rp ".number_format($datas->HARGA, 0, ".", "."),1,0,'R');
                $pdf->Cell(15,6,$datas->QTY,1,0,'R');
                $pdf->Cell(30,6,"Rp ".number_format($datas->SUBTOTAL, 0, ".", "."),1,1,'R');
                $no++;
            }
            $pdf->Cell(8,6,"",0,0);
            $pdf->Cell(60,6,"",0,0);
            $pdf->Cell(20,6,"",0,0);
            $pdf->Cell(27,6,"",0,0,'R');
            $pdf->Cell(27,6,"",0,0,'R');
            $pdf->SetFont('Arial','B',11);
            $pdf->Cell(15,6,"Total : ",0,0,'R');
            $pdf->Cell(30,6,"Rp ".number_format($data->TOTAL, 0, ".", "."),0,1,'R');

            $pdf->Cell(8,6,"",0,0);
            $pdf->Cell(60,6,"",0,0);
            $pdf->Cell(20,6,"",0,0);
            $pdf->Cell(27,6,"",0,0,'R');
            $pdf->Cell(27,6,"",0,0,'R');
            $pdf->SetFont('Arial','B',11);
            $pdf->Cell(15,6,"Bayar : ",0,0,'R');
            $pdf->Cell(30,6,"Rp ".number_format($data->BAYAR, 0, ".", "."),0,1,'R');

            $pdf->Cell(8,6,"",0,0);
            $pdf->Cell(60,6,"",0,0);
            $pdf->Cell(20,6,"",0,0);
            $pdf->Cell(27,6,"",0,0,'R');
            $pdf->Cell(27,6,"",0,0,'R');
            $pdf->SetFont('Arial','B',11);
            $pdf->Cell(15,6,"Kembalian : ",0,0,'R');
            $pdf->Cell(30,6,"Rp ".number_format($data->KEMBALIAN, 0, ".", "."),0,1,'R');

            $pdf->Cell(0,7,'',0,1,'C');
            $no++;
        }

        
        $pdf->Output('I','laporanpenjualan.pdf');
    }
    
    public function LaporanPersediaan()
	{
        $pdf = new FPDF('P', 'mm','Letter');

        $pdf->AddPage();

        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,7,'CV SAHABAT TEKNIK',0,1,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(0,7,'Jl Mahkamah No 24 Medan',0,1,'C');
        $pdf->Cell(0,7,'==============================================================================',0,1,'C');
        $pdf->Cell(10,7,'',0,1);

        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(0,7,'LAPORAN PERSEDIAAN',0,1,'C');
        $pdf->Cell(10,7,'',0,1);
        

        $persediaan = $this->persediaan_model->getAll();
        $no=1;
        foreach ($persediaan as $data){
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(0,6,"No Persediaan : " .$data->ID_PERSEDIAAN,0,1);
            $pdf->Cell(0,6,"Tanggal : " .$data->TANGGAL,0,1);

            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(8,6,'No',1,0,'C');
            $pdf->Cell(80,6,'Nama Barang',1,0,'C');
            $pdf->Cell(30,6,'Satuan',1,0,'C');
            $pdf->Cell(27,6,'Harga',1,0,'C');
            $pdf->Cell(15,6,'Qty',1,0,'C');
            $pdf->Cell(30,6,'Sub Total',1,1,'C');

            $pdf->SetFont('Arial','',10);
            $barang = $this->persediaan_model->getpersediaanID($data->ID_PERSEDIAAN);
            $no=1;
            foreach ($barang as $datas){
                $pdf->Cell(8,6,$no,1,0);
                $pdf->Cell(80,6,$datas->NAMA_BARANG,1,0);
                $pdf->Cell(30,6,$datas->SATUAN,1,0);
                $pdf->Cell(27,6,"Rp ".number_format($datas->HARGA, 0, ".", "."),1,0,'R');
                $pdf->Cell(15,6,$datas->QTY,1,0,'R');
                $pdf->Cell(30,6,"Rp ".number_format($datas->SUBTOTAL, 0, ".", "."),1,1,'R');
                $no++;
            }
            $pdf->Cell(8,6,"",0,0);
            $pdf->Cell(80,6,"",0,0);
            $pdf->Cell(30,6,"",0,0);
            $pdf->Cell(27,6,"",0,0,'R');
            $pdf->SetFont('Arial','B',11);
            $pdf->Cell(15,6,"Total : ",0,0,'R');
            $pdf->Cell(30,6,"Rp ".number_format($data->TOTAL, 0, ".", "."),0,1,'R');

            $pdf->Cell(0,7,'',0,1,'C');
            $no++;
        }

        
        $pdf->Output('I','laporanpersediaan.pdf');
	}

}