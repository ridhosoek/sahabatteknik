<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model
{
    private $_table = "barang"; //nama tabel

    // nama kolom di tabel, harus sama huruf besar dan huruf kecilnya!
    public $ID_KELOMPOK;
    public $ID_BARANG;
    public $NAMA_BARANG;
    public $SATUAN;
    public $HARGA;
    public $QTY;


    public function rules()
    {
        return [
            ['field' => 'idkelompok',
            'label' => 'ID Kelompok',
            'rules' => 'required'],

            ['field' => 'idbarang',
            'label' => 'ID Barang',
            'rules' => 'required'],

            ['field' => 'namabarang',
            'label' => 'Nama Barang',
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
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["ID_BARANG" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->ID_KELOMPOK = $post["idkelompok"];
        $this->ID_BARANG = $post["idbarang"];
        $this->NAMA_BARANG = $post["namabarang"];
        $this->SATUAN = $post["satuan"];
        $this->HARGA = $post["harga"];
        $this->QTY = $post["qty"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->ID_KELOMPOK = $post["idkelompok"];
        $this->ID_BARANG = $post["idbarang"];
        $this->NAMA_BARANG = $post["namabarang"];
        $this->SATUAN = $post["satuan"];
        $this->HARGA = $post["harga"];
        $this->QTY = $post["qty"];
        return $this->db->update($this->_table, $this, array('ID_BARANG' => $post['idbarang']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("ID_BARANG" => $id));
    }
}