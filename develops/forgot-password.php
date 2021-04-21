<?php
include('libs/database.php');
include('languages/'.$lang.'.php');

$system = getRowFromTable('*','system','where id = 1','');
$thispage = getRowFromTable('*','pages','where page like "forgot-password.php"','');

if(isset($_POST['submit']))
{
	unset($_POST['submit']);

	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false)
	{
		if(exist('users','where email like "'.$_POST['email'].'"'))
		{
			$password = randomCode(9);
			$passwordhash = hash('sha256', $password, FALSE);
			if(update('users','set password = "'.$passwordhash.'"','where email like "'.$_POST['email'].'"') && sendemail_admin($_POST['email'],'New Password','Your New Password Is   '.$password)) header('Location: forgot-password.php?message=m3');
			else header('Location: forgot-password.php?message=m4');
		}
		else header('Location: forgot-password.php?message=m2');
	}
	else header('Location: forgot-password.php?message=m1');
}
?>