<?php
    session_start();
    $ma_san_pham = $_GET['ma_san_pham'];
    if(isset($_SESSION['gio_hang'])){
        if(isset($_SESSION['gio_hang'][$ma_san_pham])){
            $_SESSION['gio_hang'][$ma_san_pham]++;
        }
        else {
            $_SESSION['gio_hang'][$ma_san_pham] = 1;
        }
    }
    else {
        $_SESSION['gio_hang'] = array();
        $_SESSION['gio_hang'][$ma_san_pham] = 1;
    }
    header('location:gio-hang.php');
?>