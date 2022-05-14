<?php
    $ma_san_pham = $_GET['ma_san_pham'];
    include_once "../connect/open-connect.php";
    $sql = "SELECT san_pham.*, loai_san_pham.ten_loai_san_pham 
                    FROM san_pham INNER JOIN loai_san_pham
                    ON san_pham.ma_loai_san_pham = loai_san_pham.ma_loai_san_pham
                    WHERE ma_san_pham = $ma_san_pham";
    $result = mysqli_query($connect, $sql);
    foreach ($result as $each) {
?>
        <div>
            <p>
                <?php echo $each['ma_san_pham']?>
            </p>
            <p>
                <?php echo $each['ten_san_pham']?>
            </p>
            <p>
                <?php echo $each['gia']?>
            </p>
            <p>
                <?php echo $each['so_luong']?>
            </p>
            <p>
                <?php echo $each['ten_loai_san_pham']?>
            </p>
            <p>
                <a href="them-vao-gio-hang.php?ma_san_pham=<?php echo $each['ma_san_pham']?>">Thêm vào giỏ hàng</a>
            </p>
        </div>
<?php
    }
?>
