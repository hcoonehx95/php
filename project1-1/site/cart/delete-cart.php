<?php
require '../../global.php';
extract($_REQUEST);
if (empty($_SESSION['cart'])) {
    header("location:" . $SITE_URL . "/cart/list-cart.php");
} else {
    if ($act == "deleteAll") {
        unset($_SESSION['cart']);
        unset($_SESSION['total_cart']);
        header("location:" . $SITE_URL . "/cart/list-cart.php");
    } else if ($act == "delete") {
        if (array_key_exists($Ma_SP, $_SESSION['cart'])) {

            $_SESSION['total_cart'] -=   $_SESSION['cart'][$Ma_SP]['so_luong'];
            unset($_SESSION['cart'][$Ma_SP]);
            header("location:" . $SITE_URL . "/cart/list-cart.php");
        }
    } else if ($act == "sl_update") {

        foreach ($_SESSION['cart'] as $key => $value) {
            if ($key == $_POST['Ma_SP']) {
                $_SESSION['cart'][$key]['so_luong'] = $_POST['sl_update'];
            }
        }
        header("location:" . $SITE_URL . "/cart/list-cart.php");
    } else {
        header("location:" . $SITE_URL . "/cart/list-cart.php");
    }
}