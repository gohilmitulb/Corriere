<?php
// Get the order ID from the URL parameter
$order_id = $_GET['order_id'];


// Get the order details from the database
// ...
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legend take order | Corriere</title>
    <link rel="icon" type="image/png" href="img/LOGO copy.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/takeOrder.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <nav class="sm:flex sm:justify-between">
        <div class="takeOrder_logo_div">
            <img src="img/LOGO.png" alt="logo" class="takeOrder_logo w-[12rem] py-2 px-1 sm:w-[16rem]">
        </div>
        <div class="takeOrder_heading_div p-5">
            <h1 class="takeOrder_heading text-[1.5rem] sm:text-[2rem] sm:pr-5">Delivery information</h1>
        </div>
    </nav>
    <section class="takeOrder_container px-3 flex flex-col gap-[2rem]">
        <div class="taleOrder_orderId">
        <p class="px-4 text-[1.3rem] sm:text-[1.7rem]"><span class="text-[#55acee] font-semibold">Order ID:</span> <?php echo $order_id; ?> </p>
        </div>

        <div class="top flex flex-col items-center lg:flex-row lg:justify-center lg:gap-[3rem]">
            <div class="top-left">
                <h1 class="senderHeading text-[#55acee] font-semibold text-[1.5rem] pb-[0.5rem]">Sender:</h1>
                <div class="address border-[1px] border-[#252525] rounded-lg p-3">
                    <li class="s_firstLine"><span class="sname"></span></li>
                    <li class="s_secondLine flex gap-[1.3rem]"><span class="shouseno"></span><span
                            class="sarea"></span><span class="slandmark"></span></li>
                    <li class="s_thirdLine flex gap-[1.3rem]"><span class="scity"></span><span class="spin"></span></li>
                    <li class="s_fourthLine"><span class="sphone"></span></li>
                </div>
            </div>

            <div class="addressarrow addressarrow1 text-[#55acee] text-[1.8rem] font-bold hidden lg:block">→</div>
            <div class="addressarrow addressarrow2 text-[#55acee] text-[1.8rem] font-bold hidden lg:block">→</div>

            <div class="addressarrow addressarrow1 text-[#55acee] text-[1.8rem] font-bold lg:hidden">↓</div>
            <div class="addressarrow addressarrow2 text-[#55acee] text-[1.8rem] font-bold lg:hidden">↓</div>

            <div class="top-right">
                <h1 class="recieverHeading text-[#55acee] font-semibold text-[1.5rem] pb-[0.5rem]">Receiver:</h1>
                <div class="address border-[1px] border-[#252525] rounded-lg p-3">
                    <li class="r_firstLine"><span class="rname"></span></li>
                    <li class="r_secondLine flex gap-[1.3rem]"><span class="rhouseno"></span><span
                            class="rarea"></span><span class="rlandmark"></span></li>
                    <li class="r_thirdLine flex gap-[1.3rem]"><span class="rcity"></span><span class="rpin"></span></li>
                    <li class="r_fourthLine"><span class="rphone"></span></li>
                </div>
            </div>
        </div>

        <div class="down inline-flex items-center flex-col gap-[3rem]">
            <div class="left">
                <div class="bill flex flex-col gap-[1rem]">
                    <h2 class="checkout-heading text-[#55acee] font-semibold text-[1.5rem] pb-[0.5rem]">Order Summary:</h2>
                    <div class="table-container inline border-[1px] border-[#252525] rounded-lg p-3">
                        <table class="section-line">
                            <tbody class="flex flex-col gap-[1rem]">
                                <tr class="line flex justify-between gap-[11rem]">
                                    <td class="text-[1.25rem] md:text-[1.5rem]">Subtotal:</td>
                                    <td class="text-[1.25rem] md:text-[1.5rem]" id="price" name="price"></td>
                                </tr>
                                <tr class="line flex justify-between">
                                    <td class="text-[1.25rem] md:text-[1.5rem]">GST:</td>
                                    <td class="text-[1.25rem] md:text-[1.5rem]" id="gst" name="gst"></td>
                                </tr>
                                <tr class="line flex justify-between">
                                    <td class="text-[1.25rem] md:text-[1.5rem]">Round-off:</td>
                                    <td class="text-[1.25rem] md:text-[1.5rem]" id="round" name="roundoff"></td>
                                </tr>
                                <tr class="line grand flex justify-between">
                                    <td class="text-[1.25rem] font-bold md:text-[1.5rem]" id="grand_total_title">Grand Total:</td>
                                    <td class="text-[1.25rem] text-[#55acee] md:text-[1.5rem]" id="grand_total"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="right">
                <div class="">
                    <button id="take_order" type="submit" class="border-[1px] border-[#55acee] p-3 mb-[3rem] font-semibold text-[1.3rem] transition-colors hover:bg-[#55acee] hover:text-white">Take Order</button>
                </div>
            </div>
        </div>

    </section>
</body>

<script src="JS/takeOrder.js"></script>

</html>