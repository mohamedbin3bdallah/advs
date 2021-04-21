<?php
include('libs/database.php');
include('languages/'.$lang.'.php');

$thispage = getRowFromTable('*','pages','where page like "instructions.php"','');
$system = getRowFromTable('*','system','where id = 1','');

$instructions = getRowFromTable('*','instructions','where id = 1','');
?>