<?php
    $ma_user = $_GET['ma_user'];
    include_once "../connect/open-connect.php";
    //Lấy dữ liệu từ DB ra
    $sql = "DELETE FROM user WHERE ma_user = $ma_user";
    mysqli_query($connect, $sql);
    include_once "../connect/close-connect.php";
    header("location:danh-sach-user.php");
?>