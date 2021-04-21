<?php
session_start();
if(isset($_SESSION['userid']))
{
	$lang = 'ar';
	$_SERVER['HTTP_PRAGMA'] = 'no-cache';
	$_SERVER['HTTP_CACHE_CONTROL'] = 'no-cache';
	include('develops/orders-front.php');
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
              <h2 class="page-title"><?php language('orders'); ?></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Header End --> 

    <!-- Content section Start --> 
    <section id="content">
      <div class="container" dir="rtl">
        <div class="row" style="margin-bottom:25px; text-align:center;">
				<h3><?php language('orders'); ?></h3>
			</div>
			
			<div class="row" style="margin-bottom:25px; text-align:center;">
				<div class="col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">
					<?php
						if(isset($_GET['message']) && $_GET['message'] == 'm1') echo '<div style="color:green;">Success</div>';
						elseif(isset($_GET['message']) && $_GET['message'] == 'm2') echo '<div style="color:red;">Something Wrong</div>';
						elseif(isset($_GET['message']) && $_GET['message'] == 'm3') echo '<div style="color:red;">Valid Business Email</div>';
					?>
				</div>
			</div>
			
			<?php if(!empty($orders)) { ?>
			<div class="row" style="margin-bottom:25px; text-align:center;">
				<div class="col-sm-2 col-md-2 col-sm-offset-2 col-offset-md-2">
					<div style="width:25px; height:25px; background-color:#f2dede; border:1px solid red; border-radius:5%; float:left;"></"></div>
					<label for="renow" class="control-label"><?php language('renow'); ?></label>
				</div>
				<div class="col-sm-2 col-md-2 col-sm-offset-1 col-md-offset-1">
						<div style="width:25px; height:25px; background-color:#fcf8e3; border:1px solid orange; border-radius:5%; float:left;"></div>
						<label for="npayed" class=""><?php language('notpayed'); ?></label>
					
				</div>
				<div class="col-sm-2 col-md-2 col-sm-offset-1 col-md-offset-1">
					<div style="width:25px; height:25px; background-color:#dff0d8; border:1px solid green; border-radius:5%; float:left;"></"></div>
					<label for="active" class="control-label"><?php language('active'); ?></label>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-12 col-md-12 table-responsive">
						<table class="table table-bordered">
							<tr style="background-color:#d9534f; color:#fff;">
								<th width="30%"><?php language('title'); ?></th>
								<th width="10%"><?php language('adsnumber'); ?></th>
								<th width="20%"><?php language('fees'); ?></th>
								<th width="30%"><?php language('time'); ?></th>
								<!--<th width="10%">Payed</th>-->
								<th width="10%"></th>
							</tr>
							<?php for($od=0;$od<count($orders);$od++) { ?>
								<tr class="<?php if($orders[$od]['dtime'] != '' && time() >  strtotime( '+1 month', $orders[$od]['dtime'])) echo 'danger'; elseif($orders[$od]['delivered'] == 0) echo 'warning'; elseif($orders[$od]['delivered'] == 1) echo 'success'; ?>">
									<td width="30%" style="color:#666666;"><?php echo $orders[$od]['title']; ?></td>
									<td width="10%" style="color:#666666;"><?php echo $orders[$od]['number']; ?></td>
									<td width="20%" style="color:#666666;"><?php echo $orders[$od]['total'].' جنيه / '; language('month'); ?></td>
									<td width="30%" style="color:#666666;"><?php echo date('Y-m-d , h:i:sa', $orders[$od]['time']); ?></td>
									<!--<td width="10%" style="color:#666666;"><input type="checkbox" <?php //if($orders[$od]['delivered'] == 1) echo 'checked'; ?> disabled></td>-->
									<td width="10%">
										<?php if($orders[$od]['dtime'] != '' && time() >  strtotime( '+1 month', $orders[$od]['dtime'])) { ?>
										<div class="dropdown">
											<a href="#" class="btn btn-danger" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?php language('renow'); ?>
												<span class="caret"></span>
											</a>			
											<ul class="dropdown-menu">
												<li><a href="orders.php?paymethod=bank&id=<?php echo $orders[$od]['id']; ?>"><?php language('bank'); ?></a></li>
												<li><a href="orders.php?paymethod=paypal&id=<?php echo $orders[$od]['id']; ?>"><?php language('paypal'); ?></a></li>
											</ul>
										</div>
										<?php } ?>
									</td>
								</tr>
							<?php } ?>
						</table>
				</div>
			</div>
			
			<div class="row" style="text-align:center;">
				<div class="col-sm-12 col-md-12">
					<nav>
						<ul class="pagination">
							<?php if($totalPages > 1) { ?><li><a href="?page=1"><?php language('first'); ?></a></li><?php } ?>
							<?php if($page > 3) { ?><li>
								<a href="?page=<?php echo $page-2; ?>" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
								</a>
							</li><?php } ?>
							<?php if($page > 1) { ?><li><a href="?page=<?php echo $page-1; ?>"><?php echo $page-1; ?></a></li><?php } ?>
							<?php if($totalPages > 1) { ?><li><a href="?page=<?php echo $page; ?>"><?php echo $page; ?></a></li><?php } ?>
							<?php if($page < $totalPages) { ?><li><a href="?page=<?php echo $page+1; ?>"><?php echo $page+1; ?></a></li><?php } ?>
							<?php if($page < $totalPages-1) { ?><li>
								<a href="?page=<?php echo $page+2; ?>" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
								</a>
							</li><?php } ?>
							<?php if($totalPages > 1) { ?><li><a href="?page=<?php echo $totalPages; ?>"><?php language('last'); ?></a></li><?php } ?>
						</ul>
					</nav>
				</div>
			</div>
			<?php } else echo 'لا توجد طلبات'; ?>
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
<?php } else header('Location: index.php'); ?>