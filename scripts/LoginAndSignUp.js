function CheckSignUp() {
    var isOk = true;

    var SignUpForm = document.getElementById("SignUp");
    var ErrorsArea = SignUpForm.getElementsByClassName("errors")[0];
    ErrorsArea.innerHTML = "";

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

    if (firstName == ""){
        ErrorsArea.innerHTML+=GenerateErrorDiv("First name field shouldn't be empty");
        isOk=false;
    }
    if (firstName.length > 25){
        ErrorsArea.innerHTML+=GenerateErrorDiv("First name field should have at most 25 characters");
        isOk=false;
    }

    if (lastName == ""){
        ErrorsArea.innerHTML+=GenerateErrorDiv("Last name field shouldn't be empty");
        isOk=false;
    }
    if (lastName.length > 25){
        ErrorsArea.innerHTML+=GenerateErrorDiv("Last name field should have at most 25 characters");
        isOk=false;
    }

    if (username == ""){
        ErrorsArea.innerHTML+=GenerateErrorDiv("Username field shouldn't be empty");
        isOk=false;
    }
    if (username.length > 25){
        ErrorsArea.innerHTML+=GenerateErrorDiv("Username field should have at most 25 characters");
        isOk=false;
    }

    if (!validateEmail(email)){
        ErrorsArea.innerHTML+=GenerateErrorDiv("Invalid email format");
        isOk=false;
    }

    if (password == ""){
        ErrorsArea.innerHTML+=GenerateErrorDiv("Password field shouldn't be empty");
        isOk=false;
    }
    if (password != confirmPassword){
        ErrorsArea.innerHTML+=GenerateErrorDiv("Passwords don't match");
        isOk=false;
    }

    return isOk;
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function GenerateErrorDiv(message) {
    return "<div>"+message+"</div>";
}