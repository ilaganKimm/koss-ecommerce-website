

<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                   <h4> Categories </h4>
                </div>
                <div class="card-body" id="category_table">
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
                                    $category = getAll("categories");

                                    if(mysqli_num_rows($category)){
                                    
                                        foreach($category as $item){
                                        ?>
                                            <tr>
                                                <td><?= $item['id']; ?></td>
                                                <td><?= $item['category_name']; ?></td>
                                                <td><img src="../images/<?= $item['category_image'];?>" width="100px" height="100px" alt="<?= $item['category_name'];?>"></td>
                                                <td><?= $item['category_status'] == '0'? "Visible":"Hidden"?></td>
                                                <td>
                                                    
                                                    <a href="index.php?category_id=<?= $item['id'];?>" class="btn btn-sm btn-success">Edit</a>
                                                </td>
                                                <td>
                                                    <!--form action="code.php" method="POST">
                                                        <input type="hidden" name="category_id" value ="">
                                                        <button type="submit" class="btn btn-sm btn-danger" name="delete_category_btn">Delete</button>
                                                    </form-->
                                                    <button type="button" class="btn btn-sm btn-danger delete_category_btn" value="<?= $item ['id']; ?>">Delete</button> 
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
