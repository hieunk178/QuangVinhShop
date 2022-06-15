<?php
function delete_pro($id){
    global $conn;
    $sql = "DELETE FROM `sanpham` WHERE masp = $id";
    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Xóa sản phẩm thành công!')</script>";
    }
}
