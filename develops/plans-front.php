<?php
include('libs/database.php');
include('languages/'.$lang.'.php');

$thispage = getRowFromTable('*','pages','where page like "plans.php"','');
$system = getRowFromTable('*','system','where id = 1','');

$select = '*';
$where = 'where active = 1 order by title ASC';
$resultsPerPage = 12;
if($resultsPerPage != 0)
{
	if(isset($_GET['page'])) $page = (int) $_GET['page'];
	else $page = 0;
	
	if ($page < 1) $page = 1;
	$startResults = ($page - 1) * $resultsPerPage;
	$noOfrows = getNoOfRowsFromTable('plans',$where);
	$totalPages = ceil($noOfrows / $resultsPerPage);
	
	$limit = 'LIMIT '.$startResults.', '.$resultsPerPage;
}
else
{
	$page = 0;
	$totalPages = 0;
	$limit = '';
}
$plans = getAllDataFromTable($select,'plans',$where,$limit);

?>