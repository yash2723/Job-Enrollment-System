function validateForm() {

    var email = document.getElementById("floatingInput-email");
    var password = document.getElementById("floatingPassword");

    var email_pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    var email_pattern = new RegExp(email_pattern);

    var password_pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,12}$/;
    var password_pattern = new RegExp(password_pattern);

    if (email.value == "") {
        alert("Enter your registered Email address.");
        return false;
    }

    if(!(email_pattern.test(email.value)))
    {
        alert("Email is Invalid.")
        return false;
    }

    if (password.value == "") {
        alert("Enter your password.");
        return false;
    }

    if(!(password_pattern.test(password.value)))
    {
        alert("Password is not in correct format.");
        return false;
    }

    return true;

}