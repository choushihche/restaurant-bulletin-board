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
<?php include("new_message.php"); ?>
<?php //echo $_REQUEST["group_id"]; ?>
<br>


<table class="table table-striped" border="1" bgcolor="#dcdcdc">
	


<!-- Right -->
<br>

<?php include("show_list.php"); ?>

<!-- End Right -->


</table>

<!-- End Mainfield -->

</td></tr>






<!-- End Main Table -->

</center>

<br>

</body>
</html>
