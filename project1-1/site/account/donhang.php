<?php
require '../../global.php';
require '../../dao/product.php';
require '../../dao/user.php';
require '../../dao/cart.php';
if (isset($_SESSION['user'])) {
    $id = $_SESSION['user'];
    $kh = user_select_by_id($id['ma_kh']);
    extract($kh);
    $items=hoadon_select_all_by_makh($ma_kh,'ma_hd', 10);

    $VIEW_NAME = "../account/donhang-ui.php";
} else {
    header("location:" . $SITE_URL . "/account/dangnhap.php");
}

if (exist_param("btn_delete")) {

    $ma_hd = $_REQUEST['ma_hd'];
    $hoadon=hoadon_select_by_id($ma_hd);
    extract($hoadon);
    if($giao_hang=="YES"){
        echo "<script>alert('Đang trên đường giao hàng, không thể xoá !')</script>";
    }else{
        echo "<script>alert('Xoá thành công !')</script>";
        hoadon_delete($ma_hd);
    }
    
    //hiển thị danh sách

    $id = $_SESSION['user'];
    $kh = user_select_by_id($id['ma_kh']);
    extract($kh);
    $items=hoadon_select_all_by_makh($ma_kh,'ma_hd', 10);

    $VIEW_NAME = "../account/donhang-ui.php";
}else if (exist_param("btn_hdct")) {

    $ma_hd = $_REQUEST['ma_hd'];

    $hdct = hdct_select_page('ma_hdct', 10,$ma_hd);

    $VIEW_NAME = "../account/donhang-chitiet.php";
}
require '../layout.php';
?>