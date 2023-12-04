<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();

// Function to sanitize input data
function sanitizeInput($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sharmia Super-Login</title>

    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
    crossorigin="anonymous">

    <link rel="icon" href="../images/newlogo.jpg" type="image/icon type">

    <style>
        body{
            overflow-x: hidden;
        }
        /* Add your custom styles here */
        .error-message {
            color: red;
        }
    </style>

</head>
<body>

    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <!-- username field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username"
                        autocomplete="off" required="required" name="user_username"/>
                    </div>

                    <!-- password field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Enter Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password"
                        autocomplete="off" required="required" name="user_password"/>
                    </div>

                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="user_login">
                        <p class="small fw-bold mt-2 pt-1 mb-0" style="font-size: 16px;">Don't have an account ? <a href="user_registration.php" class="text-info" style="font-size: 18px;"> Register</a></p>
                    </div>

                    <!-- admin login -->
                    <div class="mt-4 pt-2">
                        
                        <p class="small fw-bold mt-2 pt-1 mb-0" style="font-size: 16px;"><a href="../admin_area/admin_login.php" class="text-danger" style="font-size: 15px;">Admin login</a> | 
                        <a href="../manager_area/manager_login.php" class="text-danger" style="font-size: 15px;">Manager login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php

if(isset($_POST['user_login'])){
    $user_username = sanitizeInput($_POST['user_username']);
    $user_password = sanitizeInput($_POST['user_password']);

    // Use prepared statements to prevent SQL injection
    $select_query = "SELECT * FROM user_table WHERE username=?";
    $stmt = mysqli_prepare($con, $select_query);
    mysqli_stmt_bind_param($stmt, "s", $user_username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();

    // cart items
    $select_query_cart = "SELECT * FROM cart_details WHERE ip_address=?";
    $stmt_cart = mysqli_prepare($con, $select_query_cart);
    mysqli_stmt_bind_param($stmt_cart, "s", $user_ip);
    mysqli_stmt_execute($stmt_cart);
    $result_cart = mysqli_stmt_get_result($stmt_cart);
    $row_count_cart = mysqli_num_rows($result_cart);

    if($row_count > 0) {
        $_SESSION['username'] = $user_username;
        // Validate password
        if(password_verify($user_password, $row_data['user_password'])){
            if($row_count == 1 && $row_count_cart == 0) {
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            } else {
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        } else {
            echo "<p class='error-message'>Invalid Credentials</p>";
        }
    } else {
        echo "<p class='error-message'>Invalid Credentials</p>";
    }

    mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmt_cart);
}

?>

</body>
</html>