 <!-- Banner -->
 <div class="banner-wrapper">
     <a href="#" class="banner-link"><img src="../../content/images/banner.jpg" alt="" /></a>
 </div>
 <!-- content -->
 <div class="container">
     <div class="content-product">
         <div class="loc">
             <i class="fa-sharp fa-solid fa-list-check"></i> LỌC</p>
         </div>
         <div class="category">
             <h3 class="category-title">
                 <i class="fa-solid fa-bars"></i> DANH MỤC SẢN PHẨM
             </h3>
             <ul class="category-list">
             <?php foreach ($ds_loai as $loai) :  ?>
                 <li class="category-item"><a href="<?= $SITE_URL . "/product/product.php?ma_loai=" . $loai['ma_loai'] ?>">
                        <?= $loai['ten_loai'] ?></a></li>
                 
                 <?php endforeach; ?>
             </ul>
             <span id="close-sidebar"><i class="fa-solid fa-xmark"></i></span>
         </div>
         <div class="product-all">
            <div class="title">
                 <h3 class="title-text">
                     <span><?= $title_site ?></span>
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
     </div>
 </div>