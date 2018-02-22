<!DOCTYPE html>
<?php include 'conn.php'; ?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Diamond | Certified</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<!-- Navigation starts here -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Diamond Inventory</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Certified <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="blackIndex.php">Black</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="fancyIndex.php">Fancy</a>
      </li>
			<li class="nav-item">
        <a class="nav-link" href="matchingPairIndex.php">Matching Pair</a>
      </li>
    </ul>
  </div>
</nav>
<!-- Navigation ends here -->


<?php $status = mysqli_query($con,"SELECT diamond_status, sum(diamond_size) AS Carat,count(diamond_shape_id) AS Count FROM diamonds WHERE `diamond_type` = 'Certified'
        AND `diamond_lot_no` LIKE 'C%' AND diamond_status NOT IN ('Deleted', 'Invoiced') GROUP BY diamond_status");

				$certifiedStatus = mysqli_query($con, "SELECT ROUND(SUM(diamond_price_total), 2) AS 'Original_price', ROUND(SUM(diamond_price_total_revaluated),2) AS 'Revaluated_price', ROUND(SUM(diamond_price_total_final),2) AS 'Final_price', ROUND(SUM(diamond_price_sell),2) AS 'Selling_price', ROUND(SUM(diamond_size),2) AS 'Certified_Carat', COUNT(diamond_shape_id) AS 'Certified_Diamonds'
				FROM diamonds WHERE diamond_type = 'Certified' AND diamond_lot_no LIKE 'C%' AND `diamond_status` NOT IN ('Invoiced' , 'Deleted');");
				$tempCertifiedStatus = mysqli_query($con, "SELECT ROUND(SUM(diamond_price_total), 2) AS 'Original_price', ROUND(SUM(diamond_price_total_revaluated),2) AS 'Revaluated_price', ROUND(SUM(diamond_price_total_final),2) AS 'Final_price', ROUND(SUM(diamond_price_sell),2) AS 'Selling_price', ROUND(SUM(diamond_size),2) AS 'Temp_Carat', COUNT(diamond_shape_id) AS 'Temp_Diamonds'
				FROM diamonds WHERE diamond_type = 'TempCertified' AND diamond_lot_no LIKE 'T%' AND `diamond_status` NOT IN ('Invoiced' , 'Deleted');");
	$certifiedStatusResult = mysqli_fetch_assoc($certifiedStatus);
	$tempStatusResult = mysqli_fetch_assoc($tempCertifiedStatus);
				?>
 <div class="container">
	 <div class="row">
		 <div class="col-md-8">
			 <h1 class="display-5" style="margin-top:2%;">Certified <small>diamonds</small></h1>
			 <input type="text" id="search_table" class="form-control" name="search_table" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Search Inventory" style="margin-bottom: 2%;">
		 </div>
	 	<div class="col-md-4">

					<ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top: 5%;">
		  <li class="nav-item">
		    <a class="nav-link active" id="status-tab" data-toggle="tab" href="#status" role="tab" aria-controls="status" aria-selected="true">Status</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" id="certified-tab" data-toggle="tab" href="#certified" role="tab" aria-controls="certified" aria-selected="false">Certified</a>
		  </li>
		</ul>
		<div class="tab-content" id="myTabContent">
		  <div class="tab-pane fade show active" id="status" role="tabpanel" aria-labelledby="status-tab">
				<table class="table">
				 <thead>
					 <th>Status</th>
					 <th>Count</th>
					 <th>Carat</th>
				 </thead>
				 <tbody>
				<?php while($status_count = mysqli_fetch_assoc($status)): ?>
					<?php if ($status_count['diamond_status'] == 'On Consignment'): ?>
						<tr style="background-color: #F1C4C0;">
						 <td><a href="#"><?= $status_count['diamond_status'] ?></a></td>
						 <td><?= $status_count['Count'] ?></td>
						 <td><?= $status_count['Carat'] ?></td>
					 </tr>
				 <?php elseif($status_count['diamond_status'] == 'In Transfer Process'): ?>
					 <tr style="background-color: #A9DFBF;">
						<td><a href="#"><?= $status_count['diamond_status'] ?></a></td>
						<td><?= $status_count['Count'] ?></td>
						<td><?= $status_count['Carat'] ?></td>
					</tr>
				<?php elseif($status_count['diamond_status'] == 'Reserve'): ?>
				 <tr style="background-color: #C4DBEA;">
					<td><a href="#"><?= $status_count['diamond_status'] ?></a></td>
					<td><?= $status_count['Count'] ?></td>
					<td><?= $status_count['Carat'] ?></td>
				</tr>
			<?php elseif($status_count['diamond_status'] == 'InTranist'): ?>
			 <tr style="background-color: #F9E79F;">
				<td><a href="#"><?= $status_count['diamond_status'] ?></a></td>
				<td><?= $status_count['Count'] ?></td>
				<td><?= $status_count['Carat'] ?></td>
			</tr>
		<?php elseif($status_count['diamond_status'] == 'Available'): ?>
		 <tr>
			<td><a href="#"><?= $status_count['diamond_status'] ?></a></td>
			<td><?= $status_count['Count'] ?></td>
			<td><?= $status_count['Carat'] ?></td>
		</tr>
				<?php endif;?>
				 <?php endwhile; ?>
				 </tbody>
				</table>
		  </div>
		  <div class="tab-pane fade" id="certified" role="tabpanel" aria-labelledby="certified-tab">
				<table class="table">
					<thead>
						<th>Desc / Type</th>
						<th>Certified</th>
						<th>Temp.Cert.</th>
						<th>Total</th>
					</thead>
					<tbody>
						<tr>
							<th>Orig. Price</th>
							<td align="right">$<?=$certifiedStatusResult['Original_price']; ?></td>
							<td align="right">$<?=$tempStatusResult['Original_price']; ?></td>
							<td align="right">$<?=$certifiedStatusResult['Original_price'] + $tempStatusResult['Original_price']; ?></td>
						</tr>
						<tr>
							<th>Rev. Price</th>
							<td align="right">$<?=$certifiedStatusResult['Revaluated_price']; ?></td>
							<td align="right">$<?=$tempStatusResult['Revaluated_price']; ?></td>
							<td align="right">$<?=$certifiedStatusResult['Revaluated_price'] +$tempStatusResult['Revaluated_price'];  ?></td>
						</tr>
						<tr>
							<th>Fin. Price</th>
							<td align="right">$<?=$certifiedStatusResult['Final_price']; ?></td>
							<td align="right">$<?=$tempStatusResult['Final_price']; ?></td>
							<td align="right">$<?=$certifiedStatusResult['Final_price'] + $tempStatusResult['Final_price']; ?></td>
						</tr>
						<tr>
							<th>Sell. Price</th>
							<td align="right">$<?=$certifiedStatusResult['Selling_price']; ?></td>
							<td align="right">$<?=$tempStatusResult['Selling_price']; ?></td>
							<td align="right">$<?=$certifiedStatusResult['Selling_price'] + $tempStatusResult['Selling_price'];?></td>
						</tr>
						<tr>
							<th>Carat</th>
							<td align="right"><?=$certifiedStatusResult['Certified_Carat']; ?></td>
							<td align="right"><?=$tempStatusResult['Temp_Carat']; ?></td>
							<td align="right"><?=$certifiedStatusResult['Certified_Carat'] + $tempStatusResult['Temp_Carat']; ?></td>
						</tr>
						<tr>
							<th>Diamonds</th>
							<td align="right"><?=$certifiedStatusResult['Certified_Diamonds']; ?></td>
							<td align="right"><?=$tempStatusResult['Temp_Diamonds']; ?></td>
							<td align="right"><?=$certifiedStatusResult['Certified_Diamonds'] +$tempStatusResult['Temp_Diamonds'];  ?></td>
						</tr>
					</tbody>
				</table>
		  </div>

		</div>



	 	</div>
	 </div>


 </div>
 <div class="container">
 	  <form style="margin-top: 3%;">
 	    <div class="form-group">
 	      <div class="row">
 	        <div class="col-md-12">
 						<?php
 	  					$sql_shape = mysqli_query($con,"SELECT distinct(`attribute_label`),`attribute_id` FROM `attributes` WHERE `attribute_type` = 'Shape'");
 	 					?>
 						<?php while($row_shape = mysqli_fetch_assoc($sql_shape)): ?>
 							<?php //print_r($row_shape); ?>
 	            <?php
 	              $shape_count = mysqli_query($con, "SELECT COUNT(*) from `diamonds` WHERE `diamond_type` = 'Certified'
								        AND `diamond_lot_no` LIKE 'C%' AND `diamond_shape_id` = '".$row_shape['attribute_id']."' AND diamond_status NOT IN ('Returned', 'InvoicedRollOver', 'Archived', 'Deleted', 'Invoiced')");
 	              $row_count = mysqli_fetch_array($shape_count);
 	             ?>
							 <?php if ($row_count[0] != 0): ?>
								 <button type="button" id="<?= $row_shape['attribute_id'] ?>" value="<?= $row_shape['attribute_id'] ?>" name="button" class="btn btn-sm btn-outline-primary product" style="margin-bottom:1%;">
	 	               <?= $row_shape['attribute_label'] ." (".$row_count[0].")"?>
	 	             </button>
							 <?php endif; ?>

 	          <?php endwhile; ?>
 	        </div>
 	      </div>
 	    </div>
 	</form>

 </div>
		<table class="table table-bordered" id="searchtable">
  <thead class="thead-dark">
    <tr class="text-center">
				<th><input type='checkbox' id='exampleCheck1'></th>
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
  <tbody class="text-center" id="display">

  </tbody>
</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
$(window).load(function() {
        $.ajax({
          url: "diamonds.php",
          context: document.body,
          success: function(html){
             $("#display").html(html);
          }
        });
				$("#2").addClass('active');
      });

$(document).ready(function() {
$(".product").click(function()
	{
		 var id=$(this).val();
		 $('.product.active').removeClass('active');
		 $('#'+id).addClass('active');
		 var dataString = 'shape='+ id;
		 $.ajax
		 ({
			type: "POST",
			url: "diamonds.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				 $("#display").html(html);
			}
		 });
});
});
</script>
<script>
    $("#search_table").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#searchtable tbody tr"), function() {
        if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
          $(this).hide();
        else
          $(this).show();
        });
      });
</script>
</body>
</html>
