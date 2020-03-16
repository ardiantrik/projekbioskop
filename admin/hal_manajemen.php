<!DOCTYPE html>
<html>
<head>
	<title>ADMIN MANAJEMEN</title>
	<link href="style.css" rel='stylesheet' type='text/css' />
</head>
<?php
	include "session_checker.php";
	include "koneksi.php";
	$sql = mysqli_query($connect, "select * from film");
	$name=$_SESSION['name'];

?>
<body>
	<a href="cek_logout.php" style="float: right;"><button>LOG OUT</button></a>
	<a style="float: right;"><?php echo "Selamat Datang! $name ";?><br></a>
	<center>
	<h1>ADMIN MANAJEMEN</h1>
	
		<table id="tabel_manajemen">
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr>
				
					<th><a href="hal_manajemen.php" class="menu">Kelola Film</a></th>
					<th><a href="hal_show_admin.php" class="menu">Lihat Show</a></th>
					<th><a href="hal_customer_admin.php" class="menu">Lihat Customer</a></th>
				
				
			</tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td colspan="3">
				<form id="isi_form" method="POST" action="proses_simpan.php" enctype="multipart/form-data">
				<table>
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
				<td><textarea form="isi_form" name="sinopsis" rows="10" cols="30" style="resize: none;" ></textarea> </td>
			</tr>
			<tr>
				<td>RATING FILM</td>
				<td>:</td>
				<td><select name="rating">
					<option value="Semua Umur">Semua Umur</option>
					<option value="Remaja">Remaja</option>
					<option value="Dewasa">Dewasa</option>
				</select></td>
			</tr>
			<tr>
				<td>KATEGORI FILM</td>
				<td>:</td>
				<td>
					<input type="checkbox" name="kategori[]" value="Sci-Fi">Sci-Fi<br>
					<input type="checkbox" name="kategori[]" value="Horror">Horror<br>
					<input type="checkbox" name="kategori[]" value="Action">Action<br>
					<input type="checkbox" name="kategori[]" value="Thriller">Thriller<br>
					<input type="checkbox" name="kategori[]" value="Romance">Romance<br>
					<input type="checkbox" name="kategori[]" value="Documentary">Documentary<br>
					<input type="checkbox" name="kategori[]" value="Drama">Drama<br>
					<input type="checkbox" name="kategori[]" value="Comedy">Comedy<br>
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
			</td><td valign="top">
				<table border="1" id="tabel_dalam">
		<tr align="center">
			<th>No.</th>
			<th>Judul Film</th>
			<th>Opsi</th>
		</tr>
		<?php
			$no = 1;
			while ($data = mysqli_fetch_array($sql)) { ?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $data['judul_film']; ?></td>
					<td>
						<a href="hal_isi_show.php?id=<?= $data['id_film']; ?>"><button>TAMBAH SHOW</button></a>
						<a href="edit_film.php?id=<?= $data['id_film']; ?>"><button>EDIT FILM</button></a>
						<a href="delete_film.php?id=<?= $data['id_film']; ?>"><button>DELETE FILM</button></a>
					</td>
				</tr>
			<?php }

		?>
	</table>
			</td></tr>
			
		</table>
	
	
	</center>
	
</body>
</html>