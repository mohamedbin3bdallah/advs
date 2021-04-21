<?php
if(isset($_POST['id'],$_POST['picture'],$_POST['field'],$_POST['currenttable'],$_POST['childtable']))
{	
	$id = $_POST['id'];
	$field = $_POST['field'];
	$currenttable = $_POST['currenttable'];
	$childtable = $_POST['childtable'];
	include("../libs/config.php");
	include("../libs/opendb.php");
	$result = mysql_query("select count(*) as count from {$childtable} where $field = '$id'");
	$row = mysql_fetch_array($result);
	if($row['count'] == 0)
	{
		$stmt = mysql_query("delete from {$currenttable} where id = '$id'");
		unlink('../uploads/categories/'.$_POST['picture']);
		echo 1;
	}
	else echo 0;
	include("../libs/closedb.php");
   exit;
}
?>