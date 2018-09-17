<!--single item page for visitors-->
<!--php to get info from database-->
<?php
$product_id = $_GET['id'];
$host = 'localhost';
$user  = 'root';
$pass = 'password';
$db = 'bmc_db';


$con = mysqli_connect($host, $user, $pass, $db);
$sql = "SELECT * FROM products WHERE product_id = '$product_id'";
$result = mysqli_query($con, $sql);
$matched = mysqli_fetch_assoc($result);
$product_name = $matched["product_name"];
$product_sellerid = $matched["user_id"];
$product_price = $matched["price"];
$product_country = $matched["country"];
$product_description = $matched["description"];
$product_category = $matched["category"];
$product_imgpath1 = $matched["img_path1"];
$product_imgpath2 = $matched["img_path2"];
$product_imgpath3 = $matched["img_path3"];


$sql = "SELECT username, bio FROM users WHERE user_id = '$product_sellerid'";
$result = mysqli_query($con, $sql);
$matched = mysqli_fetch_assoc($result);
$sellername = $matched["username"];
$sellerbio = $matched["bio"];

if(isset($_POST['post_btn'])){
	$comment = mysqli_real_escape_string($con, $_POST['new_comment']);
	$user_id = $_COOKIE['user_id'];
	$user_id = intval($user_id);
	$product_id = intval($product_id);
	$sql = "INSERT INTO comments (product_id, user_id, comment) VALUES ('$product_id', '$user_id', '$comment')";
	$result = mysqli_query($con, $sql);
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
					<h1><?php echo $product_category; ?></h1>
					<em></em>
					<h2><a href="index.php">Home</a><label>/</label><?php echo $product_category?></h2>
				</div>
			</div>
			<div class="single">

				<!--main content-->
				<div class="container">
					<div class="col-md-9">
						<div class="col-md-5 grid">		
							<div class="flexslider">
								<ul class="slides">
									<li data-thumb="<?php echo $product_imgpath1 ?>">
										<div class="thumb-image"> <img src="<?php echo $product_imgpath1 ?>" data-imagezoom="true" class="img-responsive"> </div>
									</li>
									<li data-thumb="<?php echo $product_imgpath2 ?>">
										<div class="thumb-image"> <img src="<?php echo $product_imgpath2 ?>" data-imagezoom="true" class="img-responsive"> </div>
									</li>
									<li data-thumb="<?php echo $product_imgpath3 ?>">
										<div class="thumb-image"> <img src="<?php echo $product_imgpath3 ?>" data-imagezoom="true" class="img-responsive"> </div>
									</li> 
								</ul>
							</div>
						</div>	
						<div class="col-md-7 single-top-in">
							<div class="span_2_of_a1 simpleCart_shelfItem">
								<h3><?php echo $product_name;?></h3>
								<p class="in-para"><?php echo $product_category;?></p>
								<div class="price_single">
									<span class="reducedfrom item_price">$<?php echo $product_price;?></span>
									<div class="clearfix"></div>
								</div>
								<h4 class="quick">Product Source:</h4>
								<p class="quick_desc"><?php echo $product_country;?></p>
								<h4 class="quick">Seller:</h4>
								<p class="quick_desc"><?php echo $sellername; ?></p>
								<h4 class="quick">Seller Biography:</h4>
								<p class="quick_desc"><?php echo $sellerbio;?></p>
							</div>

						</div>
						<div class="clearfix"> </div>
						<!---->
						<div class="tab-head">
							<nav class="nav-sidebar">
								<ul class="nav tabs">
									<li class="active"><a href="#tab1" data-toggle="tab">Product Description</a></li>
									<li class=""><a href="#tab3" data-toggle="tab">Reviews</a></li>  
								</ul>
							</nav>
							<div class="tab-content one">
								<div class="tab-pane active text-style" id="tab1">
									<div class="facts">
										<p ><?php echo $product_description;?> </p>         
									</div>

								</div>
								<div class="tab-pane text-style" id="tab3">

									<div class="col-md-6 login-do">
										<form method="post" action="single.php?id=<?php echo $product_id; ?>" enctype="multipart/form-data">
											<?php
											$sql = "SELECT C.cm_id, C.user_id, C.comment, U.username FROM comments C, users U WHERE product_id = '$product_id' and C.user_id = U.user_id ORDER BY cm_id";
											$result = mysqli_query($con, $sql);
											while ($row = mysqli_fetch_assoc($result)){
												if (strcmp($sellername, $row['username']) == 0){
													echo "(owner)" . $row['username'] . ": ";
													
												}
												else{
													echo $row['username'] . ": ";
												}
												echo $row['comment'] . "<br>";
											}
											?>
											
										</form>
									</div>	

								</div>

							</div>
							<div class="clearfix"></div>
						</div>
						<!---->	
					</div>

<!----->

<div class="col-md-3 product-bottom product-at">
	<!--categories-->
	<div class=" rsidebar span_1_of_left">
		<h4 class="cate">Categories</h4>
		<ul class="menu-drop">
			<li class="item1"><a href="#">Health & Beauty </a>
				<ul class="cute">
					<li class="subitem1"><a href="product.html">Hair </a></li>
					<li class="subitem2"><a href="product.html">Nail </a></li>
					<li class="subitem3"><a href="product.html">Body </a></li>
					<li class="subitem1"><a href="product.html">Skin care </a></li>
					<li class="subitem2"><a href="product.html">Makeup </a></li>
				</ul>
			</li>
			<li class="item2"><a href="#">Fashion </a>
				<ul class="cute">
					<li class="subitem1"><a href="product.html">Tops </a></li>
					<li class="subitem2"><a href="product.html">Bottoms </a></li>
					<li class="subitem3"><a href="product.html">Coats & Jackets </a></li>
					<li class="subitem1"><a href="product.html">Bags & Wallet </a></li>
					<li class="subitem2"><a href="product.html">Shoes </a></li>
					<li class="subitem3"><a href="product.html">Accessories </a></li>
				</ul>
			</li>
			<li class="item3"><a href="#">Home & Family</a>
				<ul class="cute">
					<li class="subitem1"><a href="product.html">Toys </a></li>
					<li class="subitem2"><a href="product.html">Board Games </a></li>
					<li class="subitem3"><a href="product.html">Lifestyles</a></li>
					<li class="subitem1"><a href="product.html">Books </a></li>
				</ul>
			</li>
			<li class="item4"><a href="#">Digital & Electronics</a>
				<ul class="cute">
					<li class="subitem1"><a href="product.html">Photography </a></li>
					<li class="subitem2"><a href="product.html">Computer </a></li>
					<li class="subitem3"><a href="product.html">Smartphone</a></li>
					<li class="subitem1"><a href="product.html">Music </a></li>
				</ul>
			</li>
		</ul>
	</div>
	<!--initiate accordion-->
	<script type="text/javascript">
		$(function() {
			var menu_ul = $('.menu-drop > li > ul'),
			menu_a  = $('.menu-drop > li > a');
			menu_ul.hide();
			menu_a.click(function(e) {
				e.preventDefault();
				if(!$(this).hasClass('active')) {
					menu_a.removeClass('active');
					menu_ul.filter(':visible').slideUp('normal');
					$(this).addClass('active').next().stop(true,true).slideDown('normal');
				} else {
					$(this).removeClass('active');
					$(this).next().stop(true,true).slideUp('normal');
				}
			});

		});
	</script>
	
</div>
<div class="clearfix"> </div>
</div>

<!--brand-->
<div class="container">
	<div class="brand">
		<div class="clearfix"></div>
	</div>
</div>
<!--//brand-->
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
<script src="js/imagezoom.js"></script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script defer src="js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

<script>
// Can also be used with $(document).ready()
$(window).load(function() {
	$('.flexslider').flexslider({
		animation: "slide",
		controlNav: "thumbnails"
	});
});
</script>

<script src="js/simpleCart.min.js"> </script>
<!-- slide -->
<script src="js/bootstrap.min.js"></script>


</body>
</html>