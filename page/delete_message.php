<?php
	include("../dblink.php");
	$sql = $pdo->prepare("call delete_message(?)");
	$sql->execute([$_REQUEST["id"]]);
	echo "<script>alert('刪除成功'); location.href='home.php?id=0';</script>;";;
?>