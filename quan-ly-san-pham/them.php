<form method="post" action="them-xu-ly.php">
    Tên sản phẩm: <input type="text" name="ten_san_pham"><br>
    Giá: <input type="text" name="gia"><br>
    Số lượng: <input type="number" name="so_luong"><br>
    Loại sản phẩm: <select name="ma_loai_san_pham">
        <option value>- Chọn -</option>
    <?php 
        include_once "../connect/open-connect.php";
        $sql = "SELECT * FROM loai_san_pham";
        $result = mysqli_query($connect, $sql);
        foreach($result as $each){
    ?>
        <option value="<?php echo $each['ma_loai_san_pham']?>">
            <?php 
                echo $each['ten_loai_san_pham'];
            ?>
        </option> 
    <?php
        }
        include_once "../connect/close-connect.php";
    ?>
    </select><br>        
    <button>Thêm</button>
</form>