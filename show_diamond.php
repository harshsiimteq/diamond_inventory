<?php while($diamonds =  mysqli_fetch_assoc($diamondResult)){
    $office_array = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `office_name` from offices WHERE `office_id` = '".$diamonds['office_id']."'"));
    $shape_array = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `attribute_name` as `shape` from attributes WHERE `attribute_id` = '".$diamonds['diamond_shape_id']."'"));
    $lab_array = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `attribute_name` as `lab` from attributes WHERE `attribute_id` = '".$diamonds['diamond_lab_id']."'"));
    $clr_array = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `attribute_name` as `clr` from attributes WHERE `attribute_id` = '".$diamonds['diamond_clr_id']."'"));
    $cla_array = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `attribute_name` as `cla` from attributes WHERE `attribute_id` = '".$diamonds['diamond_cla_id']."'"));
    $flr_array = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `attribute_name` as `flr` from attributes WHERE `attribute_id` = '".$diamonds['diamond_flr_id']."'"));
    $fcut_array = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `attribute_name` as `fcut` from attributes WHERE `attribute_id` = '".$diamonds['diamond_fcut_id']."'"));
    $pol_array = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `attribute_name` as `pol` from attributes WHERE `attribute_id` = '".$diamonds['diamond_pol_id']."'"));
    $sym_array = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `attribute_name` as `sym` from attributes WHERE `attribute_id` = '".$diamonds['diamond_sym_id']."'"));
    $company_array = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `company_name` from users WHERE `user_id` = '".$diamonds['diamond_customer_id']."'"));
 ?>
<tr>
<td><?php echo $diamonds['diamond_lot_no'];?></td>
<td><?=$office_array['office_name']?></td>
<td><?=$shape_array['shape']?></td>
<td><?=$diamonds['diamond_size']?></td>
<td><?=$lab_array['lab']?></td>
<td><?=$diamonds['diamond_cert']?></td>
<td><?=$clr_array['clr']?></td>
<td><?=$cla_array['cla']?></td>
<td><?=$flr_array['flr']?></td>
<td><?=$fcut_array['fcut']?></td>
<td><?=$pol_array['pol']?></td>
<td><?=$sym_array['sym']?></td>
<td><?=$diamonds['diamond_ins']?></td>
<td><?=$diamonds['diamond_ains']?></td>
<td><?=$diamonds['diamond_meas1']?> X <?=$diamonds['diamond_meas2']?> X <?=$diamonds['diamond_meas3']?></td>
<td><?="$".round($diamonds['diamond_price_rapnet'],2)?></td>
<td><?=round($diamonds['diamond_discount'],2). "%" ?></td>
<td><?="$".round($diamonds['diamond_price_perct'],2)?></td>
<td><?="$".round($diamonds['diamond_price_total'],2)?></td>
<td><?=round($diamonds['diamond_discount_revaluated'],2)."%" ?></td>
<td><?="$".round($diamonds['diamond_price_perct_revaluated'],2)?></td>
<td><?="$".round($diamonds['diamond_price_total_revaluated'],2)?></td>
<td><?="$".round($diamonds['diamond_price_rapnet_final'],2)?></td>
<td><?=round($diamonds['diamond_discount_final'],2)."%" ?></td>
<td><?="$".round($diamonds['diamond_price_perct_final'],2)?></td>
<td><?="$".round($diamonds['diamond_price_total_final'],2)?></td>
<td><?=round($diamonds['diamond_discount_sell'],2)."%" ?></td>
<td><?="$".round($diamonds['diamond_price_perct_sell'],2)?></td>
<td><?="$".round($diamonds['diamond_price_sell'],2)?></td>
<td><?=$diamonds['diamond_status']?></td>
<td><?=$company_array['company_name']?></td>
<td><?=$diamonds['diamond_status_front']?></td>
<td><?php
if($diamonds['diamond_show_rapnet'])
  echo "Show";
?>
</td>
<td><?=date('d/m/Y',strtotime($diamonds['diamond_purchase_date'])) ?></td>
<td><?=$diamonds['diamond_party_name']?></td>
<td><?=$diamonds['diamond_approval_no']?></td>
<td></td>
</tr>
<?php  }?>
