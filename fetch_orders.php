<?php
include 'partials/dbconnect.php';

// Retrieve the order IDs and order details from the database
$result = mysqli_query($conn, "SELECT p.order_id, od.sender_name, od.sender_number, od.sender_pincode, od.sender_houseno, od.sender_area, od.sender_landmark, od.sender_city, od.weight, od.package_type, od.parcel_name, od.delivery_speed, od.receiver_name, od.receiver_number, od.receiver_pincode, od.receiver_houseno, od.receiver_area, od.receiver_landmark, od.receiver_city, od.time 
                              FROM payment p
                              INNER JOIN order_details od ON p.order_id = od.order_id");

// Create an array to hold the orders
$orders = array();

// Loop through the result set and add each order to the array
while ($row = mysqli_fetch_assoc($result)) {
    $orders[] = $row['order'];
}

// Return the orders as JSON
echo json_encode($orders);




// include 'partials/dbconnect.php';

// // Retrieve the order IDs from the database
// $result = mysqli_query($conn, "SELECT order_id FROM payment");

// // Create an array to hold the order IDs
// $orders = array();

// // Loop through the result set and add each order ID to the array
// while ($row = mysqli_fetch_assoc($result)) {
//     $orders[] = $row['order_id'];
// }

// // Return the order IDs as JSON
// echo json_encode($orders);
?>
