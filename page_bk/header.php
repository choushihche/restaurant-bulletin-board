<table border="0" cellpadding="1" cellspacing="0" bgcolor="#000000" width="100%"><tr><td>

<table border="0" cellpadding="0" cellspacing="0" bgcolor="#808080" width="100%" height="70">
  
	
	
	<tr>
	  
	  	<?php
	  		include("../dblink.php");
	  		
	  		if($_REQUEST["id"]==0)
	  			echo "<td bgcolor='#354463'><h3 class='small'>首頁";
	  		else{	  			
	  			$sql = $pdo->prepare("select * from menu_item where id = ?");
	  			$sql->execute([$_REQUEST["id"]]);
	  			$content = '';
	  			foreach ($sql as $row ) {
	  				$content = $row[1];
	  			}
	  			echo "<td bgcolor='#354463'><h3 class='small'>".$content; 	  			
	  		}
	  	?>
	  		
	  	</h3></td>
	</tr>
  
			

</table>

</td></tr></table>