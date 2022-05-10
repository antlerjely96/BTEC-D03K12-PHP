<?php
    $ma_san_pham = $_POST['ma_san_pham'];
    $ten_san_pham = $_POST['ten_san_pham'];
    $gia = $_POST['gia'];
    $so_luong = $_POST['so_luong'];
    $ma_loai_san_pham = $_POST['ma_loai_san_pham'];
    include_once "../connect/open-connect.php";
    $sql = "UPDATE san_pham SET ten_san_pham = '$ten_san_pham', gia = '$gia', so_luong = '$so_luong', ma_loai_san_pham = '$ma_loai_san_pham' WHERE ma_san_pham = $ma_san_pham";
    mysqli_query($connect, $sql);
    include_once "../connect/close-connect.php";
    header("location:danh-sach.php");
?>