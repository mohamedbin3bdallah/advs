<?php
$categories = getAllDataFromTable('*','categories','','');
?>
<nav class="navbar navbar-default main-navigation" role="navigation" dir="rtl">
        <div class="container">
          <div class="navbar-header">
            <!-- Stat Toggle Nav Link For Mobiles -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- End Toggle Nav Link For Mobiles -->
            <?php if(isset($system['logo']) && $system['logo'] != '') { ?><a class="navbar-brand logo" href="index.php"><?php echo $system['website']; ?></a><?php } ?>
          </div>
          <!-- brand and toggle menu for mobile End -->

          <!-- Navbar Start -->
          <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
			  <?php if(!empty($categories)) { ?>
			  <li class = "dropdown"><a href="#" class="scroll-link dropdown-toggle" data-toggle = "dropdown"><i class="lnr lnr-drop"></i> المحتوى <b class = "caret"></b></a>
				<ul class = "dropdown-menu">
					<?php for($cat=0;$cat<count($categories);$cat++) { ?>
						<li><a style="text-align:right;" href="sitepages.php?type=<?php echo $categories[$cat]['title']; ?>"><?php echo $categories[$cat]['title']; ?></a></li>
					<?php } ?>
				</ul>
			  </li>
			  <?php } ?>
			  <?php if(isset($_SESSION['userid'])) { ?>
				<li><a href="logout.php"><i class="lnr lnr-exit"></i> الخروج</a></li>
				<!--<li><a href="orders.php"><i class="lnr lnr-layers"></i> الطلبات</a></li>-->
			  <?php } else { ?>
				<li><a href="login.php"><i class="lnr lnr-enter"></i> الدخول</a></li>
				<li><a href="register.php"><i class="lnr lnr-user"></i> التسجيل</a></li>
			  <?php } ?>
              <li class="postadd">
                <a class="btn btn-danger btn-post" href="ads.php"><span class="fa fa-plus-circle"></span> ضع اعلانا</a>
              </li>
            </ul>
          </div>
          <!-- Navbar End -->
        </div>
      </nav>
      <!-- Off Canvas Navigation -->
      <div class="navmenu navmenu-default navmenu-fixed-right offcanvas"> 
      <!--- Off Canvas Side Menu -->
        <div class="close" data-toggle="offcanvas" data-target=".navmenu">
            <i class="fa fa-close"></i>
        </div>
          <h3 class="title-menu">كل الصفح</h3>
          <ul class="nav navmenu-nav"> <!--- Menu -->
            <li><a href="index.php">الرئيسية</a></li>
            <!--<li><a href="index-v-2.html">اخرى</a></li>-->
            <li><a href="about.php">عنا</a></li>            
            <!--<li><a href="category.html">الاقسام</a></li>-->
            <li><a href="ads.php">الاعلانات</a></li>
            <li><a href="plans.php">خطط الدفع</a></li>    
            <!--<li><a href="account-archived-ads.html">ارشيف الحساب</a></li>
            <li><a href="account-close.html">اغلاق الحساب</a></li>
            <li><a href="account-favourite-ads.html">الاعلانات المفضلة</a></li>
            <li><a href="account-home.html">ملفي</a></li>
            <li><a href="account-myads.html">اعلاناتي</a></li>
            <li><a href="account-pending-approval-ads.html">انتظار الموافقة</a></li>
            <li><a href="account-saved-search.html">البحث المحفوظ</a></li>
            <li><a href="post-ads.html">اضافة اعلانات</a></li> 
            <li><a href="posting-success.html">Posting-success</a></li>
            <li><a href="blog.html">المدونة</a></li>
            <li><a href="blog-details.html">تفاصيل المدونة</a></li>-->
			<li><a href="sitepages.php">المحتوى</a></li>
            <li><a href="contact.php">التواصل</a></li>
            <!--<li><a href="forgot-password.html">نسيت كلمة المرور</a></li>-->
            <li><a href="faq.php">الاسئله المكررة</a></li>
            <!--<li><a href="register.php">التسجيل</a></li>-->
        </ul><!--- End Menu -->
      </div> <!--- End Off Canvas Side Menu -->
      <div class="tbtn wow pulse" id="menu" data-wow-iteration="infinite" data-wow-duration="500ms" data-toggle="offcanvas" data-target=".navmenu">
        <p><i class="fa fa-file-text-o"></i> كل الصفح</p>
      </div>