<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller {

	public function index()
	{
		$this->load->view('index');
	}

	public function beranda_admin()
	{
		$this->load->view('home_admin');
	}

	public function beranda_user()
	{
		$this->load->view('home_user');
	}

	public function beranda_about()
	{
		$this->load->view('home_about');
	}

	public function beranda_akun()
	{
		$this->load->view('input_guest');
	}

	public function entry_akun()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$nama = $_POST['nama'];
		$jk = $_POST['jk'];
		$tempat = $_POST['tempat'];
		$lahir = $_POST['lahir'];
		$fakultas = $_POST['fakultas'];
		$jurusan = $_POST['jurusan'];
		$tahun = $_POST['tahun'];
		$alamat = $_POST['alamat'];
		$email = $_POST['email'];
		$hp = $_POST['hp'];
		$foto = '-';
		$level = 'user';

		$data = array('username'=> $username, 'password'=>$password, 'nama'=>$nama, 'jk'=>$jk, 'tempat'=>$tempat, 'lahir'=>$lahir,
				      'fakultas'=>$fakultas, 'jurusan'=>$jurusan, 'tahun'=>$tahun, 'alamat'=>$alamat, 'email'=>$email, 'hp'=>$hp, 'foto'=>$foto, 'level'=>$level);
		$res=$this->guestmodel->RegistrasiData('user',$data);
		if($res>=1){
			echo "<script>
			alert('Registrasi User Berhasil');
			window.location.href='index';
			</script>";
		
		} else {
			echo "<script>
			alert('Registrasi User Gagal');
			window.location.href='index';
			</script>";
		}


	}
    
	public function beranda_intro()
	{
		$this->load->view('intro');
	}

	public function login()
	{
		$this->load->view('login');
	}
}
