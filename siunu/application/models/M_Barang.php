<?php

use phpDocumentor\Reflection\DocBlock\Tags\Return_;

 if(! defined('BASEPATH')) exit('No direct script acess allowed');

class M_Barang extends CI_Model
{
  function __construct()
  {
	 parent::__construct();
	 //validasi jika user belum login
	 }

  //  function get_join(){
  //   SELECT * FROM tbl_barang INNER JOIN tbl_bidang_barang 
  //   ON tbl_barang.kode_barang = tbl_bidang_barang.kode_barang
  //  }

  public function hapus_barang($where,$table)
  {
    $this->db->where($where);
    $this->db->delete($table);
  }

   function get_table()
          {
            $this->db->select('*');
            $this->db->from('tbl_barang');
            return $this->db->get()->result_array();
          }
   
   function get_tableid($table_name,$where,$id)
   {
     $this->db->where($where,$id);
     $edit = $this->db->get($table_name);
     return $edit->result_array();
   }

   function get_tableid_edit($table_name,$where,$id)
   {
    $this->db->select('id_barang, nama_barang, RIGHT(kode_barang,1) as kode_golongan, SUBSTRING(kode_barang,2,2) as kode_bidang', FALSE);
     $this->db->where($where,$id);
     $edit = $this->db->get($table_name);
     return $edit->row();
   }

   function add_multiple($table,$data = array())
  {
      $total_array = count($data);

      if($total_array != 0)
      {
      $this->db->insert_batch($table, $data);
      }
  }

   function insertTable($table_name,$data)
   {
     $tambah = $this->db->insert($table_name,$data);
     return $tambah;
   }

   function LastinsertId($table_name,$data)
   {
     $this->db->insert($table_name,$data);
     $insert_id = $this->db->insert_id();
     return $insert_id;
   }

   function update_table($table_name,$where,$id,$data)
   {
     $this->db->where($where,$id);
     $update = $this->db->update($table_name,$data);
     return $update;
   }

   function delete_table($table_name,$where,$id)
   {
     $this->db->where($where,$id);
     $hapus = $this->db->delete($table_name);
     return $hapus;
   }

   function delete_table_multiple($table_name,$where,$id)
   {
      if (!empty($id)) {
         $this->db->where_in($where,$id);
         $hapus = $this->db->delete($table_name);
         return $hapus;
      }
   }

   function edit_table($table_name,$where,$id)
   {
     $this->db->where($where,$id);
     $edit = $this->db->get($table_name);
     return $edit->row();
   }

   function CountTable($table_name)
   {
     $Count = $this->db->get($table_name);
     return $Count->num_rows();
   }

   function CountTableId($table_name,$where,$id)
   {
     $this->db->where($where,$id);
     $Count = $this->db->get($table_name);
     return $Count->num_rows();
   }

   function SelectTable($table_name,$query,$id,$orderby)
   {
       $this->db->select($query, FALSE); // select('RIGHT(user.id_odojers,4) as kode', FALSE);
       $this->db->order_by($id,$orderby);
       $query = $this->db->get($table_name); // cek dulu apakah ada sudah ada kode di tabel.
       return $query;
   }

   function SelectTableSQL($query)
   {
       $row = $this->db->query($query);
       return $row;
   }

   function subquerry ()
   {
    $this->db->query("SELECT tbl_barang.nama_barang, tbl_barang_inventaris.id_barang 
    FROM tbl_barang
    LEFT JOIN tbl_barang_inventaris
    ON tbl_barang.id_barang = tbl_barang_inventaris.id_barang
    ORDER BY tbl_barang.nama_barang;
    ");
   }

  function get_user($user)
  {
    $this->db->where('id_login',$user);
    $get_user = $this->db->get('tbl_login');
    return $get_user->row();
	}
  
//  membuat kode dalam tabel

	public function buat_kode($table_name,$idkode,$orderbylimit)
  {
      $query = $this->db->query("select * from $table_name $orderbylimit"); // cek dulu apakah ada sudah ada kode di tabel.
      
		  if($query->num_rows() > 0){
        $hasil = $query->row();
        $kd = $hasil->id_barang;
        $cd = $kd;
        $kode = $cd + 1;
        $kodejadi = "000".$kode.".".$idkode;    
        $kdj = $kodejadi;
		  }else {
        $kode = 0+1;
        $kodejadi = "000".$kode.".".$idkode;    
        $kdj = $kodejadi;
      }
		  return $kdj;
  }

  public function buat_kode_baru($kode_golongan, $kode_bidang)
  {
    $this->db->select('*', FALSE);
    $this->db->order_by('id_barang', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get('tbl_barang');
    
    $kode = 1;
    if($query->num_rows() <> 0){
      $kode = intval($query->row()->id_barang) + 1;
    }
    $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);

    return $kode_golongan. $kode_bidang. $batas;
  }

  public function buat_kode_join($table_name,$kodeawal,$idkode)
  {
      $query = $this->db->query($table_name); // cek dulu apakah ada sudah ada kode di tabel.
		  if($query->num_rows() > 0){
        //jika kode ternyata sudah ada.
        $hasil = $query->row();
        $kd = $hasil->$idkode;
        $cd = $kd;
        $kode = $cd + 1;
        $kodejadi = $kodeawal."00".$kode;    // hasilnya CUS-0001 dst.
        $kdj = $kodejadi;
		  }else {
        //jika kode belum ada
        $kode = 0+1;
        $kodejadi = $kodeawal."00".$kode;    // hasilnya CUS-0001 dst.
        $kdj = $kodejadi;
      }
		  return $kdj;
  }
  
  public function acak($panjang)
  {
      $karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
      $string = '';
      for ($i = 0; $i < $panjang; $i++) {
        $pos = rand(0, strlen($karakter)-1);
        $string .= $karakter[$pos];
      }
      return $string;
  }
  public function detail_barang($id_barang = NULL)
  {
    $this->db->select('id_barang, nama_barang, (SELECT nama_golongan FROM tbl_golongan WHERE kode_golongan=RIGHT(kode_barang,1) LIMIT 1) AS nama_golongan, (SELECT nama_bidang FROM tbl_bidang_barang WHERE kode_bidang=SUBSTRING(kode_barang,2,2) LIMIT 1) as nama_bidang', FALSE);
    
   $query= $this->db->get_where('tbl_barang', array('id_barang'=> $id_barang))->row();
   return $query;
  } 
}


?>