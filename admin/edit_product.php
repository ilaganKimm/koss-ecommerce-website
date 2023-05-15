

<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
        <?php

        if(isset($_GET['product_id'])){
            $product_id = $_GET['product_id'];
            $product = getbyID("products", $product_id);

            if(mysqli_num_rows($product) > 0){
                $data = mysqli_fetch_array($product);

        ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Product</h4>
                        
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="mb-0" for="">Select Category</label>
                                    <select name="product_category_id" class="form-select">
                                        <option selected>Select Category</option>
                                        <?php
                                            $categories = getAll("categories");
                                            if(mysqli_num_rows($categories) > 0){
                                                foreach($categories as $item){
                                                    ?>
                                                        <option value="<?= $item['id']; ?>" <?= $data['product_category_id'] == $item['id']?'selected':'' ?> ><?=$item['category_name'];?></option>
                                                    <?php
                                                }
                                            }else{
                                                echo "No Available Category";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                <input type="hidden" name="product_id" value="<?= $data['id'] ?>">
                                    <label class="mb-0" for="">Product Name</label>
                                    <input type="text" name="product_name" value="<?= $data['product_name'] ?>" class="form-control" placeholder="Enter Product Name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="mb-0" for="">Slug</label>
                                    <input type="text" name="product_slug" value="<?= $data['product_slug'] ?>" class="form-control" placeholder="Enter Slug" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="mb-0" for="">Small Description</label>
                                    <textarea name="product_small_description" value="" id="product_small_description" rows="3" class="form-control" placeholder="Enter Small Description" required><?= $data['product_small_description'] ?></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="mb-0" for="">Description</label>
                                    <textarea name="product_description" value="" id="product_description" rows="3" class="form-control" placeholder="Enter Description" required><?= $data['product_description'] ?></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="mb-0" for="">Original Price</label>
                                    <input type="text" name="product_original_price" value="<?= $data['product_original_price'] ?>" class="form-control" placeholder="Enter Original Price" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="mb-0" for="">Selling Price</label>
                                    <input type="text" name="product_selling_price" value="<?= $data['product_selling_price'] ?>" class="form-control" placeholder="Enter Selling Price" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="mb-0" for="">Upload Image</label>
                                    <input type="file" name="product_image" class="form-control">
                                    <label for="">Current Image</label>
                                    <input type="hidden" name="old_image" value="<?= $data['product_image']?>">
                                    <img src="../images/<?= $data['product_image'] ?>" width="100px" height="100px" alt="">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="mb-0" for="">Quantity</label>
                                    <input type="number" name="product_quantity" value="<?= $data['product_quantity']?>" class="form-control" placeholder="Enter Quantity" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="mb-0" for="">Status</label>
                                    <input type="checkbox" <?= $data['product_status'] ? "checked":"" ?> name="product_status">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="mb-0" for="">Trending</label>
                                    <input type="checkbox" <?= $data['product_trending'] ? "checked":"" ?> name="product_trending">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="mb-0" for="">Meta Title</label>
                                    <input type="text" name="product_meta_title" value="<?= $data['product_meta_title']?>" class="form-control" placeholder="Enter title" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="mb-0" for="">Meta Description</label>
                                    <textarea name="product_meta_description" value=""  id="product_meta_description" rows="3" class="form-control" placeholder="Enter Description" required><?= $data['product_meta_description']?></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="mb-0" for="">Meta Keywords</label>
                                    <textarea name="product_meta_keywords" value=""  id="product_meta_keywords" rows="3" class="form-control" placeholder="Enter Keywords" required><?= $data['product_meta_keywords']?></textarea>
                                </div>
                                
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" name="update_product_btn">Update</button>
                                    <a class="btn btn-outline-primary" href="index.php?products">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                    }else{
                        echo"Product Id Not found";
                    }
                }
                else
                {
                echo "Cannot fetch id from url";  
                }
            ?> 
        </div>
    </div> 
</div>                     
