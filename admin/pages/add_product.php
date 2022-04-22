<?php
//Lấy danh sách các danh mục sản phẩm
$sql = "SELECT * FROM danhmuc";
$result = mysqli_query($conn, $sql);
$list_danhmuc = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $list_danhmuc[] = $row;
    }
}
//Lấy danh sách các hang sản phẩm
$sql = "SELECT * FROM hang";
$result = mysqli_query($conn, $sql);
$list_hang = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $list_hang[] = $row;
    }
}

//Thêm sản phẩm mới vào database

if (isset($_POST['btn-submit'])) {
    //upload ảnh vào database
    // File upload path
    $target_dir = "uploads/images/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Kiểm tra file ảnh được upload có đúng không
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check == false) {
        $error = "Đây không phải là file ảnh.";
    }
    // Kiểm tra file có tồn tại hay không
    if (file_exists($target_file)) {
        $error =  "File đã tồn tại!!!";
    }
    // Kiểm tra kích thước file
    if ($_FILES["file"]["size"] > 500000) {
        $error =  "Kích thước file quá lớn.";
    }
    // Cho phép các định dạng ảnh
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType !=
        "jpeg"
        && $imageFileType != "gif"
    ) {
        $error =  "Chỉ cho phép upload các file có phần mở rộng là JPG, PNG, GIF và
        JPEG.";
    }
    // Kiểm tra biến uploadOk xem có upload được không
    if (empty($error)) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], "../" . $target_file)) {
            $success =  "Tên file là:" . htmlspecialchars(basename($_FILES["file"]["name"])) . " đã được upload.";
        } else {
            $error =  "Không thể upload file.";
        }
    }

    $TenSP = $_POST['product_name'];
    $SoLuong = $_POST['qty'];
    $GiaGoc = $_POST['price'];
    $GiaKhuyenMai = $_POST['price_1'];
    $MoTaNgan = $_POST['desc'];
    $ChiTiet = $_POST['detail_desc'];
    $Anh = $target_file;
    $MaDM = $_POST['parent_id'];
    $MaHang = $_POST['company'];
    $sql = "INSERT INTO sanpham(TenSp,SoLuong,GiaGoc,GiaKhuyenMai,MoTaNgan,MoTaChiTiet,Anh,MaDM,MaHang) VALUES ('{$TenSP}',{$SoLuong},{$GiaGoc}, {$GiaKhuyenMai},'{$MoTaNgan}','{$ChiTiet}', '{$Anh}', {$MaDM}, {$MaHang})";
    //Kết luận
    if (empty($error)) {
        if (mysqli_query($conn, $sql)) {
            $alert['success'] = "Thêm dữ liệu thành công";
        } else echo mysqli_error($conn);
    }
}
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php require 'inc/sidebar.php'; ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm sản phẩm</h3>
                </div>
                <p class="success" style="color:lawngreen"><?php if (isset($alert)) echo $alert['success'] ?></p>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <label for="product-name">Tên sản phẩm</label>
                        <input type="text" name="product_name" id="product-name" value="<?php if(isset($TenSP))echo $TenSP; ?>">
                        <label for="price">Giá gốc</label>
                        <input type="text" name="price" id="price" value="<?php if(isset($GiaGoc))echo $GiaGoc; ?>">
                        <label for="price_1">Giá khuyến mãi</label>
                        <input type="text" name="price_1" id="price_1" value="<?php if(isset($GiaKhuyenMai))echo $GiaKhuyenMai; ?>">
                        <label for="qty">Số lượng</label>
                        <input type="number" name="qty" id="qty" value="<?php if(isset($SoLuong))echo $SoLuong; ?>">
                        <label for="desc">Mô tả ngắn</label>
                        <textarea name="desc" id="desc" value="<?php if(isset($MoTaNgan))echo $MoTaNgan; ?>"></textarea>
                        <label for="detail_desc">Chi tiết</label>
                        <textarea name="detail_desc" id="detail_desc" class="ckeditor"value="<?php if(isset($ChiTiet))echo $ChiTiet; ?>"></textarea>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="file">
                            <p class="success" style="color:lawngreen"><?php if (isset($success)) echo $success ?></p>
                            <img src="<?php echo isset($targetFilePath) ? $targetFilePath : 'uploads/img-pro-05.png'; ?>">
                        </div>
                        <label>Danh mục sản phẩm</label>
                        <select name="parent_id">
                            <option value="<?php if(isset($MaDM) && $MaDM > 0)echo $MaDM; else echo 0; ?>">-- Chọn danh mục --</option>
                            <?php
                            foreach ($list_danhmuc as $item) {
                                echo "<option value='{$item['MaDM']}'>{$item['TenDM']}</option>";
                            }
                            ?>
                        </select>
                        <label>Hãng sản xuất</label>
                        <select name="company">
                            <option value="<?php if(isset($MaHang) && $MaHang > 0)echo $MaHang; else echo 0; ?>">-- Chọn hãng sản xuất --</option>
                            <?php
                            foreach ($list_hang as $item) {
                                echo "<option value='{$item['MaHang']}'>{$item['TenHang']}</option>";
                            }
                            ?>
                        </select>
                        <button type="submit" name="btn-submit" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>