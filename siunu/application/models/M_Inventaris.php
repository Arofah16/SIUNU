<?php

use phpDocumentor\Reflection\DocBlock\Tags\Return_;

 if(! defined('BASEPATH')) exit('No direct script acess allowed');

class M_Inventaris extends CI_Model
{
  function __construct()
  {
	 parent::__construct();
	 //validasi jika user belum login
  }
 public function get_inventaris()
 
        {
          $select = "tbi.id_inventaris, tbi.kode_lokasi, tb.kode_barang, tb.nama_barang, tbi.status_barang, tbi.tanggal_barang, tbi.kondisi_barang";
          $query = $this->db->select($select)
            ->from('tbl_barang_inventaris tbi')
            ->join('tbl_barang tb','tb.id_barang = tbi.id_barang','left')
            ->get();
            return $query->result_array();
        }

  public function Hapus_inventaris($where, $table)
  {
      $this->db->where($where);
      $this->db->delete($table);
  }

  public function get_id($id)
  {
    return $this->db->get_where('tbl_barang_inventaris', ['id_inventaris'=> $id])
    ->row_array();
  }
  }  
?>