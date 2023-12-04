<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
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
    background-color: #036271;
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
  <!-- last child -->
<!-- Footer Section -->
<footer class="footer">
        <div class="footer-left">
            <a href="index.php">
                <img src="./images/adbar.jpg" alt="">
            </a>
            <p>Sharmia Super is one of best solution to collect your goods.</p>

                <div class="socials">
                    <a href="#"><i class="fa-brands fa-square-facebook"></i></a>
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
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
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
  </div>
  </div>
</body>
</html>
