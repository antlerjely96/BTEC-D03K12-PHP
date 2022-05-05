<?php
    $ma_loai_san_pham = $_POST['ma_loai_san_pham'];
    $ten_loai_san_pham = $_POST['ten_loai_san_pham'];
    include_once "../connect/open-connect.php";
    $sql = "UPDATE loai_san_pham SET ten_loai_san_pham = '$ten_loai_san_pham' WHERE ma_loai_san_pham = $ma_loai_san_pham";
    mysqli_query($connect, $sql);
    include_once "../connect/close-connect.php";
    header("location:danh-sach.php");
?>