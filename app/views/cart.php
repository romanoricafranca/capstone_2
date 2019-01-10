<?php require_once "../partials/header.php"; ?>
<?php require_once "../partials/navbar.php"; ?>
<?php require_once "../controllers/connect.php"; ?>	
<?php 
        if ($_SESSION['email'] == "ricafrancaromano@gmail.com") {
            header("Location: ../views/trans_history.php");
        }

?>



<h2>My Cart</h2><hr>

<!-- <div class="container">
	<div class="row">
		<div class="col-lg-8 offset-lg-2"> -->
			
			<div id="loadcart">
	

			</div>
			
<!-- 		</div>

	</div>

</div> -->

<?php require_once "../partials/footer.php"; ?>