<?php
session_start();
if(isset($_SESSION['id_user'])){
    if(mysqli_num_rows($result = mysqli_query($conn,"SELECT * from giohang where MaSP = {$_GET['id']}"))>0){
        $sp = mysqli_fetch_assoc($result);
        mysqli_query($conn,"UPDATE giohang SET SoLuong = {$sp['SoLuong']}+1 WHERE MaSP = {$_GET['id']}");
        redirect("?mod=cart");
    }else{
        $sql = "INSERT INTO giohang VALUES({$_SESSION['id_user']}, {$_GET['id']}, 1)";
        if(!mysqli_query($conn, $sql)){
        echo  "Thêm sản phẩm vào giỏ hàng thất bại.";
        }else redirect("?mod=cart");
    }
}else redirect("?mod=account&act=login");