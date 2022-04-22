<?php
function get_provinces(){
    global $conn;
    $sql = "SELECT * FROM province";
    $result = mysqli_query($conn, $sql);
    $list = array();
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            $list[] = $row;
        }
    }
    return $list;
}
function get_district_by_province_id($id){
    global $conn;
    $sql = "SELECT * from district where _province_id = {$id}";
    $result = mysqli_query($conn, $sql);
    $list = array();
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $list[] = $row;
        }
    }
    return $list;
}
function get_ward(){
    global $conn;
    $sql = "SELECT * from ward";
    $result = mysqli_query($conn, $sql);
    $list = array();
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $list[] = $row;
        }
    }
    return $list;
}