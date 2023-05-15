<?php

session_start();
include('config/connection.php');

//userside fetching data
function getAllActive($table){

    global $con;
    $query = "SELECT * FROM $table WHERE category_status='0'";
    return $query_run = mysqli_query($con, $query);


}

function displayAllProducts(){

    global $con;
    $query = "SELECT * FROM products WHERE product_status='0' order by rand()";
    return $query_run = mysqli_query($con, $query);
}


function getAllTrending(){

    global $con;
    $query = "SELECT * FROM products WHERE product_trending='1' and product_status='0'";
    return $query_run = mysqli_query($con, $query);
}


function getIdActive($table, $id){

    global $con;
    $query = "SELECT * FROM $table WHERE id='$id' and category_status='0' ";
    return $query_run = mysqli_query($con, $query);


}

function getActiveSlug($table, $slug){

    global $con;
    $query = "SELECT * FROM $table WHERE category_slug='$slug' and category_status='0' LIMIT 1 ";
    return $query_run = mysqli_query($con, $query);


}

function getProductByCategory($category_Id){
    global $con;
    $query = "SELECT * FROM products WHERE product_category_id='$category_Id' and product_status='0'";
    return $query_run = mysqli_query($con, $query);

}


//for products

function getActiveProductSlug($table, $slug){

    global $con;
    $query = "SELECT * FROM $table WHERE product_slug='$slug' and product_status='0' LIMIT 1 ";
    return $query_run = mysqli_query($con, $query);


}
//redirecting pages

function redirect($url, $message){
    $_SESSION['message'] = $message;
    header('Location: '. $url);
    exit();
}

//displaying all the cart items

function getCartItems(){
    global $con;
    $user_id = $_SESSION['auth_user']['user_id'];
    $query = "SELECT c.id as cid, c.product_id, c.product_quantity, 
            p.id as pid, p.product_name, p.product_image, p.product_selling_price
            FROM carts c, products p WHERE c.product_id = p.id AND c.user_id='$user_id'
            ORDER BY c.id DESC";
    return $query_run = mysqli_query($con, $query);
}

function displayCartItemsCount(){

    global $con;
    $user_id = $_SESSION['auth_user']['user_id'];
    
    $query = "SELECT * FROM carts WHERE user_id ='$user_id'";
    $query_run = mysqli_query($con, $query);
    $count_cart_items = mysqli_num_rows($query_run);

    echo $count_cart_items;
}

function getOrderItems(){
    global $con;
    $user_id = $_SESSION['auth_user']['user_id'];
    $query = "SELECT * FROM orders WHERE user_id='$user_id' AND total_price !='0' ";
    return $query_run = mysqli_query($con, $query);

}

function checkTrackingNo($tracking_no){

    global $con;
    $user_id = $_SESSION['auth_user']['user_id'];

    $query = "SELECT * FROM orders Where tracking_no = '$tracking_no' AND user_id = '$user_id'";
    return $query_run = mysqli_query($con, $query);


}

function displayToShipOrders(){

    global $con;
    $user_id = $_SESSION['auth_user']['user_id'];
    $query = "SELECT * FROM orders WHERE user_id='$user_id' AND status ='0'"; // 0 is under process
    return $query_run = mysqli_query($con, $query);
}

function displayToReceiveOrders(){

    global $con;
    $user_id = $_SESSION['auth_user']['user_id'];
    $query = "SELECT * FROM orders WHERE user_id='$user_id' AND status ='1'"; // 0 is under process
    return $query_run = mysqli_query($con, $query);
}

function displayReceivedOrders(){

    global $con;
    $user_id = $_SESSION['auth_user']['user_id'];
    $query = "SELECT * FROM orders WHERE user_id='$user_id' AND status ='2'"; // 0 is under process
    return $query_run = mysqli_query($con, $query);
}



?>