<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sharmia Super-Registration</title>

    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
    crossorigin="anonymous">

    <link rel="icon" href="../images/newlogo.jpg" type="image/icon type">

    <script>
        function validatePassword() {
            var password = document.getElementById("user_password").value;
            var confirmPassword = document.getElementById("conf_user_password").value;

            // Password must be at least 8 characters long and contain at least one digit, one lowercase letter, one uppercase letter, and one special character.
            var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}$/;

            if (!password.match(passwordRegex)) {
                alert("Password must be at least 8 characters long and contain at least one digit, one lowercase letter, one uppercase letter, and one special character.");
                return false;
            }

            if (password !== confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }

            return true;
        }
    </script>

</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="mulipart/form-data">
                    <!-- username field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username"
                        autocomplete="off" required="required" name="user_username"/>
                    </div>

                    <!-- email field with email validation -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Enter your email"
                        autocomplete="off" required="required" name="user_email"/>
                    </div>

                    <!-- password field with password validation -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Enter Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password"
                        autocomplete="off" required="required" name="user_password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}$"
                        title="Password must be at least 8 characters long and contain at least one digit, one lowercase letter, one uppercase letter, and one special character."/>
                    </div>

                    <!-- confirm password field -->
                    <div class="form-outline mb-4">
                        <label for="conf_user_password" class="form-label">Confirm Password</label>
                        <input type="password" id="conf_user_password" class="form-control" placeholder="Enter your password again"
                        autocomplete="off" required="required" name="conf_user_password"/>
                    </div>

                    <!-- address field -->
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Enter your address"
                        autocomplete="off" required="required" name="user_address"/>
                    </div>

                    <!-- contact field -->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" id="user_contact" class="form-control" placeholder="Enter your mobile number"
                        autocomplete="off" required="required" name="user_contact"/>
                    </div>

                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
                        <p class="small fw-bold mt-2 pt-1 mb-0" style="font-size: 16px;">Already have an account ? <a href="user_login.php" class="text-info" style="font-size: 18px;"> Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<!-- php code for registration -->
<?php
if(isset($_POST['user_register'])){
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_ip = getIPAddress();

    // Validate email format
    if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format')</script>";
    } else {
        // Validate password match
        if ($user_password != $conf_user_password) {
            echo "<script>alert('Password do not match')</script>";
        } else {
            // Continue with your registration logic
            $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
            $select_query = "SELECT * FROM user_table WHERE username='$user_username' or user_email='$user_email'";
            $result = mysqli_query($con, $select_query);
            
            if ($result) {
                $rows_count = mysqli_num_rows($result);
                if ($rows_count > 0) {
                    echo "<script>alert('Username and Email already exists')</script>";
                } else {
                    $insert_query = "INSERT INTO user_table (username, user_email, user_password, user_ip, user_address, user_mobile) values ('$user_username', '$user_email', '$hash_password', '$user_ip', '$user_address', '$user_contact')";
                    $sql_execute = mysqli_query($con, $insert_query);

                    if ($sql_execute) {
                        echo "<script>alert('Data inserted successfully')</script>";
                    } else {
                        die(mysqli_error($con));
                    }
                }
            } else {
                die(mysqli_error($con));
            }

            // Selecting cart items
            $select_cart_items = "SELECT * FROM cart_details WHERE ip_address='$user_ip'";
            $result_cart = mysqli_query($con, $select_cart_items);
            $rows_count = mysqli_num_rows($result_cart);

            if ($rows_count > 0) {
                $_SESSION['username'] = $user_username;
                echo "<script>alert('You have items in your cart')</script>";
                echo "<script>window.open('checkout.php','_self')</script>";
            } else {
                echo "<script>window.open('../index.php','_self')</script>";
            }
        }
    }
}
?>