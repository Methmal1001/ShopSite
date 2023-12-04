<!-- connect php files -->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['username'] ?></title>
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
    crossorigin="anonymous">
    <!-- Fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  
    <!-- css -->
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" href="../images/newlogo.jpg" type="image/icon type">

    <style>
        body{
            overflow-x: hidden;
        }
        .profile_img{
            width: 90%;
            margin: auto;
            display: block;
            object-fit: contain;
        }
        /* footer section */
*,*:before,*:after{
    box-sizing: border-box;
}

/* body{
    font-family: poppins;
    margin: 0;
    display: grid;
    font-size: 14px;
} */

.footer{
    display: -webkit-flex;
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: flex;
    flex-flow: row wrap;
    padding: 50px;
    color: #fff;
    background-color: #05506B;
    margin-top: 100px;
}

.footer > *{
    flex: 1 100%;
}

.footer-left{
    margin-right: 1.25rem;
    margin-bottom: 2rem;
}

.footer-left img{
    background: white;
    margin-bottom: 15px;
    width: 100px;
}

h2{
    font-weight: 600;
    font-size: 17px;
}

.footer ul{
    list-style: none;
    padding-left: 0;
}

.footer li{
    line-height: 2rem;
}

.footer a{
    text-decoration: none;
}

.footer-right{
    display: -webkit-flex;
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: flex;
    flex-flow: row wrap;
}

.footer-right > *{
    flex: 1 50%;
    margin-right: 1.25rem;
}

.box a{
    color: #999;
}

.box a:hover{
    color: #fff0f0;
}

.footer-bottom{
    text-align: center;
    color: #f1f1f1;
    padding-top: 50px;
}

.footer-left p{
    padding-right: 20%;
    color: #e2e1e1;
    margin: 15px 0px;
}

.socials a{
    background: #364a62;
    width: 40px;
    height: 40px;
    display: inline-block;
    margin-right: 10px;
}

.socials a:hover{
    background: #3b4757;
}

.socials a i{
    color: #808585ee;
    padding: 10px 12px;
    font-size: 20px;
}

.socials a i:hover{
    color: #ffffff;
}

@media screen and (min-width: 600px){
    .footer-right > *{
        flex: 1;
    }
    .footer-left{
        flex: 1 0px;
    }
    .footer-right{
        flex: 2 0px;
    }
}

@media (max-width: 600px){
    .footer{
        padding: 15px;
    }
    main{
        font-size: 55px;
    }
}
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img src="../images/logo.jpg" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../about.php">About Us</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="../contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php 
          cart_item();?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: Rs.<?php total_cart_price();?>/-</a>
        </li>
        
      </ul>
      <form class="d-flex" action="../search_product.php" method="get">
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
          <a class='nav-link' href='../users_area/logout.php'>Logout</a>
        </li>";
        }
        
        ?>
</ul>
</nav>

<!-- third child -->
<div class="bg-light" style="margin: 30px;">
  <h3 class="text-center" style="font-size: 70px; color: #04A35B;">Sharmia Super</h3>
  <p class="text-center" style="color: #536076; font-weight: bold;">This is a best place to visit your favoures</p>
</div>

<!-- fourth child -->
<div class="row">
    <div class="col-md-2">
        <ul class="navbar-nav bg-secondary text-center" style="height:100vh;">
            <li class="nav-item bg-info">
                <a class="nav-link text-light" href="#"><h4>My Profile</h4></a>
            </li>
            <li class="nav-item">
                <img src="../images/avatar.jpg" class="profile_img my-4" alt="">
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="profile.php">Pending Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="profile.php?edit_account">Edit Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="profile.php?my_orders">My Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
    <div class="col-md-10 text-center">
        <?php get_user_order_details(); 
        
        if(isset($_GET['edit_account'])){
            include('edit_account.php');
        }
        if(isset($_GET['my_orders'])){
            include('user_orders.php');
        }
        if(isset($_GET['delete_account'])){
          include('delete_account.php');
      }
        
        ?>
    </div>
</div>

<!-- last child -->
<!-- Footer Section -->
<footer class="footer">
        <div class="footer-left">
            <a href="index.php">
                <img src="../images/adbar.jpg" alt="">
            </a>
            <p>Sharmia Super is one of best solution to collect your goods.</p>

                <div class="socials">
                    <a href="navigation.html"><i class="fa-brands fa-square-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                    <!-- <a href="#"><i class="fa-brands fa-youtube"></i></a> -->
                </div>
        </div>

        <ul class="footer-right">
            <li>
                <h2>SERVICES</h2>

                <ul class="box">
                    <li><a href="#">24/7 Support and Monitoring</a></li>
                    <li><a href="#">Best Online Grocery</a></li>
                </ul>
            </li>
            <li class="features">
                <h2>Useful Links</h2>

                <ul class="box">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../about.php">About</a></li>
                    <li><a href="../contact.php">Contact</a></li>
                </ul>
            </li>
            <li>
                <h2>CONTACT US</h2>

                <ul class="box">
                    <li><a href="#">+94 xx xxx xxxx</a></li>
                    <li><a href="#">sharmiasuper@gmail.com</a></li>
                </ul>
            </li>
        </ul>

        <div class="footer-bottom">
            <p>All Right reserved by &copy; SharmiaSuper.com</p>
        </div>
    </footer>

<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
crossorigin="anonymous"></script>

</body>
</html>