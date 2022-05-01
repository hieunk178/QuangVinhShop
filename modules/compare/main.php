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
                        <p class="lable">Chọn sản phẩm so sánh</p>
                        <a id="filter1" class="btn_select"> <i class="fa fa-angle-down"></i></a>
                    </th>
                    <th></th>
                    <th class="select-product right">
                        <p class="lable">Chọn sản phẩm so sánh</p>
                        <a id="filter2" class="btn_select"> <i class="fa fa-angle-down"></i></a>
                    </th>
                </thead>
                <tbody>
                    <td class="product product-left"></td>
                    <td></td>
                    <td class="product product-right"></td>
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