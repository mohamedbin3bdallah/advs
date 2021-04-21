	<nav class="navbar navbar-default main-navigation" role="navigation" dir="rtl">
        <div class="container">
		<div class="col-md-10 col-xs-6">
          <div class="navbar-header">
            <!-- Stat Toggle Nav Link For Mobiles -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- End Toggle Nav Link For Mobiles -->
          </div>
          <!-- brand and toggle menu for mobile End -->

          <!-- Navbar Start -->
          <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
			  <?php if(isset($_SESSION['userid'])) { ?>
				<li><a href="logout.php"><i class="lnr lnr-exit"></i> الخروج</a></li>
				<!--<li><a href="orders.php"><i class="lnr lnr-layers"></i> الطلبات</a></li>-->
			  <?php } else { ?>
				<li><a href="login.php"><i class="lnr lnr-enter"></i> الدخول</a></li>
				<li><a href="register.php"><i class="lnr lnr-user"></i> التسجيل</a></li>
				<li><a href="contact.php"><i class="lnr lnr-map"></i> اتصل بنا</a></li>
				<li><a href="about.php"><i class="lnr lnr-eye"></i> من نحن</a></li>
				<li><a href="instructions.php"><i class="lnr lnr-flag"></i> اتفاقية الستخدام</a></li>
				<li><a href="ads.php"><i class="lnr lnr-picture"></i> الاعلانات</a></li>
				<li><a href="categories.php"><i class="lnr lnr-list"></i> دليل الشركات</a></li>
				<li><a href="index.php"><i class="lnr lnr-home"></i> الرئيسية</a></li>
			  <?php } ?>
              <!--<li class="postadd">
                <a class="btn btn-danger btn-post" href="ads.php"><span class="fa fa-plus-circle"></span> ضع اعلانا</a>
              </li>-->
            </ul>
          </div>
          <!-- Navbar End -->
        </div>
		<div class="col-md-2 col-xs-6">
			<!--<?php //if(isset($system['logo']) && $system['logo'] != '') { ?><a style="margin-top:25px;" class="navbar-brand logo" href="index.php"><?php //echo $system['website']; ?></a><?php //} ?>-->
			<?php if(isset($system['logo']) && $system['logo'] != '') { ?><img class="img-responsive" style="max-width:55px; margin:25px;" src="uploads/<?php echo $system['logo']; ?>"><?php } ?>
		</div>
		</div>
      </nav>

      <div class="tbtn wow pulse" id="menu" data-wow-iteration="infinite" data-wow-duration="500ms" data-toggle="offcanvas" data-target=".navmenu">
        <p><i class="fa fa-file-text-o"></i> <a style="color:#fff;" href="categories.php">كل الصفح</a></p>
      </div>