<?php
    $ma_user = $_POST['ma_user'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $ho_ten = $_POST['ten'];
    $ngay_sinh = $_POST['ngay_sinh'];
    $gioi_tinh = $_POST['gioi_tinh'];
    $dia_chi = $_POST['dia_chi'];
    include_once "../connect/open-connect.php";
    //sql
    $sql = "UPDATE user SET uid = '$email', pwd = '$password', ten_user = '$ho_ten', ngay_sinh = '$ngay_sinh', gioi_tinh = '$gioi_tinh', dia_chi = '$dia_chi' WHERE ma_user = $ma_user";
    mysqli_query($connect, $sql);
    include_once "../connect/close-connect.php";
    header("location:danh-sach-user.php");
?>