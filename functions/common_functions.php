<?php

session_start();

include('../config/connection.php');

//redirecting pages

function redirect($url, $message){
    $_SESSION['message'] = $message;
    header('Location: '. $url);
    exit();
}

//fetching data

function getAll($table){

    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);


}



function getbyID($table, $id){

    global $con;
    $query = "SELECT * FROM $table WHERE id = $id";
    return $query_run = mysqli_query($con, $query);


}

function getNewOrders(){

    global $con;
    $query = "SELECT * FROM orders WHERE status ='0'"; // 0 is under process
    return $query_run = mysqli_query($con, $query);
}

function getOrdersOut(){

    global $con;
    $query = "SELECT * FROM orders WHERE status ='1'"; //1 is out for delivery
    return $query_run = mysqli_query($con, $query);
}


function getOrderHistory(){

    global $con;
    $query = "SELECT * FROM orders WHERE status ='2'"; // 2 is completed orders
    return $query_run = mysqli_query($con, $query);
}

function checkTrackingNo($tracking_no){

    global $con;

    $query = "SELECT * FROM orders Where tracking_no = '$tracking_no'";
    return $query_run = mysqli_query($con, $query);


}
function displayNewOrdersCount(){

    global $con;
    $query = "SELECT * FROM orders Where status = '0'";
    $query_run = mysqli_query($con, $query);
    $count_new_orders = mysqli_num_rows($query_run);

    echo $count_new_orders;
}

?>