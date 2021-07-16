<?php session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Hubungi kami</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
<link rel="apple-touch-icon" sizes="180x180" href="favico/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favico/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favico/favicon-16x16.png">
<link rel="manifest" href="favico/site.webmanifest">
<link rel="mask-icon" href="favico/safari-pinned-tab.svg" color="#5bbad5">
</head>

<body>
<div class="super_container">
	
	<?php include 'menu.php'; ?>

	<div class="contact_form">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="contact_form_container">
						<div class="contact_form_title">Tanyakan ke kami</div>

						<form method="post" id="contact_form">
							<div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
								<input type="text" id="contact_form_name" class="contact_form_name input_field" placeholder="Nama" required="required" data-error="Name is required." name="nama">
								<input type="email" id="contact_form_email" class="contact_form_email input_field" placeholder="Email" required="required" data-error="Email is required." name="email">
								<input type="text" id="contact_form_phone" class="contact_form_phone input_field" placeholder="Nomor Telepon" name="telepon">
							</div>
							<div class="contact_form_text">
								<textarea id="contact_form_message" class="text_field contact_form_message" rows="4" placeholder="Isi pesan ..." required="required" data-error="Tulis Pesan Anda." name="isi_pesan"></textarea>
							</div>
							<div class="contact_form_button">
								<button name="submit" class="button contact_submit_button" >Kirim</button>
							</div>
						</form>
						<?php 
						if (isset($_POST['submit'])) {
							$koneksi->query("INSERT INTO pesan (nama,email,telepon,isi_pesan) 
							VALUES('$_POST[nama]','$_POST[email]','$_POST[telepon]','$_POST[isi_pesan]')");
							echo"<script>alert('Pesan anda terkirim.');</script>";
							echo"<script>location='contact.php';</script>";
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<div><br><br><br>
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
<script src="plugins/easing/easing.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="js/contact_custom.js"></script>
</body>

</html>