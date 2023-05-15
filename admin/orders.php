
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h4>New Orders</h4>
                </div>
                <div class="card-body" >
                    <div class="overflow-auto">
                        <table class="table table-bordered text-center bg-white">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Tracking No.</th>
                                    <th>Total Price</th>
                                    <th>Order Date</th>
                                    <th>View Order Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $orders = getNewOrders();
                                    if(mysqli_num_rows($orders) > 0){
                                        foreach($orders as $item){
                                            ?>
                                            <tr>
                                                <td><?=$item['id']; ?></td>
                                                <td><?=$item['name']; ?></td>
                                                <td><?=$item['tracking_no']; ?></td>
                                                <td><?=$item['total_price']; ?></td>
                                                <td><?=$item['created_at']; ?></td>
                                                <td><a href="index.php?track_no=<?=$item['tracking_no'];?>" class="btn btn-success">View details</a></td>
                                            </tr>
                                            <?php
                                        }
                                    }else{
                                        ?>
                                        <tr>
                                            <td col-span="5">No orders yet</td>
                                        </tr>
                                        <?php
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
