
<link rel="stylesheet" href="./css/header.css">
<?php
    include('./config/config.php');


    // Truy xuất sản phẩm giỏ hàng

    $id_khach_mua_hang = 0;

    if(isset($_SESSION['data_nguoi_dung']['ten_day_du'])){

        $id_khach_mua_hang = $_SESSION['data_nguoi_dung']['t_nguoi_dung_id'];
        
    }

    $sql_gio_hang = "select * from t_gio_hang WHERE khach_hang_id = $id_khach_mua_hang";
        
    $query_gio_hang = mysqli_query($connect, $sql_gio_hang);
    
    $danhSachSanPham_gio_hang = [];

    while($data = mysqli_fetch_assoc($query_gio_hang)){
        $danhSachSanPham_gio_hang[] = $data;
    }

    // Tổng tiền giỏ hàng
    $tong_so_luong_gio = 0;
    foreach($danhSachSanPham_gio_hang as $key => $val ) {
        $tong_so_luong_gio += $val['so_luong'];
    }
?>
<header>
        <div class="logo">
            <a class="text-black a-search" href="/index.php">
                <img id="iconLogo" src="assets/imgs/logoSach.jpg" alt="" srcset="" >
            </a>
        <!-- <h3 class="title-logo" ><a class="text-black" href="/index.php">BOOK</a></h3> -->
        </div>

        <div class="timKiem">
        <form action="allProduct.php" method="GET">
            <input type="hidden" name="page" value="1" >    <!-- Bấm vô đầu tiên page sẽ = 1 -->
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
            </button>
        </form>
        </div>

        <div class="giohang">
            <a href="/giohang.php">
                <i id="iconGioHang" class="fa-solid fa-cart-shopping"></i>
                <!-- <img id="iconGioHang" src="https://salt.tikicdn.com/ts/upload/40/44/6c/b80ad73e5e84aeb71c08e5d8d438eaa1.png" alt=""> -->
                <span id="demSanPham"><?php echo $tong_so_luong_gio ?></span>
                Giỏ hàng
            </a>
        </div>
        <div class="donhang">
            <a href="/donhang.php">
                <i id="icondonhang" class="fa-solid fa-receipt"></i>
                Đơn hàng
            </a>
        </div>
        <div class="nguoidung">
            <?php 
                if (isset($_SESSION['data_nguoi_dung'])) { ?>
                    <a href="/taikhoancuatoi.php" class="dangnhap-dangky" ><?php if(isset($_SESSION['data_nguoi_dung']['ten_day_du'])) echo $_SESSION['data_nguoi_dung']['ten_day_du'] ?></a>
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
<div class="nav text-white">
<p>Miễn phí giao hàng từ đơn có trị giá 299.000đ</p>
<p style="float:right;padding-right: 4px;">Hotline(HoChiMinh):0935.877.xxx</p>
</div>