<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
  // The user is logged in, so retrieve their email from the session
  $email = $_SESSION['email'];

  // Connect to the database
  include 'partials/dbconnect.php';

  // Prepare a query to retrieve additional user information using the email
  $sql = "SELECT phone_number FROM users WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);

  // Check if the query was successful and retrieve the phone_number
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $phone_number = $row['phone_number'];
  }

  $user_info = array('email' => $email, 'phone_number' => $phone_number);

  // Convert the array to JSON
  $user_info_json = json_encode($user_info);

  echo "<script>var userInfo = $user_info_json;</script>";

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit">
    <title>Corriere | Checkout</title>
    <link rel="icon" type="image/png" href="img/LOGO copy.png">
  <link rel="stylesheet" href="css/paymentpage.css">
</head>

<body>
  <div class="header">
  <div class="logo">
    <img src="img/LOGO.png" alt="LOGO | CORRIERE">
  </div>

  <div class="heading">
    <h1>Fast and Secure Checkout</h1>
  </div>
  </div>

  <div class="container">

    <div class="top">
      <div class="top-left">
        <h1 class="senderHeading">Sender:</h1>
        <div class="address">
        <li class="s_firstLine"><span class="sname"></span></li>
        <li class="s_secondLine"><span class="shouseno"></span><span class="sarea"></span><span class="slandmark"></span></li>
        <li class="s_thirdLine"><span class="scity"></span><span class="spin"></span></li>
        <li class="s_fourthLine"><span class="sphone"></span></li>
        </div>
        </div>
      
      <div class="addressarrow addressarrow1">&#x2192;</div>
      <div class="addressarrow addressarrow2">&#x2192;</div>
      <div class="addressarrow addressarrow3">&#x2192;</div>
      <div class="addressarrow addressarrow4">&#x2192;</div>
      <div class="top-right">
        <h1 class="recieverHeading">Receiver:</h1>
        <div class="address">
        <li class="r_firstLine"><span class="rname"></span></li>
        <li class="r_secondLine"><span class="rhouseno"></span><span class="rarea"></span><span class="rlandmark"></span></li>
        <li class="r_thirdLine"><span class="rcity"></span><span class="rpin"></span></li>
        <li class="r_fourthLine"><span class="rphone"></span></li>
        </div>
      </div>
      </div>

    <div class="down">
      <div class="left">
        <div class="bill">
          <h2 class="checkout-heading">Order Summary</h2>
          <div class="table-container">
            <table class="section-line">
              <tbody>
                <tr class="line">
                  <td>Subtotal:</td>
                  <td id="price" name="price"></td>
                </tr>
                <tr class="line">
                  <td>GST:</td>
                  <td id="gst" name="gst"></td>
                </tr>
                <tr class="line">
                  <td>Round-off:</td>
                  <td id="round" name="roundoff"></td>
                </tr>
                <tr class="line grand">
                  <td id="grand_total_title">Grand Total:</td>
                  <td id="grand_total"></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="right">
        <div class="delivery-by">
          <li class="deliveryby-line"></li>
        </div>
        <div class="arrow arrow1">&#x2190;</div>
        <div class="arrow arrow2">&#x2190;</div>
        <div class="arrow arrow3">&#x2190;</div>
        <div class="arrow arrow4">&#x2190;</div>
        <div class="pay-btn">
          <button id="rzp-button1" type="submit" class="btn btn-outline-dark btn-lg"><i class="fas fa-money-bill"></i></button>
        </div>
      </div>
    </div>

  </div>
</body>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script type="module" src="JS/payment.js"></script>

</html>