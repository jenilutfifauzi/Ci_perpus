<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Perpustakaan Online</title>
	<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
	<link rel="shortcut icon" href="<?php echo base_url();?>assets/img/book.ico">
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/scripts.js"></script>

	<style type="text/css">
      html, body {
        height: 100%;
        width: 100%;
        padding: 0;
        margin: 0;
      }

      #full-screen-background-image {
        z-index: -999;
        min-height: 100%;
        min-width: 1024px;
        width: 100%;
        height: auto;
        position: fixed;
        top: 0;
        left: 0;
      }

      #wrapper {
  	  width: 1000px;
      margin: auto;
      background-color:rgba(255,255,255,0.9);
      }

      a:link, a:visited, a:hover {
        color: blue;
      }

      a.to-top:link,
      a.to-top:visited, 
      a.to-top:hover {
        margin-top: 1000px;
        display: block;
        font-weight: bold;
        padding-bottom: 30px;
        font-size: 30px;
      }

    </style>
<style type="text/css">

.font1 {
    font-family: "Baskerville Old Face";
	color : black;
	font-size : 35pt;
}
.font2 {
    font-family: "Comic Sans MS";
	color : orange;
	font-size : 13pt;
}
.font3 {
    font-family: "Palace Script MT";
	color : red;
	font-size : 30pt;
}
.font4 {
    font-family: "Kristen ITC";
	color : blue;
	font-size : 13pt;
}
</style>
</head>
<body>

<div id="container">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<div class="page-header"><h3><img src="<?php echo base_url();?>/assets/img/book1.png" width="50" height="50" /> <a class="font1">Sistem Informasi Perpustakaan</a> <small><b class="font2"></b></small></h3></div>
				<ul class="nav nav-tabs">
					<li><a href="<?php echo base_url()."index.php/Guest/index";?>"><i class="icon-home"></i> Beranda</a></li>
					<li><a href="<?php echo base_url()."index.php/Guest/beranda_admin";?>"><i class="icon-user"></i> Admin</a></li>
					<li><a href="<?php echo base_url()."index.php/Guest/beranda_user";?>"><i class="icon-user"></i> User</a></li>
					<li><a href="<?php echo base_url()."index.php/Guest/beranda_about";?>"><i class="icon-briefcase"></i> About</a></li>
					
					<li class="dropdown pull-right">

						<a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-user"></i> Guest <strong class="caret"></strong></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url()."index.php/Guest/beranda_akun"?>"><i class="icon-th-list"></i> Buat Akun</a></li>
							<li><a href="<?php echo base_url()."index.php/Guest/beranda_intro"?>"></i> Introduction</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo base_url()."index.php/Guest/login"?>"><i class="icon-user"></i> Login</a></li>
													
						</ul>
					</li>

				</ul>
			</div>
		</div>
	</div>
<div id="content">
<div style="text-align: justify;"><b>Halaman User Perpustakaan</b><br>
<i>Di dalam menu ini seorang user perpustakaan bisa melakukan kegiatan-kegiatan yang bersangkutan dengan pelayanan aplikasi yaitu sebagai berikut : </i></div>
<ul>
<li>Melihat Profil Mahasiswa</li>
<li>Mengecek Status Peminjaman Buku</li>
<li>Membaca Buku Online</li>
<li>Download Kumpulan Ebook</li>
</ul>
<br><p align="center"><img src="<?php echo base_url();?>assets/img/book4.jpg" width="250" height="250"></br>
<br>

<div style="text-align: justify;"><b>Perhatian !!!</b><br>
<i>Seorang user harus mengikuti peraturuan perpustakaan berikut ini : </i>
<ol>
<li>User hanya diperbolehkan membuat satu akun menggunakan NPM sendiri yang terdaftar dalam lingkungan kampus.</li>
<li>Mahasiswa yang belum terdaftar "Guest" tidak diperbolehkan meminjam buku perpustakaan.</li>
<li>Untuk melakukan transaksi peminjaman atau pengembalianbuku bisa langsung memilih buku di perpustakaan lalu menghampiri admin untuk melakukan transaksi.</li>
<li>Mahasiswa yang terdaftar "User" bebas membaca buku online yang disediakan.</li>
<li>User bebas mendownload Ebook yang tersedia, boleh disebarluaskan namun tidak boleh dikomersilkan.</li>
<li>Mahasiswa harus tenang di dalam perpustkaan dan jangan membuat kegaduhan.</li>
<li>Bila ada user yang melanggar ketentuan harus siap untuk di delete akun perpustakaan.</li>
</ol>
</div>
</div>