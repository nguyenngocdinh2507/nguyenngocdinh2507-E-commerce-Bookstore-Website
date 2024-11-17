<div class="sidebar-left">

    <!-- Danh mục sách -->
    <div class="heading-danhmucsach">
        <h3><i class="fa-solid fa-bars"></i> Danh mục</h3>
    </div>

    <ul >
        <li class="li-danhmucsach" id= "">
            <a href="javascript:void(0)" class="text-black">Sách bán chạy</a>
        </li>
        <li class="li-danhmucsach" id= "">
            <a href="javascript:void(0)" class="text-black">Sách mới</a>
        </li>
        <li class="li-danhmucsach" id= "">
            <a href="javascript:void(0)" class="text-black">Sách sắp phát hành</a>
        </li>
        <li class="li-danhmucsach" id= "">
            <a href="javascript:void(0)" class="text-black">Sách giảm giá</a>
        </li>
    </ul>

    <br>
    <hr>
    <br>

    <!-- Tác giả -->
    <div class="heading-danhmucsach">
        <h3><i class="fa-solid fa-bars"></i> Tác giả</h3>
    </div>

    <?php

        include('./config/config.php');

        $sql_tac_gia = 'select * from t_tac_gia';

        $query_tac_gia = mysqli_query($connect, $sql_tac_gia);
    
        $danh_sach_tac_gia = [];
        while($data = mysqli_fetch_assoc($query_tac_gia)){
            $danh_sach_tac_gia[] = $data;
        }
    ?>

    <ul>

        <?php foreach($danh_sach_tac_gia as $key => $val) { ?>
            <li class="li-danhmucsach" style="cursor: default;">
                <input type="checkbox" name="" id="" style="cursor: pointer;">
                <span><?php echo $val['ten_tac_gia'] ?></span>
            </li>
        <?php } ?>

        <!--<li class="li-danhmucsach" style="cursor: default;" >
            <input type="checkbox" name="" id="" style="cursor: pointer;" >
            <span>Cao Minh</span>
        </li>
        <li class="li-danhmucsach" style="cursor: default;" >
            <input type="checkbox" name="" id="" style="cursor: pointer;" >
            <span>Dũng Phan</span>
        </li>
        <li class="li-danhmucsach" style="cursor: default;" >
            <input type="checkbox" name="" id="" style="cursor: pointer;" >
            <span>Lan Rùa</span>
        </li> -->
    </ul>

    <br>
    <hr>
    <br>

    <!-- Thể loại -->
    <div class="heading-danhmucsach">
        <h3><i class="fa-solid fa-bars"></i> Thể loại</h3>
    </div>

    <ul>

        <li class="li-danhmucsach" style="cursor: default;" >
            <input type="checkbox" name="" id="" style="cursor: pointer;" >
            <span>Tiểu thuyết</span>
        </li>
        <li class="li-danhmucsach" style="cursor: default;" >
            <input type="checkbox" name="" id="" style="cursor: pointer;" >
            <span>Kinh tế</span>
        </li>
        <li class="li-danhmucsach" style="cursor: default;" >
            <input type="checkbox" name="" id="" style="cursor: pointer;" >
            <span>Văn học</span>
        </li>
        <li class="li-danhmucsach" style="cursor: default;" >
            <input type="checkbox" name="" id="" style="cursor: pointer;" >
            <span>Ngoại ngữ</span>
        </li>
        <li class="li-danhmucsach" style="cursor: default;" >
            <input type="checkbox" name="" id="" style="cursor: pointer;" >
            <span>Chuyện tranh</span>
        </li>
    </ul>

    <br>
    <hr>
    <br>

    <!-- Tiền
    <div class="heading-danhmucsach">
        <h3><i class="fa-solid fa-bars"></i> Giá</h3>
    </div>

    <ul>
        <li class="li-danhmucsach" style="border:none">
            <input class="btn-khoangGia" type="button" value="Dưới 60.000đ">
        </li>
        <li class="li-danhmucsach" style="border:none">
            <input class="btn-khoangGia" type="button" value="Từ 60.000-240.000đ">
        </li>
        <li class="li-danhmucsach" style="border:none">
            <input class="btn-khoangGia" type="button" value="Trên 240.000đ">
        </li>
        <span style="color: rgb(133, 133, 133);padding-left:28px" >Chọn khoảng giá</span>
        <input pattern="[0-9]*" class="ipt-khoangGia" type="text" placeholder="Giá từ" name="" value="0" id="">
        <span>-</span>
        <input pattern="[0-9]*" class="ipt-khoangGia" type="text" placeholder="Giá đến" name="" value="0" id="">
        <input class="btn-khoangGia" style="margin:4px 0px 0 3px;border-radius:0%" type="button" value="Áp dụng">
    </ul> -->
    
</div> <!-- kết thúc sidebar-left -->