<?php
	session_start();
	$lang = 'ar';
	$_SERVER['HTTP_PRAGMA'] = 'no-cache';
	$_SERVER['HTTP_CACHE_CONTROL'] = 'no-cache';
	include('develops/ads-front.php');
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
              <h2 class="page-title"><?php language('ads'); ?></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Header End --> 

    <!-- Content section Start --> 
	 <?php	if(!empty($spads)) { ?>
      <section class="featured-lis">
        <div class="container">
          <div class="row">
            <div class="col-md-12 wow fadeIn" data-wow-delay="0.5s">
              <h3 class="section-title" style="text-align:center; margin-bottom:55px;">الاعلانات المميزة</h3>
              <div id="new-products" class="owl-carousel">
			  <?php	for($sad=0;$sad<count($spads);$sad++) { ?>
                <div class="item">
                  <div class="product-item">
                    <div class="carousel-thumb">
                      <img src="uploads/ads/<?php echo $spads[$sad]['picture']; ?>" alt="<?php echo $spads[$sad]['title']; ?>">
                      <div class="overlay">
                        <a href="ad.php?id=<?php echo $spads[$sad]['id']; ?>"><i class="fa fa-link"></i></a>
                      </div>
                    </div>
                    <a href="ad.php?id=<?php echo $spads[$sad]['id']; ?>" class="item-name"><?php echo $spads[$sad]['title']; ?></a>  
                    <!--<span class="price">$150</span>-->
                  </div>
                </div>
			  <?php } ?>
              </div>
            </div> 
          </div>
        </div>
      </section>
	  <?php } ?>
	  
    <section id="content">
      <div class="container" dir="rtl">
		<p style="text-align:center; margin-bottom:55px;">
			<?php if(isset($_SESSION['userid'])) { ?><button type="button" class="btn btn-success" onclick="location.href = 'addad.php'"><?php language('addad'); ?></button><?php } ?>
		</p>
	  <?php if(!empty($ads)) { ?>
        <div class="row">
		<?php for($ad=0;$ad<count($ads);$ad++) { ?>
          <div class="col-sm-4 col-md-4 <?php if($ad%3 == 0) echo 'col-sm-push-8 col-md-push-8'; elseif($ad%3 == 2) echo 'col-sm-pull-8 col-md-pull-8'; ?>">
            <div class="page-login-form box">
              <h3>
                <?php echo $ads[$ad]['title']; ?>
              </h3>
			   <h4 style="text-align:center; margin-bottom:11px;">
					<?php echo date('Y-m-d , h:i:sa', $ads[$ad]['time']); ?>
				</h4>
				<img class="img-responsive" src="uploads/ads/<?php echo $ads[$ad]['picture'];?>">
			  <p style="text-align:center; margin-top:11px;">
				<button type="button" class="btn btn-info" onclick="location.href = 'ad.php?id=<?php echo $ads[$ad]['id']; ?>'"><?php language('more'); ?></button>
				<?php if(isset($_SESSION['userid'])) { ?><button type="button" class="btn btn-warning" onclick="location.href = 'editad.php?id=<?php echo $ads[$ad]['id']; ?>'"><?php language('edit'); ?></button>
				<button type="submit" class="btn btn-danger" onclick="location.href = 'delad.php?id=<?php echo $ads[$ad]['id']; ?>'"><?php language('delete'); ?></button><?php } ?>
			  </p>
            </div>
          </div>
		  <?php } ?>
		 </div>
		  <div class="row">
			<div class="col-lg-4 col-md-4<?php if($lang == 'ar') echo ' col-lg-push-7 col-md-push-7'; ?>">
			</div>
			<div class="col-lg-8 col-md-8<?php if($lang == 'ar') echo ' col-lg-pull-5 col-md-pull-5'; ?>">
			<nav>
				<ul class="pagination">
					<?php if($totalPages > 1) { ?><li><a style="background:rgba(0, 0, 0, 0.5); color:#fff;" href="?page=<?php echo $totalPages; ?>"><?php language("last"); ?></a></li><?php } ?>
					<?php if($page < $totalPages-1) { ?><li>
						<a style="background:rgba(0, 0, 0, 0.5); color:#fff;" href="?page=<?php echo $page+2; ?>" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li><?php } ?>
					<?php if($page < $totalPages) { ?><li><a style="background:rgba(0, 0, 0, 0.5); color:#fff;" href="?page=<?php echo $page+1; ?>"><?php echo $page+1; ?></a></li><?php } ?>
					<?php if($totalPages > 1) { ?><li><a style="background:rgba(0, 0, 0, 0.5); color:#fff;" href="?page=<?php echo $page; ?>"><?php echo $page; ?></a></li><?php } ?>
					<?php if($page > 1) { ?><li><a style="background:rgba(0, 0, 0, 0.5); color:#fff;" href="?page=<?php echo $page-1; ?>"><?php echo $page-1; ?></a></li><?php } ?>
					<?php if($page > 3) { ?><li>
						<a style="background:rgba(0, 0, 0, 0.5); color:#fff;" href="?page=<?php echo $page-2; ?>" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>
					</li><?php } ?>
					<?php if($totalPages > 1) { ?><li><a style="background:rgba(0, 0, 0, 0.5); color:#fff;" href="?page=1"><?php language("first"); ?></a></li><?php } ?>
				</ul>
			</nav>
			</div>
		</div>
		<?php } ?>
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
	<script type="text/javascript" src="js/pay-front.js"></script>
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