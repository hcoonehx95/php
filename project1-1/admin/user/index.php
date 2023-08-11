<?php
require_once "../../dao/pdo.php";
require_once "../../dao/user.php";
require "../../global.php";
// check_login();

extract($_REQUEST);
$ho_ten_error=$ma_kh_error=$mau_khau_error=$mau_khau2_error=$email_error=$sdt_error=$tinh_thanhpho_error=$quan_huyen_error=$xa_phuong_error=$dia_chi_error=$Image_error="";
if (exist_param("btn_list")) {

    //show dữ liệu
    $items = user_select_page('ma_kh',10);
    $VIEW_NAME = "list.php";
} else if (exist_param("btn_insert")) {
    #lấy dữ liệu từ form
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
    $kich_hoat = $_POST['kich_hoat'];
    $vaitro = $_POST['vai_tro'];

    // Upload file lên host
    $Image = save_file('Image', "$UPLOAD_URL/users/");
    //insert vào db
    if(empty($ho_ten_error)&&empty($ma_kh_error)&&empty($mau_khau_error)&&empty($mau_khau2_error)&&empty($email_error)
    &&empty($sdt_error)&&empty($tinh_thanhpho_error)&&empty($quan_huyen_error)&&empty($xa_phuong_error)
    &&empty($dia_chi_error)&&empty($Image_error)){
        $file_name = save_file("Image", "$UPLOAD_URL/users/");
        $Image = $file_name ? $file_name : "";
        try {
            User_insert($ma_kh, $vaitro, $ho_ten, $kich_hoat, $mat_khau,$sdt, $email, $Image,$dia_chi,$tinh_thanhpho,$quan_huyen,$xa_phuong);
            echo "<script>alert('Đăng ký thành viên thành công');</script>";
            $VIEW_NAME = "list.php";
        } catch (Exception $exc) {
            echo "<script>alert('Đăng ký thành viên thất bại');</script>";
        }
    }else{
        echo "<script>alert('Đăng ký thành viên thất bại');</script>";
        $VIEW_NAME = "add.php";
    }

    //show dữ liệu
    $items = user_select_page('ma_kh',10);
    $VIEW_NAME = "list.php";
} else if (exist_param("btn_edit")) {
    #lấy dữ liệu từ form
    $ma_kh = $_REQUEST['ma_kh'];
    $khach_hang_info = user_select_by_id($ma_kh);
    extract($khach_hang_info);

    //show dữ liệu
    $items = user_select_all();
    $VIEW_NAME = "edit.php";
} else if (exist_param("btn_delete")) {

    $ma_kh = $_REQUEST['ma_kh'];
    user_delete($ma_kh);
    //hiển thị danh sách

    $items = user_select_page('ma_kh',10);
    $VIEW_NAME = "list.php";
} else if (exist_param("btn_delete_all")) {
    try {
        $arr_ma_kh = $_POST['ma_kh'];
        user_delete($arr_ma_kh);
        $MESSAGE = "Xóa thành công!";
    } catch (Exception $exc) {
        $MESSAGE = "Xóa thất bại!";
    }
    $items = user_select_page('ma_kh',10);
    $VIEW_NAME = "list.php";
} else if (exist_param("btn_update")) {
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
   
            $mat_khau=$_POST['mat_khau'];
    
        
  
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
            $items = user_select_page('ma_kh',10);
            $VIEW_NAME = "list.php";
        } catch (Exception $exc) {
            echo "<script>alert('Cập nhật thất bại!')</script>";
            $loi= $exc;
            $VIEW_NAME = "edit.php";
        }
    }else{
        echo "<script>alert('Cập nhật thất bại!')</script>";
       
       
        $VIEW_NAME = "edit.php";
    }

   
} else {
    $VIEW_NAME = "add.php";
}
// $VIEW_NAME = "user/list.php";
require "../layout.php";