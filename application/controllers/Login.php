<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$cnt = $this->db->get_where('user', array('username' => $username, 'password'=> $password))->num_rows();
		$user = $this->db->get_where('user', array('username' => $username))->row_array();
		$this->username = $username;

		if ($cnt>0 && $user['level']=='admin')
		{
			//array_push ($user);
			$_SESSION['username'] = $user['username'];
			$_SESSION['nama'] = $user['nama'];
			$_SESSION['level'] = $user['level'];
			echo "<script>
			alert('Login User Administrator Berhasil');

			</script>";
			header('location:'.base_url().'index.php/Admin/Admin/index');
		}

		else if ($cnt>0 && $user['level']=='user')
		{
			//array_push ($user);
			$_SESSION['username'] = $user['username'];
			$_SESSION['nama'] = $user['nama'];
			$_SESSION['level'] = $user['level'];
			echo "<script>
			alert('Login User Berhasil');

			</script>";
			header('location:'.base_url().'index.php/User/User/index');
		}
		else{
			echo "<script>
			alert('Login User Gagal');
			</script>";
			header('location:'.base_url().'index.php/Guest/beranda_login');
		}
	}
}

