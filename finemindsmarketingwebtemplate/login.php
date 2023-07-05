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
                        <a href="login.php">Login</a>
                    </li>

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
					<h2>Form Login</h2>
					<form method="post" id="form-login" style="margin-top:20px">
                        <div class="row justify-content-md-center" >
                            <div class="col col-5">
                                <input type="text" class="form-control" placeholder="Enter user name" name="txtuser">
                            </div>
                        </div>
                        <div class="row g-3 justify-content-md-center" style="margin-top:20px">
                            <div class="col col-5">
                                <input type="password" class="form-control" placeholder="Enter password" name="txtpw">
                            </div>
                        </div>
                        <div class="row g-3 justify-content-md-center" style="margin-top:20px">
                            <div class="d-grid gap-2 col-5 mx-auto">
                                <input type="submit" class="btn btn-outline-secondary"value="Login" class="form-submit" name="sbm">
                            </div>
                        </div>
                        <div class="forgot_pass" style="display:flex;justify-content:space-between;margin-top:20px">
                            <span class="regis">Don't have a account yet? <a href="register.php">Register now</a></span> <br>
                            <span class="forgot">Forgot Password <a href="forgot_pass.php">Reset your Password</a></span>
                        </div>
                    </form>
                    <?php
                        session_start();
                        include("./control.php");
                        $get_data = new data();
                        if(isset($_POST['sbm'])){
                            if(empty($_POST['txtuser']) || empty($_POST['txtpw'])){
                                echo "<script>alert('Thong tin không duoc de trong')</script>";
                            }else{
                                $login = $get_data -> login($_POST['txtuser'],$_POST['txtpw']);
                                if ($login === 1) {
                                    $_SESSION['username'] = $_POST['txtuser'];
                                    $select = $get_data -> select_role($_POST['txtuser']);
                                    foreach ($select as $se) {
                                        // print_r( $se);
                                        // echo $se['role'];
                                        if($se['role'] == 1){
                                        $_SESSION['username'] = $_POST['txtuser'];
                                            header("location:admin.php");
                                        }else{
                                            header("location:index.php");
                                        }
                                    }
                                } else {
                                    echo "<script>alert('Tên đăng nhập hoặc mật khẩu không dúng!')</script>";
                                }
                            }
                        }
                    ?>
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