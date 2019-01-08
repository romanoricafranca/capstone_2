<?php require_once "../partials/admin_header.php"; ?>
<?php require_once "../partials/admin_navbar.php"; ?>
<?php require_once "../controllers/connect.php"; ?>
<?php
if ($_SESSION['email'] != "ricafrancaromano@gmail.com") {
			header("Location: ../views/index.php");
		}
?>


<hr class="mt-5">
<div class="container mt-5">
	<div class="row">
		<div class="col-lg-8">
			<h1>Transaction Order</h1>
		</div>
		<div class="col-lg-6 mt-5 mb-5">
			<small>search </small><i class="fas fa-search"></i>
			<input type="text" id="ordersearch" class="form-control">
		</div>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Customer Name</th>
						<th>Date of purchase</th>
						<th>Payment Mode</th>
						<th>Status</th>
						<th></th>
						<th></th>
					</tr>
				</thead>



				<tbody id="test1">
					<?php 

					$sql = "SELECT tbl_orders.id, tbl_users.fname,tbl_users.lname, tbl_orders.purchase_date,tbl_payment_mode.mode_payment,tbl_status.name
					FROM (((tbl_orders
					INNER JOIN tbl_users ON tbl_orders.user_id = tbl_users.id)
					INNER JOIN tbl_payment_mode ON tbl_orders.payment_mode_id = tbl_payment_mode.id)
					INNER JOIN tbl_status ON tbl_orders.status_id = tbl_status.id)";

					$result = mysqli_query($conn,$sql);

                        if(mysqli_num_rows($result) > 0){
                            while ($row = mysqli_fetch_assoc($result)) {
                            	$order_id = $row['id'];
                            	$fname = $row['fname'];
                            	$lname = $row['lname'];
                            	$purchase_date = $row['purchase_date'];
                            	$payment = $row['mode_payment'];
                            	$status_name = $row['name'];

					?>


					<tr>
						<td class=""><?=$fname. " " .$lname?></td>
						<td class=""><?= $purchase_date?></td>
						<td class=""><?=$payment?></td>
						<td class=""><?=$status_name?></td>
						<td><button id="deliver_status" class="btn btn-primary" data-id='<?= $row['id'] ?>'><i class="fas fa-truck"></i></button></td>
            			<td><button id="cancel_status" class="btn btn-warning" data-id='<?= $row['id'] ?>'><i class="fas fa-ban"></i></button></td>

					</tr>

					<?php

						}}
					?>

				</tbody>
			</table>
		</div>
	</div>

</div>





<?php require_once "../partials/admin_footer.php"; ?>


<script type="text/javascript">
	
// search

$(document).ready(function(){
   $("#ordersearch").on("keyup", function() {
     var value = $(this).val().toLowerCase();
     $("#test1 tr").filter(function() {
       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
     });
   });
 });


// deliver and cancel`

	$('button#deliver_status').on("click",function(){
       let orderId = $(this).attr('data-id');

       console.log("orderId: " + orderId);
       $.post('../controllers/admin_deliver.php', {orderId:orderId}, function(data){
         alert("Status successfully changed to 'Delivered' ");
       	document.location.href = 'trans_history.php';
       });

   });

   $('button#cancel_status').on("click",function(){
       let orderId = $(this).attr('data-id');

       console.log("orderId: " + orderId);
       $.post('../controllers/admin_cancel.php', {orderId:orderId}, function(data){
         alert("Status successfully changed to 'Cancelled' ");
       	document.location.href = 'trans_history.php';
       });
   });


</script>