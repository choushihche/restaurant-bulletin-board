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

<table class="table" ><tr><td colspan="2">

<!-- Header --> 

<?php include("header.php"); ?>

<!-- End Header -->  			

<tr><td>

<!-- Menu -->
<?php
	include("menu.php");
?>

<!-- End Menu -->

</td></tr>

<tr><td colspan="2">

<!-- Main Field -->
<?php
	/*include("../dblink.php");
	$sql = $pdo->prepare("select * from message where Sid = ?");
	$sql->execute([$_REQUEST["id"]]);
	foreach ($sql as $row) {
		$id = $row[0];
		$title = $row[1];
		$content = $row[2];
		$type = $row[3];
	}*/
	$id = $_REQUEST["id"];
	$parent = $_REQUEST["parent"];
	$content = $_REQUEST["content"];
	$url = "update_message.php?id=".$id;
?>
<form method="POST" action="<?php echo $url; ?>">
	
	  
	 <!-- <div class="form-group" style="width:500px;">
	    <label for="exampleFormControlSelect1">文章類別</label>
	    <select class="form-control" name="parent" value=<?php echo $parent;?>>
	      <option></option>
	      <option value="1">本週菜單</option>
	      <option value="2">綠色校園</option>
	      <option value="3">校園活動</option>
	      <option value="4">處室宣導</option>
	      
	    </select>
	  </div>-->
	  
	  <div class="form-group" style="width:500px;">
	    <label for="exampleFormControlTextarea1">內容</label>
	    <textarea class="form-control" name="content" rows="8" placeholder="輸入文章內容"><?php echo $content;?></textarea>	  	
	  </div>
	  <input type="submit" class="btn btn-primary" value="更新" style="position: relative;left: 441px;">
	 
	
</form>

<!-- End Right -->


</table>

<!-- End Mainfield -->

</td></tr>






<!-- End Main Table -->

</center>

<br>

</body>
</html>
