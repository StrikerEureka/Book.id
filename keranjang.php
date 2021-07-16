<?php 
session_start();
include 'koneksi.php';
if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
	echo "<script>alert('Keranjang kosong. Silahkan pilih produk.')</script>";
	echo "<script>location='index.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Book.id</title>
<meta charset="utf-8">
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

<body>
<div class="super_container">

<?php include 'menu.php'; ?>

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_title">Shopping Cart</div>
						<div class="cart_items">
							<ul class="cart_list">
								<li class="cart_item clearfix">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th><center>Judul Buku</center></th>
												<th><center>Harga</center></th>
												<th><center>Jumlah</center></th>
												<th><center>Total Harga</center></th>
												<th><center>Aksi</center></th>
											</tr>
										</thead>
									<tbody>
										<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
										<?php $ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'") ;
											$pecah=$ambil->fetch_assoc();
											$subharga=$pecah["harga"]*$jumlah;
										?>
										<tr>
											<td><center><img src="foto_konten/<?php echo $pecah['foto']; ?>" height="100"><br>
											<?php echo $pecah['nama']; ?></center></td>
											<td><center>Rp. <?php echo number_format($pecah['harga']) ; ?></center></td>
											<td><center><?php echo $jumlah; ?></center></td>
											<td><center>Rp. <?php echo number_format($subharga); ?></center></td>
											<td><center>
												<a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-danger">Hapus</a>
											</center></td>
										</tr>
										<?php endforeach ?>
									</tbody>
									</table>								
								</li>
							</ul>
						</div>
						<div class="cart_buttons">
							<a href="index.php"><button class="button cart_button_clear">Lanjut Belanja</button></a>
							<a href="checkout.php"><button class="button cart_button_checkout">Chek Out</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include 'footer.php'; ?>

</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/cart_custom.js"></script>
</body>

</html>