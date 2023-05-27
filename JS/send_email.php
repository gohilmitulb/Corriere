<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;

require_once 'PHPMailer\src\Exception.php';
require_once 'PHPMailer\src\PHPMailer.php';
require_once 'PHPMailer\src\SMTP.php';

// Retrieve the payment ID from the POST data
$payment_id = $_POST['payment_id'];
$order_id = uniqid();
$price = $_POST['price'];
$gst = $_POST['gst'];
$roundoff = $_POST['roundoff'];

// Now you can use these variables to generate the email body

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
  // The user is logged in, so retrieve their email from the session
  $email = $_SESSION['email'];

  // Connect to the database
  include '../partials/dbconnect.php';

  // Prepare a query to retrieve additional user information using the email
  $sql = "SELECT phone_number FROM users WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);
}

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'corrierepvtltd@gmail.com';                     // SMTP username
    $mail->Password   = 'xlbmvfymihtxuvpd';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('corrierepvtltd@gmail.com');
    $mail->addAddress($email);     // Add a recipient

  // Content
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Corriere order confirmation';
$mail->Body    = '
<div style="text-transform: bold; padding: 1rem; font-size: 1.5rem; color: #55acee; ">Payment Successfull</div>
<hr>
<div  style="display: flex; align-items: center;"> 
<h1 class="order_id">Order Id: ' .$order_id.'</h1>
<h1 style="padding: 0.5rem; color: #55acee;">←</h1>
<h1 style="padding: 0.5rem; color: #55acee;">←</h1>
<h1 style="padding: 0.5rem; color: #55acee;">←</h1>
<h1 style="padding: 0.5rem; color: #55acee;">←</h1>
<li style="padding: 1rem; font-size: 1.3rem; list-style: none;">You can track your order using this order id from our website.</li>
</div>
<hr>
  <div>
    <div style="width: 55rem; display:flex; gap: 1rem; padding: 1rem;">

    <div style="text-transform: uppercase;
      color: #55acee;
      padding: 0 0 0.5rem 0;
      letter-spacing: 0.4rem;
      font-size: 1.8rem;">Order Summary : </div>

    <div style="display: flex; padding: 1rem;">

    <table style="border: 1px solid #252525;
    border-radius: 1rem;
    width: 100%;
    border-spacing: 1rem;">

              <tbody>

                <tr style="border-spacing: 1rem; display: flex; gap: 15rem; padding: 1rem;">

                  <td style="flex-grow: 1; font-size: 1.8rem;">Subtotal:</td>

                  <td style="flex-grow: 1; font-size: 1.8rem; text-align: right;">'.$price.'</td>

                </tr>

                <tr style="border-spacing: 1rem; display: flex; gap: 15rem; padding: 1rem;">

                  <td style="flex-grow: 1; font-size: 1.8rem;">GST:</td>

                  <td style="flex-grow: 1; font-size: 1.8rem; text-align: right;">'.$gst.'</td>

                </tr>

                <tr style="border-spacing: 1rem; display: flex; gap: 15rem; padding: 1rem;">

                  <td style="flex-grow: 1; font-size: 1.8rem;">Round-off:</td>

                  <td style="flex-grow: 1; font-size: 1.8rem; text-align: right;">'.$roundoff.'</td>

                </tr>

                <tr style="border-spacing: 1rem; display: flex; gap: 15rem; padding: 1rem;">

                  <td style="flex-grow: 1; font-size: 1.8rem; font-weight: bold;">Grand Total:</td>

                  <td style="flex-grow: 1; font-size: 1.8rem; text-align: right; font-weight: bold; color: #55acee;">'.$roundoff.'</td>

                </tr>
              </tbody>
            </table>
            </div>
            </div>
            </div>';

    $mail->send();
    echo 'Payment successful. Your order ID is '.$order_id.'. Check your email for details.';
  } catch (Exception $e) {  
    echo "Mail could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


// database for payment 
include '../partials/dbconnect.php';

$sql = "INSERT INTO payment (email, order_id, payment_id, price_paid, payment_time) VALUES ('$email', '$order_id', '$payment_id', '$roundoff', current_timestamp())";
$result = mysqli_query($conn, $sql);

?>
