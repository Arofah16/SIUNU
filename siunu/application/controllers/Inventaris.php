<?php 
defined('BASEPATH') OR exit ('No direct script acces allowed');

class Inventaris extends CI_Controller {
    function __construct(){
        parent::__construct();
        //validasi jika user belum login

        $this->data['CI'] =& get_instance();
        $this->load->helper(array('form','url'));
        $this->load->model('M_Inventaris');
        $this->load->model('M_Barang');
        $this->load->model('M_Lokasi');

        // if($this->session->userdata('masuk_perpus') != TRUE){
        //     $URL=base_url('login');
        //     redirect($url);
        // }
    }

    public function index()
    {	
        $this->data['idbo'] = $this->session->userdata('ses_id');
        $this->data['inventaris_barang'] = $this->M_Inventaris->get_inventaris();

        
        $this->data['title_web'] = 'Data Inventaris Barang';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('Inventaris/inventaris_view',$this->data); 
        $this->load->view('footer_view',$this->data); 
    }


    public function tambah()
    {	
        $this->data['idbo'] = $this->session->userdata('ses_id');
        $this->data['barang'] = $this->M_Barang->get_table();
        $this->data['kampus'] = $this->M_Lokasi->fetch_lokasi();
        
        $this->data['title_web'] = 'Tambah Barang Inventaris ';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('Inventaris/tambah_inventaris_page',$this->data); 
        $this->load->view('footer_view',$this->data); 
    }

    public function tambah_aksi()
    
    {	
        $idBarang = htmlentities($this->input->post('id_barang',TRUE));
        $statusBarang = htmlentities($this->input->post('status_barang', TRUE));
        $tanggalBarang = htmlentities($this->input->post('tanggal_barang', TRUE));
        $kondisiBarang = htmlentities($this->input->post('kondisi_barang', TRUE));
        $idKampus = htmlentities($this->input->post('id_kampus', TRUE));
        $idGedung = htmlentities($this->input->post('gedung', TRUE));
        $idLantai = htmlentities($this->input->post('lantai', TRUE));
        $idRuang = htmlentities($this->input->post('ruang', TRUE));
        $idSubRuang = htmlentities($this->input->post('sub_ruang', TRUE));

        $data = array(
            'id_barang'=>$idBarang,
            'status_barang'=>$statusBarang,
            'tanggal_barang'=>$tanggalBarang,
            'kondisi_barang'=>$kondisiBarang,
            'kode_lokasi'=> $idKampus.$idGedung.$idLantai.$idRuang.$idSubRuang,

        );
        $this->db->insert('tbl_barang_inventaris', $data);

        $this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
        <p> Data Inventaris Barang telah berhasil ditambahkan !</p></div></div>');
        redirect(base_url('inventaris'));

    }

    public function delete($id)
    {
        $where = array('id_inventaris'=>$id);
        $this->M_Inventaris->Hapus_inventaris($where, 'tbl_barang_inventaris');
        redirect('inventaris/index');
    }

    public function edit($id)
    {
        $where = array ('id_inventaris', $id);
        $data['inventaris'] = $this->M_Inventaris->edit_data($where, 'tbl_barang_inventaris')->result();

        $this->data['title_web'] = 'Edit Barang Inventaris ';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('Inventaris/edit_inventaris',$this->data); 
        $this->load->view('footer_view',$this->data);


    }
}