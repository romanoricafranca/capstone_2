<?php include "../partials/admin_header.php";?>
<?php include "../partials/admin_navbar.php";?>
<?php include "../controllers/connect.php";?>
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
						<td><button id="delitem" class="btn btn-danger" data-id='<?= $row['id'] ?>'>delete</button></td>

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


<script type="text/javascript">
	
		$('button#delitem').on("click",function(){
       let orderId = $(this).attr('data-id');

       console.log("orderId: " + orderId);
       $.post('../controllers/admin_delitem.php', {orderId:orderId}, function(data){
         alert("Item successfully deleted");
       	document.location.href = 'admin_edit.php';
       });

   });


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