<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/chitietsanpham.css">
    <title>Chi tiết Sản Phẩm</title>
</head>
<?php
    include('./config/config.php');

    session_start();
    
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }else{
        header('location:index.php');
        $id="";
    }
    $sql_detail = mysqli_query($connect,"SELECT * FROM t_san_pham WHERE t_san_pham_id='$id'");
    $chi_tiet_san_pham = mysqli_fetch_assoc($sql_detail);
    // echo "<pre>";
    // var_dump($chi_tiet_san_pham);
    // var_dump($sql_detail);
    // exit;
?>
<body>
<!-- wrapper -->
<div id="wrapper">
    <?php
        include('./include/header.php');

        // Tạo giỏ hàng

        if(isset($_POST['mua_san_pham'])){

            // Lấy id sản phẩm chuẩn bị mua

            $id_san_pham_mua = ($_GET['id']);
            
            // Truy xuất sản phẩm đã có giỏ hàng

            $id_khach_mua_hang = 0;

            if(isset($_SESSION['data_nguoi_dung']['ten_day_du'])){

                $id_khach_mua_hang = $_SESSION['data_nguoi_dung']['t_nguoi_dung_id'];

            }

            $sql_san_pham_co_trong_gio_hang = "select * from t_gio_hang WHERE khach_hang_id = $id_khach_mua_hang and san_pham_id = $id_san_pham_mua ";
            
            $query_san_pham_co_trong_gio_hang = mysqli_query($connect, $sql_san_pham_co_trong_gio_hang);
            
            $san_pham_co_trong_gio_hang = mysqli_fetch_assoc($query_san_pham_co_trong_gio_hang);

            // Truy xuất sản phẩm được chọn mua

            $sql_san_pham_mua = "select * from t_san_pham WHERE t_san_pham_id = $id_san_pham_mua";
        
            $query_san_pham_mua = mysqli_query($connect, $sql_san_pham_mua);
        
            $san_pham_mua = mysqli_fetch_assoc($query_san_pham_mua);

            // Thêm 1 số lượng sản phẩm đã có sẵn vào giỏ vào giỏ

            if($san_pham_co_trong_gio_hang['san_pham_id'] == $san_pham_mua['t_san_pham_id']){

                $so_luong_moi = $san_pham_co_trong_gio_hang['so_luong']+1;

                $sql_query_them_gio_hang = mysqli_query($connect,"UPDATE `t_gio_hang` SET `so_luong`='$so_luong_moi' WHERE san_pham_id = $id_san_pham_mua");
        
                if($sql_query_them_gio_hang){         //Câu lệnh oke
                echo "<script>alert('Mua ".$ten_san_pham_mua." thành công')</script>";
                
                header('location:giohang.php');
                }
            }else{  //Thêm sản phẩm mới vào giỏ

                // Value sản phẩm mua mới
                $ten_san_pham_mua = $san_pham_mua['ten_san_pham'];
                $anh_san_pham_mua = $san_pham_mua['anh_san_pham'];
                $gia_ban_san_pham_mua = $san_pham_mua['gia_san_pham'];
    
                $sql_query_them_gio_hang = mysqli_query($connect,"INSERT INTO `t_gio_hang`( `khach_hang_id`, `san_pham_id`, `ten_san_pham`, `anh_san_pham`, `so_luong`, `gia_ban`) VALUES ('$id_khach_mua_hang','$id_san_pham_mua','$ten_san_pham_mua','$anh_san_pham_mua','1','$gia_ban_san_pham_mua')");
            
                if($sql_query_them_gio_hang){         //Câu lệnh oke
                    echo "<script>alert('Mua ".$ten_san_pham_mua." thành công')</script>";
                    
                    header('location:giohang.php');
                }
                
            }

        }
    ?>
    <div id="container">
    <div id="blockMap">
            <div id="map">
                <span><a class="text-black" href="./index.php">Trang chủ/Chi tiết sách</a></span>
            </div>
        </div>
        <div class="chi-tiet-san-pham">
            <form action="" method="POST"  >    <!-- form -->
            
            <div class="left-content">
                <div class="img">
                    <img  onclick="" src="./assets/imgs/<?php echo $chi_tiet_san_pham['anh_san_pham'] ?>" alt="<?php echo $chi_tiet_san_pham['anh_san_pham'] ?>">
                </div>
            </div>

            <div class="right-content">
                <div class="ten-sach">
                    <h3><?php echo $chi_tiet_san_pham['ten_san_pham'] ?></h3>
                </div>
                <div class="row groups">
                    <div class="col col-2 tac-gia">
                        <p>Tác giả : <?php echo $chi_tiet_san_pham['tac_gia'] ?></p>
                    </div>
                    <div class="col col-2 phat-hanh">
                        <p>Phát hành : BOOKSTORE.VN</p>
                    </div>
                </div>
                <div class="row groups ">
                    <div class="col col-2 nhan-xet">
                        <p><i class="fa-solid fa-pen"></i>Gửi nhận xét của bạn</p>
                    </div>
                    <div class="col col-2 yeu-thich">
                        <p><i class="fa-solid fa-heart"></i>Thêm vào yêu thích</p>
                    </div>
                </div>
                <!-- <input type="hidden" value="<?php echo $chi_tiet_san_pham['ten_san_pham'] ?>"> -->
                <div class="mua-sach">
                    <div class="col col-2 gia-sach">
                        <p><?php echo number_format($chi_tiet_san_pham['gia_san_pham'], 0, '', '.') ?>VNĐ</p>
                    </div>
                    <div class="col col-2 mua-ngay">
                        <input type="submit" name="mua_san_pham" value="Mua ngay" class="btn-mua-ngay" >
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="uu-dai">
                    <p><i class="fa-solid fa-check"></i>Bọc Plastic miễn phí </p>
                    <p><i class="fa-solid fa-check"></i>Giao hàng miễn phí trong nội thành TP. HCM với đơn hàng  ≥ 150.000 đ    </p>
                    <p><i class="fa-solid fa-check"></i>Giao hàng miễn phí toàn quốc với đơn hàng ≥ 250.000 đ</p>
                </div>
                <div class="like">
                    <p style="color: #fff;" ><i class="fa-solid fa-thumbs-up" style="color: #fff;" ></i>Like</p>

                </div>
            </div>
            
            </form>
        <div class="clear"></div>
        </div> <!-- Đóng main -->
        <br>
        <div class="gioi-thieu-sach">
            <div class="title-gioi-thieu">
                <h3>Giới thiệu sách</h3>
            </div>
            <div class="gioi-thieu">
                <p><?php echo $chi_tiet_san_pham['chi_tiet_san_pham'] ?>
                </p>
            </div>
        <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="thong-tin-chi-tiet">
            <div class="title-thong-tin">
                <h3>Thông tinh chi tiết</h3>
            </div>
            <div class="thong-tin">
                <table>
                    <tr>
                        <th class="th-title">Phát hành</th>
                        <th style="color: #00b468; cursor: pointer;" >BOOKER</th>
                    </tr>
                    <tr>
                        <th class="th-title">trọng lượng</th>
                        <th>500g</th>
                    </tr>
                    <tr>
                        <th class="th-title">Lượt xem</th>
                        <th>2904</th>
                    </tr>
                    <tr>
                        <th class="th-title">Ngày phát hành</th>
                        <th>29/04/2022</th>
                    </tr>
                    <tr>
                        <th class="th-title">Danh mục</th>
                        <th style="color: #00b468; cursor: pointer;" >Truyện  </th>
                    </tr>
                </table>
            </div>
        </div>
        <!-- Có thể bạn quan tâm -->
        <div class="row block" id="module_publishing">
            <h2>
                Có thể bạn quan tâm
            </h2>
            <hr>
            <div class="col col-5">
                <div class="card">
                    <div class="img">
                        <img  onclick="" src="./assets/imgs/bo-sach-500-cau-chuyen-dao-duc.jpg" alt="">
                    </div>
                    <div class="tensp">
                        <h3>Gia Đình</h3>
                    </div>
                </div>
            </div>
            <div class="col col-5">
                <div class="card">
                    <div class="img">
                        <img  onclick="" src="./assets/imgs/duong-may-tren-dat-hoa.jpg" alt="">
                    </div>
                    <div class="tensp">
                        <h3>Truyện tranh Doraemon</h3>
                    </div>
                </div>
            </div>
            <div class="col col-5">
                <div class="card">
                    <div class="img">
                        <img  onclick="" src="./assets/imgs/lap-ke-hoach-kinh-doanh-hieu-qua.jpg" alt="">
                    </div>
                    <div class="tensp">
                        <h3>Lập Kế Hoạch Kinh Doanh Hiệu Quả</h3>
                    </div>
                </div>
            </div>
            <div class="col col-5">
                <div class="card">
                    <div class="img">
                        <img  onclick="" src="./assets/imgs/ma-bun-luu-manh-mt.jpg" alt="">
                    </div>
                    <div class="tensp">
                        <h3>Ma bùn lưu manh và các câu chuyện</h3>
                    </div>
                </div>
            </div>
            <div class="col col-5">
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
    <div class="clear"></div>
    </div> <!-- Đóng container -->
    <?php
        include('./include/footer.php')
    ?>
<div class="clear"></div>
</div> <!-- kết thúc wrapper -->
</body>
    
</html>
<!-- Xét nếu nó đã có thì tự tăng số lượng oke -->
<!-- Nếu chưa đăng nhập thì lưu dô sesion : khi đăng nhập dô biết session tự lưu vào sql  OKE-->
