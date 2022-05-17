<?php
    session_start();
?>
<table border="1" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td>ID hóa đơn</td>
        <td>Tên sản phẩm</td>
        <td>Giá</td>
        <td>Số lượng</td>
        <td>Thành tiền</td>
    </tr>
    <?php
        include_once "../connect/open-connect.php";
        $tong_tien = 0;
        $id_hoa_don = $_GET['id_hoa_don'];
        $id_user = $_SESSION['ma_user'];
        $sql = "SELECT hoa_don_chi_tiet.id_hoa_don, san_pham.ten_san_pham, hoa_don_chi_tiet.gia, hoa_don_chi_tiet.so_luong, (hoa_don_chi_tiet.gia * hoa_don_chi_tiet.so_luong) AS thanh_tien 
                FROM hoa_don 
                INNER JOIN hoa_don_chi_tiet ON hoa_don.id_hoa_don = hoa_don_chi_tiet.id_hoa_don
                INNER JOIN san_pham ON hoa_don_chi_tiet.id_san_pham = san_pham.ma_san_pham
                WHERE hoa_don_chi_tiet.id_hoa_don = '$id_hoa_don' AND hoa_don.id_user = '$id_user'";
        $result = mysqli_query($connect, $sql);
        foreach ($result as $each){
            $tong_tien += $each['thanh_tien'];
    ?>
            <tr>
                <td>
                    <?php
                        echo $each['id_hoa_don'];
                    ?>
                </td>
                <td>
                    <?php
                        echo $each['ten_san_pham'];
                    ?>
                </td>
                <td>
                    <?php
                        echo $each['gia'];
                    ?>
                </td>
                <td>
                    <?php
                        echo $each['so_luong'];
                    ?>
                </td>
                <td>
                    <?php
                        echo $each['thanh_tien'];
                    ?>
                </td>
            </tr>
    <?php
        }
        include_once "../connect/close-connect.php";
    ?>
    <tr>
        <td colspan="5">Tổng tiền: <?php echo $tong_tien;?></td>
    </tr>
</table>