<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/dangky.css">
    <title>Đăng Ký</title>
</head>
<?php 
    include('./config/config.php');
    
    session_start();
?>
<!-- Xử Lý PHP -->
<?php
    $arr_error = []; // Mảng lỗi
    if(isset($_POST['dk_submit'])){
        // Chạy khi đây đủ thông tin
        $ten_day_du = $_POST['txthoten'];
        $dia_chi = $_POST['txtdiachi'];
        $sdt = $_POST['txtsdt'];
        if(isset($_POST['txtgioitinh'])){
            $gioi_tinh = $_POST['txtgioitinh'];
        }  else {
            $gioi_tinh = false;
        }
        $email = $_POST['txtemail'];
        $mat_khau = $_POST['txtmatkhau'];
        $mat_khau2 = $_POST['txtnlmatkhau'];
        $kieu_nguoi_dung = 'nguoidung';
        
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
            $arr_error['sdt'] = "Vui lòng không để số điện thoại";
        }elseif(strlen($sdt)!=10 ||  is_nan($sdt)){
            $arr_error['sdt'] = "Số điện thoại không hợp lệ";
        } else{
            // $arr_error['sdt'] = '';
        }
        //G.TÍNH
        if(empty($gioi_tinh)){
            $arr_error['gioitinh'] = 'Vui lòng chọn giới tính';
        } else{
            // $arr_error['gioitinh'] = '';
        }
        // Check email
        $regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i"; 
        if(empty($email)){
            $arr_error['email'] = "Vui lòng không để trống email";
        } else{
            // $arr_error['email'] = '';
        }

        $sql_email =" SELECT * FROM t_nguoi_dung WHERE email = '$email'";
        $old_email = mysqli_query($connect,$sql_email);
        if(mysqli_num_rows($old_email)>0){
            $arr_error['email'] = 'Địa chỉ email đã có sẵn';
        }
        // Mật khẩu
        if(empty($mat_khau)  || strlen($mat_khau)<6){
            $arr_error['matkhau'] = 'Mật khẩu dài hơn 5 ký tự';
        } else{
            // $arr_error['matkhau'] = '';
        }

        if ($mat_khau2 != $mat_khau) {
            $arr_error['nlmatkhau'] = 'Mật khẩu không giống';
        }else{
            // $arr_error['nlmatkhau'] = '';
        }
        if(empty($arr_error)){
        //Đếm id của người dùng
            // $sql_id =" SELECT * FROM t_nguoi_dung ";
            // $sql_id = mysqli_query($connect,$sql_id);
            // $count_id = mysqli_num_rows($sql_id); 

            // echo "<script>alert('$count_id, $ten_day_du,$dia_chi, $sdt, $gioi_tinh, $exmail, $mat_khau')</script>";

            $sql = "INSERT INTO t_nguoi_dung (ten_day_du, dia_chi, so_dien_thoai, gioi_tinh, email, mat_khau, kieu_nguoi_dung)
             VALUES ( '$ten_day_du', '$dia_chi', '$sdt', '$gioi_tinh', '$email', '$mat_khau', 'nguoidung')";

            $sql_query = mysqli_query($connect, $sql);
            if($sql_query){         //Câu lệnh oke
                echo "<script>alert('Đăng ký thành công')</script>";
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
                <span><a class="text-black" href="./index.php">Trang chủ/Đăng ký</a></span>
            </div>
        </div>
        <div class="block-Luachon">
            <h2 class="inline">
            Đăng Ký
            </h2>
            <span class="inline" >hoặc</span>
            <h2 class="inline" >
            <a href="./dangnhap.php" style="color: rgb(47, 175, 15);">Đăng Nhập</a>
            </h2>
        </div>
        <div class="main">
            <div class="left-content">
                <h3>Đăng nhập bằng</h3>
                <div class="btn-facebook">
                    <p class="inline" >f</p>
                    <input class="inline" type="button" value="FACEBOOK">
                </div>
            </div>
            <div class="right-content">
                <form action="" method="POST"  >
                <div class="font-dk">
                    <div class="note">
                        <h3>
                            Nhập Thông Tin của Bạn
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
                        <input class="ip-gioitinh" type="radio" name="txtgioitinh" value="Nam" id="gt_nam" >
                        <label for="gt_nam" >Nam</label for="" >
                        <input class="ip-gioitinh" type="radio" name="txtgioitinh" value="Nữ" id="gt_nu" >
                        <label for="gt_nu" >Nữ</label for="" >
                        <input class="ip-gioitinh" type="radio" name="txtgioitinh" value="Khác" id="gt_khac" >
                        <label for="gt_khac" >Khác</label for="" >
                        <span class="error-gioitinh error-span"><?php  if(isset($arr_error['gioitinh'])) echo $arr_error['gioitinh'] ?></span>
                    </div>
                    <div class="dk-ttin">
                        <label for="email" class="dk-label">Nhập Email</label>
                        <input class="ip-dk" type="email" name="txtemail" placeholder="Nhập Email Thoại Bạn" id="email"  value="<?php if(isset($email)) echo $email ?>" >
                        <span class="error-email error-span"><?php  if(isset($arr_error['email'])) echo $arr_error['email'] ?></span>
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
                <div class="footer-dk">
                    <!-- <input class="ipdk" type="submit" value="ĐĂNG KÝ" onclick=""/> -->
                    <input type="submit" class="btn-dk" value="Đăng Ký tài Khoản" onclick="" name="dk_submit" >
                </div>
                </form>
                 <div class="clear"></div>
                <div class="footer-bonus">
                    <p class="dacotk">
                        Bạn có tài khoản rồi! <a href="./dangnhap.php" onclick="" >Đăng Nhập</a>
                    </p>
                    <p class="dkhoang-dvu"><a href="#">Điều Khoản </a>& <a href="#">Dịch Vụ</a></p>
                </div>
            </div>
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