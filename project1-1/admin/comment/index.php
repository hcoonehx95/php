<?php

require_once "../../dao/pdo.php";
require_once "../../dao/comment.php";
require_once "../../dao/thongke.php";
require "../../global.php";
check_login();

extract($_REQUEST);
if (exist_param("Ma_SP")) {

    if (exist_param("btn_delete")) {
        try {
            comment_delete($ma_bl);
            $MESSAGE = "Xóa thành công";
        } catch (Exception $exc) {
            $MESSAGE = "Xóa thất bại";
        }
    } else if (exist_param("btn_delete_all")) {
        try {
            $arr_ma_bl = $_POST['ma_bl'];
            comment_delete($arr_ma_bl);
            $MESSAGE = "Xóa thành công!";
        } catch (Exception $exc) {
            $MESSAGE = "Xóa thất bại!";
        }
        // $items = binh_luan_select_by_hang_hoa($ma_hh);
        $VIEW_NAME = "detail.php";
    }

    $items = comment_select_by_product($Ma_SP);

    if (count($items) == 0) {
        $items = thong_ke_comment();
        $VIEW_NAME = "list.php";
    } else {
        $VIEW_NAME = "detail.php";
    }
} else {
    $items = thong_ke_comment();
    $VIEW_NAME = "list.php";
}

require "../layout.php";