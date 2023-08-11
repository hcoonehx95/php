<?php
$Image_select=img_select_one_by_MaSP($Ma_SP);
extract($Image_select);
$img_path = $UPLOAD_URL . '/products/' . $Image;
if (is_file($img_path)) {
    $img = "<img src='$img_path' height='80'>";
} else {
    $img = "no photo";
}

?>
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
        <h1 class="heading">DANH SÁCH LOẠI HÀNG</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header text-center bg-dark text-white text-uppercase">Cập nhật hàng hóa</div>
                    <div class="card-body">
                        <form action="index.php?btn_update" method="POST" enctype="multipart/form-data"
                            id="update_hang_hoa">
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    <label for="ma_loai" class="form-label">Loại hàng</label>
                                    <select name="ma_loai" class="form-control" id="ma_loai">
                                        <?php

                                        foreach ($loai_hang as $loai_hang) {
                                            extract($loai_hang);
                                            if ($ma_loai == $product_info['ma_loai']) {
                                                $s = "selected";
                                            } else {
                                                $s = "";
                                            }
                                            echo '<option ' . $s . ' value="' . $ma_loai . '">' . $ten_loai . '</option>';
                                        }

                                        ?>

                                    </select>
                                    <small class="text-danger"><?= $ma_loai_error; ?></small>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="Ten_SP" class="form-label">Tên hàng hóa</label>
                                    <input type="text" name="Ten_SP" id="Ten_SP" class="form-control" required
                                        value="<?= $Ten_SP ?>">
                                        <small class="text-danger"><?= $Ten_SP_error; ?></small>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="Ma_SP" class="form-label">Mã hàng hóa</label>
                                    <input type="text" name="Ma_SP" id="Ma_SP" readonly class="form-control"
                                        value="<?= $Ma_SP ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    <div class="row align-items-center">
                                        <div class="col-sm-8">
                                            <label for="Image" class="form-label">Ảnh đại diện sản phẩm</label>
                                            <input type="file" name="Image" id="Image" class="form-control"
                                            value="<?= $img ?>">

                                        </div>
                                        <div class="col-sm-4">
                                            <!-- Ảnh sản phẩm ban đầu -->
                                            <input  type="hidden" name="id" id="id" readonly class="form-control" value="<?=$id?>">
                                            <?= $img ?>
                                            

                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="Price" class="form-label">Đơn giá (vnđ)</label>
                                    <input type="text" name="Price" id="Price" class="form-control"
                                        value="<?= $Price ?>">
                                        <small class="text-danger"><?= $Price_error; ?></small>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="Price_Giam" class="form-label">Giảm giá (vnđ)</label>
                                    <input type="text" name="Price_Giam" id=" Price_Giam" class="form-control" required
                                        value="<?= $Price_Giam ?>">
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
                                            <input type="radio" value="1" name="dac_biet"
                                                <?= $dac_biet ? 'checked' : '' ?>>Đặc
                                            biệt
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" value="0" name="dac_biet"
                                                <?= !$dac_biet ? 'checked' : '' ?>>Bình thường
                                        </label>
                                        
                                    </div>
                                    <small class="text-danger"><?= $dac_biet_error; ?></small>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="ngay_nhap" class="form-label">Ngày nhập</label>
                                    <input type="date" name="ngay_nhap" id="ngay_nhap" class="form-control" required
                                        value="<?= $ngay_nhap ?>">
                                        <small class="text-danger"><?= $ngay_nhap_error; ?></small>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="so_luot_xem" class="form-label">Số lượt xem</label>
                                    <input type="text" name="so_luot_xem" id="so_luot_xem" class="form-control" required
                                        value="<?= $so_luot_xem ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="mo_ta" class="form-label">Mô tả sản phẩm</label>
                                    <textarea id="txtarea" spellcheck="false" name="mo_ta"
                                        class="form-control form-control-lg mb-3" id="textareaExample"
                                        rows="3"><?= $Mota ?></textarea>
                                        <small class="text-danger"><?= $Mota_error; ?></small>
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