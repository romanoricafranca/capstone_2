<?php include "../partials/admin_header.php";?>
<?php include "../partials/admin_navbar.php";?>
<?php include "../controllers/connect.php";?>
<?php
if ($_SESSION['email'] != "ricafrancaromano@gmail.com") {
			header("Location: ../views/index.php");
		}
?>

<hr class="mt-5">
<div class="container mt-5">
	<div class="row">
		<div class="col-lg-8">
			<h1>Items List</h1>
		</div>
		<div class="col-lg-6 mt-5 mb-5">
			<small>search </small><i class="fas fa-search"></i>
			<input type="text" id="ordersearch" class="form-control">
		</div>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th class="">ItemName</th>
						<th class="">Price</th>
						<th class="">Description</th>
					</tr>
				</thead>



				<tbody id="test1">
					<?php 

					$sql = "SELECT * FROM tbl_items";
					
					
					$result = mysqli_query($conn,$sql);

                        if(mysqli_num_rows($result) > 0){
                            while ($row = mysqli_fetch_assoc($result)) {
                            	$name = $row['name'];
                            	$price = $row['price'];
                            	$description = $row['description'];

					?>


					<tr>
						<td class=""><?=$name?></td>
						<td class=""><?= $price?></td>
						<td class=""><?=$description?></td>
						<td><button id="saveitem" class="btn btn-info" data-id='<?= $row['id'] ?>'><i class="far fa-save"></i></button></td>

					</tr>

					<?php

						}}
					?>

				</tbody>
			</table>
		</div>
	</div>

</div>


<?php include "../partials/admin_footer.php";?>