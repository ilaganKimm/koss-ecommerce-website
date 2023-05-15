<?php 
include('functions/users_common_functions.php');
include('includes/header.php');



if(isset($_GET['category'])){


    $category_slug = $_GET['category'];
    $category_data = getActiveSlug("categories", $category_slug);
    $category = mysqli_fetch_array($category_data);

        if($category){
        $category_Id = $category['id'];
    ?>

    <div class="py-3 bg-success">
        <div class="container">
            <h6 class="text-white">
            <a class="text-white text-decoration-none" href="index.php">Home /</a>
            <a class="text-white text-decoration-none" href="categories.php"> Collections /</a>
            <?= $category['category_name']; ?></h6>
        </div>
    </div>
    <div class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <h2 class="text-end"><?= $category['category_name']; ?></h2>
                <hr>
                    <div class="row">
                        <?php

                        $products = getProductByCategory($category_Id);

                        if(mysqli_num_rows($products) > 0){
                            foreach($products as $item){
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
                        }else{
                            echo"No data available";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php 
    }else{
    echo "Something went wrong";
    }
}
else{
    echo "Something went wrong";
}
include('includes/footer.php');
?>