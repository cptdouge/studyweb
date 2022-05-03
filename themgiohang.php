<?php 
include("../../admin/config/config.php");
session_start();
if(isset($_SESSION['user'])){
    $user=$_SESSION['user'];
    $mshh = $_GET['mshh'];
    $soluong = 1;
    $sql = "SELECT * FROM hanghoa h JOIN hinhhanghoa hh
            ON h.MSHH = hh.MSHH
            WHERE h.MSHH = ".$mshh." AND hh.DaiDien = 1";
    $query = mysqli_query($mysqli,$sql);
    $row = mysqli_fetch_array($query);
    if($row){
        $new_sp[] = array('mshh' => $mshh,'tensp' => $row['TenHH'],'hinhanh' => $row['TenHinh'],'giasp' => $row['Gia'],'soluong' => 1);
        //kiem tra session cart da ton tai
        if(isset($_SESSION['cart'])){
            
        }else{
            $_SESSION['cart'] = $new_sp;
        }
    }



}else{
    echo "<script>
    alert('Bạn cần đăng nhập để thực hiện chức năng này!')
    location.href = '../account/login.html';
    </script>";
    
}
?>