<?php
function getImagesFromDir($path) {
    $images = array();
    if ( $img_dir = @opendir($path) ) {
    while ( false !== ($img_file = readdir($img_dir)) ) {
    // checks for gif, jpg, png
    if ( preg_match("/(\.gif|\.jpg|\.png)$/", $img_file) ) {
    $images[] = [$path."/".$img_file, $img_file];
    }
    }
    closedir($img_dir);
    }
    return $images;
    }
    $path = "../uploads/images";
    $imgList = getImagesFromDir($path);
    $path = "../uploads/files";
    $imgList += getImagesFromDir($path);
    $path = "../uploads";
    $imgList += getImagesFromDir($path);

    $num_img = count($imgList);
    $numOnPage = 10;
    $numPage = ($num_img/ $numOnPage);
?>
<div id="main-content-wp" class="list-product-page list-slider">
    <div class="wrap clearfix">
        <?php require 'inc/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách media</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">(69)</span></a></li>
                        </ul>
                        <form method="GET" class="form-s fl-right">
                            <input type="text" name="s" id="s">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="actions">
                        <form method="GET" action="" class="form-actions">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="1">Xóa</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Tên file</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $start = isset($_GET['num'])? ($_GET['num']-1)*$numOnPage : 0;
                                $end = isset($_GET['num'])? ($_GET['num']*$numOnPage)-1 : 9;
                                    for($i = $start; $i<= $end; $i++){
                                ?>
                                <tr>
                                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                    <td><span class="tbody-text"><?php echo $i+1?></h3></span>
                                    <td>
                                        <div class="tbody-thumb">
                                            <img src="<?php echo $imgList[$i][0]?>" alt="">
                                        </div>
                                    </td>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="<?php echo $imgList[$i][0]?>" title=""><?php  echo $imgList[$i][1]?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text">Admin</span></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>
                    <?php if($numPage > 1){ ?>
                    <ul id="list-paging" class="fl-right">
                        <li>
                            <a href='?page=list_media&num=<?php echo isset($_GET['num'])? $_GET['num']-1 :1; ?>' title=''><</a>
                        </li>
                        <?php
                        for($index = 1; $index <= $numPage; $index++){
                            echo
                            "<li>
                                <a href='?page=list_media&num=$index' title=''>$index</a>
                            </li>";
                        }
                        ?>
                        <li>
                            <a href='?page=list_media&num=<?php echo isset($_GET['num'])? $_GET['num']+1 :$numPage; ?>' title=''>></a>
                        </li>
                    </ul>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>