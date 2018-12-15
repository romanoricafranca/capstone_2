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