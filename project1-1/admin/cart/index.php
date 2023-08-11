<?php
require_once "../../dao/pdo.php";
require_once "../../dao/loai.php";
require_once "../../dao/cart.php";
require_once "../../dao/user.php";
require_once "../../dao/product.php";
require "../../global.php";

check_login();

// chech_login();

extract($_REQUEST);
$ma_kh_error=$tong_tien_error=$ghi_chu_error=$ngay_mua_error=$Ma_SP_error=$so_luong_error=$size_error=$mau_error="";
if (exist_param("btn_list")) {

    //show dữ liệu
    $items = cart_select_page('ma_hd', 10);
    
    $VIEW_NAME = "list.php";
} else if (exist_param("btn_insert")) {
    
    #lấy dữ liệu từ form
        

        // kiểm tra dữ liệu
        if (empty($_POST['ma_kh'])) {
            $ma_kh_error = "Không được để trống*";
        } else {
            $ma_kh = $_POST['ma_kh'];
        }
       
        if (empty($_POST['tong_tien'])) {
            $tong_tien_error="Không được để trống*";
        }else{
            $tong_tien = $_POST['tong_tien'];
            if (!is_numeric($tong_tien)) {
                $tong_tien_error="Giá phải nhập số";
            }else if($tong_tien<0){
                $tong_tien_error="Giá phải nhập lớn hơn 0";
            }

        }     
        
            $ghi_chu = $_POST['ghi_chu'];
       
        
       
        if (empty($_POST['ngay_mua'])) {
            $ngay_mua_error = "Không được để trống*";
        } else {
            $ngay_mua = $_POST['ngay_mua'];
        }
        if (empty($ma_kh_error) && empty($tong_tien_error) && empty($ghi_chu_error) && empty($ngay_mua_error)) {
            //insert vào db
            hoadon_insert($ma_kh,$tong_tien,$ngay_mua,$giao_hang,$thanh_toan,$ghi_chu);

            echo "<script>alert('Thêm hoá đơn thành công');</script>";
            $items = cart_select_page('ma_hd', 10);
            $VIEW_NAME = "list.php";
   
        }else{
            echo "<script>alert('Thêm hoá đơn thất bại');</script>";
            
            $VIEW_NAME = "add.php";
        }
  
    
} else if (exist_param("btn_edit")) {
    #lấy dữ liệu từ form
    $ma_hd = $_REQUEST['ma_hd'];
    $hoadon_info = hoadon_select_by_id($ma_hd);
    extract($hoadon_info);
    

   
    //show dữ liệu
    $VIEW_NAME = "edit.php";
} else if (exist_param("btn_delete")) {

    $ma_hd = $_REQUEST['ma_hd'];
    hoadon_delete($ma_hd);
    //hiển thị danh sách

    $items = cart_select_page('ma_hd', 10);
    $VIEW_NAME = "list.php";
}else if (exist_param("btn_hdct")) {

    $ma_hd = $_REQUEST['ma_hd'];

    $hdct = hdct_select_page('ma_hdct', 10,$ma_hd);

    $VIEW_NAME = "hdct.php";
}else if (exist_param("btn_hdct_delete")) {
    
    $ma_hdct = $_REQUEST['ma_hdct'];
    $ma_hd = $_REQUEST['ma_hd'];
    hoadonchitiet_delete($ma_hdct);

    $hdct = hdct_select_page('ma_hdct', 10,$ma_hd);
    $VIEW_NAME = "hdct.php";
  
}elseif (exist_param("btn_hdct_new")) {

    $ma_hd = $_REQUEST['ma_hd'];

    $VIEW_NAME = "add_hdct.php";
}elseif (exist_param("btn_hdct_add")) {
    
    
    $Ma_SP = $_POST['Ma_SP'];
    $so_luong = $_POST['so_luong'];
    $size = $_POST['size'];
    $mau = $_POST['mau'];

    hdct_insert($ma_hd,$Ma_SP,$so_luong,$size,$mau);
    
    //hiển thị danh sách

    $ma_hd = $_REQUEST['ma_hd'];
    $hdct = hdct_select_page('ma_hdct', 10,$ma_hd);

    $VIEW_NAME = "hdct.php";

}else if (exist_param("btn_hdct_edit")) {
    #lấy dữ liệu từ form
    $ma_hdct = $_REQUEST['ma_hdct'];
    
    $hdct=hoadonchitiet_select_by_id($ma_hdct);
    extract($hdct);
    

   
    //show dữ liệu
    $VIEW_NAME = "edit_hdct.php";
}
elseif(exist_param("btn_hdct_update")){
    

    $ma_hdct = $_POST['ma_hdct'];
    $ma_hd = $_POST['ma_hd'];
    $Ma_SP = $_POST['Ma_SP'];
    $so_luong = $_POST['so_luong'];
    $size = $_POST['size'];
    $mau = $_POST['mau'];

    hoadonchitiet_update($ma_hd,$Ma_SP,$so_luong,$size,$mau,$ma_hdct);
    
    //hiển thị danh sách

    $ma_hd = $_REQUEST['ma_hd'];
    $hdct = hdct_select_page('ma_hdct', 10,$ma_hd);

    $VIEW_NAME = "hdct.php";

}

 else if (exist_param("btn_update")) {

   
    
    // //hiển thị danh sách

    
    if (empty($_POST['ma_kh'])) {
        $ma_kh_error = "Không được để trống*";
    } else {
        $ma_kh = $_POST['ma_kh'];
    }
   
    if (empty($_POST['tong_tien'])) {
        $tong_tien_error="Không được để trống*";
    }else{
        $tong_tien = $_POST['tong_tien'];
        if (!is_numeric($tong_tien)) {
            $tong_tien_error="Giá phải nhập số";
        }else if($tong_tien<0){
            $tong_tien_error="Giá phải nhập lớn hơn 0";
        }

    }     
   
        $ghi_chu = $_POST['ghi_chu'];
    
    
   
    if (empty($_POST['ngay_mua'])) {
        $ngay_mua_error = "Không được để trống*";
    } else {
        $ngay_mua = $_POST['ngay_mua'];
    }
    $giao_hang=$_POST['giao_hang'];
    $thanh_toan=$_POST['thanh_toan'];
    if (empty($ma_kh_error) && empty($tong_tien_error) && empty($ghi_chu_error) && empty($ngay_mua_error)) {
        //insert vào db
        hoadon_update($ma_hd,$ma_kh,$tong_tien,$ngay_mua,$giao_hang,$thanh_toan,$ghi_chu);
        echo "<script>alert('Cập nhật hoá đơn thành công');</script>";
        $items = cart_select_page('ma_hd', 10);
        $VIEW_NAME = "list.php";

    }else{
        echo "<script>alert('Cập nhật hoá đơn thất bại');</script>";
        
        $VIEW_NAME = "edit.php";
    }
        

     
}
 else {
   
    $VIEW_NAME = "add.php";
}
require "../layout.php";