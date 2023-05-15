
<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h4 class=""> Orders Out For Delivery </h4>
                </div>
                <div class="card-body">
                    <div class="overflow-auto">
                        <table class="table table-bordered text-center bg-white">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Tracking No.</th>
                                    <th>Total Price</th>
                                    <th>Order Date</th>
                                    <th>Remarks</th>
                                    <th>Update Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    $orders = getOrdersOut();
                                    if(mysqli_num_rows($orders) > 0){
                                        foreach($orders as $item){
                                            ?>
                                            <tr>
                                                <td><?=$item['id']; ?></td>
                                                <td><?=$item['name']; ?></td>
                                                <td><?=$item['tracking_no']; ?></td>
                                                <td><?=$item['total_price']; ?></td>
                                                <td><?=$item['created_at']; ?></td>
                                                <td><button class="btn btn-warning"<?= $item['status'] == '1'? "Out For Delivery":""?>>Out For Delivery</button></td>
                                                <td><a href="index.php?track_no=<?=$item['tracking_no'];?>" class="btn btn-success">Update Status</a></td>
                                            </tr>
                                            <?php
                                        }
                                    }else{
                                        ?>
                                        <tr>
                                            <td col-span="5">No completed orders yet</td>
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
