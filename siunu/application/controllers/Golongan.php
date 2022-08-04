<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Golongan extends CI_Controller {
	function __construct(){
	    parent::__construct();
	 	//validasi jika user belum login
        $this->data['CI'] =& get_instance();
        $this->load->helper(array('form', 'url'));
        $this->load->model('M_Golongan');
     	
    }  

    public function index()
    {	
        $this->data['idbo'] = $this->session->userdata('ses_id');
        $this->data['golongan_barang'] = $this->db->query("SELECT * FROM tbl_golongan ORDER BY kode_golongan ASC");
        
        $this->data['title_web'] = 'Data Golongan Barang ';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('Golongan/golongan_view',$this->data); 
        $this->load->view('footer_view',$this->data); 
    }

    public function tambah()
    {	
        $this->data['idbo'] = $this->session->userdata('ses_id');
    
        
        $this->data['title_web'] = 'Tambah Golongan ';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('Golongan/golongan_view',$this->data);
        $this->load->view('footer_view',$this->data);
    }
    function fetch_golongan()
    {
         if($this->input->post('kode_golongan'))
         {
            echo $this->M_Golongan->fetch_Golongan($this->input->post('kode_golongan'));
         }
    }
   

}