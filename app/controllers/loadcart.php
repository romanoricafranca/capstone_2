<?php

session_start();
require_once "../controllers/connect.php";

if (isset($_SESSION['cart'])) {

$data ='<hr class="mt-5">
        <h3>My Cart</h3>

         <table class="table table-hover">
           <thead>
             <tr>
               <th scope="col">Product</th>
               <th scope="col">Price</th>
               <th scope="col">Sizes</th>
               <th scope="col">Quantity</th>
               <th scope="colspan=2">Sub-total</th>
               <th scope="col"></th>

             </tr>
           </thead>
           <tbody>
  ';



$grand_total = 0;


foreach($_SESSION['cart'] as $id => $quantity) {
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
                             <td><img style='box-shadow: 0px 10px 20px #262626; border-radius: 5px;' src='$row[img_path]' width='120px' height='120px'></td>
                             <td id='price$id'> $price</td>
                             <td>

                              <select class='custom-select' id='shirt_size'     data-id='$id'>
                                <option value='1'>SMALL</option>
                                <option value='2'>MEDIUM</option>
                                <option value='3'>LARGE</option>
                                <option value='4'>X-LARGE</option>
                                <option value='5'>XXL</option>                    
                              </select>


                             </td>
                             <td><input type='number' onkeypress='return event.charCode >= 48 && event.charCode <= 57' class ='form-control' value = '$quantity' id='quantity$id'  min='1' size='5' onchange='changeNoItems($id)'></td>
                             <td class='sub-total' id='subTotal$id'>$subTotal</td>
                             <td><button class='btn btn-danger' style='border-radius:50%;' onclick='removeFromCart($id)'><i class='far fa-trash-alt'></i></button></td>
                         </tr>";
                   }
               }
}

$data .="</tbody></table>
             <hr>
             <h3 align='right' class='mb-3'>Total: &#x20B1; <span id='grandTotal'>$grand_total </span><br>

             <a href='../views/checkout.php'><button id='check_out' style='border-radius: 50px;' class='btn btn-outline-primary'>Check Out</button></a>


             </h3>
             
             <hr class='mb-3'>
            <h5 class='lead'>Size and Fit:</h5>
            <img src='../assets/image/sizes.jpg' class='img-fluid' alt='Responsive image'>
             ";
}
else
{
  $data = "";
  $data = "<div class='col-lg-10 offset-lg-1' >
  <hr class='mt-5'>

        <h3>Your Cart is Empty</h3>
        <img src='../assets/image/display/empty.png' width='150px' height='150px'>
<div class='col-lg-5'> 
  <a id='emptybtn' href='../views/index.php#test'><button style='border-radius: 50px;' class='btn btn-outline-dark btn-sm' '>Go to Cart</button></a>
</div>
  <div/>";

}



echo $data;

?>


<script type="text/javascript">
  
  $('#shirt_size').change(function(){
    let pick = "";

    $("#shirt_size option:selected").each(function(){
      pick += $(this).val();
      console.log(pick);
       $.post('../views/testcheckk.php', {pick:pick}, function(data){

       });
    });


  });


</script>