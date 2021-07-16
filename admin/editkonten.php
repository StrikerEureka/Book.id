<?php 
session_start();
$koneksi= new mysqli("localhost","root","","tokoonline");
$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

if(!isset($_SESSION['admin']))
{
    echo "<script>alert('Anda Harus Login');</script>" ;
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
	<title>Book.id - Edit Konten</title>
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
			<li><a href="login.html">Logout</a></li>
		</ul>
	</div>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Edit</li>
			</ol>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Konten</h1>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
                        Edit Konten
                    </div>
                   
					<div class="panel-body">
						<div class="canvas-wrapper">
                        <form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama'] ;?>">
	</div>
	<div class="form-group">
		<label>Kategori</label><br>
		<select name="kategori">
    	<option value="Buku">Buku</option>
    	<option value="Penulis">Penulis</option>
    	<option value="Penerbit">Penerbit</option>
  </select>
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" class="form-control" name="harga" value="<?php echo $pecah['harga'] ;?>">
	</div>
	<div class="form-group">
		<label>Berat (Gr)</label>
		<input type="number" class="form-control" name="berat" value="<?php echo $pecah['berat'] ;?>">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi"><?php echo $pecah['deskripsi'] ;?></textarea>
	</div>
	<div class="form-group">
		<label>Deskripsi Tambahan</label>
		<textarea class="form-control" name="deskripsi2"><?php echo $pecah['deskripsi2'] ;?></textarea>
	</div>
	<div class="form-group">
		<img src="../foto_konten/<?php echo $pecah['foto'] ;?>" width="200">
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<button class="btn btn-primary" name="ubah">Simpan Data</button>
</form>

<?php 
	if(isset($_POST['ubah']))
	{
		$namafoto=$_FILES['foto']['name'];
		$lokasifoto = $_FILES['foto']['tmp_name'];
		if(!empty($lokasifoto))
		{
			move_uploaded_file($lokasifoto, "../foto_konten/$namafoto");

			$koneksi->query("UPDATE produk SET nama='$_POST[nama]',
				harga='$_POST[harga]',
				berat='$_POST[berat]',
				kategori='$_POST[kategori]',
				foto='$namafoto',
				deskripsi='$_POST[deskripsi]',
				deskripsi2='$_POST[deskripsi2]' WHERE id_produk='$_GET[id]'");
		}
		else
		{
			$koneksi->query("UPDATE produk SET nama='$_POST[nama]',harga='$_POST[harga]',berat='$_POST[berat]',kategori='$_POST[kategori]',deskripsi='$_POST[deskripsi]', deskripsi2='$_POST[deskripsi2]' WHERE id_produk='$_GET[id]'");
		}
		echo "<script>alert('Data telah di update')</script>";
		echo "<script>location='konten.php'</script>";
	}
 ?>

						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>	  
</html>