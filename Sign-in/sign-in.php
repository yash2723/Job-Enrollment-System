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

    if(isset($_POST['email']))
    {

        $email = $_POST['email'];
        $password = $_POST['password'];

        if ( $email == "admin@gmail.com" && $password == "Admin123" ) {
            $_SESSION['admin-mail'] = $_POST['email'];
            header("Location: ../Admin%20Section/AdminHomePage.php");
        }
        else {
            $_SESSION['mail'] = $_POST['email'];

            $sql = "SELECT `JS_EmailID`, `JS_Password` FROM `job enrollment system`.`jobseeker_basic_details`";

            $result = mysqli_query($con,$sql);
            
            $email_flag = 0;
            $pass_flag = 0;

            while ($row=mysqli_fetch_array($result)) {
                $col1 = $row['JS_EmailID'];
                $col2 = $row['JS_Password']; 

                if ($col1 == $email) {
                    $email_flag = 1;
                    if ($col2 == $password) {
                        $pass_flag = 1;
                        break;
                    }
                }
            }

            if ($email_flag == 1 && $pass_flag == 1) {
                header("Location: ../jobseeker%20section/Profile%20Page/index.php");
            }
            else {

                if($email_flag == 0) {
                    echo '<script>alert("Your Email address is not registered.")</script>';
                }
                else {
                    echo '<script>alert("Password is Incorrect.")</script>';
                }
                //echo "Account is not find.";
            }
        
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

    <link rel="stylesheet" href="style1.css">

    <title>Jobseeker Login Page</title>
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
                Login
            </h2>
            
            <form action="sign-in.php" method="post" onsubmit="return validateForm()">

                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingInput-email" placeholder="name@example.com">
                    <label for="floatingInput-email">Email address</label>
                </div>

                <div class="form-floating mb-3 pass">
                    <input type="password" name="password" class="form-control password" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                    <img class="password-hide" src="./images/eye2.webp" alt="" onclick="passwordHide()">
                </div>

                <script>
                    var Password_Hide = document.querySelector('.password-hide');
                    var password = document.querySelector('.password');
            
                    function passwordHide() {
                        
                        if(Password_Hide.src.match('./images/eye1.png')){
                            Password_Hide.src = 'images/eye2.webp';
                            password.type = 'password';
                        }
                        else{
                            Password_Hide.src = './images/eye1.png';
                            password.type = 'text';
                        }
            
                    }
                </script>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1" style="color: white;">Remember me</label>
                </div>

                <button type="submit" class="btn btn-primary">Sign In</button>

                <div class="forgot-password">
                    Forgot your password ? No worry <a href="recover_email.php"> Click here</a>
                </div>

                <div class="info">
                    Don’t Have an Account?<a href="../Sign-up/sign-up.php"> Sign Up instead</a>
                </div>

            </form>

        </div>

    </div>


    <!-- End Login Card -->



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>

    <script src="script.js"></script>

</body>

</html>
