<?php
include('libs/database.php');
include('classes/ResizeImage.php');
include('languages/'.$lang.'.php');

$thispage = getRowFromTable('*','pages','where page like "addad.php"','');
$system = getRowFromTable('*','system','where id = 1','');
//$orders = getAllDataFromTable('orders.id as id,orders.renumber as renumber,orders.dtime as dtime,plans.title as title,plans.fees as fees','orders','inner join plans on orders.planid = plans.id where orders.renumber > 0 and orders.delivered = 1 and orders.userid = '.$_SESSION['userid'],'');

if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	//if($_POST['orderid'] != ' ' && $_POST['title'] != ' ' && $_POST['description'] != ' ')
	if($_POST['title'] != ' ' && $_POST['description'] != ' ')
	{
		$_POST['userid'] = $_SESSION['userid'];
		$_POST['time'] = time();
		if($_FILES['file']['error'] == 0)	$_POST['picture'] = uploadpicdynamic('file','ads','500','500','exact');
		//if(insertRow('ads',$_POST))	{ update('orders','set renumber = renumber-1','where id = '.$_POST['orderid']); $_SESSION['time'] = time(); $_SESSION['message'] = 'success'; header('Location: addad.php'); }
		if(insertRow('ads',$_POST))	{ $_SESSION['time'] = time(); $_SESSION['message'] = 'success'; header('Location: addad.php'); }
		else { $_SESSION['time'] = time(); $_SESSION['message'] = 'somthingwrong'; header('Location: addad.php'); }
	}
	else { $_SESSION['time'] = time(); $_SESSION['message'] = 'invalidinput'; header('Location: addad.php'); }
}
?>