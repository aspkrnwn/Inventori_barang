<?php

class Penjualan_model extends CI_model
{
    public function tampil_penjualan($table)
    {
        return $this->db->get($table);
    }

    public function input_penjualan($data)
    {
        $this->db->insert('tbl_', $data);
    }

    public function get_barang($id_jenis_barang)
    {
        $hasil = $this->db->query("SELECT * FROM tbl_barang WHERE id_jenis_barang = '$id_jenis_barang' ");
        return $hasil->result();
    }

    public function get_harga($id_barang)
    {
        $hasil = $this->db->query("SELECT * FROM tbl_barang WHERE id_barang = '$id_barang' ");
        return $hasil->result();
    }

    public function insert($dataTransaksi)
    {
        $this->db->insert('tbl_transaksi', $dataTransaksi);
    }

    public function select_max_id()
    {
        $this->db->select_max('id_transaksi', 'id_transaksi');
        return $this->db->get('tbl_transaksi')->row();
    }

    public function insert_detail($dataDetTransaksi)
    {
        $this->db->insert('tbl_detail_transaksi', $dataDetTransaksi);
    }

    public function select()
    {
        $query = $this->db->query("SELECT * FROM tbl_transaksi JOIN tbl_detail_transaksi ON tbl_transaksi.id_transaksi=tbl_detail_transaksi.id_transaksi JOIN tbl_barang ON tbl_detail_transaksi.id_barang=tbl_barang.id_barang
            JOIN tbl_jenis_barang ON tbl_jenis_barang.id_jenis_barang=tbl_barang.id_jenis_barang");
        return $query;
    }

}