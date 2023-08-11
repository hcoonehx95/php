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
            <div class="box box-primary">
                <div class="box-body">
                    <form action="?btn_delete_all" method="post" class="table-responsive">
                        <button type="submit" class="btn btn-danger mb-1" id="deleteAll" onclick="return checkDelete()">
                            Xóa mục đã chọn</button>
                        <table width="100%" class="table table-hover table-bordered text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th><input type="checkbox" id="select-all"></th>
                                    <th>Mã KH</th>
                                    <th>Họ và tên</th>
                                    <th>Địa chỉ email</th>
                                    <th>Ảnh</th>
                                    <th>Vai trò</th>
                                    <th>Kích hoạt</th>
                                    <th><a href="index.php" class="btn btn-success text-white">Thêm mới
                                            <i class="fas fa-plus-circle"></i></a></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($items as $item) {
                                    extract($item);
                                    $suakh = "index.php?btn_edit&ma_kh=" . $ma_kh;
                                    $xoakh = "index.php?btn_delete&ma_kh=" . $ma_kh;
                                    $img_path = $UPLOAD_URL . '/users/' . $Image;
                                    if (is_file($img_path)) {
                                        $img = "<img src='$img_path' height='50' width='50' class='rounded-circle object-fit-cover'>";
                                    } else {
                                        $img = "no photo";
                                    }

                                ?>
                                <tr>
                                    <td><input type="checkbox" name="ma_kh[]" value="<?= $ma_kh ?>"></td>
                                    <td><?= $ma_kh ?></td>
                                    <td><?= $ho_ten ?></td>
                                    <td><?= $email ?></td>
                                    <td><?= $img ?></td>
                                    <td><?= ($vaitro == 1) ? "Nhân viên" : "Khách hàng"; ?></td>
                                    <td><?= ($kich_hoat == 1) ? "Rồi" : "Chưa"; ?></td>
                                    <td class="text-end">
                                        <a href="<?= $suakh ?>" class="btn btn-outline-info btn-rounded"><i
                                                class="fas fa-pen"></i></a>
                                        <a href="<?= $xoakh ?>" class="btn btn-outline-danger btn-rounded"
                                            onclick="return checkDelete()"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                                }

                                ?>
                            </tbody>

                        </table>
                        <div class="mt-3" width="100%">
                            <ul class="pagination justify-content-center">
                                <?php for ($i = 1; $i <= $_SESSION['total_page']; $i++) { ?>

                                <li class="page-item <?= $_SESSION['page'] == $i ? 'active' : '' ?>">
                                    <a class="page-link" href="?btn_list&page=<?= $i ?>"><?= $i ?></a>
                                </li>

                                <?php } ?>

                            </ul>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>