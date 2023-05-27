function validation() {
    var number = document.getElementById('number').value;
    var password = document.getElementById('password').value;
    if (number == "") {
      alert("Please enter your number.");
      return false;
    } else if(number.length > 10){
      alert("Please enter valid phone number.");
      return false;
    }
    if (password == "") {
      alert("Please enter password");
      return false;
    } else if (password.length < 6) {
      alert("Password must be at least 6 characters long");
      return false;
    }  
    return true;
  }

//   const userInfo = {
//     user_email: "<?php echo $email; ?>",
//     user_phone: "<?php echo $phone_number; ?>"
// };
// export default userInfo;
  