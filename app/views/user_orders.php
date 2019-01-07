<?php require_once "../partials/header.php"; ?>
<?php require_once "../partials/navbar.php"; ?>
<?php require_once "../controllers/connect.php"; ?>

<hr class="mt-5">


      
<div class="container">
  <div class="row">
    <div class="col">
      <div class="mt-5 col-lg-4">
      <small>search </small><i class="fas fa-search"></i>
      <input type="text" id="ordersearch" class="form-control">
        </div>
      <table class="table table-striped mt-5">
        <thead class="">
          <tr>
            <th scope="col">Transaction Code</th>
            <th scope="col">Purchase Date</th>
            <th scope="col">Status</th>
            <th scope="col">Payment Mode</th>
          </tr>
        </thead>
      <tbody id="test1">



<?php

$users_id = $_SESSION['usersid'];

$sql = "SELECT tbl_orders.transaction_code, tbl_orders.purchase_date, tbl_status.name, tbl_payment_mode.mode_payment  FROM ((tbl_orders 
    INNER JOIN tbl_payment_mode ON tbl_orders.payment_mode_id)
    INNER JOIN tbl_status ON tbl_orders.status_id) WHERE user_id = '$users_id' ";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_assoc($result)){
  
  ?>





          <tr>
            <td><?=$row['transaction_code']?></td>
            <td><?=$row['purchase_date']?></td>
            <td><?=$row['name']?></td>
            <td><?=$row['mode_payment']?></td>
          </tr>
          
        

<?php }} ?>

</tbody>
      </table>
    </div>
  </div>
</div>




<?php require_once "../partials/footer.php"; ?>


<script type="text/javascript">
  

// search

$(document).ready(function(){
   $("#ordersearch").on("keyup", function() {
     var value = $(this).val().toLowerCase();
     $("#test1 tr").filter(function() {
       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
     });
   });
 });


</script>