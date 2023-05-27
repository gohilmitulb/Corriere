<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'PHPMailer\src\Exception.php';
require_once 'PHPMailer\src\PHPMailer.php';
require_once 'PHPMailer\src\SMTP.php';

$mail = new PHPMailer(true);
$alert = '';

if (isset($_POST['submit'])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'corrierepvtltd@gmail.com';
        $mail->Password = 'xlbmvfymihtxuvpd';
        $mail->SMTPSecure = "tls";
        $mail->Port = '587';

        $mail->setFrom('corrierepvtltd@gmail.com');
        $mail->addAddress('corrierepvtltd@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'Message received from Contact:' . $name;
        $mail->Body = "Name: $name <br>Phone: $phone<br>Email: $email<br>Message: $message";

        $mail->send();
        $alert = "<div class='alert-success'><span>Thank you for your message, $name. We'll get back to you soon! </span></div>";

    } catch (Exception $e) {
        $alert = "<div class='alert-error'><span>'.$e-> getMessage().'</span></div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corriere | Contact us</title>
    <link rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" 
    integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/contactus.css">
    <link rel="icon" type="image/png" href="img/LOGO copy.png">
</head>
<body>
    <p class="contact_heading">We'd love to hear from you! Please use the following methods to get in touch with us:</p>
    <div class="contact_container">
    <div class="contact_form">
        <div class="col-md-12 my-2">
            <?php echo $alert; ?>
        </div>
    <h1>Contact Form</h1>
    <form action="/Corriere/contact.php" autocomplete="off" method="post">
        <div class="box">
            <input type="text" name="name" id="name" required="">
            <label>Name</label>                
        </div>
        <div class="box">
            <input type="email" name="email" id="email" required="">  
            <label>Email</label>              
        </div>
        <div class="box">
            <input type="phone" name="phone" id="phone" required="">  
            <label>Phone</label>              
        </div>
        <div class="box">
            <input type="message" name="message" id="message" required="">
            <label for="message">Message</label>
        </div>
        <div class="contact_button">
            <input type="submit" id="contact_submit" name="submit" value="Submit">
        </div>
    </form>
</div>
<div class="reachus">
    <div class="section">
        <div class="icon">
            <img id="map" src="img/location.png"  alt="">
        </div>
        <div class="text">
            <h1>ADDRESS</h1>
            <h3><a href="https://goo.gl/maps/uDpYzoGF6zQVdj8F6" target="_blank">LDRP COLLEGE</a></h3>
            <h3><a href="https://goo.gl/maps/uDpYzoGF6zQVdj8F6" target="_blank">SECTOR-15 NEAR KH-5</a></h3> 
            <h3><a href="https://goo.gl/maps/uDpYzoGF6zQVdj8F6" target="_blank">GANDHINAGAR GUJARAT</a></h3>
        </div>
    </div>
    <div class="section">
        <div class="icon">
            <img id="timings" src="img/time.png" alt="">
        </div>
        <div class="text">
            <h1>OUR TIMINGS</h1>
            <h3>Monday - Saturday</h3>
            <h3>9AM - 5PM</h3>
        </div>
    </div>
    <div class="section">
        <div class="icon">
            <img id="emailus" src="img/mail.png" alt="">
        </div>
        <div class="text">
            <h1>EMAIL</h1>
            <h3><a href="mailto:corrierepvtltd@gmail.com" target="_blank">corrierepvtltd@gmail.com</a></h3>
        </div>
    </div>
</div> 
</div>
</body>
</html>