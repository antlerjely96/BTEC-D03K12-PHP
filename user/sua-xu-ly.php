<?php
    $ma_user = $_POST['ma_user'];
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
    $sql = "UPDATE user SET uid = '$email', pwd = '$password', ten_user = '$ho_ten', ngay_sinh = '$ngay_sinh', gioi_tinh = '$gioi_tinh', dia_chi = '$dia_chi' WHERE ma_user = $ma_user";
    mysqli_query($connect, $sql);
    mysqli_close($connect);
    header("location:danh-sach-user.php");
?>