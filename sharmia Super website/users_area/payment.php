<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>

    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
    crossorigin="anonymous">

    <style>
        .payment_img{
            width: 80%;
            margin: auto;
            display: block;
        }
    </style>

</head>
<body>

    <!-- access to user id -->
    <?php

    $user_ip=getIPAddress();
    $get_user="SELECT * FROM user_table WHERE user_ip='$user_ip'";
    $result=mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['user_id'];

    ?>

    <div class="container">
        <h1 class="text-center text-info">Payment options</h1>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <!-- online payment -->
            <div class="col-md-6">
            <a href="http://www.paypal.com" target="_blank"><img src="../images/payment.jpg" class="payment_img" alt=""></a>
            </div>

            <!-- cash on delivery payment -->
            <div class="col-md-6">
            <a href="../users_area/order.php?user_id=<?php echo $user_id ?>"><h2 class="text-center">Cash On Delivery</h2></a>
            </div>
        </div>
    </div>
</body>
</html>