<?php

session_start();

if(isset($_POST['fname']))
{
    
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server , $username , $password);

    if(!$con)
    {
        die("Connection to this database failed due to" . mysqli_connect_error());
    }
    //echo "Success connecting to the db";

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $terms = $_POST['terms'];


    $sql = "SELECT `JS_EmailID` FROM `job enrollment system`.`jobseeker_basic_details`";

    $result = mysqli_query($con,$sql);
        
    $flag = 0;

    while ($row = mysqli_fetch_array($result)) {
        $col1 = $row['JS_EmailID']; 

        if ($col1 == $email) {
            $flag = 1;
            break;
        }
    }

    if ($flag == 1) {
        echo '<script>alert("Your Email address already registered.")</script>';
    }
    else{
        
        //--------------------------------------------

        require 'PHPMailerAutoload.php';
        require 'credentials.php';
        require  'phpmailer/class.smtp.php';
        require  'phpmailer/class.phpmailer.php';

        $mail = new PHPMailer();

        // $mail->SMTPDebug = 4;      
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;    // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = EMAIL;                 // SMTP username
        $mail->Password = PASS;                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        $mail->setFrom(EMAIL, 'Job Enrollment System');
        $mail->addAddress($_POST['email']);     // Add a recipient
        //$mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo(EMAIL);

        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Confirm Your Job Enrollment System Account Email Address';
        $randfun= rand(1000,9999);
        $mail->Body    = "Your otp for logging in into sahajtechologies.com is  ". $randfun;
            
        // $mail->AltBody = $_POST["messagebody"];

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } 
        else {
            //echo 'Message has been sent';
            $_SESSION['sign-up-mail'] = $email;
            $_SESSION['account-fname'] = $fname;
            $_SESSION['account-lname'] = $lname;
            $_SESSION['account-password'] = $password;
            $_SESSION['account-otp'] = $randfun;
            header("Location: otp.php");
        }

        //--------------------------------------------

    }

    $con->close();
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

    <link rel="stylesheet" href="style.css">

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
                    <i class="fas fa-user-plus"></i>
                    Sign Up
                </h2>
                

                <form action="sign-up.php" method="post" onsubmit="return validateForm()">

                    <div class="form-floating mb-3">
                        <input type="text" name="fname" class="form-control" id="floatingInput-fname" placeholder="name@example.com">
                        <label for="floatingInput-fname">First Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="lname" class="form-control" id="floatingInput-lname" placeholder="name@example.com">
                        <label for="floatingInput-lname">Last Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingInput-email" placeholder="name@example.com">
                        <label for="floatingInput-email">Email address</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>

                    <p style = "color: white;">Note : Password must 6 to 12 characters long and contains at least one numeric digit, one uppercase and one lowercase letter.</p>

                    <div class="mb-3 form-check">
                        <input type="checkbox" name="terms" value="Accept" class="form-check-input" id="exampleCheck-terms">
                        <label class="form-check-label" for="exampleCheck-terms" style="color: white;">You accept our  <a href="../PrivacyandTC/T&C.html" style="text-decoration: none;"> Terms and Conditions </a> and <a href="../PrivacyandTC/PrivacyPolicy.html" style="text-decoration: none;"> Privacy Policy </a> </label>

                    </div>

                    <button type="submit" class="btn btn-primary">Sign Up</button>

                    <div class="info">
                        Already Have an Account?<a href="../Sign-in/sign-in.php"> Sign In instead</a>
                    </div>

                </form>

            </div>

        </div>


        <!-- End Login Card -->


    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>

    <script src="script.js"></script>

</body>

</html>
