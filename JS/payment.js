var price = localStorage.getItem('price');

const gst = (price * 18) / 100;
const gst_Price = parseInt(price) + gst;

const roundoff = Math.floor(gst_Price);

document.getElementById('price').innerHTML = '₹' + price;
document.getElementById('gst').innerHTML = '₹' + gst;
document.getElementById('round').innerHTML = '₹' + roundoff;
document.getElementById('grand_total').innerHTML = '₹' + roundoff;
document.getElementById('rzp-button1').innerHTML = 'Pay ₹' + roundoff;

var deliveryType = localStorage.getItem('deliveryType');
if (deliveryType === 'sameday') {
  document.querySelector('.deliveryby-line').innerHTML = 'Expected Delivery by today.';
} else if(deliveryType === 'standard'){
  document.querySelector('.deliveryby-line').innerHTML = 'Expected Delivery within 2-3 days.';
} else if(deliveryType === 'nextday'){
  document.querySelector('.deliveryby-line').innerHTML = 'Expected Delivery by tommorrow.';
} else if(deliveryType === 'rush'){
  document.querySelector('.deliveryby-line').innerHTML = 'Expected Delivery within 3 hours.';
}

var options = {
  "key": "rzp_test_3kFdk1wYJBWK50", // Enter the Key ID generated from the Dashboard
  "amount": roundoff * 100,
  "currency": "INR",
  "description": "Corriere - Safely delivered, always",
  "image": "/Corriere/img/LOGO copy.png",
  "prefill":
  {
    "email": userInfo.email,  
    "contact": userInfo.phone_number
  },
  config: {
    display: {
      blocks: {
        banks: {
      name: 'Most Used Methods',
      instruments: [
        {
          method: 'wallet',
          wallets: ['freecharge']
        },
        {
            method: 'upi'
        },
        ],
    },
  },
        utib: { //name for Axis block
          name: "Pay using Axis Bank",
          instruments: [
            {
              method: "card",
              issuers: ["UTIB"]
            },
            {
              method: "netbanking",
              banks: ["UTIB"]
            },
          ]
        },
        other: { //  name for other block
          name: "Other Payment modes",
          instruments: [
            {
              method: "card",
              issuers: ["ICIC"]
            },
            {
              method: 'netbanking'
            }
          ]
        }
      },
      sequence: ['block.banks'],
  preferences: {
    show_default_blocks: true,
      sequence: ["block.utib", "block.other"],
      preferences: {
        show_default_blocks: false // Should Checkout show its default blocks?
      }
    }
  },
  "handler": function (response) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/Corriere/JS/send_email.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
      alert(xhr.responseText);
    }
  };
  var data = "payment_id=" + response.razorpay_payment_id +
           "&price=" + price +
           "&gst=" + gst +
           "&roundoff=" + roundoff +
           "&deliveryType=" + deliveryType;
xhr.send(data);

window.location.href = '../Corriere/home.php';

  function checkPermission(){
    return Notification.requestPermission()
    .then(status=>status === 'granted');
  }
  function sendNotification(){
    checkPermission().then(isAllowed => {
      if(!isAllowed){
        //user denied
        return;
      }

      new Notification('Corriere',{
        body:'Payment successful. Check your email for Order Id and other details.',
      });
    });
  }
  sendNotification();

  },
  "modal": {
    "ondismiss": function () {
      if (confirm("Are you sure, you want to close the form?")) {
        txt = "You pressed OK!";
        console.log("Checkout form closed by the user");
      } else {
        txt = "You pressed Cancel!";
        console.log("Complete the Payment")
      }
    }
  }
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function (e) {
  rzp1.open();
  e.preventDefault();
}

const sname = localStorage.getItem('sname');
const shouseno = localStorage.getItem('shouseno');
const sarea = localStorage.getItem('sarea');
const slandmark = localStorage.getItem('slandmark');
const spin = localStorage.getItem('spin');
const sphone = localStorage.getItem('sphone');

const rname = localStorage.getItem('rname');
const rhouseno = localStorage.getItem('rhouseno');
const rarea = localStorage.getItem('rarea');
const rlandmark = localStorage.getItem('rlandmark');
const rpin = localStorage.getItem('rpin');
const rphone = localStorage.getItem('rphone');

document.querySelector('.sname').innerHTML = sname;
document.querySelector('.shouseno').innerHTML = shouseno+",";
document.querySelector('.sarea').innerHTML = sarea+",";
document.querySelector('.slandmark').innerHTML = slandmark;
document.querySelector('.spin').innerHTML = spin;
document.querySelector('.sphone').innerHTML = 'Mo. '+sphone;
document.querySelector('.scity').innerHTML = 'Gandhinagar,';


document.querySelector('.rname').innerHTML = rname;
document.querySelector('.rhouseno').innerHTML = rhouseno+",";
document.querySelector('.rarea').innerHTML = rarea+",";
document.querySelector('.rlandmark').innerHTML = rlandmark;
document.querySelector('.rpin').innerHTML = rpin;
document.querySelector('.rphone').innerHTML = 'Mo. '+rphone;
document.querySelector('.rcity').innerHTML = 'Gandhinagar,';










