<?php
    session_start();
    if(!isset($_SESSION['ma_user'])){
        header('location:user/login.php');
    }
?>
<a href="user/danh-sach-user.php">Danh sách user</a><br>
<a href="quan-ly-loai-san-pham/danh-sach.php">Danh sách Loại sản phẩm</a><br>
<a href="quan-ly-san-pham/danh-sach.php">Danh sách sản phẩm</a><br>
<a href="user/logout.php">Logout</a>