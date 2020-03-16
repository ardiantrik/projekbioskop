<?php
session_start();
if (empty($_SESSION['name'])) {
	echo "<script>window.location='hal_login_admin.php'</script>";
}
?>