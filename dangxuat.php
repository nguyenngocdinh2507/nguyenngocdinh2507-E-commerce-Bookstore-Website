<?php
    session_start();

    if(isset($_SESSION['data_nguoi_dung'])){
        unset($_SESSION['data_nguoi_dung']);
        header('location:index.php');
    }
    
    // Session_destroy();
?>