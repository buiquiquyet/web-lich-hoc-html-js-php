<?php

session_start();

if(isset($_POST['xem_searchPhong'])){
    $_SESSION['date1'] = isset($_POST['tietSearch']) ? $_POST['tietSearch'] : '';
    
}
elseif(isset($_POST['hientai_searchPhong'])){
    $_SESSION['date1'] = date('Y-m-d');
    
}

header("Location: dashboard.php");

?>