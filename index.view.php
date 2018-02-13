<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Diamond | Certified</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<table class="table table-bordered">
  <thead class="thead-dark">
    <tr class="text-center">
        <th>LOT NO #</th>
        <th>LOC</th>
        <th>SHAPE</th>
        <th>CARAT</th>
        <th>LAB</th>
        <th>CERTIFICATE</th>
        <th>CLR</th>
        <th>CLA</th>
        <th>FLR</th>
        <th>FCUT</th>
        <th>POL</th>
        <th>SYM</th>
        <th>INS</th>
        <th>AINS</th>
        <th>MEASUREMENT L*B*H</span></th>
        <th>ORIGINAL RAPNET</th>
        <th>ORGINAL DISCOUNT</th>
        <th>ORIGINAL P/C </th>
        <th>ORIGINAL TOTAL</th>
        <th>REVALUATED DISCOUNT</th>
        <th>REVALUATED P/C</th>
        <th>REVALUATED TOTAL</th>
        <th>FINAL RAPNET</th>
        <th>FINAL DISCOUNT</th>
        <th>FINAL P/C</th>
        <th>FINAL TOTAL</th>
        <th>SELLING DISCOUNT</th>
        <th>SELLING P/C PRICE</th>
        <th>SELLING TOTAL</th>
        <th>STATUS</th>
        <th>CUSTOMER</th>
        <th>FRONT VIEW</th>
        <th>RAPNET VIEW</th>
        <th>PURCHASE DATE (DD/MM/YYYY)</th>
        <th>PARTY</th>
        <th>APPROVAL NO</th>
        <th>APPROVAL DATE</th>
    </tr>
  </thead>
  <tbody class="text-center">
  	      <?php while($diamonds =  mysqli_fetch_assoc($diamondResult)){
              $office_name = mysqli_query($conn, "SELECT `office_name` from offices WHERE `office_id` = '".$diamonds['office_id']."'");
              $office_array = mysqli_fetch_assoc($office_name);
              $shape_name = mysqli_query($conn, "SELECT `attribute_name` as `shape` from attributes WHERE `attribute_id` = '".$diamonds['diamond_shape_id']."'");
              $shape_array = mysqli_fetch_assoc($shape_name);
              $lab_name = mysqli_query($conn, "SELECT `attribute_name` as `lab` from attributes WHERE `attribute_id` = '".$diamonds['diamond_lab_id']."'");
              $lab_array = mysqli_fetch_assoc($lab_name);
              $clr_name = mysqli_query($conn, "SELECT `attribute_name` as `clr` from attributes WHERE `attribute_id` = '".$diamonds['diamond_clr_id']."'");
              $clr_array = mysqli_fetch_assoc($clr_name);
              $cla_name = mysqli_query($conn, "SELECT `attribute_name` as `cla` from attributes WHERE `attribute_id` = '".$diamonds['diamond_cla_id']."'");
              $cla_array = mysqli_fetch_assoc($cla_name);
              $flr_name = mysqli_query($conn, "SELECT `attribute_name` as `flr` from attributes WHERE `attribute_id` = '".$diamonds['diamond_flr_id']."'");
              $flr_array = mysqli_fetch_assoc($flr_name);
              $fcut_name = mysqli_query($conn, "SELECT `attribute_name` as `fcut` from attributes WHERE `attribute_id` = '".$diamonds['diamond_fcut_id']."'");
              $fcut_array = mysqli_fetch_assoc($fcut_name);
              $pol_name = mysqli_query($conn, "SELECT `attribute_name` as `pol` from attributes WHERE `attribute_id` = '".$diamonds['diamond_pol_id']."'");
              $pol_array = mysqli_fetch_assoc($pol_name);
              $sym_name = mysqli_query($conn, "SELECT `attribute_name` as `sym` from attributes WHERE `attribute_id` = '".$diamonds['diamond_sym_id']."'");
              $sym_array = mysqli_fetch_assoc($sym_name);
              $company_name = mysqli_query($conn, "SELECT `company_name` from users WHERE `user_id` = '".$diamonds['diamond_customer_id']."'");
              $company_array = mysqli_fetch_assoc($company_name);
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
  </tbody>
</table>
</body>
</html>