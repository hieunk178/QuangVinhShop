    <?php
    require "inc/header.php";
    $user = get_item("taikhoan", "Id_User", "{$_SESSION['id_user']}");
    ?>
    <section>
     <!--Bắt Đầu Phần Nội Dung-->
     <div class="noi-dung">
         <div class="form">
             <h2>Thông tin tài khoản</h2>
             <form action="">
                 <div class="input-form">
                     <span>Tên Đăng Nhập</span>
                     <input type="text" name="" value="<?php echo isset($user['TenDangNhap'])?$user['TenDangNhap']:"" ?>">
                 </div>
             	<div class="input-form">
                     <span>Họ tên</span>
                     <input type="text" name="" value="<?php echo isset($user['HoVaTen'])?$user['HoVaTen']:"" ?>">
                 </div>
                <div class="input-form">
                     <span>Giới tính</span>
                     <input type="text" name="" value="<?php echo isset($user['GioiTinh'])?$user['GioiTinh']:"" ?>">
                 </div>
                 <div class="input-form">
                     <span>Số điện thoại</span>
                     <input type="text" name="" value="<?php echo isset($user['SDT'])?$user['SDT']:"" ?>">
                 </div>
                 <div class="input-form">
                     <span>Địa chỉ</span>
                     <input type="text" name="" value="<?php echo isset($user['DiaChi'])?$user['DiaChi']:"" ?>">
                 </div>
                 <div class="input-form">
                     <p><a href="?mod=account&act=changePassword">Đổi mật khẩu</a></p>
                 </div>
             </form>
         </div>
     </div>
     <!--Kết Thúc Phần Nội Dung-->
 </section>
    <?php
    require "inc/footer.php";
    ?>