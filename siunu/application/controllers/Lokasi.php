<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lokasi extends CI_Controller {
 
 public function __construct()
 {
  parent::__construct();
  $this->load->model('M_Lokasi');
 }

 function fetch_gedung()
 {
      if($this->input->post('id_kampus'))
      {
         echo $this->M_Lokasi->fetch_gedung($this->input->post('id_kampus'));
      }
 }

 function fetch_lantai()
 {
      if($this->input->post('id_gedung'))
      {
         echo $this->M_Lokasi->fetch_lantai($this->input->post('id_gedung'));
      }
 }
 
 function fetch_ruang()
 {
      if($this->input->post('id_lantai'))
      {
         echo $this->M_Lokasi->fetch_ruang($this->input->post('id_lantai'));
      }
 }

 function fetch_sub_ruang()
 {
      if($this->input->post('id_ruang'))
      {
         echo $this->M_Lokasi->fetch_sub_ruang($this->input->post('id_ruang'));
      }
 } 
}