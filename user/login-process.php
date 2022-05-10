<?php
    session_start();
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    include_once "../connect/open-connect.php";
    $sql = "SELECT *, COUNT(ma_user) AS so_uid FROM user WHERE uid = '$uid' AND pwd = '$pwd'";
    $result = mysqli_query($connect, $sql);
    foreach ($result as $each){
        if($each['so_uid'] == 0){
            header('location:login.php');
        }
        else {
            $_SESSION['ma_user'] = $each['ma_user'];
            header('location:../index.php');
        }
    }
?>