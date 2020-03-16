<!DOCTYPE html>
<html>
<head>
	<title>ADMIN MANAJEMEN</title>
	<link href="style.css" rel='stylesheet' type='text/css' />
</head>
<?php
	include "session_checker.php";
	include "koneksi.php";
	$id = $_GET['id'];
	$sql = mysqli_query($connect, "select * from film where id_film='$id'");
	$data = mysqli_fetch_array($sql);
	$kat_film = array("Sci-Fi","Horror","Action","Thriller","Romance","Documentary","Drama","Comedy");
	$rat_film = array("Semua Umur","Remaja","Dewasa");
	$name=$_SESSION['name'];
?>
<body>
	<a href="cek_logout.php" style="float: right;"><button>LOG OUT</button></a>
	<a style="float: right;"><?php echo "Selamat Datang! $name ";?><br></a>
	<center>
	<h1>ADMIN MANAJEMEN</h1>
	
		<table id="tabel_manajemen" >
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
				<form id="isi_form" method="POST" action="proses_edit.php" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?= $id; ?>">
				<table>
					<tr>
				<td>ID FILM</td>
				<td>:</td>
				<td><input type="text" name="id_film" disabled value="<?=$data['id_film']?>" ></td>
			</tr>
			<tr>
				<td>JUDUL FILM</td>
				<td>:</td>
				<td><input type="text" name="judul" value="<?=$data['judul_film']?>"></td>
			</tr>
			<tr>
				<td>SINOPSIS FILM</td>
				<td>:</td>
				<td><textarea form="isi_form" name="sinopsis" rows="10" cols="30" style="resize: none;" ><?=$data['sinopsis_film']?></textarea> </td>
			</tr>
			<tr>
				<td>RATING FILM</td>
				<td>:</td>
				<td><select name="rating">
					<?php
					for ($i=0; $i < 3; $i++) { 
						if ($data['rating_film']==$rat_film[$i]) {
							?><option selected value="<?= $rat_film[$i] ?>"><?= $rat_film[$i]; ?></option><?php
						}else{
							?><option value="<?= $rat_film[$i]; ?>"><?= $rat_film[$i]; ?></option><?php
						}
					}
					?>
				</select></td>
			</tr>
			<tr>
				<td>KATEGORI FILM</td>
				<td>:</td>
				<td>
					
							<?php
								for ($i=0; $i < 8; $i++) { 
									if (strstr($data['kategori_film'], $kat_film[$i])) {
										?><input checked type="checkbox" name="kategori[]" value="<?= $kat_film[$i]; ?>"><?= $kat_film[$i]; ?><br><?php

									}else{
										?><input type="checkbox" name="kategori[]" value="<?= $kat_film[$i]; ?>"><?= $kat_film[$i]; ?><br><?php
									}
								}
							?>
				</td>
			</tr>
			<tr>
				<td>GAMBAR</td>
				<td>:</td>
				<td><?= '<img src="data:image/jpeg;base64,'.base64_encode($data['gambar_film']).'"  height="200px" width="140px" />'; ?><br><input type="file" name="gambar"></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="submit" value="SUBMIT">
					<a href="hal_manajemen.php"><BUTTON>KEMBALI</BUTTON></a></td>
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
			$sql1 = mysqli_query($connect, "select * from film");
			while ($data = mysqli_fetch_array($sql1)) { ?>
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