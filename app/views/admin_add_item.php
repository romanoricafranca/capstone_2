<?php require_once "../partials/admin_header.php"; ?>
<?php require_once "../partials/admin_navbar.php"; ?>
<?php require_once "../controllers/connect.php"; ?>
<?php 
		if ($_SESSION['email'] != "ricafrancaromano@gmail.com") {
			header("Location: ../views/index.php");
		}

?>



<hr class="mt-5">	

 <div class="container mt-5 mb-5">
 	<div class="row">
 		<div class="col-lg-8 offset-lg-2">
 			<div class="card">
					<div class="card-header">Add item</div>
					<div class="card-body">
						<form action="../controllers/process_additem.php" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" class="form-control">
							</div>
							<div class="form-group">
								<label>category</label>
								<select name="choose">
					<?php 
                    $sql = "SELECT * from tbl_categories";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result)>0)
                    {
                      while($row = mysqli_fetch_assoc($result)){
                        echo "<option>$row[name]</option>";
                      }
                    }
                    ?>
								</select>
							</div>

							<div class="form-group">
								<label>Price</label>
								<input type="number" name="price" class="form-control">
							</div>
							<div class="form-group">
								<label>Description</label>
								<input type="text" name="description" class="form-control">
							</div>
							<div class="form-group">
								<label>Upload Photo</label>
								<input type="file" name="upload" >
							</div>

							<input class="btn btn-outline-primary" type="submit" value="SUBMIT">

							<input class="btn btn-outline-dark" type="reset" name="">
						</form>
					</div>
				</div>
 		</div>
 	</div>
 </div>


<?php require_once "../partials/admin_footer.php"; ?>