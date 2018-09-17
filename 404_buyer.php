<!--404 not found page for buyer-->

<!--php to retrieve data from database-->
<?php
$username = $_COOKIE["username"];
$user_id = $_COOKIE['user_id'];
?>

<!--html code starts here-->
<!DOCTYPE html>
<html>
<head>
	<title>BuyMeChips | Worldwide Buyers</title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Custom Theme files -->
	<!--theme-style-->
	<link href="css/style2.css" rel="stylesheet" type="text/css" media="all" />	
	<!--//theme-style-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Shopin Responsive web template, Bootstrap Web Templates, Flat Web Templates, AndroId Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!--theme-style-->
	<link href="css/style4.css" rel="stylesheet" type="text/css" media="all" />	
	<!--//theme-style-->
	<script src="js/jquery.min.js"></script>
</head>
<body>
	<!--header-->
	<div class="header">
		<div class="container">
			<div class="head">
				<div class=" logo">
					<a href="index.php"><img src="images/logo.png" alt=""></a>	
				</div>
			</div>
		</div>
		<div class="header-top">
			<div class="container">
				<div class="col-sm-5 col-md-offset-2  header-login">
					<ul >
						<li><a href="index.php">Home</a></li>
						<li><a href="buyer_index.php"><?php echo $username?></a></li>
					</ul>
				</div>
				
				<div class="col-sm-5 header-social">		
					
					
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		
		<div class="container">
			
			<div class="head-top">
				
				<div class="col-sm-8 col-md-offset-2 h_menu4">
					<nav class="navbar nav_bottom" role="navigation">
						
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header nav_2">
							<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							
						</div> 
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
							<ul class="nav navbar-nav nav_1">
								
							</ul>
						</div><!-- /.navbar-collapse -->

					</nav>
				</div>
				<div class="col-sm-2 search-right">
					
					<div class="clearfix"> </div>
					
						<!----->

						<!---pop-up-box---->					  
						<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
						<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
						<!---//pop-up-box---->
						<div id="small-dialog" class="mfp-hide">
							<div class="search-top">
								<div class="login-search">
									<input type="submit" value="">
									<input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}">		
								</div>
								<p></p>
							</div>				
						</div>
						<script>
							$(document).ready(function() {
								$('.popup-with-zoom-anim').magnificPopup({
									type: 'inline',
									fixedContentPos: false,
									fixedBgPos: true,
									overflowY: 'auto',
									closeBtnInside: true,
									preloader: false,
									midClick: true,
									removalDelay: 300,
									mainClass: 'my-mfp-zoom-in'
								});
								
							});
						</script>		
						<!----->
			</div>
			<div class="clearfix"></div>
		</div>	
	</div>	
</div>
<!--banner-->
<div class="banner-top">
	<div class="container">
		<h1>404</h1>
		<em></em>
		<h2><a href="index.php">Home</a><label>/</label>404</h2>
	</div>
</div>
<!--login-->
<div class="container">
	<div class="four">
		<h3>404</h3>
		<p>Sorry! Evidently the document you were looking for has either been moved or no longer exist.</p>
		<a href="index.php" class="hvr-skew-backward">Back To Home</a>
	</div>
</div>
<!--//login-->

<!--brand-->
<div class="container">
	<div class="brand">
		
		<div class="clearfix"></div>
	</div>
</div>
<!--//brand-->

<!--//content-->
<!--//footer-->
<div class="footer">
	<div class="footer-middle">
		<div class="container">
			<div class="col-md-3 footer-middle-in">
				<a href="index.php"><img src="images/log.png" alt=""></a>
				<p>Suspendisse sed accumsan risus. Curabitur rhoncus, elit vel tincidunt elementum, nunc urna tristique nisi, in interdum libero magna tristique ante. adipiscing varius. Vestibulum dolor lorem.</p>
			</div>
			
			<div class="col-md-3 footer-middle-in">
				<h6>Information</h6>
				<ul class=" in">
					<li><a href="404.html">About</a></li>
					<li><a href="contact.html">Contact Us</a></li>
					<li><a href="#">Returns</a></li>
					<li><a href="contact.html">Site Map</a></li>
				</ul>
				<ul class="in in1">
					<li><a href="#">Order History</a></li>
					<li><a href="wishlist.html">Wish List</a></li>
					<li><a href="login.html">Login</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-3 footer-middle-in">
				<h6>Tags</h6>
				<ul class="tag-in">
					<li><a href="#">Lorem</a></li>
					<li><a href="#">Sed</a></li>
					<li><a href="#">Ipsum</a></li>
					<li><a href="#">Contrary</a></li>
					<li><a href="#">Chunk</a></li>
					<li><a href="#">Amet</a></li>
					<li><a href="#">Omnis</a></li>
				</ul>
			</div>
			<div class="col-md-3 footer-middle-in">
				<h6>Newsletter</h6>
				<span>Sign up for News Letter</span>
				<form>
					<input type="text" value="Enter your E-mail" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Enter your E-mail';}">
					<input type="submit" value="Subscribe">	
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">
			<ul class="footer-bottom-top">
				<li><img src="images/f1.png" class="img-responsive" alt=""></li>
				<li><img src="images/f2.png" class="img-responsive" alt=""></li>
				<li><img src="images/f3.png" class="img-responsive" alt=""></li>
			</ul>
			<p class="footer-class">&copy; 2016 Shopin. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--//footer-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script src="js/simpleCart.min.js"> </script>
<!-- slide -->
<script src="js/bootstrap.min.js"></script>

</body>
</html>