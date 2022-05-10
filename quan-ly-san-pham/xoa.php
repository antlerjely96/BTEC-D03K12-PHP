<?php
    $ma_san_pham = $_GET['ma_san_pham'];
    include_once "../connect/open-connect.php";
    $sql = "DELETE FROM san_pham WHERE ma_san_pham = $ma_san_pham";
    mysqli_query($connect, $sql);
    include_once "../connect/close-connect.php";
    header("location:danh-sach.php");
    ?>