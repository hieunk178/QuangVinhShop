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
    if ($num == 0) {
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $list_sp[] = $row;
            }
        }
    } else {
        $sql = $sql . " LIMIT {$num}";
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
function get_item($item, $attr, $value)
{
    global $conn;
    $sql = "SELECT * FROM $item WHERE {$attr} = {$value}";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $info = mysqli_fetch_assoc($result);
    }
    return $info;
}

function filter()
{
    $sql = "";
    if ($_POST['select'] != 0) {
        switch ($_POST['select']) {
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
                $sql = "";
        }
    }
    global $conn;
    $result = mysqli_query($conn, $sql);
    $list_sp = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $list_sp[] = $row;
        }
    }
    return $list_sp;
}
function get_search()
{
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