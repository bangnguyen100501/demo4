<?php
class SinhVien {
function SinhVien ($maso, $hoten, $namsinh)
{
$this->MaSo=$maso;
$this->HoTen=$hoten;
$this->NamSinh=$namsinh;
}
}
$mangsv=array();
array_push($mangsv, new SinhVien("091", "Nguyễn Như Quỳnh", 1978)); 
array_push($mangsv, new SinhVien("002", "Hoa", 1987));
echo json_encode($mangsv);
?>