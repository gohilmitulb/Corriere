<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
} else {
    $loggedin = false;
}

$current_page = $_SERVER['REQUEST_URI'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit">
    <title>Home - Corriere</title>
    <link rel="icon" type="image/png" href="LOGO.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <style>
        .login {
        background-color: #CCD6DD;
        position: absolute;
        top: 50%;
        left: 50%;
        width: 460px;
        padding: 40px;
        transform: translate(-50%, -50%);
        visibility: hidden;
        pointer-events: none;
        opacity: 0;
        box-shadow: 0 5px 10px #55ACEE;
        border-radius: 10px;
        transition: 0.4s;
    }

    .register {
        background-color: #CCD6DD;
        position: absolute;
        top: 50%;
        left: 50%;
        width: 470px;
        padding: 35px;
        transform: translate(-50%, -50%);
        box-shadow: 0 5px 10px #55ACEE;
        border-radius: 10px;
        visibility: hidden;
        pointer-events: none;
        transition: 0.4s;
    }

    .selectnav {
        display: inline-block;
        position: relative;
        font-size: 1.6rem;
        color: #252525;
        text-transform: uppercase;
        letter-spacing: 4px;
        transition: 0.3s;
        cursor: pointer;
    }
    </style>
</head>

<body>
    <nav class="header">
        <div class="logo_div">
        <a id="select_logo" href="home.php">
            <img src="img/LOGO.png" class="logo" alt="Corriere">
        </a>
        </div>
        <div class="navbar">
            <ul id="menu" class="navbar-list">
                <a href="#home" id="select_home" class="nav">
                    <li class="selectnav">Home</li>
                </a>
                <!-- <a href="tracking.php" id="select_track" class="nav">
                    <li class="selectnav">Track Order</li>
                </a> -->
                <a href="#about" id="select_about" class="nav">
                    <li class="selectnav"> About us </li>
                </a>
                <a href="#contact" id="select_contact" class="nav">
                    <li class="selectnav">Contact us</li>
                </a>
                <?php if (!$loggedin) { ?>
                    <a href="#" class="nav" onclick="showloginmodal()" id="loginnav">
                        <li>Log in</li>
                    </a>
                <?php } ?>
                <?php if ($loggedin) { ?>
                    <a href="logout.php" class="nav" id="logoutnav">
                        <li>Log out</li>
                    </a>
                <?php } ?>
            </ul>
            </div>
        <div class="mobile-responsive">
            <ion-icon name="menu-outline" class="mobile-nav-icon"></ion-icon>
            <ion-icon name="close-outline" class="mobile-nav-icon"></ion-icon>
        </div>
    </nav>

    <?php if (!$loggedin) { ?>
        <div class="overlay"></div>
        <!-- login modal  -->

        <div id="login_modal" class="login">
            <span class="logincross" onclick="closeloginmodal()">&times;</span>
            <h1>Login</h1>
            <form action="/Corriere/login.php" autocomplete="off" method="post">
                <div class="box">
                    <input type="email" name="email" id="email" required="">
                    <label>Email</label>
                </div>
                <div class="box">
                    <input type="password" name="password" id="password" required="">
                    <label>Password</label>
                </div>
                <div class="button">
                    <button id="logsubmit" type="submit" name="save">Log in</button>
                    <div id="register">
                        New here ?
                        <a id="regbtn" onclick="showregistermodal()" href="#">Register</a>
                    </div>
                </div>
            </form>
        </div>
    <?php } ?>

    <!-- register modal  -->

    <div class="register">
        <span class="registercross" onclick="closeregistermodal()">&times;</span>
        <h1>Register here</h1>
        <form action="/Corriere/register page.php" autocomplete="off" method="post">
            <div class="box">
                <input type="text" maxlength="35" id="name" name="full_name" required="">
                <label for="full_name">Full name</label>
            </div>
            <div class="box">
                <input type="number" id="number" name="phone_number" required="" value="+91" size="2" />
                <label for="phone_number">Phone</label>
            </div>
            <div class="box">
                <input type="email" id="mail" name="email" required="">
                <label for="email">Email</label>
            </div>
            <div class="box">
                <input type="Password" id="password" name="password" required="">
                <label for="password">Password</label>
            </div>
            <div class="box">
                <input type="Password" id="confirm-password" name="cpassword" required="">
                <label for="cpassword">Confirm password</label>
            </div>
            <div class="button">
                <button id="regsubmit" type="submit" href="#">Register</button>
                <div id="login-reg">
                    Already have an account ?
                    <a id="logbtn" onclick="showlogregister()" href="#">Log in</a>
                </div>
            </div>
        </form>
    </div>
</body>
<script src="partials\logreg.js"></script>
<script>
    const mobile_nav = document.querySelector(".mobile-responsive");
    const nav_header = document.querySelector(".header");

    const toggleNavbar = () => {
        nav_header.classList.toggle("active");
    }

    mobile_nav.addEventListener("click", () => toggleNavbar());


    const select_logo = document.querySelector('#select_logo');
    const select_home = document.querySelector('#select_home');
    // const select_track = document.querySelector('#select_track');
    const select_about = document.querySelector('#select_about');
    const select_contact = document.querySelector('#select_contact');

    select_logo.addEventListener('click', () =>{
        setActiveLink(select_home);
    })

    select_home.addEventListener('click', () => {
        setActiveLink(select_home);
    });

    // select_track.addEventListener('click', () => {
    //     setActiveLink(select_track);
    // });

    select_about.addEventListener('click', () => {
        setActiveLink(select_about);
    });

    select_contact.addEventListener('click', () => {
        setActiveLink(select_contact);
    });



    function setActiveLink(selectedLink) {
        // Remove active class from all links
        select_home.classList.remove('active');
        // select_track.classList.remove('active');
        select_about.classList.remove('active');
        select_contact.classList.remove('active');

        // Add active class to the selected link
        selectedLink.classList.add('active');

        // Save the ID of the selected link in local storage
        localStorage.setItem('activeLink', selectedLink.id);
    }

    // Check if there is an active link saved in local storage
    const savedActiveLink = localStorage.getItem('activeLink');

    // If there is an active link saved in local storage, set the active class on that link
    if (savedActiveLink) {
        const activeLink = document.querySelector(`#${savedActiveLink}`);
        activeLink.classList.add('active');
    }

</script>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    html {
        overflow-x: hidden;
    }

    body {
        color: #252525;
        opacity: 1;
        pointer-events: auto;
    }

    body.dark .nav a {
        color: #CCD6DD;
    }

    .header {
        background-color: #CCD6DD;
        display: flex;
        padding-left: 0.5rem;
        padding-right: 2rem;
        justify-content: space-between;
        align-items: center;
        position: fixed;
        top: 0;
        width: 100%;
    }

    .header .logo {
        margin-top: 0.5rem;
        height: 80%;
        width: 80%;
    }

    .header #select_logo:hover{
        box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
        border-radius: 2rem;
    }

    .header #select_logo:focus{
        box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
        border-radius: 2rem;
        outline: none;
        transition: 0.5s;
    }

    .navbar-list {
        display: flex;
        gap: 5rem;
        list-style: none;
        align-items: center;
    }

    .selectnav::before {
        content: "";
        position: absolute;
        left: 0;
        bottom: -10px;
        width: 100%;
        height: 2px;
        background-color: #55ACEE;
        border-radius: 4px;
        scale: 0 1;
        transform-origin: middle;
    }

    .selectnav:hover::before {
        scale: 1;
    }

    .selectnav:hover {
        letter-spacing: 0.5rem;
    }

    body.dark .selectnav {
        color: #CCD6DD;
    }

    .active {
        border-bottom: 2px solid #55ACEE;
    }

    body.dark .nav a:hover,
    body.dark .nav a:active {
        border-bottom: 2px solid #55ACEE;
        font-size: 1.6rem;
        transition: 0.3s;
        color: #55ACEE;
    }

    #login {
        text-transform: uppercase;
        letter-spacing: 6px;
        text-decoration: none;
        color: #252525;
        font-size: 1.5rem;
        font-weight: 500;
        transition: 1s;
        border: 2px solid #252525;
        border-radius: 2rem;
        padding: 0.7rem;
    }

    #login:hover {
        box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
        text-shadow: 0 0 10px #55ACEE;
    }

    body.dark #login {
        border-color: #CCD6DD;
        color: #CCD6DD;
    }

    .mobile-nav-icon {
        width: 3rem;
        height: 3rem;
        color: #252525;
    }

    body.dark .mobile-nav-icon {
        color: #CCD6DD;
    }

    .mobile-nav-icon[name="close-outline"] {
        display: none;
    }

    .mobile-responsive {
        display: none;
        background: transparent;
        cursor: pointer;
    }

    .overlay {
        position: fixed;
        width: 100%;
        height: 100vh;
        background: rgba(0, 0, 0, 0.8);
        left: 0;
        top: 0;
        z-index: -1;
        opacity: 0;
        transition: 0.2s;
    }

    .showoverlay {
        opacity: 1;
        z-index: 99999;
    }

    /* login modal starts here   */

     .login-modal {
        position: fixed;
        visibility: visible;
        pointer-events: auto;
        opacity: 1;
        z-index: 99999999;
    }

    #loginnav {
        text-transform: uppercase;
        letter-spacing: 6px;
        text-decoration: none;
        color: #252525;
        font-size: 1.5rem;
        font-weight: 500;
        transition: 1s;
        border: 2px solid #252525;
        border-radius: 2rem;
        padding: 0.7rem;
        transition: 1.5s;
    }

    body.dark #loginnav {
        color: #CCD6DD;
        border-color: #CCD6DD;
    }

    #loginnav:hover {
        box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
        text-shadow: 0 0 10px #55ACEE;
    }

    .login h1 {
        margin: 0 0 30px;
        padding: 0;
        color: #55ACEE;
        text-align: center;
    }

    .login .box {
        padding: 0.5rem;
    }

    .login .box input {
        position: relative;
        width: 100%;
        padding: 5px 0;
        font-size: 16px;
        color: #252525;
        margin-bottom: 30px;
        border: none;
        border-bottom: 1px solid #55ACEE;
        outline: none;
        background: transparent;
    }

    .login .box label {
        position: relative;
        left: 0;
        top: -55px;
        padding: 10px 0;
        font-size: 16px;
        color: black;
        pointer-events: none;
        transition: 0.8s;
    }

    .login .box input:focus~label,
    .login .box input:valid~label {
        top: -85px;
        left: 0;
        color: #55ACEE;
        font-size: 16px;
    }

    #logsubmit {
        padding: 10px 20px;
        color: #252525;
        background-color: #CCD6DD;
        cursor: pointer;
        font-size: 16px;
        text-decoration: none;
        text-transform: uppercase;
        overflow: hidden;
        transition: 0.5s;
        letter-spacing: 4px;
        border: 1px solid #55ACEE;
    }

    #logsubmit:hover {
        background-color: #55ACEE;
        color: #FFFFFF;
        border-radius: 5px;
        box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
    }

    .login .button {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 2rem;
    }

    #register {
        font-size: 15px;
        text-decoration: none;
        color: #252525;
    }

    #register a {
        margin: auto;
        color: #55ACEE;
        text-decoration: none;

    }

    a {
        transition: 3s;
    }

    .logincross {
        position: absolute;
        display: flex;
        right: 1rem;
        top: 1rem;
        font-size: 2rem;
        color: #55ACEE;
        cursor: pointer;
        border: 2px solid #55ACEE;
        height: 1.5rem;
        width: 1.5rem;
        justify-content: center;
        align-items: center;
        border-radius: 25%;
    }

    /* logout  */

    #logoutnav {
        text-transform: uppercase;
        letter-spacing: 6px;
        text-decoration: none;
        color: #252525;
        font-size: 1.5rem;
        font-weight: 500;
        transition: 1s;
        border: 2px solid #252525;
        border-radius: 2rem;
        padding: 0.7rem;
        transition: 1.5s;
    }

    body.dark #logoutnav {
        color: #CCD6DD;
        border-color: #CCD6DD;
    }

    #logoutnav:hover {
        box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
        text-shadow: 0 0 10px #55ACEE;
    }

    /* register modak starts here */

    .register-modal {
        position: fixed;
        visibility: visible;
        pointer-events: auto;
        opacity: 1;
        z-index: 99999999;
    }

    .register h1 {
        margin: 0 0 30px;
        margin-bottom: 55px;
        padding: 0;
        color: #55ACEE;
        text-align: center;
    }

    .register .box {
        padding: 0.5rem;
    }

    .register .box input {
        position: relative;
        width: 100%;
        font-size: 16px;
        color: #252525;
        margin-bottom: 30px;
        border: none;
        border-bottom: 1px solid #55ACEE;
        outline: none;
        background: transparent;
    }

    .register .box label {
        position: relative;
        left: 0;
        top: -55px;
        padding: 10px 0;
        font-size: 16px;
        color: black;
        pointer-events: none;
        transition: 0.8s;
    }

    .register .box input:focus~label,
    .register .box input:valid~label {
        top: -85px;
        left: 0;
        color: #55ACEE;
        font-size: 16px;
    }

    .register .button {
        display: flex;
        gap: 2rem;
        align-items: center;
        justify-content: center;
    }

    #regsubmit {
        padding: 10px 20px;
        color: #55ACEE;
        background-color: #CCD6DD;
        cursor: pointer;
        font-size: 16px;
        text-decoration: none;
        text-align: center;
        text-transform: uppercase;
        overflow: hidden;
        transition: 0.5s;
        letter-spacing: 4px;
        border: 1px solid #55ACEE;
    }

    #regsubmit:hover {
        background-color: #55ACEE;
        color: #FFFFFF;
        border-radius: 5px;
        box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
    }

    #login-reg {
        font-size: 14px;
        text-decoration: none;
        color: #252525;
    }

    #login-reg a {
        margin: auto;
        color: #55ACEE;
        text-decoration: none;

    }

    .registercross {
        position: absolute;
        display: flex;
        right: 1rem;
        top: 1rem;
        font-size: 2rem;
        color: #55ACEE;
        cursor: pointer;
        border: 2px solid #55ACEE;
        height: 1.5rem;
        width: 1.5rem;
        justify-content: center;
        align-items: center;
        border-radius: 25%;
    }

    .overlaybody {
        opacity: 80%;
        pointer-events: none;
        z-index: -999;
    }

    @media (max-width: 100em) {
        .mobile-responsive {
            display: block;
            z-index: 999;
        }

        .header .logo {
            width: 60%;
            height: 60%
        }

        .header {
            position: relative;
        }

        .navbar {
            width: 100%;
            height: 100vh;
            position: absolute;
            background: #CCD6DD;
            top: 0;
            left: 0;
            z-index: 999;
            display: flex;
            justify-content: center;
            align-items: center;
            transform: translateX(100%);
            transition: all 0.5s linear;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }

        body.dark .navbar {
            background: #252525;
        }

        .navbar-list {
            flex-direction: column;
            align-items: center;
        }

        .active .navbar {
            transform: translateX(0);
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }

        .active .mobile-responsive .mobile-nav-icon[name="close-outline"] {
            display: block;
        }

        body.dark .active .mobile-responsive .mobile-nav-icon[name="close-outline"] {
            color: #CCD6DD;
        }

        .active .mobile-responsive .mobile-nav-icon[name="menu-outline"] {
            display: none;
        }
    }
</style>

</html>