
<div class="container">
    
    <h2 class="title-view-cart">GIỎ HÀNG</h5>
    <?php
   $tong_tien=0;
   if (isset($_SESSION['cart'])) {
       
       ?>
    <div class="view-cart">
        <table class="list-cart">
            <thead class="header-table">
                <tr>
                    <th>Ảnh</th>
                    <th>Tên SP</th>
                    <th>Đơn giá</th>
                    <th style="width:6rem">Số lượng</th>
                    <th>Size</th>
                    <th>Màu</th>
                    <th>Thành tiền</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody class="text-center" id="giohang">

                <?php foreach ($_SESSION['cart'] as $Ma_SP => $item) {
                    $Image_select=img_select_one_by_MaSP($Ma_SP);
                    extract($Image_select);
                    $img_path = $UPLOAD_URL . '/products/' . $Image;
                    if (is_file($img_path)) {
                        $img = "<img src='$img_path' height='60' width='60' class='object-fit-contain'>";
                    } else {
                        $img = "no photo";
                    }
                    $tong_tien=$tong_tien+$item['thanh_tien'];

                    ?>
                <tr>
                    <td><?= $img ?></td>
                    <td><?= $item['Ten_SP'] ?></td>
                    
                    <td>
                        <?= number_format($item['Price_Giam']) ?> đ 
                    </td>
                    <td class="pt-1 m-auto">
                        <form action="delete_cart.php?act=update_sl" method="post">
                            <input type="number" class="form-control sl" 
                                value="<?= $item['so_luong'] ?>" >
                            <input type="hidden" class="form-control" name="ma_hh" value="<?= $Ma_SP ?>">
                        </form>
                    </td>
                    <td>
                    <?= $item['size'] ?>
                    </td>
                    <td>
                    <?= $item['color'] ?>
                    </td>
                    <td> <span class="thanh_tien_sp">
                        <?= number_format($item['thanh_tien'],0,',') ?></span> đ</td>
                    <td class="pt-1 m-auto">
                        <a onclick="return confirm('Bạn chắc chắn muốn xóa không?');"
                            href="<?= $SITE_URL . "/cart/delete-cart.php?act=delete&Ma_SP=" . $Ma_SP ?>"
                            class="btn btn-outline-danger"> <i class="fas fa-trash-alt "></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                    <tr>
                        <td colspan="8" style="text-align: right;">
                            <span colspan="8">Tổng thành tiền: <?= number_format($tong_tien,0,",") ?> đ</span>
                        </td>
                    </tr>
                    <tr>
                        <td><a href="product.php" class="back-btn"><i class="fa fa-angle-left"></i> Tiếp
                                tục mua hàng</a>
                        </td>
                        <td colspan="8">
                            <div class="thanhtoan">
                                <a onclick="return confirm('Bạn chắc chắn muốn xóa tất cả k??');" href="<?= $SITE_URL . "/cart/delete-cart.php?act=deleteAll" ?>" class="delete-btn">Xóa
                                    tất
                                    cả</a>
                                <a href="<?= $SITE_URL . "/cart/list-cart.php?form_invoice" ?>" class="thanhtoan-btn">Thanh
                                    toán</a>
                            </div>
                        </td>
                    </tr>
                </tfoot>
        </table>
    </div>
    <?php } else { ?>
    <div class="no-cart">
        <h3 class="title-no-cart">Không tồn tại sản phẩm nào trong giỏ hàng </h3>
        <a class="back-home" href="<?= $ROOT_URL ?>"> Về trang chủ</a>
    </div>
    <?php } ?>
</div>