<?php 
session_start();
$koneksi= new mysqli("localhost","root","","tokoonline");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Book.id Admin Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link rel="apple-touch-icon" sizes="180x180" href="../favico/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../favico/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../favico/favicon-16x16.png">
	<link rel="manifest" href="../favico/site.webmanifest">
	<link rel="mask-icon" href="../favico/safari-pinned-tab.svg" color="#5bbad5">
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Book.id Admin Login</div>
				<div class="panel-body">
					<form role="form" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="username" name="user" type="usermame" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="password" name="pass" type="password" required>
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<button class="btn btn-primary" name="login">Login</button>
                    </form>             	
<?php
if(isset($_POST['login'])){
    $ambil=$koneksi->query("SELECT * FROM admin WHERE username='$_POST[user]' AND password ='$_POST[pass]'");
    $yangcocok = $ambil->num_rows;
    if ($yangcocok==1) 
    {
        $_SESSION['admin']=$ambil->fetch_assoc();
        echo "<div class='alert alert-info'>Login Sukses</div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php'>";
    }
    else
    {
        echo "<div class='alert alert-info'>Login Gagal</div>";
        echo "<meta http-equiv='refresh' content='1;url=login.php'>";
    }
}
?>
				</div>
			</div>
		</div>
	</div>

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
