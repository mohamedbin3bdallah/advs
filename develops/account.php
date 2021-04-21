<?php
include('libs/database.php');

if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	if($_POST['username'] != '' && !preg_match('/[^a-z]/',$_POST['username']))
	{
		$set = 'set username = "'.$_POST['username'].'"';
		if($_POST['password'] != '') {  $_POST['password'] = hash('sha256', $_POST['password'], FALSE); $set .= ',password = "'.$_POST['password'].'"'; }
		if(update('admins',$set,' where id = '.$_SESSION['admin'])) { $_SESSION['time'] = time(); $_SESSION['message'] = 'success'; header('Location: admin.php?c=account'); }
		else { $_SESSION['time'] = time(); $_SESSION['message'] = 'somthingwrong'; header('Location: admin.php?c=account'); }
	}
	else { $_SESSION['time'] = time(); $_SESSION['message'] = 'inputnotcorrect'; header('Location: admin.php?c=account'); }
}

$row = getRowFromTable('username','admins',' where id = '.$_SESSION['admin'],'');

?>