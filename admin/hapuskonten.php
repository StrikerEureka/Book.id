<?php
$koneksi= new mysqli("localhost","root","","tokoonline");
$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
$fotoproduk=$pecah['foto'];
if(file_exists("../foto_konten/$fotoproduk"))
{
	unlink("../foto_konten/$fotoproduk");
}

$koneksi->query("DELETE FROM produk WHERE id_produk='$_GET[id]'");
$koneksi->query("DELETE FROM info_buku WHERE id_buku='$_GET[id]'");
$koneksi->query("DELETE FROM info_penulis WHERE id_penulis='$_GET[id]'");
$koneksi->query("DELETE FROM info_penerbit WHERE id_penerbit='$_GET[id]'");


echo "<script>alert('Produk telah di hapus.')</script>";
echo "<script>location='konten.php'</script>";
?>
