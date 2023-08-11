<div class="container">
<h1 class="heading">CẬP NHẬT TÀI KHOẢN</h1>
<div class="content-update">
    <div class="content-img">
        <img src="<?= $UPLOAD_URL . '/users/' . $Image ?>" alt="">
    </div>
    <div class="content-main">
        <form action="<?= $SITE_URL . '/account/cap-nhat-tk.php' ?>" class="form-update" method="POST"
            enctype="multipart/form-data">
            <div class="form-group ">
                <label for="" class="title-update">Tên đăng nhập</label>
                <input type="text" name="ma_kh" id="ma_kh" class="form-control" value="<?= $ma_kh; ?>" readonly
                    >
                    <span class="message"><?= $ma_kh_error; ?></span>
            </div>
            <div class="form-group form">
                <label for="" class="title-update">Họ và tên</label>
                <input type="text" name="ho_ten" id="ho_ten" class="form-control" value="<?= $ho_ten; ?>"
                    >
                    <small class="text-danger"><?= $ho_ten_error; ?></small> 
            </div>
            <div class="form-group">
                <label for="" class="title-update">Địa chỉ email</label>
                <input type="text" name="email" id="email" class="form-control" value="<?= $email; ?>"
                    aria-describedby="helpId">
                    <small class="text-danger"><?= $email_error; ?></small> 
            </div>
            <div class="form-group">
                <label for="" class="title-update">Số điện thoại</label>
                
                <input type="text" name="sdt" id="sdt" class="form-control" value="<?= $sdt; ?>" />
                <span class="message"><?= $sdt_error; ?></span>
                <p>Tỉnh/Thành phố</p>
                    
                    <input type="text"class="form-control" name="city" id="city" value="<?= $tinh_thanhpho; ?>">
                    <span class="message"><?= $tinh_thanhpho_error ?></span>    

                    <p>Quận/Huyện</p>           
                    
                    <input type="text"class="form-control"name="district" id="district"value="<?= $quan_huyen; ?>">
                    <span class="message"><?= $quan_huyen_error ?></span>
                    <p>Xã/Phường</p>
                    
                    <input type="text"class="form-control"name="ward" id="ward" value="<?= $xa_phuong; ?>">
                    <span class="message"><?= $xa_phuong_error ?></span>
                
                <p>Địa chỉ</p>
                <input type="text" class="form-control" name="dia_chi" id="dia_chi"  value="<?= $dia_chi; ?>" />
                <span class="message"><?= $dia_chi_error; ?></span>
                <span class="message"><?= $loi; ?></span>
            </div>
                
            <div class="form-group">
                <label for="" class="title-update">Ảnh đại diện</label>
                <input type="file" name="Image" id="Image" class="form-control" >
                <small class="text-danger"><?= $Image_error; ?></small> 
            </div>
            <input name="vaitro" id="vaitro" value="<?= $vaitro; ?>" type="hidden">
            <input name="kich_hoat" id="kich_hoat" value="<?= $kich_hoat; ?>" type="hidden">
            <input name="mat_khau" id="mat_khau" value="<?= $mat_khau; ?>" type="hidden">
            <span class="message"><?= $mau_khau_error ;?></span>
            
            <input name="hinh" value="<?= $Image; ?>" type="hidden">
            
            <div class="form-group">
                <button type="submit" name="btn_update" class="submit">Cập
                    nhật</button>
            </div>
        </form>
    </div>
</div>
</div>