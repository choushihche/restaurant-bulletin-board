<?php
	include("style.php");
	include("../dblink.php");
	
	echo "<table cellspacing='0' width='100%'";
	echo "<thead><tr><th width='50'>編號</th><th width='770'>發布內容</th><th width=80'>更新時間</th><th width='100'></th></tr></thead>";               	 
	echo "<tbody>";
	if($_REQUEST["id"]==0){
		$sql = $pdo->prepare("call get_message_list()");
		$sql->execute();
		foreach ($sql as $row ) {
		 	echo "<tr class='list'>";	 	
		 	echo "<td>";
		 	echo $row[0];
		 	echo "</td>";
		 	//echo "<td><a href='content.php?type=".$row[3]."&id=".$row[0]."&=0'>";
		 	echo "<td>";
		 	echo $row[1];
		 	echo "</td>";
		 	echo "<td>";
		 	echo $row[5];
		 	echo "</td>";
		 	echo "<td>";
		 	echo "<a href='edit.php?parent=".$row[2]."&id=".$row[0]."&content=".$row[1]."'><u>修改</u></a>";
		 	echo "	";
		 	echo "<a href='delete_message.php?id=".$row[0]."'><u>刪除</u></a>";
		 	echo "</td>";
		 	echo "</tr>";

		 }  
	}
	else{
		$sql = $pdo->prepare("call get_list_of_message_in_group(?)"); 
		$sql->execute([$_REQUEST["id"]]);
		foreach ($sql as $row ) {
		 	echo "<tr class='list'>";	 	
		 	echo "<td>";
		 	echo $row[0];
		 	echo "</td>";
		 	//echo "<td><a href='content.php?type=".$row[3]."&id=".$row[0]."&parent=".$_REQUEST["id"]."'>";
		 	echo "<td>";
		 	echo $row[1];
		 	echo "</td>";
		 	echo "<td>";
		 	echo $row[5];
		 	echo "</td>";
		 	echo "<td>";
		 	echo "<a href='edit.php?parent=".$row[2]."&id=".$row[0]."&content=".$row[1]."'><u>修改</u></a>";
		 	echo "	";
		 	echo "<a href='delete_message.php?id=".$row[0]."'><u>刪除</u></a>";
		 	echo "</td>";
		 	echo "</tr>";
		 } 
	}
	echo "</tbody></table>";

?>