<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_model extends CI_Model
{
    private $_table = "penjualan"; //nama tabel

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

            ['field' => 'satuan',
            'label' => 'satuan',
            'rules' => 'required'],
            
            ['field' => 'harga',
            'label' => 'harga',
            'rules' => 'required'],

            ['field' => 'qty',
            'label' => 'qty',
            'rules' => 'required'],

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
 
}