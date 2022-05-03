
<?php
	 
 	include("../dblink.php");
	/*if (!$link ) {
   		echo "MySQL資料庫連接錯誤!<br/>";
   exit();
	}
	else {
   		echo "MySQL資料庫test連接成功!<br/>";
	}*/
	$sql = $pdo->prepare("insert into member (Name, Password, Phone, Mail) values(?,?,?,?)");
	$sql->execute([$_POST["user"],$_POST["password"],$_POST["phone"],$_POST["mail"]]);

	echo "<script>alert('註冊成功'); location.href='login.php';</script>;";
	 
?>