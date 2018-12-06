<?php require_once "../partials/header.php"; ?>

<?php require_once "../partials/navbar.php"; ?>

<?php include "../controllers/connect.php"; ?>



<div class="container mb-5">
    
    <div class="row" id="products">
        <?php require_once "../controllers/connect.php";

        $id = $_GET['id'];

        $sql = "SELECT * FROM items WHERE id = $id";
        $result = mysqli_query($conn,$sql);

        ?>


            <?php 
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>
            
             
             
                 


        
         <div class="col-lg-5">     
            <img class="card-img " src="<?= $row['img_path']?>" alt="">
         </div>           

         <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><a href="product.php?id=<?=$row['id']?>"><?= $row['name'] ?></a></h4>
                    <h5><?= $row['price'] ?></h5>
                    <p class="card-text"><?= $row['description'] ?></p>


                    <div class="row">
                        <div class="col-lg-7">
                            <input type="number" class="form-control mb-3" min='1' value='1' id='quantity<?=$row['id']?>' >
                        </div>
                         <div class="col-lg-5">
                            <button class="btn btn-block btn-outline-dark col-lg-12" data-id='<?=$row['id']?>' id='addToCart'>Add to Cart >></button>           
                        </div>
                    </div>
            
                </div>

                
                   
                    
                
               
                
            </div>

         </div>

    
            
            <?php }
            } ?>
    </div>

</div>





 






<?php require_once "../partials/footer.php"; ?>


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

            url:"../views/addToCart.php",
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