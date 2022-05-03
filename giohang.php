<?php
    if(isset($_SESSION['user'])){
    $sql_giohang = "SELECT DISTINCT h.TenHH,hh.TenHinh,g.SoLuong,h.Gia,g.Gia thanhtien
    FROM giohang g JOIN hanghoa h JOIN hinhhanghoa hh JOIN khachhang k 
    ON g.MSHH = h.MSHH AND h.MSHH = hh.MSHH AND g.username = k.username
    WHERE g.username = '$user' AND hh.DaiDien = 1";
    $query_giohang =  mysqli_query($mysqli,$sql_giohang);
    }   
?>

<h2>Giỏ Hàng</h2>
<div id = "table-container">
    <table class= "table table-dark">
        <tr>
            <th>Thứ tự</th>
            <th>Tên sản phẩm</th>
            <th>Hình đại diện</th>
            <th>Số Lượng</th>
            <th>Giá</th>
            <th>Thành tiền</th>
        </tr>

        <?php
        $i=0;
        while($row = mysqli_fetch_array($query_giohang)){
        ?>

        <tr>
            <td><?php echo ($i+1); ?></td>
            <td><?php echo $row['TenHH']; ?></td>
            <td><img src="../admin/img_hanghoa/<?php echo $row['TenHinh'] ?>" width="150px"></td>
            <td><?php echo $row['SoLuong']; ?></td>
            <td><?php echo number_format($row['Gia'],0,',','.'); ?> VNĐ</td>
            <td><?php echo number_format($row['thanhtien'],0,',','.'); ?> VNĐ</td>
        </tr>

        <?php
        $i++;
        }
        ?>

    </table>
</div>