$(document).ready(function () {

    //$('.increment-btn').click(function (e) { 
    $(document).on('click','.increment-btn', function (e) {
        e.preventDefault();

        var quantity = $(this).closest('.product-data').find('.input-quantity').val();
        //alert (quantity);
        var value = parseInt(quantity, 10);
        value = isNaN(value)? 0 : value;

        if(value < 10){
            value++;
            $(this).closest('.product-data').find('.input-quantity').val(value);
        }


        
    });
    //$('.decrement-btn').click(function (e) { 
    $(document).on('click','.decrement-btn', function (e) {
        e.preventDefault();

        var quantity = $(this).closest('.product-data').find('.input-quantity').val();
        //alert (quantity);
        var value = parseInt(quantity, 10);
        value = isNaN(value)? 0 : value;

        if(value > 1){
            value--;
            $(this).closest('.product-data').find('.input-quantity').val(value);
        }


        
    });

    //$('.addToCart-btn').click(function (e) {
    $(document).on('click','.addToCart-btn', function (e) { 
        e.preventDefault();
        
        var quantity = $(this).closest('.product-data').find('.input-quantity').val();
        var product_id = $(this).val();

        //alert(product_id);

        $.ajax({
            method: "POST",
            url: "functions/handle_cart.php",
            data: {
                "product_id": product_id,
                "product_quantity": quantity,
                "scope": "add"
            },
            success: function (response) {
                if(response == 201){
                    alertify.success("Product Added to cart");
                }
                else if(response == "existing"){
                    alertify.success("Item already in your cart");
                }
                else if(response == 401){
                    alertify.success("Login to continue");
                }
                else if(response == 500){
                    alertify.success("Something went wrong");
                }
                
            }
        });
    });

    $(document).on('click','.update-quantity', function () {

        var quantity = $(this).closest('.product-data').find('.input-quantity').val();
        var  product_id = $(this).closest('.product-data').find('.prod_id').val();

        $.ajax({
            method: "POST",
            url: "functions/handle_cart.php",
            data: {
                "product_id": product_id,
                "product_quantity": quantity,
                "scope": "update"
            },
            success: function (response) {
                //alert(response);
                
            }
        });
        //alert(quantity);    
    });

    $(document).on('click','.delete_item', function () {
        var cart_id = $(this).val();
        //alert(cart_id);
        $.ajax({
            method: "POST",
            url: "functions/handle_cart.php",
            data: {
                "cart_id": cart_id,
                "scope": "delete"
            },
            success: function (response) {
                if(response == 200){
                    alertify.success("Item deleted");
                    $('#mycart').load(location.href + " #mycart"); // reloading the page automatically after deleting an item
                }else{
                    alertify.success(response);
                }    
            }
        });      
    });

});

