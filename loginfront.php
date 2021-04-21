<?php
include('libs/database.php');
include('languages/'.$lang.'.php');

$system = getRowFromTable('*','system','where id = 1','');
$thispage = getRowFromTable('*','pages','where page like "login.php"','');

if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	if($_POST['username'] != '' && $_POST['password'] != '')
	{
		$_POST['password'] = hash('sha256', $_POST['password'], FALSE);
		$user = getRowFromTable('id,active','users',' where username like "'.$_POST['username'].'" and password like "'.$_POST['password'].'"','');

		if(!empty($user))
		{
			if($user['active'] == 1)
			{
				$_SESSION['userid'] = $user['id'];
				header('Location: ads.php');
			}
			else header('Location: login.php?message=3');
		}
		else header('Location: login.php?message=2');
	}
	else header('Location: login.php?message=1');
}
?>