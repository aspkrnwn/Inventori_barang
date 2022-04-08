<?php

/**
 * 
 */
class Cetak_laporan_stok_barang extends CI_Controller
{
	
	public function index()
	{
		$data['stok_barang'] = $this->laporan_model->tampil_stok_barang()->result_array();

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('laporan/laporan_stok_barang',$data);
		$this->load->view('template/footer');
	}

	public function tampil_laporan_stok_barang(){
		$tanggal_awal = $this->input->post('tanggal_awal');
		$tanggal_akhir = $this->input->post('tanggal_akhir');
		$data['tanggal_awal'] = $tanggal_awal;
		$data['tanggal_akhir'] = $tanggal_akhir;

		$data['stok_barang'] = $this->db->query("SELECT * FROM tbl_barang JOIN tbl_barang_masuk ON tbl_barang_masuk.id_barang=tbl_barang.id_barang JOIN tbl_supplier ON tbl_supplier.id_supplier = tbl_barang_masuk.id_supplier
			JOIN tbl_jenis_barang ON tbl_jenis_barang.id_jenis_barang=tbl_barang.id_jenis_barang WHERE tbl_barang_masuk.tanggal_masuk BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ")->result_array();

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('laporan/v_laporan_stok_barang',$data);
		$this->load->view('template/footer');

	}

	public function pdf($tanggal_awal,$tanggal_akhir)
	{

		$this->load->library('mypdf');
		$data['laporan'] = $this->db->query("SELECT * FROM tbl_barang JOIN tbl_barang_masuk ON tbl_barang_masuk.id_barang=tbl_barang.id_barang JOIN tbl_supplier ON tbl_supplier.id_supplier = tbl_barang_masuk.id_supplier
			JOIN tbl_jenis_barang ON tbl_jenis_barang.id_jenis_barang=tbl_barang.id_jenis_barang WHERE tbl_barang_masuk.tanggal_masuk BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ")->result_array();

		$data['total'] = $this->db->query("SELECT SUM(tbl_barang.harga_beli) AS total FROM tbl_barang JOIN tbl_barang_masuk ON tbl_barang_masuk.id_barang=tbl_barang.id_barang JOIN tbl_supplier ON tbl_supplier.id_supplier = tbl_barang_masuk.id_supplier
			JOIN tbl_jenis_barang ON tbl_jenis_barang.id_jenis_barang=tbl_barang.id_jenis_barang WHERE tbl_barang_masuk.tanggal_masuk BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ")->result_array();

		$this->mypdf->generate('laporan/cetak_laporan_data_barang_pdf', $data);

	}
}