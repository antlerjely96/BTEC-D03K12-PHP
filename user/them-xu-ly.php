<?php
    $email = $_POST['email'];
    $password = $_POST['password'];
    $ho_ten = $_POST['ten'];
    $ngay_sinh = $_POST['ngay_sinh'];
    $gioi_tinh = $_POST['gioi_tinh'];
    $dia_chi = $_POST['dia_chi'];
    //Kết nối DB
    $connect = mysqli_connect('localhost','root','','d03k12');
    mysqli_set_charset($connect,'utf8');
    //sql
    $sql = "INSERT INTO user(uid, pwd, ten_user, ngay_sinh, gioi_tinh, dia_chi) VALUES ('$email', '$password', '$ho_ten', '$ngay_sinh' ,'$gioi_tinh', '$dia_chi')";
    mysqli_query($connect, $sql);
    mysqli_close($connect);
    header("location:danh-sach-user.php");
?>