<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Persediaan_model extends CI_Model
{
    private $_table = "persediaan"; //nama tabel
    private $_tableD = "persediaan_detail"; //nama tabel

    // nama kolom di tabel, harus sama huruf besar dan huruf kecilnya!
    public $ID_PERSEDIAAN;
    public $TANGGAL;
    public $ID_USER;
    public $TOTAL;
    public $TANGGAL_INPUT;


    public function rules()
    {
        return [
            ['field' => 'idpersediaan',
            'label' => 'ID Persediaan',
            'rules' => 'required'],

            ['field' => 'tanggal',
            'label' => 'Tanggal',
            'rules' => 'required'],

            ['field' => 'iduser',
            'label' => 'id user',
            'rules' => 'required'],

            ['field' => 'total_hidden',
            'label' => 'total',
            'rules' => 'required'],
            
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->ID_PERSEDIAAN = $post["idpersediaan"];
        $this->TANGGAL = $post["tanggal"];
        $this->ID_USER = $post["iduser"];
        $this->TOTAL = $post["total_hidden"];
        $this->TANGGAL_INPUT = $post["tanggal"];
    
        return $this->db->insert($this->_table, $this);
    }

    public function saveDetail($detail_data)
    {
        for ($x = 0; $x< count($detail_data); $x++){
            $data[] = array(
                'ID_PERSEDIAAN' => $detail_data[$x]['idpersediaan'],
                'ID_BARANG' => $detail_data[$x]['idBarang'],
                'QTY' => $detail_data[$x]['qtyBarang'],
                'SATUAN' => $detail_data[$x]['satuanBarang'],
                'HARGA' => $detail_data[$x]['hargaJual'],
                'SUBTOTAL' => $detail_data[$x]['subTotal'],
            );
        }

        try {
            for ($x = 0; $x< count($detail_data); $x++){
                $this->db->insert('persediaan_detail',$data[$x]);
            }
            return 'Success';
        } catch (Exception $e) {
            return 'failed';
        }
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("ID_PERSEDIAAN" => $id));
    }

    public function deletepersediaan($id)
    {
        return $this->db->delete($this->_tableD, array("ID_PERSEDIAAN" => $id));
    }

    public function getByBarangpersediaan()
    {
        $this->db->select('persediaan_detail.ID_persediaan,persediaan_detail.ID_BARANG,barang.NAMA_BARANG,persediaan_detail.SATUAN,persediaan_detail.QTY,persediaan_detail.HARGA,persediaan_detail.SUBTOTAL');
        $this->db->join('barang', 'barang.ID_BARANG = persediaan_detail.ID_BARANG');
        $this->db->from('persediaan_detail');
        $query = $this->db->get();
        return $query->result();
    }
    
 
}