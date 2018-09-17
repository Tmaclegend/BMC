<!--view single product page for seller-->

<!--php to retrieve from and modify in database-->
<?php
define("MAX_FILE_SIZE", 100000000);
$username = $_COOKIE["username"];
$user_id  = $_COOKIE["user_id"];
$product_id = $_GET['id'];
$delete_success = 1;
$update_success = 1;

$isFilled = 1;
$isNumber = 1;

$uploadOk1 = 1;
$uploadOk2 = 1;
$uploadOk3 = 1;
$file1IsImage = 1;
$file2IsImage = 1;
$file3IsImage = 1;
$file1Size = 1;
$file2Size = 1;
$file3Size = 1;
$file1Type = 1;
$file2Type = 1;
$file3Type = 1;

$host = 'localhost';
$user  = 'root';
$pass = 'password';
$db = 'bmc_db';
$useremail = $_COOKIE['useremail'];
$con = mysqli_connect($host, $user, $pass, $db);

//Seller validation
$sql = "SELECT isBuyer FROM users U, products P Where U.user_id = '$user_id' AND P.user_id = U.user_id AND P.product_id = '$product_id'";
$result = mysqli_query($con, $sql);
if ($row = mysqli_fetch_assoc($result)){
	if ($row['isBuyer'] == 1){
		header("Location: 404_seller.php");
	}
}
else{
	header("Location: 404_seller.php");
}

