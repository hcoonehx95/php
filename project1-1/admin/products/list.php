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
        <div class="page-title">
            <?php
            if (isset($MESSAGE) && (strlen($MESSAGE) > 0)) {
                echo '<h5 class="alert alert-warning">' . $MESSAGE . '</h5>';
            }
            ?>
        </div>
        <div class="box box-primary">
            <div class="box-body">
                <form action="?btn_delete_all" method="post" class="table-responsive">
                    <table width="100%" class="table table-hover table-bordered text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th><input type="checkbox" id="select-all"></th>
                                <th>Mã HH</th>
                                <th>Tên hàng hóa</th>
                                <th>Ảnh</th>
                                <th>Đơn giá</th>
                                <th>Giảm giá</th>
                                <th>Lượt xem</th>
                                <th>Ngày nhập</th>
                                <th>Đặc biệt?</th>
                                <th><a href="index.php" class="btn btn-success text-white">Thêm mới
                                        <i class="fas fa-plus-circle"></i></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($items as $item) {
                                extract($item);
                                $xemhh = "index.php?btn_img&Ma_SP=".$Ma_SP;
                                $suahh = "index.php?btn_edit&Ma_SP=" . $Ma_SP;
                                $xoahh = "index.php?btn_delete&Ma_SP=" . $Ma_SP;
                                $Image_select=img_select_one_by_MaSP($Ma_SP);
                                extract($Image_select);
                                $img_path = $UPLOAD_URL . '/products/' . $Image;
                                if (is_file($img_path)) {
                                    $img = "<img src='$img_path' height='60' width='60' class='object-fit-contain'>";
                                } else {
                                    $img = "no photo";
                                }
                                //Tính giảm bn %
                                if ($Price > 0) {
                                    $percent_discount = number_format($Price / $Price_Giam * 10);
                                }
                            ?>
                            <tr>
                                <td><input type="checkbox" name="Ten_SP[]" value="<?= $Ma_SP ?>"></td>
                                <td><?= $Ma_SP ?></td>
                                <td><?= $Ten_SP ?></td>
                                <td><?= $img ?>
                                <a href="<?= $xemhh ?>" class="btn btn-outline-info btn-rounded">
                                        <i class="fa fa-eye"></i>
                                    </a></td>
                                <td><?= number_format($Price, 0) ?>đ</td>
                                <td><?= number_format($Price_Giam, 0) ?>đ<i
                                        class="text-danger">(<?= isset($percent_discount) ? $percent_discount : '' ?>%)</i>
                                </td>
                                <td><?= $so_luot_xem ?></td>
                                <td><?= $ngay_nhap ?></td>
                                <td><?= ($dac_biet == 1) ? "Đặc biệt" : "Không"; ?></td>

                                <td class="text-end">
                                    
                                    <a href="<?= $suahh ?>" class="btn btn-outline-info btn-rounded"><i
                                            class="fas fa-pen"></i></a>
                                    <a href="<?= $xoahh ?>" class="btn btn-outline-danger btn-rounded"
                                        onclick="return confirm(' Bạn có Muốn Xóa Không')"><i
                                            class=" fas fa-trash"></i></a>
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

</section>