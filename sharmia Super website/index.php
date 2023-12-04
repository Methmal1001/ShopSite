<!-- connect php files -->
<?php
include('includes/connect.php');
include('functions/common_function.php');

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sharmia Super</title>
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
    crossorigin="anonymous">
    <!-- Fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  
    <!-- css -->
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" href="images/newlogo.jpg" type="image/icon type">

    <style>
        body{
            overflow-X: hidden;
        }
        
        /* Time count */
        .new-body{
            margin-top: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 40vh;
            background: #2f363e;
        }

        #time {
            display: flex;
            gap: 30px;
        }

        #time .circle {
            position: relative;
            width: 150px;
            height: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #time .circle svg {
            position: relative;
            width: 150px;
            height: 150px;
            transform: rotate(270deg);
        }

        #time .circle svg circle {
            width: 100%;
            height: 100%;
            fill: transparent;
            stroke-width: 8;
            stroke: #282828;
            stroke-linecap: round;
            transform: translate(5px, 5px);
        }

        #time .circle svg circle:nth-child(2) {
            stroke: var(--clr);
            stroke-dasharray: 440;
            stroke-dashoffset: 440;
        }

        #time div {
            position: absolute;
            text-align: center;
            font-weight: 500;
            color: #fff;
            font-size: 1.5em;
        }

        #time div span {
            position: absolute;
            transform: translateX(-50%) translateY(-10px);
            font-size: 0.35em;
            font-weight: 300;
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        #time .dots {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            z-index: 1000;
        }

        #time .dots::before {
            content: '';
            position: absolute;
            top: -3px;
            width: 15px;
            height: 15px;
            background: var(--clr);
            border-radius: 50%;
            box-shadow: 0 0 20px var(--clr), 0 0 60px var(--clr);
        }

        .newYear {
            font-size: 8em;
            font-weight: 500;
            color: #fff;
            text-align: center;
            line-height: 0.6em;
            display: none;
        }

        .newYear span {
            font-size: 0.5em;
            font-weight: 300;
        }

        @media only screen and (max-width: 768px) {
            #time {
                flex-direction: column;
                align-items: center;
            }

            #time .circle {
                margin-bottom: 30px;
            }
        }

        /* Promotion */
        .promo{
          text-align: center;
          margin-top: 70px;
        }

        .promo h2{
          font-size: 40px;
          color: red;

        }

    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img src="./images/logo.jpg" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <?php
        
        if(isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/profile.php'>My Account</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
        </li>";
        }
        
        ?>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About Us</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php 
          cart_item();?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: Rs.<?php total_cart_price();?>/-</a>
        </li>
        
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
        name="search_data">
        <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
        <input type="submit" value="Search" name="search_data_product" class="btn btn-outline-light">
      </form>
    </div>
  </div>
</nav>
    
<!-- calling cart function -->
<?php
cart();
?>

<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">
  
        <?php
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
        </li>";
        }
        
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/user_login.php'>Login</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/logout.php'>Logout</a>
        </li>";
        }
        
        ?>
        <!-- <li class="nav-item">
          <a class="nav-link" href="./users_area/user_login.php">Login</a>
        </li> -->
</ul>
</nav>

<!-- third child -->
<div class="bg-light" style="margin: 30px;">
  <h3 class="text-center" style="font-size: 70px; color: #04A35B;">Sharmia Super</h3>
  <p class="text-center" style="color: #536076; font-weight: bold;">This is a best place to visit your favoures</p>
</div>

<!-- fourth child -->
<div class="row px-1">
  <div class="col-md-10">
    <!-- products -->
      <div class="row">
        <!-- fetching products -->
        <?php

        // calling function
        getproducts();
        get_unique_categories();
        get_unique_brands();
        // $ip = getIPAddress();  
        // echo 'User Real IP Address - '.$ip; 
        ?>

  </div> 
  <!-- column end -->
