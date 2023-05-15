

<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Category</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="mb-0" for="">Category Name</label>
                                <input type="text" name="category_name" class="form-control" placeholder="Enter Category Name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="mb-0" for="">Slug</label>
                                <input type="text" name="category_slug" class="form-control" placeholder="Enter Slug" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="mb-0" for="">Description</label>
                                <textarea name="category_description" id="category_description" rows="3" class="form-control" placeholder="Enter Description" required></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="mb-0" for="">Upload Image</label>
                                <input type="file" name="category_image" class="form-control" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="mb-0" for="">Meta Title</label>
                                <input type="text" name="category_meta_title" class="form-control" placeholder="Enter title" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="mb-0" for="">Meta Description</label>
                                <textarea name="category_meta_description" id="category_meta_description" rows="3" class="form-control" placeholder="Enter Description" required></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="mb-0" for="">Meta Keywords</label>
                                <textarea name="category_meta_keywords" id="category_meta_keywords" rows="3" class="form-control" placeholder="Enter Keywords" required></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="mb-0" for="">Status</label>
                                <input type="checkbox" name="category_status">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="mb-0" for="">Popular</label>
                                <input type="checkbox" name="category_popular">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_category_btn">Save</button>
                                <a class="btn btn-outline-primary" href="category.php">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
</div>                     
