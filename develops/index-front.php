<?php
include('libs/database.php');
include('languages/'.$lang.'.php');

$system = getRowFromTable('*','system','where id = 1','');
$thispage = getRowFromTable('*','pages','where page like "index.php"','');
$categories = getAllDataFromTable('*','categories','','');
$ads = getAllDataFromTable('id,title,picture','ads','where active = 1','limit 12');
?>