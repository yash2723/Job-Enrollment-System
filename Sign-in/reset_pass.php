<?php

    session_start();

    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server , $username , $password);

    if(!$con)
    {
        die("Connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";
    
    $recover_mail = $_SESSION['recover_mail'];
    
    if(isset($recover_mail)) {

        if (isset($_POST['reset-pass-btn'])) {

            $new_pass = $_POST['new-password'];
            $confirm_pass = $_POST['confirm-password'];
      
            if ($new_pass == $confirm_pass) {
                        
                $sql = "UPDATE `job enrollment system`.`jobseeker_basic_details` SET `JS_Password`='$new_pass' WHERE JS_EmailID='$recover_mail' ";
    
                if($con->query($sql) == true)
                {
                    // echo "Successfully Updated.";
                    echo '<script>alert("Password has been Sucessfully Reset.")</script>';
                }
    
            }
            else {
                // echo "Old Password is no correct";
                echo '<script>alert("New Password and Confirm Password must be same.")</script>';
            }
    
        }
    }
    else {
        header("Location: recover_email.php");
    }
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" href="recover_email.css">

    <script src="https://kit.fontawesome.com/3adb198dec.js" crossorigin="anonymous"></script>

    <title>Jobseeker Register Page</title>
</head>

<body>

    <!-- Navbar Section -->

    <!-- <div class="container"> -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">
                <img src="./images/web-logo1.png" alt="">
            </a>
        </div>
    </nav>
    <!-- </div> -->

    <!-- End Navbar Section -->


    <div class="login-section">

        <!-- Full page Image -->

        <div class="back-img">

            <div class="color-layout">

            </div>

        </div>

        <!-- End Full page Image -->


        <!-- Login Card -->

        <div class="card">

            <div class="card-body">

                <h2 class="card-title">
                    Reset Password
                </h2>

                <form action="reset_pass.php" method="post" onsubmit="return validateForm()">

                    <div class="form-floating mb-3">
                        <input type="password" name="new-password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Enter New Password</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" name="confirm-password" class="form-control" id="confirm_floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Enter New Confirm Password</label>
                    </div>

                    <button type="submit" name="reset-pass-btn" class="btn btn-primary">Reset Password</button>

                    <div class="info">
                        Already Have an Account?<a href="sign-in.php"> Sign In instead</a>
                    </div>

                </form>

            </div>

        </div>


        <!-- End Login Card -->


    </div>


    <script>
        function validateForm() {

            var password = document.getElementById("floatingPassword");
            var confirm_password = document.getElementById("confirm_floatingPassword");

            var password_pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,12}$/;
            var password_pattern = new RegExp(password_pattern);

            if (password.value == "") {
                alert("Enter your password.");
                return false;
            }

            if(!(password_pattern.test(password.value)))
            {
                alert("Password is not in correct format.");
                return false;
            }

            if (confirm_password.value == "") {
                alert("Enter your password.");
                return false;
            }

            if(!(password_pattern.test(confirm_password.value)))
            {
                alert("Password is not in correct format.");
                return false;
            }

            if(password.value != confirm_password.value) {
                alert("New Password and Confirm Password must be same.")
            }

            return true;
        }
    </script>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>

</body>

</html>