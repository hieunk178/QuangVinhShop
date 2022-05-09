<?php
require "inc/header.php";
$vl = array(0,1,2,3,4);
if(isset($_POST['btn-filter'])){
    $list_sp = filter();
    $value = $_POST['select'];
}else{
    if(isset($_GET['id'])){
        $list_sp = get_list_product_by_cat_id($_GET['id'],0);
    }else $list_sp = get_table("sanpham");
}
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
                        if(isset($_GET['id'])){
                            $dm = get_item("danhmuc", "MaDM", $_GET['id']);
                            echo "<a href='' title=''>{$dm['TenDM']}</a>";
                        }else{
                            echo "<a href='' title=''>Sản phẩm</a>";
                        }
                        
                        ?>
                        
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section content" id="list-product-wp">
                <div class="section-head ">
                    <?php
                    if(isset($_GET['id'])){
                        global $dm;
                        echo "<h3 class='section-title fl-left'>{$dm['TenDM']}</h3>";
                    }else{
                        echo "<h3 class='section-title fl-left'>Sản phẩm</h3>";
                    }
                    ?>
                    <div class="filter-wp fl-right">
                        <p class="desc">Hiển thị 45 trên 50 sản phẩm</p>
                        <div class="form-filter">
                            <form method="POST" action="">
                                <select name="select">
                                    <?php
                                        if($value == $vl[0])echo "<option value='{$vl[0]}' selected>Sắp xếp</option>";
                                        else echo "<option value='{$vl[0]}'>Sắp xếp</option>";
                                        if($value == $vl[1])echo "<option value='{$vl[1]}' selected>Từ A-Z</option>";
                                        else echo "<option value='{$vl[1]}'>Từ A-Z</option>";
                                        if($value == $vl[2])echo "<option value='{$vl[2]}' selected>Từ Z-A</option>";
                                        else echo "<option value='{$vl[2]}'>Từ Z-A</option>";
                                        if($value == $vl[3])echo "<option value='{$vl[3]}' selected>Giá cao xuống thấp</option>";
                                        else echo "<option value='{$vl[3]}'>Giá cao xuống thấp</option>";
                                        if($value == $vl[4])echo "<option value='{$vl[4]}' selected>Giá thấp lên cao</option>";
                                        else echo "<option value='{$vl[4]}'>Giá thấp lên cao</option>";
                                    ?>
                                </select>
                                <button type="submit" name="btn-filter">Lọc</button>
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
                                <a href="?mod=cart&act=add&id=<?php echo $item['MaSP'] ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
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