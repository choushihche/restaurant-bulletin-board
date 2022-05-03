<?php
	include("style.php");
	include("../dblink.php");
	
	//echo "<table class='table table-striped' border='0'";
	echo "<thead><tr><th width='100'>分類</th><th width='770'>發布內容</th><th width='180'>更新時間</th><th width='100'></th></tr></thead>";               	 
	echo "<tbody>";
	if($_REQUEST["id"]==0){
		$sql = $pdo->prepare("call get_message_list()");
		$sql->execute();
		foreach ($sql as $row ) {
		 	echo "<tr class='list'>";	 	
		 	echo "<td>";
		 	if($row[2]=="1"){
		 		echo "本週菜單";
		 	}
		 	elseif($row[2]=="2"){
		 		echo "綠色校園";
		 	}
		 	elseif($row[2]=="3"){
		 		echo "校園活動";
		 	}
		 	elseif($row[2]=="4"){
		 		echo "處室宣導";
		 	}
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
		 	if($row[2]=="1"){
		 		echo "本週菜單";
		 	}
		 	elseif($row[2]=="2"){
		 		echo "綠色校園";
		 	}
		 	elseif($row[2]=="3"){
		 		echo "校園活動";
		 	}
		 	elseif($row[2]=="4"){
		 		echo "處室宣導";
		 	}
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