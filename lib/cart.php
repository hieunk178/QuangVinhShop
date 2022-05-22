<?php
    function getPrice($item){
        return $item['GiaKhuyenMai']>0 ? $item['GiaKhuyenMai']: $item['GiaGoc']; 
    }
    function update_num_order($sl, $ma){
        global $conn;
        $sql = "UPDATE giohang SET soluong = $sl where masp = $ma AND id_user = {$_SESSION['id_user']}";
        mysqli_query($conn, $sql);
    }
    function get_cart_by_id_user($id)
    {
        global $conn;
        $sql = "SELECT giohang.soluong, giagoc, giakhuyenmai FROM giohang, sanpham WHERE giohang.masp = sanpham.masp and id_user = {$_SESSION['id_user']}";
        $result = mysqli_query($conn, $sql);
        $cart = array();
        if (mysqli_num_rows($result)>0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $cart[] = $row;
            }
        }
        return $cart;
    }
    function get_total_cart(){
        $cart = get_cart_by_id_user($_SESSION['id_user']);
        $total = 0;
        foreach($cart as $item){
            $item['giakhuyenmai']>0? $price = $item['giakhuyenmai'] : $price = $item['giagoc'];
            $total += $item['soluong'] * $price;
        }
        return $total;
    }
    function getCart($id_user){
        global $conn;
        $sql = "SELECT Id_User, giohang.MaSP, Anh, TenSP, GiaGoc, GiaKhuyenMai, giohang.SoLuong FROM giohang, sanpham WHERE giohang.MaSP = sanpham.MaSP AND Id_User = {$id_user}";
        $result = mysqli_query($conn, $sql);
        $Cat = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $Cat[] = $row;
            }
            }
        return $Cat;
    }
    function get_num_pro_in_cart(){
        global $conn;
        $sql = "SELECT soluong FROM giohang WHERE id_user = {$_SESSION['id_user']}";
        $result = mysqli_query($conn, $sql);
        return mysqli_num_rows($result);
    }
    function getMaDH(){
        global $conn;
        $sql = "SELECT MaDH FROM donhang WHERE id_user = {$_SESSION['id_user']}";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                $mahd = $row['MaDH'];
            }
        }
        return $mahd;
    }
    
?>