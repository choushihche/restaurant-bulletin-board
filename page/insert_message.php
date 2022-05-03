<?php
	include("../dblink.php");
	session_start();
	if($_POST["type_id"]=='' or $_POST["content"]=='')
		echo "<script>alert('請輸入文章類別及內容'); location.href='home.php?group_id=0';</script>";
	else{
		$sql = $pdo->prepare("call new_message(?,?)");
		$sql->execute([$_POST["content"],$_POST["type_id"]]);
		echo "<script>alert('新增成功'); location.href='home.php?id=0';</script>";
	}

?>