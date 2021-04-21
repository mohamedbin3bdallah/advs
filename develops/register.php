<?php
include('libs/database.php');
include('languages/'.$lang.'.php');

$system = getRowFromTable('*','system','where id = 1','');
$thispage = getRowFromTable('*','pages','where page like "register.php"','');

if(isset($_POST['submit']))
{
	unset($_POST['submit']);

	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false && $_POST['password'] != '' && $_POST['username'] != '')
	{
		if(strlen($_POST['username']) < 5 || exist('users','where username like "'.$_POST['username'].'"')) header('Location: register.php?message=m3');
		else
		{
			if(exist('users','where email like "'.$_POST['email'].'"')) header('Location: register.php?message=m4');
			else
			{
				$_POST['password'] = hash('sha256', $_POST['password'], FALSE);
				//$_POST['code'] = uniqid(mt_rand(111111111,999999999));
				$_POST['active'] = 1;
				$_POST['time'] = time();
				//print_r($_POST);
				if(insertRow('users',$_POST))
				{
					//sendemail($_POST);
					header('Location: register.php?message=m6');
				}
				else header('Location: register.php?message=m2');
			}
		}
	}
	else header('Location: register.php?message=m1');
}
?>