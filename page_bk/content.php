<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>MontrezVosSeins // homepage</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">


</head>

<?php
	include("style.php");
?>

<body>

<br>

<center>

<!-- Main Table -->

<table border="0" cellpadding="1" cellspacing="0"  width="670"><tr><td colspan="2">

<!-- Header --> 

<?php include("header.php"); ?>

<!-- End Header -->  			

</td></tr>

<tr><td>

<!-- Menu -->
<?php
	include("menu.php");
?>

<!-- End Menu -->

</td></tr>

<tr><td colspan="2">

<!-- Main Field -->

<br>
<table border="0" cellpadding="1" cellspacing="0" bgcolor="#000000" width="100%"><tr><td>
<table border="0" cellpadding="0" cellspacing="10" width="100%" bgcolor="#dcdcdc">

<tr><td width="160" valign="top" style="position: relative;left: 5px;">



<table border="0" cellpadding="0" cellspacing="0"><tr><td>
	
</td>

<td valign="top">

<!-- Right -->
<br>

<h4>文章內容:</h4><br>
<?php
	include("../dblink.php");
	$type = $_REQUEST["type"];
	$id = $_REQUEST["id"];
	$sql = $pdo->prepare("select * from message where Group_id = $type and Sid = $id");
	$sql->execute();
	foreach($sql as $row)
		echo "<h5 style='position:relative;left: 120px;'>".$row[2]."</h5>";

	
?>

<!-- End Right -->
<!--<button onclick='edit(<?php echo $type; ?>,<?php echo $id; ?>)'>編輯</button>-->
</td></tr></table>
</td></tr></table>

<!-- End Mainfield -->

</td></tr>
<tr><td colspan="2" width="100%">

<table border="0" cellpadding="1" cellspacing="0" bgcolor="#000000" width="100%"><tr><td>
<table border="0" width="100%" cellpadding="0" cellspacing="0"><tr>
                  <td  bgcolor="#354463" align="right" class="infohead" width="100%">© 
                    copyright 2002 John Doe aka MontrezVosSeins<br>
                    
<!--This theme is free for distriubtion,  so long as  link to openwebdesing.org and www.best10webhosting.net  stay on the theme-->
Courtesy of <a href="http://www.openwebdesign.org" target="_blank">Open Web Design</a> &amp; <a href="http://www.dubaiapartments.biz/hotels/" target="_blank">Hotels - Dubai</a> </td>
</tr></table>
</td></tr></table>

</table>

<!-- End Main Table -->

</center>

<br>
<script>
	function edit(type,id){
		location.href="edit.php?type="+type+"&id="+id;
	}
</script>	
</body>
</html>
