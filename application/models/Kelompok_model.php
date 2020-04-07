<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kelompok_model extends CI_Model
{
    private $_table = "kelompok"; //nama tabel

    // nama kolom di tabel, harus sama huruf besar dan huruf kecilnya!
    public $ID_KELOMPOK;
    public $NAMA_KELOMPOK;


    public function rules()
    {
        return [

            ['field' => 'namakelompok',
            'label' => 'Nama Kelompok',
            'rules' => 'required'],
            
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["ID_KELOMPOK" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->NAMA_KELOMPOK = $post["namakelompok"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->ID_KELOMPOK = $post["idkelompok"];
        $this->NAMA_KELOMPOK = $post["namakelompok"];
        return $this->db->update($this->_table, $this, array('ID_KELOMPOK' => $post['idkelompok']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("ID_KELOMPOK" => $id));
    }
}