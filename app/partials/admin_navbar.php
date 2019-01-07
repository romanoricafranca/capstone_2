<nav class="navbar navbar-expand-lg navbar-light fixed-top " style="background: #7C98B3";>
	  <a class="navbar-brand" href="../views/index.php"><img src="../assets/image/logo/logo.png" width="150px" height="55px"></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse"  id="navbarSupportedContent">
	    <ul class="navbar-nav ml-auto huhu" text-shadow: 5px 5px 30px #262626";>
	   
	      <?php
	    if (!isset($_SESSION['email'])) {
          header("location:login.php");
        }

	    else if (isset($_SESSION['email']) == "ricafrancaromano@gmail.com")
	    {
	      echo "<li class='nav-item'>
	        <a class='nav-link' href='../views/trans_history.php'>Transaction Order</a>
	      </li>";
	    echo "<li class='nav-item'><a class='nav-link'href='../views/admin_add_item.php'>additems</a></li>";
	    
	 	echo "<li class='nav-item'><a class='nav-link' href='#'>user profiles</a>
	    </li>";

	    echo "<li class='nav-item'><a class='nav-link' href='../controllers/admin_logout.php'>log-out</a></li>";
		}


		else {
	    echo "<li class='nav-item'><a class='nav-link' href='admin_login.php'>log-in</a></li>";
			}
	?>

	    </ul>

	  </div>
	</nav>