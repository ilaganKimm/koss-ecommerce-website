<?php
session_start();
include('../config/connection.php');

if (isset($_SESSION['auth'])) {
    if (isset($_POST['place-order-btn'])) {

        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
        $zipcode = mysqli_real_escape_string($con, $_POST['zipcode']);
        $address = mysqli_real_escape_string($con, $_POST['address']);
        $payment_mode = mysqli_real_escape_string($con, $_POST['payment_mode']);

        if ($name == "" || $email == "" || $mobile == "" || $zipcode == "" || $address == "") {
            $_SESSION['message'] = "All fields are mandatory";
            header('Location: ../checkout.php');
            exit(0);
        }

        $user_id = $_SESSION['auth_user']['user_id'];
        $query = "SELECT c.id as cid, c.product_id, c.product_quantity, 
                        p.id as pid, p.product_name, p.product_image, p.product_selling_price
                        FROM carts c, products p WHERE c.product_id = p.id AND c.user_id = ?
                        ORDER BY c.id DESC";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "i", $user_id);
        mysqli_stmt_execute($stmt);
        $query_run = mysqli_stmt_get_result($stmt);

        $totalPrice = 0;
        foreach ($query_run as $citem) {
            $totalPrice += $citem['product_selling_price'] * $citem['product_quantity'];
        }

        $tracking_no = "KOSS" . rand(11111, 99999) . substr($mobile, 2);

        $insert_query = "INSERT INTO orders (tracking_no, user_id, name, email, mobile, address, zipcode,
            total_price, payment_mode) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $insert_query);
        mysqli_stmt_bind_param($stmt, "sissssdss", $tracking_no, $user_id, $name, $email, $mobile, $address, $zipcode, $totalPrice, $payment_mode);
        $insert_query_run = mysqli_stmt_execute($stmt);

        if ($insert_query_run) {
            $order_id = mysqli_insert_id($con);

            foreach ($query_run as $citem) {
                $product_id = $citem['product_id'];
                $product_qty = $citem['product_quantity'];
                $price = $citem['product_selling_price'];

                $insert_items_query = "INSERT INTO order_items (order_id,product_id,quantity,price)
                    VALUES (?, ?, ?, ?)";
                $stmt = mysqli_prepare($con, $insert_items_query);
                mysqli_stmt_bind_param($stmt, "iiid", $order_id, $product_id, $product_qty, $price);
                mysqli_stmt_execute($stmt);

                $product_query = "SELECT * FROM products WHERE id = ? LIMIT 1";
                $stmt = mysqli_prepare($con, $product_query);
                mysqli_stmt_bind_param($stmt, "i", $product_id);
                mysqli_stmt_execute($stmt);
                $product_query_run = mysqli_stmt_get_result($stmt);
                $product_data = mysqli_fetch_array($product_query_run);
                $current_qty = $product_data['product_quantity'];
                              $new_quantity = $current_qty - $product_qty;

                $update_quantity_query = "UPDATE products SET product_quantity = ? WHERE id = ?";
                $stmt = mysqli_prepare($con, $update_quantity_query);
                mysqli_stmt_bind_param($stmt, "ii", $new_quantity, $product_id);
                mysqli_stmt_execute($stmt);
            }

            $delete_cartItems_query = "DELETE FROM carts WHERE user_id = ?";
            $stmt = mysqli_prepare($con, $delete_cartItems_query);
            mysqli_stmt_bind_param($stmt, "i", $user_id);
            mysqli_stmt_execute($stmt);

            $_SESSION['message'] = "Orders placed successfully";
            header('Location: ../my_orders.php');
            exit();
        }
    }
} else {
    header('Location: index.php');
    exit();
}



?>