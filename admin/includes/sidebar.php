<?php

$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1);

?>

<div class="sidebar" id="side_nav">
        <div class="header-box px-3 pt-3 pb-4 d-flex justify-content-between">
            <h3 class="px-2 me-2 text-white">Dashboard</h3>
            <button class="btn d-md-none d-block close-btn px-2 py-0 text-white"><i class="fas fa-times"></i></button>  
        </div>
        <hr class="h-color mx-2">
        <ul class="list-unstyled px-2">
            <li class="sidebar-link"><a href="index.php?categories" class="text-decoration-none px-3 py-2 d-block" <?= $page == "index.php?categories"? 'active':''; ?>><i class="fas fa-list-alt"></i> All Categories </a></li>
            <li class="sidebar-link"><a href="index.php?add_new_category" class="text-decoration-none px-3 py-2 d-block"><i class="far fa-plus-square"></i> Add Category </a></li>
            <li class="sidebar-link"><a href="index.php?products" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-list-alt"></i> All Products </a></li>
            <li class="sidebar-link"><a href="index.php?add_new_product" class="text-decoration-none px-3 py-2 d-block"><i class="far fa-plus-square"></i> Add Product </a></li>
            <li class="sidebar-link"><a href="index.php?orders" class="text-decoration-none px-3 py-2 d-block d-flex justify-content-between">
                <span><i class="fas fa-list-alt"></i> New Orders</span>
                <span class="bg-danger rounded-pill text-white py-0 px-2"><?php displayNewOrdersCount() ?></span>
            </a></li>
            <li class="sidebar-link"><a href="index.php?out_for_delivery" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-list-alt"></i> Out For Delivery </a></li>
            <li class="sidebar-link"><a href="index.php?order_history" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-history"></i> Order History </a></li>
        </ul>
        <hr class="h-color mx-2">
        <ul class="list-unstyled px-2">
        <li class="sidebar-link"><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="far fa-plus-square"></i> Profile </a></li>
        <li class="sidebar-link"><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="far fa-plus-square"></i> Setting </a></li>
        </ul>
        <div class="sidebar-footer bottom-0">
            <div class="mx-3 mb-3">
                <a class="btn btn-danger mt-4 w-100" href="../logout.php" type="button">Logout</a>
            </div>
        </div>
    </div>