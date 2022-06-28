<?php
get_header("");
$order = get_order_by_userId($_SESSION["id_user"]);
?>
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Đơn mua</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <div id="wrapper" class="wp-inner clearfix">
    <?php 
    if(!is_null($order)){
    ?>
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Mã đơn hàng</td>
                            <td>Ảnh minh họa</td>
                            <td>Số sản phẩm</td>
                            <td>Dịa chỉ</td>
                            <td>Thành tiền</td>
                            <td>Trạng thái</td>
                            <td>Chi tiết</td>   
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($order as $item){
                        ?>
                        <tr>
                            <td class="madh"> <?php echo $item['MaDH']?> </td>
                            <td class="anhMinhHoa"><img src="<?php echo $item['AnhMinhHoa']?>" alt="">  </td>
                            <td>
                                <?php echo $item['SoSP'] ?>
                            </td>
                            <td class=""><?php echo $item['DiaChi'] ?></td>
                            <td>
                                <?php echo currency_format($item['TongTien'])?>
                            </td>
                            <td class=""><?php echo $item['TinhTrang'] ?></td>     
                            <td class="detail_order">
                                <a href="?mod=order&act=order_detail&id=<?php echo $item['MaDH'] ?>">Xem chi tiết</a>
                            </td>     
                        </tr>
                        <?php } ?>
                    </tbody>      
                </table>
            </div>
        </div>
        <div class="section" id="action-cart-wp">
            <div class="section-detail">
                <a href="?mod=home" title="" id="buy-more">Mua tiếp</a><br/>
            </div>
        </div>
        <?php
        }else echo "<p>Không có sản phẩm nào trong giỏ hàng<a href='?mod=home' style='color:blue;'>(Tiếp tục mua hàng)</a></p>"
        ?>
    </div>
    
</div>
<?php
get_footer();
?>