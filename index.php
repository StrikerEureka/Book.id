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
<link rel="stylesheet" type="text/css" href="plugins/slick-1.8.0/slick.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
<link rel="apple-touch-icon" sizes="180x180" href="favico/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favico/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favico/favicon-16x16.png">
<link rel="manifest" href="favico/site.webmanifest">
<link rel="mask-icon" href="favico/safari-pinned-tab.svg" color="#5bbad5">
</head>

<body>
<div class="super_container">

<?php include 'menu.php'; ?>
	
	<div class="banner">
		<div class="banner_background" style="background-image:url(images/banner_background.jpg)"></div>
		<div class="container fill_height">
			<div class="row fill_height">
				<div class="banner_product_image"><img src="foto_konten/komet_minor.jpg" style="width:240px;height:330px;"></div>
				<div class="col-lg-5 offset-lg-4 fill_height">
					<div class="banner_content">
						<h1 class="banner_text">Buku of the week</h1>
						<div class="banner_price"></div>
						<div class="banner_product_name"></div>
						<div class="button banner_button"><a href="detail.php?id=4">Beli sekarang</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="characteristics">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 char_col">
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="images/char_1.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Gratis Pengiriman</div>
							<div class="char_subtitle">Ketentuan Berlaku</div>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 char_col">
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="images/char_2.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Jaminan Uang Kembali</div>
							<div class="char_subtitle">Garansi Toko</div>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 char_col">
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="images/char_3.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Dapatkan Cashback</div>
							<div class="char_subtitle">Hingga 50%</div>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 char_col">					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="images/char_4.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Potongan Khusus</div>
							<div class="char_subtitle">Lebih Dari 10%</div>
						</div>
					</div>
				</div>
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
<script src="plugins/slick-1.8.0/slick.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>
</body>
</html>