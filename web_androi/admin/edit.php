<?php
include "database.php";

$db = new database();
if(isset($_POST['edit_form'])){
    $idlh = isset($_POST['idbh_edit']) ? $_POST['idbh_edit'] : '';
    $tenlop = isset($_POST['tl_edit']) ? $_POST['tl_edit'] : '';
    $tenmon = isset($_POST['tm_edit']) ? $_POST['tm_edit'] : '';
    $tenphong = isset($_POST['sophong_edit']) ? $_POST['sophong_edit'] : '';
    $giaovien = isset($_POST['htgv_edit']) ? $_POST['htgv_edit'] : '';
    $tbd = isset($_POST['tbd_edit']) ? $_POST['tbd_edit'] : '';
    $tkt = isset($_POST['tkt_edit']) ? $_POST['tkt_edit'] : '';
    $time = isset($_POST['time_edit']) ? $_POST['time_edit'] : '';


    if($tbd > $tkt){
        echo"<script>alert('Tiết bắt đầu không được lớn hơn tiết kết thúc? Nhập lại !')</script>";
        echo"<script>window.location.href ='dashboard.php';</script>";
    }else{
    // }else{

    //     $kiemtra_tiet = "SELECT COUNT(*) FROM buoihoc WHERE (tietbatdau <= $tbd AND tietketthuc >= $tbd
    //     OR tietbatdau <= $tkt AND tietketthuc >=  $tkt) OR  (tietbatdau >= $tbd AND tietbatdau <= $tkt
    //     OR tietketthuc >= $tbd AND tietketthuc <=  $tkt) AND sophong = '$tenphong' AND  ngay = '$time'";

    //     $kq_kiemtratiet = $db->thucthi($kiemtra_tiet);
    //     while($row_kiemtra = mysqli_fetch_array($kq_kiemtratiet)){
    //         $ttTiet = $row_kiemtra['COUNT(*)']; 
    //     }

    //     if($ttTiet > 0){
    //     echo"<script>alert('Đã có lớp học trong tiết, phòng, ngày bạn nhập? Nhập lại !')</script>";
    //     echo"<script>window.location.href ='dashboard.php';</script>";
    //     }else{

            $se_tenlop = "SELECT idlop FROM lop WHERE tenlop = '$tenlop'";
            $kq_tenlop = $db->thucthi($se_tenlop);
        
            $se_giaovien = "SELECT idgiaovien FROM giaovien WHERE hoten = '$giaovien'";
            $kq_giaovien = $db->thucthi($se_giaovien);
        
            $tenmon1 = "SELECT idmonhoc FROM monhoc WHERE tenmon = '$tenmon'";
            $kq_tenmon = $db->thucthi($tenmon1);
        
            while($row_tenlop = mysqli_fetch_array($kq_tenlop)){
                $lh = $row_tenlop['idlop'];
            }
            while($row_tenmon = mysqli_fetch_array($kq_tenmon)){
                $tm = $row_tenmon['idmonhoc'];
        
            }
            while($row_giaovien = mysqli_fetch_array($kq_giaovien)){
                $gv = $row_giaovien['idgiaovien'];
        
            }
           
            $tenlop1 = $tenlop.'-'.$tenmon;
        
            $sql = "UPDATE lophoc SET idlop = '$lh',idmonhoc = '$tm', idgiaovien ='$gv',tenlophoc='$tenlop1' WHERE idlophoc = '$idlh'";
            $kq_sql = $db->thucthi($sql);
        
            $up_tkb = "UPDATE thoikhoabieu SET sophong = '$tenphong' , tietbatdau = '$tbd', tietketthuc = '$tkt' WHERE idlophoc = '$idlh'";
            $kq_uptkb = $db->thucthi($up_tkb);
        
            $se_tkb = "SELECT idtkb FROM thoikhoabieu WHERE idlophoc = '$idlh'";
            $kq_setkb = $db->thucthi($se_tkb);
            while($row_tkb = mysqli_fetch_array($kq_setkb)){
                $idtkb = $row_tkb['idtkb'];
            }
            $up_buoihoc = "UPDATE buoihoc SET sophong = '$tenphong' , tietbatdau = '$tbd', tietketthuc = '$tkt' WHERE idtkb = '$idtkb'";
            $kq_upbh = $db->thucthi($up_buoihoc);
        
            if($kq_sql && $kq_uptkb && $kq_upbh){
                echo"<script>alert('Sửa thông tin thành công !')</script>";
                echo"<script>window.location.href ='dashboard.php';</script>";
            }
    //     }
     }

    

   
}


?>