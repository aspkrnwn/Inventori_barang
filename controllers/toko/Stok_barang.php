<?php

class Stok_barang extends CI_controller
{
    public function index()
    {
        $data['stok_barang'] = $this->db->query("SELECT * FROM tbl_barang JOIN tbl_barang_masuk ON tbl_barang_masuk.id_barang=tbl_barang.id_barang JOIN tbl_supplier ON tbl_supplier.id_supplier = tbl_barang_masuk.id_supplier
        JOIN tbl_jenis_barang ON tbl_jenis_barang.id_jenis_barang=tbl_barang.id_jenis_barang JOIN user ON user.id_user=tbl_barang.id_input ORDER BY tbl_barang.id_barang DESC")->result_array();
        // $data['stok_barang'] = $this->db->query("SELECT * FROM tbl_barang JOIN tbl_detail_transaksi ON tbl_detail_transaksi.id_barang=tbl_barang.id_barang JOIN tbl_supplier JOIN tbl_barang_masuk ON tbl_barang_masuk.id_supplier=tbl_supplier.id_supplier
        // JOIN tbl_jenis_barang ON tbl_jenis_barang.id_jenis_barang=tbl_barang.id_jenis_barang")->result_array();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('toko/list_stok_barang',$data);
        $this->load->view('template/footer');
    }

    public function _construct()
    {
        parent::_construct();
        $this->library('form_validation');
    }


    public function _rules()
	{
		// $this->form_validation->set_rules('kd_barang', 'kd_barang', 'required', ['required'=>'Maaf Kode Barang harus di isi']);
		$this->form_validation->set_rules('nama_barang', 'nama_barang', 'required');
		$this->form_validation->set_rules('satuan', 'satuan', 'required');
        $this->form_validation->set_rules('jumlah', 'jumlah', 'required');
        $this->form_validation->set_rules('harga_beli', 'harga_beli', 'required');
        $this->form_validation->set_rules('harga_jual', 'harga_jual', 'required');
    }

    public function input_form()
    {

        $data['sup'] = $this->db->query("SELECT * FROM tbl_supplier")->result_array();
        $data['jenis_barang'] = $this->db->query("SELECT * FROM tbl_jenis_barang")->result_array();


        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('toko/input_barang',$data);
    }

	public function input_aksi()
    {
            $tanggal_masuk = $this->input->post('tanggal_masuk');
            $nama_barang = $this->input->post('nama_barang');
            $satuan = $this->input->post('satuan');
            $id_supplier = $this->input->post('id_supplier');
            $id_jenis_barang = $this->input->post('id_jenis_barang');
            $jenis_barang = $this->input->post('jenis_barang');
            $jumlah_beli = $this->input->post('jumlah_beli');
            $harga_beli = $this->input->post('harga_beli');
            $harga_jual = $this->input->post('harga_jual');
        


        $dataBarang = array(

            'nama_barang' => $nama_barang,
            'satuan' => $satuan,
            'jumlah' => $jumlah_beli,
            'harga_beli' => $harga_beli,
            'total_belanja' => $jumlah_beli*$harga_beli,
            'harga_jual' => $harga_jual,
            'id_jenis_barang' => $id_jenis_barang,
            'id_input' => $this->session->userdata('id_user')

        );

        $this->barang_model->insert($dataBarang);

        $barang = $this->barang_model->select_max_id();

        $dataBarangMasuk = array(
            'id_barang' => $barang->id_barang,
            'tanggal_masuk' => $tanggal_masuk,
            'jumlah_beli' => $jumlah_beli,
            'id_supplier' => $id_supplier,
            'id_user' => $this->session->userdata('id_user')

            );

        $this->barang_model->insert_barang_masuk($dataBarangMasuk);
        // Tambah query untuk update stok
        $this->session->set_flashdata("pesan", "Data berhasil diinputkan !");
        redirect('toko/stok_barang');
	   
    }

    function edit($id_barang)
    {
        

        $where = array('id_barang' => $id_barang);
        $data['barang'] = $this->db->query("SELECT * FROM tbl_barang JOIN tbl_barang_masuk ON tbl_barang_masuk.id_barang=tbl_barang.id_barang JOIN tbl_supplier ON tbl_supplier.id_supplier = tbl_barang_masuk.id_supplier
        JOIN tbl_jenis_barang ON tbl_jenis_barang.id_jenis_barang=tbl_barang.id_jenis_barang
        WHERE tbl_barang.id_barang='$id_barang'")->result_array();

        $data['supplier'] = $this->db->query("SELECT * FROM tbl_supplier ")->result_array();
        $data['jenis'] = $this->db->query("SELECT * FROM tbl_jenis_barang")->result_array();
       

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('toko/update_barang', $data);
    }

    public function update_barang()
    {

        $data['sup'] = $this->db->query("SELECT * FROM tbl_supplier")->result_array();
        $data['stok_barang'] = $this->db->query("SELECT * FROM tbl_jenis_barang")->result_array();

            $id_barang = $this->input->post('id_barang');
            $tanggal_masuk = $this->input->post('tanggal_masuk');
            $nama_barang = $this->input->post('nama_barang');
            $satuan = $this->input->post('satuan');
            $nama_supplier = $this->input->post('nama_supplier');
            $id_supplier = $this->input->post('id_supplier');
            $jumlah = $this->input->post('jumlah');
            $harga_beli = $this->input->post('harga_beli');
            $harga_jual = $this->input->post('harga_jual');

        $data = array(  

            'nama_barang' => $nama_barang,
            'satuan' => $satuan,
            'jumlah' => $jumlah,
            'harga_beli' => $harga_beli,
            'harga_jual' => $harga_jual
            );

         $data2 = array(

            'tanggal_masuk' => $tanggal_masuk,
            'id_supplier' => $id_supplier
            );

            $where = array(
                'id_barang' => $id_barang
            );

            $this->barang_model->update_data($where,$data,'tbl_barang');
            $this->barang_model->update_data($where,$data2,'tbl_barang_masuk');
            redirect('toko/stok_barang');
            // print_r($data);
            // print_r($data2);
    }

    public function delete($id_barang)
	{
		$data = array('id_barang' => $id_barang);

		$this->barang_model->delete('tbl_barang', $data);
		$this->session->set_flashdata('pesan','Barang berhasil dihapus!');
		redirect('toko/stok_barang');
	}

    public function tambah_stok(){

        $id_barang = $this->input->post('id_barang');
        $jumlah = $this->input->post('jumlah');


        $this->db->query("UPDATE tbl_barang SET tbl_barang.jumlah = tbl_barang.jumlah+'$jumlah' WHERE tbl_barang.id_barang ='$id_barang' ");
        redirect('toko/stok_barang');
    }
}