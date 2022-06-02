<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruang extends CI_Controller {
	function __construct(){
	    parent::__construct();
        $this->data['CI'] =& get_instance();
        $this->load->helper(array('form', 'url'));
        $this->load->model('M_Ruang');
    }
public function index(){
        $this->data['idbo'] = $this->session->userdata('ses_id');
        $this->data['ruang'] = $this->M_Ruang->get_ruang('tbl_ruang');
        
        $this->data['title_web'] = 'Data Ruang ';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('Ruang/ruang_view',$this->data); 
        $this->load->view('footer_view',$this->data); 
}

}