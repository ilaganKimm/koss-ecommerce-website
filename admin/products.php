
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   <h4>Products</h4>
                </div>
                <div class="card-body" id="products_table">
                    <div class="overflow-auto">
                        <table class="table table-bordered text-center">
                            <thead class="bg-dark text-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $product = getAll("products");

                                    if(mysqli_num_rows($product)){
                                    
                                        foreach($product as $item){
                                        ?>
                                            <tr>
                                                <td><?= $item['id']; ?></td>
                                                <td><?= $item['product_name']; ?></td>
                                                <td><img src="../images/<?= $item['product_image'];?>" width="100px" height="100px" alt="<?= $item['product_name'];?>"></td>
                                                <td><?= $item['product_status'] == '0'? "Visible":"Hidden"?></td>
                                                <td>
                                                    <a href="index.php?product_id=<?= $item['id'];?>" class="btn btn-sm btn-success">Edit</a>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-danger delete_product_btn" value="<?= $item ['id']; ?>">Delete</button> 
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    }else{
                                        echo "No records found";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>                       
