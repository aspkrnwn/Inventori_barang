<?php

    class Supplier_c extends CI_controller
    {
        public function index()
        {
            $data['supplier_c'] = $this->supplier_model->tampil_supplier('tbl_supplier')->result_array();
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('toko/list_supplier',$data);
            $this->load->view('template/footer');
        }

        public function _rules()
	{
		$this->form_validation->set_rules('nama_supplier', 'nama_supplier', 'required', ['required'=>'Maaf Kode Barang harus di isi']);
		$this->form_validation->set_rules('alamat_supplier', 'alamat_supplier', 'required');
		$this->form_validation->set_rules('no_tlp', 'no_tlp', 'required');
    }

    public function input_form()
    {
        $data = array(

        );
        $data['supplier_c'] = $this->supplier_model->tampil_supplier('tbl_supplier')->result_array();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('toko/input_supplier',$data);
    }

	public function input_aksi()
    {
        $this->_rules();
		if($this->form_validation->run() == FALSE)
		{
			$this->input_form();
		}else{

            $nama_supplier = $this->input->post('nama_supplier');
            $no_tlp = $this->input->post('no_tlp');
            $alamat_supplier = $this->input->post('alamat_supplier');

        $data = array(

            'nama_supplier' => $nama_supplier,
            'alamat_supplier' => $alamat_supplier,
            'no_tlp' => $no_tlp,

        );

        $this->supplier_model->input_supplier($data);
        $this->session->set_flashdata("pesan", "Data berhasil diinputkan !");
        redirect('toko/supplier_c');
	    }
    }

    function edit($id_supplier){
        $where = array('id_supplier' => $id_supplier);
        $data['supplier'] = $this->supplier_model->edit_supplier($where,'tbl_supplier')->result_array();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('toko/update_supplier', $data);
    }

    public function update_supplier()
    {
        $id_supplier = $this->input->post('id_supplier');
            $nama_supplier = $this->input->post('nama_supplier');
            $no_tlp = $this->input->post('no_tlp');
            $alamat_supplier = $this->input->post('alamat_supplier');

        $data = array(

            'nama_supplier' => $nama_supplier,
            'alamat_supplier' => $alamat_supplier,
            'no_tlp' => $no_tlp

            );

            $where = array(
                'id_supplier' => $id_supplier
            );

            $this->supplier_model->update_supplier($where,$data,'tbl_supplier');
            redirect('toko/supplier_c');
    }

    public function delete($id_supplier)
	{
		$data = array('id_supplier' => $id_supplier);

		$this->supplier_model->delete('tbl_supplier', $data);
		$this->session->set_flashdata('pesan','Barang berhasil dihapus!');
		redirect('toko/supplier_c');
	}

    }