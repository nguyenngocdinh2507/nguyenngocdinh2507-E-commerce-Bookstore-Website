<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/taikhoancuatoi.css">
    <title>Tài khoản của tôi</title>
</head>
<?php 
    include('./config/config.php');
    
    session_start();
?>
<!-- Xử Lý PHP -->
<?php
    $arr_error = []; // Mảng lỗi

        if(isset($_SESSION['data_nguoi_dung'])){
            $ten_day_du = $_SESSION['data_nguoi_dung']['ten_day_du'];
            $dia_chi = $_SESSION['data_nguoi_dung']['dia_chi'];
            $sdt = $_SESSION['data_nguoi_dung']['so_dien_thoai'];
            $gioi_tinh = $_SESSION['data_nguoi_dung']['gioi_tinh'];
            $email = $_SESSION['data_nguoi_dung']['email'];
            $kieu_nguoi_dung = 'nguoidung';
            $mat_khau = "";
            $mat_khau2 = "";
        }
        
        if(isset($_POST['luu_submit'])){
        {
            
            $ten_day_du = $_POST['txthoten'];
            $dia_chi = $_POST['txtdiachi'];
            $sdt = $_POST['txtsdt'];
            if(isset($_POST['txtgioitinh'])){
                $gioi_tinh = $_POST['txtgioitinh'];
            }  else {
                $gioi_tinh = false;
            }
            $mat_khau = $_POST['txtmatkhau'];
            $mat_khau2 = $_POST['txtnlmatkhau'];
            $kieu_nguoi_dung = 'nguoidung';

        }

        // var_dump($gioi_tinh);exit;


        
        // Tên
        if(empty($ten_day_du)){
            $arr_error['hoten'] = 'Vui lòng không để trống họ tên';
        } else{
            // $arr_error['hoten'] = '';
            
        }
        // Địa chỉ
        if(empty($dia_chi)){
            $arr_error['diachi'] = "Vui lòng không để trống địa chỉ";
        } else{
            // $arr_error['diachi'] = '';
        }
        // Số điện thoại
        if(empty($sdt)){
            $arr_error['sdt'] = "Vui lòng không để trống họ tên";
        }elseif(strlen($sdt)!=10 ||  is_nan($sdt)){
            $arr_error['sdt'] = "Số điện thoại không hợp lệ";
        } else{
            // $arr_error['sdt'] = '';
        }
        //G.TÍNH
        // if(empty($gioi_tinh)){
        //     $arr_error['gioitinh'] = 'Vui lòng chọn giới tính';
        // } else{
        //     // $arr_error['gioitinh'] = '';
        // }

        // Mật khẩu
            if(empty($mat_khau)  || strlen($mat_khau)<6){
                $arr_error['matkhau'] = 'Mật khẩu dài hơn 5 ký tự';
            }

        if ($mat_khau2 != $mat_khau) {
            $arr_error['nlmatkhau'] = 'Mật khẩu không giống';
        }else{
            // $arr_error['nlmatkhau'] = '';
        }
        if(empty($arr_error)){

            // truy xuất tài khoản người dùng

            $sql_check = "SELECT * FROM t_nguoi_dung WHERE email = '$email' and mat_khau = '$mat_khau' ";

            $query_check_tk = mysqli_query($connect,$sql_check);
    
            $data_nguoi_dung = mysqli_fetch_assoc($query_check_tk);
    
            $result = mysqli_num_rows($query_check_tk);
    
            if(empty($mat_khau)){
    
                $txt_error['error-span'] = "Vui lòng nhập mật khẩu";
    
            } elseif($result > 0){

                // var_dump($ten_day_du);
                // var_dump($mat_khau);
                // var_dump($email);
                // exit;

                $sql_sua_thong_tin = "UPDATE `t_nguoi_dung` SET `ten_day_du`='$ten_day_du',`dia_chi`='$dia_chi',`so_dien_thoai`='$sdt',`gioi_tinh`='$gioi_tinh',`mat_khau`='$mat_khau' WHERE email = '$email'";
               
                $query_sua_thong_tin = mysqli_query($connect,$sql_sua_thong_tin);

                if($query_sua_thong_tin){         //Câu lệnh oke
                    echo "<script>alert('Sửa thành công')</script>";
                    header('location:taikhoancuatoi.php');
                }

            } else{

                $txt_error['error-span'] = "Mật khẩu sai";
    
            }
        }
    }
