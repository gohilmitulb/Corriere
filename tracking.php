<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="css/tracking.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Corriere - Track Your Order</title>
</head>
<body>
    <?php
    require 'partials/nav.php'    
    ?>
    <!-- <div class="logo"><a href="home.html">
        <img src="img/LOGO.png" alt="">
    </a></div>
    <div class="bar">
        <ul class="menu">
            <li class="m"><a href="home.html">Home</a></li>
            <li class="m"><a href="tracking.html">Track Order</a></li>
            <li class="m"><a href="About.html"> About us</a> </li>
            <li class="m"><a href="CONTACT US.html">Contact us</a></li>
        </ul>
        <div class="login"><a href="login.html">Log in</a></div>
    </div>  -->
    <div class="down">
    <div class="container">
        <div class="details">
            <div class="order">
                <h1>order <span>420157896</span></h1>
            </div>
            <div class="date">
                <p>Expected Arrival 1/1/2023</p>
            </div>
        </div>
        <div class="track">
            <ul id="progress" class="text=center">
                <li class="active"></li>
                <li class="active"></li>
                <li class="active"></li>
                <li class="active"></li>
                <li class=""></li>
            </ul>
        </div>
        <div class="lists">
            <div class="list">
                <img src="img/icon1.png" alt="">
                <p>Order<br>placed</p>
            </div>

            <div class="list">
                <img src="img/icon2.png" alt="">
                <p>On The Way<br>To Pick Parcel</p>
            </div>
            
            <div class="list">
                <img src="img/icon3.png" alt="">
                <p>Order<br>Picked</p>
            </div>

            <div class="list">
                <img src="img/icon4.png" alt="">
                <p>Order<br>Out For Delivery</p>
            </div>
            <div class="list">
                <img src="img/icon5.png" alt="">
                <p>Order <br> Delivered</p>
            </div>
        </div>
    </div>
</div>
<!-- <footer class="foot">
    <div class="copyright">
        <p>©2022 Corriere. Online courier service Gandhinagar. All rights reserved</p>
    </div> -->
    
    <!-- <div class="nav">
        <li><a href="home.html">Home</a></li>
        <li><a href="tracking.html">Track Order</a></li>
        <li><a href="About.html"> About us</a> </li>
        <li><a href="CONTACT US.html">Contact us</a></li>
    </div>   -->
    <!-- <div class="social">
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-linkedin"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
    </div>
</footer> -->
</body>
</html>