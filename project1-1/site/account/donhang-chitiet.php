<div class="container">


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
                        <thead class="header-table">
                            <tr>
                                <th><input type="checkbox" id="select-all"></th>
                                <th>Mã HDCT</th>
                                <th>Hình Ảnh</th>
                                <th>Tên SP</th>
                                <th>Số lượng</th>
                                <th>Size</th>
                                <th>Màu</th>
                                
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
                                $Image_select=img_select_one_by_MaSP($Ma_SP);
                                extract($Image_select);
                                $img_path = $UPLOAD_URL . '/products/' . $Image;
                                if (is_file($img_path)) {
                                    $img = "<img src='$img_path' height='60' width='60' class='object-fit-contain'>";
                                } else {
                                    $img = "no photo";
                                }
            
                                
                                
                            ?>
                            <tr>
                                <td><input type="checkbox" name="ma_hdct[]" value="<?= $ma_hdct ?>"></td>
                                <td><?= $ma_hd ?></td>
                                <td><?= $img ?></td>
                                <td><?= $Ten_SP ?></td>
                                <td><?= $so_luong ?></td>
                                <td><?= $size ?></td>
                                <td><?= $mau ?></td>
                                

                                
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
                    <a class="back-btn" href="donhang.php">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</div>