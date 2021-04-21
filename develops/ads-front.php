<?php
include('libs/database.php');
include('languages/'.$lang.'.php');

$thispage = getRowFromTable('*','pages','where page like "ads.php"','');
$system = getRowFromTable('*','system','where id = 1','');

$select = 'ads.id as id,ads.title as title,ads.picture as picture,ads.time as time';
//if(isset($_SESSION['userid']))	$where = 'inner join orders on ads.orderid = orders.id inner join plans on orders.planid = plans.id where ads.userid = '.$_SESSION['userid'].' order by time DESC';
//else $where = 'inner join orders on ads.orderid = orders.id inner join plans on orders.planid = plans.id where plans.featured = 0 and ads.active = 1 order by time DESC';
if(isset($_SESSION['userid']))	$where = 'where ads.userid = '.$_SESSION['userid'].' order by time DESC';
else $where = 'where ads.featured = 0 and ads.active = 1 order by time DESC';
$resultsPerPage = 12;
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
$ads = getAllDataFromTable($select,'ads',$where,$limit);
if(!isset($_SESSION['userid'])) $spads = getAllDataFromTable('ads.id as id,ads.title as title,ads.picture as picture','ads','where ads.featured = 1 and ads.active = 1','');

?>