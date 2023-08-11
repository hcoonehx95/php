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
        <div class="container-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header text-center bg-dark text-white text-uppercase">Thêm danh mục</div>
                        <div class="card-body">
                            <form action="index.php" method="POST" id="add_loai">
                                <div class="mb-3">
                                    <label for="ma_loai" class="form-label">Mã loại</label>
                                    <input type="text" name="ma_loai" class="form-control" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="ten_loai" class="form-label">Tên loại</label>
                                    <input type="text" name="ten_loai" class="form-control" required>
                                </div>
                                <div class="mb-3 text-center">
                                    <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                                    <input type="submit" name="btn_insert" value="Thêm mới"
                                        class="btn btn-primary mr-3">
                                    <a href="index.php?btn_list"><input type="button" class="btn btn-success"
                                            value="Danh sách"></a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>