<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>GANOOL</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo base_url()."assets/";?>css/style.css" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo base_url()."assets/";?>js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/";?>s/jquery-func.js"></script>
<!--[if IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
</head>
<?php
	if ($data['hari_show'] == 'Friday') {
		$tiket = 35000;
	}else if ($data['hari_show'] == 'Saturday' || $data['hari_show'] == 'Sunday') {
		$tiket = 40000;
	}else {
		$tiket = 30000;
	}
?>
<body>
<!-- START PAGE SOURCE -->
<div id="shell">
  <div id="header">
    <h1 id="logo"><a href="#">BIOSKOP GANOOL</a></h1>
    <div class="social"> <span>FOLLOW US ON:</span>
      <ul>
        <li><a class="twitter" href="#">twitter</a></li>
        <li><a class="facebook" href="#">facebook</a></li>
        <li><a class="vimeo" href="#">vimeo</a></li>
        <li><a class="rss" href="#">rss</a></li>
      </ul>
    </div>
    <div id="navigation">
      <ul>
        <li><a href="<?php echo base_url()."index.php/welcome/show_home/"; ?>">HOME</a></li>
        <li><a href="<?php echo base_url()."index.php/welcome/show_profil/"; ?>">PROFIL</a></li>
        <li><a class="active" href="<?php echo base_url()."index.php/welcome/show_film/?cari="; ?>">IN THEATERS</a></li>
        <li><a href="#">COMING SOON</a></li>
        <li><a href="#">CONTACT</a></li>
        <li><a href="<?php echo base_url()."index.php/welcome/do_logout/"; ?>">LOGOUT</a></li>
      </ul>
    </div>
    <div id="sub-navigation">
      
    </div>
  </div>
  <div id="main">
    <div id="content" >
      <center>
		
		<br>
		
		<table>
			<tr>
				<td><?= '<img src="data:image/jpeg;base64,'.base64_encode($data['gambar_film']).'"  height="300px" width="200px" />'; ?></td>
				<td><h3><?= $data['judul_film']?></h3><br><?= $data['sinopsis_film']?><br>
					<form method="POST" onsubmit="return confirm('Anda yakin data kursi, waktu tayang, dan lain-lain sudah benar? OK jika yakin dan cancel jika belum yakin');" action="<?php echo base_url()."index.php/welcome/do_book/"; ?>">
	<input type="hidden" name="id_show" value="<?= $data['id_show']; ?>">
	<input type="hidden" name="id_film" value="<?= $data['id_film']; ?>">
	<table border="2">

		<tr>
			<td>Waktu Tayang</td>
			<td>:</td>
			<td><?= $data['waktu_show'] ?></td>
		</tr>
		<tr>
			<td>Slot Seat</td>
			<td>:</td>
			<td><?= $data['slot_show'] ?></td>
		</tr>
		<tr>
			<td>Harga Satuan</td>
			<td>:</td>
			<td><?= $tiket ?></td>
		</tr>
		<tr>
			<td>Pilih Seat</td>
			<td>:</td>
			<td>
				<table>
					<tr>
						====L A Y A R====
					</tr>
				<tr>
					<td></td>
					<td>1</td>
					<td>2</td>
					<td>3</td>
					<td>4</td>
					<td>5</td>
				</tr>
				
					<?php
					$id = $data['id_show'];
					$connect = mysqli_connect("localhost","root","","projek_bioskop");
					$sql_kursi = mysqli_query($connect, "select kursi_booking from book where id_show='$id'");
					$kursi[0]="XX";
					$n=0;
					while($data_k = mysqli_fetch_array($sql_kursi)){
						$kursi[$n] = $data_k['kursi_booking'];
						$n++;
					}
					

						for ($i=1; $i <=5; $i++) { 
							?><tr>
							<td><?= chr(65+$i-1);?></td><?php 
							for ($j=1; $j<=5 ; $j++) { 
								$val = chr(65+$i-1).$j;		
								if (in_array($val, $kursi,true)) {
									?>
										<td><input style="opacity: 0.2;" disabled type="checkbox" name="seat[]" value="<?= $val;?>"></td>
									<?php 
								}else{
									?>
										<td><input type="checkbox" name="seat[]" value="<?= $val;?>"></td>
									<?php
								}

							}
							?> </tr> <?php
						}

					?>
				
				</table>
				
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="submit" name="submit" value="PESAN"></td>
			
		</tr>
	</table>
</form>
				</td>
			</tr>
		</table>

	</center>
      
    </div>
    <div class="cl">&nbsp;</div>
  </div>
  <div id="footer">
    <p class="lf">Copyright &copy; 2010 <a href="#">SiteName</a> - All Rights Reserved</p>
    <p class="rf">Design by <a href="http://chocotemplates.com/">ChocoTemplates.com</a></p>
    <div style="clear:both;"></div>
  </div>
</div>
<!-- END PAGE SOURCE -->
</body>
</html>