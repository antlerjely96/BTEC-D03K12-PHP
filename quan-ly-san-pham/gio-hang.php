<?php
    session_start();
?>
<form method="post" action="cap-nhat-gio-hang.php">
    <table border="1" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td>Mã sản phẩm</td>
            <td>Tên sản phẩm</td>
            <td>Giá</td>
            <td>Số lượng</td>
            <td>Thành tiền</td>
            <td></td>
        </tr>
        <?php
            include_once "../connect/open-connect.php";
            $tong_tien = 0;
            if(isset($_SESSION['gio_hang'])){
                $gio_hang = $_SESSION['gio_hang'];
                foreach ($gio_hang as $ma_san_pham => $so_luong){
                    $sql = "SELECT * FROM san_pham WHERE ma_san_pham = $ma_san_pham";
                    $san_pham = mysqli_query($connect, $sql);
                    foreach ($san_pham as $each){
        ?>
            <tr>
                <td>
                    <?php
                        echo $ma_san_pham;
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
                    <input type="number" value="<?php echo $so_luong;?>" name="gio_hang[<?php echo $ma_san_pham?>]">
                </td>
                <td>
                    <?php
                        $thanh_tien = $each['gia'] * $so_luong;
                        $tong_tien += $thanh_tien;
                        echo $thanh_tien;
                    ?>
                </td>
                <td>
                    <a href="xoa-gio-hang.php?ma_san_pham=<?php echo $ma_san_pham;?>">
                        Xóa
                    </a>
                </td>
            </tr>
        <?php
                    }
                }
            }
        ?>
        <tr>
            <td colspan="6">
                Tổng tiền: <?php echo $tong_tien;?>
            </td>
        </tr>
        <tr>
            <td colspan="6">
                <button>Cập nhật giỏ hàng</button>
            </td>
        </tr>
        <tr>
            <td colspan="6">
                <a href="danh-sach-sp-khach-hang.php">
                    Quay lại mua tiếp
                </a>
            </td>
        </tr>
        <tr>
            <td colspan="6">
                <a href="dat-hang.php">
                    Đặt hàng
                </a>
            </td>
        </tr>
    </table>
</form>