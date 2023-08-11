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
        <h1 class="heading">DANH SÁCH KHÁCH HÀNG</h1>
        <div class="container-content">
            <div class="container">
                <div class="page-title">
                    <h4 class="mt-5 font-weight-bold text-center">Tổng hợp bình luận</h4>
                </div>
                <div class="box box-primary">
                    <div class="box-body">
                        <table width="100%" class="table table-hover table-bordered text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Số bình luận</th>
                                    <th>Cũ nhất</th>
                                    <th>Mới nhất</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($items as $item) {
                                    extract($item);

                                ?>
                                <tr>
                                    <td><?= $Ten_SP ?></td>
                                    <td><?= $so_luong ?></td>
                                    <td><?= $cu_nhat ?></td>
                                    <td><?= $moi_nhat ?></td>
                                    <td class="text-end">
                                        <a href="../comment/index.php?Ma_SP=<?= $Ma_SP ?>"
                                            class="btn btn-outline-info btn-rounded">Chi tiết <i
                                                class="fas fa-info-circle"></i></i></a>
                                    </td>
                                </tr>
                                <?php
                                }

                                ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>