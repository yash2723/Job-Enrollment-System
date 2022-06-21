window.addEventListener("scroll",function(){
    var header  =   document.querySelector(".navbar");
    header.classList.toggle("navbar-background",window.scrollY > 0)
   
})


function validateForm() {

    var fname = document.getElementById("floatingInput-fname");
    var email = document.getElementById("floatingInput-email");
    var phone = document.getElementById("floatingInput-phone");
    var city = document.getElementById("floatingInput-city");
    var comment = document.getElementById("floatingTextarea-comment");
    
    var letters = /^[a-z A-Z]+$/;
    var letters = new RegExp(letters);

    var email_pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    var email_pattern = new RegExp(email_pattern);

    var phoneno_pattern = /^\d{10}$/;
    var phoneno_pattern = new RegExp(phoneno_pattern);

    if(fname.value == '') 
    {
        alert("Enter your Full name.");
        return false;
    }

    if(!(letters.test(fname.value)))
    {
        alert("Full Name must contain only letters.");
        return false;
    }
    
    if(email.value == '') 
    {
        alert("Enter your Email address.");
        return false;
    }
    
    if(!(email_pattern.test(email.value)))
    {
        alert("Email is Invalid.");
        return false;
    } 

    if(phone.value == '') 
    {
        alert("Enter your Phone number.");
        return false;
    }

    if(!(phoneno_pattern.test(phone.value)))
    {
        alert("Phone Number is Invalid.");
        return false;
    }

    if(city.value == '') 
    {
        alert("Enter your city.");
        return false;
    }

    if(!(letters.test(city.value)))
    {
        alert("City must contain only letters."); 
        return false;
    }

    if(comment.value == '')
    {
        alert("Enter any comment.");
        return false;
    }
    
    return true;

}