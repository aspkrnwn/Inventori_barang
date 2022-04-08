<?php

class Penjualan_c extends CI_controller
{
    public function index()
    {


       $data['penjualan_c'] = $this->db->query("SELECT * FROM tbl_barang JOIN tbl_jenis_barang ON tbl_barang.id_jenis_barang=tbl_jenis_barang.id_jenis_barang JOIN tbl_detail_transaksi ON tbl_barang.id_barang=tbl_detail_transaksi.id_barang JOIN tbl_transaksi ON tbl_transaksi.id_transaksi = tbl_detail_transaksi.id_transaksi JOIN user ON user.id_user=tbl_transaksi.id_user ORDER BY tbl_transaksi.id_transaksi DESC")->result_array();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('toko/list_penjualan',$data);
        $this->load->view('template/footer');
    }

    public function _rules()
    {
        // $this->form_validation->set_rules('kd_barang', 'kd_barang', 'required', ['required'=>'Maaf Kode Barang harus di isi']);
        $this->form_validation->set_rules('tanggal_transaksi', 'tanggal_transaksi', 'required');
        $this->form_validation->set_rules('id_jenis_barang', 'id_jenis_barang', 'required');
        $this->form_validation->set_rules('id_barang', 'id_barang', 'required');
        $this->form_validation->set_rules('satuan', 'satuan', 'required');
        $this->form_validation->set_rules('jumlah_beli', 'jumlah_beli', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');
        $this->form_validation->set_rules('nama_pembeli', 'nama_pembeli', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
    }

    public function get_barang()
    {
        $id_jenis_barang = $this->input->post('id_jenis_barang');
        $data = $this->penjualan_model->get_barang($id_jenis_barang);
        echo json_encode($data);
    }

    public function get_harga()
    {
        $id_barang = $this->input->post('id_barang');
        $data = $this->penjualan_model->get_harga($id_barang);
        echo json_encode($data);
    }

    public function input_form()
    {

        $data['sup'] = $this->db->query("SELECT * FROM tbl_supplier")->result_array();
        $data['stok_barang'] = $this->db->query("SELECT * FROM tbl_jenis_barang")->result_array();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('penjualan/input_penjualan',$data);
    }

    public function input_aksi()
    {

        $tanggal_transaksi = $this->input->post('tanggal_transaksi');
        $id_jenis_barang = $this->input->post('id_jenis_barang');
        $id_barang = $this->input->post('id_barang');
        $satuan = $this->input->post('satuan');
        $jumlah_beli = $this->input->post('jumlah_beli');
        $harga = $this->input->post('harga');
        $subtotal = $this->input->post('jumlah_beli') *  floatval($this->input->post('harga'));
        $nama_pembeli = $this->input->post('nama_pembeli');
        $alamat = $this->input->post('alamat');

        $dataTransaksi = array(

            'tanggal_transaksi' => $this->input->post('tanggal_transaksi'),
            'nama_pembeli' => $this->input->post('nama_pembeli'),
            'alamat' => $this->input->post('alamat'),
            'id_user' => $_SESSION['id_user']

        );

        $this->penjualan_model->insert($dataTransaksi);
        $transaksi = $this->penjualan_model->select_max_id();

        $dataDetTransaksi = array(

            'id_transaksi' => $transaksi->id_transaksi,
            'id_barang' => $id_barang,
            'jumlah' => $jumlah_beli,
            'subtotal' => $subtotal

        );

        $this->penjualan_model->insert_detail($dataDetTransaksi);

        $this->db->query("UPDATE tbl_barang SET tbl_barang.jumlah = tbl_barang.jumlah - $jumlah_beli WHERE tbl_barang.id_barang='$id_barang' ");
        // Tambah query untuk update stok
        $this->session->set_flashdata("pesan", "Data berhasil diinputkan !");
        redirect('toko/penjualan_c');
    }

    function edit($id_transaksi)
    {


        $where = array('id_transaksi' => $id_transaksi);
        $data['barang'] = $this->db->query("SELECT * FROM tbl_barang JOIN tbl_jenis_barang ON tbl_barang.id_jenis_barang=tbl_jenis_barang.id_jenis_barang JOIN tbl_detail_transaksi ON tbl_barang.id_barang=tbl_detail_transaksi.id_barang JOIN tbl_transaksi ON tbl_transaksi.id_transaksi = tbl_detail_transaksi.id_transaksi WHERE tbl_transaksi.id_transaksi='$id_transaksi'")->result_array();

        $data['supplier'] = $this->db->query("SELECT * FROM tbl_supplier ")->result_array();
        $data['jenis'] = $this->db->query("SELECT * FROM tbl_jenis_barang")->result_array();


        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('penjualan/update_penjualan', $data);
        $this->load->view('template/footer');
    }

    public function update_penjualan()
    {

        // $data['sup'] = $this->db->query("SELECT * FROM tbl_supplier")->result_array();
        // $data['stok_barang'] = $this->db->query("SELECT * FROM tbl_jenis_barang")->result_array();
        $id_transaksi = $this->input->post('id_transaksi');
        $tanggal_transaksi = $this->input->post('tanggal_transaksi');
        $id_jenis_barang = $this->input->post('id_jenis_barang');
        $id_barang = $this->input->post('id_barang');
        $satuan = $this->input->post('satuan');
        $jumlah_beli = $this->input->post('jumlah_beli');
        $harga = $this->input->post('harga');
        $subtotal = $this->input->post('jumlah_beli') *  floatval($this->input->post('harga'));
        $nama_pembeli = $this->input->post('nama_pembeli');
        $alamat = $this->input->post('alamat');

        $data = array(

            'tanggal_transaksi' => $this->input->post('tanggal_transaksi'),
            'nama_pembeli' => $this->input->post('nama_pembeli'),
            'alamat' => $this->input->post('alamat'),
            'id_user' => $_SESSION['id_user']
        );

        $data2 = array(
            'jumlah' => $jumlah_beli,
            'subtotal' => $subtotal
        );

        $where = array(
            'id_transaksi' => $id_transaksi
        );

        $this->barang_model->update_data($where,$data,'tbl_transaksi');
        $this->barang_model->update_data($where,$data2,'tbl_detail_transaksi');
        redirect('toko/penjualan_c');
    }

    public function delete($id_transaksi)
    {
        $data = array('id_transaksi' => $id_transaksi);

        $cek_barang = $this->db->query("SELECT * FROM tbl_detail_transaksi JOIN tbl_transaksi ON tbl_transaksi.id_transaksi=tbl_detail_transaksi.id_transaksi WHERE tbl_detail_transaksi.id_transaksi='$id_transaksi' ")->row();

        $data2 = array('id_transaksi' => $cek_barang->id_transaksi);

        if($cek_barang > 0){
            $this->barang_model->delete('tbl_detail_transaksi', $data);
            $this->db->delete('tbl_transaksi', $data2);    
        }
        

        $this->session->set_flashdata('pesan','Barang berhasil dihapus!');
        redirect('toko/penjualan_c');
        // print_r($cek_barang);
    }

}
