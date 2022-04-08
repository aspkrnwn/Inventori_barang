<?php 

class Dashboard extends CI_Controller
{
	public function index()
	{
		$data = $this->user_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'nama_user' => $data->nama_user,
			'username' => $data->username,
			'hak_akses' => $data->hak_akses,
		);


		$data['jml_brg'] = $this->db->query("SELECT * FROM tbl_barang")->num_rows();
		$data['jml_transaksi'] = $this->db->query("SELECT * FROM tbl_transaksi")->num_rows();
		$data['jml_supplier'] = $this->db->query("SELECT * FROM tbl_supplier")->num_rows();
		$data['jml_user'] = $this->db->query("SELECT * FROM user")->num_rows();
		$this->load->view('template/header.php');
		$this->load->view('template/sidebar.php');
		$this->load->view('admin/dashboard.php', $data);
		$this->load->view('template/footer.php');
	}
}