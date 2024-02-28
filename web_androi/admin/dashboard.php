
<?php 
 date_default_timezone_set('Asia/Ho_Chi_Minh');
 if(!isset($_SESSION)){
  session_start();

 }

 if(!isset($_SESSION["user"])){
  header("location:logoutKh.php");

 }
if(!isset($_SESSION['s'])){
 
  session_regenerate_id();
   $_SESSION['s'] = true ;
  

 }
 if(!isset($_SESSION['v'])){
 
  session_regenerate_id();
   $_SESSION['v'] = true ;
  

 }

if(isset($_SESSION["s"])){
  $plus_day = $_SESSION['s'] ;
  
}

if(!isset($_SESSION['date'])){
 
  session_regenerate_id();
   $_SESSION['date'] = true ;
  

 }
 if(!isset($_SESSION['date1'])){
 
  session_regenerate_id();
   $_SESSION['date1'] = true ;
  

 }
if(isset($_SESSION["date1"])){
 
  $dateSearch = $_SESSION['date1'] ;
}

?>
<?php include_once('header.php') ;
include "database.php";
global $db;
$db = new database();

$sql = "SELECT  sophong FROM phong ";
$kq = $db->thucthi($sql);

global $sss;
if(isset($_GET['ten'])){
  $sss = $_GET['ten'];
}


?>


 <style>
              .tr__form {
                    display: flex;
                  
                    justify-content: space-evenly;
                    list-style: none;
                    margin: 10px 0 0;
                    padding: 7px 10px;
                    border: 1px solid #ccc;
                }

                .td__form {
                    display: flex;
                    
                    justify-content: space-between;
                    list-style: none;
                    
                }

                

                .td__select {
                    width: 65%;
                    margin-left: 5px;
                }
                .btn__add{
                  width: 20%;
                  min-width: 30%;
                  margin: 15px auto;
                  background-color: coral;
                  border: none;
                  padding: 5px 0; 
                  color: white;
                  font-size: 1rem;
                  border-radius: 4px;
                  
                }
                .btn__add:hover{
                  cursor: pointer;
                  filter: brightness(140%);

                }
                .tkb__text{
                 
                  margin: -5px auto;
                  font-size: 1.8rem;
                  font-weight: 400;
                  
                }
                .nav-link:focus ~ .nav_ul {
                    display: block;
                    transform: none;
                }
            </style>
               <div class="collapse navbar-collapse justify-content-end" id="navigation">
                         <!-- <form>
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="now-ui-icons ui-1_zoom-bold"></i>
                                    </div>
                                </div>
                            </div>
                        </form>  -->
                        <!-- <ul class="navbar-nav"> -->
                             <!-- <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <i class="now-ui-icons media-2_sound-wave"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Stats</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="now-ui-icons location_world"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Some Actions</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>  -->
                             <!-- <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <i class="now-ui-icons users_single-02"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block"></span>
                                    </p>
                                </a>
                                <div class="nav_ul">
                                  <div class="nav_li">
                                      <a href="test.php">Log out <i class="fa fa-right-from-bracket"></i></a>
                                  </div>
                                  <div class="nav_li">
                                      <a href="">Sign in</a>
                                  </div> 
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>  -->
               
                </nav>
                
      <!-- End Navbar -->
      <div class="panel-header panel-header-lg">
         <!-- <canvas id="bigDashboardChart"></canvas>  -->
      </div>
      <div class="content ">
      <?php

if(isset($_POST['btn_search'])){

    $seacrh = isset($_POST['date_search']) ? $_POST['date_search'] : '';
    $_SESSION['date'] = $seacrh;
}
?>
<div class="form__watch">
  <form action="" method="post" class="form__date ">
    <input type="date" name ="date_search" value="<?php echo $_SESSION['date'] ?>">
    <button type="submit" class="form__btn--dg" name ="btn_search"  style="background-color:cadetblue">Tìm</button>
  </form>
  

  <div class="">
  <h2 class="tkb__text">Thời Khóa Biểu </h2>
  </div>
  

  
  <form class="form__btn" action="weekChange.php" method="POST">
    <button type="submit" name="last_week" class="form__btn--dg"><i class="fa fa-angle-left"></i> Tuần trước</button>
    <button type="submit" name="now_week"  class="form__btn--dg">Hiện tại</button>
    <button type="submit" name="tomorrow_week"  class="form__btn--dg">Tuần sau <i class="fa fa-angle-right"></i></button>
  </form>
