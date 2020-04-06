<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Persediaan_model extends CI_Model
{
    private $_table = "persediaan"; //nama tabel

    // nama kolom di tabel, harus sama huruf besar dan huruf kecilnya!
    public $TANGGAL;
    public $ID_USER;
    public $ID_PERSEDIAAN;
    public $TOTAL;
    public $TANGGAL_INPUT;


    public function rules()
    {
        return [
            
            ['field' => 'tanggal',
            'label' => 'Tanggal',
            'rules' => 'required'],

            ['field' => 'iduser',
            'label' => 'id user',
            'rules' => 'required'],

            ['field' => 'idpersediaan',
            'label' => 'id persediaan',
            'rules' => 'required'],

            ['field' => 'total',
            'label' => 'total',
            'rules' => 'required'],
            
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
 
}