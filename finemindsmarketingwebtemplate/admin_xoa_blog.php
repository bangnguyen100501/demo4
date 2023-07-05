<?php 
    include('control.php');
    $getdata = new data();

    // $_GET["delete"]: Lay ID ve de xoa
    $delete = $getdata -> delete_user_blog($_GET["delete"]);
    if($delete){
        // echo "<script>alert('Xóa thành công');</script>";
        header('location:admin_blog.php');
    }
    else{
        echo "<script>alert('Xóa thất bại');</script>";
    }
