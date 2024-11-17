<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/dangnhap.css">
    <title>Đăng nhập</title>
</head>
<?php
    include('./config/config.php');

    session_start();

    if(isset($_POST['submit-dk'])){

        $email = $_POST['txtemail'];
        $mat_khau = $_POST['txtmatkhau'];
        

        $sql_login = "SELECT * FROM t_nguoi_dung WHERE email = '$email' and mat_khau = '$mat_khau' ";

        $query_check_tk = mysqli_query($connect,$sql_login);

        $data_nguoi_dung = mysqli_fetch_assoc($query_check_tk);

        $result = mysqli_num_rows($query_check_tk);

        if(empty($email) && empty($mat_khau)){

            $txt_error['error-span'] = "Vui lòng nhập tài khoản mật khẩu";

        } elseif($result > 0){

            // if(isset($_SESSION['data_nguoi_dung'])){
                
                $_SESSION['data_nguoi_dung'] = $data_nguoi_dung;

                $phan_quyen = $_SESSION['data_nguoi_dung']['kieu_nguoi_dung'];
                
                $id_khach_mua_hang = $_SESSION['data_nguoi_dung']['t_nguoi_dung_id'];

                if($phan_quyen == 'admin'){
    
                    header('location:admin/admin.php?bangdieukhien');
    
                }else{

                    header('location:index.php');
                }
                // ---------------------------------------------------------------------------------------------

            // Nếu đăng nhập thành công : nó lưu cái giỏ hàng tạm vào giỏ hàng mới đó mà xoá đi giỏ hàng tạm

            // Truy xuất sản phẩm giỏ hàng tạm

            $sql_gio_hang_tam = "select * from t_gio_hang WHERE khach_hang_id = 0";
            
            $query_gio_hang_tam = mysqli_query($connect, $sql_gio_hang_tam);
            
            $danhSachSanPham_gio_hang_tam = [];

            while($data = mysqli_fetch_assoc($query_gio_hang_tam)){
                $danhSachSanPham_gio_hang[] = $data;
            }

            foreach($danhSachSanPham_gio_hang as $key => $val ){

                // Truy xuất sản phẩm đã có giỏ hàng

                $sql_san_pham_co_trong_gio_hang = "select * from t_gio_hang WHERE khach_hang_id = $id_khach_mua_hang and san_pham_id = $val[san_pham_id] ";
                
                $query_san_pham_co_trong_gio_hang = mysqli_query($connect, $sql_san_pham_co_trong_gio_hang);
                
                $san_pham_co_trong_gio_hang = mysqli_fetch_assoc($query_san_pham_co_trong_gio_hang);

                // Thêm 1 số lượng sản phẩm đã có sẵn vào giỏ vào giỏ

                if($san_pham_co_trong_gio_hang['san_pham_id'] == $val['san_pham_id']){

                    $so_luong_moi = $san_pham_co_trong_gio_hang['so_luong']+$val['so_luong'];

                    $sql_query_them_gio_hang = mysqli_query($connect,"UPDATE `t_gio_hang` SET `so_luong`='$so_luong_moi' WHERE san_pham_id = $val[san_pham_id]");
            
                }else{  //Thêm sản phẩm mới vào giỏ
        
                    $sql_query_them_gio_hang = mysqli_query($connect,"INSERT INTO `t_gio_hang`( `khach_hang_id`, `san_pham_id`, `ten_san_pham`, `anh_san_pham`, `so_luong`, `gia_ban`) 
                    VALUES ('$id_khach_mua_hang','$val[san_pham_id]','$val[ten_san_pham]','$val[anh_san_pham]','$val[so_luong]','$val[gia_ban]')");
                
                    
                }

                $sql_xoa_gio_hang_tam = mysqli_query($connect,"DELETE FROM `t_gio_hang` WHERE san_pham_id =  $val[san_pham_id] and khach_hang_id = 0 ");

            }
            // }
            
        } else{

            $txt_error['error-span'] = "Tài khoản mật khẩu sai";

        }
        // echo "<script>alert('Ổn')</script>";
        

    }
?>
<body>
<!-- wrapper -->
<div id="wrapper">
    <?php
        include('./include/header.php')
    ?>
    <div id="container">
        <div id="blockMap">
            <div id="map">
                <span><a class="text-black" href="./index.php">Trang chủ/Đăng nhập</a></span>
            </div>
        </div>
        <div class="block-Luachon">
            <h2 class="inline">
            Đăng nhập
            </h2>
            <span class="inline" >hoặc</span>
            <h2 class="inline" >
            <a href="./dangky.php" style="color: rgb(47, 175, 15);">Đăng ký</a>
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
                <form action="" method="POST">
                <div id="khuon-dn"  >
                    <div class="header-dn">
                        <h2>Đăng nhập</h2>
                    </div>
                    <div class="font-dn">
                        <div class="dn-ttin">
                            <label for="taikhoandn" class="dn-label">Tài khoản :</label>
                            <input placeholder="Email" type="text" class="ip-dn" id="taikhoandn" value="<?php if(isset($email)) echo $email ?>" name="txtemail">
                        </div>
                        <div class="dn-ttin">
                            <label for="matkhaudn" class="dn-label">Mật khẩu :</label>
                            <input placeholder="Mật khẩu" type="password" class="ip-dn" id="matkhaudn" value="<?php if(isset($mat_khau)) echo $mat_khau ?>" name="txtmatkhau" >
                        </div>
                        <div class="error">
                            <span class="error-span inline"><?php  if(isset($txt_error['error-span'])) echo $txt_error['error-span'] ?></span>
                        </div>
                        <div class="dn-ttin">
                            <input type="checkbox"> <span>Nhớ tài khoản</span>
                            </div>
                        <div class="dn-ttin">
                        <input type="submit" class="btn-dn" value="Đăng Nhập" onclick="" name="submit-dk" >
                        </div>
                    </div>
                    <div class="footer-dn">
                        <div class="chuacotk"><a onclick="" href="./dangky.php">Đăng ký</a></div>
                        <div class="quentk"><a href="">Quên tài khoản</a></div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="clear"></div>
        <hr>
    </div> <!-- Đóng container -->
    <!-- footer -->
    <?php
        include('./include/footer.php')
    ?> <!-- kết thúc footer -->
<div class="clear"></div>
</div> <!-- kết thúc wrapper -->
</body>
    
</html>
<?php
    include('./config/config.php');
?>
<?php

?>