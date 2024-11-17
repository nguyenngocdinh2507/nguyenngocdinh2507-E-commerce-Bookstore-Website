<?php
    include('./config/config.php');
?>
<form action="" method="get">
<div class="product" id="layoutGroup1">
    <div class="row block" id="module_publishing">
        <h2>
            <a class="title" href="/allProduct.php?page=1" title="Sắp phát hành">Sách mới<span class="b-main__category-arrow"></span></a>
            <a class="more" href="/allProduct.php?page=1" title="Xem tất cả">Xem tất cả</a>
        </h2>
        <?php 
        $sql = 'select * from t_san_pham';

        $query = mysqli_query($connect, $sql);
    
        $danhSachSanPham = [];
        while($data = mysqli_fetch_assoc($query)){
            $danhSachSanPham[] = $data;
        }
            for( $i = 0;$i < 8; $i++) {?>
            <div class="col col-4">
                <div class="card">
                    <div class="img">
                        <a href="/chitietsanpham.php?id=<?php echo $danhSachSanPham[$i]['t_san_pham_id']?>">
                            <img  onclick="" src="./assets/imgs/<?php echo $danhSachSanPham[$i]['anh_san_pham'] ?>" alt="">
                        </a>
                    </div>
                    <div class="tensp">
                        <h3>
                            <?php if(strlen($danhSachSanPham[$i]['ten_san_pham'])>32) {
                                        echo substr($danhSachSanPham[$i]['ten_san_pham'],0,38).'...';
                                    }else
                                        echo $danhSachSanPham[$i]['ten_san_pham'];
                            ?>
                        </h3>
                    </div>
                    <div class="star">
                        <i style="color: yellow;" class="fa-solid fa-star"></i>
                        <i style="color: yellow;" class="fa-solid fa-star"></i>
                        <i style="color: yellow;" class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="giasp">
                        <p><?php echo number_format($danhSachSanPham[$i]['gia_san_pham'], 0, '', '.') ?>VNĐ</p>
                        <span style="text-decoration: line-through; font-size: small; " >99.000đ</span>
                    </div>
                    <div class="muahang">
                        <!-- <button type="submit" name="mua_san_pham" class="button btn-cart" onclick="">Thêm Vào Giỏ</button> -->
                    </div>
                </div>
            </div>
        <?php } ?>    
    </div>
    <div class="row block" id="module_publishing">
        <h2>
            <a class="title" href="/allProduct.php?page=1" title="Sắp phát hành">Sắp phát hành<span></span></a>
            <a class="more" href="/allProduct.php?page=1" title="Xem tất cả">Xem tất cả</a>
        </h2>
        <?php for( $i = 8;$i < 16; $i++) {?>
            <div class="col col-4">
                <div class="card">
                    <div class="img">
                        <a href="/chitietsanpham.php?id=<?php echo $danhSachSanPham[$i]['t_san_pham_id']?>">
                            <img  onclick="" src="./assets/imgs/<?php echo $danhSachSanPham[$i]['anh_san_pham'] ?>" alt="">
                        </a>
                    </div>
                    <div class="tensp">
                        <h3>
                            <?php if(strlen($danhSachSanPham[$i]['ten_san_pham'])>32) {
                                        echo substr($danhSachSanPham[$i]['ten_san_pham'],0,38).'...';
                                    }else
                                        echo $danhSachSanPham[$i]['ten_san_pham'];
                            ?>
                        </h3>
                    </div>
                    <div class="star">
                        <i style="color: yellow;" class="fa-solid fa-star"></i>
                        <i style="color: yellow;" class="fa-solid fa-star"></i>
                        <i style="color: yellow;" class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="giasp">
                        <p><?php echo number_format($danhSachSanPham[$i]['gia_san_pham'], 0, '', '.') ?>VNĐ</p>
                        <span style="text-decoration: line-through; font-size: small; " >99.000đ</span>
                    </div>
                    <div class="muahang">
                        <!-- <button type="button" class="button btn-cart" onclick="">Thêm Vào Giỏ</button> -->
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="row block" id="module_publishing">
        <h2>
            <a class="title" href="/allProduct.php?page=1" title="Sắp phát hành">Bán chạy<span class="b-main__category-arrow"></span></a>
            <a class="more" href="/allProduct.php?page=1" title="Xem tất cả">Xem tất cả</a>
        </h2>
        <?php for( $i = 16;$i < 24; $i++) {?>
            <div class="col col-4">
                <div class="card">
                    <div class="img">
                        <a href="/chitietsanpham.php?id=<?php echo $danhSachSanPham[$i]['t_san_pham_id']?>">
                            <img  onclick="" src="./assets/imgs/<?php echo $danhSachSanPham[$i]['anh_san_pham'] ?>" alt="">
                        </a>
                    </div>
                    <div class="tensp">
                        <h3>
                            <?php if(strlen($danhSachSanPham[$i]['ten_san_pham'])>32) {
                                        echo substr($danhSachSanPham[$i]['ten_san_pham'],0,38).'...';
                                    }else
                                        echo $danhSachSanPham[$i]['ten_san_pham'];
                            ?>
                        </h3>
                    </div>
                    <div class="star">
                        <i style="color: yellow;" class="fa-solid fa-star"></i>
                        <i style="color: yellow;" class="fa-solid fa-star"></i>
                        <i style="color: yellow;" class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="giasp">
                        <p><?php echo number_format($danhSachSanPham[$i]['gia_san_pham'], 0, '', '.') ?>VNĐ</p>
                        <span style="text-decoration: line-through; font-size: small; " >99.000đ</span>
                    </div>
                    <div class="muahang">
                        <!-- <button type="button" class="button btn-cart" onclick="">Thêm Vào Giỏ</button> -->
                    </div>
                </div>
            </div>
        <?php } ?>    
    </div>
    <div class="row block" id="module_publishing">
        <h2>
            <a class="title" href="/allProduct.php?page=1" title="Sắp phát hành">Sách hay nên đọc<span class="b-main__category-arrow"></span></a>
            <a class="more" href="/allProduct.php?page=1" title="Xem tất cả">Xem tất cả</a>
        </h2>
        <div class="col col-4">
            <div class="card">
                <div class="img">
                    <img  onclick="" src="./assets/imgs/bo-sach-500-cau-chuyen-dao-duc.jpg" alt="">
                </div>
                <div class="tensp">
                    <h3>Gia Đình</h3>
                </div>
            </div>
        </div>
        <div class="col col-4">
            <div class="card">
                <div class="img">
                    <img  onclick="" src="./assets/imgs/lap-ke-hoach-kinh-doanh-hieu-qua.jpg" alt="">
                </div>
                <div class="tensp">
                    <h3>Lập Kế Hoạch Kinh Doanh Hiệu Quả</h3>
                </div>
            </div>
        </div>
        <div class="col col-4">
            <div class="card">
                <div class="img">
                    <img  onclick="" src="./assets/imgs/ma-bun-luu-manh-mt.jpg" alt="">
                </div>
                <div class="tensp">
                    <h3>Ma bùn lưu manh và các câu chuyện</h3>
                </div>
            </div>
        </div>
        <div class="col col-4">
            <div class="card">
                <div class="img">
                    <img  onclick="" src="./assets/imgs/ngoai-giao-cua-chinh-quyen-sai-gon.jpg" alt="">
                </div>
                <div class="tensp">
                    <h3>Ngoại giao của chính quyền Sài Gòn</h3>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
