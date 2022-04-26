<a href="them.php">Thêm</a>
<table border="1" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td>Mã user</td>
        <td>Username</td>
        <td>Password</td>
        <td>Tên user</td>
        <td>Ngày sinh</td>
        <td>Giới tính</td>
        <td>Địa chỉ</td>
        <td></td>
        <td></td>
    </tr>
    <?php
        //Kết nối DB
        $connect = mysqli_connect('localhost','root','','d03k12');
        mysqli_set_charset($connect,'utf8');
        //Lấy dữ liệu từ DB ra
        $sql = "SELECT * FROM user";
        $result = mysqli_query($connect,$sql);
        foreach ($result as $each){
    ?>
            <tr>
                <td><?php echo $each['ma_user'];?></td>
                <td><?php echo $each['uid'];?></td>
                <td><?php echo $each['pwd'];?></td>
                <td><?php echo $each['ten_user'];?></td>
                <td><?php echo $each['ngay_sinh'];?></td>
                <td>
                    <?php
                        if($each['gioi_tinh'] == 0){
                    ?>
                            Nữ
                    <?php
                        } else {
                    ?>
                            Nam
                    <?php
                        }
                    ?>
                </td>
                <td><?php echo $each['dia_chi'];?></td>
                <td>
                    <a href="sua.php?ma_user=<?php echo $each['ma_user'];?>">Sửa</a>
                </td>
                <td>
                    <a href="xoa.php?ma_user=<?php echo $each['ma_user'];?>">Xóa</a>
                </td>
            </tr>
    <?php
        }
        mysqli_close($connect);
    ?>
</table>