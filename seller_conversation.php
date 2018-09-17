<!--conversation page for seller-->
<!--php to get info from database-->
<?php
ob_start();

//get the username and userid in cookies
if(isset($_COOKIE["username"])){
	$username = $_COOKIE["username"];
}
else{
	$username = "Login";
}
if(isset($_COOKIE["user_id"])){
	$user_id = $_COOKIE["user_id"];
}
else{
	$user_id = NULL;
}

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
					<a href="seller_index.php"><img src="images/logo.png" alt=""></a>	
				</div>
			</div>
		</div>
		<div class="header-top">
			<div class="container">
				<div class="col-sm-5 col-md-offset-2  header-login">
					<ul >
						<?php
						ob_start();
						?>
						<?php
						$host = 'localhost';
						$user  = 'root';
						$pass = 'password';
						$db = 'bmc_db';

						$con = mysqli_connect($host, $user, $pass, $db);

//get the username and userid in cookies
						if(isset($_COOKIE["username"])){
							$username = $_COOKIE["username"];
						}
						else{
							$username = "Login";
						}
						if(isset($_COOKIE["user_id"])){
							$user_id = $_COOKIE["user_id"];
						}
						else{
							$user_id = NULL;
						}
						?>
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

				<!--banner-->
				<div class="banner-top">
					<div class="container">
						<h1>Message - Conversation</h1>
						<h2><a href="seller_index.php">Home</a><label>/</label><?php echo "Message"?></h2>
					</div>
				</div>
				<div class="container">
					<div class="four">
						<a href='seller_conversation.php'><h4>Conversation</h4></a> 
						<br>
						<br>
						<a href='seller_start_new_con.php'><h4>Start New Conversation</h4></a>
					</div>
				</div>
				<!--login-->
				<div class="container">
					<div align="center">
						<?php

						if(isset($_GET['hash']) && !empty($_GET['hash'])){

							$hash = $_GET['hash'];

							$message_query = mysqli_query($con, "SELECT from_id, message FROM messages WHERE group_hash = '$hash' ");

							while ($run_message = mysqli_fetch_array($message_query)) {
								$from_id = $run_message['from_id'];
								$message = $run_message['message'];

								$user_query = mysqli_query($con, "SELECT username FROM users WHERE user_id = '$from_id' ");
								$run_user = mysqli_fetch_array($user_query);
								$from_username = $run_user['username'];


								if ($from_id == $user_id){
									echo "<p><b>You:</b> $message </p>";
									echo "<br>";
								}else{
									echo "<p><b>$from_username:</b> $message </p>";
									echo "<br>";
								}
							}
							?>

							<br/>

							<form method = 'post'>
								<?php

								if(isset($_POST['message']) && !empty($_POST['message'])){

									$new_message = $_POST['message'];


									mysqli_query($con, "INSERT INTO messages (group_hash, from_id, message) VALUES ('$hash','$user_id','$new_message')");

									header('location: seller_conversation.php?hash='.$hash);
									ob_end_flush();
								}

								?>

								Enter Message: <br/>

								<textarea name = 'message' rows = '6' cols = '50' " required=""></textarea>

								<br/><br/>
								<input type="submit" value="Send Message"/>


							</form>


							<?php

						}else{
							echo "<b>Select Conversation : </b>";

							$get_con = mysqli_query($con, "SELECT * FROM message_group WHERE (user_one = '$user_id') OR (user_two = '$user_id') ");

					#echo $user_id;

							while($run_con = mysqli_fetch_array($get_con)){
								$hash = $run_con['hash'];
								$user_one = $run_con['user_one'];
								$user_two = $run_con['user_two'];

								if($user_one == $user_id){
									$select_id = $user_two;
								}else{
									$select_id = $user_one;
								}

								$user_get = mysqli_query($con, "SELECT username FROM users WHERE user_id = '$select_id' ");
								$run_user = mysqli_fetch_array($user_get);
								$select_username = $run_user['username'];
								echo "<p><a href='seller_conversation.php?hash=$hash'>$select_username</a></p>";
							}
						}
						?>

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