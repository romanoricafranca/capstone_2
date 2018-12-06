<?php require_once "../partials/header.php"; ?>
<?php require_once "../partials/navbar.php"; ?>
<?php require_once "../controllers/connect.php"; ?>


<?php 

	      if (!isset($_SESSION['email'])) {
	     		header("location:login.php");
          // echo '<script></script>';

	    		?>


	    		<?php

  				}


?>

<div class="container">

	<div class="row">
		
		<div class="col-lg-8">
			<h1>This is the checkout page</h1>

		</div>
		<div class="col-lg-8">
            <h4>Shipping address</h4>
			<div class="input-group mb-3 mt-2">
                <select class="custom-select" id="pricesort" aria-label="Example select with button addon">
                    <option value="1">Antipolo City</option>
                    <option value="2">Tuiit Boot Camp</option>
                    
                </select>
            </div> 
		</div>
		<div class="col-lg-4">
			<h4>Payment Method</h4>
			<div class="input-group mb-3 mt-2">
                
                <select class="custom-select" id="pricesort" aria-label="Example select with button addon">
                    <option value="1">Cod</option>
                    <option value="2">B</option>
                    
                </select>
            </div> 
		</div>

        
<!---for order detail-->
<?php
$data ='
         <table class="table table-hover">
           <thead>
             <tr>
               <th scope="col">Product</th>
               <th scope="col">Price</th>
               <th scope="col">Quantity</th>
               <th scope="col">Sub-total</th>
             </tr>
           </thead>
           <tbody>
  ';



$grand_total = 0;


foreach($_SESSION['cart'] as $id=> $quantity) {
   $sql = "SELECT * FROM items where id = '$id' ";
             $result = mysqli_query($conn, $sql);


               if(mysqli_num_rows($result) > 0){
                   while($row = mysqli_fetch_assoc($result)){
                     $name = $row["name"];
                     $description = $row["description"];
                     $price = $row["price"];

                       //For computing the sub total and grand total
                       $subTotal = $quantity * $price;
                       $grand_total += $subTotal;

                       $data .=
                         "<tr>
                             <td><img src='$row[img_path]' width='80px' height='80px'> $row[name]</td>
                             <td id='price$id'> $price</td>
                             <td>$quantity</td>
                             <td class='sub-total' id='subTotal$id'>$subTotal</td>
                             
                         </tr>";
                   }
               }
}

$data .="</tbody></table>
             <hr>
             <h3 align='right'>Total: &#x20B1; <span id='grandTotal'>$grand_total </span></h3>
             <hr>
			
             
             ";
echo $data;
?>

			<div class="row">
				
				<div class='mb-5 col-lg-4'>
					

					<a href='#'><button class='btn btn-outline-success text-right'>Process Order</button></a>


				</div>

			</div>











		



	</div>

</div>



<?php require_once "../partials/footer.php"; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="../assets/js/script.js"></script>