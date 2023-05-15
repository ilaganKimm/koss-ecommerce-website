<?php 

include('authenticate.php');
include('functions/users_common_functions.php');
include('includes/header.php');


?>
<div class="py-3 bg-success">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white text-decoration-none" href="index.php"> Home /</a> 
            <a class="text-white text-decoration-none" href="my_orders.php"> My Purchases </a>
        </h6>
    </div>
</div>
<div class="py-5  bg-light mb-10">
    <div class="container vh-100">
        <h4>My Purchases</h4>
        <hr>
        <div class="row">
            <div class="col-md-3 mb-3">
                <a class="text-dark text-decoration-none" href="to_ship_orders.php">
                    <div class="card">
                        <div class="card-body">
                            <img src="images/to_ship.png" class="brand-img p-0 w-100" alt="brands">
                            <h6 class="text-center mt-2"> To Ship </h6>
                        </div>
                    </div>
                </a>
            </div> 
            <div class="col-md-3 mb-3">
                <a class="text-dark text-decoration-none" href="to_receive_orders.php">
                    <div class="card">
                        <div class="card-body">
                            <img src="images/to_received.png" class="brand-img p-0 w-100" alt="brands">
                            <h6 class="text-center mt-2"> To Receive </h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mb-3">
            <a class="text-dark text-decoration-none" href="received_orders.php">
                    <div class="card">
                        <div class="card-body">
                            <img src="images/completed.png" class="brand-img p-0 w-100" alt="brands">
                            <h6 class="text-center mt-2"> Completed </h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-body">
                    <img src="images/review.png" class="brand-img p-0 w-100" alt="brands">
                    <h6 class="text-center mt-2"> To Rate </h6>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>


<?php 
include('includes/footer.php');
?>