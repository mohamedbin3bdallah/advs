<?php
include('libs/database.php');
include('languages/'.$lang.'.php');

$thispage = getRowFromTable('*','pages','where page like "contact.php"','');
$system = getRowFromTable('*','system','where id = 1','');

$contact = getRowFromTable('address,phone,mobile,email','contact','where id = 1','');

if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	if($_POST['name'] != ' ' && $_POST['phone'] != ' ' && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false && $_POST['message'] != ' ')
	{
		if(sendemail_admin('info@advs.com','Contact Form',$_POST['name'].' with Phone : '.$_POST['phone'].' and Email : '.$_POST['email'].' send you this message : '.$_POST['message']))	{ $_SESSION['time'] = time(); $_SESSION['message'] = 'success'; header('Location: contact.php'); }
		else { $_SESSION['time'] = time(); $_SESSION['message'] = 'somthingwrong'; header('Location: contact.php'); }
	}
	else { $_SESSION['time'] = time(); $_SESSION['message'] = 'invalidinput'; header('Location: contact.php'); }
}
?>