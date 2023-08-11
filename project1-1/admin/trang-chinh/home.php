<section id="main">
    <div class="main-header">
    <?php if (isset($_SESSION['user']) && $_SESSION['user']['Image'] != "") { ?>
                        <img src=" <?= $UPLOAD_URL . "/users/" . $_SESSION['user']['Image'] ?>" width="30" height="30"
                            class="account-image icon" alt="">
                        <?php } else { ?>
                        <i class="fa fa-user account-icon icon"></i>
                        <?php }  ?>
    </div>
    <div class="content">
        <div class="list-sum">
            <div class="list-item">
                <div class="sum">
                    <h2><?= $loai ?></h2>
                    <span>Danh mục</span>
                </div>
                <i class="fa-solid fa-list"></i>
            </div>
            <div class="list-item">
                <div class="sum">
                    <h2><?= $hang_hoa ?></h2>
                    <span>Sản phẩm</span>
                </div>
                <i class="fa-solid fa-table-list"></i>
            </div>
            <div class="list-item">
                <div class="sum">
                    <h2><?= $khach_hang ?></h2>
                    <span>Khách hàng</span>
                </div>
                <i class="fa-solid fa-users"></i>
            </div>
            <div class="list-item">
                <div class="sum">
                    <h2><?= $binh_luan ?></h2>
                    <span>Bình luận</span>
                </div>
                <i class="fa-solid fa-comment"></i>
            </div>
        </div>
    </div>
</section>