<?php 
session_start();
$koneksi= new mysqli("localhost","root","","tokoonline");
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
	<title>Book.id - Order</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<link rel="apple-touch-icon" sizes="180x180" href="favico/apple-touch-icon.png">
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
				<div class="profile-usertitle-name">Hallo, Admin</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>

		<div class="divider"></div>

		<ul class="nav menu">
			<li><a href="index.php">Dashboard</a></li>
			<li class="active"><a href="pembelian.php">Order</a></li>
			<li><a href="pesan.php">Pesan</a></li>
			<li><a href="pelanggan.php">User</a></li>
			<li><a href="konten.php">Konten</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Order</li>
			</ol>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Order</h1>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Detail Order
					</div>
					<div class="panel-body">
						<div class="canvas-wrapper">
                            <?php
                            $ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
                            $detail=$ambil->fetch_assoc();
                            ?>
                                <strong>No. Order :</strong> <?php echo $detail['id_pembelian']; ?><br>
                                <strong>Tanggal :</strong> <?php echo $detail['tanggal_pembelian']; ?><br>
                        </div>
                        <br>

                        <div class="canvas-wrapper">
                            <h3>Data Pembeli</h3>
                            <strong>Nama User : </strong><?php echo $detail['nama_pelanggan']; ?><br>
                            <strong>No. Telp : </strong><?php echo $detail['telepon_pelanggan']; ?><br>
                            <strong>E-mail : </strong><?php echo $detail['email_pelanggan']; ?>
                        </div>
                        <br>
 	
                        <div class="canvas-wrapper">
                            <h3>Data Pengiriman</h3>
                            <strong>Kota : </strong><?php echo $detail['nama_kota']; ?><br>
                            <strong>Alamat : </strong><?php echo $detail['alamat_pengiriman']; ?><br>
                            <strong>Ongkos Kirim : </strong>Rp. <?php echo number_format($detail['tarif']); ?> <br>
                        </div>
                        <br>
                        
                        <div class="canvas-wrapper">
                        <h3>Data Produk</h3>
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $nomor=1; ?>
							<?php $ambil=$koneksi->query(
							"SELECT pp.id_pembelian_produk, pp.nama, pp.harga, pp.jumlah, p.total_pembelian FROM pembelian_produk AS pp JOIN pembelian AS p ON pp.id_pembelian = p.id_pembelian WHERE p.id_pelanggan ='$_GET[id]'");
                            while($pecah=$ambil->fetch_assoc()){ ?>
                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td><?php echo $pecah['nama']; ?></td>
                                <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
                                <td><?php echo $pecah['jumlah']; ?></td>
                                <td>
                                    Rp. <?php echo number_format($pecah['total_pembelian']); ?>
                                </td>
                            </tr>
                            <?php $nomor++; ?>
                            <?php } ?>
                        </tbody>
                    </table>
					</div>
				</div>
			</div>
		</div>
	</div>
</html>