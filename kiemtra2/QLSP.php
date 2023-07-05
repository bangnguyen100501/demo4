<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sản Phẩm</title>
</head>
<body>
    <?php
        require 'QLSanPham.php';
        $xml = new SimpleXMLElement("Sanpham.xml", NULL,true);
        if(isset($_POST['xem'])){
            echo "<table border='1' cellspacing='0' cellpadding='10'>";
                echo "<tr>";
                echo "<td>Mã sản phẩm</td>";
                echo "<td>Tên sản phẩm</td>";
                echo "<td>Đơn giá</td>";
                echo "</tr>";
            foreach($xml as $mh){
                echo "<tr>";
                echo "<td>{$mh->Masp}</td>";
                echo "<td>{$mh->Tensp}</td>";
                echo "<td>{$mh->Dongia}</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        if(isset($_POST['add'])){
            $ma=$_POST['masp'];
            $ten=$_POST['tensp'];
            $dongia=$_POST['dongia'];
            $sanpham = new Sanpham($ma,$ten,$dongia);
            $sanpham->add();
        }
        if(isset($_POST['update'])){
            $ma=$_POST['masp'];
            $ten=$_POST['tensp'];
            $dongia=$_POST['dongia'];
            $sanpham = new Sanpham($ma,$ten,$dongia);
            $sanpham->update();
        }
        if(isset($_POST['delete'])){
            $ma=$_POST['masp'];
            $ten=$_POST['tensp'];
            $dongia=$_POST['dongia'];
            $sanpham = new Sanpham($ma,$ten,$dongia);
            $sanpham->delete();
        }
    ?>
    <form method="POST" action="QLSP.php">
        Mã sp:    <input type="text" name="masp"><br>
       Tên sp: <input type="text" name="tensp"><br>
        Đơn giá: <input type="text" name="dongia"><br>
        <input type="submit" name="add" value="Thêm">
        <input type="submit" name="update" value="Sửa">
        <input type="submit" name="delete" value="Xóa">
        <input type="submit" name="xem" value="Thông tin">
    </form>
</body>
</html>