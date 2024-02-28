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

  
  $lophoc = $db->thucthi("SELECT * FROM lop   WHERE idkhoa = '$sss' ");

  while($row_lophoc = mysqli_fetch_array($lophoc)){
    $html .= '<option value="'.$row_lophoc['idlop'].' "> '.$row_lophoc['tenlop'].' </option> ';
  }

  $html .= '</select>';
  $html .= '</td>';

  $html .= '</tr>';

  
  echo $html;
}
  
?>
<!-- <tr class="content_table--nav">
                     <td class="content_table--text content_table--text_1">Tên Lớp </td>
                     <td class="content_table--select">
                       
                       <select name="tenlop" id="" class="content_table-select1">
                       <?php 
                      // include "database.php";
                       //$db = new database();
                        //$lophoc = $db->thucthi("SELECT * FROM lop INNER JOIN khoa ON lop.idkhoa = khoa.idkhoa WHERE khoa.tenkhoa = '$selectedOption'  ");
                        //while($row_lophoc = mysqli_fetch_array($lophoc)){
                          ?>
                          <option value="<?php //echo $row_lophoc['idlop']; ?>"><?php //echo $row_lophoc['tenlop']; ?></option> 
                        
                         
                        </select>
                      </td>
                    
                    </tr> -->
