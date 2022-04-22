<?php
if($_POST['submit']){
    if($_POST['select'] != 0){
        switch ($_POST['select']){
            case 1:
                $sql  = "SELECT * FROM sanpham ORDER BY TenSP DESC";
                break;
            case 2:
                $sql  = "SELECT * FROM sanpham ORDER BY TenSP ASC";
                break;
            case 3:
                $sql  = "SELECT * FROM sanpham ORDER BY GiaGoc DESC";
                break;
            case 4:
                $sql  = "SELECT * FROM sanpham ORDER BY GiaGoc ASC";
                break;
        }
        
    }else{
        $sql  = "SELECT * FROM sanpham";
    }
    global $conn;
    $result = mysqli_query($conn, $sql);
    $list_sp = array();
    if($num == 0){
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $list_sp[] = $row;
            }
        }
        
    }
}
redirect("?mod=");
