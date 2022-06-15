<?php
$masp = $_GET['id'];
$sql = "DELETE FROM sanpham where masp = $masp";
mysqli_query($conn, $sql);
redirect("?page=list_product");