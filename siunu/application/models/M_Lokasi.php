<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');

class M_Lokasi extends CI_Model
{
  function __construct()
  {
	 parent::__construct();
	 //validasi jika user belum login
  }

  function fetch_lokasi()
  {
    $this->db->order_by("nama_kampus", "ASC");
    $query = $this->db->get("tbl_kampus");
    return $query->result();
  }

  function fetch_gedung($id_kampus)
 {
      $this->db->where('id_kampus', $id_kampus);
      $this->db->order_by('nama_gedung', 'ASC');
      $query = $this->db->get('tbl_gedung');
      $output = '<option value="">Pilih Gedung</option>';
      foreach($query->result() as $row)
      {
         $output .= '<option value="'.$row->id_gedung.'">'.$row->nama_gedung.'</option>';
      }
      return $output;
      
 }

 function fetch_lantai($id_gedung)
 {
      $this->db->where('id_gedung', $id_gedung);
      $this->db->order_by('nama_lantai', 'ASC');
      $query = $this->db->get('tbl_lantai');
      $output = '<option value="">Pilih Lantai</option>';
      foreach($query->result() as $row)
      {
         $output .= '<option value="'.$row->id_lantai.'">'.$row->nama_lantai.'</option>';
      }
      return $output;
 }

 function fetch_ruang($id_lantai)
 {
      $this->db->where('id_lantai', $id_lantai);
      $this->db->order_by('deskripsi', 'ASC');
      $query = $this->db->get('tbl_ruang');
      $output = '<option value="">Pilih Ruang</option>';
      foreach($query->result() as $row)
      {
         $output .= '<option value="'.$row->id_ruang.'">'.$row->deskripsi.'</option>';
      }
      return $output;
 }

 function fetch_sub_ruang($id_ruang)
 {
      $this->db->where('id_ruang', $id_ruang);
      $this->db->order_by('nama_sub_ruang', 'ASC');
      $query = $this->db->get('tbl_sub_ruang');
      $output = '<option value="">Pilih Sub Ruang</option>';
      foreach($query->result() as $row)
      {
         $output .= '<option value="'.$row->id_sub_ruang.'">'.$row->nama_sub_ruang.'</option>';
      }
      return $output;
 }

 function get_id_kampus()
 {
    $this->db->select('*');
    $this->db->from('tbl_kampus');
    $this->db->order_by('id_kampus', 'ASC');
    $data = $this->db->get();
    return $data->result_array();
   }

   function get_kampus()
   {
     $data = $this->db->query('SELECT * FROM tbl_kampus ORDER BY nama_kampus');
     return $data->result_array();
   }

   function get_gedung()
 {
   $data = $this->db->query('SELECT * FROM tbl_gedung ORDER BY nama_gedung');
   return $data->result_array();
 }

 function get_lantai()
 {
   $data = $this->db->query('SELECT * FROM tbl_lantai ORDER BY nama_lantai');
   return $data->result_array();
 }

 function get_ruang()
 {
   $data = $this->db->query('SELECT * FROM tbl_ruang ORDER BY deskripsi');
   return $data->result_array();
 }

 function get_sub_ruang()
 {
   $data = $this->db->query('SELECT * FROM tbl_sub_ruang ORDER BY nama_sub_ruang');
   return $data->result_array();
 }

}