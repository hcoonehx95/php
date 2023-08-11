<?php
require_once("pdo.php");

function product_insert($Ten_SP, $Price, $Price_Giam,  $Mota, $ngay_nhap, $so_luot_xem, $ma_loai, $dac_biet)
{
    $sql = "INSERT INTO products(Ten_SP, Price, Price_Giam,  Mota, ngay_nhap, so_luot_xem, ma_loai, dac_biet)  VALUES(?,?,?,?,?,?,?,?)";
    pdo_execute($sql, $Ten_SP, $Price, $Price_Giam,  $Mota, $ngay_nhap, $so_luot_xem, $ma_loai, $dac_biet == 0);
}
function product_update($Ma_SP, $Ten_SP, $Price, $Price_Giam,  $Mota, $ngay_nhap, $so_luot_xem, $ma_loai, $dac_biet)
{
    $sql = "UPDATE products SET Ten_SP=?, Price=?, Price_Giam=?,  Mota=?, ngay_nhap=?, so_luot_xem=?, ma_loai=?, dac_biet=? WHERE Ma_SP=?";
    pdo_execute($sql, $Ten_SP, $Price, $Price_Giam,  $Mota, $ngay_nhap, $so_luot_xem, $ma_loai, $dac_biet, $Ma_SP);
}

function product_delete($Ma_SP)
{
    $sql = "DELETE FROM products WHERE Ma_SP=?";
    $sql_img = "DELETE FROM img WHERE Ma_SP=?";
    $sql_comment = "DELETE FROM comments WHERE Ma_SP=?";
    if (is_array($Ma_SP)) {
        foreach ($Ma_SP as $ma) {
            pdo_execute($sql_img,$ma);
            pdo_execute($sql_comment, $ma);
            pdo_execute($sql, $ma);

        }
    } else {
        pdo_execute($sql_img,$Ma_SP);
        pdo_execute($sql_comment, $Ma_SP);
        pdo_execute($sql, $Ma_SP);
    }
}

function product_select_all()
{
    $sql = "SELECT * FROM products ORDER BY Ma_SP desc";
    return pdo_query($sql);
}

function product_select_by_id($Ma_SP)
{
    $sql = "SELECT * FROM products WHERE Ma_SP=?";
    return pdo_query_one($sql, $Ma_SP);
}

function product_select_by_name($Ten_SP)
{
    $sql = "SELECT * FROM products WHERE Ten_SP=?";
    return pdo_query_one($sql, $Ten_SP);
}
function product_exist($Ma_SP)
{
    $sql = "SELECT count(*) FROM products WHERE Ma_SP=?";
    return pdo_query_value($sql, $Ma_SP) > 0;
}
function product_exist_add($Ten_SP)
{
    $sql = "SELECT count(*) FROM products WHERE Ten_SP";
    return pdo_query_value($sql, $Ten_SP) > 0;
}
function product_exist_ten_sp($Ten_SP)
{
    $sql = "SELECT count(*) FROM products WHERE Ten_SP=?";
    return pdo_query_value($sql, $Ten_SP) > 0;
}

function product_tang_so_luot_xem($Ma_SP)
{
    $sql = "UPDATE products SET so_luot_xem = so_luot_xem + 1 WHERE Ma_SP=?";
    pdo_execute($sql, $Ma_SP);
}
function product_select_top10()
{
    $sql = "SELECT * FROM products WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0, 10";
    return pdo_query($sql);
}
function product_select_by_loai($ma_loai)
{
    $sql = "SELECT * FROM products WHERE ma_loai=?";
    return pdo_query($sql, $ma_loai);
}
function hang_hoa_select_keyword($keyword)
{
    $sql = "SELECT * FROM products hh "
        . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
        . " WHERE Ten_SP LIKE ? OR ten_loai LIKE ?";
    return pdo_query($sql, '%' . $keyword . '%', '%' . $keyword . '%');
}
function product_select_dac_biet()
{
    $sql = "SELECT * FROM products WHERE dac_biet=1";
    return pdo_query($sql);
}
function product_select_page($order, $limit)
{
    if (!isset($_REQUEST['page'])) {
        $_SESSION['page'] = 1;
    }
    if (!isset($_SESSION['total_page'])) {
        $_SESSION['total_page'] = 1;
    }
    $_SESSION['total_pro'] = pdo_query_value("SELECT count(*) FROM products");
    if (exist_param("page")) {
        $_SESSION['page'] = $_REQUEST['page'];
    }
    $begin = ($_SESSION['page'] - 1) * $limit;
    $_SESSION['total_page'] = ceil($_SESSION['total_pro'] / $limit);
    $sql = "SELECT * FROM products ORDER BY $order DESC LIMIT $begin,$limit";
    return pdo_query($sql);
}

