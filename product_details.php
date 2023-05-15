<?php 
include('functions/users_common_functions.php');
include('includes/header.php');



if(isset($_GET['product'])){

    $product_slug = $_GET['product'];
    $product_data = getActiveProductSlug("products", $product_slug);
    $product = mysqli_fetch_array($product_data);

    if($product){

        ?>
    <div class="py-3 bg-success">
        <div class="container">
            <h6 class="text-white">
            <a class="text-white text-decoration-none" href="index.php">Home /</a>
            <a class="text-white text-decoration-none" href="categories.php"> Collections /</a>
            <?= $product['product_name']; ?></h6>
        </div>
    </div>
    <div class="bg-light py-4">
        <div class="container product-data mt-3">
            <div class="row">
                <div class="col-md-4">
                    <img src="images/<?= $product['product_image']  ?>" alt="product-img" class="w-100 shadow">
                </div>
                <div class="col-md-8">
                    <h5 class="float-end text-success"><?php if($product['product_trending']){echo "Best Seller"; }?></h5>
                    <h4><?= $product['product_name']?></h4>
                    <p><?= $product['product_small_description']?></p>
                    <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <h6>Selling Price:<span class="fw-bold text-success">  Php <?= $product['product_selling_price']?></span></h6>
                            </div>
                            <div class="col-md-4">
                                <h6>Original Price:<s><span class=" fw-bold text-danger">  Php  <?= $product['product_original_price']?></span></s></h6> 
                            </div>
                        </div>
                    
                        <hr>
                        <h6>Product Details:</h6>
                        <p><?= $product['product_description']?></p>

                        <div class="row">
                            <div class="col-md-3 mt-3">
                                <div class="input-group mb-3" style="width:120px">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" class="form-control bg-white input-quantity text-center" value="1" disabled>
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-3 mt-3">
                                <button class="btn btn-success addToCart-btn" value="<?= $product['id']?>"><i class="fa fa-shopping-cart me-2"></i>Add to cart</button>
                            </div>
                            <div class="col-md-3 mt-3">
                                <button class="btn btn-danger"><i class="fa fa-heart me-2"></i>Add to wishlist</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
        <?php


    }else{
        echo "Product not found";
    }

}else{
    echo "Something went wrong";
}
include('includes/footer.php');
?>