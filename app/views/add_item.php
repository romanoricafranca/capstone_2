<?php require_once "../partials/header.php"; ?>

<?php require_once "../partials/navbar.php"; ?>

<?php include "../controllers/connect.php"; ?>



<?php 
    $sql = "SELECT * FROM categories";
    
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {?>


    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="card">
                    <div class="card-header">Add Items</div>
                    <div class="card-body">
                        <form action="process_item.php" method="POST">


                            <div class="form-group">
                                <label>Item Name</label>
                                <input type="text" name="item" class="form-control">
                            </div>


                            <div class="form-group">
                                <label>Categories</label>
                                <select  name="category" class="form-control">
                                    <?php while ($row = mysqli_fetch_assoc($result)) {?>
                                        <option><?=$row['name']?></option>
                                   <?php }
                               }?>
                                </select>
                            </div>



                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" name="price" class="form-control">
                            </div>


                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="10"></textarea>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">                                   
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Image</label>
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-outline-dark">Upload</button>
                            <input class="btn btn-outline-warning" type="reset" name="">
                            <button class="btn btn-outline-dark">Submit</button>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>







<?php require_once "../partials/footer.php"; ?>
