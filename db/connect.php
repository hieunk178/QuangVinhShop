<?php
$conn = mysqli_connect('localhost', 'root','','quangvinh');
//$conn = mysqli_connect('free01.123host.vn', 'hkxhjlfd_admin','Quangvinh@','hkxhjlfd_quangvinh');
mysqli_set_charset($conn, 'UTF8');
if(!$conn){
    echo "Kết nối không thành công. ". mysqli_connect_error();
    die();
}//else echo "Kết nối thành công";
//mysqli_close();