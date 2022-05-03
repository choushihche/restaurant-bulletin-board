<?php
	$dsn = "mysql:host=localhost;dbname=talkingboard;charset=utf8";
	$username = "root";
	$password = "";
	//*A66A40E832500675C291162A8B262C573DE3E2FF
	$pdo = new PDO($dsn, $username, $password);

	//if($pdo)
//		echo "success";
//	else
//		echo "fail";
	

	
	/*$stmt = $pdo->prepare("CALL get_group_list()");
	
	$stmt->execute();
	foreach ($stmt as $key) {
	 	# code...
	 echo $key[1];
	 }*/ 
	
?>