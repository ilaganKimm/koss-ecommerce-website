<?php 
//session_start();
include('functions/users_common_functions.php');
include('includes/header.php');
include('includes/slider.php');

?>
<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="">Top Trending</h4>
                <hr>
                <div class="row">
                        <?php
                            $trendingProducts = getAllTrending();

                            if(mysqli_num_rows($trendingProducts) > 0){
                                foreach ($trendingProducts as $item){
                                        ?>
                                        <div class="col-md-3 mb-3">
                                            <a class= "" href="product_details.php?product=<?=$item['product_slug']; ?>">                                
                                                <div class="card shadow">
                                                    <div class="card-body">
                                                            <img src="images/<?=$item['product_image']; ?>" class="product-img p-0 w-100" alt="product_image"> 
                                                        <div class="content">
                                                            <p class="fw-bold">₱<?=$item['product_selling_price']?></p>
                                                            <h6 class=""><?=$item['product_name']; ?></h6>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <s class="text-secondary">₱<?=$item['product_original_price']?></s> 
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <i class="fa fa-heart me-2 float-end"></i>
                                                                </div>
                                                            </div>      
                                                        </div>     
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <?php
                                }
                            }
                        ?>     
                    
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <h4 class="">Brands</h4>
            <div class="col-md-3 mt-3 mb-2">   
                <div class="card">
                    <div class="card-body">
                        <img src="images/converse.png" class="brand-img p-0 w-100" alt="brands">
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-3 mb-2">   
                <div class="card">
                    <div class="card-body">
                        <img src="images/adidas.png" class="brand-img p-0 w-100"  alt="brands">
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-3 mb-2">   
                <div class="card">
                    <div class="card-body">
                        <img src="images/puma.png" class="brand-img p-0 w-100"  alt="brands">
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-3 mb-2">   
                <div class="card">
                    <div class="card-body">
                        <img src="images/nike.png" class="brand-img p-0 w-100" alt="brands">
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-3 mb-2">   
                <div class="card">
                    <div class="card-body">
                        <img src="images/champion.png" class="brand-img p-0 w-100" alt="brands">
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-3 mb-2">   
                <div class="card">
                    <div class="card-body">
                        <img src="images/new_balance.png" class="brand-img p-0 w-100" alt="brands">
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-3 mb-2">   
                <div class="card">
                    <div class="card-body">
                        <img src="images/vans.png" class="brand-img p-0 w-100" alt="brands">
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-3 mb-2">   
                <div class="card">
                    <div class="card-body">
                        <img src="images/reebok.png" class="brand-img p-0 w-100" alt="brands">
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-8 mt-5 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h6>Experience a Shopping Spree of a Lifetime on KOSS</h6>
                        <p> Find what you need at the best prices.  
                            Not sure what to buy? be up-to-date with trending products KOSS
                            has all the latest trending branded shoes, clothes, bags, and accessories.
                            Browse effortlessly through our product categories where you can find
                            the perfect gifts for your love ones at the best price. 
                            So what are you waiting for? Add it to cart now! </p>

                        <h6>Authentic Product Guaranteed</h6>
                        <p> We assure you that all our products are Original.</p>

                        <h6>Free Shipping Everyday</h6>
                        <p> Enjoy KOSS’s free shipping everyday! 
                            For buyers, shop to your heart’s content and enjoy lower prices 
                            for your purchases with the help of KOSS’s free shipping.
                            Make sure to keep an eye out for our monthly sales! 
                            You don’t have to worry about the price going up because of shipping.
                            </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-5">
                <div class="card bg-dark">
                    <div class="card-body">
                        <img src="images/koss_logo3.png" class="about-img p-0 w-100"  alt="">
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <h4 class="text-center">Message Us</h4>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                    <form action="" method ="post" autocomplete="off">   
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea name="message" class="form-control" rows="5" cols="8" placeholder="Enter your message" resize="none" required></textarea>
                    </div>
                    
                    <button type="submit" name="send_message" class="btn btn-success mb-3">Submit</button>
                </form>
                    </div>
                </div>
            </div>
        </div>

        


    </div>
</div>


<?php 
include('includes/footer.php');
?>

<script>
    $(document).ready(function () {
            $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    })
});
</script>