</div>
  <div class="col-md-2 bg-secondary p-0">
    <!-- brands to be displayed -->
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
        <a href="#" class="nav-link text-light"><h4>Delivery Brand</h4></a>
      </li>

      <?php
      getbrands();
      ?>

      <!-- <li class="nav-item">
        <a href="#" class="nav-link text-light">Brand1</a>
      </li> -->
    </ul>

    <!-- categories to be displayed -->
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
        <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
      </li>

      <?php
      
      getcategories();
      ?>
    </ul>

  </div>
</div>

<!-- Promotion -->
<div class="promo">
  <h2>New Offer comming soon.</h2>
</div>

<!-- Time count -->
<div class="new-body">
<div id="time">
        <div class="circle" style="--clr:#fff;">
            <div class="dots day_dot"></div>
            <svg>
                <circle cx="70" cy="70" r="70"></circle>
                <circle cx="70" cy="70" r="70" id="dd"></circle>
            </svg>
            <div id="days">00<br><span>Days</span></div>
        </div>

        <div class="circle" style="--clr:#ff2972;">
            <div class="dots hr_dot"></div>
            <svg>
                <circle cx="70" cy="70" r="70"></circle>
                <circle cx="70" cy="70" r="70" id="hh"></circle>
            </svg>
            <div id="hours">00</div>
        </div>

        <div class="circle" style="--clr:#fee800;">
            <div class="dots min_dot"></div>
            <svg>
                <circle cx="70" cy="70" r="70"></circle>
                <circle cx="70" cy="70" r="70" id="mm"></circle>
            </svg>
            <div id="minutes">00</div>
        </div>

        <div class="circle" style="--clr:#04fc43;">
            <div class="dots sec_dot"></div>
            <svg>
                <circle cx="70" cy="70" r="70"></circle>
                <circle cx="70" cy="70" r="70" id="ss"></circle>
            </svg>
            <div id="seconds">00</div>
        </div>
    </div>

    <h2 class="newYear">Special <br><span>Offer Released!</span></h2>


    <script>
        let days = document.getElementById('days');
        let hours = document.getElementById('hours');
        let minutes = document.getElementById('minutes');
        let seconds = document.getElementById('seconds');

        let dd = document.getElementById('dd');
        let hh = document.getElementById('hh');
        let mm = document.getElementById('mm');
        let ss = document.getElementById('ss');

        let day_dot = document.querySelector('.day_dot');
        let hr_dot = document.querySelector('.hr_dot');
        let min_dot = document.querySelector('.min_dot');
        let sec_dot = document.querySelector('.sec_dot');

        let endDate = '12/30/2023 00:00:00:00';
        // date format mm/dd/yyyy

        let x = setInterval(function(){
            let now = new Date(endDate).getTime();
            let countDown = new Date().getTime();
            let distance = now - countDown;

            // time calculation for d,h,m,s
            let d = Math.floor(distance / (1000 * 60 * 60 * 24));
            let h = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let m = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            let s = Math.floor((distance % (1000 * 60)) / (1000));

            // output result
            days.innerHTML = d + "<br><span>Days</span>";
            hours.innerHTML = h + "<br><span>Hours</span>";
            minutes.innerHTML = m + "<br><span>Minutes</span>";
            seconds.innerHTML = s + "<br><span>Seconds</span>";

            // animate
            dd.style.strokeDashoffset = 440 - (440 * d) / 365;
            // 365 days
            hh.style.strokeDashoffset = 440 - (440 * h) / 24;
            // 24 hours
            mm.style.strokeDashoffset = 440 - (440 * m) / 60;
            // 60 minutes
            ss.style.strokeDashoffset = 440 - (440 * s) / 60;
            // 60 seconds

            // animate circle dots
            day_dot.style.transform = 'rotateZ(${d * 0.986} deg)';
            hr_dot.style.transform = 'rotateZ(${h * 15} deg)';
            min_dot.style.transform = 'rotateZ(${m * 6} deg)';
            sec_dot.style.transform = 'rotateZ(${s * 6} deg)';

            if(distance < 0){
                clearInterval(x);
                document.getElementById("time").style.display = 'none';

                document.querySelector(".newYear").style.display = 'block';
            }

        })

    </script>
</div>


<!-- last child -->
<?php
    include("./includes/footer.php")
?>
</div>

<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
crossorigin="anonymous"></script>

</body>
</html>