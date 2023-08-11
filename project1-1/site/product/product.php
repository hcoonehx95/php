<?php
require '../../global.php';
require '../../dao/product.php';
require '../../dao/loai.php';


extract($_REQUEST);

if (exist_param("ma_loai")) {

    $name_loai = loai_select_by_id($ma_loai);
    extract($name_loai);
    $title_site = "Các sản phẩm thuộc loại : '$ten_loai' ";

    $items = product_select_by_loai($ma_loai);
} else if (exist_param("dac_biet")) {
    $title_site = "Sản phẩm đặc biệt";
    $items = product_select_dac_biet();
} else if (exist_param("timkiem")) {
    $kyw = $_POST['keyword'];
    if ($kyw == '') {
        $title_site = "Tất cả sản phẩm";
    } else {
        $title_site = "Các sản phẩm có chứa từ khóa :'$kyw'";
    }
    $items = hang_hoa_select_keyword($kyw);
    if (count($items) == 0) {
        $title_site = "Không sản phẩm nào chứa từ khóa :'$kyw'";
    }
} else {
    $title_site = "Tất cả sản phẩm";
    $items = product_select_page('so_luot_xem', 12);
}
$ds_loai = loai_select_all();
$VIEW_NAME = "product/product-lietke.php";

require '../layout.php';