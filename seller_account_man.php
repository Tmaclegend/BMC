<!--Account management for seller-->
<!--php starts-->
<?php
ob_start();
$host = 'localhost';
$user  = 'root';
$pass = 'password';
$db = 'bmc_db';
$useremail = $_COOKIE['useremail'];
$user_id  = $_COOKIE["user_id"];
$oriPw = 1;
$samePw = 1;
$success = 1;
$insertedBothPW = 1;

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

$sql = "SELECT username FROM users WHERE user_id = '$user_id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$user_name = $row['username'];

if (isset($_POST['update_btn'])){

	$result = mysqli_query($con, "SELECT password FROM users WHERE user_id = '$user_id'");
	$row = mysqli_fetch_assoc($result);
	$pw = $row['password'];
	$input_pw = mysqli_real_escape_string($con, $_POST['old_password']);
	$new_user_name = mysqli_real_escape_string($con, $_POST['user_name']);
	$new_bio = mysqli_real_escape_string($con, $_POST['input_bio']);


	if (strcmp($pw, $input_pw) == 0){

		if ($_POST['new_password'] != NULL && $_POST['con_password'] != NULL){

			$new_pw = mysqli_real_escape_string($con, $_POST['new_password']);
			$confirm_pw = mysqli_real_escape_string($con, $_POST['con_password']);

			if (strcmp($new_pw, $confirm_pw) == 0){
				$samePw = 1;
				$success = 2;

				$sql = "UPDATE users SET username = '$new_user_name', bio = '$new_bio', password = '$new_pw' WHERE user_id = '$user_id'";
				$user_name = $new_user_name;
				mysqli_query($con, $sql);
			}
			else{
				$samePw = 0;
			}
		}
		else if ($_POST['new_password'] == NULL && $_POST['con_password'] == NULL){
			$oriPw = 1;
			$sql = "UPDATE users SET username = '$new_user_name', bio = '$new_bio' WHERE user_id = '$user_id'";
			mysqli_query($con, $sql);
			$user_name = $new_user_name;
			$success = 2;
		}
		else{
			$insertedBothPW = 0;
		}
	}
	else{
		$oriPw = 0;
	}
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
	<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
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

						<li><a href="seller_account_man.php"><?php echo $user_name?></a></li>
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
						<!---->
					</div>
					<div class="clearfix"></div>
				</div>	
			</div>	
		</div>
		<!--banner-->
		<div class="banner-top">
			<div class="container">
				<h1>Account Management</h1>
				<em></em>
				<h2><a href="seller_index.php">Home</a><label>/</label>Account Management</h2>
			</div>
		</div>
		<div class="single">

			<div class="container">
				<div class="col-md-9">

					<div class="col-md-9 single-top-in">
						<div class="span_2_of_a1 simpleCart_shelfItem">
							<form method="post" action="seller_account_man.php?id=<?php echo $user_id; ?>">
								<?php
								if ($oriPw == 0)
									echo "<h3 style=\"color:#FF6C6C;\"c>Original password is not correct!</h3><br>";
								else if ($samePw == 0)
									echo "<h3 style=\"color:#FF6C6C;\"c>Confirm password is not correct!</h3><br>";
								else if ($insertedBothPW == 0)
									echo "<h3 style=\"color:#FF6C6C;\"c>Please insert both new passwor and confirm password!</h3><br>";
								else if ($success == 2)
									echo "<h3 style=\"color:#FF6C6C;\"c>Update successfully!</h3><br>";
								?>
								<h4 class="quick">Username: </h4>
								<div class="login-mail">
									<input type="text" name="user_name" value="<?php echo $user_name; ?>">
									<i  class="glyphicon glyphicon-user"></i>
								</div>
								<h4 class="quick">E-mail: </h4>
								<div class="login-mail">
									<input type="text" name="email"  value="<?php echo $useremail; ?>" disabled>
									<i  class="glyphicon glyphicon-envelope"></i>
								</div>
								<h4 class="quick"><lable style="color:red;">*</lable>Original Password:</h4>
								<div class="login-mail">
									<input type="password" name="old_password" required>
									<i class="glyphicon glyphicon-lock"></i>
								</div>
								<h4 class="quick">New Password:</h4>
								<div class="login-mail">
									<input type="password" name="new_password">
									<i class="glyphicon glyphicon-lock"></i>
								</div>
								<h4 class="quick">Confirm Password:</h4>
								<div class="login-mail">
									<input type="password" name="con_password">
									<i class="glyphicon glyphicon-lock"></i>
								</div>
								<h4 class="quick">Bio:</h4>
								<?php
								$user_bio = mysqli_query($con, "SELECT bio FROM users WHERE user_id ='$user_id' ");
								$user_bio = mysqli_fetch_array($user_bio);
								?>
								<textarea login-mail name="input_bio" cols="60" rows="10"><?php echo$user_bio['bio'];?></textarea>
								<br><br>


								<script>
									$('.value-plus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
										divUpd.text(newVal);
									});

									$('.value-minus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
										if(newVal>=1) divUpd.text(newVal);
									});
								</script>
								<!--quantity-->

								<div class="clearfix"> </div>
							</div>

						</div>
						<div class="clearfix"> </div>
	

<div class="clearfix">

</div>

</div>
<div>

	<div class="col-md-6 login-do">
		<label class="hvr-skew-backward">
			<input type="submit" value="Update" name="update_btn">
		</label>
		<label class="hvr-skew-backward">
			<input type="submit" value="Back To Home" onclick="click_back()">
		</label>
		<script>
			function click_back(){
				location.href='seller_index.php';
			}
		</script>
	</div>
</form>

</div>	
<!---->	
</div>
<!----->

<div class="col-md-3 product-bottom product-at">
			
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
	<!--//menu-->				 				 


	<!---->
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