<?php
get_header("");
//Lấy danh sách các danh mục sản phẩm
$list_danhmuc = get_table("danhmuc");
//Lấy danh sách các hãng
$list_hang = get_table("hang");
?>
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content">
            <div class="section" id="slider-wp">
                <?php
                    require "inc/category-product.php";
                    require "inc/slider.php";
                ?>
            </div>
            <?php require "inc/support-wp.php"; ?>
            <div class="section content" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm nổi bật</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php
                        $outstanding =  get_list_outstanding_product();
                        foreach($outstanding as $sp){
                        ?>
                        <li>
                            <a href="?mod=products&act=detail&id=<?php echo $sp['MaSP'] ?>" title="" class="thumb">
                                <img src="<?php echo $sp['Anh'] ?>">
                            </a>
                            <a href="?mod=products&act=detail&id=<?php echo $sp['MaSP'] ?>" title="" class="product-name"><?php echo $sp['TenSP'] ?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($sp['GiaKhuyenMai']) ?></span>
                                <span class="old"><?php echo currency_format($sp['GiaGoc']) ?></span>
                            </div>
                            <div class="action clearfix">
                                <a href="?mod=cart" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?mod=checkout" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <?php
            foreach ($list_danhmuc as $danhmuc){
            ?>
            <div class="section content" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title"><a href="?mod=products&id=<?php echo $danhmuc['MaDM'] ?>"><?php  echo $danhmuc['TenDM']?></a></h3>
                    <div class="list_trademark">

                        <?php
                        foreach($list_hang as $hang){
                            echo "<a href='?mod=products&id_hang={$hang['MaHang']}'>{$hang['TenHang']}</a>";
                        }
                        ?>
                    </div>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php
                        $sanphamByMaDM = get_list_product_by_cat_id($danhmuc['MaDM'], 10);
                        foreach($sanphamByMaDM as $item){
                        ?>
                        <li class="product">
                            <a href="?mod=products&act=detail&id=<?php echo $item['MaSP'] ?>" title="" class="thumb">
                                <img src="<?php echo $item['Anh'] ?>">
                            </a>
                            <div class="product-content">
                                <a href="?mod=products&act=detail&id=<?php echo $item['MaSP'] ?>" title="" class="product-name"><?php echo $item['TenSP'] ?></a>
                                <div class="price">
                                    <span class="new"><?php echo currency_format($item['GiaKhuyenMai']) ?></span>
                                    <span class="old"><?php echo currency_format($item['GiaGoc']) ?></span>
                                </div>
                                <div class="action clearfix">
                                    <a href="?mod=cart&id=<?php echo $item['MaSP'] ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="?mod=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </div>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>