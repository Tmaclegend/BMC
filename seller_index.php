<!--index page for seller-->
<!--php to get info from database-->
<?php
$host = 'localhost';
$user  = 'root';
$pass = 'password';
$db = 'bmc_db';
$useremail = $_COOKIE['useremail'];
$con = mysqli_connect($host, $user, $pass, $db);

$sql = "SELECT user_id, username, isBuyer FROM users WHERE email='$useremail'";
$result = mysqli_query($con, $sql);
if ($matched = mysqli_fetch_assoc($result)){
	$user_id = $matched["user_id"];
	$username = $matched["username"];
	$isBuyer = $matched["isBuyer"];
	setcookie("username", $username, time() + (86400 * 30), "/" );
	setcookie("user_id", $user_id, time() + (86400 * 30), "/" );
}

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
</script>
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
						<li><a href="index.php"><?php
							if(isset($_COOKIE['useremail'])){
								unset($_COOKIE['usermail']);
							}
							if(isset($_COOKIE['user_id'])){
								unset($_COOKIE['user_id']);
							}
							if(isset($_COOKIE['username'])){
								unset($_COOKIE['username']);
							}
							?>Logout</a></li>
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
		<p>Shopin</p>
	</div>				
</div>	
</div>
</div>
</div>
</div>	

<!--banner-->
<div class="banner_2">
	<div class="container">
		<section class="rw-wrapper">
			<h1 class="rw-sentence">
				<span>B u y M e C h i p s</span>
				<div class="rw-words rw-words-1">
					<span> Global</span>
					<span>Most Beautiful</span>
					<span>Lowest Price</span>
				</div>
				<div class="rw-words rw-words-2">
					<span>Always in style</span>
					<span>More stores More value</span>
					<span>World of happiness</span>
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
				<div class="col-2">
					<span>Hot Deal</span>
					<h2>You are the seller of BMC</a></h2>
					<p>Billions of buyers register in BMC, including 3000 countries all over the world, your unique items are shown over the world</p>

				</div>
				<div class="col-1">
					<a href="seller_postitem.php" class="b-link-stroke b-animate-go  thickbox">
						<img src="images/pi.jpg" class="img-responsive" alt=""/><div class="col-pic">
						<br><br><br><br><br><br><br><br>
						<p>ITEM</p>
						<label></label>
						<h5>Post</h5>
					</div></a>

					<!---<a href="single.html"><img src="images/pi.jpg" class="img-responsive" alt=""></a>-->
				</div>

			</div>
			<br>
			<div class="col-md-6 col-md1">
				<div class="col-3">
					<a href="seller_manage_item.php" class="b-link-stroke b-animate-go  thickbox">
						<img src="images/pi1.jpg" class="img-responsive" alt=""/><div class="col-pic">
						<p>ITEM</p>
						<label></label>
						<h5>Manage</h5>
					</div></a>

				</div>
				<div class="col-3">
					<a href="seller_message" class="b-link-stroke b-animate-go  thickbox">
						<img src="images/pi2.jpg" class="img-responsive" alt=""/><div class="col-pic">
						<p>send</p>
						<label></label>
						<h5>message</h5>
					</div></a>

				</div>
				<div class="col-3">
					<a href="seller_account_man" class="b-link-stroke b-animate-go  thickbox"><img src="images/pi3.jpg" class="img-responsive" alt=""/><div class="col-pic">
						<p>account</p>
						<label></label>
						<h5>Management</h5>
					</div></a>

				</div>
			</div>
			<div class="clearfix"></div>
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

</body>
</html>