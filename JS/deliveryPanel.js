function updateOrders() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'fetch_orders.php');
    xhr.onload = function () {
        if (xhr.status === 200) {
            const orders = JSON.parse(xhr.responseText);
            const orderSection = document.getElementById('order_section');
            // Clear the existing HTML
            orderSection.innerHTML = '';
            // Loop through the orders and add them to the order_section
            orders.forEach(function (order) {
                const newDiv = document.createElement('div');
                newDiv.classList.add('order_line');
                const orderID = order.order_id;
                const senderName = order.sender_name;
                const senderNumber = order.sender_number;
                const senderPincode = order.sender_pincode;
                const senderHouseNo = order.sender_houseno;
                const senderArea = order.sender_area;
                const senderLandmark = order.sender_landmark;
                const senderCity = order.sender_city;
                const weight = order.weight;
                const packageType = order.package_type;
                const parcelName = order.parcel_name;
                const deliverySpeed = order.delivery_speed;
                const receiverName = order.receiver_name;
                const receiverNumber = order.receiver_number;
                const receiverPincode = order.receiver_pincode;
                const receiverHouseNo = order.receiver_houseno;
                const receiverArea = order.receiver_area;
                const receiverLandmark = order.receiver_landmark;
                const receiverCity = order.receiver_city;
                const time = order.time;
                var deliveryType = localStorage.getItem('deliveryType');
                if (deliveryType === 'sameday') {

                                newDiv.innerHTML = `
                                <a href="takeOrder.php?order_id=${orderID}"><p><span>Order ID:</span> ${orderID}</p>
                                <p>Expected Delivery by today.</p></a>
                                `;
                    
                              } else if (deliveryType === 'standard') {
                    
                                newDiv.innerHTML = `
                                <a href="takeOrder.php?order_id=${orderID}"><p><span>Order ID: </span>${orderID}</p>
                                <p>Expected Delivery within 2-3 days.</p></a>
                                `;
                    
                              } else if (deliveryType === 'nextday') {
                    
                                newDiv.innerHTML = `
                                <a href="takeOrder.php?order_id=${orderID}"><p><span>Order ID:</span> ${orderID}</p>
                                <p>Expected Delivery by tommorrow.</p></a>
                                `;
                    
                              } else if (deliveryType === 'rush') {
                    
                                newDiv.innerHTML = `
                                <a href="takeOrder.php?order_id=${orderID}"><p><span>Order ID:</span> ${orderID}</p>
                                <p>Expected Delivery within 3 hours.</p></a>
                                `;
                    
                              }
                              orderSection.appendChild(newDiv);
                            });
                          }
                        };
                        xhr.send();
                      }
                    
                      // Call the updateOrders function initially to populate the order_section with existing orders
                      updateOrders();
                    
                      // Call the updateOrders function every 5 seconds to update the order_section with new orders
                      setInterval(updateOrders, 5000);
                    
               





// function updateOrders() {
//     const xhr = new XMLHttpRequest();
//     xhr.open('GET', 'fetch_orders.php');
//     xhr.onload = function () {
//       if (xhr.status === 200) {
//         const orderIDs = JSON.parse(xhr.responseText);
//         const orderSection = document.getElementById('order_section');
//         // Clear the existing HTML
//         orderSection.innerHTML = '';
//         // Loop through the order IDs and add them to the order_section
//         orderIDs.forEach(function (orderID) {
//           const newDiv = document.createElement('div');
//           newDiv.classList.add('order_line');
//           var deliveryType = localStorage.getItem('deliveryType');
//           if (deliveryType === 'sameday') {

//             newDiv.innerHTML = `
//             <a href="takeOrder.php?order_id=${orderID}"><p><span>Order ID:</span> ${orderID}</p>
//             <p>Expected Delivery by today.</p></a>
//             `;

//           } else if (deliveryType === 'standard') {

//             newDiv.innerHTML = `
//             <a href="takeOrder.php?order_id=${orderID}"><p><span>Order ID: </span>${orderID}</p>
//             <p>Expected Delivery within 2-3 days.</p></a>
//             `;

//           } else if (deliveryType === 'nextday') {

//             newDiv.innerHTML = `
//             <a href="takeOrder.php?order_id=${orderID}"><p><span>Order ID:</span> ${orderID}</p>
//             <p>Expected Delivery by tommorrow.</p></a>
//             `;

//           } else if (deliveryType === 'rush') {

//             newDiv.innerHTML = `
//             <a href="takeOrder.php?order_id=${orderID}"><p><span>Order ID:</span> ${orderID}</p>
//             <p>Expected Delivery within 3 hours.</p></a>
//             `;

//           }
//           orderSection.appendChild(newDiv);
//         });
//       }
//     };
//     xhr.send();
//   }

//   // Call the updateOrders function initially to populate the order_section with existing orders
//   updateOrders();

//   // Call the updateOrders function every 5 seconds to update the order_section with new orders
//   setInterval(updateOrders, 5000);
