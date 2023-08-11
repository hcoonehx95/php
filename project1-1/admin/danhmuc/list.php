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
            <div class="box box-primary">
                <div class="box-body">
                    <form action="?btn_delete_all" method="post" class="table-responsive">

                        <table width="100%" class="table table-hover table-bordered text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th><input type="checkbox" id="select-all"></th>
                                    <th>Mã loại</th>
                                    <th>Tên loại</th>
                                    <th><a href="index.php" class="btn btn-success text-white">Thêm mới
                                            <i class="fas fa-plus-circle"></i></a></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($items as $item) {
                                    extract($item);
                                    $suadm = "index.php?btn_edit&ma_loai=" . $ma_loai;
                                    $xoadm = "index.php?btn_delete&ma_loai=" . $ma_loai;

                                ?>
                                <tr>
                                    <td><input type="checkbox" name="ma_loai[]" value="<?= $ma_loai ?>"></td>
                                    <td><?= $ma_loai ?></td>
                                    <td><?= $ten_loai ?></td>
                                    <td class="text-end">
                                        <a href="<?= $suadm ?>" class="btn btn-outline-info btn-rounded"><i
                                                class="fas fa-pen"></i></a>
                                        <a href="<?= $xoadm ?>" class="btn btn-outline-danger btn-rounded"
                                            onclick="return confirm('Bạn có muốn xóa không?')"><i
                                                class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                                }

                                ?>
                            </tbody>

                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>