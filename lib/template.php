<?php
function get_header($version){
    if(!empty($version)){
        $path_header = "inc/header_{$version}.php";
    }else $path_header = "inc/header.php";
    
    if(file_exists($path_header)){
        require $path_header;
    }
    else echo "Không tồn tại đường dẫn";
}
function get_footer(){
    $path_footer = "inc/footer.php";
    if(file_exists($path_footer)){
        require "inc/footer.php";
    }
    else echo "Không tồn tại đường dẫn";
}