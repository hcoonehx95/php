<?php


?>
<section id="main">
    <div class="main-header">
    <div class="account-img">
                        <?php if (isset($_SESSION['user']) && $_SESSION['user']['Image'] != "") { ?>
                        <img src=" <?= $UPLOAD_URL . "/users/" . $_SESSION['user']['Image'] ?>" width="30" height="30"
                            class="account-image icon" alt="">
                        <?php } else { ?>
                        <?php }  ?>
                    </div>
    </div>
    <div class="content">
        <h1 class="heading">DANH SÁCH LOẠI HÀNG</h1>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header text-center bg-dark text-white text-uppercase">Cập nhật hàng hóa</div>
                    <div class="card-body">
                        <form action="index.php?btn_img_add" method="POST" enctype="multipart/form-data"
                            id="update_hang_hoa">
                            <div class="row">
                               
                                
                                <div class="form-group col-sm-4">
                                    <label for="Ma_SP" class="form-label">Mã hàng hóa</label>
                                    <input  type="" name="Ma_SP" id="Ma_SP" readonly class="form-control"
                                        value="<?= $Ma_SP ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    <div class="row align-items-center">
                                        <div class="col-sm-8">
                                            <label for="Image" class="form-label">Ảnh sản phẩm</label>
                                            <input type="file"  name="Image[]" id="Image"  class="form-control" multiple="multiple">

                                        </div>
                                        
                                    </div>
                                </div>
                              
                            </div>
                            <div class="row">


                            </div>
                            

                            <div class="mb-3 text-center">
                                <input type="reset" value="Nhập lại" class="btn btn-danger mr-3">
                                <input type="submit" name="btn_img_add" value="Thêm ảnh" class="btn btn-primary mr-3">
                                <a href="index.php?btn_list"><input type="button" class="btn btn-success"
                                        value="Danh sách"></a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>