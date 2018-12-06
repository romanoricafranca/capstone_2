
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
	  <a class="navbar-brand ml-5" href="index.php">Navbar</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse mr-5" id="navbarSupportedContent">
	    <ul class="navbar-nav ml-auto">
	      <li class="nav-item ">
	        <a class="nav-link" href="../views/catalog.php">Catalog<span class="sr-only"></span></a>
	      </li>
	      <li class="nav-item" id="notification">
	        <a class="nav-link" href="cart.php"><i class='fas fa-shopping-cart'></i>Cart <span class="badge bg-danger" id="notif"><?php error_reporting(0); echo $_SESSION["item_count"]; ?></span></a>
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
	      		echo " <li class='nav-item'> <a class='nav-link' href ='#' data-toggle='modal' data-target='#exampleModal'>Login</a></li>";
		       	echo "<li class='nav-item'>
		        <a class='nav-link' href='../views/register_form.php'>Register</a>
		      </li>";
	      	}

	     	?>
	      
	    </ul>

	  </div>
	</nav>
