<?php
	include("../dblink.php");
	if($_POST["content"]=='')
		echo "<script>alert('請輸入文章內容'); location.href='home.php?id=0';</script>";
	else{
		$sql = $pdo->prepare("call update_message_content(?,?)");
		$sql->execute([$_REQUEST["id"],$_POST["content"]]);

		echo "<script>alert('更新成功'); location.href='home.php?id=0';</script>";
	}
?>