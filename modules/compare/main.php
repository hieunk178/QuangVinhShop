<?php
require "inc/header.php";
?>
<div id="main-content-wp" class="clearfix blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">So sánh giá</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content-compare">
            <table class="compare">
                <thead>
                    <th class="select-product left">
                        <p class="lable">Quạt sưởi gốm Mutosi MCH-2000L</p>
                        <a id="filter1" class="btn_select"> <i class="fa fa-angle-down"></i></a>
                    </th>
                    <th></th>
                    <th class="select-product right">
                        <p class="lable">Quạt sưởi gốm Mutosi MCH-2000L</p>
                        <a id="filter2" class="btn_select"> <i class="fa fa-angle-down"></i></a>
                    </th>
                </thead>
                <tbody>
                    <td class="product">
                        <a href="?mod=products&act=detail&id=1" title="" class="thumb">
                            <img src="uploads/MPTS100.png">
                        </a>
                        <div class="product-content">
                            <div class="price">
                                <span class="new"><?php echo currency_format(9500000) ?></span>
                                <span class="old"><?php echo currency_format(9500000) ?></span>
                            </div>
                            <div class="action clearfix">
                                <a href="?mod=cart&id=<?php echo $item['MaSP'] ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?mod=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                            <hr />
                            <div class="desc">
                                <h3>Đặc điểm nổi bật</h3>
                                <p>Mô tả 1</p>
                                <p>Mô tả 1</p>
                                <p>Mô tả 1</p>
                                <p>Mô tả 1</p>
                                <p>Mô tả 1</p>
                            </div>
                            <hr>
                            <div class="parameter">

                            </div>
                        </div>
                    </td>
                    <td></td>
                    <td class="product">
                        <a href="?mod=products&act=detail&id=1" title="" class="thumb">
                            <img src="uploads/MPTS100.png">
                        </a>
                        <div class="product-content">
                            <div class="price">
                                <span class="new"><?php echo currency_format(9500000) ?></span>
                                <span class="old"><?php echo currency_format(9500000) ?></span>
                            </div>
                            <div class="action clearfix">
                                <a href="?mod=cart&id=<?php echo $item['MaSP'] ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?mod=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                            <hr />
                            <div class="desc">
                                <h3>Đặc điểm nổi bật</h3>
                                <p>Mô tả 1</p>
                                <p>Mô tả 1</p>
                                <p>Mô tả 1</p>
                                <p>Mô tả 1</p>
                                <p>Mô tả 1</p>
                            </div>
                            <hr>
                            <div class="parameter">

                            </div>
                        </div>
                    </td>
                </tbody>
            </table>
            <div class="select select1">
                <input type='text' placeholder='Tìm Kiếm' id='search'>
                <ul class='content'></ul>
            </div>
            <div class="select select2">
                <input type='text' placeholder='Tìm Kiếm' id='search'>
                <ul class='content'></ul>
            </div>
        </div>
    </div>
</div>
<script>
    //Compare
    $("#filter1").click(function() {
        $(".select.select1").slideToggle(200);
    });
    $("#filter2").click(function() {
        $(".select.select2").slideToggle(200);
    });
</script>
<?php
require "inc/footer.php";
?>