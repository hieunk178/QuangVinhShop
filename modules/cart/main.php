<?php
require "inc/header.php";
if(empty($_SESSION['id_user'])){
    redirect("?mod=account&act=login");
}else{
    $Cat = getCart($_SESSION['id_user']);
}
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
                        <a href="" title="">Sản phẩm làm đẹp da</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Mã sản phẩm</td>
                            <td>Ảnh sản phẩm</td>
                            <td>Tên sản phẩm</td>
                            <td>Giá sản phẩm</td>
                            <td>Số lượng</td>
                            <td colspan="2">Thành tiền</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($Cat as $item){
                        isset($item['GiaKhuyenMai'])? $price = $item['GiaKhuyenMai'] : $price = $item['GiaGoc'];    
                        ?>
                        <tr>
                            <td> <?php echo $item['MaSP']?> </td>
                            <td>
                                <a href="" title="" class="thumb">
                                    <img src="<?php echo $item['Anh'] ?>" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="" title="" class="name-product"><?php echo $item['TenSP'] ?></a>
                            </td>
                            <td><?php echo currency_format($price) ?></td>
                            <td>
                                <input type="number" name="num-order" min=1 max =10 value="<?php echo $item['SoLuong'] ?>" class="num-order">
                            </td>
                            <td><?php echo currency_format($price * $item['SoLuong']); ?></td>
                            <td>
                                <a href="?mod=cart&act=delete&id=<?php echo $item['MaSP']?>" title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <p id="total-price" class="fl-right">Tổng giá: <span>850.000đ</span></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <div class="fl-right">
                                        <a href="" title="" id="update-cart">Cập nhật giỏ hàng</a>
                                        <a href="?page=checkout" title="" id="checkout-cart">Thanh toán</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="section" id="action-cart-wp">
            <div class="section-detail">
                <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                <a href="?mod=home" title="" id="buy-more">Mua tiếp</a><br/>
                <a href="?mod=cart&act=delete&id_user=<?php echo $_SESSION['id_user'] ?>" title="" id="delete-cart">Xóa giỏ hàng</a>
            </div>
        </div>
    </div>
</div>
<?php
require "inc/footer.php";
?>