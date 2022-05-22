<?php
session_start();
isset($_POST['fullname']) ? $fullname = $_POST['fullname']: $fullname ="";
isset($_POST['fullname']) ? $email = $_POST['email']: $email ="";
isset($_POST['fullname']) ? $phone = $_POST['phone']: $phone ="";
isset($_POST['fullname']) ? $address = $_POST['address']: $address ="";
isset($_POST['fullname']) ? $note = $_POST['note']: $note ="";
$total = get_total_cart();
$ngaylap = date("Y/m/d");
$sql = "INSERT INTO donhang(tongtien, ngaylap, tinhtrang,id_user, email, sodt, diachi) VALUES ($total, '$ngaylap', 'Chờ xử lý', {$_SESSION['id_user']}, '$email', '$phone', '$address')";
if(mysqli_query($conn, $sql)){
    $success = true;
    $MaDH = getMaDH();
}
echo $MaDH;
$cart = getCart($_SESSION['id_user']);
print_r($cart);
function addOrderDetail($MaDH, $MaSP, $sl){
    global $conn;
    $sql = "INSERT INTO chitietdonhang VALUES($MaDH, $MaSP, {$sl})";
    mysqli_query($conn, $sql);
}
foreach($cart as $item){
    addOrderDetail($MaDH, $item['MaSP'], $item['SoLuong']);
    $success = true;
}
if($success){
    redirect("?mod=cacrt&success");
}
