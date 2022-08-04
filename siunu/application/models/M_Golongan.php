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
         $this->db->order_by('kode_golongan', 'ASC');
         $data = $this->db->get();
         return $data->result_array();
    }
    function fetch_Golongan()
    {
        $this->db->order_by("nama_golongan", "ASC");
        $query = $this->db->get("tbl_golongan");
        return $query->result();
    }
    function fetch_Bidang($kode_golongan)
    {
    $this->db->where('id', $kode_golongan);
    $this->db->order_by('nama_bidang','ASC');
    $query = $this->db->get('tbl_bidang_barang');
    $output = '<option value="">Pilih Bidang</option>';
    foreach($query->result() as $row)
    {
        $output .= '<option value="'.$row->kode_golongan.'">'.$row->nama_bidang.'</option>';
    }
    return $output;
    }
}
     