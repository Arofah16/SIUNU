<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');

class M_Bidang extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_bidang(){
        //  $data= $this->db->querry("SELECT kode_golongan FROM tbl_golongan ORDER BY kode_golongan DESC");
        //  return $data->result_array();
        // $data= $this->db->get('tbl_bidang_barang');
        //  return $data->result_array();
         $this->db->select ('*');
         $this->db->from('tbl_bidang_barang');
         $this->db->order_by('kode_bidang','asc');
         $data = $this->db->get();
         return $data->result_array();
    }
    function get_bidang_by_kode_golongan($kode_golongan)
    {
        $this->db->where('kode_golongan',$kode_golongan);
        $this->db->order_by('nama_bidang','ASC');
        $query = $this->db->get('tbl_bidang_barang');
        $output = '<option value="">Pilih Bidang</option>';
        foreach($query->result() as $row)
        {
        $output .= '<option value="'.$row->kode_bidang.'">'.$row->nama_bidang.'</option>';
        }
        return $output;
    } 
    
}
 