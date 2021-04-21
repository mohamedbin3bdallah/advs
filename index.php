<?php
	session_start();
	$lang = 'ar';
	$_SERVER['HTTP_PRAGMA'] = 'no-cache';
	$_SERVER['HTTP_CACHE_CONTROL'] = 'no-cache';
	include('develops/index-front.php');
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
    <!-- Responsive CSS Styles -->
    <link rel="stylesheet" href="assets/css/responsive.css" type="text/css">
    <!-- Slicknav js -->
    <link rel="stylesheet" href="assets/css/slicknav.css" type="text/css">
        <!-- Bootstrap Select -->
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
	
	<!--  FONT -->
	<!--<link rel="stylesheet" href="assets/css/font.css" type="text/css">-->
    
  </head>

  <body>
	<?php include('designs/pop.php'); ?>
    <!-- Header Section Start -->
    <div class="header">    
      <?php include('designs/header.php'); ?>
    </div>
    <!-- Header Section End -->

    <!-- Start intro section -->
    <section id="intro" class="section-intro" dir="rtl">
      <div class="overlay">
        <div class="container">
          <div class="main-text">
            <h1 class="intro-title">البحث عن الشركات</h1>
            <p class="sub-title">اكبر موقع لدليل الشركات</p>

            <!-- Start Search box -->
            <div class="row search-bar">
              <div class="advanced-search">
                <form class="search-form" action="sitepages.php" method="GET">

                  <div class="col-md-2 col-sm-6 col-md-offset-2 search-col">
                    <button class="btn btn-common btn-search btn-block"><strong>بحث</strong></button>
                  </div>
				  
				  <div class="col-md-3 col-sm-6 search-col">
                    <input class="form-control" name="keyword" value="" placeholder="اكتب للبحث" type="text">
                    <!--<i style="left:-155px;" class="fa fa-search"></i>-->
                  </div>
				  
				  <!--<div class="col-md-3 col-sm-6 search-col">
                    <div class="input-group-addon search-category-container">
                      <label class="styled-select location-select">
                        <select class="dropdown-product selectpicker" name="product-cat" >
                          <option value="0">كل الاماكن</option>
                          <option value="New York">القاهرة</option>
                          <option value="California">اسكندرية</option>
                          <option value="Washington">بور سعيد</option>
                          <option value="churches">السويس</option>
                          <option value="Birmingham">اسوان</option>
                          <option value="Phoenix">اسيوط</option>
                        </select>                                    
                      </label>
                    </div>
				</div>-->
				  
				  <div class="col-md-3 col-sm-6 search-col">
                    <div class="input-group-addon search-category-container">
                      <label class="styled-select">
                        <select class="dropdown-product selectpicker" name="type" >
                          <option value="">كل الاقسام</option>
						  <?php for($cat=0;$cat<count($categories);$cat++) { ?>
							<option value="<?php echo $categories[$cat]['title']; ?>"> <?php echo $categories[$cat]['title']; ?></option>
						  <?php } ?>
                        </select>                                    
                      </label>
                    </div>
                  </div>
				  
                </form>
              </div>
            </div>
            <!-- End Search box -->
          </div>
        </div>
      </div>
    </section>
    <!-- end intro section -->

    <div class="wrapper">
      <!-- Categories Homepage Section Start -->
      <section id="categories-homepage">
        <div class="container">
          <div class="row text-center">
              <div class="error-page">
                <h2 style="margin-bottom:55px;"><a href="ads.php">سابق واضف اعلاناتك الترويجية</a></h2>
                <a href="addad.php" class="btn btn-danger btn-lg">! ضع اعلانا</a>
            </div>
          </div>
        </div>
      </section>
      <!-- Categories Homepage Section End -->

      <!-- Featured Listings Start -->
	  <?php	if(!empty($ads)) { ?>
      <section class="featured-lis">
        <div class="container">
          <div class="row">
            <div class="col-md-12 wow fadeIn" data-wow-delay="0.5s">
              <h3 class="section-title" style="text-align:center; margin-bottom:55px;">جديد الاعلانات</h3>
              <div id="new-products" class="owl-carousel">
			  <?php	for($ad=0;$ad<count($ads);$ad++) { ?>
                <div class="item">
                  <div class="product-item">
                    <div class="carousel-thumb">
                      <img src="uploads/ads/<?php echo $ads[$ad]['picture']; ?>" alt="<?php echo $ads[$ad]['title']; ?>">
                      <div class="overlay">
                        <a href="ad.php?id=<?php echo $ads[$ad]['id']; ?>"><i class="fa fa-link"></i></a>
                      </div>
                    </div>
                    <a href="ad.php?id=<?php echo $ads[$ad]['id']; ?>" class="item-name"><?php echo $ads[$ad]['title']; ?></a>  
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
      <!-- Featured Listings End -->

      <!-- Start Services Section -->
      <div class="features" dir="rtl">
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-sm-6">
              <div class="features-box wow fadeInDownQuick" data-wow-delay="0.3s">
                <div class="features-icon">
                  <i class="fa fa-book">
                  </i>
                </div>
                <div class="features-content">
                  <h4>
                    توثيقا كاملا
                  </h4>
                  <p>
                    أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="features-box wow fadeInDownQuick" data-wow-delay="0.6s">
                <div class="features-icon">
                  <i class="fa fa-paper-plane"></i>
                </div>
                <div class="features-content">
                  <h4>
                    تصميم نظيفة وحديثة
                  </h4>
                  <p>
                    أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="features-box wow fadeInDownQuick" data-wow-delay="0.9s">
                <div class="features-icon">
                  <i class="fa fa-map"></i>
                </div>
                <div class="features-content">
                  <h4>
                    الميزات العظيمة
                  </h4>
                  <p>
                    أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات.
                  </p>
                </div>
              </div>
            </div> 
            <div class="col-md-4 col-sm-6">
              <div class="features-box wow fadeInDownQuick" data-wow-delay="1.2s">
                <div class="features-icon">
                  <i class="fa fa-cogs"></i>
                </div>
                <div class="features-content">
                  <h4>
                    تخصيص تماما
                  </h4>
                  <p>
                    أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات.
                  </p>
                </div>
              </div>
            </div>           
            <div class="col-md-4 col-sm-6">
              <div class="features-box wow fadeInDownQuick" data-wow-delay="1.5s">
                <div class="features-icon">
                 <i class="fa fa-hourglass"></i>
                </div>
                <div class="features-content">
                  <h4>
                    100٪ تخطيط الاستجابة
                  </h4>
                  <p>
                    أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="features-box wow fadeInDownQuick" data-wow-delay="1.8s">
                <div class="features-icon">
                  <i class="fa fa-hashtag"></i>
                </div>
                <div class="features-content">
                  <h4>
                    سهل الاستخدام
                  </h4>
                  <p>
                    أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="features-box wow fadeInDownQuick" data-wow-delay="2.1s">
                <div class="features-icon">
                  <i class="fa fa-newspaper-o"></i>
                </div>
                <div class="features-content">
                  <h4>
                    تخطيط رهيب
                  </h4>
                  <p>
                    أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="features-box wow fadeInDownQuick" data-wow-delay="2.4s">
                <div class="features-icon">
                  <i class="fa fa-leaf"></i>
                </div>
                <div class="features-content">
                  <h4>
                    جودة عالية
                  </h4>
                  <p>
                    أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="features-box wow fadeInDownQuick" data-wow-delay="2.7s">
                <div class="features-icon">
                  <i class="fa fa-google"></i>
                </div>
                <div class="features-content">
                  <h4>
                    استخدام خطوط جوجل
                  </h4>
                  <p>
                    أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات، أبجد هوز دولور الجلوس امات.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Services Section -->
     
      <!-- Location Section Start -->
      <section class="location">
        <div class="container">
          <div class="row text-center">
              <div class="error-page">
                <h2 style="margin-bottom:55px;"><a href="addad.php">اشتري واحصل على مزايا اضافية</a></h2>
                <a href="addad.php" class="btn btn-danger btn-lg">اشتري الان</a>
            </div>
          </div>
        </div>
      </section>
      <!-- Location Section End -->

    </div>

    <!-- Counter Section Start -->
	<?php if(!empty($categories)) { ?>
    <section id="counter">
      <div class="container">
		<div class="row" style="margin-bottom:55px;">
			<h2>دليل الشركات</h2>
		</div>
        <div class="row">
		<?php 
			if(count($categories) > 4) $count = 4;
			else $count = count($categories);
			for($ca=0;$ca<$count;$ca++) {
		?>
          <div class="col-md-3 col-sm-6 col-xs-12 <?php if($ca%4 == 0) echo 'col-md-push-9 col-sm-push-6'; elseif($ca%4 == 1) echo 'col-md-push-3 col-sm-pull-6'; elseif($ca%4 == 2) echo 'col-md-pull-3 col-sm-push-6'; else echo 'col-md-pull-9 col-sm-pull-6'; ?>">
            <div class="counting wow fadeInDownQuick" data-wow-delay=".5s">
              <!--<div class="icon">
                <span>
                  <i class="lnr lnr-tag"></i>
                </span>
              </div>-->
              <div class="desc">
				<ul style="color: #ccc;" class="/*counter*/"><?php echo $categories[$ca]['title']; ?>
					<?php
						$sitepages = getAllDataFromTable('id,title','sitepages','where categoryid = '.$categories[$ca]['id'],'limit 5');
						for($sp=0;$sp<count($sitepages);$sp++) {
					?>
						<li style="<?php if($sp == 0) echo 'margin-top:15px;'; ?>"><a style="color: #fff;" href="single.php?id=<?php echo $sitepages[$sp]['id']; ?>"><?php echo $sitepages[$sp]['title']; ?></a></li>
					<?php } ?>

					<br><li><a style="color: #ccc;" href="sitepages.php?type=<?php echo $categories[$ca]['title']; ?>">المزيد</a></li>
				</ul>
              </div>
            </div>
          </div>
		<?php } ?>
		 </div>
		 <div class="row" style="margin-top:55px;">
			<a href="sitepages.php" class="btn btn-danger btn-sm">المزيد</a>
		</div>
      </div>
    </section>
	<?php } ?>
    <!-- Counter Section End -->

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
	<script type="text/javascript" src="js/index.js"></script>
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
        <script src="assets/js/bootstrap-select.min.js"></script>

    
  </body>
</html>