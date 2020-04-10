<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model
{
    private $_table = "pelanggan"; //nama tabel

    // nama kolom di tabel, harus sama huruf besar dan huruf kecilnya!
    public $ID_PELANGGAN;
    public $NAMA_PELANGGAN;
    public $ALAMAT;
    public $NOMOR_HP;
    
    public function rules()
    {
        return [

            ['field' => 'namapelanggan',
            'label' => 'nama pelanggan',
            'rules' => 'required'],

            ['field' => 'alamat',
            'label' => 'alamat',
            'rules' => 'required'],

            ['field' => 'nomorhp',
            'label' => 'nomor hp',
            'rules' => 'required'],
        

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["ID_PELANGGAN" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->NAMA_PELANGGAN = $post["namapelanggan"];
        $this->ALAMAT = $post["alamat"];
        $this->NOMOR_HP = $post["nomorhp"];
    
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->ID_PELANGGAN = $post["idpelanggan"];
        $this->NAMA_PELANGGAN = $post["namapelanggan"];
        $this->ALAMAT = $post["alamat"];
        $this->NOMOR_HP = $post["nomorhp"];
        return $this->db->update($this->_table, $this, array('ID_PELANGGAN' => $post['idpelanggan']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("ID_PELANGGAN" => $id));
    }
}