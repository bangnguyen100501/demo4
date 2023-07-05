<?php
        session_start();
		include("control.php");
		$getdata = new data();
		$select = $getdata -> select_all_admin();
?>
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Portfolio - Fineminds Marketing Solutions Website Template</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div class="border">
		<div id="bg">
			background
		</div>
		<div class="page">
			<div class="sidebar">
				<a href="index.php" id="logo"><img src="images/logo.png" alt="logo"></a>
				<ul>
					<li>
						<a href="index.php">Home</a>
					</li>
					<li>
						<a href="about.php">About</a>
					</li>
					<li>
						<a href="services.php">Services</a>
					</li>
					<li class="selected">
						<a href="portfolio.php">Portfolio</a>
					</li>
					<li>
						<a href="contact.php">Contact</a>
					</li>
					<li>
						<a href="blog.php">Blog</a>
					</li>
					<li>
						<?php
							if(isset($_SESSION['username'])){
						?>
							<a href="logout.php">Logout</a> <span style="color:#fff;">/</span>
						<?php
							}else {
						?>
							<a href="login.php">Login</a>
						<?php
							}
						?>
					</li>
					<?php
					if(isset($_SESSION['username'])){
					?>
					<li>
						<?php
							$select = $getdata -> select_all_admin();
								foreach($select as $se){
									if(isset($_SESSION['username']) && $_SESSION['username'] == $se['name_regis']){
										$avatar = $se['file'];
									}
								}
						?>
						<img class="imgAD" width="50px" height="50px" src="./images/<?php echo $avatar; ?>"
						style="border-radius:50%">
						<div class="ad_text_headerL" style="color:#919191;font-weight:600">
							<span>Xin chao: </span>
							<?php
								echo ($se['name_regis']);
							?>
						</div>
					</li>
					<?php
						}
					?>
				</ul>
				<form action="about.php">
					<span>Newsletter Signup</span>
					<input type="text" onClick="this.value='';" onFocus="this.select()" onBlur="this.value=!this.value?'Enter Valid Email Address':this.value;" value="Enter Valid Email Address">
					<input type="submit" id="submit" value="submit">
				</form>
				<div class="connect">
					<a href="http://freewebsitetemplates.com/go/facebook/" id="facebook">facebook</a> <a href="http://freewebsitetemplates.com/go/twitter/" id="twitter">twitter</a> <a href="http://freewebsitetemplates.com/go/googleplus/" id="googleplus">youtube</a>
				</div>
				<p>
					Copyright 2023
				</p>
				<p>
					Fineminds Marketing Solutions
				</p>
			</div>
			<div class="body">
				<div class="portfolio">
					<h2>Portfolio</h2>
					<ul class="navigation">
						<li>
							<a href="services.php">Logo Design</a>
						</li>
						<li>
							<a href="services.php">Web Design</a>
						</li>
						<li>
							<a href="services.php">Print Design</a>
						</li>
					</ul>
					<h3><span>Logo Design</span></h3>
					<ul>
						<li>
							<a href="#"><img src="images/logo1.jpg" alt=""></a> <span>Client: Elizabeth Morrisson</span> <a href="#">Read Details</a>
						</li>
						<li>
							<a href="#"><img src="images/logo2.jpg" alt=""></a> <span>Client: Elizabeth Morrisson</span> <a href="#">Read Details</a>
						</li>
						<li>
							<a href="#"><img src="images/logo3.jpg" alt=""></a> <span>Client: Elizabeth Morrisson</span> <a href="#">Read Details</a>
						</li>
						<li>
							<a href="#"><img src="images/logo4.jpg" alt=""></a> <span>Client: Elizabeth Morrisson</span> <a href="#">Read Details</a>
						</li>
						<li>
							<a href="#"><img src="images/logo5.jpg" alt=""></a> <span>Client: Elizabeth Morrisson</span> <a href="#">Read Details</a>
						</li>
						<li>
							<a href="#"><img src="images/logo6.jpg" alt=""></a> <span>Client: Elizabeth Morrisson</span> <a href="#">Read Details</a>
						</li>
						<li>
							<a href="#"><img src="images/logo7.jpg" alt=""></a> <span>Client: Elizabeth Morrisson</span> <a href="#">Read Details</a>
						</li>
						<li>
							<a href="#"><img src="images/logo8.jpg" alt=""></a> <span>Client: Elizabeth Morrisson</span> <a href="#">Read Details</a>
						</li>
						<li>
							<a href="#"><img src="images/logo9.jpg" alt=""></a> <span>Client: Elizabeth Morrisson</span> <a href="#">Read Details</a>
						</li>
						<li>
							<a href="#"><img src="images/logo10.jpg" alt=""></a> <span>Client: Elizabeth Morrisson</span> <a href="#">Read Details</a>
						</li>
						<li>
							<a href="#"><img src="images/logo11.jpg" alt=""></a> <span>Client: Elizabeth Morrisson</span> <a href="#">Read Details</a>
						</li>
						<li>
							<a href="#"><img src="images/logo12.jpg" alt=""></a> <span>Client: Elizabeth Morrisson</span> <a href="#">Read Details</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</body>
</html>