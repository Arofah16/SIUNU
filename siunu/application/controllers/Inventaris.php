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
        $idKampus = htmlentities($this->input->post('kampus', TRUE));
        $idGedung = htmlentities($this->input->post('gedung', TRUE));
        $idLantai = htmlentities($this->input->post('lantai', TRUE));
        $idRuang = htmlentities($this->input->post('ruang', TRUE));
        $idSubRuang = htmlentities($this->input->post('sub_ruang', TRUE));
        $gambar = $_FILES['gambar_inventaris'];
        if ($gambar=''){}else{
            $config['upload_path']  ='assets_style/image';
            $config['allowed_types'] = 'jpg|png|gif';
            // $config['file_name'] = $idBarang + uniqid();

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('gambar_inventaris')){
                echo "Upload Gagal";die();
            }else{
                $gambar=$this->upload->data('file_name');
            }
        }
        
        $data = array(
            'id_barang'=>$idBarang,
            'status_barang'=>$statusBarang,
            'tanggal_barang'=>$tanggalBarang,
            'kondisi_barang'=>$kondisiBarang,
            'kode_lokasi'=> $idKampus.$idGedung.$idLantai.$idRuang.$idSubRuang,
            'gambar_inventaris'=>$gambar,

        );
        $this->db->insert('tbl_barang_inventaris', $data);
        $data['barangs'] =  $this->db->get('tbl_barang')->result();
        var_dump($data);
        $this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
        <p> Data Inventaris Barang telah berhasil ditambahkan !</p></div></div>');
        redirect(base_url('inventaris'));

    }
    

    public function edit()
    {   
        $this->data['idbo'] = $this->session->userdata('ses_id');
        $this->data['barang'] = $this->M_Barang->get_table();
        $inventaris = $this->M_Inventaris->get_inventaris_id($this->uri->segment('3'));
        $this->data['inventaris'] = $inventaris;
        $this->data['kampus'] = $this->M_Lokasi->get_kampus();
        $this->data['gedung'] = $this->M_Lokasi->get_gedung();
        $this->data['lantai'] = $this->M_Lokasi->get_lantai();
        $this->data['ruang'] = $this->M_Lokasi->get_ruang();
        $this->data['sub_ruang'] = $this->M_Lokasi->get_sub_ruang();
        $barang_inventaris = $this->M_Inventaris->get_barang_inventaris($inventaris['id_inventaris']);
        $this->data['tanggal_barang'] =$barang_inventaris['tanggal_barang'];
        $this->data['kondisi_barang'] =$barang_inventaris['kondisi_barang'];
        $this->data['status_barang'] =$barang_inventaris['status_barang'];


        
        $this->data['title_web'] = 'Edit  Inventaris ';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('Inventaris/edit_inventaris',$this->data); 
        $this->load->view('footer_view',$this->data); 
    }
    
    public function get_edit_data()
    {
       $id_barang = $this->input->post('id_barang', TRUE);
       $data = $this->M_Inventaris->get_barang_id($id_barang)->result();
       return $data; 
    }
    
    public function delete($id)
    {
        $where = array('id_inventaris'=>$id);
        $this->M_Inventaris->Hapus_inventaris($where, 'tbl_barang_inventaris');
        redirect('inventaris/index');
    }
}