function save_img($Image,$Ma_SP){
    $sql = "INSERT INTO img(Image, Ma_SP) VALUES(?, ?)";
    pdo_execute($sql,$Image, $Ma_SP);
}
//Lưu multiple file
function save_one_file($fieldname, $target_dir)
{
    $file_uploaded = $_FILES[$fieldname];
    $file_name = basename($file_uploaded['name']);
    $target_path = $target_dir . $file_name;
    move_uploaded_file($file_uploaded['tmp_name'], $target_path);
    return $file_name;
}
function save_multiple_file($fieldname, $target_dir,$Ma_SP){
    
    foreach ($_FILES[$fieldname]['name'] as $name => $value) {
        $file_name = stripslashes($_FILES[$fieldname]['name'][$name]);
        $name_img = $_FILES[$fieldname]['tmp_name'][$name];
        $target_path = $target_dir . $file_name;
        move_uploaded_file($_FILES[$fieldname]['tmp_name'][$name], $target_path);
        save_img($file_name,$Ma_SP);
    }

}
// ===================Truy vấn ảnh sản phẩm=======================//
function img_select_all_by_id($id){
    $sql= "SELECT * FROM img WHERE id =? ORDER BY id desc";
    return pdo_query($sql,$id);
}
function img_select_one_by_id($id){
    $sql = "SELECT Image FROM img WHERE id=? ";
    return pdo_query_one($sql, $id);
}
function img_update($id,$Image,$Ma_SP){
    $sql = "UPDATE img SET Image=?, Ma_SP=? WHERE id=?";
    pdo_execute($sql,$Image,$Ma_SP,$id);
}
function img_select_all_by_MaSP($Ma_SP){
    $sql= "SELECT * FROM img WHERE Ma_SP =? ORDER BY id desc";
    return pdo_query($sql,$Ma_SP);

}
function img_select_one_by_MaSP($Ma_SP){
    $sql = "SELECT * FROM img WHERE Ma_SP=? LIMIT 1";
    return pdo_query_one($sql, $Ma_SP);
}
function name_img_select_one_by_MaSP($Ma_SP){
    $sql = "SELECT Image FROM img WHERE Ma_SP=? LIMIT 1";
    return pdo_query_one($sql, $Ma_SP);
}
function img_select_top2_by_MaSP($Ma_SP){
    $sql = "SELECT * FROM img WHERE Ma_SP=? LIMIT 1,1";
    return pdo_query_one($sql, $Ma_SP);
}
function name_img_select_top2_by_MaSP($Ma_SP){
    $sql = "SELECT Image FROM img WHERE Ma_SP=? LIMIT 1,1";
    return pdo_query_one($sql, $Ma_SP);
}
function img_detele($id){
    $sql_img = "DELETE FROM img WHERE id=?";
    if (is_array($id)) {
        foreach ($id as $ma) {
            pdo_execute($sql_img,$ma);
            
        }
    } else {
        pdo_execute($sql_img,$id);
        
    }
}
function img_select_page($order, $limit,$Ma_SP)
{
    if (!isset($_REQUEST['page'])) {
        $_SESSION['page'] = 1;
    }
    if (!isset($_SESSION['total_page'])) {
        $_SESSION['total_page'] = 1;
    }
    $_SESSION['total_pro'] = pdo_query_value("SELECT count(*) FROM img");
    if (exist_param("page")) {
        $_SESSION['page'] = $_REQUEST['page'];
    }
    $begin = ($_SESSION['page'] - 1) * $limit;
    $_SESSION['total_page'] = ceil($_SESSION['total_pro'] / $limit);
    $sql = "SELECT * FROM img WHERE Ma_SP=? ORDER BY $order ASC LIMIT $begin,$limit";
    return pdo_query($sql,$Ma_SP);
}