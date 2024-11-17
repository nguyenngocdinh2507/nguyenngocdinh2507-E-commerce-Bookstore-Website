<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/donhang.css">
    <title>Đơn hàng</title>
    <script src="./js/chitietdonhang.js"></script>
</head>
<?php 
    include('./config/config.php');
    
    session_start();
?>
<body>
<!-- wrapper -->
<div id="wrapper">
    <?php
        include('./include/header.php');

        // Tạo đơn hàng

        

        // Lấy danh sách đơn hàng

        $id_khach_mua_hang = 0;

        if(isset($_SESSION['data_nguoi_dung']['ten_day_du'])){

            $id_khach_mua_hang = $_SESSION['data_nguoi_dung']['t_nguoi_dung_id'];

        }

        $sql = "select * from t_don_hang WHERE khach_hang_id = $id_khach_mua_hang order by t_don_hang_id DESC ";
        
        $query = mysqli_query($connect, $sql);
        
        $danhSachDonHang = [];

        while($data = mysqli_fetch_assoc($query)){
            $danhSachDonHang[] = $data;
        }

        
    ?>
    <div id="container">
        <div class="left-content">
            <ul>
                <li style="color: #fff;background-color:#00cc66;cursor:none" >
                    <h3>TÀI KHOẢN CỦA BẠN</h3>
                </li>
                <li><a href="./taikhoancuatoi.php">Quản lí tài khoản</a></li>
                <li><a href="">Đơn hàng của tôi</a></li>
                <li>Sản phẩm yêu thích</li>
                <li>Phiếu giảm giá</li>
                <li>Thông báo</li>
            </ul>
        </div> <!-- Đóng left -->
        <div class="right-content">
            <div class="block-don-hang">
                <div class="title-don-hang">
                    <h3>Đơn hàng của tôi</h3>
                </div>
                <div class="don-hang">
                    <table>
                        <tr>
                            <th>Mã Đơn hàng</th>
                            <th>Ngày mua</th>
                            <th>Gởi đến</th>
                            <th>Tổng tiền</th>
                            <th colspan="2" >Tình trạng</th>
                        </tr>

                        <?php foreach($danhSachDonHang as $key => $val){  ?>

                        <tr>
                            <td style="color: #00cc66;" ><?php echo $val['t_don_hang_id'] ?></td>
                            <td><?php echo $val['ngay_mua'] ?></td>
                            <td><?php echo $val['dia_chi_giao_hang'] ?></td>
                            <td style="color: #00cc66;" ><?php echo number_format( $val['tong_tien_don_hang'], 0, '', '.') ?>VNĐ</td>
                            <td><?php echo $val['tinh_trang'] ?></td>
                            <td><a href="?id_don_hang_xem=<?php echo $val['t_don_hang_id'] ?> " style="color: #00cc66; cursor:pointer;" onclick="openChiTietDonHang();" >Xem đơn hàng</a></td>
                        </tr>

                        <?php } ?>
                    </table>
                </div>
            </div>
        </div><!-- Đóng right -->
        <div class="clear"></div>
    </div> <!-- Đóng container -->

    <!-- Chi tiết đơn hàng -->
    <div class="modal" style="display:block;">
        <div class="modal__overlay" onclick="closeChiTietDonHang();" ></div>
        <div class="thong-tin-gio-hang"  >
            <ul style="border-bottom: 1px #ccc solid">
                Thông tin đơn hàng <?php
                if(isset($_GET['id_don_hang_xem'])){

                    echo $_GET['id_don_hang_xem'] ;
                }
                 ?>
            </ul>

            <?php 
    
                $id_don_hang_xem = '0';
                
            if(isset($_GET['id_don_hang_xem'])){


                $id_don_hang_xem = $_GET['id_don_hang_xem'];

                // Lấy chi tiết đơn hàng

                $sql_chi_tiet_don_hang = "select * from t_chi_tiet_don_hang WHERE don_hang_id = $id_don_hang_xem";
                    
                $query_chi_tiet_don_hang = mysqli_query($connect, $sql_chi_tiet_don_hang);
                
                $danhSachChiTietDonHang = [];

                while($data1 = mysqli_fetch_assoc($query_chi_tiet_don_hang)){
                    $danhSachChiTietDonHang[] = $data1;
                }
                            
                foreach($danhSachChiTietDonHang as $key1 => $val1) {
            
            ?>

                
            <ul style="border-bottom: 1px #ccc solid">
                <li>
                    <img src="./assets/imgs/<?php echo $val1['anh_san_pham']?>" alt="">
                </li>
                <li><?php echo $val1['ten_san_pham']?></li>
                <li><p><?php echo number_format( $val1['gia_ban'], 0, '', '.')?>VNĐ</p></li>
                <li>
                    <?php echo $val1['so_luong']?>
                </li>
                <li><?php echo number_format( $val1['gia_ban']*$val1['so_luong'], 0, '', '.')?>VNĐ</li>
                <div class="clear"></div>
            </ul>

            <?php 
                }
            }

             ?>

        </div>
    </div>
<?php
    include('./include/footer.php')
?>
<div class="clear"></div>
</div> <!-- kết thúc wrapper -->
</body>
    
</html>