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
                        <a href="" title="">Khuyến mãi</a>
                    </li>
                </ul>
            </div>
            <div class="section-detail promotion">
                <?php
                $list_cat = get_table("danhmuc");
                foreach($list_cat as $item){
                    echo "<a href=''>{$item['TenDM']}</a>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
require "inc/footer.php";
?>