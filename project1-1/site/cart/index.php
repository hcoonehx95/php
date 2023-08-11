<?php
require_once "../../dao/pdo.php";
require_once "../../dao/loai.php";
require_once "../../dao/cart.php";
require_once "../../dao/user.php";
require_once "../../dao/product.php";
require "../../global.php";

extract($_REQUEST);


if (isset($Ma_SP) && $Ma_SP > 0) {
    $items = product_select_by_id($Ma_SP);
    $total = 0;
    extract($items);
    
    if (isset($_SESSION['cart'])) {
       
        if (isset($_SESSION['cart'][$Ma_SP])) {
            $_SESSION['cart'][$Ma_SP]['so_luong']=$_SESSION['cart'][$Ma_SP]['so_luong']+$_REQUEST['so_luong'];;
            $_SESSION['cart'][$Ma_SP]['Price_Giam'] = $Price_Giam;
            $_SESSION['cart'][$Ma_SP]['thanh_tien']=$_SESSION['cart'][$Ma_SP]['Price_Giam']* $_SESSION['cart'][$Ma_SP]['so_luong'];
            
        }else{
        $_SESSION['cart'][$Ma_SP]['Ten_SP'] = $Ten_SP;
        $_SESSION['cart'][$Ma_SP]['Price'] = $Price;
        $_SESSION['cart'][$Ma_SP]['Price_Giam'] = $Price_Giam;
        $_SESSION['cart'][$Ma_SP]['so_luong'] = $_REQUEST['so_luong'];
        $_SESSION['cart'][$Ma_SP]['size'] = $_REQUEST['size'];
        $_SESSION['cart'][$Ma_SP]['color'] = $_REQUEST['color'];
        $_SESSION['cart'][$Ma_SP]['thanh_tien']=$_SESSION['cart'][$Ma_SP]['Price_Giam']* $_SESSION['cart'][$Ma_SP]['so_luong'];
        
        }
        foreach ($_SESSION['cart'] as $key => $value) {
            $total += $_SESSION['cart'][$key]['so_luong'];
        }
        echo $total;
    } else {
        
        $_SESSION['cart'][$Ma_SP]['Ten_SP'] = $Ten_SP;
        $_SESSION['cart'][$Ma_SP]['Price'] = $Price;
        $_SESSION['cart'][$Ma_SP]['Price_Giam'] = $Price_Giam;
        $_SESSION['cart'][$Ma_SP]['so_luong'] = $_REQUEST['so_luong'];
        $_SESSION['cart'][$Ma_SP]['size'] = $_REQUEST['size'];
        $_SESSION['cart'][$Ma_SP]['color'] = $_REQUEST['color'];
        $_SESSION['cart'][$Ma_SP]['thanh_tien']=$_SESSION['cart'][$Ma_SP]['Price_Giam']* $_SESSION['cart'][$Ma_SP]['so_luong'];
        foreach ($_SESSION['cart'] as $key => $value) {
            $total += $_SESSION['cart'][$key]['so_luong'];
        }
        echo $total;
    }
    $_SESSION['total_cart'] = $total;
    $VIEW_NAME = "../cart/view_cart.php";

}else{

}
require '../layout.php';