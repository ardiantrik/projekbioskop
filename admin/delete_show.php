<?php
	session_start();
	$koneksi = new mysqli("localhost","root","","projek_bioskop");
	$id=$_GET['id'];
	$sql=mysqli_query($koneksi,"delete from show_film where id_show='$id'");

	if ($sql) {
	header("location:hal_show_admin.php?pesan=terhapus");
}else {
	header("location:hal_show_admin.php?pesan=gagal_hapus");
}

?>