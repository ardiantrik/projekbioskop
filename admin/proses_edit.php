<?php
	session_start();
	include "koneksi.php";
	$id = $_POST['id'];
	$judul = $_POST['judul'];
	$sinopsis = $_POST['sinopsis'];
	$rating = $_POST['rating'];
	$kategori = implode(", ", $_POST['kategori']);
	$gambar = $_FILES['gambar']['tmp_name'];
	
	echo $id.",".$judul.",".$sinopsis.",".$rating.",".$kategori;

	if (empty($gambar)) {
		$sql=mysqli_query($connect,"update film set judul_film='$judul', sinopsis_film='$sinopsis', rating_film='$rating',kategori_film='$kategori' where id_film='$id'")or die(mysqli_error($query));
	}else{
		$imgContent = addslashes(file_get_contents($gambar));
		$sql=mysqli_query($connect,"update film set judul_film='$judul', sinopsis_film='$sinopsis', rating_film='$rating', kategori_film='$kategori', gambar_film='$imgContent' where id_film='$id'")or die(mysqli_error($query));

	}
	if ($sql) {
	header("location:hal_manajemen.php?pesan=terupdate");
}else {
	header("location:hal_manajemen.php?pesan=gagal_update");
}



?>