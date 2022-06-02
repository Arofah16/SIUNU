<?php 

class M_Ruang extends CI_Model
{
    public function get_ruang($table_name)
    {
        // $query = $this->db->query("SELECT * FROM tbl_ruang");
        // return $query;
            $this->db->select('*');
            $data = $this->db->get($table_name);
            $this->db->from('tbl_ruang');
            return $data->result_array();
    }
} 
?>