
<?php session_start(); ?>

<?php

include '../controllers/connect.php';

if (isset($_SESSION['cart'])) {
  $quantity = 0;
  $price = 0;


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
                             <td><img src='$row[img_path]' width='25%' height='25%'>$row[name]</td>
                             <td id='price$id'> $price</td>
                             <td><input type='number' class ='form-control' value = '$quantity' id='quantity$id' min='1' size='5' onkeypress='return event.charCode >= 48 && event.charCode <= 57' onchange='changeNoItems($id)' ></td>
                             <td class='sub-total' id='subTotal$id'>$subTotal</td>
                             <td><button class='btn btn-danger' onclick='removeFromCart($id)' >Remove</button></td>
                         </tr>";
                   }
               }
}
 

$data .="</tbody></table>
             <hr>
             <h3 align='right'>Total: &#x20B1; <span id='grandTotal'>$grand_total </span><br><a href='checkout.php'><button class='btn btn-success'>Check Out</button></a></h3>
             <hr>";


 
echo $data;
}

else
{
  echo "<p>Your Cart is empty</p>
      <a href='catalog.php'><button class='btn btn-outline-primary'>go to catalog</button></a>";
}

?>



