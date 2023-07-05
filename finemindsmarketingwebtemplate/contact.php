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
	<title>Contact - Fineminds Marketing Solutions Website Template</title>
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
				<li>
					<a href="portfolio.php">Portfolio</a>
				</li>
				<li class="selected">
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
				<div class="contact">
					<h2>Contact</h2>
					<p>
						This website template has been designed by <a href="http://www.freewebsitetemplates.com/">Free Website Templates</a> for you, for free. You can replace all this text with your own text.
					</p>
					<p>
						You can remove any link to our website from this website template, you're free to use this website template without linking back to us.
					</p>
					<p>
						If you're having problems editing this website template, then don't hesitate to ask for help on the <a href="http://www.freewebsitetemplates.com/forums/">Forums</a>.
					</p>
					<form method="post">
						<label for="firstname">First Name</label>
						<input type="text" id="firstname" name="firstName">
						<label for="lastname">Last Name</label>
						<input type="text" id="lastname" name="lastName">
						<label for="email">Email Address</label>
						<input type="email" id="email" name="txtEmail">
						<label for="subject">Subject</label>
						<input type="text" id="subject" name="txtSubject">
						<label for="message">Message</label>
						<textarea name="txtMessage" cols="30" rows="10" id="message"></textarea>
						<input type="submit" name="submit" id="submit2" value="">
					</form>
					<?php
					$get_data = new data(); //call data from class data from control.php
					if(isset($_POST['submit'])){
						$insert = $get_data -> in_contact($_POST['firstName'],$_POST['lastName'], $_POST['txtEmail'], $_POST['txtSubject'], $_POST['txtMessage']); // -> call function in_contact from class data

						if(empty($_POST['txtEmail']) && empty($_POST['txtMessage'])){
							echo "<script>alert('Not enough info.')</script>";
						}else{
							if($insert){
								echo "<script>alert('Your message has been sent successfully.')</script>";
								// header('location:Trang1.php');
							}else{
								echo "<script>alert('Your message has not been sent successfully.')</script>";
							}
						}
					}
				?>
					<!--  -->
				</div>
			</div>
		</div>
	</div>
</body>
</html>