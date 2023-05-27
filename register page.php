<?php
$showAlert = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){

    include 'partials/dbconnect.php';

    $full_name = $_POST["full_name"];
    $phone_number = $_POST["phone_number"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    $existSql = "SELECT * FROM `users` WHERE email = '$email' AND phone_number = '$phone_number'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        // $exists = true;
        $showAlert = "Username Already Exists";
    }
    else{
        // $exists = false; 
        if(($password == $cpassword)){
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO `users` (`full_name`,`phone_number`, `email`, `password`, `date_created`) VALUES ('$full_name','$phone_number','$email','$hash',current_timestamp())";
            $result = mysqli_query($conn, $sql);

            header("location: home.php");
        }
        else{
            $showAlert = "Passwords do not match";
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
    <title>Corriere - Register</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
<?php
    if($showAlert){
    echo '
    <div class="alert">
        <strong id="alert-message" style=" 
        padding: 20px;
    background-color: #ff0000; /* Red color */
    color: white;
    text-align: center;
    margin-top: 20px;
        " >Error</strong> '. $showAlert.'
    </div>';}
?>
    <div class="register">
        <h1>Register here</h1>
        <form action="/Corriere/register page.php" autocomplete="off" method="post">
            <div class="box">
                <input type="text" maxlength="35" id="name" name="full_name" required= "">
                <label for="full_name">Full name</label><br><br>
            </div>
            <div class="box">
                <input type="number" id="number" name="phone_number" required=""  value="+91" size="2"/>
                <label for="phone_number">Phone</label>  <br><br>
            </div>
            <div class="box">
                <input type="email" id="mail" name="email" required="">
                <label for="email">Email</label>
            </div>
            <br>
            <div class="box">    
                <input type="Password" id="password" name="password" required="">                 
                <label for="password">Password</label><br><br>
            </div>
            <div class="box">
                <input type="Password" id="confirm-password" name="cpassword" required="">
                <label for="cpassword">Confirm password</label>
            </div>
            <br>
            <div class="button">
                <button id="submit" type="submit" href="#">Register</button>
                <div id="login">
                    Already have an account ? 
                    <a id="logbtn" href="login.php">Log in</a>
                </div>
            </div>
        </form>
    </div>
    <script src="js/register.js"></script>
</body>