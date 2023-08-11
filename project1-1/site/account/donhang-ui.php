<div class="container">


<div class="content">
        <h1 class="heading">DANH SÁCH HOÁ ĐƠN</h1>
        <div class="page-title">
            <?php
            if (isset($MESSAGE) && (strlen($MESSAGE) > 0)) {
                echo '<h5 class="alert alert-warning">' . $MESSAGE . '</h5>';
            }
            $trang_thai=""
            ?>
        </div>
        <div class="box box-primary">
            <div class="box-body">
                <form action="?btn_delete_all" method="post" class="table-responsive">
                    <table width="100%" class="table table-hover table-bordered text-center">
                        <thead class="header-table">
                            <tr>
                                <th><input type="checkbox" id="select-all"></th>
                                <th>Mã HĐ</th>
                                <!-- <th>Mã kh</th> -->
                                <th>Tên khách hàng</th>
                                <th>HDCT</th>
                                <th>Tổng tiền</th>                                
                                <th>Ngày mua</th>
                                <th>Trạng thái </th>
                                
                               
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($items as $item) {
                                extract($item);
                                $khach_hang_select=name_user_select_by_id($ma_kh);
                                extract($khach_hang_select);
                                if($giao_hang=="NO"){
                                    $trang_thai="Chưa giao hàng";
                                }elseif($giao_hang=="YES"){
                                    $trang_thai="Đang giao hàng";
                                }
                                $name=$ho_ten;
                                $xemhdct = "donhang.php?btn_hdct&ma_hd=".$ma_hd;
                                // $suahd = "index.php?btn_edit&ma_hd=".$ma_hd;
                                $xoahd = "donhang.php?btn_delete&ma_hd=".$ma_hd;
                               
                            ?>
                            <tr>
                                <td><input type="checkbox" name="ma_hd[]" value="<?= $ma_hd ?>"></td>
                                <td><?= $ma_hd ?></td>
                                <!-- <td><?= $ma_kh ?></td> -->
                                <td><?= $name ?>
                                <td>
                                <a href="<?= $xemhdct ?>" class="btn btn-outline-info btn-rounded">
                                        <i class="fa fa-eye"></i>
                                    </a></td>
                                <td><?= number_format($tong_tien, 0) ?>đ</td>
                               
                                
                                <td><?= $ngay_mua ?></td>
                                <td><?= $trang_thai ?></td>
                                
                                

                                <td class="text-end">
                                    
                                    <!-- <a href="<?= $suahd ?>" class="btn btn-outline-info btn-rounded"><i
                                            class="fas fa-pen"></i></a> -->
                                    <a href="<?= $xoahd ?>" class="btn btn-outline-danger btn-rounded"
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
</div>