<div class="container-header">
    <div id="header">
        <div class="logo">
            <a href="<?= $SITE_URL ?>/trang-chinh/index.php" class="logo-link">
                <img src="../../content/images/logo.svg" alt="" class="logo-image" />
            </a>
        </div>
        <ul class="menu">
            <li class="menu-item">
                <a href="<?= $SITE_URL ?>/trang-chinh/index.php?product" class="menu-link">SẢN PHẨM</a>
            </li>
            <li class="menu-item">
                <a href="<?= $SITE_URL ?>/trang-chinh/index.php?gioi-thieu" class="menu-link">GIỚI THIỆU</a>
            </li>
            <li class="menu-item">
                <a href="<?= $SITE_URL ?>/trang-chinh/index.php?sixclub" class="menu-link">SIXCLUB</a>
            </li>
            <li class="menu-item"><a href="<?= $SITE_URL ?>/trang-chinh/index.php?tin-tuc" class="menu-link">TIN TỨC</a></li>
            <li class="menu-item"><a href="<?= $SITE_URL ?>/trang-chinh/index.php?lien-he" class="menu-link">LIÊN HỆ</a>
            </li>
        </ul>
        <div class="header-right">
            <div class="search">
                <i class="fa fa-search search-icon"></i>
                <form action="<?= $SITE_URL ?>/product/product.php" class="form-seach" method="POST">
                    <input type="text" class="search-input" name="keyword" placeholder="Tìm kiếm" />
                    <button type="submit" class="search-submit" name="timkiem">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
            <div class="cart">
                <div class="giohang"><a class="cart-icon" href="<?= $SITE_URL ?>/cart/list-cart.php"><i
                            class="fa-solid fa-cart-shopping"></i> (<?php
                        if (isset($_SESSION['total_cart'])) {
                            echo $_SESSION['total_cart'];
                        } else {
                            echo 0;
                        }
                        ?>)</a></div>
            </div>
            <div class="box-account">
                    <div class="account-img">
                        <?php if (isset($_SESSION['user']) && $_SESSION['user']['Image'] != "") { ?>
                        <img src=" <?= $UPLOAD_URL . "/users/" . $_SESSION['user']['Image'] ?>" width="30" height="30"
                            class="account-image icon" alt="">
                        <?php } else { ?>
                        <i class="fa fa-user account-icon icon"></i>
                        <?php }  ?>
                    </div>
                    <div class="account-content">
                        <span class="account-text">Xin chào!</span>
                        <?php
                        if (isset($_SESSION['user'])) { ?>
                        <div class=""><?= $_SESSION['user']['ho_ten'] ?></div>
                        <?php } else { ?>

                        <a href=" <?= $SITE_URL . '/account/dangnhap.php' ?>" class="account-link">Đăng
                            nhập</a>

                        <?php }  ?>

                        <div class="dropdown-account">
                            <?php
                            if (isset($_SESSION['user'])) { ?>

                            <?php if ($_SESSION['user']['vaitro'] == 1) { ?>
                            <a class="dropdown-item" href="<?= $ADMIN_URL . "/trang-chinh/" ?>">Quản trị
                                admin</a>
                            <?php }  ?>

                            <a class="dropdown-item" href="<?= $SITE_URL . '/account/cap-nhat-tk.php' ?>">Cập nhật tài
                                khoản</a>
                            <a class="dropdown-item" href="<?= $SITE_URL . '/account/doi-mk.php' ?>">Đổi
                                mật
                                khẩu</a>
                            <a class="dropdown-item" href="<?= $SITE_URL . '/account/dangnhap.php?btn_logout' ?>">Đăng
                                xuất</a>


                            <?php } else { ?>

                            <a class="dropdown-item" href="<?= $SITE_URL . '/account/dangnhap.php' ?>">Đăng
                                nhập</a>
                            <?php }  ?>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="header-mb">
        <div class="header-top">
            <div class="header-left">
                <i class="fa-solid fa-bars" id="menuBtn"></i>
                <i class="fa-solid fa-xmark" id="close-menu"></i>
            </div>
            <div class="logo">
                <a href="<?= $SITE_URL ?>/trang-chinh/index.php"><img src="../../content/images/logo.svg" alt="" /></a>
            </div>
            <div class="header-right">
                <div class="giohang">
                <a class="cart-icon" href="<?= $SITE_URL ?>/cart/list-cart.php"><i
                            class="fa-solid fa-cart-shopping"></i> (<?php
                        if (isset($_SESSION['total_cart'])) {
                            echo $_SESSION['total_cart'];
                        } else {
                            echo 0;
                        }
                        ?>)</a>
                </div>
            </div>
        </div>
        <ul class="menu menu-mb" id="show-menu">
            <form class="search" action="<?= $SITE_URL ?>/product/product.php" method="POST">
                <input type="text" class="search_control" name="keyword" placeholder="Tìm kiếm..." />
                <button type="submit" class="search_btn"  name="timkiem"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <li class="menu-mb-item"><a href="<?= $SITE_URL ?>/trang-chinh/index.php?product">SẢN PHẨM</a></li>
            <li class="menu-mb-item"><a href="<?= $SITE_URL ?>/trang-chinh/index.php?gioi-thieu">GIỚI THIỆU</a></li>
            <li class="menu-mb-item"><a href="<?= $SITE_URL ?>/trang-chinh/index.php?sixclub">SIXCLUB</a></li>
            <li class="menu-mb-item"><a href="<?= $SITE_URL ?>/trang-chinh/index.php?tin-tuc">TIN TỨC</a></li>
            <li class="menu-mb-item"><a href="<?= $SITE_URL ?>/trang-chinh/index.php?lien-he">LIÊN HỆ</a></li>
            <li class="menu-mb-item">
            <div class="box-account">
                    <div class="account-img">
                        <?php if (isset($_SESSION['user']) && $_SESSION['user']['Image'] != "") { ?>
                        <img src=" <?= $UPLOAD_URL . "/users/" . $_SESSION['user']['Image'] ?>" width="30" height="30"
                            class="account-image icon" alt="">
                        <?php } else { ?>
                        <?php }  ?>
                    </div>
                    <div class="account-content">
                        <?php
                        if (isset($_SESSION['user'])) { ?>
                        <div class=""><?= $_SESSION['user']['ho_ten'] ?></div>
                        <?php } else { ?>

                        <a href=" <?= $SITE_URL . '/account/dangnhap.php' ?>" class="account-link">Đăng
                            nhập</a>

                        <?php }  ?>

                        <div class="dropdown-account">
                            <?php
                            if (isset($_SESSION['user'])) { ?>

                            <?php if ($_SESSION['user']['vaitro'] == 1) { ?>
                            <a class="dropdown-item" href="<?= $ADMIN_URL . "/trang-chinh/" ?>">Quản trị
                                admin</a>
                            <?php }  ?>

                            <a class="dropdown-item" href="<?= $SITE_URL . '/account/cap-nhat-tk.php' ?>">Cập nhật tài
                                khoản</a>
                            <a class="dropdown-item" href="<?= $SITE_URL . '/account/doi-mk.php' ?>">Đổi
                                mật
                                khẩu</a>
                            <a class="dropdown-item" href="<?= $SITE_URL . '/account/dangnhap.php?btn_logout' ?>">Đăng
                                xuất</a>


                            <?php } else { ?>

                            <a class="dropdown-item" href="<?= $SITE_URL . '/account/dangnhap.php' ?>">Đăng
                                nhập</a>
                            <?php }  ?>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>