<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit">
    <title>Corriere | Home</title>
    <link rel="icon" type="image/png" href="img/LOGO copy.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/home.css">
    <script src="logreg.js"></script>
    <!-- <script src="JS/home.js"></script> -->
</head>

<body>
<?php
    require 'partials/nav.php'
        ?>
    <?php require 'partials/daynight.php'
        ?>
    <?php
    require 'partials/chatbot.html'
        ?>
    <section id="home">
        <div class="container">
            <div class="welcome">
                <h2>Welcome - <span class="name" onclick="showloginmodal()">
                        <?php
                        if ($loggedin) {
                            if(isset($_SESSION['full_name'])) {
                                echo $_SESSION['full_name'];
                              } elseif(isset($_SESSION['name'])) {
                                echo $_SESSION['name'];
                              }
                              
                        }
                        if (!$loggedin) {
                            echo 'Please login by clicking here.';
                        }
                        ?>
                    </span></h2>
            </div>

            <div class="main-content">
                <div class="image">
                    <img id="main" src="img/main.png" alt="Oops something went wrong!">
                </div>
                <div class="right-content">
                    <div class="desc">
                        <h1>Forget that old-fashioned stuff, here's our new-fashioned services.</h1>
                        <h3>We deliver documents, we deliver furnitures. Anything you might need, we'll make sure it
                            gets to
                            you.</h3>
                    </div>
                    <a class="pickup_nav" href="orderdetails.php">
                        <div class="pickup">ADD PICKUP DETAILS</div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="about">
        <?php
        require 'About.php'
            ?>
    </section>

    <section id="contact">
        <?php
        require 'contact.php'
            ?>
    </section>
    <?php
    require 'partials/footer.html'
        ?>
</body>

</html>