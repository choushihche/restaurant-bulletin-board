<?php
	session_start();
	unset($_SESSION["customer"]);
	echo "<script>alert('登出成功'); location.href='../login/login.php';</script>;";
?>