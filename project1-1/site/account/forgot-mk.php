<?php

require '../../global.php';
require '../../dao/user.php';

extract($_REQUEST);
$VIEW_NAME = 'account/forgot-mk-ui.php';
if (exist_param('btn_forgot')) {
    $user = user_select_by_id($ma_kh);
    if ($user) {
        if ($user['email'] != $email) {
            $MESSAGE = 'Sai email đăng nhập';
        } else {
            $MESSAGE = "Mật khẩu của bạn là :" . $user['mat_khau'];
            global $ma_kh, $mat_khau;
            $VIEW_NAME = 'account/dangnhap-ui.php';
        }
    } else {
        $MESSAGE = 'Sai tên đăng nhập';
    }
}

require '../layout.php';