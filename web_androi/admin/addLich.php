<?php

use function PHPSTORM_META\type;

include "database.php";
$db = new database();
        $kyhoc =    isset($_POST['kyhoc']) ? $_POST['kyhoc'] : '';
        $bomon =    isset($_POST['bomon']) ? $_POST['bomon'] : '';
        $khoa =    isset($_POST['khoa']) ? $_POST['khoa'] : '';
        $giaovien =    isset($_POST['giaovien']) ? $_POST['giaovien'] : '';
        $phong =    isset($_POST['sophong']) ? $_POST['sophong'] : '';
        $lop =    isset($_POST['tenlop']) ? $_POST['tenlop'] : '';
        $mon =    isset($_POST['monhoc']) ? $_POST['monhoc'] : '';
        $ngay =    isset($_POST['ngay']) ? $_POST['ngay'] : '';
        $thang =    isset($_POST['thang']) ? $_POST['thang'] : '';
        $nam =    isset($_POST['nam']) ? $_POST['nam'] : '';
        $tbd =    isset($_POST['tietbd']) ? $_POST['tietbd'] : '';
        $tietkt =    isset($_POST['tietkt']) ? $_POST['tietkt'] : '';
        if($giaovien == "" || $mon == "" || $lop ==""){
            echo"<script>alert('Nhập đầy đủ dữ liệu? Nhập lại !')</script>";
            echo"<script>window.location.href ='dashboard.php';</script>";
        }
        else{

            if($tbd > $tietkt){
                echo"<script>alert('Tiết bắt đầu không được lớn hơn tiết kết thúc? Nhập lại !')</script>";
                echo"<script>window.location.href ='dashboard.php';</script>";
               
            }
            else if(($tbd >= 1 && $tbd <= 5) && $tietkt > 5 || ($tbd >= 6 && $tbd <= 10) && $tietkt > 10 ){
                echo"<script>alert('Tiết học bị nhập sai? Nhập lại !')</script>";
                echo"<script>window.location.href ='dashboard.php';</script>";
            
            }else{
                $time = $nam.'-'.$thang.'-'.$ngay;
                $kiemtra_tiet = "SELECT COUNT(*) FROM buoihoc WHERE ((tietbatdau <= $tbd AND tietketthuc >= $tbd
                OR tietbatdau <= $tietkt AND tietketthuc >=  $tietkt) OR  (tietbatdau >= $tbd AND tietbatdau <= $tietkt
                OR tietketthuc >= $tbd AND tietketthuc <=  $tietkt)) AND sophong = '$phong' AND  ngay = '$time'";
    
                $kq_kiemtratiet = $db->thucthi($kiemtra_tiet);
                while($row_kiemtra = mysqli_fetch_array($kq_kiemtratiet)){
                    $ttTiet = $row_kiemtra['COUNT(*)']; 
                }
    
                if($ttTiet > 0){
                echo"<script>alert('Đã có lớp học trong tiết, phòng, ngày bạn nhập? Nhập lại !')</script>";
                echo"<script>window.location.href ='dashboard.php';</script>";
                
                }else{
    
                    $dayOfWeek = date('N', strtotime($time)) + 1;
            
                    
                    $tenlop = "SELECT tenlop FROM lop WHERE idlop = '$lop'";
                    $kq_tenlop = $db->thucthi($tenlop);
            
                    $tenmon = "SELECT tenmon FROM monhoc WHERE idmonhoc = '$mon'";
                    $kq_tenmon = $db->thucthi($tenmon);
                    while($row_tenlop = mysqli_fetch_array($kq_tenlop)){
                        $lh = $row_tenlop['tenlop'];
                        while($row_tenmon = mysqli_fetch_array($kq_tenmon)){
                            $tm = $row_tenmon['tenmon'];
            
                        }
                    }
                    
                    $tenlop = $lh.'-'.$tm;
                    $them_lophoc = "INSERT INTO `lophoc`( `idkhoa`, `idlop`, `idmonhoc`, `tenlophoc`, `idgiaovien`,`ngaybatdau`, `idkyhoc`) VALUES ('$khoa','$lop','$mon','$tenlop','$giaovien','$time','$kyhoc')";
                    $data = $db->thucthi($them_lophoc);
            
                    $select_id = "SELECT MAX(idlophoc) FROM lophoc ";
                    $kq = $db->thucthi($select_id);
                    while($row = mysqli_fetch_array($kq)){
                        $id_lop = $row['MAX(idlophoc)'];
                        $them_tkb ="INSERT INTO `thoikhoabieu`( `thu`, `idlophoc`, `sophong`, `tietbatdau`, `tietketthuc`, `idkyhoc`) VALUES ('$dayOfWeek','$id_lop','$phong','$tbd','$tietkt','$kyhoc')";
                        $kq_themtkb = $db->thucthi($them_tkb);
                    
                    }
                    $select_lastId ="SELECT MAX(idtkb) FROM thoikhoabieu";
                    $kq_lastId = $db->thucthi($select_lastId);
                    while($rowId = mysqli_fetch_array($kq_lastId)){
                        $last_id = $rowId['MAX(idtkb)'];
                      
                       
                       $them_buoihoc = "INSERT INTO `buoihoc`(`idtkb`, `sophong`, `tietbatdau`, `tietketthuc`, `ngay`, `trangthai`) VALUES ('$last_id','$phong','$tbd','$tietkt','$time',1)";
                        $kq_thembh = $db->thucthi($them_buoihoc);
                    }
                 
                    $select_tiet = "SELECT MAX(tietbatdau) , MIN(tietketthuc) FROM buoihoc WHERE sophong = '$phong' and ngay = '$time'";
                    $kq_sltiet = $db->thucthi($select_tiet);
                    while($row_tiet = mysqli_fetch_array($kq_sltiet)){
                        if(intval($row_tiet['MAX(tietbatdau)']) == 1 && intval($row_tiet['MAX(tietketthuc)']) == 15 ){
                            $update_tt = "UPDATE buoihoc SET trangthai = 1 WHERE sophong = '$phong'";
                            $kq_update = $db->thucthi($update_tt);
                        }
                        }
                    echo"<script>alert('Thêm lịch học thành công')</script>";
                    echo"<script>window.location.href ='dashboard.php';</script>";
                }
            }
        }
           
   
 
    
      
       
           
        



?>