<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Fineminds Marketing Solutions Website Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
    crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="./css/style_update.css">
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
                    <li>
                        <a href="blog.php">Blog</a>
                    </li>
                    <li class="selected">
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
					<h2>Form Register</h2>
					<form method="post" enctype="multipart/form-data">
            <!-- type = "text" -->
            <div class="user-detials">
                <div class="input-boxs">
                    <span class="detials">Full Name</span>
                    <input type="text" placeholder="Enter your name" name="txtname" required>
                </div>

                <div class="input-boxs">
                    <span class="detials">Password</span>
                    <input type="password" placeholder="Enter your password" name="txtpass" required>
                </div>

                <div class="input-boxs">
                    <span class="detials">Confirm Password</span>
                    <input type="password" placeholder="Confirm your password" name="txtConfirmPass" required>
                </div>

                <div class="input-boxs">
                    <span class="detials">Select province</span>
                    <select name="slprovince" id="">
                        <option value="Ha Nam">Ha Nam</option>
                        <option value="Ninh Binh">Ninh Binh</option>
                        <option value="Hai Phong">Hai Phong</option>
                        <option value="Cao Bang">Cao Bang</option>
                    </select>
                </div>

                <div class="input-boxs">
                    <span class="detials">Email</span>
                    <input type="email" name="email" id="email">
                </div>

                <div class="input-boxs">
                    <span class="detials">Choosefile</span>
                    <input type="file" name="choosefile">
                </div>
            </div>
            <!-- end type = "text" -->

            <!-- gender -->
            <div class="gender-detials">
                <input type="radio" name="txtgender" value="male" id="dot-1">
                <input type="radio" name="txtgender" value="female" id="dot-2">
                <input type="radio" name="txtgender" value="orthers" id="dot-3">
                <span class="gender-title">Gender</span>
                <div class="category">
                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="gender">Mail</span>
                    </label>
                    <label for="dot-2">
                        <span class="dot two"></span>
                        <span class="gender">Femails</span>
                    </label>
                    <label for="dot-3">
                        <span class="dot three"></span>
                        <span class="gender">Others gender</span>
                    </label>
                </div>
            </div>
            <div class="gender-detials">
                <input type="checkbox" name="hobby[]" value="Study" id="dot-4">
                <input type="checkbox" name="hobby[]" value="Game" id="dot-5">
                <input type="checkbox" name="hobby[]" value="Music" id="dot-6">
                <span class="hobby-title">Hobby</span>
                <div class="category">
                    <label for="dot-4">
                        <span class="dot one"></span>
                        <span class="gender">Study</span>
                    </label>
                    <label for="dot-5">
                        <span class="dot two"></span>
                        <span class="gender">Game</span>
                    </label>
                    <label for="dot-6">
                        <span class="dot three"></span>
                        <span class="gender">Music</span>
                    </label>
                </div>
            </div>
            <!-- button -->
            <div class="submit">
                <input type="submit" value="Register" name="register">
            </div>
        </form>
        <?php
            include('control.php');
            $get_data = new data(); //call data from class data from control.php

            if(isset($_POST['register'])){
                // upload img -> folder images
                $upload = move_uploaded_file($_FILES['choosefile']['tmp_name'], "images/". $_FILES['choosefile']['name']);

                // $hobby = implode(', ',$_POST['hobby']);
            $hobby = "";
            foreach ($_POST['hobby'] as $key) {
                $hobby .= $key. " ";
            }

                $insert = $get_data -> in_registration($_POST['txtname'], $_POST['txtpass'], $_POST['slprovince'], $_POST['email'], $_FILES['choosefile']['name'], $_POST['txtgender'], $hobby); // -> call function in_registration from class data

                if($insert){
                    echo "<script>alert('Your message has been sent successfully.')</script>";
                    echo '<script>window.location= "login.php"</script>';
                }else{
                    echo "<script>alert('Your message has not been sent successfully.')</script>";
                }
            }
        ?>
                    <!-- end -->
					<div class="section" style="padding-bottom:50px">
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
    integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
    integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
    crossorigin="anonymous"></script>
</body>
</html>