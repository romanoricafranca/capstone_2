
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
	  <a class="navbar-brand" href="../views/index.php" style="font-family: 'Freckle Face', cursive; text-shadow: 5px 5px 30px #ff4d4d	";><i class="fas fa-tshirt"></i> Shirt Tee's</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>





	  <div class="collapse navbar-collapse haha mr-5" id="navbarSupportedContent">
	    <ul class="navbar-nav ml-auto huhu">
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
	      		echo " <li class='nav-item'> <a class='nav-link' href ='#' data-toggle='modal' data-target='#exampleModal'>Login</a></li>";
		       	echo "<li class='nav-item'>
		        <a class='nav-link' href='../views/register_form.php'>Register</a>
		      </li>";
	      	}

	     	?>
	      
	    </ul>

	  </div>
	</nav>
