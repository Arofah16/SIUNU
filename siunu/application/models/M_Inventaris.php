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
          $select = "tbi.id_inventaris, tbi.kode_lokasi, tb.kode_barang, tb.nama_barang, tbi.status_barang, tbi.tanggal_barang, tbi.kondisi_barang, tbi.gambar_inventaris";
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

  public function get_inventaris_id($id_inventaris)
  {
    return $this->db->get_where('tbl_barang_inventaris', ['id_inventaris'=> $id_inventaris])
    ->row_array();
  }

public function fetch_barang_inventaris()
  {
    $this->db->order_by("nama barang", "ASC");
    $query = $this->db->get("tbl_golongan");
    return $query->result();
  }

  public function get_tableid_edit($table_name,$where,$id)
  {
    $this->db->select('id_barang, nama_barang, RIGHT(kode_barang,1) as kode_golongan, SUBSTRING(kode_barang,2,4) as kode_bidang', FALSE);
    $this->db->where($where,$id);
    $edit = $this->db->get($table_name);
    return $edit->row();
  }

  public function get_barang_inventaris($id_inventaris)
  {
    // echo ($id_inventaris);
    return $this->db->get_where('tbl_barang_inventaris', ['id_inventaris'=> $id_inventaris])
    ->row_array();
    
  }
  }  
?>