<?php
require '../../global.php';
require '../../dao/product.php';
require '../../dao/user.php';
require '../../dao/cart.php';
//-------------------------------//
extract($_REQUEST);
// var_dump($_REQUEST);
// die;
$ho_ten_error=$ma_kh_error=$mau_khau_error=$mau_khau2_error=$email_error=$sdt_error=$tinh_thanhpho_error=$quan_huyen_error=$xa_phuong_error=$dia_chi_error=$Image_error=$loi="";
if (exist_param("form_invoice")) {
    if (isset($_SESSION['user'])) {
        $id = $_SESSION['user'];
        $kh = user_select_by_id($id['ma_kh']);
        extract($kh);
        $VIEW_NAME = "../cart/form-invoice.php";
    } else {
        header("location:" . $SITE_URL . "/account/dangnhap.php");
    }

} else {
    $VIEW_NAME = "../cart/view_cart.php";
}
if(exist_param("btn_insert_cart")){
   
    if(empty($sdt_error)&&empty($ho_ten_error)&&empty($email_error)&&empty($dia_chi_error)){
        if (isset($_SESSION['user'])) {
            $id = $_SESSION['user'];
            $kh = user_select_by_id($id['ma_kh']);
            if (isset($kh)) {
                extract($kh);
            }
            $ngay_mua = date_format(date_create(), 'Y-m-d');
            $giao_hang="NO";
            $thanh_toan="NO";
            $ghi_chu="";
            if (isset($_SESSION['cart'])){
                $tong_tien=0;
                foreach ($_SESSION['cart'] as $Ma_SP => $item) {

                    $tong_tien=$tong_tien+$item['thanh_tien'];

                }

            }
            try {
                hoadon_insert($ma_kh,$tong_tien,$ngay_mua,$giao_hang,$thanh_toan,$ghi_chu);
                $hoa_don=hoadon_select_one_by_makh($ma_kh);
                
                if (isset($hoa_don)) {
                    extract($hoa_don);
                    $ma_hd1=$ma_hd;
                }
                foreach ($_SESSION['cart'] as $Ma_SP => $item) {
                    $so_luong=$item['so_luong'];
                    $size=$item['size'];
                    $mau=$item['color'];
                    hdct_insert($ma_hd1,$Ma_SP,$so_luong,$size,$mau);
                }
                
                echo "<script>alert('thanh toán thành công !')</script>";

                


                unset($_SESSION['cart']);
                unset($_SESSION['total_cart']);
                $id = $_SESSION['user'];
                $kh = user_select_by_id($id['ma_kh']);
                extract($kh);
                $items=hoadon_select_all_by_makh($ma_kh,'ma_hd', 10);
            
                header("location:" . $SITE_URL . "/account/donhang.php");
                
                
                
            } catch (Exception $exc) {
                echo "<script>alert('Thanh toán thất bại!')</script>";
                echo $exc;
                $loi=$exc;
                if (isset($_SESSION['user'])) {
                    $id = $_SESSION['user'];
                    $kh = user_select_by_id($id['ma_kh']);
                    extract($kh);
                    $VIEW_NAME = "../cart/form-invoice.php";
                } else {
                    header("location:" . $SITE_URL . "/account/dangnhap.php");
                }

            }
            
            

        }
    }else{
        if (isset($_SESSION['user'])) {
            $id = $_SESSION['user'];
            $kh = user_select_by_id($id['ma_kh']);
            extract($kh);
            $VIEW_NAME = "../cart/form-invoice.php";
        } else {
            header("location:" . $SITE_URL . "/account/dangnhap.php");
        }
    }
    
}
require '../layout.php';