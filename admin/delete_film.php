<?php
	session_start();
	$koneksi = new mysqli("localhost","root","","projek_bioskop");
	$id=$_GET['id'];
	$sql=mysqli_query($koneksi,"delete from film where id_film='$id'");

	if ($sql) {
	header("location:hal_manajemen.php?pesan=terhapus");
}else {
	header("location:hal_manajemen.php?pesan=gagal_hapus");
}

?>