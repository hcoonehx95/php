<?php
require '../../global.php';
require '../../dao/user.php';
check_login();
extract($_REQUEST);
$ma_kh_error=$mat_khau_cu_error=$mat_khat_moi1_error=$mau_khau_moi2_error="";
if (exist_param('btn_change')) {
    
    if(empty($_POST['mat_khau2'])){
        $mat_khat_moi1_error="Mật khẩu mới không được để trống";
    }else {
        $mat_khau2=$_POST['mat_khau2'];
    }
    if(empty($_POST['mat_khau3'])){
        $mat_khat_moi2_error="Mật khẩu mới không được để trống";
    }
    if ($mat_khau2 != $mat_khau3) {
        $mat_khat_moi1_error="Mật khẫu không trùng nhau";
        $mat_khat_moi2_error="mật khẫu không trùng nhau";
    }
    if(empty($_POST['ma_kh'])){
        $ma_kh_error="Tên đăng nhập mới không được để trống";
    }

    $user = user_select_by_id($ma_kh);
        if (!$user) {
            $ma_kh_error="Sai tên dăng nhập!";
            
        } else {
            if ($user['mat_khau'] != $mat_khau) {
                $mat_khau_cu_error="Mật khẩu cũ không đúng !";
                
            } 
            
        }
    if (empty($ma_kh_error)&&empty($mat_khau_cu_error) &&empty($mat_khat_moi1_error)&&empty($mau_khau_moi2_error)) {
        try {
            user_change_password($ma_kh, $mat_khau2);
            echo "<script>alert('Cập nhật mật khẩu thành công !')</script>";
        } catch (Exception $exc) {
            echo "<script>alert('Cập nhật mật khẩu thất bại !')</script>";
        }
    }else{
        echo "<script>alert('Cập nhật mật khẩu thất bại !')</script>";
        $VIEW_NAME = 'account/doi-mk-ui.php';
    }  
}
$VIEW_NAME = 'account/doi-mk-ui.php';
require '../layout.php';