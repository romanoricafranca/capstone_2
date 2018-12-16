
<nav class="navbar navbar-expand-lg navbar-light fixed-top " style="background: #7C98B3";>
	  <a class="navbar-brand" href="../views/index.php" style="font-family: 'Freckle Face', cursive; text-shadow: 5px 5px 30px #262626";><i class="fas fa-tshirt"></i> Shirt Tee's</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>





	  <div class="collapse navbar-collapse"  id="navbarSupportedContent">
	    <ul class="navbar-nav ml-auto huhu" text-shadow: 5px 5px 30px #262626";>
	      <li class="nav-item ">
	        <a class="nav-link" href="../views/index.php#test">Catalog<span class="sr-only"></span></a>
	      </li>
	      <li class="nav-item" id="notification">
	        <a class="nav-link" href="#"><i class='fas fa-shopping-cart'></i>Cart <span class="badge bg-danger" id="notif"><?php error_reporting(0); echo $_SESSION["item_count"]; ?></span></a>
	      </li>
	      <li class="nav-item ">
	        <a class="nav-link" href="#">About Us </a>
	      </li>
	     
	        <?php 

	      	if (isset($_SESSION['email'])) {
	      		echo " <li class='nav-item dropdown bg-dark'>
				        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
				          My Account
				        </a>
				        <div class='dropdown-menu bg-dark ' aria-labelledby='navbarDropdown'>
				          <a class='dropdown-item text-light' href='#'>My Orders</a>
				          <a class='dropdown-item text-light' href='#'>Edit Profile</a>
				          <div class='dropdown-divider'></div>
				          <a class='dropdown-item text-light bg' href='../views/logout.php'>Logout</a> 
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
