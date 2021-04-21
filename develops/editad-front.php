<?php
include('libs/database.php');
include('classes/ResizeImage.php');
include('languages/'.$lang.'.php');

$system = getRowFromTable('*','system','where id = 1','');
$thispage = getRowFromTable('*','pages','where page like "editad.php"','');

$ad = getRowFromTable('*','ads','where id = '.$_GET['id'],'');
//if(isset($ad['orderid']) && $ad['orderid'] != '') $order = getRowFromTable('orders.renumber as renumber,plans.title as title,plans.fees as fees','orders','inner join plans on orders.planid = plans.id where orders.id = '.$ad['orderid'],'');

if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	//if($_POST['orderid'] != ' ' && $_POST['title'] != ' ' && $_POST['description'] != ' ')
	if($_POST['title'] != ' ' && $_POST['description'] != ' ')
	{
		$_POST['time'] = time();
		if($_FILES['file']['error'] == 0)	{ unlink('uploads/ads/'.$_POST['oldpicture']); $_POST['picture'] = uploadpicdynamic('file','ads','500','500','exact'); }
		else $_POST['picture'] = $_POST['oldpicture'];
		if(update('ads','set title = "'.$_POST['title'].'",description = "'.$_POST['description'].'" , picture = "'.$_POST['picture'].'" ,time = "'.time().'",active = "0"','where id = '.$_GET['id']))
		{ $_SESSION['time'] = time(); $_SESSION['message'] = 'success'; header('Location: editad.php?id='.$_GET['id']); }
		else { $_SESSION['time'] = time(); $_SESSION['message'] = 'somthingwrong'; header('Location: editad.php?id='.$_GET['id']); }
	}
	else { $_SESSION['time'] = time(); $_SESSION['message'] = 'invalidinput'; header('Location: editad.php?id='.$_GET['id']); }
}
?>