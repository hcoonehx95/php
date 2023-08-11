<?php

require "../../global.php";
require "../../dao/loai.php";
require "../../dao/product.php";
require "../../dao/user.php";
require "../../dao/comment.php";
check_login();


$loai = count(loai_select_all());
$hang_hoa = count(product_select_all());
$khach_hang = count(User_select_all());
$binh_luan = count(comment_select_all());

$VIEW_NAME = "trang-chinh/home.php";

require "../layout.php";