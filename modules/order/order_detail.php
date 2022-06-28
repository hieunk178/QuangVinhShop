<?php
get_header("");
$order = get_item("donhang", "madh",$_GET['id']);
$order_detail = get_detail_order_by_MaDH($_GET['id']);
$nguoi_mua = get_item("taikhoan", "id_user", $order['Id_User']);
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
                    <li>
                        <a href="" title="">Chi tiết đơn mua</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <div id="wrapper" class="wp-inner clearfix">
    <?php 
    if(!is_null($order_detail)){
    ?>
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <div class="info_order">
                    <p>Mã đơn hàng: <?php echo $order['MaDH'] ?></p>
                    <p>Họ và tên: <?php echo $nguoi_mua['HoVaTen'] ?></p>
                    <p>Số điện thoại: <?php echo $order['SoDT'] ?></p>
                    <p>Địa chỉ: <?php echo $order['DiaChi'] ?></p>
                    <p>Trạng thái: <span><?php echo $order['TinhTrang'] ?></span></p>
                </div>
                <hr>
                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <td>Số thứ tự</td>
                            <td>Ảnh</td>
                            <td>Tên sản phẩm</td>
                            <td>Số lượng</td>
                            <td>Giá sản phẩm</td>
                            <td>Thành tiền</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($order_detail as $index => $item){
                            $sp = get_item("sanpham", "masp", $item['MaSP']);
                            $thanhtien = $item['SoLuong']* $item['DonGia'];
                        ?>
                        <tr>
                            <td class="madh"> <?php echo $index+1 ?> </td>
                            <td class="anhMinhHoa"><img src="<?php echo $sp['Anh']?>" alt=""> </td>
                            <td>
                                <?php echo $sp['TenSP'] ?>
                            </td>
                            <td class=""><?php echo $item['SoLuong'] ?></td>
                            <td class=""><?php echo currency_format($item['DonGia']) ?></td>
                            <td>
                                <?php echo currency_format($thanhtien)?>
                            </td>         
                        </tr>
                        <?php } ?>
                    </tbody> 
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <p id="total-price" class="fl-right" data-total="<?php echo $total ?>">Tổng tiền: <span><?php echo currency_format($order['TongTien']) ?></span></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <div class="fl-right">
                                        <a href="?mod=cart&act=checkout" title="" id="cancel_order">Hủy đơn hàng</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tfoot>     
                </table>
            </div>
        </div>
        <div class="section" id="action-cart-wp">
            <div class="section detail">
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