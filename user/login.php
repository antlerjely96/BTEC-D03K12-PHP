<?php
    session_start();
    if(isset($_SESSION['ma_user'])){
        header('location:../index.php');
    }
?>
<form method="post" action="login-process.php">
    uid: <input type="email" name="uid"><br>
    pwd: <input type="password" name="pwd"><br>
    <button>Login</button>
</form>