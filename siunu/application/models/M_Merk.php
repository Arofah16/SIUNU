<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');

class M_Merk extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_merk(){
         $data= $this->db->get('tbl_merk_barang');
         return $data->result_array();
    }
}
    