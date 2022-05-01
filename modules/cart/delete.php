<?php
if(isset($_GET['id'])){
    $sql = "DELETE FROM giohang WHERE MaSP = {$_GET['id']}";
}else $sql = "DELETE FROM giohang WHERE Id_User = {$_GET['id_user']}";
mysqli_query($conn, $sql);
redirect("?mod=cart");