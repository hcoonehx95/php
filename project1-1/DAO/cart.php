<?php
require_once("pdo.php");

function hoadon_insert($ma_kh,$tong_tien,$ngay_mua,$giao_hang,$thanh_toan,$ghi_chu)
{
    $sql = "INSERT INTO hoadon( ma_kh, tong_tien, ngay_mua, giao_hang,thanh_toan, ghi_chu)  VALUES(?,?,?,?,?,?)";
    pdo_execute($sql,$ma_kh,$tong_tien,$ngay_mua,$giao_hang,$thanh_toan,$ghi_chu);
}
function hdct_insert($ma_hd,$Ma_SP,$so_luong,$size,$mau)
{
    $sql = "INSERT INTO hoadonchitiet(ma_hd,Ma_SP,so_luong,size,mau)  VALUES(?,?,?,?,?)";
    pdo_execute($sql,$ma_hd,$Ma_SP,$so_luong,$size,$mau);
}

function hoadon_update($ma_hd,$ma_kh,$tong_tien,$ngay_mua, $giao_hang, $thanh_toan, $ghi_chu)
{
    $sql = "UPDATE hoadon SET ma_kh=?, tong_tien=?, ngay_mua=?, giao_hang=?, thanh_toan=?, ghi_chu=? WHERE ma_hd=?";
    pdo_execute($sql,$ma_kh,$tong_tien,$ngay_mua,$giao_hang,$thanh_toan,$ghi_chu,$ma_hd);
}
function hoadonchitiet_update($ma_hd,$Ma_SP,$so_luong,$size,$mau,$ma_hdct)
{
    $sql = "UPDATE hoadonchitiet SET ma_hd=?, Ma_SP=?, so_luong=?, size=?, mau=? WHERE ma_hdct=?";
    pdo_execute($sql,$ma_hd,$Ma_SP,$so_luong,$size,$mau,$ma_hdct);
}

function hoadon_delete($ma_hd)
{
    $sql = "DELETE FROM hoadon WHERE ma_hd=?";
    $sql_hdct = "DELETE FROM hoadonchitiet WHERE ma_hd=?";
    if (is_array($ma_hd)) {
        foreach ($ma_hd as $ma) {
            pdo_execute($sql_hdct,$ma);
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql_hdct,$ma_hd);
        pdo_execute($sql, $ma_hd);
        
    }
}
function hoadonchitiet_delete($ma_hdct)
{
    $sql = "DELETE FROM hoadonchitiet WHERE ma_hdct=?";
    if (is_array($ma_hdct)) {
        foreach ($ma_hdct as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $ma_hdct);
    }
}

function hoadon_select_all()
{
    $sql = "SELECT * FROM hoadon ORDER BY ma_hd desc";
    return pdo_query($sql);
}
function hoadon_select_one_by_makh($ma_kh)
{
    $sql = "SELECT * FROM hoadon WHERE ma_kh=? ORDER BY ma_hd DESC LIMIT 1";
    return pdo_query_one($sql,$ma_kh);
}
function hoadon_select_all_by_makh($ma_kh,$order, $limit)
{   
    if (!isset($_REQUEST['page'])) {
        $_SESSION['page'] = 1;
    }
    if (!isset($_SESSION['total_page'])) {
        $_SESSION['total_page'] = 1;
    }
    $_SESSION['total_pro'] = pdo_query_value("SELECT count(*) FROM hoadon WHERE ma_kh=?",$ma_kh);
    if (exist_param("page")) {
        $_SESSION['page'] = $_REQUEST['page'];
    }
    $begin = ($_SESSION['page'] - 1) * $limit;
    $_SESSION['total_page'] = ceil($_SESSION['total_pro'] / $limit);
    $sql = "SELECT * FROM hoadon WHERE ma_kh=? ORDER BY $order DESC LIMIT $begin,$limit";
    return pdo_query($sql,$ma_kh);
    
}
function hoadonchitiet_select_all()
{
    $sql = "SELECT * FROM hoadonchitiet ORDER BY ma_hdct desc";
    return pdo_query($sql);
}

function hoadon_select_by_id($ma_hd)
{
    $sql = "SELECT * FROM hoadon WHERE ma_hd=?";
    return pdo_query_one($sql, $ma_hd);
}
function hoadonchitiet_select_by_id($ma_hdct)
{
    $sql = "SELECT * FROM hoadonchitiet WHERE ma_hdct=?";
    return pdo_query_one($sql, $ma_hdct);
}

function hoadon_exist($ma_hd)
{
    $sql = "SELECT count(*) FROM hoadon WHERE ma_hd=?";
    return pdo_query_value($sql, $ma_hd) > 0;
}
function hoadonchitiet_exist($ma_hdct)
{
    $sql = "SELECT count(*) FROM hoadonchitiet WHERE ma_hdct=?";
    return pdo_query_value($sql, $ma_hdct) > 0;
}
function cart_select_page($order, $limit)
{
    if (!isset($_REQUEST['page'])) {
        $_SESSION['page'] = 1;
    }
    if (!isset($_SESSION['total_page'])) {
        $_SESSION['total_page'] = 1;
    }
    $_SESSION['total_pro'] = pdo_query_value("SELECT count(*) FROM hoadon");
    if (exist_param("page")) {
        $_SESSION['page'] = $_REQUEST['page'];
    }
    $begin = ($_SESSION['page'] - 1) * $limit;
    $_SESSION['total_page'] = ceil($_SESSION['total_pro'] / $limit);
    $sql = "SELECT * FROM hoadon ORDER BY $order DESC LIMIT $begin,$limit";
    return pdo_query($sql);
}
function hdct_select_page($order, $limit,$ma_hd)
{
    if (!isset($_REQUEST['page'])) {
        $_SESSION['page'] = 1;
    }
    if (!isset($_SESSION['total_page'])) {
        $_SESSION['total_page'] = 1;
    }
    $_SESSION['total_pro'] = pdo_query_value("SELECT count(*) FROM hoadonchitiet");
    if (exist_param("page")) {
        $_SESSION['page'] = $_REQUEST['page'];
    }
    $begin = ($_SESSION['page'] - 1) * $limit;
    $_SESSION['total_page'] = ceil($_SESSION['total_pro'] / $limit);
    $sql = "SELECT * FROM hoadonchitiet WHERE ma_hd=? ORDER BY $order ASC LIMIT $begin,$limit";
    return pdo_query($sql,$ma_hd);
}
?>
