<?php

    include('../middleware/admin_middleware.php');
    include('includes/header.php');
//include('../middleware/admin_middleware.php');
//echo substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1);
?>


<div class="main-container d-flex">

    <?php 
        include ('includes/sidebar.php'); 
    ?>
    
    <div class="content bg-tertiary">
        <?php
            include ('includes/navbar.php'); 
        ?>
       
        <div class="content-info">
            <?php
            if(isset($_GET['categories'])){
                include('category.php');
            }
            if(isset($_GET['add_new_category'])){
                include('add_category.php');
            }
            if(isset($_GET['category_id'])){
                include('edit_category.php');
            }
            if(isset($_GET['products'])){
                include('products.php');
            }
            if(isset($_GET['add_new_product'])){
                include('add_product.php');
            }
            if(isset($_GET['product_id'])){
                include('edit_product.php');
            }
            if(isset($_GET['orders'])){
                include('orders.php');
            }
            if(isset($_GET['track_no'])){
                include('view_order_details.php');
            }
            if(isset($_GET['out_for_delivery'])){
                include('orders_out_for_delivery.php');
            }
            if(isset($_GET['order_history'])){
                include('order_history.php');
            }
            ?>
       </div>
    </div>
</div>

<?php
    include('includes/footer.php');
?>
