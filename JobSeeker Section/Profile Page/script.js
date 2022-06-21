
function validateForm() {

    var fname = document.getElementById("input-fname");
    var ptitle = document.getElementById("input-ptitle");
    var language = document.getElementById("input-language");
    var age = document.getElementById("input-age");
    var csalary = document.getElementById("input-csalary");
    var esalary = document.getElementById("input-esalary");
    var description = document.getElementById("input-description");
    var phone = document.getElementById("input-phone");
    var email = document.getElementById("input-email");
    var country = document.getElementById("input-country");
    var postcode = document.getElementById("input-postcode");
    var city = document.getElementById("input-city");
    var address = document.getElementById("input-address");

    var letters = /^[a-z A-Z]+$/;
    var letters = new RegExp(letters);

    // for language
    var letters1 = /^[a-z A-Z /,]+$/;
    var letters1 = new RegExp(letters1);

    var age_pattern = /^\d{2}$/;
    var age_pattern = new RegExp(age_pattern);

    var email_pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    var email_pattern = new RegExp(email_pattern);

    var phoneno_pattern = /^\d{10}$/;
    var phoneno_pattern = new RegExp(phoneno_pattern);

    if(fname.value != '') 
    {
        if(!(letters.test(fname.value)))
        {
            alert("Full Name must contain only letters.") 
            return false;
        }
    }

    if(ptitle.value != '') 
    {
        if(!(letters.test(ptitle.value)))
        {
            alert("Professional title must contain only letters.")
            return false;
        }
    }

    if(language.value != '') 
    {
        if(!(letters1.test(language.value)))
        {
            alert("Languages must not contain special characters.")
            return false;
        }
    }

    if(age.value != '') 
    {
        if(!(age_pattern.test(age.value)))
        {
            alert("Age is Invalid.")
            return false;
        }
    }

    if(phone.value != '') 
    {
        if(!(phoneno_pattern.test(phone.value)))
        {
            alert("Phone Number is Invalid.")
            return false;
        }
    }

    if(email.value != '') 
    {
        if(!(email_pattern.test(email.value)))
        {
            alert("Email is Invalid.")
            return false;
        }   
    }

    if(country.value != '') 
    {
        if(!(letters.test(country.value)))
        {
        alert("Country must contain only letters.") 
        return false;
        }
    }

    if(city.value != '') 
    {
        if(!(letters.test(city.value)))
        {
        alert("City must contain only letters.") 
        return false;
        }
    }
    
    return true;

}

function checkDetails() {

    var profile_image = document.getElementById("camera-icon-res");
    var profile_image = document.getElementById("camera-icon");
    var fname = document.getElementById("input-fname");
    var ptitle = document.getElementById("input-ptitle");
    var language = document.getElementById("input-language");
    var age = document.getElementById("input-age");
    var description = document.getElementById("input-description");
    var phone = document.getElementById("input-phone");
    var email = document.getElementById("input-email");
    var country = document.getElementById("input-country");
    var postcode = document.getElementById("input-postcode");
    var city = document.getElementById("input-city");
    var address = document.getElementById("input-address");
    var save_btn = document.getElementById("save-btn");

    if (fname.value == '') {
        alert("Full Name Field must be required."); 
        return false;   
    }

    if (ptitle.value == '') {
        alert("Professional title Field must be required.");
        return false;
    }

    if (language.value == '') {
        alert("Language Field must be required.");
        return false;
    }

    if (age.value == '') {
        alert("Age Field must be required.");
        return false;
    }

    if (description.value == '') {
        alert("Description Field must be required.");
        return false;
    }

    if (phone.value == '') {
        alert("Phone number Field must be required.");
        return false;
    }

    if (email.value == '') {
        alert("Email Address Field must be required.");
        return false;
    }

    if (country.value == '') {
        alert("Country Field must be required.");
        return false;
    }

    if (postcode.value == '') {
        alert("Postcode Field must be required.");
        return false;
    }

    if (city.value == '') {
        alert("City Field must be required.");
        return false;
    }

    if (address.value == '') {
        alert("Address Field must be required.");
        return false;
    }

    save_btn.click();
    return true;
}