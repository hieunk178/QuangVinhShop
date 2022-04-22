<?php
if(isset($_POST['search'])){
    $sql = "SELECT tensp FROM sanpham where tensp like '%{$_POST['search']}%'";
}else $sql = "SELECT tensp FROM sanpham";
$result = mysqli_query($conn, $sql);
$list = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $list[] = $row;
    }
}
foreach($list as $item){
    echo "<li><a>{$item['tensp']}</a></li>";
}