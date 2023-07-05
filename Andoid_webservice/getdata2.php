<?php
require "dbCon.php";
class SinhVien {
    function SinhVien($maso, $hoten, $namsinh)
    {
     $this->MaSo=$maso;
     $this->HoTen=$hoten;
     $this->NamSinh=$namsinh;
    }
    }
     $query="SELECT * FROM dssv";
     
     $data=mysqli_query($connect,$query);
     $mangsv=array();
     while ($row=mysqli_fetch_assoc($data))
     {
     array_push($mangsv, new SinhVien($row['masv'],$row['hoten'],$row['namsinh']));
     
     }
    echo json_encode($mangsv);
 ?>