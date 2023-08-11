<div class="container">

    <div class="product-detail">
        <div class="product-detail-image">


            <ul class="list-image-detail">
                <?php


                foreach ($Image_select as $Image_select) {
                    extract($Image_select);
                ?>
                    <li class="item-image-detail">
                        <img src="<?= $UPLOAD_URL . '/products/' . $Image ?>" class="image-item active" alt="" />
                    </li>
                <?php
                }
                ?>
            </ul>
            <div class="img-show">
                <img class="image-show" src="<?= $UPLOAD_URL . '/products/' . $Image ?>" alt="" />
            </div>
        </div>
        <div class="product-detail-content">
            <h2 class="product-detail-name"><?= $Ten_SP ?></h2>
            <p class="price"><del><?= number_format($Price, 0, ',') ?>₫</del> - <?= number_format($Price_Giam, 0, ',') ?>₫
            </p>
            <form action="<?= $SITE_URL ?>/cart/index.php" method="POST" class="" id="add_hang_hoa">
                <div class="add-to-cart">
                        <input type="hidden" readonly name="Ma_SP" id="Ma_SP" class="form-control" value="<?= $Ma_SP ?>">
                    <div class="color">
                        <label>Color : </label>
                       <div class="product-selected product-color">
                       <a class="btn <?= $color== "red" ? "btn-active" : "" ?>" href="?color_change&Ma_SP=<?= $Ma_SP ?>&size=<?= $size ?>&so_luong=<?= $so_luong ?>&color=red"><span>Đỏ</span></a>
                        <a class="btn <?= $color== "black" ? "btn-active" : "" ?>" href="?color_change&Ma_SP=<?= $Ma_SP ?>&size=<?= $size ?>&so_luong=<?= $so_luong ?>&color=black"><span>Đen</span></a>
                        <a class="btn <?= $color== "blue" ? "btn-active" : "" ?>" href="?color_change&Ma_SP=<?= $Ma_SP ?>&size=<?= $size ?>&so_luong=<?= $so_luong ?>&color=blue"><span>Xanh</span></a>
                        <a class="btn <?= $color== "white" ? "btn-active" : "" ?>" href="?color_change&Ma_SP=<?= $Ma_SP ?>&size=<?= $size ?>&so_luong=<?= $so_luong ?>&color=white"><span>Trắng</span></a>
                       </div>
                    </div>
                    <div class="size">
                        <label>SIZE : </label>
                        <div class="product-selected product-size">
                        <a class="btn <?= $size== "s" ? "btn-active" : "" ?>" href="?size_change&Ma_SP=<?= $Ma_SP ?>&size=s&so_luong=<?= $so_luong ?>&color=<?= $color ?>"><span>S</span></a>
                        <a class="btn  <?= $size== "m" ? "btn-active" : "" ?>" href="?size_change&Ma_SP=<?= $Ma_SP ?>&size=m&so_luong=<?= $so_luong ?>&color=<?= $color ?>"><span>M</span></a>
                        <a class="btn  <?= $size== "l" ? "btn-active" : "" ?>" href="?size_change&Ma_SP=<?= $Ma_SP ?>&size=l&so_luong=<?= $so_luong ?>&color=<?= $color ?>"><span>L</span></a>
                        <a class="btn  <?= $size== "xl" ? "btn-active" : "" ?>" href="?size_change&Ma_SP=<?= $Ma_SP ?>&size=xl&so_luong=<?= $so_luong ?>&color=<?= $color ?>"><span>XL</span></a>
                        </div>
                    </div>
                    <div class="quantity">
                        <label for="so_luong" class="form-label">Số lượng</label>
                        <div class="product-selected">
                            <a class="btn-quantity" href="?so_luong_giam&Ma_SP=<?= $Ma_SP ?>&size=<?= $size ?>&so_luong=<?= $so_luong ?>&color=<?= $color ?>"><span>-</span></a>
                            <input type="text" name="so_luong" id="so_luong" class="so-luong" value="<?= $so_luong ?>">
                            <a class="btn-quantity" href="?so_luong_tang&Ma_SP=<?= $Ma_SP ?>&size=<?= $size ?>&so_luong=<?= $so_luong ?>&color=<?= $color ?>"><span>+</span></a>
                        </div>
                    </div>
                </div>
            </form>

            <a class="btn-cart" href="<?= $SITE_URL . "/cart/index.php?Ma_SP=" . $Ma_SP . "&size=" . $size . "&so_luong=" . $so_luong ?>&color=<?= $color ?>">Thêm vào giỏ hàng</a>
            <ul class="product_rassurance">
                <li class="product_rassurance-item">
                    <img src="../../content/images/giaohang.jpg" alt="">
                    <p>Chính sách giao hàng</p>
                </li>
                <li class="product_rassurance-item">
                    <img src="../../content/images/doi-tra.png" alt="">
                    <p>Chính sách đổi trả</p>
                </li>
                <li class="product_rassurance-item">
                    <img src="../../content/images/hailong.png" alt="">
                    <p>Chính sách ưu đãi</p>
                </li>
            </ul>
            <div class="reviews_product p-3 mb-2 ">
                3 reviews
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                (4/5)
                <a class="pull-right" href="#reviews">Xem tất cả đánh giá</a>
            </div>
        </div>
    </div>
    <div class="product-mota">
        <h1 class="product-heading"><i class="fa fa-align-justify" style="padding-right: 10px;"></i>MÔ TẢ SẢN PHẨM</h1>
        <p class="product-text"><?= $Mota ?></p>
    </div>
    
    <div class="product-all">
            <div class="title">
                 <h3 class="title-text">
                     <span>SẢN PHẨM TƯƠNG TỰ</span>
                 </h3>
            </div>
            <div class="product-list-all">
                <?php foreach ($items as $items) :
                    extract($items);
                    $Image_select1=name_img_select_one_by_MaSP($Ma_SP);
                    if (isset($Image_select1)) {
                        extract($Image_select1);
                        $Image1=$Image;
                    }
                    $Image_select2=name_img_select_top2_by_MaSP($Ma_SP);
                    if (isset($Image_select2)) {
                        extract($Image_select2);
                        $Image2=$Image;
                    }

                ?>
                <div class="product-item">
                     <a href="<?= $SITE_URL . '/product/product-detail.php?Ma_SP=' . $Ma_SP ?>" class="product-image">
                        <img src="	<?= $UPLOAD_URL . '/products/' . $Image1 ?>" alt=""
                            class="product-image-first" />
                        <img src="	<?= $UPLOAD_URL . '/products/' . $Image2 ?>" alt=""
                            class="product-image-second" />
                     </a>
                        <p class="product-price"><del><?= number_format($Price, 0, ',') ?> ₫   </del> <?= number_format($Price_Giam, 0, ',') ?> ₫</p>
                        <h4 class="product-name"><?= $Ten_SP ?></h4>
                </div>
                <?php endforeach; ?>
            </div>
            <ul class="pagination">
                <?php for ($i = 1; $i <= $_SESSION['total_page']; $i++) { ?>
                <li class="page-item <?= $_SESSION['page'] == $i ? 'active' : '' ?>">
                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                </li>
                <?php } ?>
            </ul>
         </div>
    <?php require("./comment.php") ?>
</div>