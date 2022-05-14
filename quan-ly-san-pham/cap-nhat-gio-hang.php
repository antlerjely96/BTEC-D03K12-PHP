<?php
    session_start();
    $gio_hang = $_POST['gio_hang'];
    foreach ($gio_hang as $ma_san_pham => $so_luong){
        $_SESSION['gio_hang'][$ma_san_pham] = $so_luong;
    }
    header('location:gio-hang.php');
?>