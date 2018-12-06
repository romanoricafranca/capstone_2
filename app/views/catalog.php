<?php require_once "../partials/header.php"; ?>
<?php require_once "../partials/navbar.php"; ?>
<?php require_once "../controllers/connect.php"; ?>





<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <h1>Categories</h1>
            <div class="list-group">

                <?php require_once '../controllers/connect.php';
                        $sql = "SELECT * FROM categories";
                        $result = mysqli_query($conn,$sql);

                        if(mysqli_num_rows($result) > 0){
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <a href='#' class='list-group-item' onclick='showCategory(<?=$row['id']?>)'><?=$row['name']?></a>
                <?php }} ?>                     
            </div> 

            <label class="lead mt-4">Price</label>    
            <div class="input-group mb-3 mt-2">
                
                <select class="custom-select" id="pricesort" aria-label="Example select with button addon">
                    <option selected>....</option>
                    <option value="1">Lowest to Highest</option>
                    <option value="2">Highest to Lowest</option>
                    
                </select>
            </div>  

        </div>


<!--items catalog-->
            
    



        <div class="col-lg-9">

            <div class="input-group">
                <input type="" name="" class="form-control" id="search">
                <!-- icon of your text field -->
                <button class="btn btn-dark"><i class="fas fa-search"></i></button>
            </div>

<!--selecting items-->

            <div class="row" id="products">

            <?php require_once "../controllers/connect.php";

                $sql = "SELECT * FROM items";
                $result = mysqli_query($conn,$sql);

            ?>


            <?php 
             if (mysqli_num_rows($result) > 0) {
             while ($row = mysqli_fetch_assoc($result)) { ?>
        
            




                    <div class="col-lg-4 col-md-6 mb-4 mt-4">

                        <div class="card">
                                
                            <img class="card-img-top" src="<?= $row['img_path']?>" alt="">
                            <div class="card-body">
                                <h4 class="card-title"><a href="product.php?id=<?=$row['id']?>"><?= $row['name'] ?></a></h4>
                                <h5><?= $row['price'] ?></h5>       
                            </div>

                        <div class="card-footer">
                                
                            <input type="number" class="form-control mb-3" min='1' value='1' id='quantity<?=$row['id']?>' >
                            <button class="btn btn-block btn-primary" data-id='<?=$row['id']?>' id='addToCart'>Add to Cart</button>
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

<!---for add to cart-->

<script>

    $("button#addToCart").on("click",function(){
        //Get the product id
        var productId = $(this).attr("data-id");
        let quantity = $('#quantity'+productId).val();

        console.log("Product id:" + productId);
        console.log("Quantity id:" + quantity);


        // $('#notif').append(sum);

        //add to cart
        $.ajax({

            url:"addToCart.php",
            method:"POST",
            data:{
                productId:productId,
                quantity:quantity
            },
            dataType:"text",
            success:function(data){
                $('a[href="cart.php"]').html(data);
            }
 
        })

    });

</script>





<!--for categories / Show items-->
<script type="text/javascript">
    function showCategory(categoryID){
        // alert(categoryID);
        $.ajax({
                url:"../controllers/show_items.php",
                method:"POST",
                data:{
                    categoryID:categoryID
                },
                dataType:"text",
                success: function(data){
                    $("#products").html(data)
                }
            });
        }
</script>

<!--for search bar-->


<script type="text/javascript">
    
   $('#search').keyup(function(){

        let word = $(this).val();
        console.log(word);

            //AJAX Request

            $.post("../controllers/search_item.php",{word:word},function(datasearch){

                $('#products').html(datasearch);

            });
       });

/*<!--for price -->*/


    $('#pricesort').change(function(){

        let filter = "";

        //console.log(word);

            //AJAX Request
                $("select option:selected").each(function(){

                    filter += $(this).val(); 

             $.post("../controllers/sort_item.php",{filter:filter},function(datasort){

                 $('#products').html(datasort);

                 });

            });
       });



    //add to cart
        $.ajax({

            url:"addToCart.php",
            method:"POST",
            data:{
                productId:productId,
                quantity:quantity
            },
            dataType:"text",
            success:function(data){
                $('a[href="cart.php"]').html(data);
            }
 
       

    });


</script>



