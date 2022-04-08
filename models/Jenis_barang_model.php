<?php

/**
* 
*/
class Jenis_barang_model extends CI_model
{
	
	public function tampil_jenis_barang($table)
	{
		return $this->db->get($table);
	}

	public function input_jenis_barang($data)
    {
        $this->db->insert('tbl_jenis_barang', $data);
    }

    public function delete($table, $data)
	{
		$this->db->delete($table, $data);
    }
}