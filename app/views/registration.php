<?php require_once "../partials/header.php"; ?>
<?php require_once "../partials/navbar.php"; ?>



<div class="container mt-5">
		<div class="row">
	    	<hr class="my-5 col-lg-12 " id="test">
			<div class="col-lg-6 offset-lg-3">
				<div class="card mb-5">
					<div class="card-header">Registration Form</div>
					<div class="card-body">
						<form action="../controllers/process_registration.php" method="POST">
							<div class="form-group">
								<label>Lastname</label>
								<input type="text" name="lname" class="form-control" id="lname">
								<p id="error_lname" style="color:red";></p>
							</div>
							<div class="form-group">
								<label>Firstname</label>
								<input type="text" name="fname" class="form-control" id="fname">
								<p id="error_fname" style="color:red";></p>
							</div>


							<div class="form-group">
								<label>Email Address</label>
								<input type="text" name="email" id="email" class="form-control">
								<p id="error_email" style="color:red";></p>
								<!-- <p id="result" class="lead mt-2"></p> -->
							</div>

							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control" id="pass">
								<p id="error_pass" style="color:red";></p>
							</div>

							<div class="form-group">
								<label>Confirm Password</label><span>*</span>
								<input type="password" name="cpass" class="form-control" id="cpass">
								<p id="error_cpass" style="color:red";></p>
							</div>


							<div class="form-group">
								<label>Address</label>
								<textarea type="text" name="address" class="form-control" id="address"></textarea>
								<p id="error_address" style="color:red";></p>
							</div>

							<div class="col-lg-6 offset-lg-4">
		                    	<input type="submit" class="btn btn-outline-dark" style="border-radius: 50px;" value="Register" id="testclick">
		               		</div>
							

						</form>
					</div>
				</div>
			</div>
		</div> 
	</div>

<?php require_once "../partials/footer.php"; ?>
