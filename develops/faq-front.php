<?php
include('libs/database.php');
include('languages/'.$lang.'.php');

$thispage = getRowFromTable('*','pages','where page like "faq.php"','');
$system = getRowFromTable('*','system','where id = 1','');

$faq = getRowFromTable('*','faq','where id = 1','');
?>