<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>HOME GANOOL</title>
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
        <li><a class="active" href="<?php echo base_url()."index.php/welcome/index/?cari="; ?>">IN THEATERS</a></li>
        <li><a href="<?php echo base_url()."index.php/welcome/show_login/"; ?>">LOGIN</a></li>
      </ul>
    </div>
    <div id="sub-navigation">
      
      <div id="search">
        <form action="#" method="get" accept-charset="utf-8">
          <label for="search-field">SEARCH</label>
          <input type="text" name="cari" placeholder="Cari Film Disini!" id="search-field" class="blink search-field"  />
          <input type="submit" value="GO!" class="search-button" />
        </form>
      </div>
    </div>
  </div>
  <div id="main">
    <div id="content" style="background-color: rgba(64, 64, 64, 0.8);
    border-radius: 10px;">
      <table width="100%" >
			<tr>
				<th width="10%">Poster</th>
				<th>Judul Film</th>
				<th>Waktu Tayang</th>
				<th>Slot</th>
				<th width="10%">Pesan</th>
			</tr>
			<?php foreach ($data as $data) { ?>
				<tr>
					<td width="10%"><?= '<img src="data:image/jpeg;base64,'.base64_encode($data['gambar_film']).'"  height="200px" width="140px" />'; ?></td>
					<td align="up-right"><?php echo $data['judul_film']; ?></td>
					<td><?php echo $data['waktu_show']; ?><br><?php echo $data['hari_show'].", ".$data['tanggal_show']; ?></td>
					<td><?php if ($data['slot_show']==0) {
								echo "HABIS";
								}else echo $data['slot_show']; ?>
					</td>
					<td><a href="<?php echo base_url()."index.php/welcome/show_login/"; ?>" ><button>HARAP LOGIN</button></a></td>
				</tr>
			<?php } ?>

		</table>
      
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