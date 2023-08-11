<?php

require '../../global.php';
require '../../dao/user.php';

extract($_REQUEST);
$VIEW_NAME = "account/register.php";


extract($_REQUEST);
$ho_ten_error=$ma_kh_error=$mau_khau_error=$mau_khau2_error=$email_error=$sdt_error=$tinh_thanhpho_error=$quan_huyen_error=$xa_phuong_error=$dia_chi_error=$Image_error="";
if (exist_param("btn_register")) {
    if(empty($_POST['ho_ten'])){
        $ho_ten_error="Không được để trống Họ tên";
    }else{
        $ho_ten=$_POST['ho_ten'];
    }
    if(empty($_POST['ma_kh'])){
        $ma_kh_error="Không được để trống Tên đăng nhập";
    }else{
        if(User_exist($_POST['ma_kh']))
        {
            $ma_kh_error="Tên đăng nhập đã đăng kí";
        }else{
            $ma_kh=$_POST['ma_kh'];
        }
        
    }
    if(empty($_POST['mat_khau'])){
        $mau_khau_error="không được để trống Mật khẩu";
    }else{
        if($_POST['mat_khau'] != $_POST['mat_khau2'])
        {
            $mau_khau_error="Mật khẫu không trùng nhau";
            $mau_khau2_error="Mật khẫu không trùng nhau";
        }else{
            $mat_khau=$_POST['mat_khau'];
        }
        
    }
    if(empty($_POST['mat_khau2'])){
        $mau_khau2_error="không được để trống Mật khẩu";
    }else{
        if($_POST['mat_khau'] != $_POST['mat_khau2'])
        {
            $mau_khau_error="Mật khẫu không trùng nhau";
            $mau_khau2_error="Mật khẫu không trùng nhau";
        }
        
    }
    if(empty($_POST['email'])|| !isset($_POST['email'])){
        $email_error="không được để trống email";
    }else{
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = "Không đúng cấu trúc Email";
        }else{
            $email=$_POST['email'];
        }  
    }
    if(empty($_POST['sdt'])|| !isset($_POST['sdt'])){
        $sdt_error="Không được để trống Số điện thoại";
    }else{
        if (!is_numeric($_POST['sdt'])) {
            $sdt_error = "Số điện thoại phải là số";
        }else{
            if(preg_match('/^[0-9]{10,11}+$/', $_POST['sdt'])) {
                $sdt=$_POST['sdt'];
                } else {
                    $sdt_error = "Số điện thoại phải là 10-11 số";
                }
            
        }  
    }
    if(empty($_POST['city'])|| !isset($_POST['city'])){
        $tinh_thanhpho_error="Không được để trống";
    }else{
       
        $tinh_thanhpho=$_POST['city'];
        
    }
    if(empty($_POST['district'])|| !isset($_POST['district'])){
        $quan_huyen_error="Không được để trống";
    }else{
       
        $quan_huyen=$_POST['district'];
        
    }
    if(empty($_POST['ward'])|| !isset($_POST['ward'])){
        $xa_phuong_error="Không được để trống";
    }else{
       
        $xa_phuong=$_POST['ward'];
        
    }
    if(empty($_POST['dia_chi'])|| !isset($_POST['dia_chi'])){
        $dia_chi_error="Không được để trống";
    }else{
       
        $dia_chi=$_POST['dia_chi'];
        
    }
    if(!isset($_FILES['Image']) || $_FILES['Image'] === "" ){
        $Image_error="Ảnh không được để trống";
    }

    if(empty($ho_ten_error)&&empty($ma_kh_error)&&empty($mau_khau_error)&&empty($mau_khau2_error)&&empty($email_error)
    &&empty($sdt_error)&&empty($tinh_thanhpho_error)&&empty($quan_huyen_error)&&empty($xa_phuong_error)
    &&empty($dia_chi_error)&&empty($Image_error)){
        $file_name = save_file("Image", "$UPLOAD_URL/users/");
        $Image = $file_name ? $file_name : "";
        try {
            User_insert($ma_kh, $vaitro, $ho_ten, $kich_hoat, $mat_khau,$sdt, $email, $Image,$dia_chi,$tinh_thanhpho,$quan_huyen,$xa_phuong);
            echo "<script>alert('Đăng ký thành viên thành công');</script>";
            $VIEW_NAME = "dangnhap-ui.php";
        } catch (Exception $exc) {
            echo "<script>alert('Đăng ký thành viên thất bại');</script>";
        }
    }else{
        global $ma_kh, $vaitro, $ho_ten, $kich_hoat, $mat_khau, $email, $Image, $mat_khau2;
        echo "<script>alert('Đăng ký thành viên thất bại');</script>";
        $VIEW_NAME = "register.php";
    }
        
    
} else {
    global $ma_kh, $vaitro, $ho_ten, $kich_hoat, $mat_khau, $email, $Image, $mat_khau2;
    $VIEW_NAME = "account/register.php";
}

require '../layout.php';