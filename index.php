<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="./js/slider.js"></script>
    <title>Trang chủ</title>
</head>
<?php 
    include('./config/config.php');
    
    session_start();
?>
<body>
<!-- wrapper -->
<div id="wrapper">

    <!-- Header -->
    <?php 
        include('./include/header.php');
    ?>

    <div class="main">

        <!-- sidebar-left -->
        <?php
            // include('./include/sidebar-left.php')
        ?>

        <div id="blockMap">
            <div id="map">
                <span><a class="text-black" href="./index.php">Trang chủ</a></span>
            </div>
        </div>

        <div class="content">

            <!-- Slider -->
            <section name="" id="slider">
                <div id="banner">
                    <img id="img" src="./assets/imgs/banner1.jpg" alt="">
                    <div class="nut-slider">
                        <div class="nut active" onclick="setIndex(0);" ></div>
                        <div class="nut" onclick="setIndex(1);" ></div>
                        <div class="nut" onclick="setIndex(2);" ></div>
                    </div>
                </div>
            </section>

            <!-- product -->
            <?php
                include('./include/product.php');
            ?>
            
        </div> <!-- kết thúc content -->

    <div class="clear"></div>
    </div> <!-- kết thúc main -->

    <!-- Footer -->
    <?php
        include('./include/footer.php');
    ?>

<div class="clear"></div>
</div> <!-- kết thúc wrapper -->
</body>
    
</html>