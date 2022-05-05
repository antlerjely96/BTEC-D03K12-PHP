<?php
    $ten_loai_san_pham = $_POST['ten_loai_san_pham'];
    include_once "../connect/open-connect.php";
    $sql = "INSERT INTO loai_san_pham(ten_loai_san_pham) VALUES ('$ten_loai_san_pham')";
    mysqli_query($connect, $sql);
    include_once "../connect/close-connect.php";
    header("location:danh-sach.php");
?>