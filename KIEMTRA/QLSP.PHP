<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require 'QLSanpham.php';
        $xml = new SimpleXMLElement("sanpham.xml",null,true);
        if(isset($_POST['xem'])){
            echo "<table border='1' cellspacing='0' cellpadding='10'>";
                echo "<tr>";
                echo "<td>Ma khach</td>";
                echo "<td>Ho ten</td>";
                echo "<td>Dia chi</td>";
                echo "</tr>";
            foreach($xml as $mh){
                echo "<tr>";
                echo "<td>{$mh->makh}</td>";
                echo "<td>{$mh->tensp}</td>";
                echo "<td>{$mh->dongia}</td>";
                echo "</tr>";
            }   
            echo "</table>";
        }
        if(isset($_POST['add'])){
            $ma=$_POST['masp'];
            $ten=$_POST['tensp'];
            $dongia=$_POST['dongia'];
            $sanpham = new sanpham($ma,$ten,$dongia);
            $sanpham->add();
        }
        if(isset($_POST['update'])){
            $ma=$_POST['masp'];
            $ten=$_POST['tensp'];
            $dongia=$_POST['dongia'];
            $sanpham = new sanpham($ma,$ten,$dongia);
            $sanpham->update();
        }
        if(isset($_POST['delete'])){
            $ma=$_POST['masp'];
            $ten=$_POST['tensp'];
            $dongia=$_POST['dongia'];
            $sanpham = new sanpham($ma,$ten,$dongia);
            $sanpham->delete();
        }
    ?>
    <form method="POST" action="QLKH.php">
        Ma Khách: <input type="text" name="masp"><br>
        Ho tên: <input type="text" name="tensp"><br>
        Địa chỉ: <input type="text" name="dongia"><br>
        <input type="submit" name="add" value="Thêm">
        <input type="submit" name="update" value="Sửa">
        <input type="submit" name="delete" value="Xóa">
        <input type="submit" name="xem" value="Thông tin">
    </form>
</body>
</html>