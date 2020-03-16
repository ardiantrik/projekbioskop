<!DOCTYPE html>
<html>
<head>
	<title>ADMIN MANAJEMEN</title>
	<link href="style.css" rel='stylesheet' type='text/css' />
</head>
<?php
	include "session_checker.php";
	include "koneksi.php";
	$name=$_SESSION['name'];

?>
<body>
	<a href="cek_logout.php" style="float: right;"><button>LOG OUT</button></a>
	<a style="float: right;"><?php echo "Admin $name ";?><br></a>
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
				<table width="100%" border="1">
			<tr>
				<th>ID BOOK</th>
				<th>NAMA</th>
				<th>FILM</th>
				<th>STUDIO</th>
				<th>TANGGAL</th>
				<th>WAKTU</th>
				<th>KURSI</th>
			</tr>
			<?php
					$sql=mysqli_query($connect,"select b.id_booking, m.nama_member, f.judul_film, b.studio_show, b.tanggal_show, b.waktu_show, b.kursi_booking from book b, member m, film f where b.id_member=m.id_member and b.id_film=f.id_film ");
					while ($data=mysqli_fetch_array($sql))
					{ ?>
						<tr>
							<td><?php echo $data['id_booking']; ?></td>
							<td><?php echo $data['nama_member']; ?></td>
							<td><?= $data['judul_film']; ?></td>
							<td><?= $data['studio_show']; ?></td>
							<td><?= $data['tanggal_show']; ?></td>
							<td><?= $data['waktu_show']; ?></td>
							<td><?= $data['kursi_booking']; ?></td>
						</tr>
						<?php } ?>

		</table>
			</td></tr>
		</table>
	
	
	</center>
	
</body>
</html>