<?php require_once "../partials/header.php"; ?>
<?php require_once "../partials/navbar.php"; ?>
<?php include "../controllers/connect.php"; ?>



<div class="container mb-5 mt-5">   
    <div class="row" id="products">
        <?php require_once "../controllers/connect.php";

        $id = $_GET['id'];

        $sql = "SELECT * FROM tbl_items WHERE id = $id";
        $result = mysqli_query($conn,$sql);

        ?>
            <?php 
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>

        
         <div class="col-lg-6 col-md-6 mb-4 mt-5">
            <div class="">
                <img style="box-shadow: 0px 10px 20px #262626; border-radius: 5px" class="card-img-top" src="<?= $row['img_path']?>" alt="">
            </div>

        </div>
        <div class="col-lg-6 col-md-6 mb-4 mt-5">
            <div class="card-body">
                <h4 class="card-title" style="font-size: 2.5em;"><?=$row['name']?></h4>
                <h5 style="font-size: 2em;"> &#8369; <?= $row['price'] ?>.00</h5>       
            </div>
                <div class="col-lg-3">
                    <p class="lead">Quantity: </p> <input type="number" class="form-control mL-3" min='1' value='1' id='quantity<?=$row['id']?>' >
                </div>
            <hr class="my-2">
            <div class="col-lg-5">                
                <?php

                $sqlsizes = "SELECT * FROM tbl_sizes";
                $sizes = mysqli_query($conn,$sqlsizes);

                if (mysqli_num_rows($sizes) > 0) {?>

                
                <h3 class="mt-1" style="font-family: 'Freckle Face', cursive;">Product Variant</h3> 
                <div class="input-group mb-3 mt-2">     
                <select class="custom-select">
                <?php while ($row = mysqli_fetch_assoc($sizes)) {?>
                    <option><?=$row['name']?></option>
                            <?php }}?>    
                </select>
                </div>



                <button style="border-radius: 50px; " class="btn btn-block btn-outline-dark btn-sm" data-id='<?=$row['id']?>' id='addToCart'>Add to Cart</button> 

            </div>


                <hr class="my-2">
                <h5 class="lead">Description</h5>
                <div class="col-lg-12">
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </di>      
            <?php }
            } ?>
            <h5 class="lead">Size and Fit:</h5>
            <img src="../assets/image/sizes.jpg" class="img-fluid" alt="Responsive image">
        </div>
    </div>
</div>
</div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <hr class="my-2 ">
                <?php
                $sql = "SELECT * FROM tbl_items where category_id LIMIT 4";
                $result = mysqli_query($conn, $sql);
                
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <div class="col-lg-3 col-md-6 mb-4 mt-4">
                            <div class="">                                           
                                <img style="box-shadow: 0px 10px 20px #262626; border-radius: 5px" class="card-img-top" src="<?= $row['img_path']?>" alt="">
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="product.php?id=<?=$row['id']?>"><?= $row['name'] ?></a></h4>
                                        <h5>&#8369; <?= $row['price'] ?></h5>       
                                    </div>

                                    <div class="col-lg-8 offset-lg-2">
                                                    
                                        <button style="border-radius: 50px; " class="btn btn-block btn-outline-dark btn-sm" data-id='<?=$row['id']?>' id='addToCart'>Add to Cart</button>
                                            </div>
                                            </div>
                                        </div>

                                
                                  <?php } } ?>


            </div>
        </div>
    </div>




    
                   
    


 






<?php require_once "../partials/footer.php"; ?>