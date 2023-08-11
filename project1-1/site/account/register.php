<div class="container-content">
    <h1 class="heading">ĐĂNG KÝ</h1>
    <div id="register" class="tabcontent">
        <form action="<?= $SITE_URL ?>/account/register-xuly.php" method="POST" enctype="multipart/form-data" id="form">
            <div class="form-group">
                <p>Họ và tên</p>
                <input type="text" name="ho_ten" placeholder="Họ tên">
                <span class="message"><?= $ho_ten_error ?></span>
                <p>Tên đăng nhập</p>
                <input type="text" name="ma_kh" placeholder="Username" />
                <span class="message"><?= $ma_kh_error ?></span>
                <p>Mật khẩu</p>
                <div class="box-password">
                    <input type="password" name="mat_khau" placeholder="Password" class="password" />
                    <i class="fa fa-eye eye"></i>
                </div>
                <span class="message"><?= $mau_khau_error ?></span>
                <p>Nhập lại mật khẩu</p>
                 <input type="password" name="mat_khau2" placeholder="Password" class="password" />
                <span class="message"><?= $mau_khau2_error ?></span>
                <p>Email</p>
                <input type="text" name="email" placeholder="Email" require />
                <span class="message"><?= $email_error ?></span>
                <p>Số điện thoại</p>
                <input type="text" name="sdt" placeholder="Số điện thoại" />
                <span class="message"><?= $sdt_error ?></span>
                    <p>Tỉnh/Thành phố</p>
                    
                    <input type="text"class="form-control" name="city" id="city" placeholder="Tỉnh-thành phố">
                    <span class="message"><?= $tinh_thanhpho_error ?></span>    

                    <p>Quận/Huyện</p>           
                    
                    <input type="text"class="form-control"name="district" id="district" placeholder="Quận-huyện">
                    <span class="message"><?= $quan_huyen_error ?></span>
                    <p>Xã/Phường</p>
                    
                    <input type="text"class="form-control"name="ward" id="ward" placeholder="Xã-Phường">
                    <span class="message"><?= $xa_phuong_error ?></span>
                
                <p>Địa chỉ</p>
                <input type="text" name="dia_chi" placeholder="Địa chỉ" require />
                <span class="message"><?= $dia_chi_error ?></span>
                <p>Ảnh đại diện</p>
                <input type="file" name="Image" placeholder="Ảnh đại diện">
                <span class="message"><?= $Image_error ?></span>
                <input type="hidden" name="kich_hoat" value="1">
                <input type="hidden" name="vaitro" value="0">
                <span class="message"><?= $MESSAGE ?></span>
            </div>
            <div class="form-submit">
                <button class="submit" name="btn_register">ĐĂNG KÝ</button>
                <span>Bạn đã có tài khoản? <a href="<?= $SITE_URL ?>/account/dangnhap.php">Đăng nhập</a></span>
            </div>
        </form>
    </div>
</div>