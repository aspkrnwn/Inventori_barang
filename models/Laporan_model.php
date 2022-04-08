<?php

/**
 * 
 */
class laporan_model extends CI_model
{
	
	public function tampil_penjualan()
	{
		return $this->db->query("SELECT * FROM tbl_barang JOIN tbl_detail_transaksi ON tbl_barang.id_barang=tbl_detail_transaksi.id_barang JOIN tbl_transaksi ON tbl_detail_transaksi.id_transaksi=tbl_transaksi.id_transaksi JOIN tbl_jenis_barang ON tbl_jenis_barang.id_jenis_barang=tbl_barang.id_jenis_barang");
	}

	public function tampil_stok_barang()
	{
		return $this->db->query("SELECT * FROM tbl_barang JOIN tbl_barang_masuk ON tbl_barang_masuk.id_barang=tbl_barang.id_barang JOIN tbl_supplier ON tbl_supplier.id_supplier = tbl_barang_masuk.id_supplier
        JOIN tbl_jenis_barang ON tbl_jenis_barang.id_jenis_barang=tbl_barang.id_jenis_barang");
	}

}