<form action="sua-xu-ly.php" method="post">
    <?php
        $ma_loai_san_pham = $_GET['ma_loai_san_pham'];
        include_once "../connect/open-connect.php";
        $sql = "SELECT * FROM loai_san_pham WHERE ma_loai_san_pham = $ma_loai_san_pham";
        $result = mysqli_query($connect, $sql);
        foreach($result as $each){
    ?>
    <input type="hidden" name="ma_loai_san_pham" value="<?php echo $each['ma_loai_san_pham'];?>">
    Tên loại sản phẩm: <input type="text" name="ten_loai_san_pham" value="<?php echo $each['ten_loai_san_pham'];?>"><br>
    <?php
        }
        include_once "../connect/close-connect.php";
    ?>
    <button>Sửa</button>
</form>