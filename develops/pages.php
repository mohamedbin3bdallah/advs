<?php
include('libs/database.php');

$select = '*';
$where = 'order by page ASC';

$resultsPerPage = 10;
if($resultsPerPage != 0)
{
	if(isset($_GET['page'])) $page = (int) $_GET['page'];
	else $page = 0;
	
	if ($page < 1) $page = 1;
	$startResults = ($page - 1) * $resultsPerPage;
	$noOfrows = getNoOfRowsFromTable('pages',$where);
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
	$row = getRowFromTable('*','pages',' where id = '.$_GET['id'],'');
}

if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	if($_POST['page'] != '')
	{
		if(isset($_POST['oldid']))
		{
			if(!exist('pages',' where page = "'.$_POST['page'].'" and id <> '.$_POST['oldid']))
			{
				if(update('pages',' set page = "'.$_POST['page'].'" , title = "'.$_POST['title'].'" , description = "'.$_POST['description'].'" , keywords = "'.$_POST['keywords'].'"',' where id = '.$_POST['oldid'])) { $_SESSION['time'] = time(); $_SESSION['message'] = 'success'; header('Location: admin.php?c=pages'); }
				else { $_SESSION['time'] = time(); $_SESSION['message'] = 'somthingwrong'; header('Location: admin.php?c=pages'); }
			}
			else { $_SESSION['time'] = time(); $_SESSION['message'] = 'invalidinput'; header('Location: admin.php?c=pages'); }
		}
		else
		{
			if(!exist('pages',' where page like "'.$_POST['page'].'"'))
			{
				if(insertRow('pages',$_POST)) { $_SESSION['time'] = time(); $_SESSION['message'] = 'success'; header('Location: admin.php?c=pages'); }
				else { $_SESSION['time'] = time(); $_SESSION['message'] = 'somthingwrong'; header('Location: admin.php?c=pages'); }
			}
			else { $_SESSION['time'] = time(); $_SESSION['message'] = 'invalidinput'; header('Location: admin.php?c=pages'); }
		}
	}
	else { $_SESSION['time'] = time(); $_SESSION['message'] = 'inputnotcorrect'; header('Location: admin.php?c=pages'); }
}
?>