//Change the no. of items and display the new subtotal
function loadCart(){
	$.get("loadcart.php",function(data){

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
	
	$("#subTotal" + id).text(parseFloat(newPrice).toFixed(2));

	//computation of grand total

	let a = [];
	$(".sub-total").each(function(id) {
		a[id] = parseFloat($(this).text());
		console.log(a);
	});
	let sum = 0;
	$.each(a, function(index, value){
		sum += value;
	});
	//console.log(sum);

	$("#grandTotal").text(parseFloat(sum).toFixed(2));

 }



//deleting item from cart 
function removeFromCart(id){

	// var ans = confirm("are you sure?");
	// if (ans) {

		// alert("you answered yes");
		$.ajax({
			url:"../controllers/removeFromCart.php",
			method: "POST",
			data:{productId:id},
			dataType:"text",
			success:function(data){
				$('#notification').html(data);
				loadCart();
			}

		});
	// }
}


 
