<?php

if(isset($_GET['id'])){
  include "database.php";

  $db = new database();
  
  $sss = $_GET['id'];
  $html = '';
  $html = '<tr class="content_table--nav">';
  $html .= '<td class="content_table--text content_table--text_1">Tên lớp </td>';
  $html .= '<td class="content_table--select">';
  
  $html .= '<select name="tenlop" id="" class="content_table-select1">';

  
  $lophoc = $db->thucthi("SELECT * FROM giaovien   WHERE idkhoa = '$sss' ");

  while($row_lophoc = mysqli_fetch_array($lophoc)){
    $html .= '<option value="'.$row_lophoc['idgiaovien'].' "> '.$row_lophoc['hoten'].' </option> ';
  }

  $html .= '</select>';
  $html .= '</td>';

  $html .= '</tr>';

  
  echo $html;
}
  
?>
