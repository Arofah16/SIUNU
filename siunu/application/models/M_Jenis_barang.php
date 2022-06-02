<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');

class M_Jenis_barang extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_category_product(){
         $data= $this->db->get('tbl_jenis_barang');
         return $data->result_array();
    }
}
    