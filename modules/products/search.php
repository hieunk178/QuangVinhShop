<?php
require "inc/header.php";
$list_sp = get_search();
?>

<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=" title="">Trang chủ</a>
                    </li>
                    <li>
                        <?php
                        if(isset($_GET['search'])){
                           echo "<a>{$_GET['search']}</a>";
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head ">
                    <h3>Tìm Kiếm</h3>
                    <div class="filter-wp fl-right">
                        <p class="desc">Hiển thị 45 trên 50 sản phẩm</p>
                        <div class="form-filter">
                            <form method="POST" action="?mod=product&act=filter">
                                <select name="select">
                                    <option value="0">Sắp xếp</option>
                                    <option value="1">Từ A-Z</option>
                                    <option value="2">Từ Z-A</option>
                                    <option value="3">Giá cao xuống thấp</option>
                                    <option value="3">Giá thấp lên cao</option>
                                </select>
                                <button type="submit">Lọc</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php
                        if(count($list_sp) > 0){
                        foreach($list_sp as $item){
                        ?>
                        <li>
                            <a href="?mod=products&act=detail&id=<?php echo $item['MaSP'] ?>" title="" class="thumb">
                                <img src="<?php echo $item['Anh'] ?>">
                            </a>
                            <a href="?mod=products&act=detail&id=<?php echo $item['MaSP'] ?>" title="" class="product-name"><?php echo $item['TenSP'] ?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($item['GiaKhuyenMai']) ?></span>
                                <span class="old"><?php echo currency_format($item['GiaGoc']) ?></span>
                            </div>
                            <div class="action clearfix">
                                <a href="?mod=cart&id=<?php echo $item['MaSP'] ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?mod=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <?php
                        }
                        }else{
                            echo "Không có sản phẩm nào!";
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</div>
<?php
require "inc/footer.php";
?>