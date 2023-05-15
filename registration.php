<?php 
session_start();

if(isset($_SESSION['auth'])){
    $_SESSION['message'] = "You are already logged in";
    header('Location: index.php');
    exit();
}

include('includes/header.php');
?>

<div class="container py-5">  
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php
            if(isset($_SESSION['message'])){  
                if(is_array($_SESSION['message'])) {
                    foreach ($_SESSION['message'] as $message) {
                        ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> <?= $message; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?= $_SESSION['message']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                }
                unset($_SESSION['message']);        
            }   
            ?>
            <div class="card shadow">
                <h3 class="text-center mt-2">Registration Form</h3>
                <div class="card-body ">
                    <form action="functions/authcode.php" method="post" autocomplete="off">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username" required>
                        </div>
                        <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" title="Please enter a valid email address">
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter your 11-digit mobile number" required pattern="\d{11}" title="Please enter a valid 11-digit mobile number">
                        </div>
                        <div class="mb-3 password-validation">
                            <label for="password" class="form-label">Password </label>
                            <div class="row">
                                <div class="col-md-11">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter password"
                                required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                                </div>
                                <div class="col-md-1">
                                <span class="check-icon" id="passwordCheckIcon" style="display: none">&#10004;</span>  
                            </div>
                            </div>
                            <label class="fw-light fs-6 text-secondary">(Minimum 8 characters with at least one uppercase, one lowercase, one special character, and a number.)</label>
                        </div>
                        <div class="mb-4">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                           
                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm password" required>
                        </div>
                        
                        <button type="submit" name="register_user" class="btn btn-primary mb-3">Register</button>
                        <p class="small">Already have an account? <a class="" href="login.php">Login</a></p>
                    </form>
                </div> 
            </div>
        </div>
    </div>
</div>

<script>
  // Function to check if all password conditions are met
  function checkPassword() {
    const passwordInput = document.getElementById("password");
    const checkIcon = document.getElementById("passwordCheckIcon");
    
    // Regular expression pattern for password conditions
    const pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[-_@$!%*#?&])[\w\d\-_$!%*#?&]{8,}$/;
    
    const valid = pattern.test(passwordInput.value);
    
    if (valid) {
      checkIcon.style.display = "inline-block";
    } else {
      checkIcon.style.display = "none";
    }
  }
  
  // Event listener for password input
  const passwordInput = document.getElementById("password");
  passwordInput.addEventListener("input", checkPassword);
</script>



<?php 
include('includes/footer.php');
?>
