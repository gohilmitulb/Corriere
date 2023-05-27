<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("Location: login.php");
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  include 'partials/dbconnect.php';

  if (isset($_POST['train_yn'])) {
    $radio_selection = $_POST['train_yn'];

    if ($radio_selection == 'yes') {

      $sender_name = $_POST["sender_name"];
      $sender_number = $_POST["sender_number"];
      $sender_pincode = $_POST["sender_pincode"];
      $sender_houseno = $_POST["sender_houseno"];
      $sender_area = $_POST["sender_area"];
      $sender_landmark = $_POST["sender_landmark"];
      $sender_city = $_POST["sender_city"];
      $weight = $_POST["weight"];
      $package_type = $_POST["package_type"];
      $parcel_name = $_POST["parcel_name"];
      $delivery_speed = $_POST["delivery_speed"];
      $train_receiver_name = $_POST["train_receiver_name"];
      $train_receiver_number = $_POST["train_receiver_number"];
      $train_no = $_POST["train_no"];
      $train_pnr_no = $_POST["train_pnr_no"];
      $train_platform_no = $_POST["train_platform_no"];
      $train_bogy_no = $_POST["train_bogy_no"];
      $train_seat_no = $_POST["train_seat_no"];
      $train_arrival_time = $_POST["train_arrival_time"];

      $sql = "INSERT INTO `train_order_details` (`sender_name`, `sender_number`, `sender_pincode`, `sender_houseno`, `sender_area`, `sender_landmark`, `sender_city`, `weight`,`package_type` ,`parcel_name` ,`delivery_speed` ,`train_receiver_name` ,`train_receiver_number` ,`train_no` ,`train_pnr_no` ,`train_platform_no` ,`train_bogy_no` ,`train_seat_no` ,`train_arrival_time` , `time`) VALUES ('$sender_name','$sender_number','$sender_pincode','$sender_houseno','$sender_area','$sender_landmark','$sender_city','$weight','$package_type','$parcel_name','$delivery_speed','$train_receiver_name','$train_receiver_number','$train_no','$train_pnr_no','$train_platform_no','$train_bogy_no','$train_seat_no','$train_arrival_time',current_timestamp())";
      $result = mysqli_query($conn, $sql);

    } else if ($radio_selection == 'no') {

      $sender_name = $_POST["sender_name"];
      $sender_number = $_POST["sender_number"];
      $sender_pincode = $_POST["sender_pincode"];
      $sender_houseno = $_POST["sender_houseno"];
      $sender_area = $_POST["sender_area"];
      $sender_landmark = $_POST["sender_landmark"];
      $sender_city = $_POST["sender_city"];
      $weight = $_POST["weight"];
      $package_type = $_POST["package_type"];
      $parcel_name = $_POST["parcel_name"];
      $delivery_speed = $_POST["delivery_speed"];
      $receiver_name = $_POST["receiver_name"];
      $receiver_number = $_POST["receiver_number"];
      $receiver_pincode = $_POST["receiver_pincode"];
      $receiver_houseno = $_POST["receiver_houseno"];
      $receiver_area = $_POST["receiver_area"];
      $receiver_landmark = $_POST["receiver_landmark"];
      $receiver_city = $_POST["receiver_city"];

      $sql = "INSERT INTO `order_details` (`sender_name`, `sender_number`, `sender_pincode`, `sender_houseno`, `sender_area`, `sender_landmark`, `sender_city`, `weight`,`package_type` ,`parcel_name` ,`delivery_speed` ,`receiver_name` ,`receiver_number` ,`receiver_pincode` ,`receiver_houseno` ,`receiver_area` ,`receiver_landmark` ,`receiver_city` , `time`) VALUES ('$sender_name','$sender_number','$sender_pincode','$sender_houseno','$sender_area','$sender_landmark','$sender_city','$weight','$package_type','$parcel_name','$delivery_speed','$receiver_name','$receiver_number','$receiver_pincode','$receiver_houseno','$receiver_area','$receiver_landmark','$receiver_city',current_timestamp())";
      $result = mysqli_query($conn, $sql);
    }
  }

  header("location: payment.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Corriere | Enter order details</title>
  <link rel="stylesheet" href="css/orderdetails.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" type="image/png" href="img/LOGO copy.png">
</head>

<body>
  <div class="container">
  <?php require 'partials/daynight.php'
    ?>
    <div class="logo">
      <img src="img/LOGO.png" alt="">
    </div>
    <div class="form">
      <form action="/Corriere/orderdetails.php" method="post">

        <div class="trainradio">
          <h2>Do you wish to send your parcel to train?</h2>
          <div id="trainradio" class="radiobtn">
            <input type="radio" name="train_yn" id="yes" value="yes" required>
            Yes
            <input type="radio" name="train_yn" id="no" value="no" required>
            No
          </div>
        </div>

        <div class="details">

          <div class="detailsection">
            <div class="details_forms">

              <div class="enterpickup">
                <div class="shead">
                  <h2>Enter sender's details</h2>
                </div>
                <div class="box">
                  <input type="text" id="sname" name="sender_name" required="">
                  <label for="name">Name</label>
                </div>
                <div class="box">
                  <input type="number" id="sphone" name="sender_number" minlength="10" maxlength="10" required="">
                  <label for="snumber">Phone number</label>
                </div>
                <div class="box">
                  <input type="number" id="spincode" name="sender_pincode" maxlength="6" minlength="6" required="">
                  <label for="spincode">Pincode</label>
                </div>
                <div class="box">
                  <input type="text" id="shouseno" name="sender_houseno" required="">
                  <label for="shouseno">Flat no. ,House no., Building, Company</label>
                </div>
                <div class="box">
                  <input type="text" id="sarea" name="sender_area" required="">
                  <label for="sarea">Sector, Area, Street, Village</label>
                </div>
                <div class="box">
                  <input type="text" id="slandmark" name="sender_landmark" required="">
                  <label for="slandmark">Landmark</label>
                </div>
                <div class="select-city">
                  <label for="scity">City :</label>
                  <select name="sender_city" id="scity">
                    <option value="Gandhinagar">Gandhinagar</option>
                  </select>
                </div>
                <!-- <div class="box">
                <input type="text" id="saddress" name="sender_address" list="address" required="">
                <label for="address">Pickup Address:</label>
              </div> -->
              </div>

              <div class="enterorder">
                <div class="phead">
                  <h2>Enter parcel details</h2>
                </div>
                <div class="box">
                  <input type="number" name="weight" id="weight" min="1" max="10" required="">
                  <label for="weight">Weight of parcel(kg):</label>
                </div>
                <div class="pop">
                  <label for="parceltype">Parcel type :</label>
                  <select class="type" id="packagetype" name="package_type" required>
                    <option value="empty">---Select---</option>
                    <option value="Apparel & accessories">Apparel & accessories</option>
                    <option value="Baby care">Baby care</option>
                    <option value="Books & Stationary">Books & Stationary</option>
                    <option value="Documents">Documents</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Sports Equipmemts">Sports Equipmemts</option>
                  </select>
                </div>
                <div class="box what_parcel" id="what_parcel">
                  <input type="text" id="parcelname" name="parcel_name">
                  <label for="parcelname">Please specify the parcel</label>
                </div>
                <div class="dop">
                  <label for="delivery-speed">Delivery Speed:</label>
                  <select id="delivery-speed" name="delivery_speed" required>
                    <option value="empty">---Select---</option>
                    <option value="sameday">Same-day delivery</option>
                    <option value="standard">Standard delivery (2-3 days)</option>
                    <option value="nextday">Next-day delivery</option>
                    <option value="rush">Rush delivery (within 3 hours)</option>
                  </select>
                </div>
              </div>

              <div class="enterdrop" id="enterdrop">
                <div class="rhead">
                  <h2>Enter receiver's details</h2>
                </div>
                <div class="box">
                  <input type="text" id="rname" name="receiver_name" class="receiver" required="">
                  <label for="name">Name</label>
                </div>
                <div class="box">
                  <input type="number" id="rphone" name="receiver_number" class="receiver" minlength="10" maxlength="10" required="">
                  <label for="snumber">Phone number</label>
                </div>
                <div class="box">
                  <input type="number" id="rpincode" name="receiver_pincode" maxlength="6" minlength="6"
                    class="receiver" required="">
                  <label for="rpincode">Pincode</label>
                </div>
                <div class="box">
                  <input type="text" id="rhouseno" name="receiver_houseno" class="receiver" required="">
                  <label for="rhouseno">Flat no. ,House no., Building, Company</label>
                </div>
                <div class="box">
                  <input type="text" id="rarea" name="receiver_area" class="receiver" required="">
                  <label for="rarea">Sector, Area, Street, Village</label>
                </div>
                <div class="box">
                  <input type="text" id="rlandmark" name="receiver_landmark" class="receiver" required="">
                  <label for="rlandmark">Landmark</label>
                </div>
                <div class="select-city">
                  <label for="rcity">City :</label>
                  <select name="receiver_city" id="">
                    <option value="Gandhinagar">Gandhinagar</option>
                  </select>
                </div>
              </div>

              <div id="entertrain" class="entertrain">
                <div class="thead">
                  <h2>Enter train and receiver's details</h2>
                </div>
                <div class="box">
                  <input type="text" id="trname" name="train_receiver_name" class="train" required="">
                  <label for="name">Receiver's Name</label>
                </div>
                <div class="box">
                  <input type="number" id="trphone" name="train_receiver_number" minlength="10" maxlength="10" class="train" required="">
                  <label for="trnumber">Phone number</label>
                </div>
                <div class="box">
                  <input type="number" id="trainno" name="train_no" class="train" required="">
                  <label for="trainno">Train No.</label>
                </div>
                <div class="box">
                  <input type="number" id="pnr" name="train_pnr_no" class="train" required="">
                  <label for="pnr">PNR number</label>
                </div>
                <div class="box">
                  <input type="text" id="platform" name="train_platform_no" class="train" required="">
                  <label for="platform">Platform number</label>
                </div>
                <div class="box">
                  <input type="text" id="bogy" name="train_bogy_no" class="train" required="">
                  <label for="bogy">Bogy number</label>
                </div>
                <div class="box">
                  <input type="number" id="seat" name="train_seat_no" class="train" required="">
                  <label for="seat">Seat number</label>
                </div>
                <div class="box">
                  <input type="time" id="arrival" name="train_arrival_time" class="train" onfocus="showPlaceholder()" onblur="hidePlaceholder()" required="">
                  <label for="arrival">Station arrival time</label>
                </div>
              </div>
            </div>

            <div class="button">
              <button id="submit" type="submit" name="save">
                <span>P</span><span>r</span><span>o</span><span>c</span><span>e</span><span>e</span><span>d</span><br></b><span>f</span><span>o</span><span>r</span><br><span></span><span>p</span><span>a</span><span>y</span><span>m</span><span>e</span><span>n</span><span>t</span>
              </button><i class='fas fa-angle-double-right' style='font-size: 2rem; color:#55ACEE'></i>
            </div>
          </div>
          <div id="calcharge" class="pricebutton" onclick="calculateprice()">
            <a name="cal" href="#">Click to know price</a>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script src="js/orderdetails.js"></script>
  <script>
   const sname = document.getElementById('sname');
   const shouseno = document.getElementById('shouseno');
   const sarea = document.getElementById('sarea');
   const slandmark = document.getElementById('slandmark');
   const spin = document.getElementById('spincode');
   const sphone = document.getElementById('sphone');

  sname.addEventListener('change', () => {
   localStorage.setItem('sname',sname.value);
  });
  shouseno.addEventListener('change', () => {
    localStorage.setItem('shouseno',shouseno.value);
  });
  sarea.addEventListener('change', () => {
    localStorage.setItem('sarea',sarea.value);
  });
  slandmark.addEventListener('change', () => {
    localStorage.setItem('slandmark',slandmark.value);
  });
  spin.addEventListener('change', () => {
    localStorage.setItem('spin',spin.value);
  });
  sphone.addEventListener('change', () => {
    localStorage.setItem('sphone',sphone.value);
  })

  const rname = document.getElementById('rname');
  const rhouseno = document.getElementById('rhouseno');
  const rarea = document.getElementById('rarea');
  const rlandmark = document.getElementById('rlandmark');
  const rpin = document.getElementById('rpincode');
  const rphone = document.getElementById('rphone');

  rname.addEventListener('change', () => {
   localStorage.setItem('rname',rname.value);
  });
  rhouseno.addEventListener('change', () => {
    localStorage.setItem('rhouseno',rhouseno.value);
  });
  rarea.addEventListener('change', () => {
    localStorage.setItem('rarea',rarea.value);
  });
  rlandmark.addEventListener('change', () => {
    localStorage.setItem('rlandmark',rlandmark.value);
  });
  rpin.addEventListener('change', () => {
    localStorage.setItem('rpin',rpin.value);
  });
  rphone.addEventListener('change', () => {
    localStorage.setItem('rphone',rphone.value);
  })
  </script>
</body>
</html>