//delete item from database
if (isset($_POST['delete_btn'])){
	$sql = "DELETE FROM products WHERE product_id = '$product_id'";
	$result = mysqli_query($con, $sql);
	if ($result){
		header("Location: seller_manage_item.php");
	}
	else{
		echo "delete fail!";
		$delete_success = 0;
	}
}
else{
	$sql = "SELECT * FROM products WHERE product_id ='$product_id'";
	$result = mysqli_query($con, $sql);

	if ($row = mysqli_fetch_assoc($result)){
		$product_name = $row['product_name'];
		$price = $row['price'];
		$description = $row['description'];
		$origin = $row['country'];
		$category = $row['category'];
		$img_path1 = $row['img_path1'];
		$img_path2 = $row['img_path2'];
		$img_path3 = $row['img_path3'];
	}
	else{
		header("Location: 404_seller.php");
	}

	if(isset($_POST['post_btn'])){
		$comment = mysqli_real_escape_string($con, $_POST['new_comment']);
		$user_id = $_COOKIE['user_id'];
		$user_id = intval($user_id);
		$product_id = intval($product_id);
		$sql = "INSERT INTO comments (product_id, user_id, comment) VALUES ('$product_id', '$user_id', '$comment')";
		$result = mysqli_query($con, $sql);
	}

	//update item info
	if (isset($_POST['update_btn'])){
		
		if (is_numeric($_POST['price'])){
			$isNumber = 1;

			$price = mysqli_real_escape_string($con, $_POST['price']);
			$price = floatval($price);
			$product_description = mysqli_real_escape_string($con, $_POST['product_description']);
			$product_name = mysqli_real_escape_string($con, $_POST['product_name']);
			$origin = mysqli_real_escape_string($con, $_POST['origin']);
			$category = mysqli_real_escape_string($con, $_POST['category']);

			if (is_uploaded_file($_FILES['fileToUpload1']['tmp_name'])){
				$target_dir = '/Library/WebServer/Documents/images/user_upload/';
				$target_file1 = $target_dir . basename($_FILES["fileToUpload1"]["name"]);
				$imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);
				$uploadOk1 = 1;

				$check1 = getimagesize($_FILES["fileToUpload1"]["tmp_name"]);
				if($check1 == true) {
					$uploadOk1 = 2;
					$file1IsImage = 1;
				} else {
					$uploadOk1 = 0;
					$file1IsImage = 0;
				}
				if ($_FILES["fileToUpload1"]["size"] > MAX_FILE_SIZE) {
					$uploadOk1 = 0;
					$file1Size = 0;
				}
				if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg"
					&& $imageFileType1 != "gif" && $imageFileType1 != "JPG" && $imageFileType1 != "PNG" && $imageFileType1 != "JPEG"
					&& $imageFileType1 != "GIF") {
					$uploadOk1 = 0;
				$file1Type = 0;
			}
			if ($uploadOk1 == 0) {
			// if everything is ok, try to upload file
			}
			else{
				$img_name1 = explode("/", $img_path1);
					$new_img_name1 = explode(".", $img_name1[3]); //$new_img_name1[0] is the number
					$target_file1 = $target_dir . $new_img_name1[0] . "." . pathinfo($target_file1,PATHINFO_EXTENSION);

					if (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file1)) {
						$img_path1 = "/images/user_upload/". $new_img_name1[0] . "." . pathinfo($target_file1,PATHINFO_EXTENSION);
					}
					else {
					}
				}
			}

			if (is_uploaded_file($_FILES['fileToUpload2']['tmp_name'])){

				$target_dir = '/Library/WebServer/Documents/images/user_upload/';
				$target_file2 = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
				$imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);
				$uploadOk2 = 1;

				$check2 = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
				if($check2 == true) {
					$uploadOk2 = 2;
					$file2IsImage = 1;
				} else {
					$uploadOk2 = 0;
					$file2IsImage = 0;
				}
				if ($_FILES["fileToUpload2"]["size"] > MAX_FILE_SIZE) {
					$uploadOk2 = 0;
					$file2Size = 0;
				}
				if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
					&& $imageFileType2 != "gif" && $imageFileType2 != "JPG" && $imageFileType2 != "PNG" && $imageFileType2 != "JPEG"
					&& $imageFileType2 != "GIF") {
					$uploadOk2 = 0;
				$file2Type = 0;
			}
			if ($uploadOk2 == 0) {
				// if everything is ok, try to upload file
			}
			else{
				$img_name2 = explode("/", $img_path2);
					$new_img_name2 = explode(".", $img_name2[3]); //$new_img_name1[0] is the number
					$target_file2 = $target_dir . $new_img_name2[0] . "." . pathinfo($target_file2,PATHINFO_EXTENSION);

					if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2)) {
						$img_path2 = "/images/user_upload/". $new_img_name2[0] . "." . pathinfo($target_file2,PATHINFO_EXTENSION);
					}
					else {
					}
				}
			}

			if (is_uploaded_file($_FILES['fileToUpload3']['tmp_name'])){

				$target_dir = '/Library/WebServer/Documents/images/user_upload/';
				$target_file3 = $target_dir . basename($_FILES["fileToUpload3"]["name"]);
				$imageFileType3 = pathinfo($target_file3,PATHINFO_EXTENSION);
				$uploadOk3 = 1;

				$check3 = getimagesize($_FILES["fileToUpload3"]["tmp_name"]);
				if($check3 == true) {
					$uploadOk3 = 2;
					$file3IsImage = 1;
				} else {
					$uploadOk3 = 0;
					$file3IsImage = 0;
				}
				if ($_FILES["fileToUpload3"]["size"] > MAX_FILE_SIZE) {
					$uploadOk3 = 0;
					$file3Size = 0;
				}
				if($imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg"
					&& $imageFileType3 != "gif" && $imageFileType3 != "JPG" && $imageFileType3 != "PNG" && $imageFileType3 != "JPEG"
					&& $imageFileType3 != "GIF") {
					$uploadOk3 = 0;
				$file3Type = 0;
			}
			if ($uploadOk3 == 0) {
				// if everything is ok, try to upload file
			}
			else {
				$img_name3 = explode("/", $img_path3);
					$new_img_name3 = explode(".", $img_name3[3]); //$new_img_name1[0] is the number
					$target_file3 = $target_dir . $new_img_name3[0] . "." . pathinfo($target_file3,PATHINFO_EXTENSION);

					if (move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file3)) {
						$img_path3 = "/images/user_upload/". $new_img_name3[0] . "." . pathinfo($target_file3,PATHINFO_EXTENSION);
					}
					else {
					}
				}
			}

			if ($uploadOk1 != 0 && $uploadOk2 != 0 && $uploadOk3 != 0){
				$sql = "UPDATE products SET price = '$price', description = '$product_description', product_name = '$product_name', country = '$origin', category = '$category', img_path1 = '$img_path1', img_path2 = '$img_path2', img_path3 = '$img_path3' WHERE product_id = '$product_id'";
				$result = mysqli_query($con, $sql);
				if ($result){
					$update_success = 2;
				}
				else{
					$update_success = 0;
				}
			}
		}
		else{
			$isNumber = 0;
		}
	}

	$sql = "SELECT * FROM products WHERE product_id ='$product_id'";
	$result = mysqli_query($con, $sql);

	if ($row = mysqli_fetch_assoc($result)){
		$product_name = $row['product_name'];
		$price = $row['price'];
		$description = $row['description'];
		$origin = $row['country'];
		$category = $row['category'];
		$img_path1 = $row['img_path1'];
		$img_path2 = $row['img_path2'];
		$img_path3 = $row['img_path3'];
	}
	else{
	}
}
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
					<a href="index.php"><img src="images/logo.png" alt=""></a>	
				</div>
			</div>
		</div>
		<div class="header-top">
			<div class="container">
				<div class="col-sm-5 col-md-offset-2  header-login">
					<ul >
						<li><a href="seller_index.php"><?php echo $username?></a></li>
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
								<li><a class="color" href="seller_account_man.php">Home</a></li>

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
<!----->
</div>
<div class="clearfix"></div>
</div>	
</div>	
</div>
<!--banner-->
<div class="banner-top">
	<div class="container">
		<h1>Update Item</h1>
		<em></em>
		<h2><a href="index.php">Home</a><label>/</label>Update My Items</h2>
	</div>
