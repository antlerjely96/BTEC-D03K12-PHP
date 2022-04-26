<?php
    $ma_user = $_GET['ma_user'];
    //Kết nối DB
    $connect = mysqli_connect('localhost','root','','d03k12');
    mysqli_set_charset($connect,'utf8');
    //Lấy dữ liệu từ DB ra
    $sql = "SELECT * FROM user WHERE ma_user = $ma_user";
    $result = mysqli_query($connect,$sql);
    foreach ($result as $each){
?>
<form action="sua-xu-ly.php" method="post">
    <input type="hidden" name="ma_user" value="<?php echo $each['ma_user'];?>">
    UID: <input type="email" name="email" value="<?php echo $each['uid'];?>"><br>
    PWD: <input type="password" name="password" value="<?php echo $each['pwd'];?>"><br>
    Họ tên: <input type="text" name="ten" value="<?php echo $each['ten_user'];?>"><br>
    Ngày sinh: <input type="date" name="ngay_sinh" value="<?php echo $each['ngay_sinh'];?>"><br>
    Giới tinh: <input type="radio" name="gioi_tinh" value="1" checked> Nam
                <input type="radio" name="gioi_tinh" value="0"
                    <?php
                        if($each['gioi_tinh'] == 0){
                    ?>
                            checked
                    <?php
                        }
                    ?>
                > Nữ<br>
    Địa chỉ: <input type="text" name="dia_chi" value="<?php echo $each['dia_chi'];?>"><br>
    <button>Sửa</button>
</form>
<?php
    }
    mysqli_close($connect);
?>