<?php
session_start();
$login = false;
$showAlert = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/dbconnect.php';

    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if the user is a delivery boy
    $sql = "SELECT * FROM delivery_legends WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num == 1){
        $row = mysqli_fetch_assoc($result);
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $row['name'];
        $_SESSION['phone'] = $phone;
        header("location: deliveryPanel.php");
    }
    else{
        // If user is not a delivery boy, check if they are a regular user
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num == 1){
            while($row=mysqli_fetch_assoc($result)){
                if(password_verify($password, $row['password'])){
                    $login = true;
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['email'] = $email;
                    $_SESSION['full_name'] = $row['full_name'];
                    $_SESSION['phone_number'] = $phone_number;
                    header("location: home.php");
                }
                else{
                    $showAlert = true;
                }
            }
        }
        else{
            $showAlert = true;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corriere - Login Page</title>
    <link rel="stylesheet" href="css/login page.css">
</head>
<body>
</body>
<?php
if($showAlert){
    echo '
    <div class="alert">
        <p id="alert-message" style=" 
        padding: 20px;
    background-color: #ff0000; /* Red color */
    color: white;
    text-align: center;
    margin-top: 20px;
        " >Invalid Credentials</p>
    </div>';}
?>
    <!-- <nav>
        <img src="moon.png" id="icon" alt="">
    </nav> -->
   <!-- <img src="LOGO.png" id="logo" alt=""> -->
    <div class="login">
    
        <h1>Login</h1>
        <form action="/Corriere/login.php" autocomplete="off" method="post">
            <div class="box">
                <input type="email" name="email" id="email" required="">
                <label>Email</label>                
            </div>
            <br>
            <div class="box">
                <input type="password" name="password" id="password" required="">  
                <label>Password</label>              
            </div>
            <br>
            <div class="button">
                <button id="submit" type="submit" name="save">Log in</button>
                <div id="register">
                Don't have an account ? 
                <a href="register page.php">Register</a>
            </div>
        </div>
        </form>
    </div>
    <script src="js/login.js"></script>
    <!-- <script>
        var icon = document.getElementById("icon");

        icon.onclick = function(){
            document.body.classList.toggle("dark-theme");
            if(document.body.classList.contains("dark-theme")){
                icon.src = "sun.png";
            }
            else{
                icon.src = "moon.png";
            }
        }
    </script> -->
</body>
</html>