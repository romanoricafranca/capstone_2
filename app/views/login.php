<?php require_once "../partials/header.php"; ?>
<?php require_once "../partials/navbar.php"; ?>

<?php 
        if ($_SESSION['email'] == "ricafrancaromano@gmail.com") {
            header("Location: ../views/trans_history.php");
        }

?>


<div class="container mt-5 mb-5">
	<div class="row">
	    <hr class="my-5 col-lg-12 " id="test">
	    <div class="col-lg-4 offset-lg-4">		
            <!-- <form action="../controllers/process_login.php" method="POST"> -->
                <div class="form-group">
					<label>Email Address</label>
					<input type="text" name="email" id="email" class="form-control">
					<small id="error_log_email"></small>
					<!-- <p id="result" class="lead mt-2"></p> -->
				</div>	

                <div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" id="pass">
					<small id="error_log_pass"></small>
				</div>
				<p id="error_message"></p>
				<div class="col-lg-6 offset-lg-4">
                    <button id="login" class="btn btn-outline-dark" style="border-radius: 50px;">Log-in</button>
                </div>
           <!-- </form> -->
        </div>
	</div> 
</div>

<?php require_once "../partials/footer.php"; ?>

<script type="text/javascript">
	$("button#login").click(()=>{

		let email = $('#email').val();
		let pass = $('#pass').val();

		console.log(email);
		console.log(pass);
		
		if (email == "" || pass  == "") {

			$('#login').attr('disabled', true);
			$('#error_log_email').css('color', 'green');
			$('#error_log_email').css('color', 'red');
			$('#error_log_email').html("Needs Email!");

			$('#error_log_pass').css('color', 'red');
			$('#error_log_pass').html("Needs Password!");

		}

		else{

			$.post('../controllers/process_login.php', {email:email, pass:pass}, function(data){

        	if (data == 1) {
        		document.location.href = 'trans_history.php';
        	}
        	if (data == 2) {
        		document.location.href = 'index.php';
        	}
        	if (data == 3) {
        		$('#error_log_pass').css('color', 'red');
				$('#error_log_pass').html("Either email or password is incorrect!");
				$('#pass').val("");
        	}
            
        	});
		}

	});

	$('#pass').keydown(function(event){ 
	    var keyCode = (event.keyCode ? event.keyCode : event.which);   
	    if (keyCode == 13) {
	        $('button#login').trigger('click');
	    }
	});
</script>