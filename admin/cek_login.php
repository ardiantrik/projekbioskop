<?php
session_start();
$koneksi = new mysqli("localhost","root","","projek_bioskop");

$username = $_POST['username'];
$password = $_POST['password'];


$data = mysqli_query($koneksi,"select * from admin where username_admin='$username' AND password_admin='$password'") or die(mysqli_error($koneksi));

$cek = mysqli_num_rows($data);
$cek2 = mysqli_fetch_array($data);
if ($cek>0) {
	$_SESSION['username']=$username;
	$_SESSION['name']=$cek2['nama_admin'];
	$_SESSION['status']="login";
	header("location:hal_manajemen.php");
}else{
	header("location:hal_login_admin.php?pesan=gagal");
}?>