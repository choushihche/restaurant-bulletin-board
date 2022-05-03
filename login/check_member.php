<?php 
	session_start();
	//echo $_POST["user"];
	unset($_SESSION["customer"]);
	include("../dblink.php");
	$sql = $pdo->prepare("select * from member where Name=? and Password=?");
	$sql->execute([$_POST["user"],$_POST["password"]]);
	$rows = $sql->rowCount();  
	
	if($rows){
		//$sql2 = $pdo->prepare("select * from member where Name=? and Password=?");
		//$sql2->execute([$_POST["user"],$_POST["password"]]);
		foreach ($sql as $row) {
			
			$_SESSION["customer"]=['name'=>$row["Name"],'password'=>$row["Password"],'phone'=>$row["Phone"],'mail'=>$row["Mail"]];

		}
		echo "<script>alert('登入成功'); location.href='../page/home.php?id=0';</script>;";
	}else{
		echo "<script>alert('帳號密碼錯誤'); location.href='login.php';</script>;";
		//header("Location: http://localhost/php/login.php");
	}   
?>

