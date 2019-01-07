<?php require_once "../partials/header.php"; ?>
<?php require_once "../partials/navbar.php"; ?>
<?php require_once "../controllers/connect.php"; ?>


    <div id="carouselExampleSlidesOnly" class="carousel slide mt-5" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="../assets/image/carousel/4.jpg">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="../assets/image/carousel/1.png">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="../assets/image/carousel/4.jpg">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="../assets/image/carousel/1.png">
        </div>
       
      </div>
    </div>



<div class="container mt-5">
    <hr class="my-5 col-lg-12 " id="test">
    <div class="row">
        <div class="col-lg-3">

<!-- FOR CATEGORIES -->

            <h2 style="font-family: 'Freckle Face', cursive;">Designs</h2>
            <div class="list-group">

                <?php //require_once '../controllers/connect.php';
                        $sql = "SELECT * FROM tbl_categories";
                        $result = mysqli_query($conn,$sql);

                        if(mysqli_num_rows($result) > 0){
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <a style='' href='#test' class='list-group-item' onclick='showCategory(<?=$row['id']?>)' ><?=$row['name']?></a>
                <?php }} ?>                     
            </div> 


<!-- FOR FILTERING -->
            <h2 class="mt-3" style="font-family: 'Freckle Face', cursive;">Price</h2> 
            <div class="input-group mb-3 mt-2">
                    
                <select class="custom-select" id="pricesort" aria-label="Example select with button addon">
                    <option value="3">....</option>
                    <option value="1">Lowest to Highest</option>
                    <option value="2">Highest to Lowest</option>
                    
                </select>
            </div>  

        </div>



<!-- FOR SEARCHING ITEMS -->
        <div class="col-lg-9">
            <div class="col-lg-6 offset-lg-6">
            <form class="">
                <small>search </small><i class="fas fa-search"></i>

                <input type="" name="" class="form-control" id="search">
                <!-- icon of your text field -->
            </form>
            </div>
       


<!-- CATALOG -->
            <div class="row" id="products">
            <div class="col-lg-12">
                <h3 class="mt-5">Newest Art Design Shirt Tee's</h3>
            </div>
            <?php require_once "../controllers/connect.php";

                $sql = "SELECT * FROM tbl_items ORDER BY id DESC Limit 6 ";
                $result = mysqli_query($conn,$sql);

            ?>


            <?php 
             if (mysqli_num_rows($result) > 0) {
             while ($row = mysqli_fetch_assoc($result)) { ?>
                   
                    <div class="col-lg-4 col-md-6 mb-4 mt-4">

                        <div class="">
                                
                            <img style="box-shadow: 0px 10px 20px #262626; border-radius: 5px" class="card-img-top" src="<?=$row['img_path']?>">
                            <div class="card-body text-center">
                                <h4 class="card-title"><a href="product.php?id=<?=$row['id']?>"><?= $row['name'] ?></a></h4>
                                <h5>&#8369; <?= $row['price'] ?></h5>       
                            </div>

                        <div class="col-lg-8 offset-lg-2">
                            <input type="number" style="display:none;" value="1" id="quantity<?=$row['id']?>">
                            <button style="border-radius: 50px; " class="btn btn-block btn-outline-dark btn-sm" data-id='<?=$row['id']?>' id='addToCart'>Add to Cart</button>
                        </div>
                        </div>
                    </div>

            
              <?php } } ?>
            </div>
            
      </div>

    </div>





</div>
<!-- row -->


</div>

<?php require_once "../partials/footer.php"; ?>



<script type="text/javascript">
    


    
</script>


