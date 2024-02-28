<?php
	// $ma = $_GET['ma'];
    session_start();
   if(isset($_SESSION["user"])){
   
	unset($_SESSION["user"]);
   }
 header("location:loginKh.php");
  

?>