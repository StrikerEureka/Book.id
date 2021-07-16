<?php 
session_start();
$koneksi= new mysqli("localhost","root","","tokoonline");

if(!isset($_SESSION['admin']))
{
    echo "<script>alert('Anda harus login dulu.');</script>" ;
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Book.id - Tambah Konten</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<link rel="apple-touch-icon" sizes="180x180" href="../favico/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../favico/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../favico/favicon-16x16.png">
	<link rel="manifest" href="../favico/site.webmanifest">
	<link rel="mask-icon" href="../favico/safari-pinned-tab.svg" color="#5bbad5">
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Book.id</span>Admin</a>
			</div>
		</div>
	</nav>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Hello, Admin</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>

		<div class="divider"></div>

		<ul class="nav menu">
			<li><a href="index.php">Dashboard</a></li>
			<li><a href="pembelian.php">Order</a></li>
			<li><a href="pesan.php">Pesan</a></li>
			<li><a href="pelanggan.php">User</a></li>
			<li class="active"><a href="konten.php">Konten</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Konten</li>
			</ol>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Konten</h1>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
                        Tambah Konten
                    </div>                  
					<div class="panel-body">
						<div class="canvas-wrapper">
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>Kategori</label><br>
		<select id="kategori" name="kategori">
    	<option value="Buku">Buku</option>
    	<option value="Penulis">Penulis</option>
    	<option value="Penerbit">Penerbit</option>
  		</select>
	</div>
<!-- 
	<div class="form-group">
		<div id="Buku" class="data">
		<label>Jenis Buku</label>
		<input type="text" class="form-control" name="jenis">
		<br>
		<label>Bahasa Buku</label>
		<input type="text" class="form-control" name="bahasa">
		<br>
		<label>Jumlah Halaman</label>
		<input type="text" class="form-control" name="halaman">
		<br>
		<label>Penulis</label>
		<input type="text" class="form-control" name="penulis">
		<br>
		<label>Penerbit</label>
		<input type="text" class="form-control" name="penerbit">
		</div>

		<div id="Penulis" class="data">
		<label>Kelahiran</label>
		<input type="text" class="form-control" name="kelahiran">
		<br>
		<label>Tahun Aktif</label>
		<input type="text" class="form-control" name="tahun_aktif">
		<br>
		<label>Situs Web</label>
		<input type="text" class="form-control" name="situs_penulis">
		</div>

		<div id="Penerbit" class="data">
		<label>Lokasi</label>
		<input type="text" class="form-control" name="lokasi">
		<br>
		<label>Didirikan</label>
		<input type="text" class="form-control" name="tahun">
		<br>
		<label>Situs Web</label>
		<input type="text" class="form-control" name="situs_penerbit">
		</div>
	</div> -->

	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" class="form-control" name="harga">
	</div>
	<div class="form-group">
		<label>Berat (Gr)</label>
		<input type="number" class="form-control" name="berat">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi"></textarea>
	</div>
	<div class="form-group">
		<label>Deskripsi Tambahan</label>
		<textarea class="form-control" name="deskripsi2"></textarea>
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<button class="btn btn-primary" name="save">Simpan Data</button>
</form>

<?php 
	if (isset($_POST['save']))
	{
		$nama = $_FILES['foto']['name'];
		$lokasi=$_FILES['foto']['tmp_name'];
		move_uploaded_file($lokasi, "../foto_konten/".$nama);
		
		$koneksi->query("INSERT INTO produk (nama,kategori,harga,berat,foto,deskripsi,deskripsi2) 
		VALUES('$_POST[nama]','$_POST[kategori]','$_POST[harga]','$_POST[berat]','$nama','$_POST[deskripsi]','$_POST[deskripsi2]')");
		
		echo "<script>alert('Data tersimpan')</script>";
		echo "<meta http-equiv='refresh' content='1;url=konten.php'>";
		
		// $koneksi->query("INSERT INTO info_buku (nama,jenis,bahasa,halaman,penulis,penerbit) 
		// VALUES('$_POST[nama]','$_POST[jenis]','$_POST[bahasa]','$_POST[halaman]','$_POST[penulis]','$_POST[penerbit]')");

		// $koneksi->query("INSERT INTO info_penulis (kelahiran,tahun_aktif,situs_penulis) 
		// VALUES('$_POST[kelahiran]','$_POST[tahun_aktif]','$_POST[situs_penulis]')");
		
		// $koneksi->query("INSERT INTO info_penerbit (lokasi,tahun,situs_penerbit) 
		// VALUES('$_POST[lokasi]','$_POST[tahun]','$_POST[situs_penerbit]')");


	}
 ?>

		

						</div>
					</div>
				</div>
			</div>
		</div>		
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- <script>
	$(document).ready(function () {
		$("#kategori").on('change', function () {
			$(".data").hide();
			$("#" + $(this).val()).fadeIn(700);
		}).change();
	});
	</script> -->

</html>