<?php

if(!isset($_SESSION['auth'])){
    $_SESSION['message'] = "Login to continue";
    header('Location: login.php');
    //redirect("login.php","Login to continue");
}


?>