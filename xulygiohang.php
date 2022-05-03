
<?php 
    session_start();
    include('../../../admin/config/config.php');
    if(isset($_SESSION['user'])){
        $user=$_SESSION['user'];
        $mshh = $_GET['mshh'];
        


        //tim gia sp
        $sql_sp = "SELECT * FROM hanghoa WHERE MSHH = '$mshh'";
        $query_sp = mysqli_query($mysqli,$sql_sp);
        $row_sp = mysqli_fetch_array($query_sp);
        
        $soluongkho = $row_sp['SoLuongHang'];

        //xem sp da co trong gio hang chua
        $sql_kiemtracart = "SELECT * FROM giohang WHERE username = '$user' AND MSHH = '$mshh' ";
        $query_ktcart = mysqli_query($mysqli,$sql_kiemtracart);
        $row_ktcart = mysqli_fetch_array($query_ktcart);
        if(!$row_ktcart){
            //them vao gio hang
            $soluong = 1;
            $gia = $row_sp['Gia'] * $soluong;
            $sql_them = "INSERT INTO giohang (username, MSHH, SoLuong, Gia)
                        VALUES ('".$user."','".$mshh."','".$soluong."','".$gia."')";
            mysqli_query($mysqli,$sql_them);
            
            //tru so luong trong hang hoa
            $sql_trusl = "UPDATE `hanghoa` 
                        SET `SoLuongHang` = '".($soluongkho-1)."' WHERE `hanghoa`.`MSHH` = '$mshh'";
            mysqli_query($mysqli,$sql_trusl); 
            echo "<script>
            alert('Thêm vào giỏ hàng thành công!');
            </script>";
            header("location:../../index.php?quanly=sanpham&id=".$mshh);
        }else{
            //them 1 vao so luong da co roi update lai gio hang
            $soluong = $row_ktcart['SoLuong'] + 1;
            $gia = $row_sp['Gia'] * $soluong;
            $sql_them = "UPDATE `giohang` SET `SoLuong` = '$soluong' ,`Gia` = '$gia'
                        WHERE `giohang`.`username` = '$user' AND `giohang`.`MSHH` = '$mshh'";
            mysqli_query($mysqli,$sql_them);

            //tru so luong trong hang hoa
            $sql_trusl = "UPDATE `hanghoa` 
                        SET `SoLuongHang` = '".($soluongkho-1)."' WHERE `hanghoa`.`MSHH` = '$mshh'";
            mysqli_query($mysqli,$sql_trusl);
            echo "<script>
            alert('Thêm vào giỏ hàng thành công!');
            </script>";
            header("location:../../index.php?quanly=sanpham&id=".$mshh);

        }
        

    }else {
        echo '<script type= "text/javascript">
            alert("Bạn cần đăng nhập để sử dụng chức năng này!");
            window.location.href = "../../account/login.html";
            </script>';
            
    }
?>
