<?php
require "dbCon.php";
class SinhVien {
    function SinhVien($Maso, $Hoten, $NamSinh)
    {
     $this->MaSo=$Maso;
     $this->HoTen=$Hoten;
     $this->NamSinh=$NamSinh;
     $this->Hinh=$Hinh;
    }
    }
     $query="SELECT * FROM dssv";
     
     $data=mysqli_query($connect,$query);
     $mangsv=array();
     while ($row=mysqli_fetch_assoc($data))
     {
     //array_push($mangsv, new SinhVien($row['Maso'],$row['Hoten'],$row['NamSinh']));
     $mangsv[]=$row;
     
     }
    echo json_encode($mangsv);
 ?>