<?php
session_start();
if(isset($_GET['id']) && abs((int)($_GET['id'])) > 0)
{
	$lang = 'ar';
	$_GET['id'] = abs((int)($_GET['id']));
	$_SERVER['HTTP_PRAGMA'] = 'no-cache';
	$_SERVER['HTTP_CACHE_CONTROL'] = 'no-cache';
	include('develops/editad-front.php');
	if(!empty($ad) && $_SESSION['userid'] == $ad['userid'])
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

	<title><?php if(isset($thispage['title'])) echo $thispage['title']; ?></title>
	<meta name="description" content="<?php if(isset($thispage['description'])) echo $thispage['description']; ?>">
	<meta name="keywords" content="<?php if(isset($thispage['keywords'])) echo $thispage['keywords']; ?>" />
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
              <h2 class="page-title"><?php language('editad'); ?></h2>
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
          <div class="col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
            <div class="page-login-form box">
              <h3>
                <?php echo $ad['title']; ?>
              </h3>
              <form role="form" class="login-form" action="#" method="POST" enctype="multipart/form-data">
				<!--<div class="form-group">
                  <div class="input-icon">
					<label><?php //language('plan'); ?></label>
					<p><?php //echo $order['title'].' - '.$order['fees'].' ???????? / '; language('month'); echo ' ( ???????? '.$order['renumber'].' ?????????? )'; ?></p>
                  </div>
                </div>-->
                <div class="form-group">
                  <div class="input-icon">
					<label><?php language('title'); ?></label>
                    <input type="text" class="form-control" name="title" id="title" value="<?php echo $ad['title']; ?>" maxlength="255" placeholder="<?php language('title'); ?>" autocomplete="off" required/>
                  </div>
                </div> 
                <div class="form-group">
                  <div class="input-icon">
					<label><?php language('description'); ?></label>
                    <textarea class="form-control" name="description" id="description" rows="9" placeholder="<?php language('description'); ?>"><?php echo $ad['description']; ?></textarea>
                  </div>
                </div>
				<div class="form-group">
                  <div class="input-icon">
					<label>???????????? ??????????????</label>
                    <input type="file" class="form-control" name="file" id="file" />
                  </div>
                </div>
				<div class="form-group">
                  <div class="input-icon">
					<label><?php language('picture'); ?></label>
                    <img class="img-responsive" src="uploads/ads/<?php echo $ad['picture']; ?>" />
					<input type="hidden" name="oldpicture" value="<?php echo $ad['picture']; ?>" />
                  </div>
                </div>
                <button type="submit" class="btn btn-common log-btn" name="submit" id="submit"><?php language('edit'); ?></button>
              </form>
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
<?php } else header('Location: ads.php'); ?>
<?php } else header('Location: index.php'); ?>