</div>
<table  class="content_table--all content_table ">
    <tr  class="content_table--nav">
          <td class="content_text-sm bgr__tkb content_table--text">Ca học</td>
                  
                  <?php 
                     
               $current_date = date('Y-m-d H:i:s');
                $today = strtotime($current_date);
                
                if(isset($_SESSION['date']) && isset($_POST['btn_search'])){
                     
                    $current_date = date($_SESSION['date']);
                  
                    $today = strtotime($current_date);
                    $firstDayOfWeek1 = strtotime('monday this week', $today);
                    $lastDayOfWeek1 = strtotime('sunday this week', $today);

                }
                if(intval($plus_day % -7  == 0) && abs(intval($plus_day)) >=7){
                    
                  
                  $firstDayOfWeek = strtotime('monday this week', $today);

                    $lastDayOfWeek = strtotime('sunday this week', $today);
                      
                      $firstDayOfPrevWeek = strtotime('+'.(intval($plus_day) / 7).' week', $firstDayOfWeek);
                      
                      $lastDayOfPrevWeek = strtotime('+6 days', $firstDayOfPrevWeek);

                  }
                   elseif(intval($plus_day) == 0 || isset($_SESSION['s']) ){

                      $firstDayOfWeek = strtotime('monday this week', $today);

                      $lastDayOfWeek = strtotime('sunday this week', $today);

                  }

                 
                  for ($i = 0; $i <= 6; $i++) {
                    
                    ?>
                   <td class="conten_trangthai size__tkb bgr__tkb" style="vertical-align: middle;text-align:center">
                   <?php

                    if(isset($_POST['btn_search'])){
                        $dayOfWeek = strtotime('+' . $i . ' days', $firstDayOfWeek1);
                        if ($dayOfWeek <= $lastDayOfWeek1) {
                        
                          $date =  date("N",$dayOfWeek) + 1 ;
                          
                          if($date == 8){
                            echo 'Chủ Nhật'.'<br>';
                          }else{
                            echo 'Thứ '.$date.'<br>';
                          }
                            echo date('d/m/Y', $dayOfWeek) . '<br>';
                        }
                     }
                    elseif(intval($plus_day) % -7  == 0 && abs(intval($plus_day )) >=7){

                        $dayOfWeek = strtotime('+' . $i . ' days', $firstDayOfPrevWeek );
                        if ($dayOfWeek <= $lastDayOfPrevWeek) {
                        
                          $date =  date("N",$dayOfWeek) + 1 ;
                          
                          if($date == 8){
                            echo 'Chủ Nhật'.'<br>';
                          }else{
                            echo 'Thứ '.$date.'<br>';
                          }
                            echo date('d/m/Y', $dayOfWeek) . '<br>';
                        }
                    
                    }
                    elseif(intval($plus_day) == 0 || isset($_SESSION['s']) ){
                        
                        $dayOfWeek = strtotime('+' . $i . ' days', $firstDayOfWeek);
                        if ($dayOfWeek <= $lastDayOfWeek) {
                        
                          $date =  date("N",$dayOfWeek) + 1 ;
                          
                          if($date == 8){
                            echo 'Chủ Nhật'.'<br>';
                          }else{
                            echo 'Thứ '.$date .'<br>';
                          }
                            echo date('d/m/Y', $dayOfWeek) . '<br>';
                            
                        }
                    }

                      ?>
                      </td>
                      <?php
                  }
                
                ?>
                  
                       
                    
                      
                     
     
    </tr>
    <?php $buoi = 1;
    while ($buoi <=3){
      if($buoi == 1){
        $cahoc = 'Sáng';
        $tbd = 1;
        $tkt = 5;
      }elseif($buoi == 2){
        $cahoc = 'Chiều';
        $tbd = 6;
        $tkt = 10;
      }else{
        $cahoc = 'Tối';
        $tbd = 11;
        $tkt = 15;
      }
    ?>
    <tr  class="content_table--nav">
          <td class="content_text-sm bgr__tkb size__tkb--col content_table--text"><?php echo $cahoc?></td>
         
          <?php
       
          for ($i = 0; $i <= 6; $i++) {

            if(isset($_POST['btn_search'])){
              
                $dayOfWeek = strtotime('+' . $i . ' days', $firstDayOfWeek1);
                $date =  date("N",$dayOfWeek) + 1 ;
                $getDate = date('Y-m-d', $dayOfWeek) ;
                                  
                $query = "SELECT DISTINCT lop.tenlop as tenlop, monhoc.tenmon as tenmon,buoihoc.idbuoihoc as idbh ,buoihoc.idtkb as t,giaovien.hoten as htgv,lophoc.idlophoc as idlh,lophoc.tenlophoc as tlh ,buoihoc.sophong as b, buoihoc.tietbatdau as tbd,buoihoc.tietketthuc as tkt,thu , ngay 
                  FROM giaovien INNER JOIN  lophoc ON giaovien.idgiaovien = lophoc.idgiaovien INNER JOIN lop ON lop.idlop = lophoc.idlop INNER JOIN monhoc ON monhoc.idmonhoc = lophoc.idmonhoc INNER JOIN thoikhoabieu ON lophoc.idlophoc = thoikhoabieu.idlophoc INNER JOIN  buoihoc ON thoikhoabieu.idtkb = buoihoc.idtkb
                  WHERE buoihoc.tietketthuc <= $tkt and buoihoc.tietbatdau >= $tbd   and ngay ='$getDate' ORDER BY buoihoc.tietbatdau ASC";

                  $kqua = $db->thucthi($query);
                  ?>
                  <td class="conten_trangthai  " >
                  <?php
                 
                  while($day = mysqli_fetch_array($kqua)){
                   
                    echo '<form action="xoa.php" method="post" class="td__tkb--color" >';
                  
                    echo '<input name="idbuoihoc" id="idbuoihoc" type="hidden" value="'.$day['idbh'].'">';
                    echo '<input name="idphong" id="idphong" type="hidden" value="'.$day['b'].'">';
                    echo '<input name="idtbd" id="idtbd" type="hidden" value="'.$day['tbd'].'">';
                    echo '<input name="idtkt" id="idtkt" type="hidden" value="'.$day['tkt'].'">';
                    echo '<input name="idtl" id="idtl" type="hidden" value="'.$day['tenlop'].'">';
                    echo '<input name="idtm" id="idtm" type="hidden" value="'.$day['tenmon'].'">';
                    echo '<input name="idhtgv" id="idhtgv" type="hidden" value="'.$day['htgv'].'">';
                    echo '<input name="time" id="time" type="hidden" value="'.$day['ngay'].'">';

                    echo '<div style ="text-align: center;">';
                    // echo '<span>'.$day['ngay'].'</span>'.'<br>'; 
                    echo '<span>'.$day['idlh'].'</span>'.'<br>';
                    echo '<span style=" font-weight: bold;font-size:0.8rem;text-align:center;">'.$day['tlh'].'</span>'.'<br>';
                    echo '<span>'.'----------------------'.'</span>'.'<br>';
                    echo '</div>';   
                    echo '<span >'.'Phòng: '.$day['b'].'</span>'.'<br>';    
                    echo '<span>'.'Tiết '.$day['tbd'].'-'.$day['tkt'].'</span>'.'<br>';    
                    
                    echo '<span>'.'GV: '.$day['htgv'].'</span>'.'<br>';   
                    
                    echo '<div style ="text-align: center;margin-top:5px">';
                    echo '<button onclick="return confirm(\'Bạn có chắc muốn xóa mục này không?\');"  name="btn_xoa" class="content_button--tkb1" type="submit" " >'.'Xóa'.'</button>';
                    echo '<button  name ="btn_edit1" data-id="'. $day['idbh'].'" class="content_button--tkb" type="submit"  >'.'Sửa'.'</button>';
                    echo '</div>';
                    echo '</form>';   
 
          
                          ?>
                      <?php  }?>
                      </td>
                      <?php }  
            elseif(intval($plus_day) % -7  == 0 && abs(intval($plus_day )) >=7){
              
                $dayOfWeek = strtotime('+' . $i . ' days', $firstDayOfPrevWeek );
                $date =  date("N",$dayOfWeek) + 1 ;
                $getDate = date('Y-m-d', $dayOfWeek) ;
                                  
                $query = "SELECT DISTINCT lop.tenlop as tenlop, monhoc.tenmon as tenmon,buoihoc.idbuoihoc as idbh ,buoihoc.idtkb as t,giaovien.hoten as htgv,lophoc.idlophoc as idlh,lophoc.tenlophoc as tlh ,buoihoc.sophong as b, buoihoc.tietbatdau as tbd,buoihoc.tietketthuc as tkt,thu , ngay 
                  FROM giaovien INNER JOIN  lophoc ON giaovien.idgiaovien = lophoc.idgiaovien INNER JOIN lop ON lop.idlop = lophoc.idlop INNER JOIN monhoc ON monhoc.idmonhoc = lophoc.idmonhoc INNER JOIN thoikhoabieu ON lophoc.idlophoc = thoikhoabieu.idlophoc INNER JOIN  buoihoc ON thoikhoabieu.idtkb = buoihoc.idtkb
                  WHERE buoihoc.tietketthuc <= $tkt and buoihoc.tietbatdau >= $tbd   and ngay ='$getDate' ORDER BY buoihoc.tietbatdau ASC";

                  $kqua = $db->thucthi($query);
                  ?>
                  <td class="conten_trangthai  " >
                  <?php
                 
                  while($day = mysqli_fetch_array($kqua)){
                   
                    echo '<form action="xoa.php" method="post" class="td__tkb--color" >';
                  
                    echo '<input name="idbuoihoc" id="idbuoihoc" type="hidden" value="'.$day['idbh'].'">';
                    echo '<input name="idphong" id="idphong" type="hidden" value="'.$day['b'].'">';
                    echo '<input name="idtbd" id="idtbd" type="hidden" value="'.$day['tbd'].'">';
                    echo '<input name="idtkt" id="idtkt" type="hidden" value="'.$day['tkt'].'">';
                    echo '<input name="idtl" id="idtl" type="hidden" value="'.$day['tenlop'].'">';
                    echo '<input name="idtm" id="idtm" type="hidden" value="'.$day['tenmon'].'">';
                    echo '<input name="idhtgv" id="idhtgv" type="hidden" value="'.$day['htgv'].'">';
                    echo '<input name="time" id="time" type="hidden" value="'.$day['ngay'].'">';

                    echo '<div style ="text-align: center;">';
                    // echo '<span>'.$day['ngay'].'</span>'.'<br>'; 
                    echo '<span>'.$day['idlh'].'</span>'.'<br>';
                    echo '<span style=" font-weight: bold;font-size:0.8rem;text-align:center;">'.$day['tlh'].'</span>'.'<br>';
                    echo '<span>'.'----------------------'.'</span>'.'<br>';
                    echo '</div>';   
                    echo '<span >'.'Phòng: '.$day['b'].'</span>'.'<br>';    
                    echo '<span>'.'Tiết '.$day['tbd'].'-'.$day['tkt'].'</span>'.'<br>';    
                    
                    echo '<span>'.'GV: '.$day['htgv'].'</span>'.'<br>';   
                    
                    echo '<div style ="text-align: center;margin-top:5px">';
                    echo '<button onclick="return confirm(\'Bạn có chắc muốn xóa mục này không?\');"  name="btn_xoa" class="content_button--tkb1" type="submit" " >'.'Xóa'.'</button>';
                    echo '<button  name ="btn_edit1" data-id="'. $day['idbh'].'" class="content_button--tkb" type="submit"  >'.'Sửa'.'</button>';
                    echo '</div>';
                    echo '</form>';     
                    
                          ?>
                      <?php  }?>
                      </td>
                      <?php }
            
                   
              elseif(intval($plus_day) == 0 || isset($_SESSION['s']) ){
                   
                $dayOfWeek = strtotime('+' . $i . ' days', $firstDayOfWeek);
                if ($dayOfWeek <= $lastDayOfWeek) {
                  $date =  date("N",$dayOfWeek) + 1 ;
                  $getDate = date('Y-m-d', $dayOfWeek) ;
                                    
                 
                  $query = "SELECT DISTINCT lop.tenlop as tenlop, monhoc.tenmon as tenmon,buoihoc.idbuoihoc as idbh ,buoihoc.idtkb as t,giaovien.hoten as htgv,lophoc.idlophoc as idlh,lophoc.tenlophoc as tlh ,buoihoc.sophong as b, buoihoc.tietbatdau as tbd,buoihoc.tietketthuc as tkt,thu , ngay 
                  FROM giaovien INNER JOIN  lophoc ON giaovien.idgiaovien = lophoc.idgiaovien INNER JOIN lop ON lop.idlop = lophoc.idlop INNER JOIN monhoc ON monhoc.idmonhoc = lophoc.idmonhoc INNER JOIN thoikhoabieu ON lophoc.idlophoc = thoikhoabieu.idlophoc INNER JOIN  buoihoc ON thoikhoabieu.idtkb = buoihoc.idtkb
                  WHERE buoihoc.tietketthuc <= $tkt and buoihoc.tietbatdau >= $tbd   and ngay ='$getDate' ORDER BY buoihoc.tietbatdau ASC";

                  $kqua = $db->thucthi($query);
                  ?>
                  <td class="conten_trangthai  " >
                  <?php
                 
                  while($day = mysqli_fetch_array($kqua)){
                   
                    echo '<form action="xoa.php" method="post" class="td__tkb--color" >';
                  
                    echo '<input name="idbuoihoc" id="idbuoihoc" type="hidden" value="'.$day['idbh'].'">';
                    echo '<input name="idphong" id="idphong" type="hidden" value="'.$day['b'].'">';
                    echo '<input name="idtbd" id="idtbd" type="hidden" value="'.$day['tbd'].'">';
                    echo '<input name="idtkt" id="idtkt" type="hidden" value="'.$day['tkt'].'">';
                    echo '<input name="idtl" id="idtl" type="hidden" value="'.$day['tenlop'].'">';
                    echo '<input name="idtm" id="idtm" type="hidden" value="'.$day['tenmon'].'">';
                    echo '<input name="idhtgv" id="idhtgv" type="hidden" value="'.$day['htgv'].'">';
                    echo '<input name="time" id="time" type="hidden" value="'.$day['ngay'].'">';

                    echo '<div style ="text-align: center;">';
                    // echo '<span>'.$day['ngay'].'</span>'.'<br>'; 
                    echo '<span>'.$day['idlh'].'</span>'.'<br>';
                    echo '<span style=" font-weight: bold;font-size:0.8rem;text-align:center;">'.$day['tlh'].'</span>'.'<br>';
                    echo '<span>'.'----------------------'.'</span>'.'<br>';
                    echo '</div>';   
                    echo '<span >'.'Phòng: '.$day['b'].'</span>'.'<br>';    
                    echo '<span>'.'Tiết '.$day['tbd'].'-'.$day['tkt'].'</span>'.'<br>';    
                    
                    echo '<span>'.'GV: '.$day['htgv'].'</span>'.'<br>';   
                    
                    echo '<div style ="text-align: center;margin-top:5px">';
                    echo '<button onclick="return confirm(\'Bạn có chắc muốn xóa mục này không?\');"  name="btn_xoa" class="content_button--tkb1" type="submit" " >'.'Xóa'.'</button>';
                    echo '<button  name ="btn_edit1" data-id="'. $day['idbh'].'" class="content_button--tkb" type="submit"  >'.'Sửa'.'</button>';
                    echo '</div>';
                    echo '</form>';  

                  ?>
              <?php  }?>
              </td>
  
                      <?php
                     
                     
                  }
                
                }}
                
                ?>
          </tr>  
            
    <?php $buoi ++;}?>


    </table>
  
    <div class="modal">
        <div class="modal_overlay"></div>

        <form id="loginForm" action="edit.php" method="post" class="modal_body ">
          <span class="modal_text">Edit thông tin</span>
          <div class="modal_input">
          <input type="text" id="idbh_edit" name ="idbh_edit"    readonly style="text-align: center; background-color: #ccc; border:none">
          <input type="hidden" id="time_edit" name ="time_edit"    readonly style="text-align: center; background-color: #ccc; border:none">

        </div>
          <div class="modal_input">

            <label for="username">Tên lớp:</label>
            <select name="tl_edit" id="tl_edit" class="modal_select">
              <?php 
                $lophoc = $db->thucthi("SELECT * FROM lop");
                while($row_lophoc = mysqli_fetch_array($lophoc)){
              ?>
              <option  value="<?php echo $row_lophoc['tenlop'] ?>"><?php echo $row_lophoc['tenlop'] ?></option> 
            
              <?php } ?>

            </select>
          </div>
          <div class="modal_input">

            <label for="username">Tên môn:</label>
            <select name="tm_edit" id="tm_edit" class="modal_select">
              <?php 
               $lophoc = $db->thucthi("SELECT * FROM monhoc");
                while($row_lophoc = mysqli_fetch_array($lophoc)){
                  ?>
                  <option value="<?php echo $row_lophoc['tenmon']; ?>"><?php echo $row_lophoc['tenmon']; ?></option> 
                
                  <?php }?>

            </select>
          </div>
          <div class="modal_input">
              
              
            <label for="password">Phòng:</label>
            <select name="sophong_edit" id="sophong_edit" class="modal_select">
              <?php  while($row_phong = mysqli_fetch_array($kq)){
                        ?>
                        <option value="<?php echo $row_phong['sophong']; ?>"><?php echo $row_phong['sophong']; ?></option> 
                      
                        <?php }?>
             
            </select>
          </div>
          <div class="modal_input">
              
              
            <label for="password">Giáo viên:</label>
           
            <select name="htgv_edit" id="htgv_edit" class="modal_select">
              <?php 
              $giaovien = $db->thucthi("SELECT * FROM giaovien");
                        while($row_giaovien = mysqli_fetch_array($giaovien)){
                        ?>
                        <option value="<?php echo $row_giaovien['hoten']; ?>"><?php echo $row_giaovien['hoten']; ?></option> 
                      
                        <?php }?>
             
            </select>
          </div>
          <div class="modal_input" style="display:flex; flex-direction:row; justify-content:space-evenly">
            <div>

              <label for="password">Tbđ:</label>
              
              <select name="tbd_edit" id="tbd_edit" class="modal_select">
              <?php
                $t = 1;
                while($t <= 15 ){
               ?>
                <option value="<?php echo $t ?>"><?php echo $t ?></option>

                <?php $t++; }?>
              </select>
            </div>
              
            <div>

              <label for="password">Tkt:</label>
              <select name="tkt_edit" id="tkt_edit" class="modal_select">
                <?php
                $t = 1;
                while($t <= 15 ){
               ?>
                <option value="<?php echo $t ?>"><?php echo $t ?></option>
                
                <?php $t++; }?>
                
              </select>
            </div>

          </div>
          <div class="modal_btn">

            <button type="button" name ="button" onclick="quit()" class="modal_btn1">Quay lại</button>
            <button type="submit" name ="edit_form" class="modal_btn1">Edit</button>
          </div>
      </form>

    </div>
    
        <div class="content_header">
          <h2>Tạo Lịch Học</h2>
          <h2>Thông Tin Phòng</h2>
          
        </div>
        
    <div class="content_body_table">
       <div class="conten_body_table_1">

         
             
        
           <form action="addLich.php" method="post"  class="content_table1">
 
             <div class="">
   
               <table class='content_table'>
                   <tr  class="content_table--nav">
                     <td class="content_table--text content_table--text_1">Kỳ Học </td>
                     <td class="content_table--select">
                       <select name="kyhoc" id="" class="content_table-select1">
                       <!-- <option>--Lựa chọn kì học--</option>  -->
                       <?php 
                         $kihoc = $db->thucthi("SELECT * FROM kyhoc");
                         while($row_kh = mysqli_fetch_array($kihoc)){
                         ?>
                         <option value="<?php echo $row_kh['idkyhoc']; ?>"><?php echo $row_kh['kyhoc']; ?></option> 
                       
                         <?php }?>
                   </select>
                       </select>
                     </td>
                     
                   </tr>
                   <!-- <tr class="content_table--nav">
                     <td class="content_table--text">Khoa</td>
                     <td class="content_table--select">
                       <select name="khoa" id="" class="content_table-select1">
                       <?php 
                         $khoa = $db->thucthi("SELECT * FROM khoa");
                         while($row_khoa = mysqli_fetch_array($khoa)){
                         ?>
                         <option value="<?php echo $row_khoa['idkhoa']; ?>"><?php echo $row_khoa['tenkhoa']; ?></option> 
                       
                         <?php }?>
                   </select>
                       </select>
                     </td>
                   
                   </tr> -->
                   <!-- <tr class="content_table--nav">
                     <td class="content_table--text">Bộ Môn</td>
                   <td class="content_table--select">
                       <select name="bomon" id="" class="content_table-select1">
                       <?php 
                         // $bomon = $db->thucthi("SELECT tenbomon FROM bomon");
                         // while($row_bomon = mysqli_fetch_array($bomon)){
                         // ?>
                         // <option value="<?php echo $row_bomon['tenbomon']; ?>"><?php echo $row_bomon['tenbomon']; ?></option> 
                       
                         <?php // }?>
                       </select>
                     </td>
                     
                   </tr> -->
                   
              
               <tr class="content_table--nav">
                       <td class="content_table--text content_table--text_1">Khoa</td>
                       <td class="content_table--select">
                         <select name="khoa" id="idkhoa"  class="content_table-select1">
                         <option value="">--Chọn khoa--</option>
                         <?php 
                           $khoa = $db->thucthi("SELECT * FROM khoa");
                           while($row_khoa = mysqli_fetch_array($khoa)){
                           ?>
                           
                           <option value="<?php echo $row_khoa['idkhoa']; ?>"><?php echo $row_khoa['tenkhoa']; ?></option> 
                         
                           <?php }?>
                     </select>
                        
                       </td>
                     
                     </tr>
             
                   <tr class="content_table--nav">
                     <td class="content_table--text content_table--text_1">Giáo Viên</td>
                     <td class="content_table--select">
                       <select name="giaovien" id="idgiaovien" class="content_table-select1">
                      
                       </select>
                     </td>
                   
                    </tr>
                    <tr class="content_table--nav">
                     <td class="content_table--text content_table--text_1">Tên Lớp </td>
                     <td class="content_table--select">
                       
                       <select name="tenlop" id="idtenlop" class="content_table-select1">
                      
                       </select>
                     </td>
                   
                   </tr> 
                   
                      <?php
                       // include ('test.php');
                      ?>
                   <tr class="content_table--nav">
                     <td class="content_table--text content_table--text_1">Tên môn học </td>
                     <td class="content_table--select">
                       <select name="monhoc" id="idmonhoc" class="content_table-select1">
                      
                       </select>
                     </td>
                   
                   </tr>
                   <tr class="content_table--nav">
                     <td class="content_table--text content_table--text_1">Phòng</td>
                     <td class="content_table--select">
                       <select name="sophong" id="" class="content_table-select1">
                       <?php 
                        $sql = "SELECT  sophong FROM phong ";
                        $kq = $db->thucthi($sql);
                         while($row_phong = mysqli_fetch_array($kq)){
                         ?>
                         <option value="<?php echo $row_phong['sophong']; ?>"><?php echo $row_phong['sophong']; ?></option> 
                       
                         <?php }?>
                       </select>
                     </td>
                   
                   </tr>
               
           
               </table>
              
               <ul class="tr__form">
                 
                 
                  <li class="td__form">
                  Ngày
                    <select name="ngay" id="" class="td__select">
                        <?php 
                         $ngay1=1;
                          while($ngay1<=31){
                          ?>
                          <option value="<?php echo $ngay1 ?>"><?php echo $ngay1 ?></option> 
                        
                          <?php $ngay1++;}?>
                        </select>
                  </li>
                  <li class="td__form">
                 Tháng
                    <select name="thang" id="" class="td__select">
                        <?php 
                         $thang=1;
                          while($thang<=12){
                          ?>
                          <option value="<?php echo $thang ?>"><?php echo $thang ?></option> 
                        
                          <?php $thang++;}?>
                        </select>
                  </li>
                  <li class="td__form">
                 Năm
                    <select name="nam" id="" class="td__select">
                        <?php 
                         $getNam= date('Y');
                            $nam = (int)$getNam;
                         
                          ?>
                           <option value="<?php echo ($nam - 2) ?>"><?php echo $nam - 2 ?></option> 
                           <option value="<?php echo ($nam - 1) ?>"><?php echo $nam - 1 ?></option> 
                          <option value="<?php echo $nam ?>"><?php echo $nam ?></option> 
                          <option value="<?php echo $nam + 1 ?>"><?php echo $nam + 1 ?></option> 
                          <option value="<?php echo $nam + 2?>"><?php echo $nam + 2?></option> 
                        
                          <?php $nam++;?>
                        </select>
                  </li>
                 
                 </ul>
                 <ul class="tr__form " style="justify-content:center">
                 
                 <li class="">
                Tiết bđ 
                    <select name="tietbd" id="" class="">
                        <?php 
                         $thu1 = 1;
                          while($thu1<=15){
                          ?>
                          <option value="<?php echo $thu1 ?>"><?php echo $thu1 ?></option> 
                        
                          <?php $thu1++;}?>
                          
                        </select>
                  </li>
                  <li class="" style='margin-left:15px'>
                Tiết kt 
                    <select name="tietkt" id="" class="">
                        <?php 
                         $thu1 = 1;
                          while($thu1<=15){
                          ?>
                          <option value="<?php echo $thu1 ?>"><?php echo $thu1 ?></option> 
                        
                          <?php $thu1++;}?>
                        </select>
                  </li>
                 
                 
                 </ul>
             </div>
             <button class="btn__add" type="submit">Thêm lịch</button>
           </form>
       </div>
        <style>
         .form_table{
          display: flex;
          flex-direction: row;
          align-items: center;
         }
         .look__room{
          display: flex;
          margin: 10px auto ;
          width: 47%;
          max-width: 50%;
          justify-content: end;
         }
         .content_button{
          margin: 0 auto;
         
         }
         .btn__look{
          width: 45%;
          max-width: 50%;
         }
        </style>
        <div class="conten_body_table_1">
          <div class="content_table1" style="border:1px solid #ccc; padding: 10px;margin-bottom:63px">
            <form action="searchPhong.php" method="post" class="form_table" enctype="multipart/form-data">

              
                <div  class="look__room" style=" align-items:center"> 
                    <p class="" style="margin:0 10px 0 0 ">Ngày:</p>
                    
                      <input type="date" name = "tietSearch" value="<?php echo $_SESSION['date1']?>">    
              </div>
              <div class="btn__look" style="margin-left: 10px;">

                <button type="submit" name="xem_searchPhong" class="content_button">Xem</button>
                
              </div>
              <div class="btn__look">

                <button type="submit" name="hientai_searchPhong" class="content_button" style="background-color:darkcyan">Hiện tại</button>

                </div>
            </form>
            
            <table  class="content_table ">
             
                
  
                  <tr  class="content_table--nav">
                        <!-- <td class="content_text-font content_table--text " style="width:15%">STT</td> -->
                        <td class="conten_trangthai content_text-font " style="text-align:center">
                        Phòng
                        </td>
                        <td class="conten_trangthai content_text-font "style="text-align:center">
                        Trạng thái Phòng
                        </td>
                        <td class="conten_trangthai content_text-font "style="text-align:center">
                        Trạng thái tiết
                        </td>
                  </tr>
              </table>
              <div class="table_scroll">
                <table  class="content_table ">
                  <?php
                  
                  //while($i < 100){
                   ?>
                  <?php $ttPhong = "SELECT  sophong FROM phong ORDER BY sophong ASC ";
                        $kq__ttPhong = $db->thucthi($ttPhong);
                        
                        while($row_ttp = mysqli_fetch_array($kq__ttPhong)){
                              $p = $row_ttp['sophong']
                        ?>
                  <tr  class="content_table--nav">
                        <td class="content_text-font conten_trangthai  " style="text-align:center">
                        
                        <div style="border-bottom:1px solid #ccc">

                          <?php echo $p ?>
                        </div>
                        
                        </td>

                        <td class="conten_trangthai content_text-font " style="text-align:center">
                        <?php
                          $gdate = date('Y-m-d');
                          $trang_thai = $db->thucthi("SELECT  trangthai FROM buoihoc WHERE sophong = '$p'  AND ngay = '$dateSearch'  ORDER BY sophong ASC  ");
                          // while( $tt = mysqli_fetch_array($trang_thai)){
                            $tt = mysqli_fetch_assoc($trang_thai);
                          if($tt){

                            if($tt['trangthai'] == strval(1)){
                             
                              echo '<div style="color:red;border-bottom:1px solid #ccc"> Có lớp học</div>';
                          }
                          }else{
                           
                            echo   '<div style="border-bottom:1px solid #ccc">Trống</div>';
                          }
                        //}
                     // }
                        
                          
                        ?>
                        </td>
                       
                         <td class="conten_trangthai content_text-font ">
                         <?php
                          $trang_thai1 = $db->thucthi("SELECT  tietbatdau,tietketthuc FROM buoihoc WHERE sophong = '$p' AND ngay = '$dateSearch' ORDER BY sophong,tietbatdau ASC  ");
                          while($tt1 = mysqli_fetch_array($trang_thai1))
                          // $tt1 = mysqli_fetch_assoc($trang_thai1);
                            if($tt1){

                              echo '<span style="border-bottom:1px solid #ccc;padding:0 5px">'.$tt1['tietbatdau'].'-'.$tt1['tietketthuc'].';'.'</span>';
                            
                            }else{
                            
                              echo   '<div style="border-bottom:1px solid #ccc"></div>';
                            }?>
                        </td> 
                  </tr>
                  <?php } ?>
                  <?php
                   ?>
                  
               
              </table>
            </div>
          </div>
        </div>
        </div>

       
            
       
      </div>
      <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="http://presentation.creative-tim.com">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
     
    <script>
    
    
    const loginForm = document.getElementById("loginForm");
   
    const forms = document.querySelectorAll('.td__tkb--color');
    const overlay = document.querySelector(".modal");
    forms.forEach(form => {
    
      const loginBtns = form.querySelector('.content_button--tkb');

      loginBtns.addEventListener('click',e=> {
       
        const sophong_edit = document.getElementById("sophong_edit");
        const tbd_edit = document.getElementById("tbd_edit");
        const tkt_edit = document.getElementById("tkt_edit");
        const tl_edit = document.getElementById("tl_edit");
        const tm_edit = document.getElementById("tm_edit");
        const htgv_edit = document.getElementById("htgv_edit");
       
        const input = e.target.closest('.td__tkb--color').querySelector('input[name="idphong"]');
        const idbuoihoc = e.target.closest('.td__tkb--color').querySelector('input[name="idbuoihoc"]');
        const idtbd = e.target.closest('.td__tkb--color').querySelector('input[name="idtbd"]');
        const idtkt = e.target.closest('.td__tkb--color').querySelector('input[name="idtkt"]');
        const idtl = e.target.closest('.td__tkb--color').querySelector('input[name="idtl"]');
        const idtm = e.target.closest('.td__tkb--color').querySelector('input[name="idtm"]');
        const idhtgv = e.target.closest('.td__tkb--color').querySelector('input[name="idhtgv"]');
        const time = e.target.closest('.td__tkb--color').querySelector('input[name="time"]');

        document.getElementById("idbh_edit").value = idbuoihoc.value;

        document.getElementById("time_edit").value = time.value;
        
        sophong_edit.options[0].value = input.value;
        sophong_edit.options[0].text = input.value;

        tbd_edit.options[0].value = idtbd.value;
        tbd_edit.options[0].text = idtbd.value;

        tkt_edit.options[0].value = idtkt.value;
        tkt_edit.options[0].text = idtkt.value;

        tl_edit.options[0].value = idtl.value;
        tl_edit.options[0].text = idtl.value;

        tm_edit.options[0].value = idtm.value;
        tm_edit.options[0].text = idtm.value;

        htgv_edit.options[0].value = idhtgv.value;
        htgv_edit.options[0].text = idhtgv.value;


       
        e.preventDefault();
        overlay.style.display = 'block';
      
       
      });
    // });
  });
    
   function quit(){
    loginForm.classList.remove("show1");
      overlay.style.display = "none";
   }

  </script>
  <script>
   
