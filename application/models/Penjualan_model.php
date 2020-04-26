<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_model extends CI_Model
{
    private $_table = "penjualan"; //nama tabel
    private $_tableD = "penjualandetail"; //nama tabel
    // nama kolom di tabel, harus sama huruf besar dan huruf kecilnya!
    public $ID_PENJUALAN;
    public $TANGGAL;
    public $ID_PELANGGAN;
    public $ID_USER;
    public $TOTAL;
    public $BAYAR;
    public $KEMBALIAN;
    public $TANGGAL_INPUT;

    public function rules()
    {
        return [
            ['field' => 'idpenjualan',
            'label' => 'ID Penjualan',
            'rules' => 'required'],

            ['field' => 'tanggal',
            'label' => 'Tanggal',
            'rules' => 'required'],

            ['field' => 'idpelanggan',
            'label' => 'ID Pelanggan',
            'rules' => 'required'],

            ['field' => 'iduser',
            'label' => 'id user',
            'rules' => 'required'],

            ['field' => 'total_hidden',
            'label' => 'total',
            'rules' => 'required'],

            ['field' => 'jumlahbayar',
            'label' => 'bayar',
            'rules' => 'required'],

            ['field' => 'kembali',
            'label' => 'kembalian',
            'rules' => 'required'],

            // ['field' => 'tanggalinput',
            // 'label' => 'Tanggal Input',
            // 'rules' => 'required'],
            
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getBarangById($id)
    {
        $query= $this->db->get_where('barang',array('ID_BARANG'=>$id));
        return $query;
    }
    
    public function save()
    {
        $post = $this->input->post();
        $this->ID_PENJUALAN = $post["idpenjualan"];
        $this->TANGGAL = $post["tanggal"];
        $this->ID_PELANGGAN = $post["idpelanggan"];
        $this->ID_USER = $post["iduser"];
        $this->TOTAL = $post["total_hidden"];
        $this->BAYAR = $post["jumlahbayar"];
        $this->KEMBALIAN = $post["kembali"];
        $this->TANGGAL_INPUT = $post["tanggal"];
    
        return $this->db->insert($this->_table, $this);
    }

    public function saveDetail($detail_data)
    {
        for ($x = 0; $x< count($detail_data); $x++){
            $data[] = array(
                'ID_PENJUALAN' => $detail_data[$x]['idpenjualan'],
                'ID_BARANG' => $detail_data[$x]['idBarang'],
                'HARGAMODAL' => $detail_data[$x]['hargaBarang'],
                'HARGA' => $detail_data[$x]['hargaJual'],
                'QTY' => $detail_data[$x]['qtyBarang'],
                'SATUAN' => $detail_data[$x]['satuanBarang'],
                'SUBTOTAL' => $detail_data[$x]['subTotal'],
            );
        }

        try {
            for ($x = 0; $x< count($detail_data); $x++){
                $this->db->insert('penjualan_detail',$data[$x]);
            }
            return 'Success';
        } catch (Exception $e) {
            return 'failed';
        }
    }
 
}