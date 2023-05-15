<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include('../config/connection.php');

if (isset($_POST['register_user'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Form validation
    $errors = array();

    // Check if username is provided
    if (empty($username)) {
        $errors[] = "Username is required";
    }

    // Check if email is provided and valid
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // Check if mobile number is provided and valid
    if (empty($mobile)) {
        $errors[] = "Mobile number is required";
    } elseif (!preg_match('/^[0-9]{11}$/', $mobile)) {
        $errors[] = "Invalid mobile number format";
    }

    // Check if password is provided and meets the requirements
    if (empty($password)) {
        $errors[] = "Password is required";
    } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[-_@$!%*#?&])[A-Za-z\d\-_$!%*#?&]{8,}$/', $password)) {
        $errors[] = "Password must have a minimum of 8 characters with at least one uppercase letter, one lowercase letter, one special character (-, _, @, $, !, %, *, #, ?, or &), and one number";
    }

    // Check if password and confirm password match
    if ($password !== $confirm_password) {
        $errors[] = "Password does not match";
    }

    // Check if email is already used
    $email_query = "SELECT * FROM users WHERE email=?";
    $stmt = mysqli_prepare($con, $email_query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $errors[] = "Email already registered";
    }

    // If there are any validation errors, display them and redirect back to registration page
    if (!empty($errors)) {
        $_SESSION['message'] = $errors;
        header('Location: ../registration.php');
        exit();
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $insert_query = "INSERT INTO users (username, email, mobile, password) 
                         VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $insert_query);
        mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $mobile, $hashed_password);
        $run_query = mysqli_stmt_execute($stmt);

        if ($run_query) {
            // Registration Successful
            $_SESSION['message'] = "Registration Successful";
            header('Location: ../login.php');
            exit();
        } else {
            // Registration Failed: Display error message
            $_SESSION['message'] = "Registration Failed: " . mysqli_error($con);
            header('Location: ../registration.php');
            exit();
        }
    }
}


//login code

 else if (isset($_POST['user_login'])) {
     $email = $_POST['email'];
     $password = $_POST['password'];
 
     $login_query = "SELECT * FROM users WHERE email = ?";
     $stmt = mysqli_prepare($con, $login_query);
     mysqli_stmt_bind_param($stmt, "s", $email);
     mysqli_stmt_execute($stmt);
     $run_login_query = mysqli_stmt_get_result($stmt);
 
     if (mysqli_num_rows($run_login_query) > 0) {
         $userdata = mysqli_fetch_array($run_login_query);
         $hashed_password = $userdata['password'];
 
         if (password_verify($password, $hashed_password)) {
             $_SESSION['auth'] = true;
 
             $user_id = $userdata['user_id'];
             $username = $userdata['username'];
             $email = $userdata['email'];
             $role = $userdata['role'];
 
             $_SESSION['auth_user'] = [
                 'user_id' => $user_id,
                 'username' => $username,
                 'email' => $email
             ];
 
             $_SESSION['role'] = $role;
 
             if ($role == 1) {
                 $_SESSION['message'] = "Welcome to the Admin dashboard";
                 header('Location: ../admin/index.php');
             } else {
                 $_SESSION['message'] = "Logged in successfully";
                 header('Location: ../index.php');
             }
         } else {
             $_SESSION['message'] = "Invalid username or password";
             header('Location: ../login.php');
         }
     } else {
         $_SESSION['message'] = "Invalid username or password";
         header('Location: ../login.php');
     }
 }
 
?>