<div class="container-content">
    <h1 class="heading">BẠN ĐÃ QUÊN MẬT KHẨU</h1>

    <div id="login" class="tabcontent">
        <form action="<?= $SITE_URL ?>/account/forgot-mk.php" method="POST" id="form">
            <div class="form-group">
                <p>Tài khoản</p>
                <input type="text" name="ma_kh" placeholder="Username" />
                <p>Email</p>
                <input type="email" name="email" placeholder="Email" require />
                <span class="message"><?= (isset($MESSAGE) && (strlen($MESSAGE) > 0)) ? $MESSAGE : "" ?></span>
            </div>
            <div class="form-submit">
                <button type="submit" class="submit" name="btn_forgot">Lấy mật khẩu</button>
                <span>Bạn chưa có tài khoản? <a href="<?= $SITE_URL ?>/account/register-xuly.php">Đăng ký</a></span>
            </div>
        </form>
    </div>
</div>