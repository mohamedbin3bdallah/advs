<?php
session_start();
if(!isset($_SESSION['admin']))
{
	include('libs/database.php');
	include('libs/lang.php');
function login($myusername,$passw0rd)
{
	$passw0rd = hash('sha256', $passw0rd, FALSE);
	$row = getRowFromTable('id','admins',' where username like "'.$myusername.'" and password like "'.$passw0rd.'" and active = 1','');
	if(!empty($row))
	{
		$_SESSION['admin'] = $row['id'];
		return 1;
    }
	else return 0;
}
if(isset($_POST['loginsubmit'])) 
{
	unset($_POST['loginsubmit']);
	if($_POST['myusername'] != '' && $_POST['passw0rd'] != '')
	{
		$loginOp = login($_POST['myusername'],$_POST['passw0rd']);		
		if($loginOp == 1) echo header('location: admin.php?c=system');
		elseif($loginOp == 0) echo '<div id="wrongaccount"></div>';
	}
}
	//include('develops/register.php');
	if($lang == "ar")
	echo '<html xml:lang="ar" lang="ar" dir=rtl xmlns="http://www.w3.org/1999/xhtml">';
?>
<!DOCTYPE html>
<html lang="en" >
<head>
<title>Advs Admin</title>
<?php include('designs/head.php'); ?>
<script type="text/javascript" src="js/register<?php echo $lang; ?>.js"></script>
<script language="JavaScript">
$(document).ready(function(){
    $('#wrongaccount').show(function(){
        $('#wrongaccount').append('<br><h4 style="color:red;text-align:center;"><?php language('wronglogin');?></h4>');
	});
});
</script>
</head>
<body>
<div class="container">
<?php
include('designs/headers/index.php');
?>
</div>
</body>
</html>
<?php } else echo header('location: admin.php?c=system'); ?>