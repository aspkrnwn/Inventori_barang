<?php

/**
 * 
 */
class Cetak_laporan_penjualan extends CI_Controller
{
	
	public function index()
	{
		$data['penjualan_c'] = $this->laporan_model->tampil_penjualan()->result_array();

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('laporan/laporan_penjualan',$data);
		$this->load->view('template/footer');
	}

	public function tampil_laporan(){
		$tanggal_awal = $this->input->post('tanggal_awal');
		$tanggal_akhir = $this->input->post('tanggal_akhir');
		$data['tanggal_awal'] = $tanggal_awal;
		$data['tanggal_akhir'] = $tanggal_akhir;

		// var_dump($tanggal_akhir); die();

		$data['penjualan_c'] = $this->db->query("SELECT * FROM tbl_barang JOIN tbl_detail_transaksi ON tbl_barang.id_barang=tbl_detail_transaksi.id_barang JOIN tbl_transaksi ON tbl_detail_transaksi.id_transaksi=tbl_transaksi.id_transaksi JOIN tbl_jenis_barang ON tbl_jenis_barang.id_jenis_barang=tbl_barang.id_jenis_barang WHERE tbl_transaksi.tanggal_transaksi BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ")->result_array();

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('laporan/v_laporan_penjualan',$data);
		$this->load->view('template/footer');
	}

	public function pdf($tanggal_awal,$tanggal_akhir)
	{;

		$this->load->library('mypdf');
		$data['laporan'] = $this->db->query("SELECT * FROM tbl_barang JOIN tbl_detail_transaksi ON tbl_barang.id_barang=tbl_detail_transaksi.id_barang JOIN tbl_transaksi ON tbl_detail_transaksi.id_transaksi=tbl_transaksi.id_transaksi JOIN tbl_jenis_barang ON tbl_jenis_barang.id_jenis_barang=tbl_barang.id_jenis_barang WHERE tbl_transaksi.tanggal_transaksi BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ")->result_array();

		$data['total'] = $this->db->query("SELECT SUM(tbl_detail_transaksi.subtotal) AS totalSemua FROM tbl_barang JOIN tbl_detail_transaksi ON tbl_barang.id_barang=tbl_detail_transaksi.id_barang JOIN tbl_transaksi ON tbl_detail_transaksi.id_transaksi=tbl_transaksi.id_transaksi JOIN tbl_jenis_barang ON tbl_jenis_barang.id_jenis_barang=tbl_barang.id_jenis_barang WHERE tbl_transaksi.tanggal_transaksi BETWEEN '$tanggal_awal' AND '$tanggal_akhir' LIMIT 1 ")->result_array();
		$this->mypdf->generate('laporan/cetak_laporan_penjualan_pdf', $data);

	}
}