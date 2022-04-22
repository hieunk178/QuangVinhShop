<div class="section box-shadow" id="category-product-wp">
    <div class="section-head">
        <h3 class="section-title">Danh mục sản phẩm</h3>
    </div>
    <div class="secion-detail">
        <ul class="list-item">
            <?php
            foreach ($list_danhmuc as $item) {
            ?>
                <li>
                    <a href="?mod=products&id=<?php echo $item['MaDM'] ?>" title=""><?php echo $item['TenDM'] ?></a>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>