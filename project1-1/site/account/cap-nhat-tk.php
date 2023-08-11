<?php
require '../../global.php';
require '../../dao/user.php';


check_login();

extract($_REQUEST);
$ho_ten_error=$ma_kh_error=$mau_khau_error=$mau_khau2_error=$email_error=$sdt_error=$tinh_thanhpho_error=$quan_huyen_error=$xa_phuong_error=$dia_chi_error=$Image_error=$loi="";
if (exist_param("btn_update")) {
    if(empty($_POST['ho_ten'])){
        $ho_ten_error="Không được để trống Họ tên";
    }else{
        $ho_ten=$_POST['ho_ten'];
    }
    if(empty($_POST['ma_kh'])){
        $ma_kh_error="Không được để trống Tên đăng nhập";
    }else{
        
            $ma_kh=$_POST['ma_kh'];
        
        
    }
    // if(empty($_POST['mat_khau'])){
    //     $mau_khau_error="không được để trống Mật khẩu";
    // }else{
    //     if($_POST['mat_khau'] != $_POST['mat_khau2'])
    //     {
    //         $mau_khau_error="Mật khẫu không trùng nhau";
    //         $mau_khau2_error="Mật khẫu không trùng nhau";
    //     }else{
            $mat_khau=$_POST['mat_khau'];
    //     }
        
    // }
    // if(empty($_POST['mat_khau2'])){
    //     $mau_khau2_error="không được để trống Mật khẩu";
    // }else{
    //     if($_POST['mat_khau'] != $_POST['mat_khau2'])
    //     {
    //         $mau_khau_error="Mật khẫu không trùng nhau";
    //         $mau_khau2_error="Mật khẫu không trùng nhau";
    //     }
        
    // }
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
           
                $sdt=$_POST['sdt'];
                
            
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
    if(empty($_POST['dia_chi'])){
        $dia_chi_error="Không được để trống";
    }else{
       
        $dia_chi=$_POST['dia_chi'];
        
    }
    $vaitro=$_POST['vaitro'];
    $kich_hoat=$_POST['kich_hoat'];
    $mat_khau=$_POST['mat_khau'];
    if(empty($ho_ten_error)&&empty($ma_kh_error)&&empty($mau_khau_error)&&empty($email_error)
    &&empty($sdt_error)&&empty($tinh_thanhpho_error)&&empty($quan_huyen_error)&&empty($xa_phuong_error)
    &&empty($dia_chi_error)&&empty($Image_error)){
        try {
            $file_name = save_file("Image", "$UPLOAD_URL/users/");
            $Image = $file_name ? $file_name : "";
            User_update( $vaitro, $ho_ten, $kich_hoat, $mat_khau,$sdt, $email, $Image, $dia_chi, $tinh_thanhpho, $quan_huyen, $xa_phuong, $ma_kh);
            echo "<script>alert('Cập nhật thành công !')</script>";
            $_SESSION['user'] = user_select_by_id($ma_kh);
        } catch (Exception $exc) {
            echo "<script>alert('Cập nhật thất bại!')</script>";
            $loi= $exc;
            $VIEW_NAME = "account/capnhat-tk-ui.php";
        }
    }else{
        echo "<script>alert('Cập nhật thất bại!')</script>";
        extract($_SESSION['user']);
       
        $VIEW_NAME = "account/capnhat-tk-ui.php";
    }
   
} else {
    extract($_SESSION['user']);
}
$VIEW_NAME = "account/capnhat-tk-ui.php";
require '../layout.php';