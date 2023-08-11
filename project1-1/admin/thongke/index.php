<?php
require_once "../../global.php";
require_once "../../dao/thongke.php";
//--------------------------------//

// check_login();


if (exist_param("chart")) {
    $VIEW_NAME = "chart.php";
} else {
    $VIEW_NAME = "list.php";
}
$items = thong_ke_product();
require "../layout.php";