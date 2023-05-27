function validation() {

    var name = document.getElementById('name').value;
    var number = document.getElementById('number').value;
    var email = document.getElementById('mail').value;
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirm-password').value;
  
  
    if (name == "") {
      alert("Please enter your name.");
      return false;
    }

    if (number == "") {
        alert("Please enter your name.");
        return false;
      }
      else if(number.length >=13 ) {
        alert("Please enter valid number.")
      }
   
    if (email == "") {
      alert("Email field must be filled out");
      return false;
    } else {
      var emailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      if (!email.match(emailFormat)) {
        alert("Invalid email address");
        return false;
      }
    }
  
 
    if (password == "") {
      alert("Password field must be filled out");
      return false;
    } else if (password.length < 5) {
      alert("Password must be at least 5 characters long");
      return false;
    }
  
    if (confirmPassword == "") {
      alert("Confirm password field must be filled out");
      return false;
    } else if (password != confirmPassword) {
      alert("Passwords do not match");
      return false;
    }

    return true;
  }