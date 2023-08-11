
<h1 class="heading">ĐỔI MẬT KHẨU</h1>

<div class="content-doi-mk">
<div class="container">
    <form action="<?= $SITE_URL ?>/account/doi-mk.php" method="POST" id="form_doi_mk">

        <div class="form-group">
            <label for="email" class="form-label">Tài khoản(tên đăng nhập)</label>
            <input name="ma_kh" class="form-control" placeholder="Username" readonly type="text"
                value="<?= $_SESSION['user']['ma_kh'] ?>">
                <small class="text-danger"><?= $ma_kh_error; ?></small>    
        </div> <!-- form-group// -->

        <div class="form-group">
            <label for="password" class="form-label">Mật khẩu cũ</label>
            <input name="mat_khau" class="form-control" placeholder="Mật khẩu cũ" type="password">
            <small class="text-danger"><?= $mat_khau_cu_error; ?></small> 
        </div> <!-- form-group// -->

        <div class="form-group">
            <label for="password" class="form-label">Mật khẩu mới</label>
            <input name="mat_khau2" class="form-control" placeholder="Username" type="password" id="mat_khau2">
            <small class="text-danger"><?= $mat_khat_moi1_error; ?></small> 
        </div> <!-- form-group// -->

        <div class="form-group">
            <label for="password" class="form-label">Xác nhân mật khẩu mới</label>
            <input name="mat_khau3" class="form-control" placeholder="Username" type="password">
            <small class="text-danger"><?= $mau_khau_moi2_error; ?></small> 
        </div> <!-- form-group// -->

        <div class="form-group">
            <button type="submit" name="btn_change" class="submit"> Đổi mật khẩu </button>
        </div> <!-- form-group// -->
    </form>

    </div>
</div>
