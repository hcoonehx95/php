<section id="main">
    <div class="main-header">
    <div class="account-img">
                        <?php if (isset($_SESSION['user']) && $_SESSION['user']['Image'] != "") { ?>
                        <img src=" <?= $UPLOAD_URL . "/users/" . $_SESSION['user']['Image'] ?>" width="30" height="30"
                            class="account-image icon" alt="">
                        <?php } else { ?>
                        <?php }  ?>
                    </div>
    </div>
    <div class="content">
        <h1 class="heading">DANH SÁCH HOÁ ĐƠN</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header text-center bg-dark text-white text-uppercase">Cập nhật hoá đơn</div>
                    <div class="card-body">
                        <form action="index.php"  method="POST"  enctype="multipart/form-data" id="add_hang_hoa">
                            <div class="row">
                                
                                
                                <div class="form-group col-sm-4">
                                    <label for="Ma_SP" class="form-label">Mã hóa đơn</label>
                                    <input type="text" name="ma_hd" id="ma_hd" readonly class="form-control"
                                        value="<?= $ma_hd; ?>">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="Ten_SP" class="form-label">Mã khách hàng</label>
                                    <input type="text" name="ma_kh" id="ma_kh" class="form-control" value="<?= $ma_kh; ?>">
                                    <small class="text-danger"><?= $ma_kh_error; ?></small>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="Price_Giam" class="form-label">Tổng tiền (vnđ)</label>
                                    <input type="number" name="tong_tien" id="tong_tien" class="form-control" value="<?= $tong_tien; ?>">
                                    <small class="text-danger"><?= $tong_tien_error; ?></small>
                                </div>
                            </div>
                            
                            <div class="row">

                            </div>
                            <div class="row">
                                
                                <div class="form-group col-sm-4">
                                    <?php $today = date_format(date_create(), 'Y-m-d'); ?>
                                    <label for="ngay_nhap" class="form-label">Ngày nhập</label>
                                    <input type="date" name="ngay_mua" id="ngay_mua" class="form-control"
                                        value="<?= $today ?>">
                                        <small class="text-danger"><?= $ngay_mua_error; ?></small>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="giao_hang" class="form-label">Giao hàng</label>
                                    <select name="giao_hang" class="form-control" id="giao_hang">
                                        
                                        
                                        <option value="NO">Chưa giao hàng</option>
                                        <option value="YES">Đang giao hàng</option>

                                    </select>
                                    <small class="text-danger"></small>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="thanh_toan" class="form-label">Thanh Toán</label>
                                    <select name="thanh_toan" class="form-control" id="thanh_toan">
                                        
                                        
                                        <option value="NO">Chưa thanh toán</option>
                                        <option value="YES">Đã thanh toán</option>

                                    </select>
                                    <small class="text-danger"></small>
                                </div>
                               
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="ghi_chu" class="form-label">Ghi chú</label>
                                    <textarea id="txtarea" spellcheck="false" name="ghi_chu"
                                        class="form-control form-control-lg mb-3" id="textareaExample"
                                        rows="3" ><?= $ghi_chu; ?></textarea>
                                        <small class="text-danger"><?= $ghi_chu_error; ?></small>
                                </div>
                            </div>

                            <div class="mb-3 text-center">
                                <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                                <input type="submit" name="btn_update" value="Cập nhật" class="btn btn-primary mr-3">
                                <a href="index.php?btn_list"><input type="button" class="btn btn-success"
                                        value="Danh sách"></a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>