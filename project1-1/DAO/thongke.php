<?php

require_once 'pdo.php';
function thong_ke_product()
{
    $sql = "SELECT lo.ma_loai, lo.ten_loai,"
        . " COUNT(*) so_luong,"
        . " MIN(hh.Price) gia_min,"
        . " MAX(hh.Price) gia_max,"
        . " AVG(hh.Price) gia_avg"
        . " FROM products hh "
        . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
        . " GROUP BY lo.ma_loai, lo.ten_loai";
    return pdo_query($sql);
}
function thong_ke_comment()
{
    $sql = "SELECT hh.Ma_SP, hh.Ten_SP,"
        . " COUNT(*) so_luong,"
        . " MIN(bl.ngay_bl) cu_nhat,"
        . " MAX(bl.ngay_bl) moi_nhat"
        . " FROM comments bl "
        . " JOIN products hh ON hh.Ma_SP=bl.Ma_SP "
        . " GROUP BY hh.Ma_SP, hh.Ten_SP"
        . " HAVING so_luong > 0";
    return pdo_query($sql);
}