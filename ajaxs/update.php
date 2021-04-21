<?php
if(isset($_POST['table'],$_POST['name'],$_POST['val'],$_POST['where']))
{	
	$table = $_POST['table'];
	$name = $_POST['name'];
	$val = $_POST['val'];
	$where = $_POST['where'];
	if($val >= 0)
	{
		include("../libs/config.php");
		include("../libs/opendb.php");
		$stmt = mysql_query("update {$table} set $name = '$val' $where");
		if($stmt) echo 'success';
		else echo 'somthingwrong';
		include("../libs/closedb.php");
	}
	else echo 'invalidinput';
   exit;
}
?>