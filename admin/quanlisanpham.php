
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    include('../config/config.php');

?>
<body>
    <div class="title-main">
        <h3>Quản lí sản phẩm</h3>
    </div>

    <div class="main-container">
        <table>
            <tr>
                <th>Ảnh</th>
                <th>ID Sách</th>
                <th>Tên sách</th>
                <th>Giá</th>
                <th>Tác giả</th>
                <th>Thể loại</th>
                <th>Số lượng kho</th>
                <!-- <th colspan="2" >Kiểu người dùng</th> -->
            </tr>
            <?php
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

                $total_page = ceil(count($danhSachSanPham_all)/$per_page);          // Tổng số trang

                // 

                // Tìm kiếm có phân trang .-.
                $param = "";
                if($ten_tim_kiem){
                    $param = "ten_tim_kiem=".$ten_tim_kiem."&";
                    // $param = "ten_tim_kiem=".$ten_tim_kiem."&page=1&";
                }

                foreach($danhSachSanPham as $key => $val) {

            ?>
            <tr>
                <td>
                    <a href="/chitietsanpham.php?id=<?php echo $val['t_san_pham_id']?>">
                        <img  onclick="" src="./assets/imgs/<?php echo $val['anh_san_pham'] ?>" alt="">
                    </a>
                </td>
                <td style="color: #00cc66;" ><?php echo $val['t_san_pham_id'] ?></td>
                <td><?php echo $val['ten_san_pham']?></td>
                <td><?php echo number_format( $val['gia_san_pham'], 0, '', '.') ?>VNĐ</td>
                <td><?php echo $val['tac_gia'] ?></td>
                <td><?php echo $val['the_loai'] ?></td>
                <td><?php echo $val['so_luong_kho'] ?></td>
                <!-- <td><a href="?id_san_pham=<?php echo $val['t_san_pham_id'] ?> " style="color: #00cc66; cursor:pointer;" >Xem đơn hàng</a></td> -->
            </tr>

            <?php } ?>
        </table>
    </div>
    <div class="nutphantrang">
                <?php if($total_page > 1) { ?>

                    <?php if($current_page>1) { ?>                          
                        <a href="?quanlisanpham&<?=$param?>per_page=<?=$per_page?>&page=<?=$current_page-1?>"><i class="btn-phantrang fa-solid fa-angles-left"></i></a>
                    <?php } ?>

                    <?php for($i=1 ; $i <= $total_page ; $i++) { ?>
                        <a href="?quanlisanpham&<?=$param?>per_page=<?=$per_page?>&page=<?=$i?>"><input class="btn-phantrang <?php if($i==$_GET['page']) echo "nut-sang" ?> " type="button" value="<?php echo $i ?>"></a>
                    <?php } ?>

                    <?php if($current_page < $total_page) { ?>                          
                    <a href="?quanlisanpham&<?=$param?>per_page=<?=$per_page?>&page=<?=$current_page+1?>"><i class="btn-phantrang fa-solid fa-angles-right"></i></a>
                    <?php } ?>

                <?php } ?>
            </div>
</body>
</html>