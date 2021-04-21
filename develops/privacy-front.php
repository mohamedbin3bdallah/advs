<?php
include('libs/database.php');
include('languages/'.$lang.'.php');

$thispage = getRowFromTable('*','pages','where page like "privacy.php"','');
$system = getRowFromTable('*','system','where id = 1','');

$privacy = getRowFromTable('*','privacy','where id = 1','');
?>