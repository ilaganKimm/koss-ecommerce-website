<?php 
include('authenticate.php'); // user authentication first
include('functions/users_common_functions.php');
include('includes/header.php');
?>
<div class="py-3 bg-success">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white text-decoration-none" href="index.php"> Home /</a> 
            <a class="text-white text-decoration-none" href="cart.php"> Cart </a>
        </h6>
    </div>
</div>
<div class="py-5 ">
    <div class="container">
            <h4>Cart Items</h4>
            <hr>
            <div class="row">
                <div class="col-md-12">
                <div id="mycart">
                    <?php
                        $items = getCartItems();
                        if(mysqli_num_rows($items)>0){
                            ?>
                    <div>
                        <?php
                            foreach($items as $citem){
                                ?>
                                    <div class="card product-data shadow-sm mb-3">
                                        <div class="row align-items-center justify- content-center p-3">
                                            <div class="col-md-2">
                                                <img src="images/<?= $citem['product_image']?>"  alt="" class="w-50">
                                            </div>
                                            <div class="col-md-3">
                                                <h6><?= $citem['product_name'] ?></h6>
                                            </div>
                                            <div class="col-md-3">
                                                <h6>Php <?= $citem['product_selling_price'] ?></h6>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="hidden" class="prod_id" value="<?= $citem['product_id'] ?>">
                                                <div class="input-group mb-3 mt-3" style="width:120px">
                                                    <button class="input-group-text decrement-btn update-quantity">-</button>
                                                    <input type="text" class="form-control bg-white input-quantity text-center" value="<?= $citem['product_quantity']?>" disabled>
                                                    <button class="input-group-text increment-btn update-quantity">+</button>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-danger btn-md delete_item" value="<?= $citem['cid'] ?>">
                                                <i class="fa fa-trash me-2"></i>Remove</button>
                                            </div>
                                        </div>
                                    </div>
    
                                    <?php
                                    //echo $citem['product_name'];
                                }                            
                        ?>
                    </div>
                        <div class="float-end">
                            <a href="checkout.php" class="btn btn-success">Proceed to Check Out</a>
                        </div>
                        <?php
                        }else{
                            ?>
                            <div class="card card-body text-center text-danger shadow">
                                <h4 class="py-3">Your cart is Empty</h4>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        
    </div>
</div>


<?php 
include('includes/footer.php');
?>