<?php
session_start();
if(isset($_SESSION['id_user'])){
    if(mysqli_num_rows($result = mysqli_query($conn,"SELECT * from giohang where MaSP = {$_GET['id']} AND id_user = {$_SESSION['id_user']}") )>0){
        $sp = mysqli_fetch_assoc($result);
        mysqli_query($conn,"UPDATE giohang SET SoLuong = {$sp['SoLuong']}+{$_GET["num"]} WHERE MaSP = {$_GET['id']} AND id_user = {$_SESSION['id_user']}");
        
        redirect("?mod=cart");
    }else{
        $sql = "INSERT INTO giohang VALUES({$_SESSION['id_user']}, {$_GET['id']}, {$_GET["num"]})";
        mysqli_query($conn, $sql);
        redirect("?mod=cart");
    }
}else redirect("?mod=account&act=login");