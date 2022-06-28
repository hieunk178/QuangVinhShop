<?php
function get_table($table)
{
    
    global $conn;
    $sql = "SELECT * FROM {$table}";
    $result = mysqli_query($conn, $sql);
    $list = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
    }
    return $list;
}
function get_list_product_by_cat_id($cat_id, $num)
{
    
    global $conn;
    $sql = "SELECT * FROM sanpham WHERE MaDM = {$cat_id}";
    $result = mysqli_query($conn, $sql);
    $list_sp = array();
    if($num == 0){
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $list_sp[] = $row;
            }
        }
        
    }else{
        $sql = $sql." LIMIT {$num}";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $list_sp[] = $row;
            }
        }
    }
    return $list_sp;
}
function get_list_outstanding_product()
{
    
    global $conn;
    $sql = "SELECT * FROM sanpham LIMIT 6";
    $result = mysqli_query($conn, $sql);
    $list_otd_p = array();
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $list_otd_p[] = $row;
        }
    }
    return $list_otd_p;
}
function get_item($item,$attr, $value)
{
    global $conn;
    $sql = "SELECT * FROM $item WHERE {$attr} = {$value}";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $info = mysqli_fetch_assoc($result);
    }
    return $info;
}
function get_order_by_userId($id){
    global $conn;
    $sql = "SELECT * FROM donhang WHERE id_user = $id 
    order by madh DESC";
    $result = mysqli_query($conn, $sql);
    $list = array();
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result))
        $list[] = $row;
    }
    return $list;
}
function get_detail_order_by_MaDH($maDH){
    global $conn;
    $sql = "SELECT chitietdonhang.MaDH, chitietdonhang.MaSP, chitietdonhang.SoLuong, chitietdonhang.DonGia, sanpham.TenSP, sanpham.Anh FROM chitietdonhang, sanpham  WHERE chitietdonhang.masp = sanpham.masp AND madh = $maDH";
    $result = mysqli_query($conn, $sql);
    $list = array();
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result))
        $list[] = $row;
    }
    return $list;
}
function filter(){
        $sql="";
        if($_POST['select'] != 0){
            switch ($_POST['select']){
                case 1:
                    $sql  = "SELECT * FROM sanpham ORDER BY TenSP ASC";
                    break;
                case 2:
                    $sql  = "SELECT * FROM sanpham ORDER BY TenSP DESC";
                    break;
                case 3:
                    $sql  = "SELECT * FROM sanpham ORDER BY GiaGoc DESC";
                    break;
                case 4:
                    $sql  = "SELECT * FROM sanpham ORDER BY GiaGoc ASC";
                    break;
                default:
                    $sql="";
            }
        }
        global $conn;
        $result = mysqli_query($conn, $sql);
        $list_sp = array();
            if (mysqli_num_rows($result)>0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $list_sp[] = $row;
                }
            
        }
    return $list_sp;
}
function get_search(){
    global $conn;
    $search = $_GET['search'];
    $sql = "SELECT * FROM sanpham where TenSP like '%{$search}%'";
    $result = mysqli_query($conn, $sql);
    $list_sp = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $list_sp[] = $row;
        }
        }
    return $list_sp;
}

function get_list_order(){
    global $conn;
    $sql = "SELECT madh, hovaten, tongtien, ngaylap, tinhtrang FROM donhang, taikhoan where donhang.id_user = taikhoan.id_user";
    $result = mysqli_query($conn, $sql);
    $list = array();
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            $list[] = $row;
        }
    }
    return $list;
}
function get_address($ward, $district, $province){
    global $conn;
    $sql = "SELECT ward._name as 'ward',district._name as 'district', province._name as 'province' FROM ward, district, province WHERE ward._district_id = district.id AND ward._province_id = province.id AND  ward.id=$ward AND ward._district_id= $district AND ward._province_id = $province";
    $result = mysqli_query($conn, $sql);
    $ad = mysqli_fetch_assoc($result);
    return $ad['ward'].", ".$ad['district'].", ".$ad['province'];
}
function get_permition(){
    global $conn;
    $sql = "SELECT quyen from taikhoan where id_user = {$_SESSION['id_user']}";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 1){
        return mysqli_fetch_assoc($result)['quyen'];
    }
}