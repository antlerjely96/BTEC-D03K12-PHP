<a href="them.php">Thêm</a>
<table border="1" cellspacing="0" cellpadding="0" width="100%">
    <tr>
        <td>Mã loại sản phẩm</td>
        <td>Tên loại sản phẩm</td>
        <td></td>
        <td></td>
    </tr>
    <?php 
        include_once "../connect/open-connect.php";
        $sql = "SELECT * FROM loai_san_pham";
        $result = mysqli_query($connect, $sql);
        foreach($result as $each){
    ?>
    <tr>
        <td>
            <?php echo $each['ma_loai_san_pham']?>
        </td>
        <td>
            <?php echo $each['ten_loai_san_pham']?>
        </td>
        <td>
            <a href="sua.php?ma_loai_san_pham=<?php echo $each['ma_loai_san_pham'];?>">Sửa</a>
        </td>
        <td>
            <a href="xoa.php?ma_loai_san_pham=<?php echo $each['ma_loai_san_pham'];?>">Xóa</a>
        </td>
    </tr>
    <?php
        }
        include_once "../connect/close-connect.php";
    ?>
</table>