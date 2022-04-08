<?php

class Login extends CI_controller
{
    public function index()
    {

      $this->load->view('admin/login');

  }

  public function proses_login()
  {
        //buat validasi formnya
    $this->form_validation->set_rules('username','Username','required',
        ['required' => 'Harap Masukan Username Anda']);
    $this->form_validation->set_rules('password','Password','required',
        ['required' => 'Harap Masukan Password Anda']);

    //pertama buat jika form validasinya gagal/salah/false maka akan dikembalikan ke hal. login
    if($this->form_validation->run() == FALSE)
    {
        $this->load->view('admin/login');
    }
    else
    {
        //jika betul, cek DB
		//pertama, tangkap inputan dr form
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        //buat variabel untuk cek
        $user = $username;
        $pass = MD5($password);

        // $cek = $this->login_model->cek_login($user, $pass);
        $cek = $this->db->query("SELECT * FROM user WHERE username = '$user' AND password = '$pass' ");

        if($cek->num_rows() > 0)
        {
            //buat user data
            foreach($cek->result() as $c)
            {
        //buat variabel menampung data user
                $sess_data['id_user'] = $c->id_user;
                $sess_data['username'] = $c->username;
                $sess_data['hak_akses'] = $c->hak_akses;

                $this->session->set_userdata($sess_data);
            }
    //jika level nya adl admin maka:
            if($sess_data['hak_akses'] == 'admin' || 'Admin')
            {
        //lempar ke halaman dashboard(admin)
                $_SESSION['id_user'] = $sess_data['id_user'];
                $_SESSION['akses'] = $sess_data['hak_akses'];
                redirect('admin/dashboard');
            }

            else if ($sess_data['hak_akses'] == 'pemilik' || 'Pemilik')
            {
             $_SESSION['id_user'] = $sess_data['id_user'];
             $_SESSION['akses'] = $sess_data['hak_akses'];
             redirect('pemilik/dashboard');
         }
         else
         {

    //lalu lempar ke hal login
            redirect('login');
        }
    }
    else
    {

        redirect('login');
    }
}
}
public function logout()
{
    $this->session->sess_destroy();
    redirect('login');
}
}
