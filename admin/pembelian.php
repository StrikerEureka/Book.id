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
						Data Order
					</div>
					<div class="panel-body">
						<div class="canvas-wrapper">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama User</th>
                                        <th>Tanggal</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                            <?php $nomor=1; ?>
                                            <?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan"); ?>
                                            <?php while($pecah=$ambil->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $nomor; ?></td>
                                            <td><?php echo $pecah['nama_pelanggan']; ?></td>
                                            <td><?php echo $pecah['tanggal_pembelian']; ?></td>
                                            <td><?php echo $pecah['total_pembelian']; ?></td>
                                            <td>
                                                <a href="detail.php?id=<?php echo $pecah['id_pembelian'] ?>" class="btn-primary btn">Detail</a>
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
	</div>	  
</html>