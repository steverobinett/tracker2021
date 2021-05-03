// window.addEventListener("load", addListeners, false);

function validators() {
    var validSubmit = false;
    var email = document.getElementById("userEmail").value;
    var pass1 = document.getElementById("password1").value;
    var pass2 = document.getElementById("password2").value;
    var fname = document.getElementById("userFirst").value;
    var lname = document.getElementById("userLast").value;
    var emailValid = emailValidate(email, emailArray);
    var passValid = passwordValidate(pass1, pass2);
    var nameValid = nameValidate(fname, lname);
    if (emailValid == true && passValid == true && nameValid == true) {
        validSubmit = true;
    }
    return validSubmit;
}

function emailValidate(email) {
    var errDiv = document.getElementById("emailError");
    var emailString = document.getElementById("emailArray").value;
    var emailBox = document.getElementById("userEmail");
    var emails = emailString.split(' ');
    var re = new RegExp(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
    var valid = false;
    if(email == "") {
        errDiv.innerHTML = "Please complete the required field"
        errDiv.style.display = "block";
        emailBox.style.border = "solid red 2px";
    }
    else if(re.test(email) == false) {
        errDiv.innerHTML = "Inapplicable email format";
        errDiv.style.display = "block";
        emailBox.style.border = "solid red 2px";
    }
    else if(emails.includes(email)) {
        errDiv.innerHTML = "Email already registered";
        errDiv.style.display = "block";
        emailBox.style.border = "solid red 2px";
    }
    else {
        valid = true;
        errDiv.style.display = "none";
        emailBox.style.border = "none";
    }
    return valid;
}

function passwordValidate(pass1, pass2) {
    var errDiv1 = document.getElementById("pass1Error");
    var errDiv2 = document.getElementById("pass2Error");
    var pass1Box = document.getElementById("password1");
    var pass2Box = document.getElementById("password2");
    var re = new RegExp(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/);
    var valid = false;
    if(pass1 == "" || pass2 == "") {
        for(var x = 0; x < 2; x++) {
            if(pass1 == "") {
                errDiv1.innerHTML = "Please complete the required field";
                errDiv1.style.display = "block";
                pass1Box.style.border = "solid red 2px";
            }
            if(pass2 == "") {
                errDiv2.innerHTML = "Please complete the required field";
                errDiv2.style.display = "block";
                pass2Box.style.border = "solid red 2px";
            }
        }
    }
    else if (pass1 != pass2) {
        errDiv1.innerHTML = "Passwords do not match";
        errDiv1.style.display = "block";
        pass1Box.style.border = "solid red 2px";
        errDiv2.innerHTML = "Passwords do not match";
        errDiv2.style.display = "block";
        pass2Box.style.border = "solid red 2px";
    }
    else if (re.test(pass1) == false) {
        errDiv1.innerHTML = "Passwords require: \n\
                            8 character minimum \n\
                            1 uppercase letter \n\
                            1 lowercase letter";
        errDiv1.style.display = "block";
        pass1Box.style.border = "solid red 2px";
    }
    else {
        valid = true;
        errDiv1.style.display = "none";
        pass1Box.style.border = "none";
        errDiv2.style.display = "none";
        pass2Box.style.border = "none";
    }
    return valid;
}

function nameValidate(fname, lname) {
    var errDiv1 = document.getElementById("userFirstError");
    var errDiv2 = document.getElementById("userLastError");
    var fnameBox = document.getElementById("userFirst");
    var lnameBox = document.getElementById("userLast");
    var valid = false;
    if(fname == "" || lname == "") {
        if(fname == "" && lname == "") {
            errDiv1.innerHTML = "Please complete the required field";
            errDiv1.style.display = "block";
            fnameBox.style.border = "solid red 2px";
            errDiv2.innerHTML = "Please complete the required field";
            errDiv2.style.display = "block";
            lnameBox.style.border = "solid red 2px";
        }
        else if(fname == "" && lname != "") {
            errDiv2.style.display = "none";
            lnameBox.style.border = "none";
            errDiv1.innerHTML = "Please complete the required field";
            errDiv1.style.display = "block";
            fnameBox.style.border = "solid red 2px";
        }
        else if(fname != "" && lname == "" ) {
            errDiv1.style.display = "none";
            fnameBox.style.border = "none";
            errDiv2.innerHTML = "Please complete the required field";
            errDiv2.style.display = "block";
            lnameBox.style.border = "solid red 2px";
        }
    }
    else {
        valid = true;
        errDiv1.style.display = "none";
        fnameBox.style.border = "none";
        errDiv2.style.display = "none";
        lnameBox.style.border = "none";
    }
    return valid;
}