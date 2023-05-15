<?php
//session_start();
include('../config/connection.php');
include('../functions/common_functions.php');

if(isset($_POST['add_category_btn'])){
    $category_name = $_POST['category_name'];
    $category_slug = $_POST['category_slug'];
    $category_description = $_POST['category_description'];
    $category_meta_title = $_POST['category_meta_title'];
    $category_meta_description = $_POST['category_meta_description'];
    $category_meta_keywords = $_POST['category_meta_keywords'];
    $category_status = isset($_POST['category_status']) ? '1':'0';
    $category_popular = isset($_POST['category_popular']) ? '1':'0';
    
    $category_image = $_FILES['category_image']['name'];
   
    $path = "../images";

    $image_ext = pathinfo($category_image, PATHINFO_EXTENSION); 
    $image_filename = time().'.'.$image_ext; // for renaming the images when saved in the folder


    //insert category data

    $category_query = "INSERT INTO categories (category_name,category_slug,category_description,
    category_meta_title,category_meta_description,category_meta_keywords,category_status,category_popular,category_image) 
    VALUES ('$category_name','$category_slug','$category_description','$category_meta_title',
    '$category_meta_description','$category_meta_keywords','$category_status','$category_popular','$image_filename')";

    $category_query_run = mysqli_query($con, $category_query);

    if($category_query_run){
        move_uploaded_file($_FILES['category_image']['tmp_name'], $path.'/'.$image_filename);
        redirect("index.php?add_new_category","Category saved successfully");
    }else{
        redirect("index.php?add_new_category","Category didn't saved");
    }

    //updating category    
}
else if(isset($_POST['update_category_btn'])){
    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];
    $category_slug = $_POST['category_slug'];
    $category_description = $_POST['category_description'];
    $category_meta_title = $_POST['category_meta_title'];
    $category_meta_description = $_POST['category_meta_description'];
    $category_meta_keywords = $_POST['category_meta_keywords'];
    $category_status = isset($_POST['category_status']) ? '1':'0';
    $category_popular = isset($_POST['category_popular']) ? '1':'0';
   
    $new_image = $_FILES['category_image']['name'];
    $old_image = $_POST['old_image'];

    
    
    if($new_image != ""){
        //$update_filename = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION); 
        $update_filename = time().'.'.$image_ext;
    }else{
        $update_filename = $old_image;
    }

    $path = "../images";

    $update_query = "UPDATE categories SET category_name='$category_name', category_slug='$category_slug',
    category_description='$category_description', category_meta_title='$category_meta_title',
    category_meta_description='$category_meta_description', category_meta_keywords='$category_meta_keywords',
    category_status='$category_status', category_popular='$category_popular', category_image='$update_filename'
    WHERE id='$category_id'";

    $update_query_run = mysqli_query($con, $update_query);

    if($update_query_run)
    {
        if($_FILES['category_image']['name'] != "")
        {
            move_uploaded_file($_FILES['category_image']['tmp_name'], $path.'/'.$update_filename);
            if(file_exists("../images/".$old_image))
            {
                unlink("../images/".$old_image);
            }
        }
        redirect("index.php?category_id=$category_id", "Category updated successfully");
    }else{
        redirect("index.php?category_id=$category_id", "Something went wrong");
    }

}
else if(isset($_POST['delete_category_btn'])){
    $category_id = mysqli_real_escape_string($con, $_POST['category_id']);

    $category_query = "SELECT * FROM categories WHERE id='$category_id'";
    $category_query_run = mysqli_query($con, $category_query);
    $category_data = mysqli_fetch_array($category_query_run);
    $category_image = $category_data['category_image']; //fetching image name from th table

    $delete_query = " DELETE fROM categories WHERE  id='$category_id'";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run){
        if(file_exists("../images/".$category_image)) 
            {
                unlink("../images/".$category_image); //deleting the image from the folder
            }
        //redirect("category.php", "Category deleted successfully");
        echo 200;
        
    }else{
        //redirect("category.php", "Something went wrong");
        echo 500;
    }

    //inserting products

}
else if(isset($_POST['add_product_btn'])){
    $product_category_id = $_POST['product_category_id'];
    $product_name = $_POST['product_name'];
    $product_slug = $_POST['product_slug'];
    $product_small_description = $_POST['product_small_description'];
    $product_description = $_POST['product_description'];
    $product_original_price = $_POST['product_original_price'];
    $product_selling_price = $_POST['product_selling_price'];
    $product_quantity = $_POST['product_quantity'];
    $product_meta_title = $_POST['product_meta_title'];
    $product_meta_description = $_POST['product_meta_description'];
    $product_meta_keywords = $_POST['product_meta_keywords'];
    $product_status = isset($_POST['product_status']) ? '1':'0';
    $product_trending = isset($_POST['product_trending']) ? '1':'0';
   

    $product_image = $_FILES['product_image']['name'];
   
    $path = "../images";

    $image_ext = pathinfo($product_image, PATHINFO_EXTENSION); 
    $image_filename = time().'.'.$image_ext; // for renaming the images when saved in the folder


    //insert category data

    $product_query = "INSERT INTO products (product_category_id,product_name,product_slug,
    product_small_description,product_description,product_original_price,product_selling_price,
    product_quantity,product_meta_title,
    product_meta_keywords,product_meta_description,product_status,product_trending,product_image) 
    VALUES ('$product_category_id','$product_name','$product_slug','$product_small_description',
    '$product_description','$product_original_price','$product_selling_price',
    '$product_quantity','$product_meta_title','$product_meta_keywords',
    '$product_meta_description','$product_status','$product_trending','$image_filename')";

    $product_query_run = mysqli_query($con, $product_query);

    if($product_query_run){
        move_uploaded_file($_FILES['product_image']['tmp_name'], $path.'/'.$image_filename);
        redirect("index.php?add_new_product","Product saved successfully");
    }else{
        redirect("index.php?add_new_product","Product didn't saved");
    }

}
else if(isset($_POST['update_product_btn'])){
    $product_id = $_POST['product_id'];
    $product_category_id = $_POST['product_category_id'];
    $product_name = $_POST['product_name'];
    $product_slug = $_POST['product_slug'];
    $product_small_description = $_POST['product_small_description'];
    $product_description = $_POST['product_description'];
    $product_original_price = $_POST['product_original_price'];
    $product_selling_price = $_POST['product_selling_price'];
    $product_quantity = $_POST['product_quantity'];
    $product_meta_title = $_POST['product_meta_title'];
    $product_meta_description = $_POST['product_meta_description'];
    $product_meta_keywords = $_POST['product_meta_keywords'];
    $product_status = isset($_POST['product_status']) ? '1':'0';
    $product_trending = isset($_POST['product_trending']) ? '1':'0';

    $new_image = $_FILES['product_image']['name'];
    $old_image = $_POST['old_image'];

    
    
    if($new_image != ""){
        //$update_filename = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION); 
        $update_filename = time().'.'.$image_ext;
    }else{
        $update_filename = $old_image;
    }

    $path = "../images";

    $update_query = "UPDATE products SET product_category_id='$product_category_id',product_name='$product_name', product_slug='$product_slug',
    product_small_description='$product_small_description', product_description='$product_description',
    product_original_price='$product_original_price',product_selling_price=' $product_selling_price',
    product_quantity='$product_quantity',product_meta_title='$product_meta_title',
    product_meta_description='$product_meta_description',product_meta_keywords='$product_meta_keywords',
    product_status='$product_status',product_trending='$product_trending',product_image='$update_filename'
    WHERE id='$product_id'";

    $update_query_run = mysqli_query($con, $update_query);

    if($update_query_run)
    {
        if($_FILES['product_image']['name'] != "")
        {
            move_uploaded_file($_FILES['product_image']['tmp_name'], $path.'/'.$update_filename);
            if(file_exists("../images/".$old_image))
            {
                unlink("../images/".$old_image);
            }
        }
        redirect("index.php?product_id=$product_id", "Product updated successfully");
    }else{
        redirect("index.php?product_id=$product_id", "Something went wrong");
    }


}
else if(isset($_POST['delete_product_btn'])){
    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);

    $product_query = "SELECT * FROM products WHERE id='$product_id'";
    $product_query_run = mysqli_query($con, $product_query);
    $product_data = mysqli_fetch_array($product_query_run);
    $product_image = $product_data['product_image']; //fetching image name from th table

    $delete_query = " DELETE FROM products WHERE  id='$product_id'";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run){
        if(file_exists("../images/".$product_image)) 
            {
                unlink("../images/".$product_image); //deleting the image from the folder
            }

        //redirect("products.php", "Product deleted successfully");
        echo 200; //ajax response meaning successful
        
    }else{
        //redirect("products.php", "Something went wrong");
        echo 500; //ajax response meaning error
    }
}
else if(isset($_POST['update_order_status_btn'])){
    $tracking_no = $_POST['tracking_no'];
    $order_status = $_POST['order_status'];

    $order_status_update_query = "UPDATE orders SET status='$order_status' WHERE tracking_no='$tracking_no'";
    $order_status_update_query_run = mysqli_query($con, $order_status_update_query);

        if($order_status_update_query_run){

            redirect("index.php?track_no=$tracking_no", "Order status updated");

        }else{ 

            redirect("index.php?track_no=$tracking_no", "Something went wrong");

        }
}
else
{
    header('Location: ../index.php');
}
?>