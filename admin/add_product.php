
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Product</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="mb-0" for="">Select Category</label>
                                <select name="product_category_id" class="form-select">
                                    <option selected>Select Category</option>
                                    <?php
                                        $categories = getAll('categories');
                                        if(mysqli_num_rows($categories)> 0){
                                            foreach($categories as $item){
                                                ?>
                                                    <option value="<?= $item['id'];?>"><?=$item['category_name'];?></option>
                                                <?php
                                            }
                                        }else{
                                            echo "No Available Category";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="mb-0" for="">Product Name</label>
                                <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="mb-0" for="">Slug</label>
                                <input type="text" name="product_slug" class="form-control" placeholder="Enter Slug" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="mb-0" for="">Small Description</label>
                                <textarea name="product_small_description" id="product_small_description" rows="3" class="form-control" placeholder="Enter Small Description" required></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="mb-0" for="">Description</label>
                                <textarea name="product_description" id="product_description" rows="3" class="form-control" placeholder="Enter Description" required></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="mb-0" for="">Original Price</label>
                                <input type="text" name="product_original_price" class="form-control" placeholder="Enter Original Price" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="mb-0" for="">Selling Price</label>
                                <input type="text" name="product_selling_price" class="form-control" placeholder="Enter Selling Price" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="mb-0" for="">Upload Image</label>
                                <input type="file" name="product_image" class="form-control" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="mb-0" for="">Quantity</label>
                                <input type="number" name="product_quantity" class="form-control" placeholder="Enter Quantity" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="mb-0" for="">Status</label>
                                <input type="checkbox" name="product_status">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="mb-0" for="">Trending</label>
                                <input type="checkbox" name="product_trending">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="mb-0" for="">Meta Title</label>
                                <input type="text" name="product_meta_title" class="form-control" placeholder="Enter title" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="mb-0" for="">Meta Description</label>
                                <textarea name="product_meta_description" id="product_meta_description" rows="3" class="form-control" placeholder="Enter Description" required></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="mb-0" for="">Meta Keywords</label>
                                <textarea name="product_meta_keywords" id="product_meta_keywords" rows="3" class="form-control" placeholder="Enter Keywords" required></textarea>
                            </div>
                            
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_product_btn">Save</button>
                                <a class="btn btn-outline-primary" href="products.php">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
</div>                     
