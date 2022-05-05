<a href="them.php">Thêm</a>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr>
        <td>Mã sản phẩm</td>
        <td>Tên sản phẩm</td>
        <td>Giá</td>
        <td>Số lượng</td>
        <td>Loại sản phẩm</td>
    </tr>
    <?php 
        include_once "../connect/open-connect.php";
        $sql = "SELECT san_pham.*, loai_san_pham.ten_loai_san_pham 
                FROM san_pham INNER JOIN loai_san_pham
                ON san_pham.ma_loai_san_pham = loai_san_pham.ma_loai_san_pham";
        $result = mysqli_query($connect, $sql);
        foreach($result as $each){
    ?>
        <tr>
            <td>
                <?php echo $each['ma_san_pham']?>
            </td>
            <td>
                <?php echo $each['ten_san_pham']?>
            </td>
            <td>
                <?php echo $each['gia']?>
            </td>
            <td>
                <?php echo $each['so_luong']?>
            </td>
            <td>
                <?php echo $each['ten_loai_san_pham']?>
            </td>
        </tr>
    <?php
        }
        include_once "../connect/close-connect.php";
    ?>
</table>