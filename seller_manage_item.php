<!--manage item page for sellers-->
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
			</div>
		</div>

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

		<div class="banner_4">
			<div class="container">
				<section class="rw-wrapper">
					<h1 class="rw-sentence">
						<span>Manage My Items</span>
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
	</div>
	<!--content-->


	<div class="content">
		<div class="container">
			<div class="content-mid">
				<h3>My Items</h3>
				<label class="line"></label>
				<div class="mid-popular">
					<?php
//connect to database
					$host = 'localhost';
					$user  = 'root';
					$pass = 'password';
					$db = 'bmc_db';

					$con = mysqli_connect($host, $user, $pass, $db);
					$sql = "SELECT * FROM products WHERE user_id = '$user_id' ORDER BY product_id DESC";
					$result = mysqli_query($con, $sql);

					while ($row = mysqli_fetch_assoc($result)){?>
					<div class="col-md-3 item-grid1 simpleCart_shelfItem">
						<div class=" mid-pop" style="height:525px;">
							<div class="pro-img">
								<img src="<?php echo $row['img_path1']; ?>" class="img-responsive" alt="">
								<div class="zoom-icon ">
									<a class="picture" href="<?php echo $row['img_path1']; ?>" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
									<a href="<?php echo "seller_single.php?id=".$row['product_id']?>"><i class="glyphicon glyphicon-menu-right icon"></i></a>
								</div>
							</div>
							<div class="mid-1">
								<div class="women">
									<div class="women-top">
										<span><?php echo $row['category']?></span>
										<h6><a href="<?php echo "seller_single.php?id=".$row['product_id']?>"><?php echo $row['product_name']?></a></h6>
									</div>

									<div class="clearfix"></div>
								</div>
								<div class="mid-2">
									<p><em class="item_price">$<?php echo $row['price']?></em></p>
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
		</div>	

	</div>	

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