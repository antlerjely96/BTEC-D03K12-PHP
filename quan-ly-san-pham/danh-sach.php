<a href="them.php">Thêm</a>
<form method="get" action="">
    <?php
        $search = "";
        if(isset($_GET['search'])){
            $search = $_GET['search'];
        }
    ?>
    Search: <input type="text" name="search" value="<?php echo $search;?>"
    ><br>
    <button>Search</button>
</form>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr>
        <td>Mã sản phẩm</td>
        <td>Tên sản phẩm</td>
        <td>Giá</td>
        <td>Số lượng</td>
        <td>Loại sản phẩm</td>
        <td></td>
        <td></td>
    </tr>
    <?php
        include_once "../connect/open-connect.php";
        $so_ban_ghi_1_trang = 3;
        if(isset($_GET['p'])){
            $p = $_GET['p'];
        }
        else {
            $p = 1;
        }
        $start = ($p - 1) * $so_ban_ghi_1_trang;
        $sql_tong_ban_ghi = "SELECT COUNT(ma_san_pham)
                AS tong_so_ban_ghi
                FROM san_pham INNER JOIN loai_san_pham
                ON san_pham.ma_loai_san_pham = loai_san_pham.ma_loai_san_pham
                WHERE san_pham.ten_san_pham LIKE '%$search%'";
        $result_tong_ban_ghi = mysqli_query($connect, $sql_tong_ban_ghi);
        foreach ($result_tong_ban_ghi as $each_tong_ban_ghi){
            $tong_so_ban_ghi = $each_tong_ban_ghi['tong_so_ban_ghi'];
        }
        $so_trang = ceil($tong_so_ban_ghi/$so_ban_ghi_1_trang);
        $sql = "SELECT san_pham.*, loai_san_pham.ten_loai_san_pham 
                FROM san_pham INNER JOIN loai_san_pham
                ON san_pham.ma_loai_san_pham = loai_san_pham.ma_loai_san_pham
                WHERE san_pham.ten_san_pham LIKE '%$search%'
                ORDER BY san_pham.ma_san_pham DESC 
                LIMIT $start, $so_ban_ghi_1_trang";
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
            <td>
                <a href="sua.php?ma_san_pham=<?php echo $each['ma_san_pham']?>">Sửa</a>
            </td>
            <td>
                <a href="xoa.php?ma_san_pham=<?php echo $each['ma_san_pham']?>">Xóa</a>
            </td>
        </tr>
    <?php
        }
        include_once "../connect/close-connect.php";
    ?>
</table>
<?php
    for($i = 1; $i <= $so_trang; $i++){
?>
    <a href="?p=<?php echo $i;?>&search=<?php echo $search;?>">
        <?php echo $i;?>
    </a>
<?php
    }
?>