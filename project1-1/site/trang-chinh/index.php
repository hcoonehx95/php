<?php

require '../../global.php';
require_once '../../dao/product.php';


if (exist_param("gioi-thieu")) {
    $_SESSION['name_page'] = 'gioi-thieu';
    $VIEW_NAME = "trang-chinh/gioithieu.php";
    //
} else if (exist_param("product")) {

    $_SESSION['name_page'] = 'product';
    header("location: $SITE_URL/product/product.php");
} else if (exist_param("lien-he")) {

    $_SESSION['name_page'] = 'lien-he';

    $VIEW_NAME = "trang-chinh/contact.php";
    //
} else if (exist_param("tin-tuc")) {
    $_SESSION['name_page'] = 'tin-tuc';
    $VIEW_NAME = "trang-chinh/tintuc.php";
    //
} else if (exist_param("sixclub")) {
    $_SESSION['name_page'] = 'sixclub';
    $VIEW_NAME = "trang-chinh/sixclub.php";
} else if (exist_param("account")) {
    $_SESSION['name_page'] = 'account';
    header("location: $SITE_URL/account/dangnhap.php");
} else {
    $_SESSION['name_page'] = 'trang-chu';
    $items = product_select_dac_biet();
    $top10 = product_select_top10();
    $VIEW_NAME = "trang-chinh/trang-chu.php";
}

require '../layout.php';