<?php
require_once "../../global.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../content/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../content/styles/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Admin - SIXDO</title>
</head>

<body>
    <div class="wrapper">
        <div id="header">
            <div class="logo">
                <a href="#">SIXDO</a>
            </div>
            <ul class="menu">
                <li><a href="../../index.php"><i class="fa-solid fa-pager"></i> Xem trang web</a></li>
                <li><a href="<?= $ADMIN_URL ?>/trang-chinh/"><i class="fa-solid fa-house"></i> Trang chủ</a></li>
                <li><a href="<?= $ADMIN_URL ?>/danhmuc/"><i class="fa-solid fa-list"></i> Danh mục</a></li>
                <li><a href="<?= $ADMIN_URL ?>/products/"><i class="fa-solid fa-table-list"></i> Sản phẩm</a></li>
                <li><a href="<?= $ADMIN_URL ?>/user/"><i class="fa-solid fa-users"></i> Khách hàng</a></li>
                <li><a href="<?= $ADMIN_URL ?>/comment/"><i class="fa-solid fa-comment"></i> Bình luận</a></li>
                <li><a href="<?= $ADMIN_URL ?>/cart/"><i class="fa-solid fa-cart-shopping"></i> Đơn hàng</a></li>
                <li><a href="<?= $ADMIN_URL ?>/thongke"><i class="fa-solid fa-chart-simple"></i> Thống kê</a></li>
            </ul>
        </div>
        <?php include $VIEW_NAME ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="../../content/js/app.js"></script>
</body>

</html>