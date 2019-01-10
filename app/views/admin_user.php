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
			<h1>User</h1>
		</div>
		<div class="col-lg-6 mt-5 mb-5">
			<small>search </small><i class="fas fa-search"></i>
			<input type="text" id="ordersearch" class="form-control">
		</div>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>First Name</th>
						<th>Last name</th>
						<th>Email Address</th>
						<th>Address</th>
						
					</tr>
				</thead>



				<tbody id="test1">
					<?php 

					$sql = "SELECT * FROM tbl_users";

					$result = mysqli_query($conn,$sql);

                        if(mysqli_num_rows($result) > 0){
                            while ($row = mysqli_fetch_assoc($result)) {
                            	
                            	$fname = $row['fname'];
                            	$lname = $row['lname'];
                            	$email = $row['email'];
                            	$address = $row['address'];
                            	

					?>


					<tr>
						<td class=""><?=$fname?></td>
						<td class=""><?=$lname?></td>
						<td class=""><?=$email?></td>
						<td class=""><?=$address?></td>
						

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


	
</script>