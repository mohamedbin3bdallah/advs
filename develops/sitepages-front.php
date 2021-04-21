<?php
include('libs/database.php');
include('languages/'.$lang.'.php');

$thispage = getRowFromTable('*','pages','where page like "sitepages.php"','');
$system = getRowFromTable('*','system','where id = 1','');

$select = 'sitepages.id as id,sitepages.title as title';
if(isset($_GET['type'],$_GET['keyword']) && $_GET['keyword'] != '') { $url = 'keyword='.$_GET['keyword'].'&type='.$_GET['type'].'&'; $where = 'inner join categories on sitepages.categoryid = categories.id where sitepages.active = 1 and sitepages.title like "%'.$_GET['keyword'].'%" and categories.title like "'.$_GET['type'].'" order by sitepages.title ASC'; }
elseif(isset($_GET['type']) && $_GET['type'] != '')	{ $url = 'type='.$_GET['type'].'&'; $where = 'inner join categories on sitepages.categoryid = categories.id where sitepages.active = 1 and categories.title like "'.$_GET['type'].'" order by sitepages.title ASC'; }
else { $url = ''; $where = 'where sitepages.active = 1 order by sitepages.title ASC'; }
$resultsPerPage = 12;
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
$sitepages = getAllDataFromTable($select,'sitepages',$where,$limit);

?>