<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller
{
	function __construct(){
	    parent::__construct();
	 	//validasi jika user belum login
        $this->data['CI'] =& get_instance();
        $this->load->helper(array('form', 'url'));
        $this->load->model('M_Barang');
        $this->load->model('M_Golongan');
        $this->load->model('M_Bidang');

    }  

    public function index()
    {	
       
        $this->data['idbo'] = $this->session->userdata('ses_id');
        $this->data['barang'] = $this->M_Barang->get_table('tbl_barang');
        $this->data['golbar'] = $this->M_Golongan->get_golongan();
        $this->data['bidang'] = $this->M_Bidang->get_bidang();

        
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

    public function delete($id)
    {
        $where = array('id_barang'=>$id);
        $data = $this->M_Barang->hapus_barang($where, 'tbl_barang');
        redirect('Barang/index');

    }

    public function add()
    {     
        $this->data['idbo'] = $this->session->userdata('ses_id');
        $this->data['golbar'] = $this->M_Golongan->fetch_Golongan();

        $golongan = htmlentities($this->input->post('golongan', TRUE));
        $bidang = htmlentities($this->input->post('bidang', TRUE));
        $nama_barang = htmlentities($this->input->post('nama_barang',TRUE));
        $jumlah_barang = htmlentities($this->input->post('jumlah_barang',TRUE));
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
        // var_dump($kode_barang);die;		
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
			$count = $this->M_Barang->CountTableId('tbl_barang','id_barang',$this->uri->segment('3'));
			if($count > 0)
			{			
				$this->data['barang'] = $this->M_Barang->get_tableid_edit('tbl_barang','id_barang',$this->uri->segment('3'));
                $this->data['golbar'] = $this->M_Golongan->get_golongan();
                $this->data['bidang'] = $this->M_Bidang->get_bidang();
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

    public function edit_aksi()
    {

        $post = $this->input->post();
        $kode_golongan = htmlentities($post['golongan']);
        $kode_bidang =  htmlentities($post['bidang']);
        $numer = str_pad(htmlentities($post['edit']), 4, "0", STR_PAD_LEFT);
        $kode_barang =$kode_golongan .$kode_bidang . $numer;
        $data = array(
            'kode_barang'=> $kode_barang, 
            'nama_barang' => htmlentities($post['nama_barang'])
        );

			$this->db->where('id_barang',htmlentities($post['edit']));
			$this->db->update('tbl_barang', $data);

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
					<p> Edit Barang Sukses !</p>
				</div></div>');
			redirect(base_url('barang')); 
		
    }
	
	public function detail($id_barang)
    {
        $this->data['idbo'] = $this->session->userdata('ses_id');
        $this->data['detail'] = $this->M_Barang->detail_barang($id_barang);
        // $this->data['detail'] = $this->M_Barang->get_tableid_edit('tbl_barang','id_barang',$this->uri->segment('3'));
        $this->data['title_web'] = 'Detail Barang';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('barang/Barang_detail', $this->data);
        $this->load->view('footer_view',$this->data);

    }
//     {	
// 		if($this->session->userdata('level') == 'Petugas'){
// 			if($this->uri->segment('3') == ''){ echo '<script>alert("halaman tidak ditemukan");window.location="'.base_url('user').'";</script>';}
// 			$this->data['idbo'] = $this->session->userdata('ses_id');
// 			$count = $this->M_Barang->CountTableId('tbl_barang','id_barang',$this->uri->segment('3'));
// 			if($count > 0)
// 			{			
// 				$this->data['barang'] = $this->M_Barang->detail_barang('tbl_barang','id_barang',$this->uri->segment('3'));
// 			}else{
// 				echo '<script>alert("USER TIDAK DITEMUKAN");window.location="'.base_url('user').'"</script>';
// 			}		
		
//         $this->data['title_web'] = 'Detail Barang';
//         $this->load->view('Barang/Barang_detail',$this->data);
//     }
// }
}