</div>
<div class="single">
	<div class="container">
		<form method="post" enctype="multipart/form-data" action="seller_single.php?id=<?php echo $product_id; ?>">
			<div class="col-md-6 login-do">
				<label class="hvr-skew-backward">
					<input type="submit" value="Update Item" name="update_btn">
				</label>
				<label class="hvr-skew-backward">
					<input type="submit" value="Delete Item" name="delete_btn">
				</label>
			</div>
			<br><br><br>
			<div class="col-md-9">

				<?php 
				if ($update_success == 2)
					echo "<h3 style=\"color:#FF6C6C;\"c>Updated successfully!</h3><br>";
				if($delete_success == 0)
					echo "<h3 style=\"color:#FF6C6C;\"c>Fail in Deletion!</h3><br>";
				if ($isNumber == 0){
					echo "<h3 style=\"color:#FF6C6C;\"c>Price should be a number!</h3><br>";
				}
				if ($uploadOk1 == 0){
					if ($file1IsImage == 0){
						echo "<h3 style=\"color:#FF6C6C;\"c>File1 is not an image!</h3><br>";
					}
					else if ($file1Size == 0){
						echo "<h3 style=\"color:#FF6C6C;\"c>Size of File1 is too large!</h3><br>";
					}
					else if ($file1Type == 0){
						echo "<h3 style=\"color:#FF6C6C;\"c>Type of File1 is not supported. Only JPG, JPEG, PNG and GIF are supported.</h3><br>";
					}
				}
				if ($uploadOk2 == 0){
					if ($file2IsImage == 0){
						echo "<h3 style=\"color:#FF6C6C;\"c>File2 is not an image!</h3><br>";
					}
					else if ($file2Size == 0){
						echo "<h3 style=\"color:#FF6C6C;\"c>Size of File2 is too large!</h3><br>";
					}
					else if ($file2Type == 0){
						echo "<h3 style=\"color:#FF6C6C;\"c>Type of File2 is not supported. Only JPG, JPEG, PNG and GIF are supported.</h3><br>";
					}

				}
				if ($uploadOk3 == 0){
					if ($file3IsImage == 0){
						echo "<h3 style=\"color:#FF6C6C;\"c>File3 is not an image!</h3><br>";
					}
					else if ($file3Size == 0){
						echo "<h3 style=\"color:#FF6C6C;\"c>Size of File3 is too large!</h3><br>";
					}
					else if ($file3Type == 0){
						echo "<h3 style=\"color:#FF6C6C;\"c>Type of File3 is not supported. Only JPG, JPEG, PNG and GIF are supported.</h3><br>";
					}

				}
				?>

				<div class="col-md-5 grid">		

					<div class="flexslider">

						<ul class="slides">
							<li data-thumb="<?php echo $img_path1; ?>">
								<div class="thumb-image"> <img src="<?php echo $img_path1; ?>" data-imagezoom="true" class="img-responsive"> </div>
							</li>
							<li data-thumb="<?php echo $img_path2; ?>">
								<div class="thumb-image"> <img src="<?php echo $img_path2; ?>" data-imagezoom="true" class="img-responsive"> </div>
							</li>
							<li data-thumb="<?php echo $img_path3; ?>">
								<div class="thumb-image"> <img src="<?php echo $img_path3; ?>" data-imagezoom="true" class="img-responsive"> </div>
							</li> 
						</ul>
					</div>
				</div>	

				<div class="col-md-7 single-top-in">

					<div class="span_2_of_a1 simpleCart_shelfItem">





						<h3>Item Name: </h3>
						<input type="text" name="product_name" value="<?php echo $product_name; ?>" required="">
						<h3 style="color:#FF6C6C;"c>Price: </h3>
						<input type="text" name="price" value="<?php echo $price; ?>" required="">
						<div class="clearfix"></div>

						<br>
						<h3 class="quick">Product Source:</h3>
						<input type="text" name="origin" value="<?php echo $origin; ?>" required="">
						<br>
						<div class="price_single"><br>
							<h3 class="quick">Category:</h3>
							<select name="category">
								<option <?php if(strcmp($category, "Hair") == 0) echo "selected"; ?> value="Hair">Hair</option>
								<option <?php if(strcmp($category, "Nail") == 0) echo "selected"; ?> value="Nail">Nail</option>
								<option <?php if(strcmp($category, "Body") == 0) echo "selected"; ?> value="Body">Body</option>
								<option <?php if(strcmp($category, "Skin Care") == 0) echo "selected"; ?> value="Skin Care">Skin Care</option>
								<option <?php if(strcmp($category, "Makeup") == 0) echo "selected"; ?> value="Makeup">Makeup</option>
								<option <?php if(strcmp($category, "Tops") == 0) echo "selected"; ?> value="Tops">Tops</option>
								<option <?php if(strcmp($category, "Bottoms") == 0) echo "selected"; ?> value="Bottoms">Bottoms</option>
								<option <?php if(strcmp($category, "Coast&Jackets") == 0) echo "selected"; ?> value="Coast&Jackets">Coast&Jackets</option>
								<option <?php if(strcmp($category, "Bags&Wallets") == 0) echo "selected"; ?> value="Bags&Wallets">Bags&Wallets</option>
								<option <?php if(strcmp($category, "Shoes") == 0) echo "selected"; ?> value="Shoes">Shoes</option>
								<option <?php if(strcmp($category, "Accessories") == 0) echo "selected"; ?> value="Accessories">Accessories</option>
								<option <?php if(strcmp($category, "Toys") == 0) echo "selected"; ?> value="Toys">Toys</option>
								<option <?php if(strcmp($category, "Board Games") == 0) echo "selected"; ?> value="Board Games">Board Games</option>
								<option <?php if(strcmp($category, "Lifestyle") == 0) echo "selected"; ?> value="Lifestyle">Lifestyle</option>
								<option <?php if(strcmp($category, "Books") == 0) echo "selected"; ?> value="Books">Books</option>
								<option <?php if(strcmp($category, "Photography") == 0) echo "selected"; ?> value="Photography">Photography</option>
								<option <?php if(strcmp($category, "Computer") == 0) echo "selected"; ?> value="Computer">Computer</option>
								<option <?php if(strcmp($category, "Smartphone") == 0) echo "selected"; ?> value="Smartphone">Smartphone</option>
								<option <?php if(strcmp($category, "Music") == 0) echo "selected"; ?> value="Music">Music</option>
							</select>
						</div>
						<br>
						<h3 class="quick">Photos:</h3>
						Main Photo:
						<input type="file" name="fileToUpload1" id="fileToUpload1">
						<br>Supplementary photo1:
						<input type="file" name="fileToUpload2" id="fileToUpload2">
						<br>Supplementary photo2:
						<input type="file" name="fileToUpload3" id="fileToUpload3">
						<br>

						<!--quantity-->
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
				<!---->
				<div class="tab-head">
					<nav class="nav-sidebar">
						<ul class="nav tabs">
							<li class="active"><a href="#tab1" data-toggle="tab">Product Description</a></li>
							<li class=""><a href="#tab2" data-toggle="tab">Comments</a></li> 
						</ul>
					</nav>
					<div class="tab-content one">
						<div class="tab-pane active text-style" id="tab1">
							<div class="facts">
								<textarea name="product_description" cols="60" rows="5"><?php echo $description; ?></textarea>

							</form>

</div>


</div>

<div class="tab-pane text-style" id="tab2">

	<div class="col-md-6 login-do">
		<form method="post" action="seller_single.php?id=<?php echo $product_id; ?>" enctype="multipart/form-data">
			<?php
			$sql = "SELECT C.cm_id, C.user_id, C.comment, U.username FROM comments C, users U WHERE product_id = '$product_id' and C.user_id = U.user_id ORDER BY cm_id";
			$result = mysqli_query($con, $sql);
			while ($row = mysqli_fetch_assoc($result)){
				if (strcmp($_COOKIE['username'], $row['username']) == 0){
					echo "(owner)" . $row['username'] . ": ";
				}
				else{
					echo $row['username'] . ": ";
				}
				echo $row['comment'] . "<br>";
			}
			?>

			<textarea name="new_comment" cols="70" rows="3" placeholder="comment here" required=""></textarea>
			<br>
			<label class="hvr-skew-backward">
				<input type="submit" value="Post Comment" name="post_btn">
			</label>
		</form>
	</div>


</div>


</div>

<div class="clearfix">

</div>
<br>


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