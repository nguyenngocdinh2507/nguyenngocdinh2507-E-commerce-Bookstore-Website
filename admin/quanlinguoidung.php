
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
        <h3>Quản lí người dùng</h3>
    </div>

    <div class="main-container">
        <table>
            <tr>
                <th>ID người dùng</th>
                <th>Tên người dùng</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Giới tính</th>
                <th>Email</th>
                <th colspan="2" >Kiểu người dùng</th>
            </tr>
            <?php
                $sql = "SELECT * FROM t_nguoi_dung";
                $query = mysqli_query($connect, $sql);
                $danhSachNguoiDung = [];

                // Lấy data người dùng

                while($data = mysqli_fetch_assoc($query)){
                    $danhSachNguoiDung[] = $data;
                }

                foreach($danhSachNguoiDung as $key => $val) {

            ?>
            <tr>
                <td style="color: #00cc66;" ><?php echo $val['t_nguoi_dung_id'] ?></td>
                <td><?php echo $val['ten_day_du'] ?></td>
                <td><?php echo $val['dia_chi'] ?></td>
                <td><?php echo $val['so_dien_thoai'] ?></td>
                <td><?php echo $val['gioi_tinh'] ?></td>
                <td><?php echo $val['email'] ?></td>
                <td><?php echo $val['kieu_nguoi_dung'] ?></td>
                <td><a href="?id_nguoi_dung=<?php echo $val['t_nguoi_dung_id'] ?> " style="color: #00cc66; cursor:pointer;" >Xem đơn hàng</a></td>
            </tr>

            <?php } ?>
        </table>
    </div>
</body>
</html>