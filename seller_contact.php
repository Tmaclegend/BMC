<!--contact us page for seller-->
<!--php to get info from database-->
<?php
$username = $_COOKIE["username"];
$user_id = $_COOKIE['user_id'];
$useremail = $_COOKIE['useremail'];

$host = 'localhost';
$user  = 'root';
$pass = 'password';
$db = 'bmc_db';
$con = mysqli_connect($host, $user, $pass, $db);

//Seller validation
$sql = "SELECT isBuyer FROM users Where user_id = '$user_id'";
$result = mysqli_query($con, $sql);
if ($row = mysqli_fetch_assoc($result)){
	if ($row['isBuyer'] == 1){
		header("Location: 404_seller.php");
	}
}
else{
	header("Location: 404_seller.php");
}

if (isset($_POST['submit'])){
	echo "<script type='text/javascript'>alert('We have received your message. Thank you!');</script>";
}
?>
<!--html starts-->
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
	<!--- start-rate---->
	<script src="js/jstarbox.js"></script>
	<link rel="stylesheet" href="css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
	<script type="text/javascript">
		jQuery(function() {
			jQuery('.starbox').each(function() {
				var starbox = jQuery(this);
				starbox.starbox({
					average: starbox.attr('data-start-value'),
					changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
					ghosting: starbox.hasClass('ghosting'),
					autoUpdateAverage: starbox.hasClass('autoupdate'),
					buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
					stars: starbox.attr('data-star-count') || 5
				}).bind('starbox-value-changed', function(event, value) {
					if(starbox.hasClass('random')) {
						var val = Math.random();
						starbox.next().text(' '+val);
						return val;
					} 
				})
			});
		});
	</script>
	<!---//End-rate---->
</head>
<body>
	<!--header-->
	<div class="header">
		<div class="container">
			<div class="head">
				<div class=" logo">
					<a href="seller_index.php"><img src="images/logo.png" alt=""></a>	
				</div>
			</div>
		</div>
		<div class="header-top">
			<div class="container">
				<div class="col-sm-5 col-md-offset-2  header-login">
					<ul >
						<li><a href="seller_account_man.php"><?php echo $username?></a></li>
						<li><a href="seller_message.php">Message</a></li>
						<li><a href="index.php">Logout</a></li>
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
								<li><a class="color" href="seller_index.php">Home</a></li>

								<li>
									<a class="color1" href="seller_postitem.php">Post New Item</a>				
								</li>
								<li>
									<a class="color2" href="seller_manage_item.php">Manage My Items</a>							
								</li>
								<li><a class="color4" href="seller_about_us.php">About Us</a></li>
								<li ><a class="color6" href="seller_contact.php">Contact Us</a></li>
							</ul>
						</div><!-- /.navbar-collapse -->

					</nav>
				</div>

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
								<p>Shopin</p>
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
						
					</div>
					<div class="clearfix"></div>
				</div>	
			</div>	
		</div>
		<!--banner-->
		<div class="banner-top">
			<div class="container">
				<h1>Contact</h1>
				<em></em>
				<h2><a href="seller_index.php">Home</a><label> / </label>Contact Us</h2>
			</div>
		</div>	

		<div class="contact">
			
			<div class="contact-form">
				<div class="container">
					<div class="col-md-6 contact-left">
						<h3>We are always here!</h3>
						<p> You can send us your questions instead and we'll be sure to reach out to you soon! Our friendly customer service is open daily from 9am to 6pm and we aim to respond to all queries within 24 hours! If you don't receive a reply from us within this time frame, please check your spam folders. Please only send your queries once or it may be marked as spam by our mail servers.</p>
						
						
						<div class="address">
							<div class=" address-grid">
								<i class="glyphicon glyphicon-map-marker"></i>
								<div class="address1">
									<h3>Address</h3>
									<p>The Chinese University of Hong Kong</p>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class=" address-grid ">
								<i class="glyphicon glyphicon-phone"></i>
								<div class="address1">
									<h3>Our Phone:<h3>
										<p>+852-218-00000</p>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class=" address-grid ">
									<i class="glyphicon glyphicon-envelope"></i>
									<div class="address1">
										<h3>Email:</h3>
										<p><a href="mailto:info@example.com"> info@buymechips.com</a></p>
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
						</div>
						<div class="col-md-6 contact-top">
							<h3>Want to leave me a message?</h3>
							<form method="post" action="seller_contact.php">
								<div>
									<span>Your Name </span>		
									<input type="text" value="" required="">						
								</div>
								<div>
									<span>Your Email </span>		
									<input type="text" value="" required="">						
								</div>
								<div>
									<span>Subject</span>		
									<input type="text" value="" required="">	
								</div>
								<div>
									<span>Your Message</span>		
									<textarea required=""></textarea>	
								</div>
								<label class="hvr-skew-backward">
									<input type="submit" value="Send" name="submit" >
								</label>
							</form>						
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--//content-->
		<!--//footer-->
		<div class="footer">
			<div class="footer-middle">
				<div class="container">
					<div class="col-md-3 footer-middle-in">
						<a href="seller_index.php"><img src="images/log.png" alt=""></a>
						<p>Anything you want from the other side is available here. Jump out of the geographical limits together with us. You would find all oversea goods here.</p>
					</div>

					<div class="col-md-3 footer-middle-in">
						<h6>Information</h6>
						<ul class="in ">
							<li><a href="seller_about_us.php">&nbspAbout Us</a></li>
							<li><a href="seller_contact.php">&nbspContact Us </a></li>
						</ul>
						<div class="clearfix"></div>
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
					<p class="footer-class">&copy; 2017 BuyMeChips. All Rights Reserved.</p>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<!--//footer-->
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

	</body>
	</html>