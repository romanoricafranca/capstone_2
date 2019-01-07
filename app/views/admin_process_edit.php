<?php include "../partials/header.php";?>
<?php include "../partials/admin_nav.php";?>
<?php include "../controllers/connect.php";?>
<?php if (!isset($_SESSION['email'])) {
          header("location:login.php");
        }

	    else if (isset($_SESSION['email']) == "ricafrancaromano@gmail.com")
	    {
	    		header("location: index.php");
	    
	   } ?>



<div class="container my-5">
<?php

error_reporting(0);

$data ="<div class='card mb-5'>
					  		<div class='card-header bg-dark text-white'>
							<h3>Items List</h3>
					  		</div>
					  		<div class='card-body'>
				         	";



   $sql = "SELECT tbl_items.img_path,tbl_categories.name AS category,tbl_items.name AS name,tbl_items.description,tbl_items.price FROM items JOIN categories ON tbl_items.category_id = tbl_categories.id";
             $result = mysqli_query($conn, $sql);

            
               if(mysqli_num_rows($result) > 0){
                   while($row = mysqli_fetch_assoc($result)){

                    $img_path = $row['img_path'];
                    $category = $row['category'];
                    $product = $row['name'];
                    $description = $row['description'];
                    $price = $row['price'];

                       $data .=
                         "<div class='container-fluid'>
								<ul class='list-group list-group-flush'>
									<li class='list-group-item'>
										<div class='row'>
											<div class='col'>
												<h6 class = 'card-title text-body'><img src='$row[img_path]' height='50px' width='80px'></h6>
											</div>
											
											<div class='col'>
												<h6 class = 'card-title text-body'>$row[name]</h6>
											</div>
											<div class='col'>
												<h6 class='text-muted'>$description</h6>
											</div>
											<div class='col'>
												<h6 class='text-muted'> &#8369; $row[price]</h6>
											</div>
										</div>
									</li>
								</ul>	      				
						</div>";
                   }
               
echo $data;
}
else{
  header("Location: admin_login.php");
}

?>  
</div>



<?php include "../partials/footer.php";?>