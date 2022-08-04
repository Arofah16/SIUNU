<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class  Kampus extends CI_Controller {
    function __construct(){
	    parent::__construct();
	 	//validasi jika user belum login
        $this->data['CI'] =& get_instance();
        $this->load->helper(array('form', 'url'));
        $this->load->model('M_Lokasi'); 	
    } 
    
    public function index(){
        $this->data['idbo'] = $this->session->userdata('ses_id');
        $this->data['kampus'] =  $this->M_Lokasi->get_kampus();

        $this->data['title_web'] = 'Data Lokasi Kampus';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('Kampus/kampus_view',$this->data); 
        $this->load->view('footer_view',$this->data);
    }
}