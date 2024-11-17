<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./css/admin.css">
    <title>BOOK ADMIN</title>
</head>
<?php
    include('../config/config.php');

    session_start();
?>
<body>
<div class="wrapper">

    <!-- Header -->
    <?php 
    ?>
    <header>
        <div class="title">
            <a href="#" id="nut_mo_sidebar" onclick="moSidebar();" style="display: none;" ><i class="fa-solid fa-arrow-down-wide-short"></i></a>
            <h3>Quản lí bán sách</h3>
        </div>
        <div class="logo">
            <img id="iconLogo" src="/assets/imgs/logoSach.jpg" alt="" srcset="" >
            <h3 class="title-logo" ><a class="text-black" href="?bangdieukhien">BOOK</a></h3>
        </div>
        <div class="timKiem">
        <form action="" method="GET">
            <input type="hidden" name="page" value="1" >    <!-- Bấm vô đầu tiên page sẽ = 1 -->
            <input type="hidden" name="quanlisanpham" value="" >    <!-- Bấm vô đầu tiên page sẽ = 1 -->
            <input type="text" placeholder="Tìm kiếm sách" list="" value="<?php echo isset($_GET['ten_tim_kiem']) ? $_GET['ten_tim_kiem'] : "" ?>" name="ten_tim_kiem" id="timkiemSP">
            <datalist id="topSP" >
                <option value="Tiểu thuyết"></option>
                <option value="Kinh tế"></option>
                <option value="Văn học"></option>
                <option value="Ngoại ngữ"></option>
                <option value="Truyện tranh"></option>
            </datalist>
            <button id="btnTimKiemSP" >
                <!-- <input btnTimKiemSP type="submit" value=""> -->
                <i class="fa-solid fa-magnifying-glass"></i>
                Tìm kiếm    
            </button>
        </form>
        </div>
        <div class="nguoidung">
            <?php 
                if (isset($_SESSION['data_nguoi_dung'])) { ?>
                    <img src="/assets/imgs/memeAVT.jpg" alt="">
                    <a href="/taikhoancuatoi.php" class="dangnhap-dangky" ><?php if(isset($_SESSION['data_nguoi_dung'])) echo "ADMIN" ?></a>
                    <a href="/dangxuat.php"><i id="iconNguoiDung" class="fa-solid fa-right-from-bracket text-black"></i></a>
                <?php  
                } else { ?>
                    <i id="iconNguoiDung" class="fa-solid fa-user-large"></i>
                    <a class="dangnhap-dangky" href="./dangnhap.php">Đăng nhập</a>
                    <span>/</span>
                    <a class="dangnhap-dangky" href="./dangky.php">Đăng ký</a>
                <?php } ?>
            <!-- <span>Tài khoản</span> -->
        </div> 
    </header>

    <div class="wrapper-container">

        <div class="sidebar-left" id="sidebar">
            <div class="header-sidebar">
                <h3>
                    <a href="#" onclick="dongSidebar();"  ><i class="fa-solid fa-toggle-off"></i></a>
                    ADMIN
                </h3>
            </div>
            <div class="conntent-sidebar">
                <ul>
                    <li class="chuc_nang <?php if(isset($_GET['bangdieukhien'])) echo 'li_hover' ?>">
                        <a href="?bangdieukhien">
                            <i class="fa-solid fa-bars"></i>
                            Bảng điều khiển
                        </a>
                    </li>
                    <li class="chuc_nang <?php if(isset($_GET['quanlikhachhang'])) echo 'li_hover' ?>">
                        <a href="?quanlikhachhang">
                            <i class="fa-solid fa-user"></i>
                            Quản lí khách hàng
                        </a>
                    </li>
                    <li class="chuc_nang <?php if(isset($_GET['quanlisanpham'])) echo 'li_hover' ?>">
                        <a href="?quanlisanpham&page=1">
                            <i class="fa-solid fa-book"></i>
                            Quản lí sách
                        </a>
                    </li>
                    <li class="chuc_nang <?php if(isset($_GET['quanlihoadon'])) echo 'li_hover' ?>">
                        <a href="?quanlihoadon">
                            <i class="fa-solid fa-file"></i>
                            Quản lí hóa đơn
                        </a>
                    </li>
                    <li class="chuc_nang ">
                        <a href="">
                            <i class="fa-solid fa-calendar"></i>
                            Quản lí thể loại
                        </a>
                    </li>
                    <li class="chuc_nang">
                        <a href="">
                            <i class="fa-solid fa-pen-clip"></i>
                            Quản lí tác giả
                        </a>
                    </li>
                    <li class="chuc_nang <?php if(isset($_GET['thongke'])) echo 'li_hover' ?>">
                        <a href="?thongke">
                            <i class="fa-solid fa-arrow-trend-up"></i>
                            Thông kê doanh thu
                        </a>
                    </li>
                    <li class="chuc_nang">
                        <a href="">
                            <i class="fa-solid fa-calendar-days"></i>
                            Lịch trình
                        </a>
                    </li>
            
                </ul>
            </div>
        </div>

        <div class="main">

            <?php
                if(isset($_GET['bangdieukhien'])){
                    include('../admin/bangdieukhien.php');
                }
                else if(isset($_GET['quanlikhachhang'])){
                    include('../admin//quanlinguoidung.php');
                }else if(isset($_GET['quanlisanpham'])){
                    include('../admin//quanlisanpham.php');
                }
            ?>

        </div> <!-- Đóng main -->

        <div class="clear"></div>

    </div>  <!-- Đóng wrapper-container -->

<div class="clear"></div>
</div>  <!-- Đóng wrapper -->

<div class="clear"></div>
</body>
</html>
<script>
    function dongSidebar() {
        document.getElementById('sidebar').classList.add("nut_dong_sidebar");
        document.getElementById('nut_mo_sidebar').style.display = "block";
        document.querySelector('.main').classList.add("main-mo");
    }
    function moSidebar() {
        document.getElementById('sidebar').classList.remove("nut_dong_sidebar");
        document.getElementById('nut_mo_sidebar').style.display = "none";
        document.querySelector('.main').classList.remove("main-mo");
    }
    
</script>