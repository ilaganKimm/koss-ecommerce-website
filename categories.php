<?php 
include('functions/users_common_functions.php');
include('includes/header.php');

?>
<div class="py-3 bg-success">
    <div class="container">
        <h6 class="text-white"><a class="text-white text-decoration-none" href="index.php"> Home </a>/ Collections </h6>
    </div>
</div>
<div class="py-3">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
            <h5 class="">CATEGORIES</h5>
            <hr>
                <div class="row">
                    <?php

                    $category = getAllActive("categories");

                    if(mysqli_num_rows($category) > 0){
                        foreach($category as $item){
                            ?>
                            <div class="col-md-2 mb-5">
                                <a class="text-decoration-none" href="product.php?category=<?=$item['category_slug']; ?>">
                                <div class="category">                               
                                    <div class="card">
                                        <div class="card-body">
                                            
                                                <img src="images/<?=$item['category_image']; ?>" class="category-img p-0 w-100" alt="category_image">
                        
                                            <h6 class="text-center"><?=$item['category_name']; ?> </h6>
                                        </div>
                                    </div>
                                </div> 
                                </a>
                            </div>
                              
                            <?php
                        }
                    }else{
                        echo"No data available";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
           <div class="col-md-12">
                <h5>COLLECTIONS</h5>
                <hr>
                    <div class="row">
                    <?php
                    $diplayAll = displayAllProducts();

                    if(mysqli_num_rows($diplayAll) > 0){
                        foreach ($diplayAll as $item){
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
    </div>
</div>


<?php 
include('includes/footer.php');
?>