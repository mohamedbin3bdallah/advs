<?php
$about = getRowFromTable('*','about','where id = 1','');
$contact = getRowFromTable('*','contact','where id = 1','');
?>
<!-- Footer Area Start -->
    	<section class="footer-Content">
    		<div class="container">
    			<div class="row">
    				<div class="col-md-4 col-sm-12 col-xs-12 wow fadeIn" data-wow-delay="0">
              <div class="widget">
                <h3 class="block-title"><center>من نحن</center></h3>
                <div class="textwidget">
                  <p style="text-align:justify;"><?php echo $about['vision']; ?></p>
                </div>
              </div>
            </div>
    				<div class="col-md-4 col-sm-12 col-xs-12 wow fadeIn" data-wow-delay="0.5">
    					<div class="widget">
    						<h3 class="block-title"><center>روابط مفيدة</center></h3>
  							<ul class="menu">
                  <li><a href="index.php">الرئيسية</a></li>
                  <li><a href="ads.php">الاعلانات</a></li>
                  <li><a href="faq.php">الاسئله المكررة</a></li>
                  <!--<li><a href="#">الاستخدام</a></li>-->
                  <li><a href="categories.php">دليل الشركات</a></li>
                  <li><a href="about.php">من نحن</a></li>
                  <li><a href="contact.php">التواصل</a></li>
                  <!--<li><a href="#">المدونة</a></li>-->
                  <li><a href="instructions.php">اتفاقية الستخدام</a></li>
                  <li><a href="privacy.php">الخصوصية</a></li>
                </ul>
    					</div>
    				</div>
    				<div class="col-md-4 col-sm-12 col-xs-12 wow fadeIn" data-wow-delay="1s">
    					<div class="widget">
                <h3 class="block-title"><center>العنوان</center></h3>
                <div class="twitter-content clearfix">
                  <ul class="twitter-list">
					<?php if($contact['address'] != '') { ?>
                    <li class="clearfix">
                      <span>
                        <?php echo $contact['address']; ?>
                      </span>
                    </li>
					<?php } ?>
					<?php if($contact['phone'] != '') { ?>
                    <li class="clearfix">
                      <span>
                        الهاتف: <?php echo $contact['phone']; ?>
                      </span>
                    </li>
					<?php } ?>
					<?php if($contact['mobile'] != '') { ?>
					<li class="clearfix">
                      <span>
                        الموبايل: <?php echo $contact['mobile']; ?>
                      </span>
                    </li>
					<?php } ?>
					<?php if($contact['email'] != '') { ?>
					<li class="clearfix">
                      <span>
                        البريد الالكتروني: <a href="mailto:<?php echo $contact['email']; ?>"><?php echo $contact['email']; ?></a>
                      </span>
                    </li>
					<?php } ?>
                  </ul>
                </div>
              </div>
    				</div>
    				<!--<div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn" data-wow-delay="1.5s">
    					<div class="widget">
    						<h3 class="block-title"><center>اعلانات</center></h3>
                <ul class="featured-list">
                  <li>
                    <img alt="" src="assets/img/featured/img1.jpg">
                    <div class="hover">
                      <a href="#"><span>$49</span></a>
                    </div>
                  </li>
                  <li>
                    <img alt="" src="assets/img/featured/img2.jpg">
                    <div class="hover">
                      <a href="#"><span>$49</span></a>
                    </div>
                  </li>
                  <li>
                    <img alt="" src="assets/img/featured/img3.jpg">
                    <div class="hover">
                      <a href="#"><span>$49</span></a>
                    </div>
                  </li>
                  <li>
                    <img alt="" src="assets/img/featured/img4.jpg">
                    <div class="hover">
                      <a href="#"><span>$49</span></a>
                    </div>
                  </li>
                  <li>
                    <img alt="" src="assets/img/featured/img5.jpg">
                    <div class="hover">
                      <a href="#"><span>$49</span></a>
                    </div>
                  </li>
                  <li>
                    <img alt="" src="assets/img/featured/img6.jpg">
                    <div class="hover">
                      <a href="#"><span>$49</span></a>
                    </div>
                  </li>
                </ul> 						
    					</div>
    				</div>-->
    			</div>
    		</div>
    	</section>
    	<!-- Footer area End -->
    	
    	<!-- Copyright Start  -->
    	<div id="copyright">
    		<div class="container">
    			<div class="row">
    				<div class="col-md-12">
              <div class="site-info pull-left">
                <p>All copyrights reserved @ 2016 - Designed by <a href="http://onetrusted.com" target="_blank">Onetrusted</a></p>
              </div>    					
              <div class="bottom-social-icons social-icon pull-right">  
                <?php if($contact['facebook'] != '') { ?><a class="facebook" target="_blank" href="<?php echo $contact['facebook'];?>"><i class="fa fa-facebook"></i></a><?php } ?>
                <?php if($contact['twitter'] != '') { ?><a class="twitter" target="_blank" href="<?php echo $contact['twitter'];?>"><i class="fa fa-twitter"></i></a><?php } ?>
                <?php if($contact['dribble'] != '') { ?><a class="dribble" target="_blank" href="<?php echo $contact['dribble'];?>"><i class="fa fa-dribbble"></i></a><?php } ?>
                <?php if($contact['flickr'] != '') { ?><a class="flickr" target="_blank" href="<?php echo $contact['flickr'];?>"><i class="fa fa-flickr"></i></a><?php } ?>
                <?php if($contact['youtube'] != '') { ?><a class="youtube" target="_blank" href="<?php echo $contact['youtube'];?>"><i class="fa fa-youtube"></i></a><?php } ?>
                <?php if($contact['googleplus'] != '') { ?><a class="google-plus" target="_blank" href="<?php echo $contact['googleplus'];?>"><i class="fa fa-google-plus"></i></a><?php } ?>
                <?php if($contact['linkedin'] != '') { ?><a class="linkedin" target="_blank" href="<?php echo $contact['linkedin'];?>"><i class="fa fa-linkedin"></i></a><?php } ?>
              </div>
    				</div>
    			</div>
    		</div>
    	</div>
    	<!-- Copyright End -->