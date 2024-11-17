
<?php
    include('../config/config.php');

    // Truy xuất người dùng

    $sql_nguoi_dung = "select * from t_nguoi_dung";
        
    $query_nguoi_dung = mysqli_query($connect, $sql_nguoi_dung);
    
    $danhSach_nguoi_dung = [];

    // Lấy data người dùng
    while($data = mysqli_fetch_assoc($query_nguoi_dung)){
        $danhSach_nguoi_dung[] = $data;
    }

    // --------------------------------
    // Truy xuất sản phẩm

    $sql_san_pham = "select * from t_san_pham";
        
    $query_san_pham = mysqli_query($connect, $sql_san_pham);
    
    $danhSach_san_pham = [];

    // Lấy data sản phẩm
    while($data = mysqli_fetch_assoc($query_san_pham)){
        $danhSach_san_pham[] = $data;
    }
    // --------------------------------
    // Truy xuất sản phẩm sắp hết hạn

    $sql_san_pham_sap_het = "select * from t_san_pham where so_luong_kho < 10";
        
    $query_san_pham_sap_het = mysqli_query($connect, $sql_san_pham_sap_het);
    
    $danhSach_san_pham_sap_het = [];

    // Lấy data sản phẩm
    while($data = mysqli_fetch_assoc($query_san_pham_sap_het)){
        $danhSach_san_pham_sap_het[] = $data;
    }
    // --------------------------------
    // Truy xuất đơn hàng

    $sql_don_hang = "select * from t_don_hang";
        
    $query_don_hang = mysqli_query($connect, $sql_don_hang);
    
    $danhSach_don_hang = [];

    // Lấy data đơn hàng
    while($data = mysqli_fetch_assoc($query_don_hang)){
        $danhSach_don_hang[] = $data;
    }

?>
<div class="title-main">
        <h3>Bảng điều khiển</h3>
    </div>

    <div class="main-container">
        <div class="main-left">

            <div class="row wrapper-card">
                <div class="col col-1">
                    <div class="card">
                        <div class="logo-card">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div class="header-card">
                            <h4>Tổng số khách hàng</h4>
                        </div>
                        <div class="content-card">
                            <p><?php echo count($danhSach_nguoi_dung) ?> Khách hàng</p>
                        </div>
                        <div class="footer-card">
                            Tổng số khách hàng được quản lí
                        </div>
                    </div>
                </div>
                <div class="col col-1">
                    <div class="card">
                        <div class="logo-card" style="background-color: rgba(218, 195, 17, 0.65);">
                            <i class="fa-solid fa-book"></i>
                        </div>
                        <div class="header-card">
                            <h4>Tổng số sản phẩm</h4>
                        </div>
                        <div class="content-card">
                            <p><?php echo count($danhSach_san_pham) ?> sản phẩm</p>
                        </div>
                        <div class="footer-card">
                            Tổng số sản phẩm được quản lí
                        </div>
                    </div>
                </div>
                <div class="col col-1">
                    <div class="card">
                        <div class="logo-card" style="background-color: rgba(14, 104, 199, 0.65);">
                            <i class="fa-solid fa-paperclip"></i>
                        </div>
                        <div class="header-card">
                            <h4>Tổng số Đơn hàng</h4>
                        </div>
                        <div class="content-card">
                            <p><?php echo count($danhSach_don_hang) ?> Đơn hàng</p>
                        </div>
                        <div class="footer-card">
                            Tổng số Đơn hàng được quản lí
                        </div>
                    </div>
                </div>
                <div class="col col-1">
                    <div class="card">
                        <div class="logo-card" style="background-color: rgba(217, 49, 49, 0.65);">
                            <i class="fa-solid fa-circle-exclamation"></i>
                        </div>
                        <div class="header-card">
                            <h4>Tổng số sản phẩm sắp hết</h4>
                        </div>
                        <div class="content-card">
                            <p><?php echo count($danhSach_san_pham_sap_het) ?> sản phẩm</p>
                        </div>
                        <div class="footer-card">
                            Tổng số sản phẩm sắp hết được quản lí
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="main-right">

            <div class="row">
                <div class="col col-1 table">
                    
                       <div class="header-table">
                           <h4>Danh sách đơn hàng mới nhất</h4>
                       </div>
                        <table>
                            <tr>
                                <th>Mã Đơn hàng</th>
                                <th>Ngày mua</th>
                                <th>Gởi đến</th>
                                <th>Tổng tiền</th>
                                <th colspan="2" >Tình trạng</th>
                            </tr>

                            <?php for($i = count($danhSach_don_hang)-1 ; $i > (count($danhSach_don_hang)-6) ; $i-- ){  ?>

                            <tr>
                                <td style="color: #00cc66;" ><?php echo $danhSach_don_hang[$i]['t_don_hang_id'] ?></td>
                                <td><?php echo $danhSach_don_hang[$i]['ngay_mua'] ?></td>
                                <td><?php echo $danhSach_don_hang[$i]['dia_chi_giao_hang'] ?></td>
                                <td style="color: #00cc66;" ><?php echo number_format( $danhSach_don_hang[$i]['tong_tien_don_hang'], 0, '', '.') ?>VNĐ</td>
                                <td><?php echo $danhSach_don_hang[$i]['tinh_trang'] ?></td>
                            </tr>

                            <?php } ?>
                        </table>

                </div>
                <div class="col col-1 table">
                    <div class="header-table">
                           <h4>Danh sách khách hàng mới nhất</h4>
                       </div>
                        <table>
                            <tr>
                                <th>Mã khách hàng</th>
                                <th>Tên khách hàng</th>
                                <th>Địa chỉ</th>
                                <th colspan="2" >Email</th>
                            </tr>

                            <?php for($i = count($danhSach_nguoi_dung)-1 ; $i > (count($danhSach_nguoi_dung)-6) ; $i-- ){  ?>

                            <tr>
                                <td style="color: #00cc66;" ><?php echo $danhSach_nguoi_dung[$i]['t_nguoi_dung_id'] ?></td>
                                <td><?php echo $danhSach_nguoi_dung[$i]['ten_day_du'] ?></td>
                                <td><?php echo $danhSach_nguoi_dung[$i]['dia_chi'] ?></td>
                                <td><?php echo $danhSach_nguoi_dung[$i]['email'] ?></td>
                            </tr>

                            <?php } ?>
                        </table>
                </div>
            </div>
        
        </div>
    <div class="clear"></div>
    </div>
</div>