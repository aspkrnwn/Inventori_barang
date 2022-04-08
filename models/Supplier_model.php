<?php
    class Supplier_model extends CI_model
{
    public function tampil_supplier($table)
    {
        return $this->db->get($table);
    }

    public function input_supplier($data)
    {
        $this->db->insert('tbl_supplier', $data);
    }

    public function delete($table, $data)
	{
		$this->db->delete($table, $data);
    }

    function update_supplier($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
    }

    function edit_supplier($where,$table){
        return $this->db->get_where($table,$where);
    }
}
