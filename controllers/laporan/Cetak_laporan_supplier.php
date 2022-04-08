<?php 
class Cetak_laporan_supplier extends CI_Controller
{
	
	public function index()
	{
		$data['supplier_c'] = $this->supplier_model->tampil_supplier('tbl_supplier')->result_array();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('toko/list_supplier',$data);
		$this->load->view('template/footer');
	}
}