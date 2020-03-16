<!DOCTYPE html>
<html>
<head>
	<title>Coba upload</title>
</head>
<body>
	<h1>ADMIN ISI FILM</h1>
	<center>
	<form id="isi_form" method="POST" action="proses_simpan.php" enctype="multipart/form-data">
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
				<td>SINOPSIS FILM</td>
				<td>:</td>
				<td><textarea form="isi_form" name="sinopsis" rows="10" cols="30"></textarea> </td>
			</tr>
			<tr>
				<td>KATEGORI FILM</td>
				<td>:</td>
				<td>
					<input type="checkbox" name="kategori[]" value="Scifi">Sci-Fi<br>
					<input type="checkbox" name="kategori[]" value="Horror">Horror<br>
					<input type="checkbox" name="kategori[]" value="Romance">Romance<br>
					<input type="checkbox" name="kategori[]" value="Action">Action
				</td>
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