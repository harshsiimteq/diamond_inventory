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
	<?php $started_at = microtime(true); ?>

<?php $status = mysqli_query($con,"SELECT diamond_status, sum(diamond_size) as Carat,count(*) as Count from diamonds where diamond_status NOT IN ('Returned', 'InvoicedRollOver', 'Archived', 'Deleted', 'Invoiced') group by diamond_status");
 ?>
 <div class="container">
	 <div class="row">
		 <div class="col-md-8">

		 </div>
	 	<div class="col-md-4">
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
	 </div>


 </div>
 <div class="container">
 	  <form style="margin-top: 3%;">
 	    <div class="form-group">
 	      <div class="row">
 	        <div class="col-md-12">
 						<?php
 	  					$sql_shape = mysqli_query($con,"SELECT distinct(`attribute_name`),`attribute_id` FROM `attributes` WHERE `attribute_type` = 'Shape'");
 	 					?>
 						<?php while($row_shape = mysqli_fetch_assoc($sql_shape)): ?>
 							<?php //print_r($row_shape); ?>
 	            <?php
 	              $shape_count = mysqli_query($con, "SELECT COUNT(*) from `diamonds` WHERE `diamond_shape_id` = '".$row_shape['attribute_id']."'");
 	              $row_count = mysqli_fetch_array($shape_count);
 	             ?>
 	             <button type="button" value="<?= $row_shape['attribute_id'] ?>" name="button" class="btn btn-sm btn-primary product" style="margin-bottom:1%;">
 	               <?= $row_shape['attribute_name'] ." (".$row_count[0].")"?>
 	             </button>
 	          <?php endwhile; ?>
 	        </div>
 	      </div>
 	    </div>
 	</form>

 </div>
 <div class="container">
	 <div class="row">
		 <div class="col-md-4">
			 <input type="text" name="search_table" id="search_table" placeholder="Search Inventory" class="form-control" style="margin-bottom: 2%;" />
		 </div>
	 </div>
 </div>
		<table class="table table-bordered" id="searchtable">
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
  <tbody class="text-center" id="display">

  </tbody>
	<!-- <?php echo 'Cool, that only took ' . (microtime(true) - $started_at) . ' seconds!'; ?> -->
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
      });

$(document).ready(function() {
$(".product").click(function()
	{
		 var id=$(this).val();
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
