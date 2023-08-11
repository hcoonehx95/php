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
        <h1 class="heading">ẢNH SẢN PHẨM</h1>
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
                                <th>Mã ảnh</th>
                                <th>Ảnh</th>
                                <th>Mã HH</th>
                                <th><a href="index.php?btn_img_new&Ma_SP=<?=$Ma_SP?>" class="btn btn-success text-white">Thêm ảnh mới
                                        <i class="fas fa-plus-circle"></i></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($Image as $Image) {
                                extract($Image);
                                
                                $sua_img = "index.php?btn_img_edit&id=" . $id;
                                $xoa_img = "index.php?btn_img_delete&id=" . $id."&Ma_SP=".$Ma_SP;
            
                                $img_path = $UPLOAD_URL . '/products/' . $Image;
                                if (is_file($img_path)) {
                                    $img = "<img src='$img_path' height='60' width='60' class='object-fit-contain'>";
                                } else {
                                    $img = "no photo";
                                }
                                
                            ?>
                            <tr>
                                <td><input type="checkbox" name="id[]" value="<?= $id ?>"></td>
                                <td><?= $id ?></td>
                                
                                <td><?= $img ?></td>
                                <td><?= $Ma_SP ?></td>
                                
                                

                                <td class="text-end">
                               
                                    <!-- <a href="<?= $sua_img ?>" class="btn btn-outline-info btn-rounded"><i
                                            class="fas fa-pen"></i></a> -->
                                    <a href="<?= $xoa_img ?>" class="btn btn-outline-danger btn-rounded"
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
                                <a class="page-link" href="?btn_img&Ma_SP=<?=$Ma_SP?>&page=<?= $i ?>"><?= $i ?></a>
                            </li>

                            <?php } ?>

                        </ul>
                    </div>
                    <a href="index.php?btn_list"><input type="button" class="btn btn-success"
                                        value="Danh sách sản phẩm"></a>
                </form>
            </div>
        </div>
    </div>

</section>