function validateForm() {

    var fname = document.getElementById("floatingInput-fname");
    var lname = document.getElementById("floatingInput-lname");
    var email = document.getElementById("floatingInput-email");
    var password = document.getElementById("floatingPassword");
    var terms = document.getElementById("exampleCheck-terms");

    var letters = /^[a-zA-Z]+$/;
    var letters = new RegExp(letters);

    var email_pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    var email_pattern = new RegExp(email_pattern);

    var password_pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,12}$/;
    var password_pattern = new RegExp(password_pattern);

    if (fname.value == "") {
      alert("First Name is Mandatory.");
      return false;
    }

    if(!(letters.test(fname.value)))
    {
       alert("First Name must contain only letters.") 
       return false;
    }

    if (lname.value == "") {
        alert("Last Name is Mandatory.");
        return false;
    }

    if(!(letters.test(lname.value)))
    {
        alert("Last name must contain only letters.")
        return false;
    }

    if (email.value == "") {
        alert("Email is Mandatory.");
        return false;
    }

    if(!(email_pattern.test(email.value)))
    {
        alert("Email is Invalid.")
        return false;
    }

    if (password.value == "") {
        alert("Password is Mandatory.");
        return false;
    }

    if(!(password_pattern.test(password.value)))
    {
        alert("Password must 6 to 12 characters long and contains at least one numeric digit, one uppercase and one lowercase letter.")
        return false;
    }

    if (terms.checked == false) {
        alert("Accept our Terms & Conditions and Privacy Policy.");
        return false;
    }


    return true;

}



