<?php
session_start();
if(isset($_GET['id']) && abs((int)($_GET['id'])) > 0)
{
	$lang = 'ar';
	$_GET['id'] = abs((int)($_GET['id']));
	include('libs/database.php');
	include('languages/'.$lang.'.php');

	$ad = getRowFromTable('userid,picture','ads','where id = '.$_GET['id'],'');

	if(!empty($ad) && isset($_SESSION['userid']) && $_SESSION['userid'] == $ad['userid'])
	{
		if(deleterow('ads','where id = '.$_GET['id']) && unlink('uploads/ads/'.$ad['picture']))	{ $_SESSION['time'] = time(); $_SESSION['message'] = 'success'; header('Location: ads.php'); }
		else { $_SESSION['time'] = time(); $_SESSION['message'] = 'somthingwrong'; header('Location: ads.php'); }
	}
	else { $_SESSION['time'] = time(); $_SESSION['message'] = 'somthingwrong'; header('Location: ads.php'); }
}
else { $_SESSION['time'] = time(); $_SESSION['message'] = 'invalidinput'; header('Location: ads.php'); }
?>