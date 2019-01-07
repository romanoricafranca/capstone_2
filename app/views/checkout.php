<?php require_once "../partials/header.php"; ?>
<?php require_once "../partials/navbar.php"; ?>
<?php require_once "../controllers/connect.php"; ?>


<?php 

	      if (!isset($_SESSION['email'])) {
	     		header("location:login.php");
          
  				}

          ?>  


          <?php


?>
<hr class="mt-5">
<div class="container">

	<div class="row">		
		<div class="col-lg-8 mt-5">
			<h1>CHECKOUT</h1>

		</div>

		<!-- <form class="col-lg-8" action="../controllers/place_order1.php" method="POST"> --><div class="col-lg-4">  
            <h4>Shipping address</h4>
			<div class="input-group mb-3 mt-2">
                

                <select class="custom-select" id="payment" name="payment_mode">
                    <!-- <option selected>----------</option> -->
                    <?php 
                    $sql_mod = "SELECT * from tbl_payment_mode";
                    $result_mod = mysqli_query($conn, $sql_mod);
                    if(mysqli_num_rows($result_mod)>0)
                    {
                      while($row = mysqli_fetch_assoc($result_mod)){
                        echo "<option required value='$row[id]'>$row[mode_payment]</option>";
                      }
                    }
                    ?>
                
              </select>


</div>
            </div> 
		</div>
		<div class="col-lg-4">
			<h4>Payment Method</h4>

      <?php 
      $sql = "SELECT * FROM tbl_payment_mode";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {?>

			<div class="input-group mb-3 mt-2">
                
                <select class="custom-select" id="pricesort" aria-label="Example select with button addon">
                    <?php while ($row = mysqli_fetch_assoc($result)) {?>
                                        <option><?=$row['mode_payment']?></option>
                                   <?php }
                               }?>
                    
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
               <th scope="col">Name</th>
               <th scope="col">Sizes</th>
               <th scope="col">Price</th>
               <th scope="col">Quantity</th>
               <th scope="col">Sub-total</th>
             </tr>
           </thead>
           <tbody>
  ';



$grand_total = 0;


foreach($_SESSION['cart'] as $id=> $quantity) {
   $sql = "SELECT * FROM tbl_items where id = '$id' ";
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
                            <td><img src='$row[img_path]' width='80px' height='80px'></td>
                             <td>$row[name]</td>
                             <td id='tsize'>Medium</td>

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
					

					<a href="../controllers/place_order1.php"><button class='btn btn-outline-success text-right'>Place Order</button></a>


				</div>

	<!-- 		</form> -->

	</div>

</div>


<?php require_once "../partials/footer.php"; ?>