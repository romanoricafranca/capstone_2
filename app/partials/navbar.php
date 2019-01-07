
<nav class="navbar navbar-expand-lg navbar-light fixed-top " style="background: #7C98B3";>
	  <a class="navbar-brand" href="../views/index.php"><img src="../assets/image/logo/logo.png" width="150px" height="55px"></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>





	  <div class="collapse navbar-collapse"  id="navbarSupportedContent">
	    <ul class="navbar-nav ml-auto huhu" text-shadow: 5px 5px 30px #262626";>
	      <li class="nav-item ">
	        <a class="nav-link" href="../views/index.php#test">Catalog<span class="sr-only"></span></a>
	      </li>
	      <li class="nav-item" id="notification">

	        <a class="nav-link" href="cart.php"><i class='fas fa-shopping-cart'></i>Cart<span class="badge badge-danger" id="notif"><?php error_reporting(0);
	        
	        	echo $_SESSION['item_count'];
	        
	         ?></span></a>
	      </li>
	      <li class="nav-item ">
	        <a class="nav-link" href="../views/about.php">About Us </a>
	      </li>
	     
	        <?php 

	       	$sql = "SELECT * FROM tbl_users";
			$result = mysqli_query($con, $sql);

	      	if (isset($_SESSION['email'])) {
	      		
	      		echo " <li class='nav-item dropdown'>
				        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
				    		<span>$_SESSION[fname]</span>      
				        </a>
				        <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
				          <a class='dropdown-item' href='user_orders.php' >My Orders</a>
				          <a class='dropdown-item' href='edit_profile.php'>Edit Profile</a>
				          
				          <div class='dropdown-divider'></div>
				          <a class='dropdown-item' href='../controllers/logout.php'>Logout</a> 
				        </div>
				      </li>";
	      	}
	      	else
	      	{
	      		echo " <li class='nav-item'> <a class='nav-link' href ='../views/login.php'>Login</a></li>";
		       	echo "<li class='nav-item'>
		        <a class='nav-link' href='../views/registration.php'>Register</a>
		      </li>";
	      	}

	     	?>
	      
	    </ul>

	  </div>
	</nav>
