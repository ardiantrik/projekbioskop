<!DOCTYPE html>
<html>
<head>
	<title>ISI SHOW</title>
	<link href="style.css" rel='stylesheet' type='text/css' />
</head>
<?php
    //include "session_checker.php";
	include "koneksi.php";
	$id=$_GET['id'];
	$sql = mysqli_query($connect, "select * from film where id_film='$id'");
	$sql_film = mysqli_query($connect, "select * from film f inner join show_film s where f.id_film=s.id_film and f.id_film='$id'");
	$data_film = mysqli_fetch_array($sql);
?>
<body>
	<h1>ADMIN ISI SHOW</h1>
	<center>
	<form method="POST" action="proses_show.php?id=<?= $id; ?>">
		<table border="1" id="tabel_show">
			<tr>
				<td>ID FILM</td>
				<td>:</td>
				<td><?= $data_film['id_film']; ?></td>
			</tr>
			<tr>
				<td>JUDUL FILM</td>
				<td>:</td>
				<td><?= $data_film['judul_film']; ?></td>
			</tr>
			<tr>
				<td>STUDIO TAYANG</td>
				<td>:</td>
				<td><select name="studio">
					<?php
						for ($i=1; $i <= 5; $i++) { 
							?><option value="<?= $i; ?>"><?= $i; ?></option><?php
						}
					?>
				</select>
			</tr>
			<tr>
				<td>TANGGAL TAYANG</td>
				<td>:</td>
				<td><input type="date" name="tanggal"></td>
			</tr>
			<tr>
				<td>WAKTU TAYANG</td>
				<td>:</td>
				<td><input type="time" name="waktu"></td>
			</tr>
			<tr>
				<td>SLOT</td>
				<td>:</td>
				<td><input type="number" name="slot" value="25" disabled></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="submit" value="SUBMIT">
					<a href="hal_manajemen.php"><BUTTON>KEMBALI</BUTTON></a></td>
			</tr>
		</table>
	</form>
	</center>
</body>
</html>