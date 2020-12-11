<?php

class M_operator extends CI_Model
{
    public function getNomorPO()
    {
        return $this->db->query("SELECT * FROM bahan_baku WHERE status=1")->result();
    }

    public function getDataNomorPO($nomor_po)
    {
        return $this->db->query("SELECT * FROM bahan_baku WHERE nomor_po='$nomor_po'")->result();
    }

    public function insert_print_pelabuhan($data)
    {
        $query = $this->db->insert('truk', $data);
        return $query;
    }

    public function update_waktu($data)
    {
        $this->db->where('id_barcode', $this->input->post('id_barcode'));
        $this->db->update('truk', $data);
    }
}
