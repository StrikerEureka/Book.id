<?php 
session_start();
include 'koneksi.php';
 if(!isset($_SESSION['pelanggan']))
{
    echo "<script>alert('Anda harus login dulu.');</script>" ;
    echo "<script>location='login.php';</script>";
  
}
elseif (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
	echo "<script>alert('Keranjang kosong, Silahkan belanja.');</script>";
	echo "<script>location='index.php';</script>";
}

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
</head>
<body>
	<?php include 'menu.php'; ?>

		<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_title">Checkout Belanja</div>
						<div class="cart_items">
							<ul class="cart_list">
								<li class="cart_item clearfix">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th><center>Judul Buku</center></th>
												<th><center>Harga</center></th>
												<th><center>Jumlah</center></th>
												<th><center>Subharga</center></th>
											</tr>
										</thead>
									<tbody>
										<?php $totalbelanja =0; ?>
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
										</tr>
										<?php $totalbelanja+=$subharga; ?>
										<?php endforeach ?>
									</tbody>
									</table>
									
								</li>
							</ul>
						</div>
						<div class="order_total">
							<div class="order_total_content text-md-right">
								<div class="order_total_title">
									Total
								</div>
								<div class="order_total_amount">
									Rp. <?php echo number_format($totalbelanja); ?>
								</div>
							</div>
						</div>
						<br>
					<form method="post">
						
						<div class="row">
							<div class="col-md-4"><div class="form-group">
							<input class="form-control" type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan'] ?>" >
						</div></div>
							<div class="col-md-4"><div class="form-group">
							<input class="form-control" type="text" readonly value="<?php echo $_SESSION["pelanggan"]['telepon_pelanggan'] ?>" >
						</div> </div>
							<div class="col-md-4">
								<select class="form-control" name="id_ongkir">
									<option>Pilih pengiriman</option>
									<?php 
									$ambil=$koneksi->query("SELECT * FROM ongkir");
									while($perongkir=$ambil->fetch_assoc()){
									?>
										<option value="<?php echo $perongkir['id_ongkir']; ?>"><?php echo $perongkir['nama_kota']; ?> - Rp. <?php echo number_format($perongkir['tarif']); ?></option>
									<?php } ?>
								</select>
							</div>

						</div>
						
						<br>
					<div class="form-group">
						<label>Alamat Lengkap Pengiriman</label><br>
						<textarea class="form-control" name="alamat_pengiriman" placeholder="Masukkan alamat lengkap pengiriman"></textarea>
					</div>
					
						<div class="cart_buttons">
							<button class="button cart_button_checkout" name="checkout">Checkout</button>
						</div>
						<?php if (isset($_POST["checkout"]))
						{
							$id_pelanggan=$_SESSION["pelanggan"]["id_pelanggan"];
							$id_ongkir=$_POST["id_ongkir"];
							$tanggal_pembelian=date("Y-m-d");
							$alamat_pengiriman=$_POST['alamat_pengiriman'];

							$ambil=$koneksi->query("SELECT * FROM ongkir where id_ongkir='$id_ongkir'");
							$arrayongkir=$ambil->fetch_assoc();
							$nama_kota=$arrayongkir['nama_kota'];
							$tarif=$arrayongkir['tarif'];

							$total_pembelian=$totalbelanja + $tarif;

							$koneksi->query("INSERT INTO pembelian (id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat_pengiriman) VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat_pengiriman')");
						

							$id_pembelian_barusan = $koneksi->insert_id;
							foreach ($_SESSION["keranjang"] as $id_produk => $jumlah)
							{
								$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
								$perproduk=$ambil->fetch_assoc();

								$nama= $perproduk['nama'];
								$harga= $perproduk['harga'];
								$berat= $perproduk['berat'];
								$subberat=$perproduk['berat']*$jumlah;
								$subharga=$perproduk['harga']*$jumlah;

								$koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,jumlah,nama,harga,berat,subberat,subharga) VALUES ('$id_pembelian_barusan','$id_produk','$jumlah','$nama','$harga','$berat','$subberat','$subharga') ");
							}


							unset($_SESSION["keranjang"]);


							echo "<script>alert('Pembelian sukses');</script>";
							echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
						} ?>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>