<?php
error_reporting(0);
include 'conn.php';
$shape_id = $_POST['shape'];
  if (!isset($shape_id)) {
    $sql_diamond = mysqli_query($con,"SELECT * FROM `diamonds` WHERE `diamond_shape_id` = '2' AND diamond_status NOT IN ('Deleted', 'Invoiced') AND diamond_lot_no LIKE 'F%' AND diamond_type = 'Fancy'");
  } else {
    $sql_diamond = mysqli_query($con,"SELECT * FROM `diamonds` WHERE `diamond_shape_id` = '".$shape_id."' AND diamond_status NOT IN ('Deleted', 'Invoiced') AND diamond_lot_no LIKE 'F%' AND diamond_type = 'Fancy'");
  }
 while($row_diamond = mysqli_fetch_assoc($sql_diamond)){
     $row_office = mysqli_fetch_assoc(mysqli_query($con,"SELECT `office_name` FROM `offices` WHERE `office_id` = '".$row_diamond['office_id']."'"));
     $row_shape = mysqli_fetch_assoc(mysqli_query($con,"SELECT `attribute_name` FROM `attributes` WHERE `attribute_id` = '".$row_diamond['diamond_shape_id']."'"));
     $row_customer = mysqli_fetch_assoc(mysqli_query($con,"SELECT `company_name` FROM `users` WHERE `user_id` = '".$row_diamond['diamond_customer_id']."'"));
     $row_lab = mysqli_fetch_assoc(mysqli_query($con,"SELECT `attribute_name` FROM `attributes` WHERE `attribute_id` = '".$row_diamond['diamond_lab_id']."'"));
     $row_clr = mysqli_fetch_assoc(mysqli_query($con,"SELECT `attribute_name` FROM `attributes` WHERE `attribute_id` = '".$row_diamond['diamond_clr_id']."'"));
     $row_cla = mysqli_fetch_assoc(mysqli_query($con,"SELECT `attribute_name` FROM `attributes` WHERE `attribute_id` = '".$row_diamond['diamond_cla_id']."'"));
     $row_flr = mysqli_fetch_assoc(mysqli_query($con,"SELECT `attribute_name` FROM `attributes` WHERE `attribute_id` = '".$row_diamond['diamond_flr_id']."'"));
     $row_fcut = mysqli_fetch_assoc(mysqli_query($con,"SELECT `attribute_name` FROM `attributes` WHERE `attribute_id` = '".$row_diamond['diamond_fcut_id']."'"));
     $row_pol = mysqli_fetch_assoc(mysqli_query($con,"SELECT `attribute_name` FROM `attributes` WHERE `attribute_id` = '".$row_diamond['diamond_pol_id']."'"));
     $row_sym = mysqli_fetch_assoc(mysqli_query($con,"SELECT `attribute_name` FROM `attributes` WHERE `attribute_id` = '".$row_diamond['diamond_sym_id']."'"));
     if ($row_diamond['diamond_status'] == 'On Consignment') {
       echo "
       <tr style='font-size:16px; background-color: #F1C4C0;'>
         <td><input type='checkbox' id='exampleCheck1'></td>
         <td>".$row_diamond['diamond_lot_no']."</td>
         <td>".$row_office['office_name']."</td>
         <td>".$row_shape['attribute_name']."</td>
         <td>".$row_diamond['diamond_size']."</td>
         <td>".$row_lab['attribute_name']."</td>
         <td>".$row_diamond['diamond_cert']."</td>
         <td>".$row_clr['attribute_name']."</td>
         <td>".$row_cla['attribute_name']."</td>
         <td>".$row_flr['attribute_name']."</td>
         <td>".$row_fcut['attribute_name']."</td>
         <td>".$row_pol['attribute_name']."</td>
         <td>".$row_sym['attribute_name']."</td>
         <td>".$row_diamond['diamond_ins']."</td>
         <td>".$row_diamond['diamond_ains']."</td>
         <td>".$row_diamond['diamond_meas1'] .' X '. $row_diamond['diamond_meas2'] .' X '. $row_diamond['diamond_meas3']."</td>
         <td>".'$'. round($row_diamond['diamond_price_perct'],2)."</td>
         <td>".'$'. round($row_diamond['diamond_price_total'],2)."</td>
         <td>".'$'. round($row_diamond['diamond_price_perct_revaluated'],2) ."</td>
         <td>".'$'. round($row_diamond['diamond_price_total_revaluated'],2) ."</td>
         <td>".'$'. round($row_diamond['diamond_price_perct_final'],2) ."</td>
         <td>".'$'. round($row_diamond['diamond_price_total_final'],2) ."</td>
         <td>".'$'. round($row_diamond['diamond_price_perct_sell'],2) ."</td>
         <td>".'$'. round($row_diamond['diamond_price_sell'],2) ."</td>
         <td>".$row_diamond['diamond_status'] ."</td>
         <td>".$row_diamond['diamond_status_front'] ."</td>
         ";
         echo "<td>".date('d/m/Y',strtotime($row_diamond['diamond_purchase_date']))."</td>";
         if ($row_diamond['diamond_party_name'] == ''){
           echo "<td>Not available</td>";
         }else{
           echo "<td>".$row_diamond['diamond_party_name']."</td>";
         }
         echo"</tr>";
     } else if ($row_diamond['diamond_status'] == 'InTranist') {
       echo "
       <tr style='font-size:16px; background-color: #F9E79F;' class='text-center'>
       <td><input type='checkbox' id='exampleCheck1'></td>
       <td>".$row_diamond['diamond_lot_no']."</td>
       <td>".$row_office['office_name']."</td>
       <td>".$row_shape['attribute_name']."</td>
       <td>".$row_diamond['diamond_size']."</td>
       <td>".$row_lab['attribute_name']."</td>
       <td>".$row_diamond['diamond_cert']."</td>
       <td>".$row_clr['attribute_name']."</td>
       <td>".$row_cla['attribute_name']."</td>
       <td>".$row_flr['attribute_name']."</td>
       <td>".$row_fcut['attribute_name']."</td>
       <td>".$row_pol['attribute_name']."</td>
       <td>".$row_sym['attribute_name']."</td>
       <td>".$row_diamond['diamond_ins']."</td>
       <td>".$row_diamond['diamond_ains']."</td>
       <td>".$row_diamond['diamond_meas1'] .' X '. $row_diamond['diamond_meas2'] .' X '. $row_diamond['diamond_meas3']."</td>
       <td>".'$'. round($row_diamond['diamond_price_perct'],2)."</td>
       <td>".'$'. round($row_diamond['diamond_price_total'],2)."</td>
       <td>".'$'. round($row_diamond['diamond_price_perct_revaluated'],2) ."</td>
       <td>".'$'. round($row_diamond['diamond_price_total_revaluated'],2) ."</td>
       <td>".'$'. round($row_diamond['diamond_price_perct_final'],2) ."</td>
       <td>".'$'. round($row_diamond['diamond_price_total_final'],2) ."</td>
       <td>".'$'. round($row_diamond['diamond_price_perct_sell'],2) ."</td>
       <td>".'$'. round($row_diamond['diamond_price_sell'],2) ."</td>
       <td>".$row_diamond['diamond_status'] ."</td>
       <td>".$row_diamond['diamond_status_front'] ."</td>
       ";
       echo "<td>".date('d/m/Y',strtotime($row_diamond['diamond_purchase_date']))."</td>";
       if ($row_diamond['diamond_party_name'] == ''){
         echo "<td>Not available</td>";
       }else{
         echo "<td>".$row_diamond['diamond_party_name']."</td>";
       }
       echo"</tr>";
     } else if ($row_diamond['diamond_status'] == 'In Transfer Process') {
       echo "
       <tr style='font-size:16px; background-color: #A9DFBF;' class='text-center'>
       <td><input type='checkbox' id='exampleCheck1'></td>
       <td>".$row_diamond['diamond_lot_no']."</td>
       <td>".$row_office['office_name']."</td>
       <td>".$row_shape['attribute_name']."</td>
       <td>".$row_diamond['diamond_size']."</td>
       <td>".$row_lab['attribute_name']."</td>
       <td>".$row_diamond['diamond_cert']."</td>
       <td>".$row_clr['attribute_name']."</td>
       <td>".$row_cla['attribute_name']."</td>
       <td>".$row_flr['attribute_name']."</td>
       <td>".$row_fcut['attribute_name']."</td>
       <td>".$row_pol['attribute_name']."</td>
       <td>".$row_sym['attribute_name']."</td>
       <td>".$row_diamond['diamond_ins']."</td>
       <td>".$row_diamond['diamond_ains']."</td>
       <td>".$row_diamond['diamond_meas1'] .' X '. $row_diamond['diamond_meas2'] .' X '. $row_diamond['diamond_meas3']."</td>
       <td>".'$'. round($row_diamond['diamond_price_perct'],2)."</td>
       <td>".'$'. round($row_diamond['diamond_price_total'],2)."</td>
       <td>".'$'. round($row_diamond['diamond_price_perct_revaluated'],2) ."</td>
       <td>".'$'. round($row_diamond['diamond_price_total_revaluated'],2) ."</td>
       <td>".'$'. round($row_diamond['diamond_price_perct_final'],2) ."</td>
       <td>".'$'. round($row_diamond['diamond_price_total_final'],2) ."</td>
       <td>".'$'. round($row_diamond['diamond_price_perct_sell'],2) ."</td>
       <td>".'$'. round($row_diamond['diamond_price_sell'],2) ."</td>
       <td>".$row_diamond['diamond_status'] ."</td>
       <td>".$row_diamond['diamond_status_front'] ."</td>
       ";
       echo "<td>".date('d/m/Y',strtotime($row_diamond['diamond_purchase_date']))."</td>";
       if ($row_diamond['diamond_party_name'] == ''){
         echo "<td>Not available</td>";
       }else{
         echo "<td>".$row_diamond['diamond_party_name']."</td>";
       }
       echo"</tr>";
     } else if ($row_diamond['diamond_status'] == 'Available') {
       echo "
       <tr style='font-size:16px;' class='text-center'>
       <td><input type='checkbox' id='exampleCheck1'></td>
       <td>".$row_diamond['diamond_lot_no']."</td>
       <td>".$row_office['office_name']."</td>
       <td>".$row_shape['attribute_name']."</td>
       <td>".$row_diamond['diamond_size']."</td>
       <td>".$row_lab['attribute_name']."</td>
       <td>".$row_diamond['diamond_cert']."</td>
       <td>".$row_clr['attribute_name']."</td>
       <td>".$row_cla['attribute_name']."</td>
       <td>".$row_flr['attribute_name']."</td>
       <td>".$row_fcut['attribute_name']."</td>
       <td>".$row_pol['attribute_name']."</td>
       <td>".$row_sym['attribute_name']."</td>
       <td>".$row_diamond['diamond_ins']."</td>
       <td>".$row_diamond['diamond_ains']."</td>
       <td>".$row_diamond['diamond_meas1'] .' X '. $row_diamond['diamond_meas2'] .' X '. $row_diamond['diamond_meas3']."</td>
       <td>".'$'. round($row_diamond['diamond_price_perct'],2)."</td>
       <td>".'$'. round($row_diamond['diamond_price_total'],2)."</td>
       <td>".'$'. round($row_diamond['diamond_price_perct_revaluated'],2) ."</td>
       <td>".'$'. round($row_diamond['diamond_price_total_revaluated'],2) ."</td>
       <td>".'$'. round($row_diamond['diamond_price_perct_final'],2) ."</td>
       <td>".'$'. round($row_diamond['diamond_price_total_final'],2) ."</td>
       <td>".'$'. round($row_diamond['diamond_price_perct_sell'],2) ."</td>
       <td>".'$'. round($row_diamond['diamond_price_sell'],2) ."</td>
       <td>".$row_diamond['diamond_status'] ."</td>
       <td>".$row_diamond['diamond_status_front'] ."</td>
       ";
       echo "<td>".date('d/m/Y',strtotime($row_diamond['diamond_purchase_date']))."</td>";
       if ($row_diamond['diamond_party_name'] == ''){
         echo "<td>Not available</td>";
       }else{
         echo "<td>".$row_diamond['diamond_party_name']."</td>";
       }
       echo"</tr>";
     } else if ($row_diamond['diamond_status'] == 'Reserve') {
       echo "
       <tr style='font-size:16px; background-color: #C4DBEA;' class='text-center'>
       <td><input type='checkbox' id='exampleCheck1'></td>
       <td>".$row_diamond['diamond_lot_no']."</td>
       <td>".$row_office['office_name']."</td>
       <td>".$row_shape['attribute_name']."</td>
       <td>".$row_diamond['diamond_size']."</td>
       <td>".$row_lab['attribute_name']."</td>
       <td>".$row_diamond['diamond_cert']."</td>
       <td>".$row_clr['attribute_name']."</td>
       <td>".$row_cla['attribute_name']."</td>
       <td>".$row_flr['attribute_name']."</td>
       <td>".$row_fcut['attribute_name']."</td>
       <td>".$row_pol['attribute_name']."</td>
       <td>".$row_sym['attribute_name']."</td>
       <td>".$row_diamond['diamond_ins']."</td>
       <td>".$row_diamond['diamond_ains']."</td>
       <td>".$row_diamond['diamond_meas1'] .' X '. $row_diamond['diamond_meas2'] .' X '. $row_diamond['diamond_meas3']."</td>
       <td>".'$'. round($row_diamond['diamond_price_perct'],2)."</td>
       <td>".'$'. round($row_diamond['diamond_price_total'],2)."</td>
       <td>".'$'. round($row_diamond['diamond_price_perct_revaluated'],2) ."</td>
       <td>".'$'. round($row_diamond['diamond_price_total_revaluated'],2) ."</td>
       <td>".'$'. round($row_diamond['diamond_price_perct_final'],2) ."</td>
       <td>".'$'. round($row_diamond['diamond_price_total_final'],2) ."</td>
       <td>".'$'. round($row_diamond['diamond_price_perct_sell'],2) ."</td>
       <td>".'$'. round($row_diamond['diamond_price_sell'],2) ."</td>
       <td>".$row_diamond['diamond_status'] ."</td>
       <td>".$row_diamond['diamond_status_front'] ."</td>
       ";
       echo "<td>".date('d/m/Y',strtotime($row_diamond['diamond_purchase_date']))."</td>";
       if ($row_diamond['diamond_party_name'] == ''){
         echo "<td>Not available</td>";
       }else{
         echo "<td>".$row_diamond['diamond_party_name']."</td>";
       }
       echo"</tr>";
     } else {
       echo "
       <tr style='font-size:16px;' class='text-center'>
       <td><input type='checkbox' id='exampleCheck1'></td>
       <td>".$row_diamond['diamond_lot_no']."</td>
       <td>".$row_office['office_name']."</td>
       <td>".$row_shape['attribute_name']."</td>
       <td>".$row_diamond['diamond_size']."</td>
       <td>".$row_lab['attribute_name']."</td>
       <td>".$row_diamond['diamond_cert']."</td>
       <td>".$row_clr['attribute_name']."</td>
       <td>".$row_cla['attribute_name']."</td>
       <td>".$row_flr['attribute_name']."</td>
       <td>".$row_fcut['attribute_name']."</td>
       <td>".$row_pol['attribute_name']."</td>
       <td>".$row_sym['attribute_name']."</td>
       <td>".$row_diamond['diamond_ins']."</td>
       <td>".$row_diamond['diamond_ains']."</td>
       <td>".$row_diamond['diamond_meas1'] .' X '. $row_diamond['diamond_meas2'] .' X '. $row_diamond['diamond_meas3']."</td>
       <td>".'$'. round($row_diamond['diamond_price_perct'],2)."</td>
       <td>".'$'. round($row_diamond['diamond_price_total'],2)."</td>
       <td>".'$'. round($row_diamond['diamond_price_perct_revaluated'],2) ."</td>
       <td>".'$'. round($row_diamond['diamond_price_total_revaluated'],2) ."</td>
       <td>".'$'. round($row_diamond['diamond_price_perct_final'],2) ."</td>
       <td>".'$'. round($row_diamond['diamond_price_total_final'],2) ."</td>
       <td>".'$'. round($row_diamond['diamond_price_perct_sell'],2) ."</td>
       <td>".'$'. round($row_diamond['diamond_price_sell'],2) ."</td>
       <td>".$row_diamond['diamond_status'] ."</td>
       <td>".$row_diamond['diamond_status_front'] ."</td>
       ";
       echo "<td>".date('d/m/Y',strtotime($row_diamond['diamond_purchase_date']))."</td>";
       if ($row_diamond['diamond_party_name'] == ''){
         echo "<td>Not available</td>";
       }else{
         echo "<td>".$row_diamond['diamond_party_name']."</td>";
       }
       echo"</tr>";
     }

 }
