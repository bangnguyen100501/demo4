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
	<title>About - Fineminds Marketing Web Template</title>
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
					<li class="selected">
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
			<!--  -->
			<div class="body">
				<div class="about">
					<h2>About</h2>
					<img src="images/paper-wheel.jpg" alt="">
					<h4><span>We Have Free Templates for Everyone</span></h4>
					<p>
						Our website templates are created with inspiration, checked for quality and originality and meticulously sliced and coded. What's more, they're absolutely free! You can do a lot with them. You can modify them. You can use them to design websites for clients, so long as you agree with the <a href="http://www.freewebsitetemplates.com/about/terms">Terms of Use</a>. You can even remove all our links if you want to.
					</p>
					<h4><span>We Have More Templates for You</span></h4>
					<p>
						Looking for more templates? Just browse through all our <a href="http://www.freewebsitetemplates.com/">Free Website Templates</a> and find what you're looking for. But if you don't find any website template you can use, you can try our <a href="http://www.freewebsitetemplates.com/freewebdesign/">Free Web Design</a> service and tell us all about it. Maybe you're looking for something different, something special. And we love the challenge of doing something different and something special.
					</p>
					<h4><span>Be Part of Our Community</span></h4>
					<p>
						If you're experiencing issues and concerns about this website template, join the discussion <a href="http://www.freewebsitetemplates.com/forums/">on our forum</a> and meet other people in the community who share the same interests with you.
					</p>
					<h4><span>Template details</span></h4>
					<p>
						Design version 6 <br> Code version 3 <br><br> Website Template details, discussion and updates for this <a href="http://www.freewebsitetemplates.com/discuss/finemindsmarketingwebtemplate/">Fineminds Marketing Web Template</a>. <br><br> Website Template design by <a href="http://www.freewebsitetemplates.com/">Free Website Templates</a>. <br><br> <span style="font-size:11px;">Please feel free to remove some or all the text and links of this page and replace it with your own About content.</span>
					</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>