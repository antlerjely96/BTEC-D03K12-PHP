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
<div style="width: 100%; height: 200px">
    <?php
        include_once "../connect/open-connect.php";
        $so_ban_ghi_1_trang = 10;
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
        $dem = 0;
        foreach($result as $each){
    ?>
        <div style="float: left; width: 20%">
            <p>
                <?php echo $each['ma_san_pham']?>
            </p>
            <p>
                <a href="chi-tiet-san-pham.php?ma_san_pham=<?php echo $each['ma_san_pham'];?>">
                    <?php echo $each['ten_san_pham']?>
                </a>
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
        </div>
    <?php
            $dem++;
            if($dem % 4 == 0){
                echo ("</div><div style='width: 100%; height: 200px'>");
            }
        }
        include "../connect/close-connect.php";
    ?>
</div>
<?php
    for($i = 1; $i <= $so_trang; $i++){
?>
    <a href="?p=<?php echo $i;?>&search=<?php echo $search;?>">
        <?php echo $i;?>
    </a>
<?php
    }
?>