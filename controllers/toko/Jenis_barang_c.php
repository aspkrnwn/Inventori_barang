<?php

/**
* 
*/
class jenis_barang_c extends CI_controller
{
	
	public function index()
	{
		$data['jenis_barang_c'] = $this->jenis_barang_model->tampil_jenis_barang('tbl_jenis_barang')->result_array();
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('toko/list_jenis_barang',$data);
            $this->load->view('template/footer');
	}

	  public function _rules()
	{
		$this->form_validation->set_rules('jenis_barang', 'jenis_barang', 'required', ['required'=>'Maaf kolom Barang harus di isi']);
    }

	 public function input_form()
    {
        $data = array(

        );
        $data['jenis_barang_c'] = $this->jenis_barang_model->tampil_jenis_barang('tbl_jenis_barang')->result_array();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('toko/input_jenis_barang',$data);
    }

    public function input_aksi()
    {
        $this->_rules();
		if($this->form_validation->run() == FALSE)
		{
			$this->input_form();
		}else{

            $jenis_barang = $this->input->post('jenis_barang');

        $data = array(

            'jenis_barang' => $jenis_barang

        );

        $this->jenis_barang_model->input_jenis_barang($data);
        $this->session->set_flashdata("pesan", "Data berhasil diinputkan !");
        redirect('toko/jenis_barang_c');
	    }
    }

    public function delete($id_jenis_barang)
    {
        $data = array('id_jenis_barang' => $id_jenis_barang);

        $this->barang_model->delete('tbl_jenis_barang', $data);
        $this->session->set_flashdata('pesan','Barang berhasil dihapus!');
        redirect('toko/jenis_barang_c');
    }
}