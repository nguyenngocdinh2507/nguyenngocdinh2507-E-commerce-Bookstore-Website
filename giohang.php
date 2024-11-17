<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/giohang.css">
    <title>Giỏ hàng</title>
</head>
<?php

use function PHPSTORM_META\type;

    include('./config/config.php');
    
    session_start();
?>
<body>
<!-- wrapper -->
<div id="wrapper">
    <!-- Header -->
    <?php
        include('./include/header.php');

        // Truy xuất sản phẩm giỏ hàng

        $id_khach_mua_hang = 0;

        if(isset($_SESSION['data_nguoi_dung']['ten_day_du'])){

            $id_khach_mua_hang = $_SESSION['data_nguoi_dung']['t_nguoi_dung_id'];
            $ten_khach_hang = $_SESSION['data_nguoi_dung']['ten_day_du'];
            $dia_chi_khach_hang = $_SESSION['data_nguoi_dung']['dia_chi'];
            $sdt_khach_hang = $_SESSION['data_nguoi_dung']['so_dien_thoai'];

        }

        $sql = "select * from t_gio_hang WHERE khach_hang_id = $id_khach_mua_hang";
        
        $query = mysqli_query($connect, $sql);
        
        $danhSachSanPham = [];

        while($data = mysqli_fetch_assoc($query)){
            $danhSachSanPham[] = $data;
        }

        // Tổng tiền giỏ hàng
        $tong_tien_gio = 0;
        foreach($danhSachSanPham as $key => $val ) {
            $tong_tien_gio += $val['so_luong'] * $val['gia_ban'];
        }

        // Update giỏ hàng
        
        if(isset($_POST['sbm-capnhat'])){

            if(isset($_POST['san_pham_id'])){

                for($i=0 ; $i < count($_POST['san_pham_id']) ; $i++){

                    $san_pham_id = $_POST['san_pham_id'][$i]; // Sản phẩm có sẵn trong giỏ

                    $so_luong_moi = $_POST['so-luong'][$i];       // Số lượng của sản phẩm đó lấy ở input
    
                    if($so_luong_moi==0){
        
                        $sql_update_so_luong = mysqli_query($connect,"DELETE FROM `t_gio_hang` WHERE san_pham_id =  $san_pham_id");
    
                    }else{
    
                        $sql_update_so_luong = mysqli_query($connect,"UPDATE `t_gio_hang` SET `so_luong`='$so_luong_moi' WHERE san_pham_id = $san_pham_id");
    
                    }
    
                }
                header('location:giohang.php');
            }
        }else

        // Xoá giỏ hàng

        if(isset($_GET['xoa'])){


            $id_gio_hang_xoa = $_GET['xoa'];

            $sql_update_so_luong = mysqli_query($connect,"DELETE FROM `t_gio_hang` WHERE t_gio_hang_id =  $id_gio_hang_xoa");

            header('location:giohang.php');

        }
        
        // Thanh toán

        if(isset($_POST['thanh-toan']));{

            if($id_khach_mua_hang == 0){

                echo "<script>alert('Bạn cần đăng nhập mới có thể mua hàng')</script>";

                
            }else{
                
                if(isset($_GET['tao-don-hang']) && $tong_tien_gio != 0 ){
                    // Tên người nhận
                    $ten_nguoi_nhan_hang = !empty($_GET['ten-nguoi-nhan']) ?  $_GET['ten-nguoi-nhan'] : $ten_khach_hang;

                    $dia_chi_nhan_hang = !empty($_GET['dia-chi-nhan']) ?  $_GET['dia-chi-nhan'] : $dia_chi_khach_hang;
                    
                    $sdt_nhan_hang = !empty($_GET['sdt-nguoi-nhan']) ?  $_GET['sdt-nguoi-nhan'] : $sdt_khach_hang;

                    $today = date("d/m/Y");

                    $sql_tao_don_hang = "INSERT INTO `t_don_hang`( `khach_hang_id`, `ten_khach_hang`, `so_dien_thoai`, `dia_chi_giao_hang`, `ngay_mua`, `tong_tien_don_hang`, `tinh_trang`) 
                    VALUES ('$id_khach_mua_hang','$ten_nguoi_nhan_hang',' $sdt_nhan_hang','$dia_chi_nhan_hang','$today','$tong_tien_gio','Chờ xác nhận')";

                    $query_tao_don_hang = mysqli_query($connect, $sql_tao_don_hang);  


                    // Truy xuất id đơn hàng mới được tạo

                    $sql_id_don_hang_moi_tao = "SELECT MAX(t_don_hang_id) FROM t_don_hang where t_don_hang_id > 0";
        
                    $query_id_don_hang_moi_tao = mysqli_query($connect, $sql_id_don_hang_moi_tao);
                    
                    $id_don_hang_moi_tao = mysqli_fetch_assoc($query_id_don_hang_moi_tao); // Chả hiểu sao nhưng ở đây nó lại ra mảng

                    $id_don_hang_moi_tao = $id_don_hang_moi_tao['MAX(t_don_hang_id)'];      // Cho nó lấy giá trị number

                    foreach($danhSachSanPham as $key => $val){

                        // SQL tạo value chi tiết đơn hàng

                        $sql_tao_chi_tiet_don_hang = "INSERT INTO `t_chi_tiet_don_hang`( `don_hang_id`, `san_pham_id`, `ten_san_pham`, `anh_san_pham`, `so_luong`, `gia_ban`) 
                        VALUES ('$id_don_hang_moi_tao','$val[san_pham_id]','$val[ten_san_pham]','$val[anh_san_pham]','$val[so_luong]','$val[gia_ban]')";

                        $query_tao_chi_tiet_don_hang = mysqli_query($connect, $sql_tao_chi_tiet_don_hang);

                        // SQL xoá giỏ hàng

                        $sql_xoa_gio_hang = "DELETE FROM `t_gio_hang` WHERE san_pham_id = $val[san_pham_id]";

                        $query_xoa_gio_hang = mysqli_query($connect, $sql_xoa_gio_hang);

                    }

                    if($query_tao_don_hang){
                        header('location:donhang.php');
                    }

                }

            }
            
        }

        
        
    ?>
    <div id="container">
        <form action="" method="POST">
        <div class="left-content">

            <div class="gio-hang">
                <div class="title-gio-hang">
                    <h3>Giỏ hàng của tôi</h3>
                    <!-- Lấy từ header -->
                    <span id="so-luong-san-pham-trong-gio" >Bạn có <?php echo $tong_so_luong_gio?> sản phẩm trong giỏ hàng</span>
                </div>
                <div class="thong-tin-gio-hang">
                    <ul style="border-bottom: 1px #ccc solid">
                        <li>Sản phẩm trong giỏ</li>
                        <li>Tên sách</li>
                        <li><p>Giá</p></li>
                        <li>Số lượng</li>
                        <li>Thành tiền</li>
                        <div class="clear"></div>

                    </ul>

                    <!-- Sản phẩm trong giỏ hàng -->
                    <?php foreach($danhSachSanPham as $key => $val ) { ?>
                    
                    <ul style="border-bottom: 1px #ccc solid">
                    
                        <li>
                            <img src="./assets/imgs/<?php echo $val['anh_san_pham'] ?>" alt="">
                        </li>
                        <li><?php echo $val['ten_san_pham'] ?></li>
                        <input type="hidden" name="san_pham_id[]" value="<?php echo $val['san_pham_id'] ?>" >
                        <li><p><?php echo number_format( $val['gia_ban'], 0, '', ',') ?>VNĐ</p></li>
                        <li>
                            <input id="ip-soluong" type="number" name="so-luong[]" id="" min="0" value="<?php echo $val['so_luong'] ?>">
                            <br>
                            <!-- <input type="submit" name="sbm-capnhat" id="btn-xoa" value="Cập nhật" > -->
                            <a href="?xoa=<?php echo $val['t_gio_hang_id'] ?>" class="a-xoa" style="color:red;" > Xoá </a>
                        </li>
                        <li><?php echo number_format( $val['so_luong'] * $val['gia_ban'], 0, '', ',') ?>VNĐ</li>
                        <div class="clear"></div>
                    </ul>

                    <?php } ?>
                    <!-- lỡ để id css để d luôn -->
                    <input type="submit" name="sbm-capnhat" id="btn-capnhat" value="Cập nhật" > 
                    
                </div>

                <div class="footer-gio-hang">
                    <div class="col col-2 them-san-pham">
                        <a href="./allProduct.php?page=1"><i class="fa-solid fa-weight-hanging"></i>
                        Thêm sản phẩm khách vào giỏ
                        </a>
                    </div>
                    <div class="col col-2 tong-gia">
                        Tổng tiền : <p id="p-tong-gia" class="inline" ><?php echo number_format( $tong_tien_gio, 0, '', ',') ?>VNĐ</p>
                    </div>
                </div>

            </div>

        </div> <!-- Đóng left -->
        
        </form>

        <form action="" method="GET">

        <div class="right-content">
            <div class="thong-tin-giao-hang">
                <div class="title-giao-hang">
                    <h2>Địa chỉ giao hàng</h2>
                </div>
                <div class="dia-chi">
                    <ul>
                        <li>
                            <label>Tên người nhận : </label>
                            <input type="text" name="ten-nguoi-nhan" id="txt-ten-khach-hang">
                        </li>
                        <li>
                            <label>Số điện thoại : </label>
                            <input type="text" name="sdt-nguoi-nhan" id="txt-so-dien-thoai">
                        </li>
                        <li>
                            <label>Địa chỉ : </label>
                            <textarea placeholder="Số nhà, tòa nhà (nếu có), tên đường…" name="dia-chi-nhan" id="txt-dia-chi"></textarea>
                        </li>
                        <li>
                            <input type="hidden" name="tao-don-hang">
                        </li>
                    </ul>
                </div>
            </div>
            <div class="thanh-toan">
                    <input type="submit" name="thanh-toan" id="btn-thanhtoan" value="Thanh Toán">
            </div>
        </div>

        </form>

        <div class="clear"></div>
    </div> <!-- Đóng container -->
    <?php
        include('./include/footer.php')
    ?>
<div class="clear"></div>
</div> <!-- kết thúc wrapper -->
</body>
    
</html>
<!-- Thêm số lượng,xoá OKe -->

