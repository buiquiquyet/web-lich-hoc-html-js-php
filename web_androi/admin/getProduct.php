<?php 

 session_start();

if(isset($_POST['last_week'])){
    if(isset($_SESSION['s'] ))
        {
          
                echo 'ok';
                $_SESSION['s'] += '-7';
           
        }else{
            echo 'ko';
        }
}

if(isset($_POST['tomorrow_week'])){
    if(isset($_SESSION['s'] ))
        {
            echo $_SESSION['s'].'-' ;
            $_SESSION['s'] += '7';
        
            echo $_SESSION['s'] ;
        }

    if(isset($_SESSION['ngay']) && isset($_SESSION['month']))
    {
        echo '-'.$_SESSION['ngay'] ;
        echo '-'.$_SESSION['month'] ;
       
    }
}
if(isset($_POST['now_week'])){
    if(isset($_SESSION['s'] ))
        {
            echo $_SESSION['s'] ;
            $_SESSION['s'] = '0';
        
            echo $_SESSION['s'] ;
        }
}
   
header("Location: nhanvien.php");
   

exit;




?>

