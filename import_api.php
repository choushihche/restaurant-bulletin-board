<?php
include("dblink.php");

//error_reporting(0);// 匯入csv格式的檔案


$fname = $_FILES['myfile']["tmp_name"];
$handle = fopen($fname,"r");

while($data = fgetcsv($handle,10000,",")){
	echo $data[0];
	$sql = $pdo->prepare("insert into ip_list (ip) values (?)");
	$sql->execute([$data[0]]);
}

fclose($handle);

if ($sql){
	echo"匯入資料成功<br>";
}else{
	echo "fall";
}
?>