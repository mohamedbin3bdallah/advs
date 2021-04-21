<?php

if(isset($_POST['table'],$_POST['field'],$_POST['val']))
{
	$table = $_POST['table'];
	$field = $_POST['field'];
	$val = $_POST['val'];
	include("../libs/config.php");
	include("../libs/opendb.php");
	$result = mysql_query("select * from {$table} where $field = '$val' order by title ASC");
	if(!empty($result))
	{
		echo '<option value="">Select</option>';
		for($i=0; $row = mysql_fetch_array($result); $i++)
		{
			echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
		}
	}
	else echo 0;
	exit;
}
?>