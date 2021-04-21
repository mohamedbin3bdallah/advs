<?php
session_start();
if(isset($_GET['id']) && abs((int)($_GET['id'])) > 0)
{
	$lang = 'ar';
	$_GET['id'] = abs((int)($_GET['id']));
	$_SERVER['HTTP_PRAGMA'] = 'no-cache';
	$_SERVER['HTTP_CACHE_CONTROL'] = 'no-cache';
	include('develops/single-front.php');
	if(!empty($single) && $single['title'] != '')
	{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="Clasified">
    <meta name="generator" content="Wordpress! - Open Source Content Management">
	
	<title><?php if(isset($single['title'])) echo $single['title']; ?></title>
	<meta name="description" content="<?php if(isset($single['title'])) echo $single['title']; ?>">
	<meta name="keywords" content="<?php if(isset($single['title'])) echo $single['title']; ?>" />
	<link rel="shortcut icon" href="<?php if(isset($system['logo']) && $system['logo'] != '') echo 'uploads/'.$system['logo']; ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">    
    <link rel="stylesheet" href="assets/css/jasny-bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/jasny-bootstrap.min.css" type="text/css">
    <!-- Material CSS -->
    <link rel="stylesheet" href="assets/css/material-kit.css" type="text/css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css">
        <!-- Line Icons CSS -->
    <link rel="stylesheet" href="assets/fonts/line-icons/line-icons.css" type="text/css">
    <!-- Line Icons CSS -->
    <link rel="stylesheet" href="assets/fonts/line-icons/line-icons.css" type="text/css">
    <!-- Main Styles -->
    <link rel="stylesheet" href="assets/css/main.css" type="text/css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="assets/extras/animate.css" type="text/css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="assets/extras/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/extras/owl.theme.css" type="text/css">
    <link rel="stylesheet" href="assets/extras/settings.css" type="text/css">
    <!-- Responsive CSS Styles -->
    <link rel="stylesheet" href="assets/css/responsive.css" type="text/css">
        <!-- Bootstrap Select -->
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
  </head>

  <body>  
    <!-- Header Section Start -->
    <div class="header">    
		<?php include('designs/header.php'); ?>
    </div>
    <!-- Header Section End -->

    <!-- Page Header Start -->
    <div class="page-header" style="background: url(assets/img/banner1.jpg);">
      <div class="container">
        <div class="row">         
          <div class="col-md-12">
            <div class="breadcrumb-wrapper">
              <h2 class="page-title"><?php echo $single['title']; ?></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Header End --> 

    <!-- Content section Start --> 
    <section id="content">
      <div class="container" dir="rtl">
        <div class="row">
          <div class="col-sm-12 col-md-12">
            <div class="page-login-form box">
				<h2 style="text-align:center; margin-bottom:65px;">
					<?php echo $single['title']; ?>
				</h2>
				<?php $singleimages = array_diff(scandir('uploads/sitepages/'.$_GET['id']), array('.','..')); ?>
				<?php if(!empty($singleimages)) { ?>
					<div class="row" style="margin-bottom:65px;">
					<?php for($bim=2;$bim<count($singleimages)+2;$bim++) { ?>
						<div style="margin-top:15px;" class="<?php if(count($singleimages) == 1) echo 'col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3'; elseif(count($singleimages) == 2) echo 'col-lg-6 col-md-6'; elseif(count($singleimages) == 3) echo 'col-lg-4 col-md-4'; else echo 'col-lg-3 col-md-3'; ?> col-sm-6 col-xs-12">
							<center><img class="img-responsive" src="<?php echo 'uploads/sitepages/'.$_GET['id'].'/'.$singleimages[$bim]; ?>" alt="<?php echo $single['title']; ?>" style="border-radius:55px;"></center>
						</div>
					<?php } ?>
					</div>
				<?php } ?>
				<p>
					<?php echo $single['description']; ?>
				</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Content section End --> 

    

    <!-- Footer Section Start -->
    <footer dir="rtl">
    	<?php include('designs/footer.php'); ?>
    </footer>
    <!-- Footer Section End -->  

    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
      <i class="fa fa-angle-up"></i>
    </a>
      
    <!-- Main JS  -->
    <script type="text/javascript" src="assets/js/jquery-min.js"></script>
	<?php include('designs/messages.php'); ?>
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script type="text/javascript" src="js/tinymce.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/material.min.js"></script>
    <script type="text/javascript" src="assets/js/material-kit.js"></script>
    <script type="text/javascript" src="assets/js/jquery.parallax.js"></script>
    <script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="assets/js/wow.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
    <script type="text/javascript" src="assets/js/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="assets/js/waypoints.min.js"></script>
    <script type="text/javascript" src="assets/js/jasny-bootstrap.min.js"></script>
    
  </body>
</html>
<?php } else header('Location: sitepages.php'); ?>
<?php } else header('Location: sitepages.php'); ?>