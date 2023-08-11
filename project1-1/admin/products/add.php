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
        <h1 class="heading">DANH SÁCH SẢN PHẨM</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header text-center bg-dark text-white text-uppercase">Thêm mới hàng hóa</div>
                    <div class="card-body">
                        <form action="index.php"  method="POST"  enctype="multipart/form-data" id="add_hang_hoa">
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    <label for="ma_loai" class="form-label">Loại hàng</label>
                                    <select name="ma_loai" class="form-control" id="ma_loai">
                                        <?php
                                        
                                        foreach ($loai_hang as $loai_hang) {
                                            extract($loai_hang);
                                            echo '<option value="' . $ma_loai . '">' . $ten_loai . '</option>';
                                        }

                                        ?>

                                    </select>
                                    <small class="text-danger"><?= $ma_loai_error; ?></small>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="Ten_SP" class="form-label">Tên hàng hóa</label>
                                    <input type="text" name="Ten_SP" id="Ten_SP" class="form-control">
                                    <small class="text-danger"><?= $Ten_SP_error; ?></small>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="Ma_SP" class="form-label">Mã hàng hóa</label>
                                    <input type="text" name="Ma_SP" id="Ma_SP" readonly class="form-control"
                                        value="auto number">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    <label for="Image" class="form-label">Ảnh sản phẩm</label>
                                    <input type="file" name="Image[]" id="Image" class="form-control" multiple="multiple">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="Price" class="form-label">Đơn giá (vnđ)</label>
                                    <input type="number" name="Price" id="Price" class="form-control">
                                    <small class="text-danger"><?= $Price_error; ?></small>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="Price_Giam" class="form-label">Giảm giá (vnđ)</label>
                                    <input type="number" name="Price_Giam" id="Price_Giam" class="form-control">
                                    <small class="text-danger"><?= $Price_Giam_error; ?></small>
                                </div>
                            </div>
                            <div class="row">

                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    <label>Hàng đặc biệt?</label>
                                    <div class="form-control">
                                        <label class="radio-inline  mr-3">
                                            <input type="radio" value="1" name="dac_biet">Đặc biệt
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" value="0" name="dac_biet" checked>Bình thường
                                        </label>
                                        <small class="text-danger"><?= $dac_biet_error; ?></small>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <?php $today = date_format(date_create(), 'Y-m-d'); ?>
                                    <label for="ngay_nhap" class="form-label">Ngày nhập</label>
                                    <input type="date" name="ngay_nhap" id="ngay_nhap" class="form-control"
                                        value="<?= $today ?>">
                                        <small class="text-danger"><?= $ngay_nhap_error; ?></small>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="so_luot_xem" class="form-label">Số lượt xem</label>
                                    <input type="text" name="so_luot_xem" id="so_luot_xem" readonly class="form-control"
                                        value="0">
                                        
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="Mota" class="form-label">Mô tả sản phẩm</label>
                                    <textarea id="txtarea" spellcheck="false" name="mo_ta"
                                        class="form-control form-control-lg mb-3" id="textareaExample"
                                        rows="3"></textarea>
                                        <small class="text-danger"><?= $Mota_error; ?></small>
                                </div>
                            </div>

                            <div class="mb-3 text-center">
                                <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                                <input type="submit" name="btn_insert" value="Thêm mới" class="btn btn-primary mr-3">
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