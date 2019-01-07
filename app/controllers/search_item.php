<?php include 'connect.php';


$word = $_POST['word'];
	$data = "";
	$sql = "SELECT * FROM tbl_items WHERE name LIKE '%".$word."%'";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result)>0) {

		while ($row = mysqli_fetch_assoc($result)) {


			$data.="<div class='col-lg-4 col-md-6 mb-4 mt-4'>
			            <div class=''>                
			                <img style='box-shadow: 0px 10px 20px #262626; border-radius: 5px;' class='card-img-top' src='$row[img_path]' alt=''>
			                <div class='card-body text-center'>
			                    <h4 class='card-title'><a href='product.php?id=$row[id]'>$row[name]</a></h4>
			                    <h5>&#8369; $row[price].00</h5>       
			                </div>

			                <div class='col-lg-8 offset-lg-2'>
			                             
			                    <input type='number' style='display:none;' value='1' id='quantity$row[id]'>
                            	<button style='border-radius: 50px;' class='btn btn-block btn-outline-dark btn-sm' data-id='$row[id]' id='addToCart'>Add to Cart</button>
                            	
			                </div>
			            </div>
			        </div>";
		}
	}
	else
	{
		$data = "<div class='col-lg-4 col-md-6 mb-4 mt-4'>

					<p class='lead mt-5'>No Records Found!</p>

				</div>";
	}

echo $data;
?>

  <script type="text/javascript" src="../assets/js/script.js"></script>

		