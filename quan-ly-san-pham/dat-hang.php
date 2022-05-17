<?php
    session_start();
    $id_user = $_SESSION['ma_user'];
    $ngay_dat_hang = date('Y-m-d');
    $tinh_trang = 0;
    include_once "../connect/open-connect.php";
    $sql = "INSERT INTO hoa_don(id_user, ngay_dat_hang, tinh_trang) VALUES ('$id_user', '$ngay_dat_hang', '$tinh_trang')";
    mysqli_query($connect, $sql);
    $sql_id_hoa_don = "SELECT MAX(id_hoa_don) as id_hoa_don_max FROM hoa_don WHERE id_user = '$id_user'";
    $result_id_hoa_don = mysqli_query($connect, $sql_id_hoa_don);
    foreach ($result_id_hoa_don as $each_id_hoa_don){
        $id_hoa_don = $each_id_hoa_don['id_hoa_don_max'];
    }
    $gio_hang = $_SESSION['gio_hang'];
    foreach ($gio_hang as $id_san_pham => $so_luong){
        $sql_gia = "SELECT gia FROM san_pham WHERE ma_san_pham = '$id_san_pham'";
        $result_gia = mysqli_query($connect, $sql_gia);
        foreach ($result_gia as $each_gia){
            $gia = $each_gia['gia'];
        }
        $sql_insert_hdct = "INSERT INTO hoa_don_chi_tiet VALUES ('$id_hoa_don', '$id_san_pham', '$gia', '$so_luong')";
        mysqli_query($connect, $sql_insert_hdct);
    }
    unset($_SESSION['gio_hang']);
    include_once "../connect/close-connect.php";
    header('location:lich-su-hoa-don.php');
?>