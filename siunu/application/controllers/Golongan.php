<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Golongan extends CI_Controller {
	function __construct(){
	    parent::__construct();
	 	//validasi jika user belum login
        $this->data['CI'] =& get_instance();
        $this->load->helper(array('form', 'url'));
        $this->load->model('M_Golongan');
     	
        // if($this->session->userdata('masuk_perpus') != TRUE){
		// 	$url=base_url('login');
		// 	redirect($url);
		// }
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
        $this->data['user'] = $this->M_Admin->get_table('tbl_login');
        
        $this->data['title_web'] = 'Tambah Golongan ';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('Golongan/golongan_view',$this->data);
        $this->load->view('footer_view',$this->data);
    }


    // public function add()
    // {
	// 	// format tabel / kode baru 3 hurup / id tabel / order by limit ngambil data terakhir
	// 	$id = $this->M_Admin->buat_kode('tbl_login','AG','id_login','ORDER BY id_login DESC LIMIT 1'); 
    //     $nama = htmlentities($this->input->post('nama',TRUE));
    //     $user = htmlentities($this->input->post('user',TRUE));
    //     $pass = md5(htmlentities($this->input->post('pass',TRUE)));
    //     $level = htmlentities($this->input->post('level',TRUE));
    //     $jenkel = htmlentities($this->input->post('jenkel',TRUE));
    //     $telepon = htmlentities($this->input->post('telepon',TRUE));
    //     $status = htmlentities($this->input->post('status',TRUE));
    //     $alamat = htmlentities($this->input->post('alamat',TRUE));
	// 	// $email = $_POST['email'];
		
	// 	$dd = $this->db->query("SELECT * FROM tbl_login WHERE user = '$user' ");
	// 	if($dd->num_rows() > 0)
	// 	{
	// 		$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
	// 		<p> Gagal Update User : '.$nama.' !, Username / Email Anda Sudah Terpakai</p>
	// 		</div></div>');
	// 		redirect(base_url('user/tambah')); 
	// 	}else{
    //         // setting konfigurasi upload
    //         $nmfile = "user_".time();
    //         $config['upload_path'] = './assets_style/image/';
    //         $config['allowed_types'] = 'gif|jpg|jpeg|png';
    //         $config['file_name'] = $nmfile;
    //         // load library upload
    //         $this->load->library('upload', $config);
    //         // upload gambar 1
    //         $this->upload->do_upload('gambar');
    //         $result1 = $this->upload->data();
    //         $result = array('gambar'=>$result1);
    //         $data1 = array('upload_data' => $this->upload->data());
    //         $data = array(
	// 			'anggota_id' => $id,
    //             'nama'=>$nama,
    //             'user'=>$user,
    //             'pass'=>$pass,
    //             'level'=>$level,
    //             // 'tempat_lahir'=>$_POST['tempat_lahir'],
    //             // 'tgl_lahir'=>$_POST['tgl_lahir'],
    //             'level'=>$level,
    //             // 'email'=>$_POST['email'],
    //             'telepon'=>$telepon,
    //             'foto'=>$data1['upload_data']['file_name'],
    //             'jenkel'=>$jenkel,
    //             'alamat'=>$alamat,
    //             'tgl_bergabung'=>date('Y-m-d')
    //         );
	// 		$this->db->insert('tbl_login',$data);
			
    //         $this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
    //         <p> Daftar User telah berhasil !</p>
    //         </div></div>');
	// 		redirect(base_url('user'));
	// 	}    
      
    // }

    // public function edit()
    // {	
	// 	if($this->session->userdata('level') == 'Petugas'){
	// 		if($this->uri->segment('3') == ''){ echo '<script>alert("halaman tidak ditemukan");window.location="'.base_url('user').'";</script>';}
	// 		$this->data['idbo'] = $this->session->userdata('ses_id');
	// 		$count = $this->M_Admin->CountTableId('tbl_login','id_login',$this->uri->segment('3'));
	// 		if($count > 0)
	// 		{			
	// 			$this->data['user'] = $this->M_Admin->get_tableid_edit('tbl_login','id_login',$this->uri->segment('3'));
	// 		}else{
	// 			echo '<script>alert("USER TIDAK DITEMUKAN");window.location="'.base_url('user').'"</script>';
	// 		}
			
	// 	}elseif($this->session->userdata('level') == 'Anggota'){
	// 		$this->data['idbo'] = $this->session->userdata('ses_id');
	// 		$count = $this->M_Admin->CountTableId('tbl_login','id_login',$this->uri->segment('3'));
	// 		if($count > 0)
	// 		{			
	// 			$this->data['user'] = $this->M_Admin->get_tableid_edit('tbl_login','id_login',$this->session->userdata('ses_id'));
	// 		}else{
	// 			echo '<script>alert("USER TIDAK DITEMUKAN");window.location="'.base_url('user').'"</script>';
	// 		}
	// 	}
    //     $this->data['title_web'] = 'Edit User ';
    //     $this->load->view('header_view',$this->data);
    //     $this->load->view('sidebar_view',$this->data);
    //     $this->load->view('user/edit_view',$this->data);
    //     $this->load->view('footer_view',$this->data);
	// }
	
	// public function detail()
    // {	
	// 	if($this->session->userdata('level') == 'Petugas'){
	// 		if($this->uri->segment('3') == ''){ echo '<script>alert("halaman tidak ditemukan");window.location="'.base_url('user').'";</script>';}
	// 		$this->data['idbo'] = $this->session->userdata('ses_id');
	// 		$count = $this->M_Admin->CountTableId('tbl_login','id_login',$this->uri->segment('3'));
	// 		if($count > 0)
	// 		{			
	// 			$this->data['user'] = $this->M_Admin->get_tableid_edit('tbl_login','id_login',$this->uri->segment('3'));
	// 		}else{
	// 			echo '<script>alert("USER TIDAK DITEMUKAN");window.location="'.base_url('user').'"</script>';
	// 		}		
	// 	}elseif($this->session->userdata('level') == 'Anggota'){
	// 		$this->data['idbo'] = $this->session->userdata('ses_id');
	// 		$count = $this->M_Admin->CountTableId('tbl_login','id_login',$this->session->userdata('ses_id'));
	// 		if($count > 0)
	// 		{			
	// 			$this->data['user'] = $this->M_Admin->get_tableid_edit('tbl_login','id_login',$this->session->userdata('ses_id'));
	// 		}else{
	// 			echo '<script>alert("USER TIDAK DITEMUKAN");window.location="'.base_url('user').'"</script>';
	// 		}
	// 	}
    //     $this->data['title_web'] = 'Print Kartu Anggota ';
    //     $this->load->view('user/detail',$this->data);
    // }
}