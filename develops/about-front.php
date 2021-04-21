<?php
include('libs/database.php');
include('languages/'.$lang.'.php');

$thispage = getRowFromTable('*','pages','where page like "about.php"','');
$system = getRowFromTable('*','system','where id = 1','');

$about = getRowFromTable('*','about','where id = 1','');
?>