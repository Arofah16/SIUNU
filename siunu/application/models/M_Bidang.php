<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');

class M_Bidang extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_bidang(){
        

         $this->db->select ('*');
         $this->db->from('tbl_bidang_barang');
         $this->db->order_by('kode_bidang','ASC');
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
    function fetch_bidang()
    {
        $this->db->order_by("nama_bidang", "ASC");
        $query = $this->db->get("tbl_bidang_barang");
        return $query->result();
    }
}
 