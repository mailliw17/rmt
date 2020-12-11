<?php

class M_scan extends CI_Model
{
    public function getDetailBarcode($id_barcode)
    {
        return $this->db->get_where('truk', ['id_barcode' => $id_barcode])->row_array();
    }

    //masih error 
    public function cekNull($id_barcode)
    {
        return $this->db->query("SELECT * from truk WHERE id_barcode='$id_barcode'")->row_array(); 
    }

    public function getNomorSegel()
    {
        return $this->db->query("SELECT * FROM truk WHERE ts_in IS NOT NULL")->result();
    }
}