// Lắng nghe sự kiện khi select box thay đổi
    document.getElementById("idkhoa").addEventListener("change", function() {
      var selectValue = this.value;

      // Tạo một đối tượng XMLHttpRequest để thực hiện gọi AJAX
      // idtenlop
      var xhr = new XMLHttpRequest();

      // Định nghĩa hàm callback để xử lý kết quả trả về từ file PHP
      xhr.onload = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
          // Xử lý dữ liệu trả về từ file PHP ở đây
          document.getElementById("idtenlop").innerHTML = "<option value=\"\"></option>" + xhr.responseText;
          document.getElementById("idtenlop").innerHTML = xhr.responseText;

          console.log(xhr.responseText);
        }
      };

      // Gọi file PHP và truyền giá trị select box qua biến "id"
      xhr.open("GET", "test.php?id=" + selectValue);
      xhr.send();

      // idgiaovien
      var xhr1 = new XMLHttpRequest();

      // Định nghĩa hàm callback để xử lý kết quả trả về từ file PHP
      xhr1.onload = function() {
        if (xhr1.readyState === XMLHttpRequest.DONE && xhr1.status === 200) {
          // Xử lý dữ liệu trả về từ file PHP ở đây
          document.getElementById("idgiaovien").innerHTML = "<option value=\"\"></option>" + xhr1.responseText;
          document.getElementById("idgiaovien").innerHTML = xhr1.responseText;

          console.log(xhr1.responseText);
        }
      };

      // Gọi file PHP và truyền giá trị select box qua biến "id"
      xhr1.open("GET", "test1.php?id=" + selectValue);
      xhr1.send();

      //idmonhoc
      var xhr2 = new XMLHttpRequest();
      // Định nghĩa hàm callback để xử lý kết quả trả về từ file PHP
      xhr2.onload = function() {
        if (xhr2.readyState === XMLHttpRequest.DONE && xhr2.status === 200) {
          // Xử lý dữ liệu trả về từ file PHP ở đây
          document.getElementById("idmonhoc").innerHTML = "<option value=\"\"></option>" + xhr2.responseText;
          document.getElementById("idmonhoc").innerHTML = xhr2.responseText;

          console.log(xhr2.responseText);
        }
      };

      // Gọi file PHP và truyền giá trị select box qua biến "id"
      xhr2.open("GET", "test2.php?id=" + selectValue);
      xhr2.send();
});

  </script>
</body>

</html>