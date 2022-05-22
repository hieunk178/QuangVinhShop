<?php
require "inc/header.php";
$masp = $_GET['id'];
$sanpham = get_item("sanpham", "MaSP", $masp);
?>
<div id="main-content-wp" class="clearfix detail-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title=""><?php echo $sanpham['TenSP'] ?></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="detail-product-wp">
                <div class="section-detail clearfix">
                    <div class="thumb-wp fl-left">
                        <a href="" title="" id="main-thumb">
                            <img id="zoom" src="<?php echo $sanpham['Anh'] ?>" data-zoom-image="<?php echo $sanpham['Anh'] ?>" />
                        </a>
                    </div>
                    <div class="thumb-respon-wp fl-left">
                        <img src="public/images/img-pro-01.png" alt="">
                    </div>
                    <div class="info fl-right">
                        <h3 class="product-name"><?php echo $sanpham['TenSP'] ?></h3>
                        <div class="desc">
                            <?php $list_mota = explode('.', $sanpham['MoTaNgan']);
                            foreach($list_mota as $mt){
                                echo "<p>{$mt}</p>";
                            }
                            ?>
                        </div>
                        <div class="num-product">
                            <span class="title">Tình trạng: </span>        
                            <span class="status"><?php 
                                if($sanpham['SoLuong'] > 0) echo "Còn hàng"; 
                                else echo "Hết hàng"; 
                                ?></span>
                        </div>
                        <p class="price"><?php echo currency_format($sanpham['GiaKhuyenMai'] == 0? $sanpham['GiaGoc'] : $sanpham['GiaKhuyenMai']) ?></p>
                        <div id="num-order-wp">
                            <a title="" id="minus"><i class="fa fa-minus"></i></a>
                            <input type="text" name="num-order" value="1" id="num-order">
                            <a title="" id="plus"><i class="fa fa-plus"></i></a>
                        </div>
                        <a href="?mod=cart&act=add&id=<?php echo $sanpham['MaSP'] ?>" title="Thêm giỏ hàng" class="add-cart">Thêm giỏ hàng</a>
                    </div>
                </div>
            </div>
            <div class="section" id="post-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Mô tả sản phẩm</h3>
                </div>
                <div class="section-detail detail_description">
                    <?php echo $sanpham['MoTaChiTiet']?>
                </div>
            </div>
            <div class="section" id="same-category-wp">
                <div class="section-head">
                    <h3 class="section-title">Cùng chuyên mục</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php
                        $list_pro = get_list_product_by_cat_id($sanpham['MaDM'],0);
                        foreach($list_pro as $item){
                        ?>
                        <li>
                            <a href="" title="" class="thumb">
                                <img src="<?php echo $item['Anh'] ?>">
                            </a>
                            <a href="" title="" class="product-name"><?php echo $item['TenSP'] ?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($item['GiaGoc']) ?></span>
                                <span class="old"><?php echo currency_format($item['GiaKhuyenMai']) ?></span>
                            </div>
                            <div class="action clearfix">
                                <a href="?mod=cart&act=add&id=<?php echo $item['MaSP'] ?>" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?mod=cart&act=checkout" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
require "inc/footer.php";
?>