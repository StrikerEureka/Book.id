<?php 
session_start();
include 'koneksi.php';
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Book.id</title>
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
<link rel="apple-touch-icon" sizes="180x180" href="favico/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favico/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favico/favicon-16x16.png">
<link rel="manifest" href="favico/site.webmanifest">
<link rel="mask-icon" href="favico/safari-pinned-tab.svg" color="#5bbad5">
 </head>
 <body><?php include 'menu.php'; ?>
	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_items">
							<ul class="cart_list">
								<li class="cart_item clearfix">
									
									<h2>Detail Pembelian</h2>
<?php 
$ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
$detail=$ambil->fetch_assoc();
 ?>
<br>


 <div class="row">
 	<div class="col-md-4">
<h3>Pembelian</h3>
<strong>No. Pembelian: <?php echo $detail['id_pembelian']; ?></strong>
 <p>
 	Tanggal : <?php echo $detail['tanggal_pembelian']; ?> <br>
	Total Harga : Rp. <?php echo $detail['total_pembelian']; ?>
 </p>
 	</div>
 	<div class="col-md-4">
 		<h3>Pelanggan</h3>
 		<strong><?php echo $detail['nama_pelanggan']; ?></strong>
 		 <p>
 	<?php echo $detail['telepon_pelanggan']; ?> <br>
 	<?php echo $detail['email_pelanggan']; ?>
 </p>
 	</div>
 	
 	<div class="col-md-4">
 		<h3>Pengiriman</h3>
 		<strong><?php echo $detail['nama_kota']; ?></strong> <br>
 		<?php echo $detail['alamat_pengiriman']; ?><br>
 		Ongkos Kirim: Rp. <?php echo number_format($detail['tarif']); ?> <br>
 	</div>
 </div>

 <table class="table table-bordered">
 	<thead>
 		<tr>
 			<th>No</th>
 			<th>Judul Buku</th>
 			<th>Harga</th>
 			<th>Jumlah</th>
 			<th>Total</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $nomor=1; ?>
 		<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
 		<?php while($pecah=$ambil->fetch_assoc()){ ?>
 		<tr>
 			<td><?php echo $nomor; ?></td>
 			<td><?php echo $pecah['nama']; ?></td>
 			<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
 			<td><?php echo $pecah['jumlah']; ?></td>
 			<td>
 				Rp. <?php echo number_format($detail['total_pembelian']); ?>
 			</td>
 		</tr>
	<?php $nomor++; ?>
 	<?php } ?>
 	</tbody>
 </table>
								</li>
							</ul>
						</div><br>
						<div class="row">
							<div class=col-md-12>
								<div class="alert alert-info">
									<p>
									Silahkan melakukan pembayaran <b><u>Rp. <?php echo number_format($detail['total_pembelian']); ?>, - </u></b> ke No.Rekening dibawah ini :
									<br>
									BCA - 12345678 a/n PT. Buku Cerdaskan Bangsa
									<br>
									BRI - 87654321 a/n PT. Buku Cerdaskan Bangsa
									<br>
									<br>
									Silahkan WA ke nomor +6281 0812 0812 untuk konfirmasi pembayaran anda.<br>
									
									</p>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
 </body>
 </html>