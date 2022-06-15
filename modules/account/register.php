<?php
require "db/connect.php";
require "lib/address.php";

$usernameErr = $emailErr = $phoneErr = $fullnameErr = $addressErr = $genderErr = $passwordErr ="";


if (isset($_POST['btn-register'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $re_password = md5($_POST['re_password']);
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $province = $_POST['province'];
    $district = $_POST['district'];
    $gender = $_POST['gender'];
    $ward = $_POST['ward'];
    $ckpassword = $_POST['password'];
    
    $error = array();
    $address = $_POST['address'].", ".get_address($ward, $district, $province);

    if ($password != $re_password) {
        $error["password"] = "Confirmation password does not match";
        $password = MD5($password);
    } else $success = true;

    if (empty($_POST["username"])) {
        $usernameErr = "Name is required";
     } else {
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
      $usernameErr = "Only letters, white space allowed and number";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
     } else {
    // check if e-mail address is well-formed
    if (!preg_match("/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/",$email)) {
      $emailErr = "Invalid email format";
    }
    }

    if (empty($_POST["phone"])) {
        $phoneErr = "Phone is required";
     } else {
    // check if phone only number
    if (!preg_match("/^[0-9 ]*$/",$phone)) {
      $phoneErr = "Only number";
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
     } else {
    if (strlen($ckpassword) < 6) {
       $passwordErr = "Have at least 6 characters";
        }
    }

    if (empty($_POST["fullname"])) {
        $fullnameErr = "Fullname is required";
     }

     if (empty($_POST['gender'])) {
         $genderErr = "Gender is required";
     }

     if (empty($_POST["address"])) {
        $addressErr = "Address is required";
     }

    if (!empty($success) && empty($usernameErr) && empty($emailErr) && empty($phoneErr) && empty($fullnameErr) && empty($genderErr) && empty($addressErr) && empty($passwordErr) ) {
        $value = "'{$username}', '{$password}', '{$fullname}', '{$phone}', '{$email}' , '{$address}', '{$gender}'" ;
        $sql = "INSERT INTO taikhoan(TenDangNhap, MatKhau, HoVaTen, SDT, Email, DiaChi, GioiTinh) values ($value)";
        
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
                        <span class="error"><?php echo $usernameErr;?></span>
                    </div>
                    <div class="input-form">
                        <span>Mật Khẩu</span><span class="obligatory">*</span>
                        <input type="password" name="password">
                        <span class="error"><?php echo $passwordErr;?></span>
                    </div>
                    <div class="input-form">
                        <span>Nhập lại mật khẩu</span><span class="obligatory">*</span>
                        <input type="password" name="re_password">
                    </div>
                    <div class="input-form">
                        <span>Họ và tên</span><span class="obligatory">*</span>
                        <input type="text" name="fullname">
                        <span class="error"><?php echo $fullnameErr;?></span>
                    </div>
                    <div>
                        <span>Giới tính</span><span class="obligatory">*</span><br><br>
                        <input type="radio" name="gender" checked value="Nam">Nam &emsp;
                        <input type="radio" name="gender" value="Nữ">Nữ &emsp;
                        <input type="radio" name="gender" value="Khác">Khác
                        <span class="error"> <?php echo $genderErr;?></span><br><br>
                    </div>
                    <div class="input-form">
                        <span>Số điện thoại</span><span class="obligatory">*</span>
                        <input type="text" name="phone">
                        <span class="error"><?php echo $phoneErr;?></span>
                    </div>
                    <div class="input-form">
                        <span>Email</span><span class="obligatory">*</span>
                        <input type="text" name="email">
                        <span class="error"><?php echo $emailErr;?></span>
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
                        <span class="error"><?php echo $addressErr;?></span>
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