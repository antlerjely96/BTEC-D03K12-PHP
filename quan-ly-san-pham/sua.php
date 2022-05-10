<form method="post" action="sua-xu-ly.php">
    <?php
        $ma_san_pham = $_GET['ma_san_pham'];
        include_once "../connect/open-connect.php";
        $sql = "SELECT san_pham.*, loai_san_pham.ten_loai_san_pham 
                FROM san_pham INNER JOIN loai_san_pham
                ON san_pham.ma_loai_san_pham = loai_san_pham.ma_loai_san_pham
                WHERE ma_san_pham = $ma_san_pham";
        $result = mysqli_query($connect, $sql);
        foreach ($result as $each){
    ?>
        <input type="hidden" name="ma_san_pham" value="<?php echo $each['ma_san_pham']?>">
        Tên sản phẩm: <input type="text" name="ten_san_pham" value="<?php echo $each['ten_san_pham']?>"><br>
        Giá: <input type="text" name="gia" value="<?php echo $each['gia']?>"><br>
        Số lượng: <input type="number" name="so_luong" value="<?php echo $each['so_luong']?>"><br>
        Loại sản phẩm: <select name="ma_loai_san_pham">
            <option value>- Chọn -</option>
            <?php
            include_once "../connect/open-connect.php";
            $sql = "SELECT * FROM loai_san_pham";
            $result = mysqli_query($connect, $sql);
            foreach($result as $each_loai_san_pham){
                ?>
                <option value="<?php echo $each_loai_san_pham['ma_loai_san_pham']?>"
                    <?php
                        if($each['ma_loai_san_pham'] == $each_loai_san_pham['ma_loai_san_pham']){
                    ?>
                            selected
                    <?php
                        }
                    ?>
                >
                    <?php
                        echo $each_loai_san_pham['ten_loai_san_pham'];
                    ?>
                </option>
                <?php
            }
            include_once "../connect/close-connect.php";
            ?>
        </select><br>
    <?php
        }
    ?>

    <button>Sửa</button>
</form>