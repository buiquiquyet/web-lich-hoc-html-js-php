
<?php 
 date_default_timezone_set('Asia/Ho_Chi_Minh');
 
  session_start();

 

 
if(!isset($_SESSION['s'])){
 
  session_regenerate_id();
   $_SESSION['s'] = true ;
  

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
<?php include_once('headerNv.php') ;
include "database.php";

$db = new database();

$sql = "SELECT  sophong FROM phong ";
$kq = $db->thucthi($sql);



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
  <h2 class="tkb__text">Thời Khóa Biểu</h2>
  </div>
  

  
  <form class="form__btn" action="getProduct.php" method="POST">
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
          <!-- <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
          </div> -->
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
    // loginBtns.forEach(function(loginBtn) {
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
    // loginForm.addEventListener("submit", function(event) {
     
    //   loginForm.classList.remove("show1");
    //   overlay.style.display = "none";
    // });
  </script>
</body>

</html>