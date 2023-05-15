<?php 

include('authenticate.php'); // user authentication first
include('functions/users_common_functions.php');
include('includes/header.php');

?>
<div class="py-3 bg-success">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white text-decoration-none" href="index.php"> Home /</a> 
            <a class="text-white text-decoration-none" href="checkout.php"> Checkout</a>
        </h6>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="functions/place_order.php" method="post" autocomplete="off">
                    <div class="row">
                        <div class="col-md-7">
                        <h5>Delivery Details</h5>
                        <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="" class="fw-bold">Name</label>
                                    <input type="text"  class="form-control" name="name" placeholder="Enter your full name" required >
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="" class="fw-bold">Email</label>
                                    <input type="email"  class="form-control" name="email" placeholder="email@email.com" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="" class="fw-bold">Mobile</label>
                                    <input type="number"  class="form-control" name="mobile" placeholder="Enter your mobile number" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="" class="fw-bold">Zip Code</label>
                                    <input type="number"  class="form-control" name="zipcode" placeholder="Enter Zipcode" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="" class="fw-bold">Delivery Address</label>
                                    <textarea name="address" class="form-control" rows="5" placeholder="Enter your complete address" resize="none" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h5>Order Details</h5>
                            <hr>
                                <?php
                                    $items = getCartItems();
                                    $totalPrice = 0;
                                    foreach($items as $citem){
                                        ?>
                                        <div class="card product-data shadow-sm mb-3">
                                            <div class="row align-items-center">
                                                <div class="col-md-2">
                                                    <img src="images/<?= $citem['product_image']?>"  alt="product_image" width="60px">
                                                </div>
                                                <div class="col-md-5">
                                                    <label><?= $citem['product_name'] ?></label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="fw-bold">Php <?= $citem['product_selling_price'] ?></label>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <label class="text-secondary">x<?= $citem['product_quantity'] ?></label>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                        $totalPrice += $citem['product_selling_price']*$citem['product_quantity'];
                                        //echo $citem['product_name'];
                                    }
                                ?>   
                                <hr> 
                                <h5>Total Price : <span class="float-end fw-bold"><?=$totalPrice?></span></h5> 
                                <div class="">
                                    <input type="hidden" name="payment_mode" value="Cash on Delivery / COD">
                                    <button type="submit" name="place-order-btn" class="btn btn-success w-100">Place order | COD</button>
                                </div>  
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php 
include('includes/footer.php');
?>