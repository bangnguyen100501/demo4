<?php
    session_start();
    include("control.php");
    $getdata = new data();
    $accounts = $getdata -> select_all_admin();
    $select = $getdata -> select_id_regis($_GET['edit']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin</title>
  <!-- font icon -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <!-- plugin datatables.net -->
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <!-- Summer note -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">
  <!--  -->
  <link rel="stylesheet" href="./css/main.css">
  <link rel="stylesheet" href="./css/style_update.css">
</head>
<body>
  <div class="admin">
    <div class="navigation">
        <ul class="menu">
            <li class=" menu-item">
                <a href="admin.php">
                <span class="icon">
                    <ion-icon name="logo-apple"></ion-icon>
                </span>
                <span class="menu-text">Nguyễn Lương Bằng</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="admin.php">
                <span class="icon">
                    <ion-icon name="home-outline"></ion-icon>
                </span>
                <span class="menu-text">Admin</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="admin_blog.php">
                <span class="icon">
                    <ion-icon name="document-text-outline"></ion-icon>
                </span>
                <span class="menu-text">Blog</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="admin_contact.php">
                <span class="icon">
                <ion-icon name="people-outline"></ion-icon>
                </span>
                <span class="menu-text">Contact</span>
                </a>
            </li>
            <li class="menu-item active">
                <a href="admin_user.php">
                <span class="icon">
                <ion-icon name="finger-print-outline"></ion-icon>
                </span>
                <span class="menu-text">Account</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="logout.php">
                <span class="icon">
                    <ion-icon name="log-out-outline"></ion-icon>
                </span>
                <span class="menu-text">Sign Out</span>
                </a>
            </li>

        </ul>



    </div>
    <div class="main">
        <div class="top-bar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
            <!-- search -->
            <div class="top-bar__search">
                <label for="">
                <input type="text" placeholder="Search here">
                <ion-icon name = "search-outline"></ion-icon>
                </label>
            </div>
            <!-- user Img -->
            <div>
                <span
                style="color:black;font-weight: 600;
                    position: relative;
                    top: 27px;
                    right: 130px;"
                >
                Xin chào:
                 <?php
                    foreach($accounts as $se){
                        if($_SESSION['username'] == $se['name_regis']){
                            echo ($se['name_regis']);
                            $avatar = $se['file'];
                        }
                    }
                ?>
                </span>
                <div class="user">
                    <img src="./images/<?php echo $avatar; ?>" alt="use-img">
                </div>
            </div>
        </div>
        <!-- Body admin -->
        <div class="main-table">
        <div id="contents update">
		<!-- register form-->
		<div class="container">
		<?php
            foreach($select as $se){
        ?>
        <form method="post" enctype="multipart/form-data">
            <div class="user-detials">
                <div class="input-boxs">
                    <span class="detials">Full Name</span>
                    <input type="text" placeholder="Enter your name" name="txtname" value="<?php echo $se['name_regis'] ?>">
                    <div class="has-error">
                        <span style="color:red"><?php echo (isset($err['name']))?$err['name']:''  ?></span>
                    </div>
                </div>

                <div class="input-boxs">
                    <span class="detials">Select role</span>
                    <select name="role" id="">
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                    </select>
                </div>

                <div class="input-boxs">
                    <span class="detials">Email</span>
                    <input type="email" name="email" id="" value="<?php echo $se['email'] ?>">
                </div>

                <div class="input-boxs">
                    <span class="detials">Choosefile</span>
                    <input type="file" name="choosefile" src="./images/<?php echo $se['file'] ?>">
                </div>
            </div>
            <!-- gender -->
            <div class="gender-detials">
			<input type="radio" name="txtgender" value="male" id="dot-1"
                        <?php if($se['gender'] == "male") echo "checked" ?>>
                    <input type="radio" name="txtgender" value="female" id="dot-2"
                        <?php if($se['gender'] == "female") echo "checked" ?>>
                    <input type="radio" name="txtgender" value="orthers" id="dot-3"
                        <?php if($se['gender'] == "orthers") echo "checked" ?>>
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
                <input type="checkbox" name="hobby[]" value="Study" id="dot-4"
                    <?php if(strlen(strstr($se['hobby'],'Study')) > 0) echo "checked" ; ?>
                >
                <input type="checkbox" name="hobby[]" value="Game" id="dot-5"
                    <?php if(strlen(strstr($se['hobby'],'Game')) > 0) echo "checked" ; ?>
                >
                <input type="checkbox" name="hobby[]" value="Music" id="dot-6"
                    <?php if(strlen(strstr($se['hobby'],'Music')) > 0) echo "checked" ; ?>>
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
                <input type="submit" value="Update" name="register">
            </div>
        </form>
		<?php
        if(isset($_POST['register'])){
				$upload = move_uploaded_file($_FILES['choosefile']['tmp_name'], "images/". $_FILES['choosefile']['name']);
				$hobby = "";
				foreach ($_POST['hobby'] as $key) {
					$hobby .= $key. " ";
				}
				$update_now = $getdata->update_regis($_GET['edit'],$_POST['txtname'],$_POST['email'],$_FILES['choosefile']['name'],$_POST['txtgender'] , $hobby,$_POST['role']);
				if($update_now){
					echo "<script>alert('Update success')</script>";
					echo "<script>window.location.href='admin_user.php';</script>";
					// header("location:admin.php");
					// echo "<script>window.location.href='admin.php';</script>";
					//echo '<script>alert("CẬp nhật thành công người dùng'.$_POST['txtname'].'")</script>';
				}else{
					echo "<script>alert('Update fail')</script>";
				}
        	}
        ?>
    </div>
        </div>
        <!-- End body admin -->
    </div>
  </div>

  <!-- Style JS -->
  <script src="./js/script.js"></script>
  <!-- Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

  <!-- Data table -->
  <script type="text/javascript" src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable({
      lengthMenu:[5,7,10,25,50, "All"],
    });
} );
  </script>
</body>
</html>

<?php
    }
?>
