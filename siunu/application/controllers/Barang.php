<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
	function __construct(){
	    parent::__construct();
	 	//validasi jika user belum login
        $this->data['CI'] =& get_instance();
        $this->load->helper(array('form', 'url'));
        $this->load->model('M_Barang');
        // $this->load->model('M_Merk');
        $this->load->model('M_Golongan');
        $this->load->model('M_Bidang');


     	
        // if($this->session->userdata('masuk_perpus') != TRUE){
		// 	$url=base_url('login');
		// 	redirect($url);
		// }
    }  

    public function index()
    {	
        $this->data['idbo'] = $this->session->userdata('ses_id');
        $this->data['barang'] = $this->M_Barang->get_table('tbl_barang');
        
        $this->data['title_web'] = 'Data Barang ';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('Barang/barang_view',$this->data); 
        $this->load->view('footer_view',$this->data); 
    }

    public function tambah()
    {	
        $this->data['idbo'] = $this->session->userdata('ses_id');
        $this->data['golbar'] = $this->M_Golongan->get_golongan();
        $this->data['bidang'] = $this->M_Bidang->get_bidang();
       
        $this->data['title_web'] = 'Tambah Barang ';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('Barang/tambah_barang_view',$this->data);
        $this->load->view('footer_view',$this->data);
    }

    public function fetch_bidang()
    {
        if($this->input->post('kode_golongan'))
        {
            $kode_golongan = $this->input->post('kode_golongan');
            echo $this->M_Bidang->get_bidang_by_kode_golongan($kode_golongan);
        }
    }

    public function delete()
    {
        $this->data['idbo'] = $this->session->userdata('ses_id');
        $this->data['barang'] = $this->M_Barang->delete_table('tbl_barang');
        $this->data['golbar'] = $this->M_Golongan->get_golongan();
        // $this->data['merk'] = $this->M_Merk->get_merk();
        $this->data['golbar'] = $this->M_Golongan->get_golongan();

        
        $this->data['title_web'] = 'Hapus Barang ';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('Barang/tambah_barang_view',$this->data);
        $this->load->view('footer_view',$this->data);

    }

    public function add()
    {
		// format tabel / kode baru 3 huru p / id tabel / order by limit ngambil data terakhir
        
        $nama_barang = htmlentities($this->input->post('nama_barang',TRUE));
        // $merk_barang = htmlentities($this->input->post('merk_barang',TRUE));
        $jumlah_barang = htmlentities($this->input->post('jumlah_barang',TRUE));
        $golongan = htmlentities($this->input->post('golongan', TRUE));
        $bidang = htmlentities($this->input->post('bidang', TRUE));
        $gambar = $_FILES['gambar'];
        if ($gambar=''){}else{
            $config['upload_path']  ='assets_style/image';
            $config['allowed_types'] = 'jpg|png|gif';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('gambar')){
                echo "Upload Gagal";die();
            }else{
                $gambar=$this->upload->data('file_name');
            }
        }
        
        $kode_barang = $this->M_Barang->buat_kode_baru($golongan, $bidang); 		
		$dd = $this->db->query("SELECT * FROM tbl_barang WHERE kode_barang = '$kode_barang' ");
		if($dd->num_rows() > 0)
		{
			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
			<p> Gagal Update Data Barang : '.$kode_barang.' !, Username / Email Anda Sudah Terpakai</p>
			</div></div>');
			redirect(base_url('barang/tambah')); 
		}else{
            // setting konfigurasi upload
            $nmfile = "barang_".time();
            $config['upload_path'] = './assets_style/image/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['file_name'] = $nmfile;
            // load library upload
            $this->load->library('upload', $config);
            // upload gambar 1
            $this->upload->do_upload('gambar');
            $result1 = $this->upload->data();
            $result = array('gambar'=>$result1);
            $data1 = array('upload_data' => $this->upload->data());
            $data = array(
                'kode_barang'=>$kode_barang,
                'nama_barang'=>$nama_barang,
                'gambar'=>$gambar,
                'jumlah_barang'=> $jumlah_barang,
                // 'kode_merk'=>$merk_barang,
            );
			$this->db->insert('tbl_barang',$data);
			
            $this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
            <p> Data Barang telah berhasil ditambahkan !</p>
            </div></div>');
			redirect(base_url('barang'));
		}    
      
    }

    public function edit()
    {	
		if($this->session->userdata('level') == 'Petugas'){
			if($this->uri->segment('3') == ''){ echo '<script>alert("halaman tidak ditemukan");window.location="'.base_url('user').'";</script>';}
			$this->data['idbo'] = $this->session->userdata('ses_id');
			$count = $this->M_Barang->CountTableId('tbl_login','id_login',$this->uri->segment('3'));
			if($count > 0)
			{			
				$this->data['barang'] = $this->M_Barang->get_tableid_edit('tbl_login','id_login',$this->uri->segment('3'));
			}else{
				echo '<script>alert("USER TIDAK DITEMUKAN");window.location="'.base_url('barang').'"</script>';
			}
			
		}elseif($this->session->userdata('level') == 'Anggota'){
			$this->data['idbo'] = $this->session->userdata('ses_id');
			$count = $this->M_Barang->CountTableId('tbl_login','id_login',$this->uri->segment('3'));
			if($count > 0)
			{			
				$this->data['barang'] = $this->M_Admin->get_tableid_edit('tbl_login','id_login',$this->session->userdata('ses_id'));
			}else{
				echo '<script>alert("USER TIDAK DITEMUKAN");window.location="'.base_url('barang').'"</script>';
			}
		}
        $this->data['title_web'] = 'Edit Barang ';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('barang/edit_barang_view',$this->data);
        $this->load->view('footer_view',$this->data);
	}
	
	public function detail()
    {	
		if($this->session->userdata('level') == 'Petugas'){
			if($this->uri->segment('3') == ''){ echo '<script>alert("halaman tidak ditemukan");window.location="'.base_url('user').'";</script>';}
			$this->data['idbo'] = $this->session->userdata('ses_id');
			$count = $this->M_Admin->CountTableId('tbl_login','id_login',$this->uri->segment('3'));
			if($count > 0)
			{			
				$this->data['user'] = $this->M_Admin->get_tableid_edit('tbl_login','id_login',$this->uri->segment('3'));
			}else{
				echo '<script>alert("USER TIDAK DITEMUKAN");window.location="'.base_url('user').'"</script>';
			}		
		}elseif($this->session->userdata('level') == 'Anggota'){
			$this->data['idbo'] = $this->session->userdata('ses_id');
			$count = $this->M_Admin->CountTableId('tbl_login','id_login',$this->session->userdata('ses_id'));
			if($count > 0)
			{			
				$this->data['user'] = $this->M_Admin->get_tableid_edit('tbl_login','id_login',$this->session->userdata('ses_id'));
			}else{
				echo '<script>alert("USER TIDAK DITEMUKAN");window.location="'.base_url('user').'"</script>';
			}
		}
        $this->data['title_web'] = 'Print Kartu Anggota ';
        $this->load->view('user/detail',$this->data);
    }
}