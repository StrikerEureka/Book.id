<?php 
session_start();
include 'koneksi.php';
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
<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="styles/shop_responsive.css">
<link rel="apple-touch-icon" sizes="180x180" href="favico/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favico/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favico/favicon-16x16.png">
<link rel="manifest" href="favico/site.webmanifest">
<link rel="mask-icon" href="favico/safari-pinned-tab.svg" color="#5bbad5">
</head>

<body>
<div class="super_container">
	
<?php include 'menu.php'; ?>	

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">BUKU</h2>
		</div>
	</div>

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="shop_content">
						<div class="product_grid">
							<div class="product_grid_border"></div>
						<?php $ambil=$koneksi->query("SELECT * FROM produk WHERE kategori='buku'");?>
						<?php while($perproduk = $ambil->fetch_assoc()){ ?>
							<div class="product_item">
								<div class="product_border"></div>
								<a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>">
								<div class="product_image d-flex flex-column align-items-center justify-content-center">
								<img src="foto_konten/<?php echo $perproduk['foto'] ?>" height="115">
								</div>
								</a>
								<div class="product_content">
									<div class="product_price">Rp. <?php echo number_format($perproduk['harga']) ?></div>
									<div class="product_name">
										<div><?php echo $perproduk['nama'] ?></div>
									</div>
									<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">Beli</a>
								</div>
							</div>
						<?php } ?>
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
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/shop_custom.js"></script>
</body>
</html>