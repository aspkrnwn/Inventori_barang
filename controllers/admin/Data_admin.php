<?php

class Data_admin extends CI_controller
{
    public function index()
    {
        $data['data_admin'] = $this->user_model->tampil_data_user('user')->result_array();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('toko/list_user',$data);
        $this->load->view('template/footer');
    }

    public function input_form()
    {
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('admin/admin_form');
    }

    public function input_aksi()
    {
        $data = array(
            'nama_user' => $this->input->post('nama_user'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'hak_akses' => $this->input->post('hak_akses'),
        );

        $this->user_model->insert_data($data);
        redirect('admin/data_admin');
    }

    public function delete($id_user)
    {
      $data = array('id_user' => $id_user);

      $this->user_model->delete('user', $data);
      $this->session->set_flashdata('pesan','Data berhasil dihapus!');
      redirect('admin/data_admin');
  }

  function edit($id_user){
    $where = array('id_user' => $id_user);
    $data['users'] = $this->user_model->edit_data($where,'user')->result_array();

    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('toko/update_user', $data);
}

public function update_user()
{
    $nama_user = $this->input->post('nama_user');
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $hak_akses = $this->input->post('hak_akses');

    $data = array(

        'nama_user' => $nama_user,
        'username' => $username,
        'password' => $password,
        'hak_akses' => $hak_akses
    );

    $where = array(
        'id_user' => $this->input->post('id_user')
    );

    $this->user_model->update_data($where,$data,'user');
    redirect('admin/data_admin');
}

}