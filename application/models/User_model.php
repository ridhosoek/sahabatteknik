<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $_table = "user"; //nama tabel

    // nama kolom di tabel, harus sama huruf besar dan huruf kecilnya!
    public $ID_USER;
    public $PASSWORD;


    public function rules()
    {
        return [
            ['field' => 'iduser',
            'label' => 'id user',
            'rules' => 'required'],

            ['field' => 'password',
            'label' => 'password',
            'rules' => 'required'],
            

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["ID_USER" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->ID_USER = $post["iduser"];
        $this->PASSWORD = $post["password"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->ID_USER = $post["iduser"];
        $this->PASSWORD = $post["password"];
        return $this->db->update($this->_table, $this, array('ID_USER' => $post['iduser']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("ID_USER" => $id));
    }
}