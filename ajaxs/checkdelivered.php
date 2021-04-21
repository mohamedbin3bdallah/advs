<?php
if(isset($_POST['id'],$_POST['delivered'],$_POST['userid']))
{	
	$id = $_POST['id'];
	$delivered = $_POST['delivered'];
	$userid = $_POST['userid'];
	$dtime = time();
	include("../libs/config.php");
	include("../libs/opendb.php");	
	$stmt = mysql_query("update orders set delivered = 1 , dtime = '$dtime' where id = '$id'");
	if($stmt)
	{
		$stmt2 = mysql_query("update users set paycourses = paycourses+1 where id = '$userid'");
		echo 1;
	}
	else echo 0;
	include("../libs/closedb.php");
   exit;
}
?>