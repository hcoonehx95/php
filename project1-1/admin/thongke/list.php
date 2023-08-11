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
        <h1 class="heading">THỐNG KÊ HÀNG HÓA TỪNG LOẠI</h1>
    </div>
    <div class="container">
        <div class="box box-primary">
            <div class="box-body">
                <table width="100%" class="table table-hover table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>LOẠI HÀNG</th>
                            <th>SỐ LƯỢNG</th>
                            <th>GIÁ CAO NHẤT</th>
                            <th>GIÁ THẤP NHẤT</th>
                            <th>GIÁ TRUNG BÌNH</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($items as $item) {
                            extract($item);

                        ?>
                        <tr>
                            <td><?= $ten_loai ?></td>
                            <td><?= $so_luong ?></td>
                            <td>$<?= number_format($gia_min, 0) ?></td>
                            <td>$<?= number_format($gia_max, 0) ?></td>
                            <td>$<?= number_format($gia_avg, 0) ?></td>
                        </tr>
                        <?php
                        }

                        ?>
                    </tbody>
                </table>
                <a href="index.php?chart" class="btn btn-info text-white">Xem biểu đồ<i class="fas fa-eye ml-2"></i></a>
            </div>
        </div>
    </div>
</section>