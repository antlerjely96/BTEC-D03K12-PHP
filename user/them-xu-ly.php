<?php
    $email = $_POST['email'];
    $password = $_POST['password'];
    $ho_ten = $_POST['ten'];
    $ngay_sinh = $_POST['ngay_sinh'];
    $gioi_tinh = $_POST['gioi_tinh'];
    $dia_chi = $_POST['dia_chi'];
    include_once "../connect/open-connect.php";
    //sql
    $sql = "INSERT INTO user(uid, pwd, ten_user, ngay_sinh, gioi_tinh, dia_chi) VALUES ('$email', '$password', '$ho_ten', '$ngay_sinh' ,'$gioi_tinh', '$dia_chi')";
    mysqli_query($connect, $sql);
    include_once "../connect/close-connect.php";
    header("location:danh-sach-user.php");

?>