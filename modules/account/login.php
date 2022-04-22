<?php
ob_start();
session_start();
if(isset($_POST['btn-submit'])){
$username = $_POST['username'];
$password = MD5($_POST['password']);
$sql = "Select * from taikhoan where TenDangNhap = '{$username}' AND MatKhau = '{$password}'";

$result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $user = array();
        $user = mysqli_fetch_assoc($result);
        
    }else echo "Tên đăng nhập không tồn tại hoặc mật khẩu không đúng";
    if(isset($user)){
        $_SESSION['is_login'] = true;
        $_SESSION['is_fullname'] = $user['HoVaTen'];
        redirect();
    }
}
?>
<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Đăng nhập</title>
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="public/account.css">
</head>
<body>
    <section>
     <!--Bắt Đầu Phần Nội Dung-->
     <div class="noi-dung">
         <div class="form login">
             <h2>Trang Đăng Nhập</h2>
             <form action="" method="POST">
                 <div class="input-form">
                     <span>Tên đăng nhập</span>
                     <input type="text" name="username">
                 </div>
                 <div class="input-form">
                     <span>Mật Khẩu</span>
                     <input type="password" name="password">
                 </div>
                 <div class="nho-dang-nhap">
                     <label><input type="checkbox" name=""> Nhớ Đăng Nhập</label>
                 </div>
                 <div class="input-form">
                     <input type="submit" value="Đăng Nhập" name="btn-submit">
                 </div>
                 <div class="input-form">
                     <p>Bạn Chưa Có Tài Khoản? <a href="?mod=account&act=register">Đăng Ký</a></p>
                 </div>
             </form>
         </div>
     </div>
     <!--Kết Thúc Phần Nội Dung-->
 </section>
</body>
</html>