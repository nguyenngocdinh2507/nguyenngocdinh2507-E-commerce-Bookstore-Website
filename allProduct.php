<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/allProdcut.css">
    <title>Tất cả sản phẩm</title>
</head>
<?php 
    include('./config/config.php');
    
    session_start();

    // Phân trang
    $per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 8;      // Số sản phẩm trên 1 trang

    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;          // Số vị tri trang

    $star = ($current_page-1)*$per_page;                                // Vị trí sản phẩm bắt đầu mỗi trang


    //----------------------------------------------------------------------

    // Tìm kiếm sản phẩm

    // var_dump($_GET['ten_tim_kiem']);exit;

    $ten_tim_kiem = isset($_GET['ten_tim_kiem']) ? $_GET['ten_tim_kiem'] : "";

    if($ten_tim_kiem){

        // Truy xuất sản phẩn tìm kiếm phân trang

        $sql = "SELECT * FROM `t_san_pham` WHERE `ten_san_pham` LIKE '%$ten_tim_kiem%'"."  ORDER BY t_san_pham_id ASC LIMIT ".$per_page." OFFSET ".$star;

        $query = mysqli_query($connect, $sql);

        $danhSachSanPham=[];

        // Truy xuất sản phẩn tất cả sản phẩm tìm kiếm

        $sql_all = "select * from t_san_pham WHERE `ten_san_pham` LIKE '%$ten_tim_kiem%'";
    
        $query_all = mysqli_query($connect, $sql_all);
    
        $danhSachSanPham_all = [];
        
    }else{

        // Truy xuất sản phẩm phân trang
    
        $sql = "select * from t_san_pham ORDER BY t_san_pham_id ASC LIMIT ".$per_page." OFFSET ".$star;
        
        $query = mysqli_query($connect, $sql);
        
        $danhSachSanPham = [];
        
        
        // Truy xuất TẤT CẢ sản phẩm 
        
        $sql_all = "select * from t_san_pham";
        
        $query_all = mysqli_query($connect, $sql_all);
        
        $danhSachSanPham_all = [];
    }
    
    // Lấy data sản phẩm phân trang
    while($data = mysqli_fetch_assoc($query)){
        $danhSachSanPham[] = $data;
    }

    // Lấy data tất cả sản phẩm
    while($data_all = mysqli_fetch_assoc($query_all)){
        $danhSachSanPham_all[] = $data_all;
    }       

    $total_page = ceil(count($danhSachSanPham_all)/$per_page);
    // Tổng số trang
?>
<body>
<!-- wrapper -->
<div id="wrapper">
    <!-- Header -->
    <?php 
        include('./include/header.php');

        // Tìm kiếm có phân trang .-.
        $param = "";
        if($ten_tim_kiem){
            $param = "ten_tim_kiem=".$ten_tim_kiem."&";
            // $param = "ten_tim_kiem=".$ten_tim_kiem."&page=1&";
        }

    ?>

    <div class="main">

        <div id="blockMap">
            <div id="map">
                <span><a class="text-black" href="./index.php">Trang chủ/Tất cả</a></span>
            </div>
        </div>

        <?php if($ten_tim_kiem) { ?>
            <div id="map_tim_kiem">
                <h4><?php echo "Tìm Kiếm Sản Phẩm Với Từ Khóa: '".$ten_tim_kiem."' Tìm Thấy '".count($danhSachSanPham_all)."' Kết quả" ?></h4>
            </div>
        <?php } ?>

        <!-- sidebar-left -->
        <?php
            include('./include/sidebar-left.php')
        ?>

        <form action="" method="get">
        <div class="content">

            <div class="product">
                <div class="row">

                    <?php foreach($danhSachSanPham as $key => $val){ ?>
                        <div class="col col-4">
                            <div class="card">
                                <div class="img">
                                    <a href="/chitietsanpham.php?id=<?php echo $val['t_san_pham_id']?>">
                                        <img  onclick="" src="./assets/imgs/<?php echo $val['anh_san_pham'] ?>" alt="">
                                    </a>
                                </div>
                                <div class="tensp">
                                    <h3>
                                        <?php if(strlen( $val['ten_san_pham'])>32) {
                                                    echo substr( $val['ten_san_pham'],0,38).'...';
                                                }else
                                                    echo  $val['ten_san_pham'];
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
                                    <p><?php echo number_format( $val['gia_san_pham'], 0, '', '.') ?>VNĐ</p>
                                    <span style="text-decoration: line-through; font-size: small; " >99.000đ</span>
                                </div>
                                <div class="muahang">
                                    <button type="submit" class="button btn-cart" onclick="">Thêm Vào Giỏ</button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>

            <div class="nutphantrang">
                <?php if($total_page > 1) { ?>

                    <?php if($current_page>1) { ?>                          
                        <a href="?<?=$param?>per_page=<?=$per_page?>&page=<?=$current_page-1?>"><i class="btn-phantrang fa-solid fa-angles-left"></i></a>
                    <?php } ?>

                    <?php for($i=1 ; $i <= $total_page ; $i++) { ?>
                        <a href="?<?=$param?>per_page=<?=$per_page?>&page=<?=$i?>"><input class="btn-phantrang <?php if($i==$_GET['page']) echo "nut-sang" ?> " type="button" value="<?php echo $i ?>"></a>
                    <?php } ?>

                    <?php if($current_page < $total_page) { ?>                          
                    <a href="?<?=$param?>per_page=<?=$per_page?>&page=<?=$current_page+1?>"><i class="btn-phantrang fa-solid fa-angles-right"></i></a>
                    <?php } ?>

                <?php } ?>
            </div>

        </div> <!-- kết thúc content -->
        </form>

        <div class="clear"></div>
    </div> <!-- kết thúc main -->

    <!-- Footer -->
    <?php
        include('./include/footer.php')
    ?>

<div class="clear"></div>
</div> <!-- kết thúc wrapper -->
</body>
    
</html>