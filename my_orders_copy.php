<?php 

include('functions/users_common_functions.php');
include('includes/header.php');
include('authenticate.php');

?>
<div class="py-3 bg-success">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white text-decoration-none" href="index.php"> Home /</a> 
            <a class="text-white text-decoration-none" href="my_orders.php"> My Orders </a>
        </h6>
    </div>
</div>
<div class="py-5 bg-light">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered text-center bg-white shadow">
                        <thead class="bg-dark text-white">
                            
                        <?php
                            $orders = getOrderItems();
                            if(mysqli_num_rows($orders) > 0){
                                echo
                                "<tr>
                                <th>Tracking No.</th>
                                <th>Total Price</th>
                                <th>Order Date</th>
                                <th>View Order Details</th>
                            </tr>
                        </thead>
                        <tbody>";
                                foreach($orders as $item){
                                    ?>
                                    <tr >
                                        
                                        <td><?=$item['tracking_no']; ?></td>
                                        <td><?=$item['total_price']; ?></td>
                                        <td><?=$item['created_at']; ?></td>
                                        <td><a href="view_order_details.php?track_no=<?=$item['tracking_no'];?>" class="btn btn-success">View details</a></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                
                        </tbody>
                    </table>
                            
                    
                </div>
                <?php
                            }else{
                                ?>
                                <div class="card card-body text-center text-danger shadow">
                                    <h4 class="py-3">Your cart is Empty</h4>
                                </div>
                                <?php
                            }
                            ?>
            </div>
        </div>
    </div>
</div>


<?php 
include('includes/footer.php');
?>