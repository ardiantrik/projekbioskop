<!DOCTYPE html>
<html>
<head>
	<title>Coba upload</title>
	<link href="style.css" rel='stylesheet' type='text/css' />
</head>
<?php
	include "koneksi.php";
	$id=$_GET['id'];
	$sql = mysqli_query($connect, "select * from show_film s, film f where s.id_show='$id' and s.id_film=f.id_film");
	$data = mysqli_fetch_array($sql);
?>
<body>
	<h1>ADMIN ISI SHOW</h1>
	<center>
	<form method="POST" action="proses_edit_show.php?id=<?= $id; ?>">
		<table border="1" id="tabel_show">
			<tr>
				<td>ID FILM</td>
				<td>:</td>
				<td><?= $data['id_film']; ?></td>
			</tr>
			<tr>
				<td>JUDUL FILM</td>
				<td>:</td>
				<td><?= $data['judul_film']; ?></td>
			</tr>
			<tr>
				<td>STUDIO TAYANG</td>
				<td>:</td>
				<td><select name="studio">
					<?php
						for ($i=1; $i <= 5; $i++) { 
							if ($data['studio_show']==$i) { ?>
								<option selected value="<?= $i; ?>"><?= $i; ?></option>
								<?php
							}else{ ?> <option value="<?= $i; ?>"><?= $i; ?></option>
							<?php }
							
						}
					?>
				</select>
			</tr>
			<tr>
				<td>TANGGAL TAYANG</td>
				<td>:</td>
				<td><input type="date" name="tanggal" value="<?= $data['tanggal_show'];?>"></td>
			</tr>
			<tr>
				<td>WAKTU TAYANG</td>
				<td>:</td>
				<td><input type="time" name="waktu" value="<?= $data['waktu_show'];?>"></td>
			</tr>
			<tr>
				<td>SLOT</td>
				<td>:</td>
				<td><input disabled type="number" name="slot" value="<?= $data['slot_show'];?>" ></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="simpan" value="SUBMIT">
					<a href="hal_show_admin.php"><BUTTON>KEMBALI</BUTTON></a></td>
			</tr>
		</table>
	</form>
	</center>
</body>
</html>