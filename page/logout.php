<?php
	session_start();
	unset($_SESSION["customer"]);
	echo "<script>alert('η»εΊζε'); location.href='../login/login.php';</script>;";
?>