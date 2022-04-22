<?php
require "db/connect.php";
require "lib/address.php";
if (isset($_POST['btn-register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $province = $_POST['province'];
    $district = $_POST['district'];
    $ward = $_POST['ward'];
    $address = $_POST['address'];
    $error = array();
    if ($password != $re_password) {
        $error[] = "Mật khẩu xác nhận không trùng khớp";
        $password = MD5($password);
    } else $success = true;
    if (!empty($success)) {
        $value = "'{$username}', 'MD5({$password})', '{$fullname}', '{$phone}', '{$province}', '{$district}', '{$ward}', '{$address}'";
        $sql = "INSERT INTO taikhoan(TenDangNhap, MatKhau, HoVaTen, SDT, id_province, id_district, id_ward, DiaChi) value ($value)";
        echo $sql;
        if(mysqli_query($conn,$sql)){
        header("Location: ?mod=account&act=login");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/account.css">

    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</head>

<body>
    <script>
        $(function() {
            $("#province").change(function() {
                var Id_Prov = $("#province").val();
                var District = $("#district");
                $.ajax({
                    url: "?mod=account&act=result",
                    method: 'POST',
                    data: {
                        id_prov: Id_Prov
                    },
                    dataType: "text",
                    success: function(result) {
                        District.html(result);
                    }
                });
            });
            $("#district").change(function() {
                var Id_Dist = $("#district").val();
                var ward = $("#ward");
                $.ajax({
                    url: "?mod=account&act=result",
                    method: 'POST',
                    data: {
                        id_dist: Id_Dist
                    },
                    dataType: "text",
                    success: function(result) {
                        ward.html(result);
                    }
                });
            });
        });
    </script>

    <section>
        <!--Bắt Đầu Phần Nội Dung-->
        <div class="noi-dung">
            <div class="form">
                <h2>Trang Đăng Ký</h2>
                <p class="error"><?php echo isset($error[0]) ? $error[0] : "" ?></p>
                <form action="" method="POST">
                    <div class="input-form">
                        <span>Tên Đăng Nhập</span><span class="obligatory">*</span>
                        <input type="text" name="username">
                    </div>
                    <div class="input-form">
                        <span>Mật Khẩu</span><span class="obligatory">*</span>
                        <input type="password" name="password">
                    </div>
                    <div class="input-form">
                        <span>Nhập lại mật khẩu</span><span class="obligatory">*</span>
                        <input type="password" name="re_password">
                    </div>
                    <div class="input-form">
                        <span>Họ và tên</span><span class="obligatory">*</span>
                        <input type="text" name="fullname">
                    </div>
                    <div class="input-form">
                        <span>Số điện thoại</span><span class="obligatory">*</span>
                        <input type="text" name="phone">
                    </div>
                    <div class="input-form">
                        <span>Tỉnh/ Thành Phố</span><br>
                        <select name="province" required="" id="province">
                            <option value="">Tỉnh / Thành phố</option>
                            <?php
                            $provinces = get_provinces();
                            foreach ($provinces as $province) {
                                echo "<option value='{$province['id']}'>{$province['_name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class=input-form>
                        <span>Quận / Huyện</span><br>
                        <select name="district" required="" id="district">
                            <option value="">Quận / Huyện</option>
                        </select>
                    </div>
                    <div class=input-form>
                        <span>Phường / Xã</span><br>
                        <select name="ward" required="" id="ward">
                            <option value="">Phường / Xã</option>
                        </select>
                    </div>
                    <div class="input-form">
                        <span>Địa chỉ</span><span class="obligatory">*</span>
                        <input type="text" name="address">
                    </div>
                    <div class="input-form">
                        <input type="submit" value="Đăng Ký" name="btn-register">
                    </div>
                    <div class="input-form">
                        <p>Bạn Đã Có Tài Khoản? <a href="?mod=account&act=login">Đăng nhập</a></p>
                    </div>
                </form>
            </div>
        </div>
        <!--Kết Thúc Phần Nội Dung-->
    </section>
</body>

</html>