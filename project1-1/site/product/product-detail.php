<?php
require '../../global.php';
require '../../dao/product.php';
require '../../dao/comment.php';
require '../../dao/loai.php';

extract($_REQUEST);

// Truy vấn mặt hàng theo mã lấy nó ra để hiện thị
$hang_hoa = product_select_by_id($Ma_SP);
extract($hang_hoa);
$Image_select=img_select_all_by_MaSP($Ma_SP);


// Tăng số lượt xem lên 1
product_tang_so_luot_xem($Ma_SP);

// Hàng cùng Loại
// $product_cung_loai = product_select_by_loai($ma_loai);
if (!isset($color)) {
    $color="black";
}
if (!isset($size)) {
    $size="s";
}
if (!isset($so_luong)) {
    $so_luong=1;
}
if (exist_param("so_luong_giam")) {
    $so_luong = $_REQUEST['so_luong'];
    $so_luong --;
    if ($so_luong<=0) {
        $so_luong=1;
    }
}
if (exist_param("so_luong_tang")) {
    $so_luong = $_REQUEST['so_luong'];
    $so_luong ++;
    
}
if (exist_param("size_change")) {
    $size = $_REQUEST['size'];
}
if (exist_param("noi_dung")) {
    $ma_kh = $_SESSION['user']['ma_kh'];
    $ngay_bl = date_format(date_create(), 'Y-m-d');
    comment_insert( $Ma_SP, $noi_dung, $ngay_bl, $rating,$ma_kh);
}

// Lấy list bình luận ra
$binh_luan_list = comment_select_by_product($Ma_SP, 5);

    $name_loai = loai_select_by_id($ma_loai);
    extract($name_loai);
    $title_site = "Các sản phẩm liên quan : '$ten_loai' ";

    $items = product_select_by_loai($ma_loai);
$VIEW_NAME = "product/product-detail-ui.php";
require '../layout.php';