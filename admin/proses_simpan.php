<?php
include "koneksi.php";

$id = $_POST['id'];
$judul = $_POST['judul'];
$sinopsis = $_POST['sinopsis'];
$rating = $_POST['rating'];
$kategori = implode(", ", $_POST['kategori']);
$gambar = $_FILES['gambar']['tmp_name'];
$imgContent = addslashes(file_get_contents($gambar));

	$query = "INSERT INTO film VALUES('$id','$judul','$sinopsis','$rating','$kategori','$imgContent')";
	$sql = mysqli_query($connect, $query);

	if ($sql) {
		header("location: hal_manajemen.php");
	}else{
		echo "kesalahan simpan bung";
	}

?>

