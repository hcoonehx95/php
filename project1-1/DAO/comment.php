<?php
require_once 'pdo.php';
function comment_insert( $Ma_SP, $noi_dung, $ngay_bl, $rating,$ma_kh)
{
    $sql = "INSERT INTO comments( Ma_SP, noi_dung, ngay_bl, rating, ma_kh) VALUES (?,?,?,?,?)";

    pdo_execute($sql, $Ma_SP, $noi_dung, $ngay_bl, $rating, $ma_kh);
}
function comment_update($ma_bl, $ma_kh, $Ma_SP, $noi_dung, $ngay_bl)
{
    $sql = "UPDATE comments SET  ma_kh=?,Ma_SP=?,noi_dung=?,ngay_bl=? WHERE ma_bl=?";
    pdo_execute($sql, $ma_kh, $Ma_SP, $noi_dung, $ngay_bl, $ma_bl);
}
function comment_delete($ma_bl)
{
    $sql = "DELETE FROM comments WHERE ma_bl=?";
    if (is_array($ma_bl)) {
        foreach ($ma_bl as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $ma_bl);
    }
}
function comment_select_all()
{
    $sql = "SELECT * FROM comments bl ORDER BY ngay_bl DESC";
    return pdo_query($sql);
}
function comment_select_by_id($ma_bl)
{
    $sql = "SELECT * FROM comments WHERE ma_bl=?";
    return pdo_query_one($sql, $ma_bl);
}
function comment_exist($ma_bl)
{
    $sql = "SELECT count(*) FROM comments WHERE ma_bl=?";
    return pdo_query_value($sql, $ma_bl) > 0;
}
function comment_select_by_product($Ma_SP, $limit = 10)
{
    if (!isset($_REQUEST['page'])) {
        $_SESSION['page'] = 1;
    }
    if (!isset($_SESSION['total_page'])) {
        $_SESSION['total_page'] = 1;
    }
    $query = "SELECT count(*) FROM comments b 
    JOIN products h ON h.Ma_SP = b.Ma_SP 
    WHERE b.Ma_SP = $Ma_SP ORDER BY ma_bl DESC";

    $_SESSION['total_bl'] = pdo_query_value($query);
    if (exist_param("page")) {
        $_SESSION['page'] = $_REQUEST['page'];
    }
    $begin = ($_SESSION['page'] - 1) * $limit;
    $_SESSION['total_page'] = ceil($_SESSION['total_bl'] / $limit);
    $sql = "SELECT b.*, h.Ten_SP, k.ho_ten, k.Image FROM comments b 
    JOIN products h ON h.Ma_SP = b.Ma_SP 
    JOIN user k ON k.ma_kh =b.ma_kh WHERE b.Ma_SP=? ORDER BY ma_bl DESC LIMIT $begin,$limit";
    return pdo_query($sql, $Ma_SP);
}