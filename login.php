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
<body>
<?php include 'menu.php'; ?>
<div class="super_container">
	<div class="cart_section">
		<div class="col-lg-5 offset-lg-4">
			<div class="cart_title"><center>Sign In</center></div>
				<ul class="cart_list">
					<li class="cart_item clearfix">					
							<form method="post">
								<div class="form-group">
									<label>Email</label><br>
									<input type="email" class="form-contol" name="email">
								</div>
								<div class="form-group">
									<label>Password</label><br>
									<input type="password" class="form-contol" name="password">
								</div>
								<button class="btn btn-primary" name="login">Login</button>
								<br><br><br><hr>
							</form>
							<div class="form-group">
							<label>Belum memiliki akun ?</label>
							</div>
							<form action="http://127.0.0.1/book.id/daftar.php">
							<input class="btn btn-primary" type="submit" value="Register"/>
							</form>
					</li>
				</ul>
			</div>
		</div>

<?php 
if (isset($_POST["login"]))
{
	$email=$_POST["email"];
	$password=$_POST["password"];
 $ambil= $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

$cocok=$ambil->num_rows;
if ($cocok==1)
{
	$akun = $ambil->fetch_assoc();
	$_SESSION["pelanggan"]=$akun;

	echo "<script>location='checkout.php';</script>";
}
else
{
	echo "<script>alert('Login gagal. Periksa akun anda');</script>";
	echo "<script>location='login.php';</script>";
}

}
?>


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