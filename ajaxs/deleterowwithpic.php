<?php
if(isset($_POST['id'],$_POST['pic'],$_POST['currenttable']))
{	
	$id = $_POST['id'];
	$pic = $_POST['pic'];
	$currenttable = $_POST['currenttable'];
	include("../libs/config.php");
	include("../libs/opendb.php");
	$stmt = mysql_query("delete from {$currenttable} where id = '$id'");
	if($stmt)
	{		
		unlink($pic);
		echo 1;
	}
	else echo 0;
	include("../libs/closedb.php");
   exit;
}
?>