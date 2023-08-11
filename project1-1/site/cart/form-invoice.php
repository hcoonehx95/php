<div class="container">
<h1 class="heading">THANH TOÁN</h1>
<div class="content-update">
    <div class="content-img">
    <div class="container">

<?php
$tong_tien=0;
if (isset($_SESSION['cart'])) {
   
?>
<div class="row m-1 pb-5">
    <table class="table table-responsive-md">
        <thead class="thead text-center">
            <tr>
                
                <th>Tên SP</th>
               
                <th style="width:6rem">Số lượng</th>
                
                <th>Thành tiền</th>
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
                
                <td><?= $item['Ten_SP'] ?></td>
                
              
                <td class="pt-1 m-auto">
                    <form action="delete_cart.php?act=update_sl" method="post">
                        <input type="text" readonly class="form-control sl" 
                            value="<?= $item['so_luong'] ?>" >
                        <input type="hidden" class="form-control" name="ma_hh" value="<?= $Ma_SP ?>">
                    </form>
                </td>

                <td> <span class="thanh_tien_sp">
                    <?= number_format($item['thanh_tien'],0,",") ?></span> đ</td>
                
            </tr>
            <?php } ?>
        </tbody>
        <tfoot id="tongdonhang">
            <tr class="text-center" style="margin-top: 20px;">
                <th colspan="">Tổng thành tiền: </th>
                <td class="  text-danger font-weight-bold"> <?=number_format($tong_tien,0,",")?>
                    đ
                </td>
                <td></td>
            </tr>
            <tr class=" text-right">
                <th colspan="7">
                   
                    <label for=""><?=$loi?></label>
                </th>
            </tr>
        </tfoot>
    </table>
</div>
<?php } else { ?>
        <div class="row  m-1 pb-5">
            <h6 class="col-12">Không tồn tại sản phẩm nào trong giỏ hàng </h6>
            <a class="btn btn-outline-dark col-12" href="<?= $ROOT_URL ?>"> Về trang chủ</a>
        </div>
<?php } ?>
</div>
    </div>
    <div class="content-main">
        <form action="<?= $SITE_URL . '/cart/list-cart.php' ?>" class="form-update" method="POST"
            enctype="multipart/form-data">
            
            <div class="form-group form">
                <label for="" class="title-update">Họ và tên: <?= $ho_ten ?> </label>
                
                 
            </div>
            <div class="form-group">
                <label for="" class="title-update">Địa chỉ email: <?= $email ?></label>
                
            </div>
            <div class="form-group">
                <label for="" class="title-update">Số điện thoại :<?= $sdt ?></label>
                
                 
            </div>
            <div class="form-group">
                    
                <label for="" class="title-update">Địa chỉ:<?= $dia_chi ?> -<?= $xa_phuong?> - <?= $quan_huyen?> -<?= $tinh_thanhpho ?></label>
               
                   
            </div>
            
            
            <div class="form-group">
                <button type="submit" name="btn_insert_cart" class="submit">Xác nhận hoá đơn</button>
            </div>
        </form>
    </div>
</div>
</div>