<?php require_once "../partials/header.php"; ?>
<?php require_once "../partials/navbar.php"; ?>
<?php require_once "../controllers/connect.php"; ?>
<?php 
if (!isset($_SESSION['email'])) {
			header("Location: ../views/index.php");
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
				<h3 class="text-center">Transaction code: </h3>
					<h1 class="text-center">
					<?php echo $_SESSION['trans']; ?>
					</h1>
					<h4 class="text-center">Thank You for Shopping!!!</h4>

					<a class="btn btn-primary shop_again" href="index.php">Shop again!!!</a>
					
				</div>	
			</div>
		</div>
	</div>
</div>



<?php require_once "../partials/footer.php"; ?>



