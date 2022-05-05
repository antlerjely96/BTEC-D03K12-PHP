<?php
    $ten_san_pham = $_POST['ten_san_pham'];
    $gia = $_POST['gia'];
    $so_luong = $_POST['so_luong'];
    $ma_loai_san_pham = $_POST['ma_loai_san_pham'];
    include_once "../connect/open-connect.php";
    $sql = "INSERT INTO san_pham(ten_san_pham, gia, so_luong, ma_loai_san_pham)
            VALUES ('$ten_san_pham', '$gia', '$so_luong', '$ma_loai_san_pham')";
    $result = mysqli_query($connect, $sql);
    include_once "../connect/close-connect.php";
    header("location:danh-sach.php");
?>