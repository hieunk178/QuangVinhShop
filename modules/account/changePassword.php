<?php 
session_start();
require "db/connect.php";
$errorOld = $errorNew = $passwordErr = "";
    $user = get_item("taikhoan","Id_User",$_SESSION['id_user']);
	$name = $user['TenDangNhap'];
	$pass = $user['MatKhau'];
	if(isset($_POST['btn-submit']))
	{
		$oldpass = md5($_POST['oldpassword']);
		$newpass = md5($_POST['newpassword']);
		$cknewpass = $_POST['newpassword'];
		$repass = md5($_POST['repassword']);
		if($pass != $oldpass)
		{
			$errorOld = "Old password is not correct";
		}
		if (empty($_POST["newpassword"])) {
        	$passwordErr = "Password is required";
    	 } else {
    		if (strlen($cknewpass) < 6) {
     	 	$passwordErr = "Have at least 6 characters";
       	 }
    	}
		if($newpass != $repass)
		{
			$errorNew = "Confirmation password does not match";
		}

		if(empty($errorNew) && empty($errorOld) && empty($passwordErr))
		{
			$sql = "UPDATE taikhoan SET MatKhau = '{$newpass}' where TenDangNhap = '{$name}'";
			$result = mysqli_query($conn, $sql);
			echo "Successfully";
            echo "<script>alert('Đổi mật khẩu thành công!')</script>";
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
         <div class="form">
             <h2>Trang đổi mật khẩu</h2>
             <form action="" method="POST">
                 <div class="input-form">
                     <span>Tên đăng nhập</span>
                     <input type="text" name="username" value="<?php echo $name ;?>">
                 </div>
                 <div class="input-form">
                     <span>Mật khẩu cũ</span>
                     <input type="password" name="oldpassword" value="">
                     <span class="error"> <?php echo $errorOld;?></span><br><br>
                 </div>
                 <div class="input-form">
                     <span>Mật khẩu mới</span>
                     <input type="password" name="newpassword" value="">
                     <span class="error"> <?php echo $passwordErr;?></span><br><br>
                 </div>
                 <div class="input-form">
                     <span>Nhập lại mật khẩu mới</span>
                     <input type="password" name="repassword" value="">
                     <span class="error"> <?php echo $errorNew;?></span><br><br>
                 </div>
                 <div class="input-form">
                     <input type="submit" value="Đổi mật khẩu" name="btn-submit">
                 </div>
             </form>
         </div>
     </div>
     <!--Kết Thúc Phần Nội Dung-->
 </section>
</body>
</html>

