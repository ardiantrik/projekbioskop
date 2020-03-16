<?php
	session_start();
	include "koneksi.php";
	$id = $_POST['id'];
	$studio = $_POST['studio'];
	$tanggal = $_POST['tanggal'];
	$waktu = $_POST['waktu'];

	
	
	$sql=mysqli_query($connect,"UPDATE show_film SET studio_show='$studio', tanggal_show='$tanggal', waktu_show='$waktu' where id_show='$id'")or die(mysqli_error($query));

	
	if ($sql) {
	header("location:hal_show_admin.php?pesan=terupdate");
}else {
	header("location:hal_show_admin.php?pesan=gagal_update");
}



?>