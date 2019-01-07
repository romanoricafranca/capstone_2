<?php require_once "../partials/header.php"; ?>
<?php require_once "../partials/navbar.php"; ?>
<?php require_once "../controllers/connect.php"; ?>

<?php

$users_id = $_SESSION['usersid'];

$sql = "SELECT * FROM tbl_users WHERE id = '$users_id' ";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_assoc($result)){
  
  ?>

<hr class="mt-5">

<div class="container">
  <div class="row">
    <div class="col">
      <table class="table table-striped mt-5">
        <thead>
          <tr>
            <th scope="col">Transaction Code</th>
            <th scope="col">Purchase Date</th>
            <th scope="col">Status</th>
            <th scope="col">Payment Mode</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php }} ?>

<?php require_once "../partials/footer.php"; ?>