<?php

$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server , $username , $password);

if(!$con)
{
    die("Connection to this database failed due to" . mysqli_connect_error());
}
// echo "Success connecting to the db";

session_start();
$sign_up_mail = $_SESSION['sign-up-mail'];
$fname = $_SESSION['account-fname'];
$lname = $_SESSION['account-lname'];
$password = $_SESSION['account-password'];
$randfun = $_SESSION['account-otp'];

if(isset($_POST['confirm-otp']))
{

    $otp = $_POST['otp'];

    if ($randfun == $otp) {
        $sql = "INSERT INTO `job enrollment system`.`jobseeker_basic_details` (`JS_FirstName`, `JS_LastName`, `JS_EmailID`, `JS_Password`, `JS_Qualification`, `JS_TestMarks`) VALUES ('$fname', '$lname', '$sign_up_mail', '$password', '', '')";

        if($con->query($sql) == true)
        { 
            //echo "otp sent!";
        }
        else
        {
            echo "error:";
        }
        header("Location: ../Sign-in/sign-in.php");
    }
    else {
        //echo "OTP is invalid. Try again.";
        echo '<script>alert("OTP is invalid. Try again.")</script>';
    }

}

if(isset($_POST['resend-otp']))
{
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
    $mail->addAddress($sign_up_mail);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo(EMAIL);

    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Confirm Your Job Enrollment System Account Email Address';
    $randfun= rand(1000,9999);
    $_SESSION['account-otp'] = $randfun;
    $mail->Body = "Your otp for logging in into sahajtechologies.com is ". $randfun;
            
    // $mail->AltBody = $_POST["messagebody"];

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } 
    else {
        echo '<script>alert("OTP is send on your registered Email address.")</script>';
        //echo 'Message has been sent';
    }
}

$con->close();
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

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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
                    Email Address Verification
                </h2>

                <form action="otp.php" method="post">

                    <div class="form-floating mb-3">
                        <input type="text" name="otp" class="form-control" id="floatingInput-OTP">
                        <label for="floatingInput-OTP">Enter your OTP</label>
                    </div>

                    <button type="submit" name="confirm-otp" class="btn btn-primary" onclick="return validateOTP()">Confirm</button>

                    <button type="submit" name="resend-otp" class="btn btn-primary" onclick="starttimer()">Resend OTP</button>

                    <div class="info">
                        Already Have an Account?<a href="../Sign-in/sign-in.php"> Sign In instead</a>
                    </div>

                </form>

                <div class="timer" style="color: white; text-align:center; margin-top:inherit;">Time left = <span id="timer"></span></div>

                <script>
                    document.getElementById('timer').innerHTML = 2 + ":" + 00;
                    startTimer();

                    function startTimer() {
                        var presentTime = document.getElementById('timer').innerHTML;
                        var timeArray = presentTime.split(/[:]+/);
                        var m = timeArray[0];
                        var s = checkSecond((timeArray[1] - 1));
                        if(s==59){m=m-1}
                        if(m<0){
                            alert('Time is over.Click on Resend button.')
                            document.getElementById("floatingInput-OTP").disabled = true;
                            exit()
                        }
                        
                        document.getElementById('timer').innerHTML =
                            m + ":" + s;
                        console.log(m)
                        setTimeout(startTimer, 1000);

                    }

                    function checkSecond(sec) {
                        if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
                        if (sec < 0) {sec = "59"};
                        return sec;
                    }

                    function starttimer(){
                        document.getElementById("floatingInput").disabled = false;
                        document.getElementById('timer').innerHTML = 2 + ":" + 00;
                        startTimer();
                    }

                    function validateOTP() {

                        var OTP = document.getElementById("floatingInput-OTP");
                        var account_otp = <?php echo $randfun; ?>;

                        var OTP_pattern = /^\d{4}$/;
                        var OTP_pattern = new RegExp(OTP_pattern);

                        if(OTP.value == ""){
                            alert("Enter your OTP.");
                            return false;
                        }

                        if(!(OTP_pattern.test(OTP.value))){
                            alert("OTP is Invalid");
                            return false;
                        }

                        if(!(account_otp == OTP.value)) {
                            alert("OTP is incorrect.");
                            return false;
                        }

                        return true;
                    }


                </script>

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

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->

</body>

</html>

