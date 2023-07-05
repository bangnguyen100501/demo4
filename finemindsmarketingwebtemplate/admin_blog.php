<?php
    session_start();
    include("control.php");
    $getdata = new data();
    $select = $getdata -> select_all_blog();
    $accounts = $getdata -> select_all_admin();
    if($_SESSION['username'] == ""){
        // new chua login ->goi loigin.php
        header("Location:login.php");
    }else {
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
</head>
<body>
  <div class="admin">
    <div class="navigation">
        <ul class="menu">
            <li class=" menu-item">
                <a href="#">
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
            <li class="menu-item active">
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
            <li class="menu-item">
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
            <div class="detail-table">
                <div class="cardHeader">
                <h2>Blog</h2>
                <a href="admin_add_blog.php" class= "btn btn-primary btn-sm">
                    <span><ion-icon name="add-outline"></ion-icon></span>
                    <span>Create blog</span>
                </a>
                </div>
                <div class="sticky-table">
                <table id="myTable" >
                    <thead>
                    <tr>
                        <th>#</th>
                        <td>ID</td>
                        <td>Title</td>
                        <td>Date</td>
                        <td>S_Content</td>
                        <td>L_Content</td>
                        <th style="min-width:50px;width:60px">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        if($select){
                        $stt=0;
                        foreach($select as $se){
                            $stt++;
                    ?>
                        <tr>
                        <td><?php echo $stt; ?></td>
                        <td><?php echo($se['ID']); ?></td>
                        <td><?php echo($se['title']); ?></td>
                        <td><?php echo($se['Date']); ?></td>
                        <td><?php echo($se['S_Content']) ?></td>
                        <td><?php echo($se['L_content']) ?></td>
                        <td class="text-center">
                            <div class="btn-action">
                            <a href="admin_sua_blog.php?edit=<?php  echo $se['ID']?>" class="btn-edit" id ="btn_edit">
                            <ion-icon name="create-outline"></ion-icon></a>
                            <a href="admin_xoa_blog.php?delete=<?php  echo $se['ID']?>"
                            onClick="return confirm('Bạn có chắc chắn muốn xóa không?')" class="btn-delete" id ="btn_edit">
                            <ion-icon name="trash-outline"></ion-icon>
                            </a>
                        </td>
                        </tr>
                    <?php
                        }
                        }
                    ?>
                    </tbody>
                </table>
                </div>

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
