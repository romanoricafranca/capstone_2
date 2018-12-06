<?php 
include 'connect.php';

	$filter = $_POST['filter'];
	$data = "";
	
	if ($filter == 1) 
	{
		
		$sql = "SELECT * FROM items ORDER BY price ASC";
	
	}
	else if ($filter == 2) 
	{
		$sql = "SELECT * FROM items ORDER BY price DESC";
	}

	else
	{
		$sql = "SELECT * FROM items";
	}

	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result)>0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$data.=" <div class='col-lg-4 col-md-6 mb-4 mt-4'>

                        <div class='card'>
                                
                            <img class='card-img-top' src='$row[img_path]' alt=''>
                            <div class='card-body'>
                                <h4 class='card-title'><a href='product.php?id=$row[id]'> $row[name]</a></h4>
                                <p class='card-text'>
			                  $row[description]</p>
                                <h5><?= $row[price] ?></h5>       
                            </div>

                        <div class='card-footer'>
                                
                            <input type='number' class='form-control mb-3' min='1' value='1' id='quantity$row[id]'  >
                            <button class='btn btn-block btn-primary' data-id='$row[id]' id='addToCart'>Add to Cart</button>
                        </div>
                        </div>
                    </div>";
		}
	}
	else
	{
		$data = "No Records Found!";
	}

echo $data;

?>

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
