<?php require_once "../partials/header.php"; ?>
<?php require_once "../partials/navbar.php"; ?>

<div class="container mt-5 mb-5">
	<div class="row">
	    <hr class="my-5 col-lg-12 " id="test">
	    <div class="col-lg-4 offset-lg-4">
            <form action="../controllers/process_login.php" method="POST">
                <div class="form-group">
					<label>Email Address</label>
					<input type="text" name="email" id="email" class="form-control">
					<!-- <p id="error_email" style="color:red";></p> -->
					<!-- <p id="result" class="lead mt-2"></p> -->
				</div>	

                <div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" id="pass">
					<!-- <p id="error_pass" style="color:red";></p> -->
				</div>
				<div class="col-lg-6 offset-lg-4">
                    <input type="submit" class="btn btn-outline-dark" style="border-radius: 50px; value="Log-in">
                </div>
           </form>
        </div>
	</div> 
</div>

<?php require_once "../partials/footer.php"; ?>