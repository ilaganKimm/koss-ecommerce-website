<?php

include('../functions/common_functions.php');

if(isset($_SESSION['auth'])){

    if($_SESSION['role'] != 1){
        //$_SESSION['message'] = "You are not authorized to access this page";
        //header('Location: ../index.php');
        redirect("../index.php", "You are not authorized to access this page");
    }
}else{
    //$_SESSION['message'] = "Login to continue";
    //header('Location: ../login.php');
    redirect("../login.php", "Login to continue");
}

?>