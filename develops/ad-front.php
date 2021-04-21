<?php
include('libs/database.php');
include('languages/'.$lang.'.php');

$system = getRowFromTable('*','system','where id = 1','');

if(isset($_SESSION['userid'])) $ad = getRowFromTable('*','ads','where userid = '.$_SESSION['userid'].' and id = '.$_GET['id'],'');
else $ad = getRowFromTable('*','ads','where active = 1 and id = '.$_GET['id'],'');

?>