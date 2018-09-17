<!--post item page for seller-->
<!--php to get info from database-->
<?php
define("MAX_FILE_SIZE", 100000000);
$username = $_COOKIE["username"];
$user_id = $_COOKIE['user_id'];
$useremail = $_COOKIE['useremail'];
$threePhoto = 1;
$cat = 1;
$file1IsImage = 1;
$file2IsImage = 1;
$file3IsImage = 1;
$file1Size = 1;
$file2Size = 1;
$file3Size = 1;
$file1Type = 1;
$file2Type = 1;
$file3Type = 1;
$success = 1;
$isNumber = 1;



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

//post product
if (isset($_POST['post_item'])){

	if (is_numeric($_POST['price'])){
		$isNumber = 1;

		if (strcmp($_POST['category'], "NA") != 0){

			if (is_uploaded_file($_FILES['fileToUpload1']['tmp_name']) && is_uploaded_file($_FILES['fileToUpload2']['tmp_name']) && is_uploaded_file($_FILES['fileToUpload3']['tmp_name'])){
				

		//echo "entered submit<br>";

				$target_dir = '/Library/WebServer/Documents/images/user_upload/';
				$target_file1 = $target_dir . basename($_FILES["fileToUpload1"]["name"]);
				$target_file2 = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
				$target_file3 = $target_dir . basename($_FILES["fileToUpload3"]["name"]);
				$uploadOk1 = 1;
				$uploadOk2 = 1;
				$uploadOk3 = 1;

				$imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);
				$imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);
				$imageFileType3 = pathinfo($target_file3,PATHINFO_EXTENSION);

		// Check if image file is a actual image or fake image
				$check1 = getimagesize($_FILES["fileToUpload1"]["tmp_name"]);
				if($check1 == true) {
		//echo "File1 is an image - " . $check1["mime"] . ".<br>";
					$uploadOk1 = 1;
				} else {
		#echo "File1 is not an image.<br>";
					$uploadOk1 = 0;
					$file1IsImage = 0;
				}

				$check2 = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
				if($check2 == true) {
		//echo "File2 is an image - " . $check2["mime"] . ".<br>";
					$uploadOk2 = 1;
				} else {
		#echo "File2 is not an image.<br>";
					$uploadOk2 = 0;
					$file2IsImage = 0;
				}

				$check3 = getimagesize($_FILES["fileToUpload3"]["tmp_name"]);
				if($check3 == true) {
		//echo "File3 is an image - " . $check3["mime"] . ".<br>";
					$uploadOk3 = 1;
				} else {
		#echo "File3 is not an image.<br>";
					$uploadOk3 = 0;
					$file3IsImage = 0;
				}

		// Check if file already exists
		// if (file_exists($target_file)) {
		//     //echo "Sorry, file already exists.";
		//     $uploadOk = 0;
		// }

		// Check file size
				if ($_FILES["fileToUpload1"]["size"] > MAX_FILE_SIZE) {
		#echo "Sorry, file1 is too large<br>.";
					$uploadOk1 = 0;
					$file1Size = 0;
				}
				if ($_FILES["fileToUpload2"]["size"] > MAX_FILE_SIZE) {
		#echo "Sorry, file2 is too large.<br>";
					$uploadOk2 = 0;
					$file2Size = 0;
				}
				if ($_FILES["fileToUpload3"]["size"] > MAX_FILE_SIZE) {
		#echo "Sorry, your file3 is too large.<br>";
					$uploadOk3 = 0;
					$file3Size = 0;
				}

		// Allow certain file formats
				if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg"
					&& $imageFileType1 != "gif" && $imageFileType1 != "JPG" && $imageFileType1 != "PNG" && $imageFileType1 != "JPEG"
					&& $imageFileType1 != "GIF") {
		#echo "Sorry file1 is not supported, only JPG, JPEG, PNG & GIF files are allowed.<br>";
					$uploadOk1 = 0;
				$file1Type = 0;
			}
			if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
				&& $imageFileType2 != "gif" && $imageFileType2 != "JPG" && $imageFileType2 != "PNG" && $imageFileType2 != "JPEG"
				&& $imageFileType2 != "GIF") {
			#echo "Sorry file2 is not supported, only JPG, JPEG, PNG & GIF files are allowed.<br>";
				$uploadOk2 = 0;
			$file2Type = 0;
		}
		if($imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg"
			&& $imageFileType3 != "gif" && $imageFileType3 != "JPG" && $imageFileType3 != "PNG" && $imageFileType3 != "JPEG"
			&& $imageFileType3 != "GIF") {
				#echo "Sorry file3 is not supported, only JPG, JPEG, PNG & GIF files are allowed.<br>";
			$uploadOk3 = 0;
		$file3Type = 0;
	}

				// Check if $uploadOk is set to 0 by an error
	if ($uploadOk1 == 0) {
				#echo "Sorry, file1 was not uploaded.<br>";
				// if everything is ok, try to upload file
	}
	if ($uploadOk2 == 0) {
				#echo "Sorry, file2 was not uploaded.<br>";
				// if everything is ok, try to upload file
	} 
	if ($uploadOk3 == 0) {
				#echo "Sorry, file3 was not uploaded.<br>";
				// if everything is ok, try to upload file
	} 

	if ($uploadOk1 == 1 && $uploadOk2 == 1 && $uploadOk3 == 1){
				//connect to database
		$host = 'localhost';
		$user  = 'root';
		$pass = 'password';
		$db = 'bmc_db';

		$con = new mysqli($host, $user, $pass, $db);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT product_id FROM products ORDER BY product_id DESC";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);
				//echo "product_count: ".$row["count(*)"]."<br>";
		$pathNum1 = (intval($row["product_id"])) * 3;
		$pathNum2 = (intval($row["product_id"])) * 3 + 1;
		$pathNum3 = (intval($row["product_id"])) * 3 + 2;
		$target_file1 = $target_dir . $pathNum1 . "." . pathinfo($target_file1,PATHINFO_EXTENSION);
		$target_file2 = $target_dir . $pathNum2 . "." . pathinfo($target_file2,PATHINFO_EXTENSION);
		$target_file3 = $target_dir . $pathNum3 . ".". pathinfo($target_file3,PATHINFO_EXTENSION);
		$pictureName1 = "NA";
		$pictureName2 = "NA";
		$pictureName3 = "NA";

		if (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file1)) {
						#echo "The file ". basename( $_FILES["fileToUpload1"]["name"]). " has been uploaded.<br>";
			$pictureName1 = "/images/user_upload/". (string)$pathNum1 . "." . pathinfo($target_file1,PATHINFO_EXTENSION);
		}
		else {
						#echo "Sorry, there was an error uploading file1.";
		}
		if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2)) {
						#echo "The file ". basename( $_FILES["fileToUpload2"]["name"]). " has been uploaded.<br>";
			$pictureName2 = "/images/user_upload/". (string)$pathNum2 . "." . pathinfo($target_file2,PATHINFO_EXTENSION);
		}
		else {
						#echo "Sorry, there was an error uploading file2.";
		}
		if (move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file3)) {
						#echo "The file ". basename( $_FILES["fileToUpload3"]["name"]). " has been uploaded.<br>";
			$pictureName3 = "/images/user_upload/". (string)$pathNum3 . "." .pathinfo($target_file3,PATHINFO_EXTENSION);
		}
		else {
						#echo "Sorry, there was an error uploading file3.<br>";
		}

					#echo $pictureName1."<br>";
					#echo $pictureName2."<br>";
					#echo $pictureName3."<br>";

		$product_name = mysqli_real_escape_string($con, $_POST['product_name']);
		$price = mysqli_real_escape_string($con, $_POST['price']);
		$price = floatval($price);
		$description = mysqli_real_escape_string($con, $_POST['description']);
		$category = mysqli_real_escape_string($con, $_POST['category']);
		$country = mysqli_real_escape_string($con, $_POST['country']);

		$sql = "INSERT INTO products (user_id, img_path1, img_path2, img_path3, product_name, price, description, category, country) VALUES ('$user_id', '$pictureName1', '$pictureName2', '$pictureName3', '$product_name', '$price', '$description', '$category', '$country')";

		if ($con->query($sql) === TRUE) {
						#echo "Record updated successfully<br>";
			$success = 2;
		}
		else {
						#echo "Error updating record: " . $conn->error."<br>";
			$success = 0;
		}

	}
	else{
					#echo "Please upload all the files again.<br>";
		$success = 0;
	}
}
else{
	$threePhoto = 0;
}
}
else{
	$cat = 0;
}
}
else{
	$isNumber = 0;
}
}
?>
<!--html starts-->
<!DOCTYPE html>
<html lang="en">
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
						<!----->
			</div>
			<div class="clearfix"></div>
		</div>	
	</div>	
