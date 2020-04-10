<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_model extends CI_Model
{
    private $_table = "penjualan"; //nama tabel
    private $_tableB = "barang"; //nama tabel
    private $_tableP = "pelanggan"; //nama tabel

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

            ['field' => 'total',
            'label' => 'total',
            'rules' => 'required'],

            ['field' => 'bayar',
            'label' => 'bayar',
            'rules' => 'required'],

            ['field' => 'kembalian',
            'label' => 'kembalian',
            'rules' => 'required'],

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getDataBarang()
    {
        $id=$this->input->post('ID_BARANG');
        $data=$this->barang_model->getById($id);
        echo json_encode($data);
    }
    
 
}