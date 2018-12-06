<?php require_once "../partials/header.php"; ?>
<?php require_once "../partials/navbar.php"; ?>



<div class="container">
		<div class="row">
			<div class="col-lg-6 offset-lg-3">
				<div class="card mb-5">
					<div class="card-header">Registration Form</div>
					<div class="card-body">
						<form action="../controllers/process_register.php" method="POST">
							<div class="form-group">
								<label>Lastname</label>
								<input type="text" name="lname" class="form-control" id="lname">
							</div>
							<div class="form-group">
								<label>Firstname</label>
								<input type="text" name="fname" class="form-control" id="fname">
							</div>


							<div class="form-group">
								<label>Email Address</label>
								<input type="text" name="email" id="email" class="form-control">
								<p id="result" class="lead mt-2"></p>
							</div>

							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control">
							</div>

							<div class="form-group">
								<label>Confirm Password</label>
								<input type="password" name="cpassword" class="form-control">
							</div>


							<div class="form-group">
								<label>Address</label>
								<textarea type="text" name="address" class="form-control"></textarea>
							</div>

							

							<input class="btn btn-outline-success" type="submit" value="SUBMIT">

							

							<input class="btn btn-outline-warning" type="reset" name="">

						</form>
					</div>
				</div>
			</div>
		</div> 
	</div>

<?php require_once "../partials/footer.php"; ?>

<script type="text/javascript">
	

	$(document).ready(() =>{

	// BLANK VALIDATIONS --------------------------------------------------
	$("#id_fname").focusout(()=>{

		let fname = $('#id_fname').val();
		
		if (fname == "") {
			$('#testclick').attr('disabled', true);
			$('#error_fname').addClass("red-text");
			$('#error_fname').html("Needs Firstname!");
		}
		else{
			$('#testclick').attr('disabled', false);
			$('#error_fname').removeClass("red-text");
			$('#error_fname').html("");
		}

	});

	$("#id_lname").focusout(()=>{

		let lname = $('#id_lname').val();
		
		if (lname == "") {
			$('#testclick').attr('disabled', true);
			$('#error_lname').addClass("red-text");
			$('#error_lname').html("Needs Lastname!");
		}
		else{
			$('#testclick').attr('disabled', false);
			$('#error_lname').removeClass("red-text");
			$('#error_lname').html("");
		}

	});

	$("#id_email").focusout(()=>{

		let email = $('#id_email').val();
		let emaillen = $('#id_email').val().length;
		
		if (email == "") {
			$('#testclick').attr('disabled', true);
			$('#error_email').addClass("red-text");
			$('#error_email').html("Needs Email!");
		}
		else{
			$('#testclick').attr('disabled', false);
			$('#error_lname').removeClass("red-text");
			$('#error_lname').html("");
		}
	});

	$("#id_pass").focusout(()=>{

		let pass = $('#id_pass').val();
		let passlen = $('#id_pass').val().length;
		
		if (pass == "") {
			$('#testclick').attr('disabled', true);
			$('#error_pass').addClass("red-text");
			$('#error_pass').html("Needs Password!");
		}
		else{
			if (passlen < 8) {
				$('#testclick').attr('disabled', true);
				$('#error_pass').addClass("red-text");
				$('#error_pass').html("Must be 8 characters!");
			}
			else{
				$('#testclick').attr('disabled', false);
				$('#error_pass').removeClass("red-text");
				$('#error_pass').html("");
			}
		}

	});

	$("#id_cpass").focusout(()=>{

		let cpass = $('#id_cpass').val();
		let pass = $('#id_pass').val();
		
		if (cpass == "") {
			$('#testclick').attr('disabled', true);
			$('#error_cpass').addClass("red-text");
			$('#error_cpass').html("Needs Confirm Password!");
		}
		else{
			if (pass != cpass) {
				$('#testclick').attr('disabled', true);
				$('#error_cpass').addClass("red-text");
				$('#error_cpass').html("Must be same with Password!");
			}
			else{
				$('#testclick').attr('disabled', false);
				$('#error_cpass').removeClass("red-text");
				$('#error_cpass').html("");
			}
		}

	});
	// END OF BLANK VALIDATIONS --------------------------------
	
	$("#testclick").click(()=>{

		let fname = $('#id_fname').val();
		let lname = $('#id_lname').val();
		let email = $('#id_email').val();
		let pass = $('#id_pass').val();
		let cpass = $('#id_cpass').val();
		
		if (fname || lname || email || pass || cpass == "") {
			$('#testclick').attr('disabled', true);
			$('#error_fname').addClass("red-text");
			$('#error_fname').html("Needs Firstname!");

			$('#error_lname').addClass("red-text");
			$('#error_lname').html("Needs Lastname!");

			$('#error_email').addClass("red-text");
			$('#error_email').html("Needs Email!");

			$('#error_pass').addClass("red-text");
			$('#error_pass').html("Needs Password!");

			$('#error_cpass').addClass("red-text");
			$('#error_cpass').html("Needs Confirm Password!");
		}

	});

	});



	$("#email").keyup(function(){

		let email = $(this).val();
	   console.log(email);

		$.post("../controllers/email_validation.php", {email:email}, function(data){
		
			$("#result").html(data);
			
		})
	});

</script>