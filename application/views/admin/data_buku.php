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
	@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}
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
				<div class="page-header"><h3><img src="<?php echo base_url();?>assets/img/book1.png" width="50" height="50" /> <a class="font1">Sistem Informasi Perpustakaan</a></h3></div>
				<ul class="nav nav-tabs">
					<li><a href="<?php echo base_url()."index.php/Admin/Admin/index";?>"><i class="icon-home"></i> Home</a></li>
					<?php if(isset($_SESSION['level'])){?>
					<li><a href="<?php echo base_url()."index.php/Admin/Admin/data_admin";?>"><i class="icon-leaf"></i> Data Admin</a></li>
					<li><a href="<?php echo base_url()."index.php/Admin/Admin/data_user";?>"><i class="icon-book"></i> Data Mahasiswa</a></li>
					<li><a href="<?php echo base_url()."index.php/Admin/Admin/transaksi";?>"><i class="icon-th-large"></i> Data Transaksi</a></li>
					<li><a href="<?php echo base_url()."index.php/Admin/Admin/kas";?>"><i class="icon-barcode"></i> Data Kas</a></li>
					<li><a href="<?php echo base_url()."index.php/Admin/Admin/data_buku";?>"><i class="icon-tasks"></i> Data Buku</a></li>
					<li><a href="<?php echo base_url()."index.php/Admin/Admin/ebook";?>"><i class="icon-folder-open"></i> Ebook</a></li>
					<li><a href="<?php echo base_url()."index.php/Admin/Admin/about";?>"><i class="icon-briefcase"></i> About</a></li>
					<?php }?>
					<li class="dropdown pull-right">
					
					<?php if (isset($_SESSION['nama'])):?>
						<a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-user"></i> <?php echo $_SESSION['nama'];?> <strong class="caret"></strong></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url()."index.php/Admin/Admin/Logout/";?>"><i class="icon-off"></i> Logout</a></li>
							<?php else:?>
						<a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-user"></i> Guest <strong class="caret"></strong></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url()."index.php/Guest/beranda_akun/";?>"><i class="icon-th-list"></i> Buat Akun Perpus</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo base_url()."index.php/Guest/beranda_login";?>"><i class="icon-user"></i> Login</a></li>
							<?php endif;?>							
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
<div id="content">
<p>
	<a href="<?php echo base_url()."index.php/Admin/Admin/input_buku";?>"" class="btn btn-mini"><i class="icon-plus"></i> Menambah Data Buku</a>
	<a href="<?php echo base_url()."index.php/Admin/Admin/print_buku";?>"" class="btn btn-mini"><i class="icon-plus"></i> Print Data Buku</a>
	<!-- search -->
	<div align = "right">
	<?php echo form_open("Admin/Admin/cari");?>
		<input type="text" name="cari" placeholder="Cari berdasarkan judul buku">
		<button class="btn btn-mini" type="submit"<i class="icon-search icon-black"></i> Search </button>
		<?php echo form_close();?>
	</div>
</p>

<div class="tab-content">
<table class="table table-bordered table-condensed table-hover">
	<thead>
		<tr class="nowrap">
			<th align="left">ID Buku</th>
			<th align="left">Judul Buku</th>
			<th align="left">Tahun Terbit</th>
			<th align="left">Penerbit</th>
			<th align="left">Jumlah Halaman</th>
			<th align="left">Jumlah Buku</th>
			<th align="left">Asal Buku</th>
			<th align="left">Tanggal Update</th>
			<?php if($_SESSION['level']=='admin'){?>
			<th colspan = "2" align="center">Alat</th>
			<?php } ?>
		</tr>
	</thead>
	<?php 
	$no = $tot+1;
	foreach ($data_buku->result_array() as $d) {?>
	<tbody>
		<tr class="nowrap">
			<td><?php echo $d['id_buku'] ?></td>
			<td><?php echo $d['judul'] ?></td>
            <td><?php echo $d['terbit'] ?></td>
			<td><?php echo $d['penerbit'] ?></td>
            <td><?php echo $d['halaman'] ?></td>
			<td><?php echo $d['jumlah'] ?></td>
			<td><?php echo $d['peroleh'] ?></td>
			<td><?php echo $d['tanggal'] ?></td>
			<?php if($_SESSION['level']=='admin'){?>
			<td><a href="<?php echo base_url()."index.php/Admin/Admin/edit_buku/".$d['id_buku'];?>" class="btn btn-mini"><i class="icon-edit"></i> Edit</a>
			<td><a href="<?php echo base_url()."index.php/Admin/Admin/hapus_buku/".$d['id_buku'];?>" class="btn btn-mini" 
			onClick="return confirm('Apakah anda ingin menghapus data buku dengan judul : <?php echo $d['judul'];?>');"><i class="icon-trash"></i> Delete</a></td>
			<?php } ?>
		</tr>
<?php
	}
?>
	</tbody>
</table>
<center>
<div class="pagination pagination-centered">
	<ul>
	<?php 
		echo $paginator;
	?>
	</ul>
</div>
</center>

<hr>
<div>
	<div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink">
		<div class=""></div></div></div>
		<center><h5>Data Buku Chart</h5></center>
		<canvas id="myChart" width="1350" height="337" style="display: block; height: 270px; width: 1080px;" class="chartjs-render-monitor"</canvas>
</div>
<p class="footer">&nbsp;</p>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/Chart.min.js.download"></script>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx,{
type: 'bar',
data: {
	labels: ['Komputer Grafik Desain','Multimedia','Sistem Pakar','Pemrograman Web','Pemrograman Mobile Android','Pemrograman Berorientasi Objek','Internet of Things'],
	datasets:[{
		label :'#of votes',
		data:[16,15,16,11,11,35,36
		<?php // foreach ($data1 as $d1) {echo $d1['count_penelitian_dipa'];}?>
	],
	backgroundColor: [
		'rgba(225,99,132,0.2)',
		'rgba(54,162,235,0.2)',
		'rgba(255,206,86,0.2)',
		'rgba(75,192,192,0.2)',
		'rgba(153,102,255,0.2)',
		'rgba(255,159,64,0.2)',
		'rgba(100,120,50,0.2)'
	],
	borderColor: [
		'rgba(225,99,132,0.2)',
		'rgba(54,162,235,0.2)',
		'rgba(255,206,86,0.2)',
		'rgba(75,192,192,0.2)',
		'rgba(153,102,255,0.2)',
		'rgba(255,159,64,0.2)',
		'rgba(100,120,50,0.2)'
	],
	borderwidht: 1
}]
},
options: {
	legend:{
		display:false
	},
	scales:{
		yAxes:[{
			ticks: {
				beginAtZero: true,
				stepSize: 1
			}
		}],
	},
		tooltips: {
			callbacks:{
				label : function(tooltipItem){
					return tooltipItem.yLabel;
				}
			}
		}
}
});



</script> 
<p><b>Note : </b>Data di atas merupakan data buku yang terdapat di dalam sistem perpustakaan, yang telah ditambahkan oleh seorang admin dan dilakukan penambahan buku secara berkala ketika ada buku baru yang terupdate, untuk menambahkan kapasitas buku bisa dilakukan pengeditan data jumlah buku.</p>
</div>
</body>
</html>