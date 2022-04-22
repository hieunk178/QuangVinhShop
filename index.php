<?php
require "lib/template.php";
require "db/connect.php";
require "lib/money.php";
require "lib/getDatabase.php";
require "lib/url.php";

$mod = isset($_GET['mod']) ? $_GET['mod'] : 'home';
$act = isset($_GET['act']) ? $_GET['act'] : 'main';

$path = "modules/{$mod}/{$act}.php";
if(file_exists($path)){
    require $path;
}
else require "inc/404.php"
?>