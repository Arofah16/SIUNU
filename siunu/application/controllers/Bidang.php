<?php 
defined('BASEPATH') OR exit ('No direct script acces allowed');

class Bidang extends CI_Controller {
    function __construct(){
        parent::__construct();
        //validasi jika user belum login

        $this->data['CI'] =& get_instance();
        $this->load->helper(array('form','url'));
        $this->load->model('M_Bidang');


        // if($this->session->userdata('masuk_perpus') != TRUE){
        //     $URL=base_url('login');
        //     redirect($url);
        // }
    }

    public function index()
    {	
        $this->data['idbo'] = $this->session->userdata('ses_id');
        $this->data['user'] = $this->M_Bidang->get_bidang_by_kode_golongan('tbl_login');
        $this->data['bidang_barang'] = $this->db->query("SELECT * FROM tbl_bidang_barang ORDER BY kode_bidang ASC");
        
        $this->data['title_web'] = 'Data Bidang Barang ';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('bidang/bidang_view',$this->data); 
        $this->load->view('footer_view',$this->data); 
    }
}
?>