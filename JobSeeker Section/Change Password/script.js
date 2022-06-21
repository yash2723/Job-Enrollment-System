function validateForm() {

    var old_password = document.getElementById("inputPassword1");
    var new_password = document.getElementById("inputPassword2");
    var confirm_password = document.getElementById("inputPassword3");

    var password_pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,12}$/;
    var password_pattern = new RegExp(password_pattern);

    if (old_password.value == "") {
        alert("Enter your Old password.");
        return false;
    }

    if (new_password.value == "") {
        alert("Enter your New password.");
        return false;
    }

    if (confirm_password.value == "") {
        alert("Enter your New Confirm Password.");
        return false;
    }

    if(!(password_pattern.test(old_password.value)))
    {
        alert("Old Password is not in correct format.");
        return false;
    }

    if(!(password_pattern.test(new_password.value)))
    {
        alert("New Password is not in correct format.");
        return false;
    }

    if(!(password_pattern.test(confirm_password.value)))
    {
        alert("New Confirm Password is not in correct format.");
        return false;
    }

    if (!(new_password.value == confirm_password.value)) {
        alert("New and Confirm Password must be same.");
        return false;
    }

    return true;

}