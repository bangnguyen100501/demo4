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
	<title>Blog - Fineminds Marketing Solutions Website Template</title>
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
					<li>
						<a href="contact.php">Contact</a>
					</li>
					<li class="selected">
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
				<div class="blog">
					<?php
						$getdata = new data();
                        $id_blog = $_GET['content'];
                        $select_blog = $getdata->select_blog_id($id_blog);
						foreach ($select_blog as $se)
						{
					?>
					    <h2><?php echo $se['title']; ?></h2>

						<div class="blog-item">
							<p style="margin:0px 0 5px"><?php echo $se['Date'];?></p>
							<p style="margin:10px 0 5px"><?php echo $se['S_Content'];?></p>
							<p style="margin:10px 0 5px"><?php echo $se['L_content'];?></p>
							<p style="float:right"><a href="blog.php">back << <a></p>
						</div>
					<?php
						}
					?>
					<div class="section">
						<div>
							<h3>Recent blog posts</h3>
							<ul>
								<li>
									<a href="#">It’s All About Image</a> <span>Posted Mar 22, 2023</span>
								</li>
								<li>
									<a href="#">Choosing The Right Font For Your Logo</a> <span>Posted Mar 21, 2023</span>
								</li>
								<li>
									<a href="#">Outsmart The Competition</a> <span>Posted Mar 20, 2023</span>
								</li>
							</ul>
						</div>
						<div>
							<h3>Popular blog posts</h3>
							<ul>
								<li>
									<a href="#">We Can Get You To The Top</a> <span>Posted Mar 19, 2023</span>
								</li>
								<li>
									<a href="#">Think Of It As Investment</a> <span>Posted Mar 20, 2023</span>
								</li>
								<li>
									<a href="#">Behind Every Success Is Planning And Anticipation</a> <span>Posted Mar 21, 2023</span>
								</li>
							</ul>
						</div>
						<div class="categories">
							<h3>Categories</h3>
							<ul>
								<li>
									<a href="#">Brand</a>
								</li>
								<li>
									<a href="#">Creative</a>
								</li>
								<li>
									<a href="#">Production</a>
								</li>
								<li>
									<a href="#">SEO</a>
								</li>
								<li>
									<a href="#">Marketing</a>
								</li>
								<li>
									<a href="#">Copywriting</a>
								</li>
								<li>
									<a href="#">Planning</a>
								</li>
								<li>
									<a href="#">Brandding</a>
								</li>
								<li>
									<a href="#">Advertising</a>
								</li>
								<li>
									<a href="#">Web</a>
								</li>
								<li>
									<a href="#">Design</a>
								</li>
								<li>
									<a href="#">Conversation</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>