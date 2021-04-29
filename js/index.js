window.addEventListener("load", checkUser, false);

function checkUser() {
    var returned = document.getElementById("sessionReturn").value;
    var created = document.getElementById("sessionCreate").value;
    if(returned == true) {
        userReturned();
    }
    else if(created == true) {
        userCreated();
    }
}

function userCreated() {
    var sessionCreate = document.getElementById("sessionCreate").value;
    var loginButton = document.getElementById("loginButton");
    var registerButton = document.getElementById("registerButton");
    if (sessionCreate == true) {
        loginButton.remove();
        registerButton.innerHTML = "Logout";
        registerButton.setAttribute("href", "php/logout.php");
    }
}

function userReturned() {
    var sessionReturn = document.getElementById("sessionReturn").value;
    var loginButton = document.getElementById("loginButton");
    if (sessionReturn == true) {
        loginButton.remove();
        registerButton.innerHTML = "Logout";
        registerButton.setAttribute("href", "php/logout.php");
    }
}