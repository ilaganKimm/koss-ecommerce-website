

<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <?php

                if(isset($_GET['category_id'])){
                    $category_id = $_GET['category_id'];
                    $category = getbyID("categories", $category_id);

                    if(mysqli_num_rows($category) > 0){
                        $data = mysqli_fetch_array($category);

                        ?>
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Category</h4>
                            </div>
                            <div class="card-body">
                                <form action="code.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <input type="hidden" name="category_id" value="<?= $data['id'] ?>">
                                            <label class="mb-0" for="">Category Name</label>
                                            <input type="text" name="category_name" value="<?= $data['category_name'] ?>" class="form-control" placeholder="Enter Category Name" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="mb-0" for="">Slug</label>
                                            <input type="text" name="category_slug" value="<?= $data['category_slug'] ?>" class="form-control" placeholder="Enter Slug" required>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="mb-0" for="">Description</label>
                                            <textarea name="category_description" id="category_description" rows="3" class="form-control" placeholder="Enter Description" required><?= $data['category_description'] ?></textarea>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="mb-0" for="">Upload Image</label>
                                            <input type="file" name="category_image" class="form-control">
                                            <label for="">Current Image</label>
                                            <input type="hidden" name="old_image" value="<?= $data['category_image']?>">
                                            <img src="../images/<?= $data['category_image'] ?>" width="100px" height="100px" alt="">
                                            
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="mb-0" for="">Meta Title</label>
                                            <input type="text" name="category_meta_title" value="<?= $data['category_meta_title'] ?>"  class="form-control" placeholder="Enter title" required>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="mb-0" for="">Meta Description</label>
                                            <textarea name="category_meta_description" id="category_meta_description" rows="3" class="form-control" placeholder="Enter Description" required><?= $data['category_meta_description'] ?></textarea>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="mb-0" for="">Meta Keywords</label>
                                            <textarea name="category_meta_keywords" id="category_meta_keywords" rows="3" class="form-control" placeholder="Enter Keywords" required><?= $data['category_meta_keywords'] ?></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Status</label>
                                            <input type="checkbox" <?= $data['category_status'] ? "checked":"" ?> name="category_status">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Popular</label>
                                            <input type="checkbox" <?= $data['category_popular'] ? "checked":"" ?> name="category_popular">
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary" name="update_category_btn">Update</button>
                                            <a class="btn btn-outline-primary" href="index.php?categories">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                    }else{
                        echo"Category Not found";
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
