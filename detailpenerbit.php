<?php 
session_start();
include 'koneksi.php';
 ?>
 <?php 
 $id_produk= $_GET["id"];
 $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
 $detail = $ambil->fetch_assoc();

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
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="styles/product_responsive.css">
<link rel="apple-touch-icon" sizes="180x180" href="favico/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favico/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favico/favicon-16x16.png">
<link rel="manifest" href="favico/site.webmanifest">
<link rel="mask-icon" href="favico/safari-pinned-tab.svg" color="#5bbad5">
</head>

<body>

<div class="super_container">
	
	<?php include 'menu.php'; ?>

	<div class="single_product">
		<div class="container">
			<div class="row">

				<div class="col-lg-5 order-lg-2 order-1">
					<div><img src="foto_konten/<?php echo $detail['foto'] ?>" alt="" style="width:70%;height:70%;"></div><br>	
				</div>
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category"><?php echo $detail['kategori'] ?></div>
						<div class="product_name"><?php echo $detail['nama'] ?></div>
						<div class="product_text">Informasi :</div>
					<div>
					<p><?php echo "<p class='text-justify'>" . $detail['deskripsi'] . "</p>"; ?></p>
					<p><?php echo "<p class='text-justify'>" . $detail['deskripsi2'] . "</p>"; ?></p>
						<?php 
							if (isset($_POST["beli"]))
							{
								$jumlah = $_POST["jumlah"];
								$_SESSION["keranjang"][$id_produk] = $jumlah;

								echo "<script>alert('Produk ditambahkan ke Keranjang.');</script>";
								echo "<script>location='keranjang.php';</script>";
							}
						 ?>

						</div>
						
					</div>
				</div>

			</div>
		</div>
	</div>
<hr>
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
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/product_custom.js"></script>
</body>

</html>