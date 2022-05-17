<?php
    session_start();
?>
<table border="1" cellspacing="0" cellpadding="0" width="100%">
    <tr>
        <td>ID hóa đơn</td>
        <td>Ngày đặt hàng</td>
        <td>Tình trạng</td>
        <td></td>
    </tr>
    <?php
        include_once "../connect/open-connect.php";
        $id_user = $_SESSION['ma_user'];
        $sql = "SELECT * FROM hoa_don WHERE id_user = '$id_user'";
        $result = mysqli_query($connect, $sql);
        foreach ($result as $each){
    ?>
        <tr>
            <td>
                <?php
                    echo $each['id_hoa_don'];
                ?>
            </td>
            <td>
                <?php
                    echo $each['ngay_dat_hang'];
                ?>
            </td>
            <td>
                <?php
                     if($each['tinh_trang'] == 0){
                         echo "Chưa duyệt";
                     }
                     elseif ($each['tinh_trang'] == 1){
                         echo "Đã duyệt, đang vận chuyển";
                     }
                     elseif ($each['tinh_trang'] == 2){
                         echo "Đã xong";
                     }
                     elseif ($each['tinh_trang'] == 3){
                         echo "Hủy";
                     }
                ?>
            </td>
            <td>
                <a href="chi-tiet-hoa-don.php?id_hoa_don=<?php echo $each['id_hoa_don'];?>">
                    Chi tiết hóa đơn
                </a>
            </td>
        </tr>
    <?php
        }
        include_once "../connect/close-connect.php";
    ?>
</table>
<?php