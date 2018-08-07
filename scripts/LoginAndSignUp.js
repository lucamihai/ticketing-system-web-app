function CheckLogin() {
    var isOk = true;

    var LoginForm = document.getElementById("Login");
    var ErrorsArea = LoginForm.getElementsByClassName("errors")[0]; //div where errors will be shown
    ErrorsArea.innerHTML = ""; //clear its contents, so the old errors won't be shown

    var InputIdentifier = LoginForm.getElementsByClassName("inputIdentifier")[0];
    var InputPassword = LoginForm.getElementsByClassName("inputPassword")[0];

    var identifier = InputIdentifier.value;
    var password = InputPassword.value;

    if (identifier == "") {
        ErrorsArea.innerHTML += GenerateErrorDiv("Enter your username or email");
        isOk = false;
    }

    if (password == "") {
        ErrorsArea.innerHTML += GenerateErrorDiv("Enter your password");
        isOk = false;
    }

    return isOk;
}

function CheckSignUp() {
    var isOk = true;

    var SignUpForm = document.getElementById("SignUp");
    var ErrorsArea = SignUpForm.getElementsByClassName("errors")[0]; //div where errors will be shown
    ErrorsArea.innerHTML = ""; //clear its contents, so the old errors won't be shown

    var InputFirstName = SignUpForm.getElementsByClassName("inputFirstName")[0];
    var InputLastName = SignUpForm.getElementsByClassName("inputLastName")[0];
    var InputUsername = SignUpForm.getElementsByClassName("inputUsername")[0];
    var InputEmail = SignUpForm.getElementsByClassName("inputEmail")[0];
    var InputPassword = SignUpForm.getElementsByClassName("inputPassword")[0];
    var InputConfirmPassword = SignUpForm.getElementsByClassName("inputConfirmPassword")[0];
    
    var firstName = InputFirstName.value;
    var lastName = InputLastName.value;
    var username = InputUsername.value;
    var email = InputEmail.value;
    var password = InputPassword.value;
    var confirmPassword = InputConfirmPassword.value;

    if (firstName == "") {
        ErrorsArea.innerHTML += GenerateErrorDiv("First name field shouldn't be empty");
        isOk = false;
    }
    if (firstName.length > 25) {
        ErrorsArea.innerHTML += GenerateErrorDiv("First name field should have at most 25 characters");
        isOk = false;
    }

    if (lastName == "") {
        ErrorsArea.innerHTML += GenerateErrorDiv("Last name field shouldn't be empty");
        isOk = false;
    }
    if (lastName.length > 25) {
        ErrorsArea.innerHTML += GenerateErrorDiv("Last name field should have at most 25 characters");
        isOk = false;
    }

    if (username == "") {
        ErrorsArea.innerHTML += GenerateErrorDiv("Username field shouldn't be empty");
        isOk = false;
    }
    if (username.length > 25) {
        ErrorsArea.innerHTML += GenerateErrorDiv("Username field should have at most 25 characters");
        isOk = false;
    }

    if (!validateEmail(email)) {
        ErrorsArea.innerHTML += GenerateErrorDiv("Invalid email format");
        isOk = false;
    }

    if (password == "") {
        ErrorsArea.innerHTML += GenerateErrorDiv("Password field shouldn't be empty");
        isOk = false;
    }
    if (password != confirmPassword) {
        ErrorsArea.innerHTML += GenerateErrorDiv("Passwords don't match");
        isOk = false;
    }

    return isOk;
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function GenerateErrorDiv(message) {
    //place every error message in a separate div
    return "<div>" + message + "</div>";
}

function ReenterSignUpValues(firstname, lastname, username, email){

    var SignUpForm = document.getElementById("SignUp");

    var InputFirstName = SignUpForm.getElementsByClassName("inputFirstName")[0];
    var InputLastName = SignUpForm.getElementsByClassName("inputLastName")[0];
    var InputUsername = SignUpForm.getElementsByClassName("inputUsername")[0];
    var InputEmail = SignUpForm.getElementsByClassName("inputEmail")[0];

    InputFirstName.value = firstname;
    InputLastName.value = lastname;
    InputUsername.value = username;
    InputEmail.value = email;
}