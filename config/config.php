<?php 
    $servername   = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'quanlibansach';
    // Create connection
    $connect = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    
    if($connect == false){
        echo "Kết nối data thất bại";exit;
    }
    // $sql = 'select * from t_san_pham';

    // $query = mysqli_query($connect, $sql);

    // $danhSachSanPham = [];
    // while($data = mysqli_fetch_assoc($query)){
    //     $danhSachSanPham[] = $data;
    // }
?>