<?php
	session_start();
	$lang = 'ar';
	$_SERVER['HTTP_PRAGMA'] = 'no-cache';
	$_SERVER['HTTP_CACHE_CONTROL'] = 'no-cache';
	include('develops/contact-front.php');
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
              <h2 class="page-title"><?php language('contact'); ?></h2>
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
                <?php language('contact'); ?>
              </h3>
              <form role="form" class="login-form" action="#" method="post">
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-user"></i>
                    <input type="text" class="form-control" name="name" id="name" placeholder="<?php language('name'); ?>" autocomplete="off" required/>
                  </div>
                </div> 
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-phone"></i>
                    <input type="text" class="form-control" name="phone" id="phone" pattern="[0-9]{10,}" title="<?php language('m23'); ?>" maxlength="50" placeholder="<?php language('phone'); ?>" autocomplete="off" required/>
                  </div>
                </div> 
				<div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-envelope"></i>
                    <input type="email" class="form-control" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="<?php language('m12'); ?>" maxlength="255" placeholder="<?php language('email'); ?>" autocomplete="off" required/>
                  </div>
                </div>
				<div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-unlock-alt"></i>
                    <textarea class="form-control" name="message" id="message" rows="11" placeholder="<?php language('message'); ?>" required></textarea>
                  </div>
                </div>
                <button type="submit" class="btn btn-common log-btn" name="submit" id="submit"><?php language('send'); ?></button>
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