?>
<body>
<!-- wrapper -->
<div id="wrapper">
    <?php
        include('./include/header.php');
    ?>
    <div id="container">

        <div id="blockMap">
            <div id="map">
                <span><a class="text-black" href="./index.php">Trang chủ</a>/Tài khoản của tôi</span>
            </div>
        </div>
        
        <div class="main">
            <div class="left-content">
                <ul>
                    <li style="color: #fff;background-color:#00cc66;cursor:none" >
                        <h3>TÀI KHOẢN CỦA BẠN</h3>
                    </li>
                    <li><a href="">Quản lí tài khoản</a></li>
                    <li><a href="/donhang.php">Đơn hàng của tôi</a></li>
                    <li>Sản phẩm yêu thích</li>
                    <li>Phiếu giảm giá</li>
                    <li>Thông báo</li>
                </ul>
            </div> <!-- Đóng left -->

            <div class="right-content">
                <form action="" method="POST"  >
                <div class="font-dk">
                    <div class="note">
                        <h3>
                            Thông Tin của Bạn
                        </h3>
                    </div>
                    <div class="dk-ttin">
                        <label for="hoten" class="dk-label">Nhập Tên Đầy Đủ</label>
                        <input class="ip-dk" type="text" name="txthoten" placeholder="Nhập Họ Tên Bạn" id="hoten" value="<?php if(isset($ten_day_du)) echo $ten_day_du ?>" >
                        <span class="error-hoten error-span"><?php if(isset($arr_error['hoten'])) echo $arr_error['hoten'] ?></span>
                    </div>
                    <div class="dk-ttin">
                        <label for="diachi" class="dk-label">Nhập Địa Chỉ</label>
                        <input class="ip-dk" type="text" name="txtdiachi" placeholder="Nhập Địa Chỉ Bạn" id="diachi" value="<?php if(isset($dia_chi)) echo $dia_chi ?>" >
                        <span class="error-diachi error-span"><?php  if(isset($arr_error['diachi'])) echo $arr_error['diachi'] ?></span>
                    </div>
                    <div class="dk-ttin">
                        <label for="sdt" class="dk-label">Nhập Số Điện Thoại</label>
                        <input class="ip-dk" type="text" name="txtsdt" placeholder="Nhập Số Điện Thoại Bạn" id="sdt"  value="<?php if(isset($sdt)) echo $sdt ?>" >
                        <span class="error-sdt error-span"><?php  if(isset($arr_error['sdt'])) echo $arr_error['sdt'] ?></span>
                    </div>
                    <div class="dk-ttin">
                        <input class="ip-gioitinh" type="radio" name="txtgioitinh" value="Nam" id="gt_nam" checked>
                        <label for="gt_nam" >Nam</label>
                        <input class="ip-gioitinh" type="radio" name="txtgioitinh" value="Nữ" id="gt_nu" >
                        <label for="gt_nu" >Nữ</label>
                        <input class="ip-gioitinh" type="radio" name="txtgioitinh" value="Khác" id="gt_khac" >
                        <label for="gt_khac" >Khác</label>
                        <span class="error-gioitinh error-span"><?php  if(isset($arr_error['gioitinh'])) echo $arr_error['gioitinh'] ?></span>
                        Giới tính &nbsp
                        <select name="txtgioitinh" id="">
                            <option value="<?php if(isset($gioi_tinh)) echo $gioi_tinh ?>"><?php if(isset($gioi_tinh)) echo $gioi_tinh ?></option>
                            <option value="Nam" id="gt_nam" class="ip-gioitinh">Nam</option>
                            <option value="Nữ" id="gt_nu" class="ip-gioitinh">Nữ</option>
                            <option value="Khác" id="gt_khac" class="ip-gioitinh">Khác</option>
                        </select>
                    </div>
                    <div class="dk-ttin">
                        <label for="email" class="dk-label">Nhập Email</label>
                        <p class="" id="email" style=" margin: 0;height: 40px; padding: 10px; width: 280px;" ><?php if(isset($email)) echo $email ?></p>
                    </div>  
                    <div class="dk-ttin">
                        <label for="matkhau" class="dk-label">Nhập Mật Khẩu</label>
                        <input class="ip-dk" type="password" name="txtmatkhau" placeholder="Nhập Mật Khẩu" id="matkhau"  value="<?php if(isset($mat_khau)) echo $mat_khau ?>" >
                        <span class="error-matkhau error-span"><?php  if(isset($arr_error['matkhau'])) echo $arr_error['matkhau'] ?></span>
                    </div>
                    <div class="dk-ttin">
                        <label for="nlmatkhau" class="dk-label">Nhập Lại Mật Khẩu</label>
                        <input class="ip-dk" type="password" name="txtnlmatkhau" placeholder="Nhập Lại Mật Khẩu" id="nlmatkhau"  value="<?php if(isset($mat_khau2)) echo $mat_khau2 ?>" >
                        <span class="error-nlmatkhau error-span"><?php  if(isset($arr_error['nlmatkhau'])) echo $arr_error['nlmatkhau'] ?></span>
                    </div>
                </div>
                <div class="error">
                    <span class="error-span inline"><?php  if(isset($txt_error['error-span'])) echo $txt_error['error-span'] ?></span>
                </div>
                <div class="footer-dk">
                    <!-- <input class="ipdk" type="submit" value="ĐĂNG KÝ" onclick=""/> -->
                    <input type="submit" class="btn-dk" value="Lưu tài Khoản" onclick="" name="luu_submit" >
                </div>
                </form>
                 <div class="clear"></div>
            </div> <!-- Đóng right -->
         <div class="clear"></div>
        </div>
         <div class="clear"></div>
         <hr>
    </div> <!-- Đóng container -->
    <!-- Footer -->
    <?php
        include('./include/footer.php')
    ?> <!-- kết thúc footer -->
<div class="clear"></div>
</div> <!-- kết thúc wrapper -->
</body>
    
</html>