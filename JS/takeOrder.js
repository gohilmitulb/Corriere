var price = localStorage.getItem('price');

const gst = (price * 18) / 100;
const gst_Price = parseInt(price) + gst;

const roundoff = Math.floor(gst_Price);

document.getElementById('price').innerHTML = '₹' + price;
document.getElementById('gst').innerHTML = '₹' + gst;
document.getElementById('round').innerHTML = '₹' + roundoff;
document.getElementById('grand_total').innerHTML = '₹' + roundoff;

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

const takeOrder_btn = document.querySelector('#take_order');

takeOrder_btn.addEventListener('click', ()=>{
    window.location.href = 'updateDelivery_status.php';
});