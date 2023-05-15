<?php 

include('authenticate.php'); // user authentication first
include('functions/users_common_functions.php');
include('includes/header.php');

?>
<div class="py-3 bg-success">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white text-decoration-none" href="index.php"> Home /</a> 
            <a class="text-white text-decoration-none" href="my_orders.php"> My Purchases / </a>
            <a class="text-white text-decoration-none" href=""> To Ship  </a>
        </h6>
    </div>
</div>
<div class="py-5 bg-light">
    <div class="container">
        <h4>To Ship</h4>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <?php
                            $orders =  displayToShipOrders();
                            if(mysqli_num_rows($orders) > 0){
                                foreach($orders as $item){
                                    ?>
                                    <div class="col-md-3">
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <h6><?=$item['tracking_no']; ?></h6>
                                                <h6><?=$item['total_price']; ?></h6>
                                                <h6><?=$item['created_at']; ?></h6>
                                                <a href="view_order_details.php?track_no=<?=$item['tracking_no'];?>" class="btn btn-success">View details</a>

                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                    </div>
                </div>
                <?php
                            }else{
                                ?>
                                <div class="card card-body text-center text-danger shadow">
                                    <h4 class="py-3">No Orders Yet</h4>
                                </div>
                                <?php
                            }
                            ?>
            </div>
    </div>
</div>


<?php 
include('includes/footer.php');
?>