<!DOCTYPE html>
<html>
<head>
	<title>Coba upload</title>
</head>
<body>
	<h1>ADMIN ISI FILM</h1>
	<center>
	<form method="POST" action="proses_simpan.php" enctype="multipart/form-data">
		<table border="1">
			<tr>
				<td>ID FILM</td>
				<td>:</td>
				<td><input type="text" name="id"></td>
			</tr>
			<tr>
				<td>JUDUL FILM</td>
				<td>:</td>
				<td><input type="text" name="judul"></td>
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
				<td><input type="number" name="slot"></td>
			</tr>
			<tr>
				<td>GAMBAR</td>
				<td>:</td>
				<td><input type="file" name="gambar"></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="submit" value="SUBMIT"></td>
			</tr>
		</table>
	</form>
	</center>
</body>
</html>