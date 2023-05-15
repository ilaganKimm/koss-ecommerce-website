<?php 

include('authenticate.php'); // user authentication first
include('functions/users_common_functions.php');
include('includes/header.php');

if(isset($_GET['track_no'])){
    $tracking_no = $_GET['track_no'];

    $order_data = checkTrackingNo($tracking_no);

    if(mysqli_num_rows($order_data) < 0){
        ?>
            <h4>Something went wrong</h4>
        <?php
        die();
    }

}else{
    ?>
        <h4>Something went wrong</h4>
    <?php
    die();
}

$data = mysqli_fetch_array($order_data);
?>

<div class="py-3 bg-success">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white text-decoration-none" href="index.php"> Home /</a> 
            <a class="text-white text-decoration-none" href="my_orders.php"> My Purchases / </a>
            <a class="text-white text-decoration-none" href="#"> Order Details</a>
        </h6>
    </div>
</div>
<div class="py-5 bg-light">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-header bg-success">
                            <span  class="text-white fs-5">Order Details</span>
                            <a href="my_orders.php" class="btn btn-warning float-end"> <i class="fa fa-reply"></i> Back </a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Delivery Details</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Name</label>
                                            <div class="border p-1">
                                                <?=$data['name'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Email</label>
                                            <div class="border p-1">
                                                <?=$data['email'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12  mb-2">
                                            <label class="fw-bold">Mobile Number</label>
                                            <div class="border p-1">
                                                <?=$data['mobile'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Tracking No.</label>
                                            <div class="border p-1">
                                                <?=$data['tracking_no'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Delivery Address</label>
                                            <div class="border p-1">
                                                <?=$data['address'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Zip code</label>
                                            <div class="border p-1">
                                                <?=$data['zipcode'] ?>
                                            </div>
                                        </div>


                                    </div>
                                </div>  
                                <div class="col-md-6">
                                    <h3>Payment Details</h3>
                                    <hr>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $user_id = $_SESSION['auth_user']['user_id'];

                                                $order_query = "SELECT o.id, o.tracking_no, o.user_id, oi.*, p.* FROM orders o, order_items oi,
                                                products p WHERE o.user_id = '$user_id' AND oi.order_id = o.id AND p.id= oi.product_id
                                                AND o.tracking_no = '$tracking_no'";
                                                $order_query_run = mysqli_query($con, $order_query);

                                                if(mysqli_num_rows($order_query_run) > 0)
                                                {
                                                    foreach($order_query_run as $item){
                                                        ?>
                                                            <tr>
                                                                <td class="align-middle"><img src="images/<?=$item['product_image'];?>"  alt="<?=$item['product_name'];?>" width="50px" height="50px">
                                                                    <?=$item['product_name'];?>
                                                                </td>
                                                                <td class="align-middle"> Php <?=$item['price'];?></td>
                                                                <td class="align-middle"> x <?=$item['quantity'];?></td>
                                                            </tr>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <h5>Total Payment : <span class="float-end fw-bold"><?=$data['total_price']; ?></span></h5>
                                    <hr>
                                    <label class="fw-bold">Payment Mode</label>
                                    <div class="border p-1 mb-2"> 
                                        <?=$data['payment_mode']?>
                                    </div>
                                    <label class="fw-bold">Status</label>
                                    <div class="border p-1 text-bold">
                                        <?php 
                                        if($data['status'] == 0){
                                            echo "Under Process";

                                        }else if($data['status'] == 1){
                                            echo "Out for Delivery";

                                        }else if($data['status'] == 2){
                                            echo "Order Received";
                                        }
                                        ?>
                                    </div>
                                    
                                    <label class=" fw-light fs-6 text-secondary">Confirm receipt after you've checked
                                    the received items and made payment.</label>
                                    <button class="btn btn-secondary float-end mt-3" disabled>Order Received</button>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php 
include('includes/footer.php');
?>