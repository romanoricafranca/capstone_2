<?php require_once "../partials/header.php"; ?>
<?php require_once "../partials/navbar.php"; ?>
<?php require_once "../controllers/connect.php"; ?>
<?php 
if (!isset($_SESSION['email'])) {
			header("Location: ../views/index.php");
		}



$users_id = $_SESSION['usersid'];
$sql = "SELECT * FROM tbl_orders WHERE id = (SELECT MAX(id) AS LastId FROM tbl_orders)";
$result = mysqli_query($conn,$sql);



?>

<?php 
        if ($_SESSION['email'] == "ricafrancaromano@gmail.com") {
            header("Location: ../views/trans_history.php");
        }

?>


<hr class="mt-5">	

<div class="container mt-5 mb-5">
	<div class="row">
	<div class="col-lg-2"></div>
		<div class="col-lg-8">
			<div class="card">
				<div class="card-header text-center">CONFIRMATION</div>		
				<div class="card-body">
				<h3 class="text-center">Transaction Reference: </h3>
		<?php if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				?>

					<h4 class="text-center">
						<?= $row["transaction_code"]?>
					</h4>



				
				<h3 class="text-center">Transaction Date: </h3>

					<h4 class="text-center">
						<?= $row["purchase_date"]?>
					</h4>

				<?php }} ?>



					<h1 class="text-center">Thank You for Shopping!!!</h1>

					<a class="btn btn-primary shop_again" href="index.php">Shop again!!!</a>
					
				</div>	
			</div>
		</div>
	</div>
</div>



<?php require_once "../partials/footer.php"; ?>



