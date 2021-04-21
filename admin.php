<?php
session_start();
$pages = array('slides','system','pages','plans','orders','ads','categories','sitepages','doctors','about','faq','instructions','privacy','contact','account');

if(isset($_SESSION['admin'],$_GET['c']) && in_array($_GET['c'], $pages))
{
include('libs/lang.php');
include('develops/'.$_GET['c'].'.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>ADVS Admin</title>
<?php if($lang == "ar") echo '<html xml:lang="ar" lang="ar" dir=rtl xmlns="http://www.w3.org/1999/xhtml">'; ?>
<?php include('designs/head.php'); ?>
<script type="text/javascript" src="js/<?php echo $_GET['c']; ?>.js"></script>
<!-- start-smoth-scrolling -->
</head>
<body>
	<div class="container">
		
		<!-- body -->
		<div class="row">
			<div class="col-sm-4 <?php if($lang == 'ar') echo 'col-sm-push-8'; ?>">
				<?php include('designs/adminsidebar.php'); ?>
			</div>
			<div class="col-sm-8 <?php if($lang == 'ar') echo 'col-sm-pull-4'; ?>">
				<h3>
					<?php language($_GET['c']); ?>
				</h3>
				<?php include('designs/containers/'.$_GET['c'].'.php'); ?>
			</div>
		</div>
		<!-- //body -->
		
	</div>
</body>
</html>
<?php } else header('Location: index.php'); ?>