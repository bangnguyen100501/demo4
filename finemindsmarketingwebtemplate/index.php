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
	<title>Fineminds Marketing Solutions Website Template</title>
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
					<li class="selected">
						<a href="index.php">Home</a>
					</li>
					<li>
						<a href="about.php">About</a>
					</li>
					<li>
						<a href="services.php">Services</a>
					</li>
					<li>
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
				<div>
					<h2>Welcome to FineMinds Marketing Solutions</h2>
					<p>
						This website template has been designed by Free Website Templates for you, for free. You can replace all this text with your own text.
					</p>
					<img src="images/tree.jpg" alt="">
					<div>
						<h3><span>What We Do</span></h3>
						<p>
							This website template has been designed by Free Website Templates for you, for free. You can replace all this text with your own text. You can remove any link to our website from this website template, you're free to use this website template without linking back to us.
						</p>
						<ul>
							<li id="link1">
								<a href="services.php"><span>Design</span></a>
							</li>
							<li id="link2">
								<a href="services.php"><span>Seo</span></a>
							</li>
							<li id="link3">
								<a href="services.php"><span>Copywriting</span></a>
							</li>
						</ul>
					</div>
					<div class="section">
						<h3><span>Latest Projects</span></h3>
						<ul>
							<li>
								<a href="services.php"><img src="images/template1.jpg" alt=""></a> <span>Project: Web Design</span> <span>Client: Frosty Sweets</span> <a href="services.php">Read Details</a>
							</li>
							<li>
								<a href="services.php"><img src="images/template2.jpg" alt=""></a> <span>Project: Corporate Identity</span> <span>Client: Puppy Love</span> <a href="services.php">Read Details</a>
							</li>
							<li>
								<a href="services.php"><img src="images/template3.jpg" alt=""></a> <span>Project: Advertising Campaign</span> <span>Client: Baby School</span> <a href="services.php">Read Details</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>