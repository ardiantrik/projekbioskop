<?php
	include "koneksi.php";
	$id = $_GET['id'];
	$studio = $_POST['studio'];
	$tanggal = $_POST['tanggal'];
	$waktu = $_POST['waktu'];
	$slot = 25;

	$query = "INSERT INTO show_film VALUES('','$id','$studio','$slot',dayname('$tanggal'),'$tanggal','$waktu')";
	$sql = mysqli_query($connect, $query);

	if ($sql) {
		header("location: hal_manajemen.php");
	}else{
		header("location: hal_manajemen.php?pesan=gagal_show");
	}
?>