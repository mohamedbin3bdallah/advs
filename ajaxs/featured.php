<?php
if(isset($_POST['id'],$_POST['value']))
{	
	$id = $_POST['id'];
	$value = $_POST['value'];
	include("../libs/config.php");
	include("../libs/opendb.php");	
	$stmt = mysql_query("update ads set featured = '$value' where id = '$id'");
	if($stmt) echo 1;
	else echo 0;
	include("../libs/closedb.php");
   exit;
}
?>