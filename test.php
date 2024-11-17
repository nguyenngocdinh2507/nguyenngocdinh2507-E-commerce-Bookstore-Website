<?php

    include('./config/config.php'); 

    session_start();

    $today = date("d/m/Y");
    var_dump($today);
    exit;


    $id_khach_mua_hang = 0;

        if(isset($_SESSION['data_nguoi_dung']['ten_day_du'])){

            $id_khach_mua_hang = $_SESSION['data_nguoi_dung']['t_nguoi_dung_id'];

        }

        $sql = "select * from t_don_hang WHERE khach_hang_id = $id_khach_mua_hang";
        
        $query = mysqli_query($connect, $sql);
        
        $danhSachDonHang = [];

        while($data = mysqli_fetch_assoc($query)){
            $danhSachDonHang[] = $data;
        }

        echo "<pre>";
        var_dump($danhSachDonHang);
        exit;

        $sql = "select * from t_gio_hang WHERE khach_hang_id = 0";
        
        $query = mysqli_query($connect, $sql);
        
        $danhSachSanPham = [];

        while($data = mysqli_fetch_assoc($query)){
            $danhSachSanPham[] = $data;
        }

        foreach($danhSachSanPham as $key => $val ){
            echo "<pre>";
            var_dump($val);
        }
        exit;

        echo "<pre>";
        var_dump($danhSachSanPham);
        exit;

    $_SESSION['gio-tam'] = [];
    // Truy xuất sản phẩm giỏ hàng

    $id_khach_mua_hang = 0;

    if(isset($_SESSION['data_nguoi_dung']['ten_day_du'])){

        $id_khach_mua_hang = $_SESSION['data_nguoi_dung']['t_nguoi_dung_id'];

    }

    $sql = "select * from t_gio_hang WHERE khach_hang_id = $id_khach_mua_hang";
    
    $query = mysqli_query($connect, $sql);
    
    $danhSachSanPham = [];

    while($data = mysqli_fetch_assoc($query)){
        $_SESSION['gio-tam'][] = $data;
    }
    echo "<pre>";
    var_dump($_SESSION['gio-tam'][0]['t_gio_hang_id']);
    exit;

    

?>
