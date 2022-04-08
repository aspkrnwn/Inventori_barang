<?php

class Barang_model extends CI_model
{
    public function tampil_barang($table)
    {
        return $this->db->get($table);
    }

    public function input_stok_barang($data)
    {
        $this->db->insert('tbl_barang', $data);
    }

    public function delete($table, $data)
	{
		$this->db->delete($table, $data);
    }

    function update_data($where,$data,$table){
		$this->db->where($where);
        $this->db->update($table,$data);
        
    }

    function edit_data($where){
        return $this->db->get_where('tbl_barang',$where);
    }

    ////////////////////////BARU//////////////////////////////

    public function insert($dataBarang)
    {
        $this->db->insert('tbl_barang', $dataBarang);
    }

    public function insert_jenis($dataJenis)
    {
        $this->db->insert('tbl_jenis_barang', $dataJenis);
    }

    public function insert_barang_masuk($dataBarangMasuk)
    {
        $this->db->insert('tbl_barang_masuk', $dataBarangMasuk);
    }

    public function select_max_id()
    {
        $this->db->select_max('id_barang', 'id_barang');
        return $this->db->get('tbl_barang')->row();
    }

    public function select_max_id_jenis()
    {
        $this->db->select_max('id_jenis_barang', 'id_jenis_barang');
        return $this->db->get('tbl_jenis_barang')->row();
    }




}