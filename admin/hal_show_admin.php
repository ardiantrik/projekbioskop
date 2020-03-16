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
				<th width="10%">Poster</th>
				<th>Judul Film</th>
				<th>Jam Tayang</th>
				<th>Slot</th>
				<th>Opsi</th>
			</tr>

			<?php
					$sql=mysqli_query($connect,"select * from show_film s inner join film f where s.id_film=f.id_film");
					while ($data=mysqli_fetch_array($sql))
					{?>
						<tr>
							<td width="10%"><?= '<img src="data:image/jpeg;base64,'.base64_encode($data['gambar_film']).'"  height="200px" width="140px" />'; ?></td>
							<td align="up-right"><?php echo $data['judul_film']; ?></td>
							<td><?php echo $data['waktu_show']; ?></td>
							<td><?php 
									if ($data['slot_show']==0) {
										echo "HABIS";
									}else echo $data['slot_show']; ?>
							</td>
							<td><a href="edit_show.php?id=<?= $data['id_show']; ?>"><button>EDIT</button></a>
								<a href="delete_show.php?id=<?= $data['id_show']; ?>"><button>HAPUS</button></a></td>
						</tr>
						<?php } ?>

		</table>
			</td></tr>
		</table>
	
	
	</center>
	
</body>
</html>