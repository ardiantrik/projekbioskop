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
        <li><a class="active" href="<?php echo base_url()."index.php/welcome/show_profil/"; ?>">PROFIL</a></li>
        <li><a href="<?php echo base_url()."index.php/welcome/show_film/?cari="; ?>">IN THEATERS</a></li>
        <li><a href="#">COMING SOON</a></li>
        <li><a href="#">CONTACT</a></li>
        <li><a href="<?php echo base_url()."index.php/welcome/do_logout/"; ?>">LOGOUT</a></li>
      </ul>
    </div>
    <div id="sub-navigation">
      
    </div>
  </div>
  <div id="main">
    <div id="content" style="background-color: rgba(64, 64, 64, 0.8);
    border-radius: 10px;">
      <center>
		<h1>PROFIL MEMBER</h1>
		<table border="1">
			<tr>
				<td colspan="3">Hai, <?= $_SESSION['nama_member']; ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><?= $_SESSION['email_member']; ?></td>
			</tr>
			<tr>
				<td>Total Saldo</td>
				<td>:</td>
				<td><?php 
					$connect = mysqli_connect("localhost","root","","projek_bioskop");
					$sql = mysqli_query($connect, "select saldo_member from member where id_member='$_SESSION[id_member]'"); 

					$data_m = mysqli_fetch_array($sql);
					echo $data_m['saldo_member'];
					?></td>
			</tr>
		</table>
		<p>
	<table border="2">
		<tr>
			<th>No.</th>
			<th>FILM</th>
			<th>TANGGAL</th>
			<th>WAKTU</th>
			<th>SEAT</th>
			<th>HARGA</th>
			<th>OPSI</th>
		</tr>
		<?php 
		$no=1;
		foreach ($data as $data) { ?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= $data['judul_film']; ?></td>
				<td><?= $data['tanggal_show']; ?></td>
				<td><?= $data['waktu_show']; ?></td>
				<td><?= $data['kursi_booking']; ?></td>
				<td><?= $data['harga_booking']; ?></td>
				<td><button onclick="fungsiRefund()">REFUND</button></td>
				<script>
				function fungsiRefund() {
				
    				var r = confirm("Anda Yakin Ingin Refund?");
    				if (r == true) {
    					window.location.href = "<?php echo base_url()."/index.php/welcome/do_refund/".$data['id_booking']; ?>";
    				} else {
        
    				}
    			
    		}
</script>
				
			</tr>
	<?php	}

		?>
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