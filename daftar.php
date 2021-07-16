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
			<div class="cart_title"><center>Register</center></div>
				<ul class="cart_list">
					<li class="cart_item clearfix">					
							<form method="post">
								<div class="form-group">
									<label>Nama</label><br>
									<input type="text" class="form-contol" name="nama" required>
								</div>
								<div class="form-group">
									<label>Email</label><br>
									<input type="text" class="form-contol" name="email" required>
								</div>
                                <div class="form-group">
									<label>Password</label><br>
									<input type="password" class="form-contol" name="password" required>
								</div>
                                <div class="form-group">
									<label>Alamat</label><br>
									<textarea name="alamat" class="form-control" required></textarea>
								</div>
                                <div class="form-group">
									<label>Telp/HP</label><br>
									<input type="text" class="form-contol" name="telepon" required>
								</div>
								<button class="btn btn-primary" name="daftar">Register</button>
							</form>
					</li>
				</ul>
			</div>
		</div>

<?php 
    if (isset($_POST["daftar"])) {
        $nama = $_POST["nama"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $telepon = $_POST["telepon"];
        $alamat = $_POST["alamat"];
        $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
        $yangcocok = $ambil->num_rows;
        if ($yangcocok==1) 
        {
            echo "<script>alert('Pendaftaran gagal. Cek data anda lagi.');</script>";
            echo "<script>location='daftar.php';</script>";
        }
        else
        {
            $koneksi->query("INSERT INTO pelanggan (nama_pelanggan, email_pelanggan, password_pelanggan, telepon_pelanggan, alamat_pelanggan) VALUES ('$nama','$email','$password','$telepon','$alamat')");
            echo"<script>alert('Pendaftaran Sukses, silahkan login.');</script>";
            echo"<script>location='login.php';</script>";
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