<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');

class M_Golongan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_golongan(){
         $this->db->select('*');
         $this->db->from('tbl_golongan');
         $this->db->order_by('kode_golongan', 'desc');
         $data = $this->db->get();
         return $data->result_array();
    }
}
     