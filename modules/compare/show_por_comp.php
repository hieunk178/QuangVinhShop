<?php
$sql = "SELECT masp, anh, giagoc, giakhuyenmai, motangan, motachitiet from sanpham where masp = {$_POST['id_pro']}";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) == 1){
    $item = mysqli_fetch_assoc($result);
}
$giagoc = currency_format($item['giagoc']);
$giakm = currency_format($item['giakhuyenmai']);
$list_mota = explode('.', $item['motangan']);
$mota = "";
foreach($list_mota as $mt){
    $mota = $mota."<p>{$mt}</p>";
}
$parameter = explode('<table', $item['motachitiet']);
$parameter = '<table cellpadding="0" cellspacing="0"'.$parameter[1];
echo "<a href='?mod=products&act=detail&id=1' title='' class='thumb'>
    <img src='{$item['anh']}'>
</a>
<div class='product-content'>
    <div class='price'>
        <span class='new'>$giakm</span>
        <span class='old'>$giagoc</span>
    </div>
    <div class='action clearfix'>
    <a href='?mod=cart&id={$item['masp']}' title='Thêm giỏ hàng' class='add-cart fl-left'>Thêm giỏ hàng</a>
    <a href='?mod=checkout' title='Mua ngay' class='buy-now fl-right'>Mua ngay</a>
    </div>
    <hr />
    <h3>Đặc điểm nổi bật</h3>
    <div class='desc'>
        {$mota}
    </div>
    <hr>
    <div class='parameter'>
        {$parameter}
    </div>
</div>"
?>