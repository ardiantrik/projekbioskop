<?php
	include "koneksi.php";
	$id_film = $_GET['id'];
	$id_show = $_GET['id_show'];
	$seat_data = $_POST['seat']; 
	$count_seat = count($_POST['seat']);
	$total_pay=0;
	$sql_akses = mysqli_query($connect,"select * from show_film s inner join film f where s.id_film=f.id_film and s.id_film='$id_film'");
	$data_akses = mysqli_fetch_array($sql_akses);
	$studio = $data_akses['studio_show'];
	$tanggal = $data_akses['tanggal_show'];
	$waktu = $data_akses['waktu_show'];
	$sql_day = mysqli_query($connect,"select dayname(tanggal_show) from show_film where id_film='$id_film'");
	$day = mysqli_fetch_array($sql_day);

	if ($day[0] == 'Friday') {
		$tiket = 35000;
	}else if ($day[0] == 'Saturday' || $day[0] == 'Sunday') {
		$tiket = 40000;
	}else {
		$tiket = 30000;
	}

	
	for ($i=0; $i < $count_seat; $i++) { 
		$query_book = "INSERT INTO book VALUES('','member002','$id_film','$id_show','$studio','$tanggal','$waktu','$seat_data[$i]','$tiket')";
		$sql_book = mysqli_query($connect, $query_book);
		$total_pay=$total_pay+$tiket;
		$sql_efek = mysqli_query($connect,"update show_film set slot_show=slot_show-1 where id_show='$id_show'");
	}
	echo "$tanggal";
	echo "$waktu";
	echo "total bayar=$total_pay";
	
	
?>