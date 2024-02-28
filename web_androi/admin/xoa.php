<?php
include "database.php";
session_start();

$db = new database();
    if(isset($_POST['btn_xoa'])){
        
        
        $idbuoihoc = isset($_POST['idbuoihoc']) ? $_POST['idbuoihoc'] : '';
        
        


        $sel_tkb = "SELECT lh.idlophoc AS idlh, tkb.idtkb AS itkb FROM lophoc AS lh INNER JOIN  thoikhoabieu AS tkb ON lh.idlophoc = tkb.idlophoc INNER JOIN buoihoc AS bh ON tkb.idtkb = bh.idtkb WHERE idbuoihoc = '$idbuoihoc' ";
        $kq_sel = $db->thucthi($sel_tkb);
        while($row = mysqli_fetch_array($kq_sel)){
            $id_lh =  $row['idlh'];
           
            $xoa_lh = "DELETE FROM lophoc WHERE idlophoc ='$id_lh'";
            $kq_xoalh = $db->thucthi($xoa_lh);

            $id_tkb =  $row['itkb'];
            $xoa_tkb = "DELETE FROM thoikhoabieu WHERE idtkb ='$id_tkb'";
            $kq_xoatkb = $db->thucthi($xoa_tkb);
          
        }
        $xoa_bh = "DELETE FROM `buoihoc` WHERE idbuoihoc = '$idbuoihoc'";
        $kq_xoa = $db->thucthi($xoa_bh);
       

        
        header("Location: dashboard.php");
        


    }
   
    // exit;



?>