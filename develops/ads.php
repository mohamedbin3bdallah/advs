<?php
include('libs/database.php');
include('classes/ResizeImage.php');

$select = '*';
$where = 'order by time DESC';

$resultsPerPage = 10;
if($resultsPerPage != 0)
{
	if(isset($_GET['page'])) $page = (int) $_GET['page'];
	else $page = 0;
	
	if ($page < 1) $page = 1;
	$startResults = ($page - 1) * $resultsPerPage;
	$noOfrows = getNoOfRowsFromTable('ads',$where);
	$totalPages = ceil($noOfrows / $resultsPerPage);
	
	$limit = 'LIMIT '.$startResults.', '.$resultsPerPage;
}
else
{
	$page = 0;
	$totalPages = 0;
	$limit = '';
}

if(isset($_GET['id']) && $_GET['id'] != '')
{
	$row = getRowFromTable('*','ads',' where id = '.$_GET['id'],'');
}

if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	if($_POST['title'] != ' ' && $_POST['description'] != ' ')
	{
		$_POST['time'] = time();
		$_POST['userid'] = 1;
		if(isset($_POST['active']) && $_POST['active'] == 'on') $_POST['active'] = 1;
		else $_POST['active'] = 0;
		if(isset($_POST['featured']) && $_POST['featured'] == 'on') $_POST['featured'] = 1;
		else $_POST['featured'] = 0;
		
		if(isset($_POST['oldid']))
		{
			if($_FILES['file']['error'] == 0)	{ unlink('uploads/ads/'.$_POST['oldpicture']); $_POST['picture'] = uploadpicdynamic('file','ads','500','500','exact'); }
			else $_POST['picture'] = $_POST['oldpicture'];

			if(update('ads',' set title = "'.$_POST['title'].'",description = "'.$_POST['description'].'",picture = "'.$_POST['picture'].'",active = "'.$_POST['active'].'",featured = "'.$_POST['featured'].'",time = "'.$_POST['time'].'"',' where id = '.$_POST['oldid'])) { $_SESSION['time'] = time(); $_SESSION['message'] = 'success'; header('Location: admin.php?c=ads'); }
			else { $_SESSION['time'] = time(); $_SESSION['message'] = 'somthingwrong'; header('Location: admin.php?c=ads'); }
		}
		else
		{
			$_POST['picture'] = uploadpicdynamic('file','ads','500','500','exact');
			if(insertRow('ads',$_POST)) { $_SESSION['time'] = time(); $_SESSION['message'] = 'success'; header('Location: admin.php?c=ads'); }
			else { $_SESSION['time'] = time(); $_SESSION['message'] = 'somthingwrong'; header('Location: admin.php?c=ads'); }
		}
	}
	else { $_SESSION['time'] = time(); $_SESSION['message'] = 'inputnotcorrect'; header('Location: admin.php?c=ads'); }
}
?>