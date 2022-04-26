<?php
        $ma_user = $_GET['ma_user'];
        //Kết nối DB
        $connect = mysqli_connect('localhost', 'root', '', 'd03k12');
        mysqli_set_charset($connect, 'utf8');
        //Lấy dữ liệu từ DB ra
        $sql = "DELETE FROM user WHERE ma_user = $ma_user";
        mysqli_query($connect, $sql);
        mysqli_close($connect);
        header("location:danh-sach-user.php");
?>