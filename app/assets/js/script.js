//for Search Bar
$('#search').keyup(function(){

        let word = $(this).val();
        console.log(word);

            //AJAX Request

            $.post("../controllers/search_item.php",{word:word},function(datasearch){

                $('#products').html(datasearch);

            });
       });


//for price
    $('#pricesort').change(function(){

        let filter = "";

        //console.log(word);

            //AJAX Request
                $("select option:selected").each(function(){

                    filter += $(this).val(); 

             $.post("../controllers/filter.php",{filter:filter},function(datasort){

                 $('#products').html(datasort);

                 });

            });
       });
 

// for show category
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


//for registration and validation

    $(document).ready(() =>{

	// BLANK VALIDATIONS --------------------------------------------------
	$("#fname").focusout(()=>{

		let fname = $('#fname').val();
		
		if (fname == "") {
			$('#testclick').attr('disabled', true);
			$('#error_fname').html("Needs Firstname!");
		}
		else{
			$('#testclick').attr('disabled', false);
			$('#error_fname').html("");
		}

	});

	$("#lname").focusout(()=>{

		let lname = $('#lname').val()
		
		if (lname == "") {
			$('#testclick').attr('disabled', true);
			$('#error_lname').html("Needs Lastname!");
			$('#error_lname').addClass("red-text");
		}
		else{
			$('#testclick').attr('disabled', false);
			$('#error_lname').removeClass("red-text");
			$('#error_lname').html("");
		}

	});

	$("#email").focusout(()=>{

		let email = $('#email').val();
		// let emaillen = $('#email').val().length;
		
		if (email == "") {
			$('#testclick').attr('disabled', true);
			// $('#error_email').addClass("red-text");
			$('#error_email').html("Needs Email!");
		}
		else{
			$('#testclick').attr('disabled', false);
			// $('#error_email').removeClass("red-text");
			$('#error_email').html("");
		}
	});

	$("#pass").focusout(()=>{

		let pass = $('#pass').val();
		let passlen = $('#pass').val().length;
		
		if (pass == "") {
			$('#testclick').attr('disabled', true);
			// $('#error_pass').addClass("red-text");
			$('#error_pass').html("Needs Password!");
		}
		else{
			if (passlen < 8) {
				$('#testclick').attr('disabled', true);
				// $('#error_pass').addClass("red-text");
				$('#error_pass').html("Must be 8 characters!");
			}
			else{
				$('#testclick').attr('disabled', false);
				// $('#error_pass').removeClass("red-text");
				$('#error_pass').html("");
			}
		}

	});

	$("#cpass").focusout(()=>{

		let cpass = $('#cpass').val();
		let pass = $('#pass').val();
		
		if (cpass == "") {
			$('#testclick').attr('disabled', true);
			// $('#error_cpass').addClass("red-text");
			$('#error_cpass').html("Needs Confirm Password!");
		}
		else{
			if (pass != cpass) {
				$('#testclick').attr('disabled', true);
				// $('#error_cpass').addClass("red-text");
				$('#error_cpass').html("Must be same with Password!");
			}
			else{
				$('#testclick').attr('disabled', false);
				// $('#error_cpass').removeClass("red-text");
				$('#error_cpass').html("");
			}
		}

	});


		$("#address").focusout(()=>{

		let lname = $('#address').val()
		
		if (lname == "") {
			$('#testclick').attr('disabled', true);
			$('#error_address').html("Needs Address!");
			$('#error_address').addClass("red-text");
		}
		else{
			$('#testclick').attr('disabled', false);
			$('#error_address').removeClass("red-text");
			$('#error_address').html("");
		}

	});
	// END OF BLANK VALIDATIONS --------------------------------
		
	});



	$("#email").focusout(function(){

		let email = $(this).val();
	    // console.log(email);

		$.post("../controllers/email_validation.php", {email:email}, function(data){
		
			$("#error_email").html(data);
			
		})
	});


//Change the no. of items and display the new subtotal
function loadCart(){
	$.get("../controllers/loadcart.php",function(data){

		$("#loadcart").html(data);

	});
}



$(document).ready(function(){

	loadCart();


});


function changeNoItems(id){

	let items =	$("#quantity" + id).val();
	let price = $("#price" + id).text();
	let newPrice = items * price;

	// console.log(each(grandTotal));
	// let grandtotal = items * newPrice;
	console.log(items);
	console.log("sub total is:" + newPrice);
	
	$("#subTotal" + id).text(newPrice);

	//computation of grand total

	let a = [];
	$(".sub-total").each(function(id) {
		a[id] = parseInt($(this).text());
		console.log(a);
	});
	let sum = 0;
	$.each(a, function(index, value){
		sum += value;
	});
	console.log(sum);

	$("#grandTotal").text(sum);

	//add to cart
        $.ajax({

            url:"../controllers/addtocart.php",
            method:"POST",
            data:{
                productId:id,
                quantity:items
            },
            dataType:"text",
            success:function(data){
                $('a[href="cart.php"]').html(data);
            }

    });

 }


function removeFromCart(id){

	// var ans = confirm("are you sure?");
	// if (ans) {

		// alert("you answered yes");
		$.ajax({
			url:"../controllers/removefromcart.php",
			method: "POST",
			data:{productId:id},
			dataType:"text",
			success:function(data){
				// $('a[href="cart.php"]').html(data);
				loadCart();
				if (data) {
				document.location.href ='cart.php';
			}
			}
		});
	// }
}


    //get the quantity
    $("button#addToCart").on("click",function(){
        //Get the product id
        var productId = $(this).attr("data-id");
        let quantity = $('#quantity'+productId).val();

        console.log("Product id:" + productId);
        console.log("Quantity id:" + quantity);

        //add to cart
        $.ajax({

            url:"../controllers/addtocart.php",
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

  });














 


 


