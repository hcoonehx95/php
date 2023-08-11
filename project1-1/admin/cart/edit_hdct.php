<?php


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
                    <div class="card-header text-center bg-dark text-white text-uppercase">Cập nhật HDCT</div>
                    <div class="card-body">
                        <form action="index.php?btn_img_add" method="POST" enctype="multipart/form-data"
                            id="update_hang_hoa">
                            <div class="row">
                            <div class="form-group col-sm-4">
                                    <label for="Ma_SP" class="form-label">Mã hóa đơn chi tiết</label>
                                    <input type="text" name="ma_hdct" id="ma_hdct" readonly class="form-control"
                                        value="<?= $ma_hdct; ?>">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="Ma_SP" class="form-label">Mã hóa đơn</label>
                                    <input type="text" name="ma_hd" id="ma_hd" readonly class="form-control"
                                        value="<?= $ma_hd; ?>">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="Ten_SP" class="form-label">Mã SP</label>
                                    <input type="text" name="Ma_SP" id="Ma_SP" class="form-control" value="<?= $Ma_SP; ?>">
                                    <small class="text-danger"><?= $Ma_SP_error; ?></small>
                                </div>
                                
                            </div>
                            <div class="row">
                            <div class="form-group col-sm-4">
                                    <label for="Price_Giam" class="form-label">Số lượng</label>
                                    <input type="number" name="so_luong" id="so_luong" class="form-control" value="<?= $so_luong; ?>">
                                    <small class="text-danger"><?= $so_luong_error; ?></small>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="size" class="form-label">Size</label>
                                    <select name="size" id="size" class="form-control">
                                        <option value="s">S</option>
                                        <option value="m">M</option>
                                        <option value="l">L</option>
                                        <option value="xl">XL</option>
                                    </select>
                                    <small class="text-danger"><?= $size_error; ?></small>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="Price_Giam" class="form-label">Màu</label>
                                    <input type="text" name="mau" id="mau" class="form-control" value="<?= $mau; ?>">
                                    <small class="text-danger"><?= $mau_error; ?></small>
                                </div>
                              
                            </div>
                            <div class="row">


                            </div>
                            

                            <div class="mb-3 text-center">
                                <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                                <input type="submit" name="btn_hdct_update" value="Cập nhật" class="btn btn-primary mr-3">
                                <a href="?hdct.php&&ma_hd="<?= $ma_hd?>"><input type="button" class="btn btn-success"
                                        value="Danh sách"></a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>