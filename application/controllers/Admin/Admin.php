<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		//$this->load->library('Pdf');
	}
	
	 public function index()
	{
		$this->load->view('admin/home_admin');
	}

	public function logout(){
		$username = $SESSION['USERNAME'];
		$user = $this->db->get_where('user', array('username'=>$username))->row_array();
		session_destroy();
		echo"<script>
		alert('Anda Berhasil Logout');
		</script>";
		header('location:'.base_url().'index.php/Guest/index');
	}
	
	public function data_buku()
	{
		// $data = $this->bukumodel->GetBuku();
		// $this->load->view('admin/data_buku',array('data' => $data)); 
		$page = $this->uri->segment(4);
		$limit = 5;
		if(!$page):
			$offset = 0;
		else:
			$offset = $page;
		endif;

		$d['tot'] = $offset;
		$tot_hal = $this->db->get("buku");
		$config['base_url'] = base_url().'index.php/Admin/Admin/data_buku/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['firs_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Back';
		$this->pagination->initialize($config);
		$d["paginator"] = $this->pagination->create_links();
		$d['data_buku'] = $this->db->query("select * from buku limit ".$offset.",".$limit."");
		$this->load->view('admin/data_buku',$d);

	}	
	public function input_buku()
	{
		$this->load->view('admin/input_buku'); 
	}
	public function do_input_buku()
	{
		$id_buku = $_POST['id_buku'];
		$judul = $_POST['judul'];
		$terbit = $_POST['terbit'];
		$penerbit = $_POST['penerbit'];
		$halaman = $_POST['halaman'];
		$jumlah = $_POST['jumlah'];
		$peroleh = $_POST['peroleh'];
		$tanggal = $_POST['tanggal'];

		$data = array('id_buku' => $id_buku,'judul' => $judul,'terbit' => $terbit,'penerbit' => $penerbit
		,'halaman' => $halaman,'jumlah' => $jumlah,'peroleh' => $peroleh,'tanggal' => $tanggal);
		$res = $this->bukumodel->InsertData('buku',$data);
		if($res >=1){
			echo "<script>
			alert('Input Data Buku Berhasil');
			window.location.href='data_buku';
			</script>";
		}else{
			echo "<script>
			alert('Input Data Buku Gagal');
			window.location.href='data_buku';
			</script>";
		}

	}

	public function edit_buku($id_buku)
	{
		$buku= $this->bukumodel->GetBuku("where id_buku = '$id_buku'");
		$data= array(
			'id_buku' => $buku[0]['id_buku'],
			'judul' => $buku[0]['judul'],
			'terbit' => $buku[0]['terbit'],
			'penerbit' => $buku[0]['penerbit'],
			'halaman' => $buku[0]['halaman'],
			'jumlah' => $buku[0]['jumlah'],
			'peroleh' => $buku[0]['peroleh'],
			'tanggal' => $buku[0]['tanggal']);
		$this->load->view('admin/edit_buku',$data);
	}
	
	public function do_edit_buku()
	{
		$id_buku = $_POST['id_buku'];
		$judul = $_POST['judul'];
		$terbit = $_POST['terbit'];
		$penerbit = $_POST['penerbit'];
		$halaman = $_POST['halaman'];
		$jumlah = $_POST['jumlah'];
		$peroleh = $_POST['peroleh'];
		$tanggal = $_POST['tanggal'];

		$data = array('id_buku' => $id_buku,'judul' => $judul,'terbit' => $terbit,'penerbit' => $penerbit
		,'halaman' => $halaman,'jumlah' => $jumlah,'peroleh' => $peroleh,'tanggal' => $tanggal);
		$where = array('id_buku' => $id_buku);
		$res = $this->bukumodel->UpdateData('buku',$data,$where);
		if($res >=1){
			echo "<script>
			alert('Update Data Buku Berhasil');
			window.location.href='data_buku';
			</script>";
		}else{
			echo "<script>
			alert('Update Data Buku Gagal');
			window.location.href='data_buku';
			</script>";
		}
	}

	public function hapus_buku($id_buku)
	{
		$where = array('id_buku' => $id_buku);
		$res = $this->bukumodel->DeleteData('buku',$where);
		if($res >=1){
			$this->session->set_flashdata('pesan','Delete Data'.$id_buku.'Berhasil');
			redirect('Admin/Admin/data_buku');
		}else{
			echo "<h3> Delete Data Buku Gagal</h3>";
		}
	}
	public function cari()
	{
		if($this->input->post("cari")=="")
		{
			$kata =  $this->session->userdata('kata');
		}
		else
		{
			$sess_data['kata'] = $this->input->post("cari");
			$this->session->set_userdata($sess_data);
			$kata = $this->session->userdata('kata');
		}
		$page = $this->uri->segment(4);
		$limit = 5;
		if(!$page):
			$offset = 0;
		else:
			$offset = $page;
		endif;

		$d['tot'] = $offset;
		$tot_hal = $this->db->query("select * from buku where judul like '%".$kata."%' ");
		$config['base_url'] = base_url().'index.php/Admin/Admin/data_buku/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['firs_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Back';
		$this->pagination->initialize($config);
		$d["paginator"] = $this->pagination->create_links();
		$d['data_buku'] = $this->db->query("select * from buku where judul like '%".$kata."%' limit ".$offset.",".$limit."");
		$this->load->view('admin/data_buku',$d);
	}

	//Data Mahasiswa
	public function data_user()
	{
		// $this->load->view('admin/data_user');
		$page = $this->uri->segment(4);
		$limit = 5;
		if(!$page):
			$offset = 0;
		else:
			$offset = $page;
		endif;

		$d['tot'] = $offset;
		$tot_hal = $this->db->get("user");
		$config['base_url'] = base_url().'index.php/Admin/Admin/data_user/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['firs_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Back';
		$this->pagination->initialize($config);
		$d["paginator"] = $this->pagination->create_links();
		$d['data_user'] = $this->db->query("select * from user where level='user' limit ".$offset.",".$limit."");
		$this->load->view('admin/data_user',$d);

	}
	public function cari_user()
	{
		if($this->input->post("cari_user")=="")
		{
			$kata =  $this->session->userdata('kata');
		}
		else
		{
			$sess_data['kata'] = $this->input->post("cari_user");
			$this->session->set_userdata($sess_data);
			$kata = $this->session->userdata('kata');
		}
		$page = $this->uri->segment(4);
		$limit = 5;
		if(!$page):
			$offset = 0;
		else:
			$offset = $page;
		endif;

		$d['tot'] = $offset;
		$tot_hal = $this->db->query("select * from user where nama like '%".$kata."%' ");
		$config['base_url'] = base_url().'index.php/Admin/Admin/data_user/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['firs_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Back';
		$this->pagination->initialize($config);
		$d["paginator"] = $this->pagination->create_links();
		$d['data_user'] = $this->db->query("select * from user where nama like '%".$kata."%' limit ".$offset.",".$limit."");
		$this->load->view('admin/data_user',$d);
		
	}
	//akhir  dari data mahasiswa

	//mulai data admin
	public function data_admin()
	{
		// $this->load->view('admin/data_user');
		$page = $this->uri->segment(4);
		$limit = 5;
		if(!$page):
			$offset = 0;
		else:
			$offset = $page;
		endif;

		$d['tot'] = $offset;
		$tot_hal = $this->db->get("user");
		$config['base_url'] = base_url().'index.php/Admin/Admin/data_admin/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['firs_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Back';
		$this->pagination->initialize($config);
		$d["paginator"] = $this->pagination->create_links();
		$d['data_user'] = $this->db->query("select * from user where level='admin' limit ".$offset.",".$limit."");
		$this->load->view('admin/data_admin',$d);

	}
	//buku
	public function print_buku()
	{
		$d['data_buku'] = $this->db->query("select * from buku");
		$this->load->view('admin/laporan_buku',$d);
	}
	public function pdf_buku()
	{
		$d['data_buku'] = $this->db->query("select * from buku");
		$this->load->view('admin/cetak_buku',$d);
	}
	public function excel_buku()
	{
		$d['data_buku'] = $this->db->query("select * from buku");
		$this->load->view('admin/excel_buku',$d);
	}
	//mahasiswa
	public function print_mhs()
	{
		$d['data_user'] = $this->db->query("select * from user where level='user'");
		$this->load->view('admin/laporan_mhs',$d);
	}
	public function pdf_mhs()
	{
		$d['data_user'] = $this->db->query("select * from user where level='user'");
		$this->load->view('admin/cetak_mhs',$d);
	}
	public function excel_mhs()
	{
		$d['data_user'] = $this->db->query("select * from user where level='user'");
		$this->load->view('admin/excel_mhs',$d);
	}
	//admin
	public function print_admin()
	{
		$d['data_admin'] = $this->db->query("select * from user where level='admin'");
		$this->load->view('admin/laporan_admin',$d);
	}
	public function pdf_admin()
	{
		$d['data_admin'] = $this->db->query("select * from user where level='admin'");
		$this->load->view('admin/cetak_admin',$d);
	}
	public function excel_admin()
	{
		$d['data_admin'] = $this->db->query("select * from user where level='admin'");
		$this->load->view('admin/excel_admin',$d);
	}
}