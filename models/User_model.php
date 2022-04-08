<?php

class User_model extends CI_model
{
    public function ambil_data($id)
    {
        $this->db->where('username', $id);
        return $this->db->get('user')->row();
    }

    public function insert_data($data)
    {
        $this->db->insert('user',$data);
    }

    public function tampil_data_user($table)
    {
        return $this->db->get($table);
    }

    public function delete($table, $data)
	{
		$this->db->delete($table, $data);
    }

    function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
    }

    function edit_data($where,$table){
        return $this->db->get_where($table,$where);
    }
}