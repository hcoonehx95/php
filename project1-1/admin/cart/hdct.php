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
        <h1 class="heading">HOÁ ĐƠN CHI TIẾT</h1>
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
                                <th>Mã HDCT</th>
                                <th>Mã SP</th>
                                <th>Tên SP</th>
                                <th>Số lượng</th>
                                <th>Size</th>
                                <th>Màu</th>
                                <th><a href="index.php?btn_hdct_new&ma_hd=<?=$ma_hd?>" class="btn btn-success text-white">Thêm HDCT mới
                                        <i class="fas fa-plus-circle"></i></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($hdct as $hdct) {
                                extract($hdct);
                                $product_select=product_select_by_id($Ma_SP);
                                extract($product_select);
                                
                                $sua_hdct = "index.php?btn_hdct_edit&ma_hdct=" . $ma_hdct;
                                $xoa_hdct = "index.php?btn_hdct_delete&ma_hdct=" . $ma_hdct."&ma_hd=".$ma_hd;
            
                                // $img_path = $UPLOAD_URL . '/products/' . $Image;
                                // if (is_file($img_path)) {
                                //     $img = "<img src='$img_path' height='60' width='60' class='object-fit-contain'>";
                                // } else {
                                //     $img = "no photo";
                                // }
                                
                            ?>
                            <tr>
                                <td><input type="checkbox" name="ma_hdct[]" value="<?= $ma_hdct ?>"></td>
                                <td><?= $ma_hd ?></td>
                                <td><?= $Ma_SP ?></td>
                                <td><?= $Ten_SP ?></td>
                                <td><?= $so_luong ?></td>
                                <td><?= $size ?></td>
                                <td><?= $mau ?></td>
                                

                                <td class="text-end">
                               
                                    <a href="<?= $sua_hdct ?>" class="btn btn-outline-info btn-rounded"><i
                                            class="fas fa-pen"></i></a>
                                    <a href="<?= $xoa_hdct ?>" class="btn btn-outline-danger btn-rounded"
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
                            <?php
                            

                             for ($i = 1; $i <= $_SESSION['total_page']; $i++) { ?>

                            <li class="page-item <?= $_SESSION['page'] == $i ? 'active' : '' ?>">
                                <a class="page-link" href="?btn_hdct&ma_hd=<?=$ma_hd?>&page=<?= $i ?>"><?= $i ?></a>
                            </li>

                            <?php } ?>

                        </ul>
                    </div>
                    <a href="index.php?btn_list"><input type="button" class="btn btn-success"
                                        value="Danh sách hoá đơn"></a>
                </form>
            </div>
        </div>
    </div>

</section>