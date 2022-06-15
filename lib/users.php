<?php
function checkLogin($username, $password){
    global $list_user;
    foreach ($list_user as $user) {
        if ($username == $user['username'] && md5($password) == $user['password']) {
            return true;
        }
    }
    return false;
}
//trả về true nếu đã login
function is_login(){
    if(isset($_SESSION['is_login']) || isset($_COOKIE['is_login'])){
        return true;
    }
    return false;
}
//trả vveef user name của người login
function get_fullname(){
    global $list_user;
    foreach ($list_user as $user) {
        if(isset($_SESSION['is_login'])){
            if($_SESSION['is_user'] == $user['username']){
                return $user['fullname'];
            }
        }
        if(isset($_COOKIE['is_user'])){
            if ($_COOKIE['is_user'] == $user['username']) {
                return $user['fullname'];
            }
        }
    }
}
