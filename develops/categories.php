<?php
include('libs/database.php');
include('classes/ResizeImage.php');

$where = 'where id <> 0 order by title ASC';

$resultsPerPage = 10;
if($resultsPerPage != 0)
{
	if(isset($_GET['page'])) $page = (int) $_GET['page'];
	else $page = 0;
	
	if ($page < 1) $page = 1;
	$startResults = ($page - 1) * $resultsPerPage;
	$noOfrows = getNoOfRowsFromTable('categories',$where);
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
	$row = getRowFromTable('*','categories',' where id = '.$_GET['id'],'');
}

if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	if($_POST['title'] != '')
	{
		if(isset($_POST['oldid']))
		{
			if(!exist('categories',' where title like "'.$_POST['title'].'" and id <> '.$_POST['oldid']))
			{
				if($_FILES['file']['error'] == 0)	{ unlink('uploads/categories/'.$_POST['oldpicture']); $_POST['picture'] = uploadpicdynamic('file','categories','500','500','exact'); }
				else $_POST['picture'] = $_POST['oldpicture'];
			
				if(update('categories',' set title = "'.$_POST['title'].'",picture = "'.$_POST['picture'].'"',' where id = '.$_POST['oldid'])) { $_SESSION['time'] = time(); $_SESSION['message'] = 'success'; header('Location: admin.php?c=categories'); }
				else { $_SESSION['time'] = time(); $_SESSION['message'] = 'somthingwrong'; header('Location: admin.php?c=categories'); }
			}
			else { $_SESSION['time'] = time(); $_SESSION['message'] = 'invalidinput'; header('Location: admin.php?c=categories'); }
		}
		else
		{
			if(!exist('categories',' where title like "'.$_POST['title'].'"'))
			{
				$_POST['picture'] = uploadpicdynamic('file','categories','500','500','exact');
				if(insertRow('categories',$_POST)) { $_SESSION['time'] = time(); $_SESSION['message'] = 'success'; header('Location: admin.php?c=categories'); }
				else { $_SESSION['time'] = time(); $_SESSION['message'] = 'somthingwrong'; header('Location: admin.php?c=categories'); }
			}
			else { $_SESSION['time'] = time(); $_SESSION['message'] = 'invalidinput'; header('Location: admin.php?c=categories'); }
		}
	}
	else { $_SESSION['time'] = time(); $_SESSION['message'] = 'inputnotcorrect'; header('Location: admin.php?c=categories'); }
}
?>