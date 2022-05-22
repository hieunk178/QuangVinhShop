<?php
session_start();
require "../db/connect.php";
require "../lib/url.php";
require "../lib/getDatabase.php";
require "../lib/money.php";
if (!isset($_SESSION['is_login'])){
    redirect("../?mod=account&act=login");
}

$page = isset($_GET['page']) ? $_GET['page'] : 'list_post';
$path = "./pages/{$page}.php";

require './inc/header.php';

if (file_exists($path)) {
    require "{$path}";
} else {
    require "./pages/404.php";
}

require './inc/footer.php';
