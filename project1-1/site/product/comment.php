<div class="comment" id="reviews">
    <h1 class="product-heading">
        <i class=" fa fa-comment" style="padding-right: 10px;"></i>ĐÁNH GIÁ
    </h1>
    <div class="card-body">
        <?php foreach ($binh_luan_list as $bl) : ?>
        <div class="review">
            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
            <meta itemprop="datePublished" content="01-01-2016"><?= $bl['ngay_bl'] ?>

            <?php for ($i = 1; $i <= $bl['rating']; $i++) {
                    echo '<span class="review_rating fa fa-star"></span>';
                } ?>

            by <b><?= $bl['ho_ten'] ?></b>
            <img width="40" height="40" class="comment-img" src="<?= $UPLOAD_URL . "/users/" . $bl['Image'] ?>" />
            <p class="blockquote">
            </p>
        </div>
        <p class="mb-0"><?= $bl['noi_dung'] ?></p>
        <hr>
        <?php endforeach ?>
        <nav aria-label="..." class="text-center">

            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $_SESSION['total_page']; $i++) { ?>

                <li class="page-item <?= $_SESSION['page'] == $i ? 'active' : '' ?>">
                    <a class="page-link" href="?ma_hh=<?= $ma_hh ?>&page=<?= $i ?>"><?= $i ?></a>
                </li>

                <?php } ?>

            </ul>
        </nav>
    </div>
    <?php

    if (!isset($_SESSION['user'])) {
        echo '<h5 class="text-center"><i class="text-danger">Đăng nhập để bình luận về sản phẩm này</i></h5>';
    } else {

    ?>
    <div class="comment-box text-center">
        <h4>Để lại bình luận</h4>
        <form action="" method="POST">
            <div class="rating">
                <input type="radio" name="rating" value="5" id="5" checked>
                <label for="5">☆</label>
                <input type="radio" name="rating" value="4" id="4">
                <label for="4">☆</label>
                <input type="radio" name="rating" value="3" id="3">
                <label for="3">☆</label>
                <input type="radio" name="rating" value="2" id="2">
                <label for="2">☆</label>
                <input type="radio" name="rating" value="1" id="1">
                <label for="1">☆</label>
            </div>
            <div class="comment-area">
                <textarea class="form-control" name="noi_dung" placeholder="Nội dung..." rows="4"></textarea>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="submit" style="width: 300px; margin-top: 30px;">Đăng bình luận
                    <i class="fa fa-long-arrow-right ml-1"></i>
                </button>
            </div>
        </form>
    </div>
    <?php
    } ?>
</div>
</div>