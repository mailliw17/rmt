<?php

class M_admin extends CI_Model
{
    public function getDataPO()
    {
        return $this->db->query("SELECT sum(qty) as jumlah, truk.nomor_po, bahan_baku.nama_barang, bahan_baku.qty_rencana FROM truk INNER JOIN bahan_baku WHERE truk.nomor_po = bahan_baku.nomor_po AND bahan_baku.status = 1  GROUP BY truk.nomor_po, bahan_baku.nama_barang, bahan_baku.qty_rencana")->row_array();
    }

    public function getAnalisisHarian()
    {
        return $this->db->query("SELECT truk.nomor_po, CAST(pelabuhan AS DATE) as tanggal, count(pelabuhan) as pelabuhan, count(selesai_bongkar) as diterima FROM truk INNER JOIN bahan_baku WHERE truk.nomor_po = bahan_baku.nomor_po AND  bahan_baku.status = 1  GROUP BY truk.nomor_po, CAST(pelabuhan AS DATE)")->result_array();
    }

    public function getAllData()
    {
        return $this->db->query("SELECT truk.pelabuhan, truk.security_in, truk.ts_in, truk.mulai_bongkar, truk.selesai_bongkar, truk.ts_out, truk.security_out, truk.id_barcode, truk.plat_nomor, truk.nomor_sj, truk.qty, TIMESTAMPDIFF(MINUTE,pelabuhan, security_out) as durasi FROM truk INNER JOIN bahan_baku WHERE truk.nomor_po = bahan_baku.nomor_po AND bahan_baku.status = 1")->result_array();
    }
}
