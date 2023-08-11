<?php
require_once "../../dao/pdo.php";
require_once "../../dao/loai.php";
require_once "../../dao/product.php";
require "../../global.php";

check_login();

// chech_login();

extract($_REQUEST);
$Ten_SP_error = $Price_error= $Price_Giam_error= $Mota_error= $ngay_nhap_error= $so_luot_xem_error = $ma_loai_error= $dac_biet_error="";
if (exist_param("btn_list")) {

    //show dữ liệu
    $items = product_select_page('Ma_SP', 10);
    
    $VIEW_NAME = "list.php";
} else if (exist_param("btn_insert")) {
    
    #lấy dữ liệu từ form
        

        // kiểm tra dữ liệu
        if (empty($_POST['ma_loai'])) {
            $ma_loai_error = "Không được để trống*";
        } else {
            $ma_loai = $_POST['ma_loai'];
        }
        if (empty($_POST['Ten_SP'])) {
                $Ten_SP_error = "Không được để trống*";
            } else {
                $Ten_SP = $_POST['Ten_SP'];
                if ( product_exist_ten_sp($Ten_SP)) {
                    $Ten_SP_error = "Tên sản phẩm đã tồn tại*";
                }
            
        }
        if (empty($_POST['Price'])) {
            $Price_error="Không được để trống*";
        }else{
            $Price = $_POST['Price'];
            if (!is_numeric($Price)) {
                $Price_error="Giá phải nhập số";
            }else if($Price<0){
                $Price_error="Giá phải nhập lớn hơn 0";
            }

        }
        if (empty($_POST['Price_Giam'])) {
            $Price_Giam_error="Không được để trống*";
        }else{
            $Price_Giam = $_POST['Price_Giam'];
            if (!is_numeric($Price_Giam)) {
                $Price_Giam_error="Giá phải nhập số";
            }else if($Price_Giam<0){
                $Price_Giam_error="Giá phải nhập lớn hơn 0";
            }

        }
        
            $dac_biet = $_POST['dac_biet'];
        
        
        if (empty($_POST['mo_ta'])) {
            $Mota_error = "Không được để trống*";
        } else {
            $Mota = $_POST['mo_ta'];
        }
        
        $so_luot_xem = $_POST['so_luot_xem'];
        
        if (empty($_POST['ngay_nhap'])) {
            $ngay_nhap_error = "Không được để trống*";
        } else {
            $ngay_nhap = $_POST['ngay_nhap'];
        }
        if (empty($Ten_SP_error) && empty($Price_error) && empty($Price_Giam_error) && empty($Mota_error) && empty($ngay_nhap_error)  && empty($ma_loai_error) ) {
            //insert vào db
            product_insert($Ten_SP, $Price, $Price_Giam, $Mota, $ngay_nhap, $so_luot_xem, $ma_loai, $dac_biet);

            $new_product=product_select_by_name($Ten_SP);
            extract($new_product);
            // Upload file lên host
            save_multiple_file('Image',"$UPLOAD_URL/products/",$Ma_SP );
            //show dữ liệu
            echo "<script>alert('Thêm sản phẩm thành công');</script>";
            $items = product_select_page('Ma_SP', 10);
            $VIEW_NAME = "list.php";
   
        }else{
            echo "<script>alert('Thêm sản phẩm thất bại');</script>";
            $loai_hang = loai_select_all('ASC');
            $VIEW_NAME = "add.php";
        }
  
    
} else if (exist_param("btn_edit")) {
    #lấy dữ liệu từ form
    $Ma_SP = $_REQUEST['Ma_SP'];
    $product_info = product_select_by_id($Ma_SP);
    extract($product_info);
    

    $loai_hang = loai_select_all('ASC');
    //show dữ liệu
    $VIEW_NAME = "edit.php";
} else if (exist_param("btn_delete")) {

    $Ma_SP = $_REQUEST['Ma_SP'];
    product_delete($Ma_SP);
    //hiển thị danh sách

    $items = product_select_page('Ma_SP', 10);
    $VIEW_NAME = "list.php";
}else if (exist_param("btn_img")) {

    $Ma_SP = $_REQUEST['Ma_SP'];
    $Image = img_select_page('id', 10,$Ma_SP);

    $VIEW_NAME = "img.php";
}else if (exist_param("btn_img_delete")) {
    

    $id = $_REQUEST['id'];
    img_detele($id);

    $Ma_SP = $_REQUEST['Ma_SP'];
    $Image = img_select_page('id', 10,$Ma_SP);
    $VIEW_NAME = "img.php";
}elseif (exist_param("btn_img_new")) {
    $Ma_SP = $_REQUEST['Ma_SP'];
    $VIEW_NAME = "add_img.php";
}elseif (exist_param("btn_img_add")) {
    

    $Ma_SP = $_POST['Ma_SP'];

    save_multiple_file('Image',"$UPLOAD_URL/products/",$Ma_SP );

    $Image = img_select_page('id', 10,$Ma_SP);
    $VIEW_NAME = "img.php";

}

 else if (exist_param("btn_update")) {

    // $Ten_SP = $_POST['Ten_SP'];
    // $Price = $_POST['Price'];
    // $Price_Giam = $_POST['Price_Giam'];
    // $ma_loai = $_POST['ma_loai'];
    // $dac_biet = $_POST['dac_biet'];
    // $so_luot_xem = $_POST['so_luot_xem'];
    // $Mota = $_POST['mo_ta'];
    // $ngay_nhap = $_POST['ngay_nhap'];
    // $Image = save_file('Image', "$UPLOAD_URL/products/");

    
    // //hiển thị danh sách

    // $items = product_select_page('Ma_SP', 10);
    // $VIEW_NAME = "list.php";
    
    #lấy dữ liệu từ form
        

        // kiểm tra dữ liệu
        if (empty($_POST['ma_loai'])) {
            $ma_loai_error = "Không được để trống*";
        } else {
            $ma_loai = $_POST['ma_loai'];
        }
        if (empty($_POST['Ten_SP'])) {
            $Ten_SP_error = "Không được để trống*";
        } else {
            $Ten_SP = $_POST['Ten_SP'];
            
        }
        if (empty($_POST['Price'])) {
            $Price_error="Không được để trống*";
        }else{
            $Price = $_POST['Price'];
            if (!is_numeric($Price)) {
                $Price_error="Giá phải nhập số";
            }else if($Price<0){
                $Price_error="Giá phải nhập lớn hơn 0";
            }

        }
        if (empty($_POST['Price_Giam'])) {
            $Price_Giam_error="Không được để trống*";
        }else{
            $Price_Giam = $_POST['Price'];
            if (!is_numeric($Price)) {
                $Price_Giam_error="Giá phải nhập số";
            }else if($Price<0){
                $Price_Giam_error="Giá phải nhập lớn hơn 0";
            }

        }
        $dac_biet = $_POST['dac_biet'];
        
        
        if (empty($_POST['mo_ta'])) {
            $Mota_error = "Không được để trống*";
        } else {
            $Mota = $_POST['mo_ta'];
        }
        
        $so_luot_xem = $_POST['so_luot_xem'];
        
        if (empty($_POST['ngay_nhap'])) {
            $ngay_nhap_error = "Không được để trống*";
        } else {
            $ngay_nhap = $_POST['ngay_nhap'];
        }
        $id= $_POST['id'];
        if (empty($Ten_SP_error) && empty($Price_error) && empty($Price_Giam_error) && empty($Mota_error) && empty($ngay_nhap_error)  && empty($ma_loai_error) ) {
            //insert vào db
            product_update($Ma_SP, $Ten_SP, $Price, $Price_Giam, $Mota, $ngay_nhap, $so_luot_xem, $ma_loai, $dac_biet);

            if (isset($_POST['Image'])) {
                // Upload file lên host
            $Image = save_file('Image', "$UPLOAD_URL/products/");
            img_update($id,$Image,$Ma_SP);
            }
            
           
            //show dữ liệu
            echo "<script>alert('Cập nhật sản phẩm thành công');</script>";
            $items = product_select_page('Ma_SP', 10);
            $VIEW_NAME = "list.php";
   
        }else{
            echo "<script>alert('Cập nhật sản phẩm thất bại');</script>";
            $loai_hang = loai_select_all('ASC');
            $VIEW_NAME = "edit.php";
        }
}
 else {
    $loai_hang = loai_select_all('ASC');
    $VIEW_NAME = "add.php";
}
require "../layout.php";