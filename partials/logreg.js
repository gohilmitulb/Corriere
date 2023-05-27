function showloginmodal(){
    document.querySelector('.overlay').classList.add('showoverlay');
    document.querySelector('body').classList.add('overlaybody');
    document.querySelector('.login').classList.add('login-modal');
}
function showregistermodal(){
    document.querySelector('.overlay').classList.add('showoverlay');
     document.querySelector('body').classList.add('overlaybody');
    document.querySelector('.login').classList.remove('login-modal');
    document.querySelector('.register').classList.add('register-modal');
}
function showlogregister(){
    document.querySelector('.overlay').classList.add('showoverlay');
     document.querySelector('body').classList.add('overlaybody');
    document.querySelector('.register').classList.remove('register-modal');
    document.querySelector('.login').classList.add('login-modal');
}
function closeloginmodal(){
    document.querySelector('.overlay').classList.remove('showoverlay');
     document.querySelector('body').classList.remove('overlaybody');
    document.querySelector('.login').classList.remove('login-modal');
}
function closeregistermodal(){
    document.querySelector('.overlay').classList.remove('showoverlay');
     document.querySelector('body').classList.remove('overlaybody');
    document.querySelector('.register').classList.remove('register-modal');
}

const delaytime = 0.5 * 60 * 1000;
setTimeout(showloginmodal, delaytime);


// const btnlogin = document.querySelector("#loginnav");
// btnlogin.addEventListener("click", showloginmodal)

// const btnregister = document.querySelector("#regbtn");
// btnregister.addEventListener("click", showregistermodal)

// const btnreglog = document.querySelector("#logbtn");
// btnreglog.addEventListener("click", showlogregister)

// const closelogin = document.querySelector(".logincross");
// closelogin.addEventListener("click", closeloginmodal)

// const closeregister = document.querySelector(".registercross");
// closeregister.addEventListener("click", closeregistermodal)