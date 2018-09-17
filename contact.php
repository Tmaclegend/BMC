<!--Contact us page for visitors-->
<!--php to communicate with database-->
<?php
setcookie("username", null, time()-3600);
setcookie("user_id", null, time()-3600);
setcookie("useremail", null, time()-3600);
?>

<!--html starts-->
<!DOCTYPE html>
<html>
<head>
	<title>BuyMeChips | Worldwide Buyers</title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Custom Theme files -->
	<!--theme-style-->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
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
						<li><a href="login.php">Login</a></li>
						<li><a href="register.php">Register</a></li>
					</ul>
				</div>
				
				<div class="clearfix"> </div>
			</div>
		</div>
		
		<div class="container">

			<div class="head-top">

				<div class="col-sm-8 col-md-offset-2 h_menu4">
					<nav class="navbar nav_bottom" role="navigation">

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
							<ul class="nav navbar-nav nav_1">
								<li><a class="color" href="index.php">Home</a></li>

								<li class="dropdown mega-dropdown active">
									<a class="color" href="hotitem.php">Hot items</a></li>				
								</li>
								<li class="dropdown mega-dropdown active">
									<a class="color2" href="#" class="dropdown-toggle" data-toggle="dropdown">By categories<span class="caret"></span></a>				
									<div class="dropdown-menu mega-dropdown-menu">
										<div class="menu-top">
											<div class="col1">
												<div class="h_nav">
													<h4>Health & Beauty</h4>
													<ul>
														<li><a href="product.php?category=Hair">Hair</a></li>
														<li><a href="product.php?category=Nail">Nail</a></li>
														<li><a href="product.php?category=Body">Body</a></li>
														<li><a href="product.php?category=Skin care">Skin care</a></li>
														<li><a href="product.php?category=Makeup">Makeup</a></li>
														<li> </li>
													</ul>	
												</div>							
											</div>
											<div class="col1">
												<div class="h_nav">
													<h4>Fashion</h4>
													<ul>
														<li><a href="product.php?category=Tops">Tops</a></li>
														<li><a href="product.php?category=Bottoms">Bottoms</a></li>
														<li><a href="product.php?category=Coats and Jackets">Coats & Jackets</a></li>
														<li><a href="product.php?category=Bags and Wallet">Bags & Wallet</a></li>
														<li><a href="product.php?category=Shoes">Shoes</a></li>
														<li><a href="product.php?category=Accessories">Accessories</a></li>
														<li> </li>
													</ul>	
												</div>							
											</div>
											<div class="col1">
												<div class="h_nav">
													<h4>Home & Family</h4>
													<ul>
														<li><a href="product.php?category=Toys">Toys</a></li>
														<li><a href="product.php?category=Board Games">Board Games</a></li>
														<li><a href="product.php?category=Lifestyle">Lifestyle</a></li>
														<li><a href="product.php?category=Books">Books</a></li>
														<li> </li>
													</ul>	

												</div>							
											</div>
											<div class="col1">
												<div class="h_nav">
													<h4>Digital & Electronics</h4>
													<ul>
														<li><a href="product.php?category=Photography">Photography</a></li>
														<li><a href="product.php?category=Computer">Computer</a></li>
														<li><a href="product.php?category=Smartphone">Smartphone</a></li>
														<li><a href="product.php?category=Music">Music</a></li>
														<li> </li>
													</ul>	
												</div>							
											</div>
										</div>                  
									</div>				
								</li>
								<li><a class="color4" href="about_us.html">About Us</a></li>
								<li ><a class="color6" href="contact.php">Contact Us</a></li>
							</ul>
						</div>
						<!-- /.navbar-collapse -->

					</nav>
				</div>
				<div class="col-sm-2 search-right">
					<ul class="heart">
						<li><a class="play-icon popup-with-zoom-anim" href="#small-dialog"><i class="glyphicon glyphicon-search"> </i></a></li>
					</ul>
					
					<div class="clearfix"> </div>

						<!----->
						<!---pop-up-box---->					  
						<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
						<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
						<!---//pop-up-box---->
						<div id="small-dialog" class="mfp-hide">
							<div class="search-top">
								<div class="login-search">
									<form method="get" action="search.php">
										<input type="submit" value="">
										<input type="text" name="keyword" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}">
									</form>		
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
					</div>
					<div class="clearfix"></div>
				</div>	
			</div>	

			<!--banner-->
			<div class="banner-top">
				<div class="container">
					<h1>Contact Us</h1>
					<em></em>
					<h2><a href="index.php">Home</a><label>/</label>Contact Us</h2>
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
								<form>
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
										<input type="submit" value="Send" onclick="click_submit()">
									</label>
									<script>
										function click_submit() {
											alert("Well received!");
											location.reload();
										}
									</script>
								</form>						
							</div>
						</div>
					</div>

					<div class="brand">
						<div class="clearfix"></div>
					</div>

				</div>
			</div>
			
			<!--//content-->
			<!--//footer-->
			<div class="footer">
				<div class="footer-middle">
					<div class="container">
						<div class="col-md-3 footer-middle-in">
							<a href="index.php"><img src="images/log.png" alt=""></a>
							<p>Anything you want from the other side is available here. Jump out of the geographical limits together with us. You would find all oversea goods here.</p>
						</div>
						
						<div class="col-md-3 footer-middle-in">
							<h6>Information</h6>
							<ul class=" in">
								<li><a href="login.php">Login</a></li>
								<li><a href="register.php">Register</a></li>
							</ul>
							<ul class=" in">
								<li> </li>
							</ul>
							<ul class="in in1">
								<li><a href="about_us.html">&nbspAbout Us</a></li>
								<li><a href="contact.php">&nbspContact Us </a></li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="col-md-3 footer-middle-in">
							<h6>Tags</h6>
							<ul class="tag-in">
								<li><a href="search.php?keyword=Computer">Computer</a></li>
								<li><a href="search.php?keyword=Camera">Camera</a></li>
								<li><a href="search.php?keyword=Samsung">Samsung</a></li>
								<li><a href="search.php?keyword=Starbucks">Starbucks</a></li>
								<li><a href="search.php?keyword=GoPro">GoPro</a></li>
							</ul>
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

			<script src="js/simpleCart.min.js"> </script>
			<!-- slide -->
			<script src="js/bootstrap.min.js"></script>
			
		</body>
		</html>