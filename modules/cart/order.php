<?php
session_start();
isset($_POST['fullname']) ? $fullname = $_POST['fullname']: $fullname ="";
isset($_POST['email']) ? $email = $_POST['email']: $email ="";
isset($_POST['phone']) ? $phone = $_POST['phone']: $phone ="";
isset($_POST['address']) ? $address = $_POST['address']: $address ="";
isset($_POST['note']) ? $note = $_POST['note']: $note ="";
isset($_POST['payment-method']) ? $payment_method = $_POST['payment-method']: $payment_method ="";
$total = get_total_cart();
$ngaylap = date("Y/m/d");
$sql = "INSERT INTO donhang(tongtien, anhminhhoa,sosp, ngaylap, tinhtrang,id_user, email, sodt, diachi, hinhthucthanhtoan) 
VALUES ($total,'{$_SESSION['anh']}',{$_SESSION['sosp']}, '$ngaylap', 'Chờ xác nhận', {$_SESSION['id_user']}, '$email', '$phone', '$address', '$payment_method')";
if(mysqli_query($conn, $sql)){
    $success = true;
    $MaDH = getMaDH();
}
$cart = getCart($_SESSION['id_user']);
function addOrderDetail($MaDH, $MaSP, $sl, $price){
    global $conn;
    $sql = "INSERT INTO chitietdonhang VALUES($MaDH, $MaSP, {$sl}, $price)";
    mysqli_query($conn, $sql);
}
foreach($cart as $item){
    $price = $item['GiaKhuyenMai']> 0 ? $item['GiaKhuyenMai'] :$item['GiaGoc'];
    addOrderDetail($MaDH, $item['MaSP'], $item['SoLuong'], $price);
    $success = true;
}
if($success){
    redirect("?mod=cart&success");
}
