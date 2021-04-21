<?php
include('libs/database.php');

$select = 'sitepages.id as id,sitepages.title as title,sitepages.time as time,sitepages.active as active,categories.title as category';
$where = 'inner join categories on sitepages.categoryid = categories.id order by sitepages.time DESC';

$resultsPerPage = 10;
if($resultsPerPage != 0)
{
	if(isset($_GET['page'])) $page = (int) $_GET['page'];
	else $page = 0;
	
	if ($page < 1) $page = 1;
	$startResults = ($page - 1) * $resultsPerPage;
	$noOfrows = getNoOfRowsFromTable('sitepages',$where);
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
	$row = getRowFromTable('*','sitepages','where id = '.$_GET['id'],'');
}

if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	if($_POST['title'] != '')
	{
		if(isset($_POST['active']) && $_POST['active'] == 'on') $_POST['active'] = 1;
		else $_POST['active'] = 0;
		if(isset($_POST['oldid']))
		{
			//if(update('sitepages',' set active = '.$_POST['active'].' , categoryid = '.$_POST['categoryid'].' ,title = "'.$_POST['title'].'" , description = "'.htmlspecialchars($_POST['description']).'"',' where id = '.$_POST['oldid']))
				if(update('sitepages',' set active = '.$_POST['active'].' , categoryid = '.$_POST['categoryid'].' ,title = "'.$_POST['title'].'" , description = "'.$_POST['description'].'"',' where id = '.$_POST['oldid']))
			{
				if($_FILES['file']['error'][0] == 0)	uploadimgs('sitepages/'.$_POST['oldid']);
				{ $_SESSION['time'] = time(); $_SESSION['message'] = 'success'; header('Location: admin.php?c=sitepages'); }
			}
			else { $_SESSION['time'] = time(); $_SESSION['message'] = 'somthingwrong'; header('Location: admin.php?c=sitepages'); }
		}
		else
		{
			$_POST['time'] = time();
			//$_POST['description'] = htmlspecialchars($_POST['description']);
			$insertid = insertRow('sitepages',$_POST);
			if($insertid)
			{
				if($_FILES['file']['error'][0] == 0) uploadimgs('sitepages/'.$insertid);
				$_SESSION['time'] = time(); $_SESSION['message'] = 'success'; header('Location: admin.php?c=sitepages');
			}
			else { $_SESSION['time'] = time(); $_SESSION['message'] = 'somthingwrong'; header('Location: admin.php?c=sitepages'); }
		}
	}
	else { $_SESSION['time'] = time(); $_SESSION['message'] = 'inputnotcorrect'; header('Location: admin.php?c=sitepages'); }
}
?>