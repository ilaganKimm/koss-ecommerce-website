<?php 
session_start();


if(isset($_SESSION['auth'])){
    $_SESSION['message'] = "You are already logged in";
    header('Location: index.php');
    exit();

}

include('includes/header.php');
?>


<div class="container py-5 vh-100 mb-10">  
<div class="row justify-content-center">
    <div class="col-md-6">
    <?php
        if(isset($_SESSION['message'])){  
    ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
     <strong>Hey!</strong> <?= $_SESSION['message']; ?>
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
        unset($_SESSION['message']);        
    }   
    ?>
        <div class="card shadow">
            <h3 class="text-center mt-2">Login Form</h3>
            <div class="card-body ">
                <form action="functions/authcode.php" method ="post" autocomplete="off">   
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name ="password" id="password" placeholder="Enter your password" required>
                    </div>
                    
                    <button type="submit" name="user_login" class="btn btn-primary mb-3">Login</button>
                    <p class="small">Don't have an account? <a class="" href="registration.php">Register</a></p>
                </form>
            </div> 
        </div>
    </div>
</div>
</div>

    

<?php 

include('includes/footer.php');

?>