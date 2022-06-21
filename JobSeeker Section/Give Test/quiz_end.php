<?php

  error_reporting(E_ALL ^ E_NOTICE);
  session_start();
  $x = $_SESSION["first"];
  $y = $_SESSION["second"];
  $z = $_SESSION["third"];
  $q = $_SESSION["fourth"];
  $f = $_SESSION["fifth"];
  $s = $_SESSION["sixth"];
  $s1 = $_SESSION["seventh"];
  $e = $_SESSION["eighth"];
  $n = $_SESSION["ninth"];
  $t = $_SESSION["tenth"];
  $el = $_SESSION["eleventh"];
  $tw = $_SESSION["twelveth"];
  $thi = $_SESSION["thirteenth"];
  $ft = $_SESSION["fourteenth"];
  $fif = $_SESSION["fifteen"];
  $em = $_SESSION["emailaddid"];
  date_default_timezone_set("Asia/Kolkata");
  //print_r($_SESSION);
  //echo $_SESSION["tenth"];
  $emin = "<script>document.write(new Date().getMinutes());</script>";
  $eh = "<script>document.write(new Date().getHours() %12);</script>";
  $es = "<script>document.write(new Date().getSeconds());</script>";
  $endtim = $eh . ":" . $emin . ":" . $es;
  $endtime = DateTime::createFromFormat('H:i:s A', $endtim);
  setlocale(LC_ALL, NULL);
  $v = date("H");
  $start = $_SESSION["start"];
  $mysqlend = date("H:i:s"); //time());
  //echo $v."".$mysqlend;
  $marks = $_SESSION["marks"];
  $dbjob = $_SESSION["dbjob"];
  $server = "localhost";
  $dbuser = "root";
  $conn = mysqli_connect($server, $dbuser);
  if (!$conn) {
    die("could not connect" . mysqli_connect_error());
  }
  //echo $em;
  if (isset($_POST["seeresults"])) {


    /*$sql9="INSERT INTO employee.`$dbjob`(`USER_ID`,`EMAIL`,`START_TIME`,`END_TIME`,`ANS_NO1`,`ANS_NO2`,`ANS_NO3`,`ANS_NO4`,`ANS_NO5`,`ANS_NO6`,`ANS_NO7`,`ANS_NO8`,`ANS_NO9`,`ANS_NO10`,`ANS_NO11`,`ANS_NO12`,`ANS_NO13`,`ANS_NO14`,`ANS_NO15`,`JS_TESTMARKS`) VALUES ('$uid','$em','$start','$mysqlend','$x','$y','$z','$q','$f','$s','$s1','$e','$n','$t','$el','$tw','$thi','$ft','$fif','$marks');";
          $res67=mysqli_query($conn,$sql9);
          if($res67)
          {*/
    echo "submited ans!";
    header("Location: usercorrect.php");
  }
  /*else
          {
              echo "not con".$conn->error;
          }*/


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Optional theme -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="../styles/index.css"> -->
  <!-- <link rel="stylesheet" href="../styles/main_quiz.css"> -->
  <link rel="stylesheet" href="quiz_end.css">
  <script src="https://kit.fontawesome.com/3adb198dec.js" crossorigin="anonymous"></script>
  <title>Job Finder - Technical Quiz</title>
</head>

<body>
   <!-- <div class="container"> -->
   <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="../Profile Page/images/web-logo1.png" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
  
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Home</a>
          </li>
  
          <li class="nav-item">
            <div class="dropdown">
              <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                data-bs-toggle="dropdown" aria-expanded="false">
                For Candidates
              </a>
  
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a style="color: #6c63ff;" class="dropdown-item" href="../Profile Page/index.php">Profile</a></li>
                <li><a class="dropdown-item" href="../Resume Page/index.php">My Resume</a>
                </li>
                <li><a class="dropdown-item" href="../Find Jobs/index.php">Find Job</a>
                </li>
                <li><a class="dropdown-item" href="../Saved Jobs/index.php">Saved Jobs</a>
                </li>
                <li><a class="dropdown-item" href="../Applied Jobs/index.php">Applied
                    Jobs</a></li>
                <li><a class="dropdown-item" href="../Job Alerts/index.php">Job Alerts</a>
                </li>
                <li><a class="dropdown-item" href="../Change Password/index.php">Change
                    Password</a></li>
                <li><a class="dropdown-item" href="../Logout/logout.php">Logout</a></li>
              </ul>
            </div>
          </li>
  
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
  
          <li class="nav-item">
            <a class="nav-link" href="../Find Jobs/index.php">
              <i class="fas fa-search"></i>
            </a>
          </li>
  
          <li class="nav-item">

            <a style='color: white !important;' class="nav-link btn btn-primary register-btn" href="Sign-up/sign-up.php">
            <i class="fas fa-sign-out-alt"></i>
              Logout
            </a>

          </li>
  
        </ul>
  
      </div>
    </div>
  </nav>

  <div class="container" id="text">
    <div class="card">
      <div class="card-body">
        <div class="card-title"><b>Congratulations!</b> You have finished the Test.</div>
        <form action="quiz_end.php" method="POST">
          <input type="submit" name="seeresults" class="btn btn-primary" value="See Results">
        </form>
      </div>
    </div>
  </div>
</body>

</html>