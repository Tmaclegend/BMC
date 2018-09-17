<!--index page for visitors-->
<!--php to communicate with database-->
<?php
setcookie("username", null, time()-3600);
setcookie("user_id", null, time()-3600);
setcookie("useremail", null, time()-3600);
$host = 'localhost';
$user  = 'root';
$pass = 'password';
$db = 'bmc_db';

$con = mysqli_connect($host, $user, $pass, $db);
//get the products	
$sql = "SELECT * From products";
$result = mysqli_query($con, $sql);
$product_name_ary = [];
$product_price_ary = [];
$product_category_ary = [];
$product_imgpath_ary = [];
$counter = 0;
while($matched = mysqli_fetch_assoc($result)){
	$product_id_ary[$counter] = $matched["product_id"];
	$product_name_ary[$counter] = $matched["product_name"];
	$product_price_ary[$counter] = $matched["price"];
	$product_category_ary[$counter] = $matched["category"];
	$product_imgpath_ary[$counter] = $matched["img_path1"];
	$counter = $counter + 1;
}
if($counter>9){
	$counter = 9;
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
		</div>
		<!--banner-->
		<div class="banner">
			<div class="container">
				<section class="rw-wrapper">
					<h1 class="rw-sentence">
						<span>BuyMeChips</span>
						<div class="rw-words rw-words-1">
							<span>Health & Beauty</span>
							<span>Fashion</span>
							<span>Home & Family</span>
							<span>Digital & Electronics</span>
						</div>
						<div class="rw-words rw-words-2">
							<span>Worldwide goods</span>
							<span>Buyers from the other side</span>
							<span>Anything you want</span>
							<span>One-stop at BuyMeChips</span>
						</div>
					</h1>
				</section>
			</div>
		</div>
		<!--content-->
		<div class="content">
			<div class="container">
				<div class="content-top">
					<div class="col-md-6 col-md">
						<div class="col-1">
							<a href="search.php?keyword=starbucks">
								<img src="images/pi4.jpg" class="img-responsive" alt=""/>
							</a>

							<!---<a href="single.html"><img src="images/pi.jpg" class="img-responsive" alt=""></a>-->
						</div>
						<div class="col-2">
							<span>Hot Deal</span>
							<h2><a href="search.php?keyword=Starbucks">Starbucks series</a></h2>
							<p>Check out Starbucks tumblers, mugs and accessories from different countries here. Our sellers are going to get the one for you.</p>
							<a href="search.php?keyword=Starbucks" class="buy-now">Buy Now</a>
						</div>
					</div>
					<div class="col-md-6 col-md1">
						<div class="col-3">
							<a href="product.php?category=Tops"><img src="images/pi1.jpg" class="img-responsive" alt="">
								<div class="col-pic">
									<p>Fashion</p>
									<label></label>
									<h5>Tops</h5>
								</div></a>
							</div>
							<div class="col-3">
								<a href="product.php?category=Toys"><img src="images/pi2.jpg" class="img-responsive" alt="">
									<div class="col-pic">
										<p>Home & Family</p>
										<label></label>
										<h5>Toys</h5>
									</div></a>
								</div>
								<div class="col-3">
									<a href="product.php?category=Hair"><img src="images/pi3.jpg" class="img-responsive" alt="">
										<div class="col-pic">
											<p>Health & Beauty</p>
											<label></label>
											<h5>Hair</h5>
										</div></a>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
							<!--products-->
							<div class="content-mid">
								<h3>Trending Items</h3>
								<label class="line"></label>
								<div class="mid-popular">
									<!--grid in the middle-->
									<?php
									if($counter == 0)
										echo "<h2 style=\"color:#FF6C6C;\"c>Coming Soon...</h2><br>";
									for($i = 0; $i<$counter; $i++){?>
									<div class="col-md-4 item-grid1 simpleCart_shelfItem">
										<div class=" mid-pop" style="height:525px;">
											<div class="pro-img">
												<img src="<?php echo $product_imgpath_ary[$i]; ?>" class="img-responsive" alt="">
												<div class="zoom-icon ">
													<a class="picture" href="<?php echo $product_imgpath_ary[$i]; ?>" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
													<a href="<?php echo "single.php?id=".$product_id_ary[$i]?>"><i class="glyphicon glyphicon-menu-right icon"></i></a>
												</div>
											</div>
											<div class="mid-1">
												<div class="women">
													<div class="women-top">
														<span><?php echo $product_category_ary[$i]?></span>
														<h6><a href="<?php echo "single.php?id=".$product_id_ary[$i]?>"><?php echo $product_name_ary[$i]?></a></h6>
													</div>
													<div class="img item_add">
														<a href="#"><img src="images/ca.png" alt=""></a>
													</div>
													<div class="clearfix"></div>
												</div>
												<div class="mid-2">
													<p><em class="item_price">$<?php echo $product_price_ary[$i]?></em></p>
													<div class="clearfix"></div>
												</div>

											</div>
										</div>
									</div>
									<?php } ?>

									<div class="clearfix"></div>
								</div>
							</div>
							<!--//products-->
							<!--brand-->
							<div class="brand">

								<div class="clearfix"></div>
							</div>
							<!--//brand-->
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
					<!--light-box-files -->
					<script src="js/jquery.chocolat.js"></script>
					<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen" charset="utf-8">
					<!--light-box-files -->
					<script type="text/javascript" charset="utf-8">
						$(function() {
							$('a.picture').Chocolat();
						});
					</script>


				</body>
				</html>