</div>
<!--banner-->
<div class="banner_3">
	<div class="container">
		<section class="rw-wrapper">
			<h1 class="rw-sentence">
				<span>B u y M e C h i p s</span>
				<div class="rw-words rw-words-1">
					<span> Global</span>
					<span>Most Beautiful</span>
					<span>Lowest Price</span>
					<span>heheXD</span>
				</div>
				<div class="rw-words rw-words-2">
					<span>Always in style</span>
					<span>More stores More value</span>
					<span>World of happiness</span>
					<span>MikeWorld</span>
				</div>
			</h1>
		</section>
	</div>
</div>
<!--content-->
<div class="content">
	<div class="container">
		<br><br>
		<div class="col-md-6 login-do">
			<div class="col-2">
				<h2>Bring a New Item to BMC</a></h2>
				<?php
				if ($cat == 0){
					echo "<h3 style=\"color:#FF6C6C;\"c>Please select category.</h3><br>";
				}
				if ($isNumber == 0){
					echo "<h3 style=\"color:#FF6C6C;\"c>Price should be a number!</h3><br>";
				}
				if($threePhoto == 0) 
					echo "<h3 style=\"color:#FF6C6C;\"c>All three photos should be selected.</h3><br>";
				else{
					if ($file1IsImage == 0){
						echo "<h3 style=\"color:#FF6C6C;\"c>File1 is not an image.</h3><br>";
					}
					else if ($file1Size == 0){
						echo "<h3 style=\"color:#FF6C6C;\"c>Size of File1 is too large.</h3><br>";
					}
					else if ($file1Type == 0){
						echo "<h3 style=\"color:#FF6C6C;\"c>Type of File1 is not supported. Only JPG, JPEG, PNG and GIF are supported.</h3><br>";
					}
					if ($file2IsImage == 0){
						echo "<h3 style=\"color:#FF6C6C;\"c>File2 is not an image.</h3><br>";
					}
					else if ($file2Size == 0){
						echo "<h3 style=\"color:#FF6C6C;\"c>Size of File2 is too large.</h3><br>";
					}
					else if ($file2Type == 0){
						echo "<h3 style=\"color:#FF6C6C;\"c>Type of File2 is not supported. Only JPG, JPEG, PNG and GIF are supported.</h3><br>";
					}
					if ($file3IsImage == 0){
						echo "<h3 style=\"color:#FF6C6C;\"c>File3 is not an image.</h3><br>";
					}
					else if ($file3Size == 0){
						echo "<h3 style=\"color:#FF6C6C;\"c>Size of File3 is too large.</h3><br>";
					}
					else if ($file3Type == 0){
						echo "<h3 style=\"color:#FF6C6C;\"c>Type of File3 is not supported. Only JPG, JPEG, PNG and GIF are supported.</h3><br>";
					}
					else if ($success == 2){
						echo "<h3 style=\"color:#FF6C6C;\"c>Item has been posted!</h3><br>";
					}
				}

				?>
				<h4>PLease enter the information of your product.</h4><br>
				
			</div>
			
			<form action="seller_postitem.php" method="post" enctype="multipart/form-data">
				
				<label for="Product Name">Product name: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</label>
				<input id="product_name" type="text" name="product_name" required="">
				<br><br>
				
				<label for="Price">Price: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</label>
				<input id="price" type="text" name="price" required="">
				<br><br>
				
				<label for="Origin Country">Product Source: &nbsp &nbsp &nbsp &nbsp &nbsp</label>
				<input id="country" type="text" name="country" required="">
				<br><br>
				<label for="Category">Category: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </label>
				<select name="category">
					<option value="NA">select category</option>
					<option value="Hair">Hair</option>
					<option value="Nail">Nail</option>
					<option value="Body">Body</option>
					<option value="Skin Care">Skin Care</option>
					<option value="Makeup">Makeup</option>
					<option value="Tops">Tops</option>
					<option value="Bottoms">Bottoms</option>
					<option value="Coast&Jackets">Coast&Jackets</option>
					<option value="Bags&Wallets">Bags&Wallets</option>
					<option value="Shoes">Shoes</option>
					<option value="Accessories">Accessories</option>
					<option value="Toys">Toys</option>
					<option value="Board Games">Board Games</option>
					<option value="Lifestyle">Lifestyle</option>
					<option value="Books">Books</option>
					<option value="Photography">Photography</option>
					<option value="Computer">Computer</option>
					<option value="Smartphone">Smartphone</option>
					<option value="Music">Music</option>
				</select>
				<br><br>
				<label for="Description">Description: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</label>
				<textarea id="description" name="description" cols="60" rows="6" required=""></textarea>
				<br><br>
				<label for="Production Country">Upload three photos:</label>
				<br><br>
				<div class="col-md-6 login-do">
					Main Photo:
					<input type="file" name="fileToUpload1" id="fileToUpload1">
					<br>Supplementary photo1:
					<input type="file" name="fileToUpload2" id="fileToUpload2">
					<br>Supplementary photo2:
					<input type="file" name="fileToUpload3" id="fileToUpload3">
					<br>
				</div>
				<br><br><br><br><br><br><br><br><br><br>
				<label class="hvr-skew-backward">
					<input type="submit" name="post_item" value="Post it now!">
				</label>
				<br><br>
			</div>

		</form>
		<br><br>
		
	</div>
	<br><br><br>


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