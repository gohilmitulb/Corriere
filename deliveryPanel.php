<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Legend Panel | Corriere</title>
  <link rel="icon" type="image/png" href="img/LOGO copy.png">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <nav class="flex items-center justify-between">
    <div class="legendPage_logo_div">
      <img src="img/LOGO.png" alt="logo" class="legendPage_logo w-[13rem] py-2 px-1 sm:w-[16rem]">
    </div>
    <div class="gohomediv">
      <a href="home.php" title="Go to Home"><i
          class="fa fa-home text-[2rem] pr-2 text-[#55acee] sm:text-[3rem] sm:pr-5"></i></a>
    </div>
  </nav>
  <section class="deliveryPanel_container">
    <div class="legendPage_heading_div">
      <h1 class="legendPage_heading text-[1.6rem] pt-3 px-3">Delivery Order Dashboard</h1>
    </div>

    <div class="order_section_div">
      <div class="ongoing_order_div"></div>
      <div id="order_section" class="sm:flex sm:flex-wrap"></div>
    </div>

  </section>
</body>

<script src="JS/deliveryPanel.js"></script>


<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    background-color: #ccd6dd;
  }

  .legendPage_heading {
    color: #55acee;
    font-weight: 500;
  }

  .order_section {
    border-color: #55acee;
  }

  .order_line {
    border: 2px solid #55acee;
    border-radius: 0.5rem;
    padding: 0.5rem;
    margin: 0.8rem;
    cursor: pointer;
    transition: 0.5s
  }

  .order_line:hover {
    box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
  }

  .order_line p {
    font-size: 1.1rem;
  }

  .order_line span {
    font-weight: bold;
    color: #55acee;
  }

  .activeOrder_heading{
    font-size: 1.5rem;
    padding-left: 1rem;
    color: #55acee;
    font-weight: 500;
  }

  /* .ongoing_order_div{
    border: 2px solid #252525;
  } */
</style>

</html>