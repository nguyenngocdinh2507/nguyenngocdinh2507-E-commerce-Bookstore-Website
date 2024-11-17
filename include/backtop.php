<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Document</title>
    <style>
        #backtop:hover{
            background-color: #00cc66;
            cursor: pointer;
        }
        #backtop{
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 1px solid #000;
            text-align: center;
            line-height: 40px;
            position: fixed;
            bottom: 24px;
            right: 24px;
        }
    </style>
</head>
<body>
    <div id="backtop">
        <i class="fa-solid fa-angles-up"></i>
    </div>
</body>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $(window).scroll(function(){
                if ($(this).scrollTop()){
                    $('#backtop').fadeIn();
                } else
                    $('#backtop').fadeOut();
            });
            $('#backtop').click(function(){
                $('html , body').animate({
                    scrollTop:0
                },2000)
            });
        })
    </script>
</html>