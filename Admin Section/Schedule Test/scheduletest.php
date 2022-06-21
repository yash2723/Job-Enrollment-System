<?php
session_start();

if (!(isset($_SESSION['admin-mail']))) {
  header("Location: ../../Sign-in/sign-in.php");
}
$server="localhost";
$dbuser="root";
$conn =mysqli_connect($server,$dbuser);
if(! $conn)
{
    die("could not connect".mysqli_connect_error());


}
if(isset($_POST["schedule"]))
{
$a=$_POST["ENT_Date"];
$b=new DateTime($a);
$_SESSION["date"]= $b;
//$c=$_SESSION["date"];
print_r($_SESSION);
$c=date("Y-m-d",strtotime($a));
$entid=$_POST["ENT_ID"];
$entype=$_POST["ENT_Type"];
$entmarks=$_POST["ENT_Marks"];
$entdur=$_POST["ENT_Duration"];
$x=$_POST["ENT_StartingTime"];
$y=$_POST["ENT_EndingTime"];
$starttime=date("H:i",strtotime($x));
$endtime=date("H:i",strtotime($y));


$sql="INSERT INTO `job enrollment system`.`enrollment_test_details`(`EN_TestID`,`ENT_Type`,`ENT_Marks`,`ENT_Date`,`ENT_Duration`,`ENT_StartTime`,`ENT_EndTime`) VALUES ('$entid','$entype','$entmarks','$c','$entdur','$starttime','$endtime')";
$res=mysqli_query($conn,$sql);
if($res)
{
    echo "test scheduled!";

}
$sql1="CREATE TABLE `test questions`.`$entype`(`QUES_ID` INT(6) PRIMARY KEY,`QUEST` VARCHAR(80) NOT NULL, `OPT1` VARCHAR(80) NOT NULL, `OPT2` VARCHAR(80) NOT NULL, `OPT3` VARCHAR(80) NOT NULL, `OPT4` VARCHAR(80) NOT NULL,`CORR_OPT` VARCHAR(80) NOT NULL)";
$res1=mysqli_query($conn,$sql1);
if($res1)
{
  echo "question db created";
}
else{
  echo "error".$conn->error;
}
//CREATE TABLE `YOB`(`PRID` INT(6) AUTO_INCREMENT PRIMARY KEY)
$sql2="CREATE TABLE `test response`.`$entype`(`USER_ID` INT(6) AUTO_INCREMENT UNIQUE KEY,`fname` VARCHAR(80),`lname`  VARCHAR(80),`EMAIL` VARCHAR(80) PRIMARY KEY ,`START_TIME`VARCHAR(80),`END_TIME` VARCHAR(80),`ANS_NO1` VARCHAR(80),`ANS_NO2` VARCHAR(80),`ANS_NO3` VARCHAR(80),`ANS_NO4` VARCHAR(80),`ANS_NO5` VARCHAR(80),`ANS_NO6` VARCHAR(80),`ANS_NO7` VARCHAR(80),`ANS_NO8` VARCHAR(80),`ANS_NO9` VARCHAR(80),`ANS_NO10` VARCHAR(80),`ANS_NO11` VARCHAR(80),`ANS_NO12` VARCHAR(80),`ANS_NO13` VARCHAR(80),`ANS_NO14` VARCHAR(80),`ANS_NO15` VARCHAR(80),`JS_TESTMARKS` VARCHAR(50), `JS_CVMARKS` VARCHAR(50));";
$res2=mysqli_query($conn,$sql2);
if($res2)
{
  echo "answer db created";
  header("Location: ../Manage Questions/AddQ2.php");
}
else{
  echo "ye kya tha!".$conn->error;
}

}

else
{  
  echo $conn->error;
}
mysqli_close($conn);

?>

<!doctype html>
<html>
<head>
    <title> Schedule Enrollment Test </title>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

        <!-- Optional theme -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
  
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
        <link href="AddEditStyles.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="../../index.php">
        <img src="../../images/web-logo1.png" alt="Website logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">

          <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../AdminHomePage.php">Home</a>
          </li>

          <li class="nav-item">

            <div class="dropdown">
              <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                data-bs-toggle="dropdown" aria-expanded="false">
                For Employer
              </a>

              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="../Manage Jobs/Manage_Job.php">Manage Jobs</a></li>
                <li><a class="dropdown-item" href="../Schedule Test/scheduletest.php">Schedule Test</a></li>
                <li><a class="dropdown-item" href="../Manage Questions/AddQ2.php">Manage Questions</a></li>
                <li><a class="dropdown-item" href="../Show Details/ShowDetails.php">Show Details</a></li>
              </ul>
            </div>

          </li>

          <li class="nav-item">
            <a class="nav-link" href="../../company_profiles/company_profile.html">About</a>
          </li>

          <li class="nav-item">

            <a class="nav-link btn btn-primary login-btn" href="../../JobSeeker Section/Logout/logout.php">
              <i class="fas fa-lock"></i>
              Log Out
            </a>

          </li>

        </ul>

      </div>
    </div>
  </nav>

  <div class="container">
    <div class="card fonts-google">
      <div class="card-body">
        <form action="scheduletest.php" method="POST" class="form-vertical" role="form" name="addingForm">
          <h2>Schedule Enrollment Test</h2><br>
          <div class="form-group" align="center">
              
            <p align="left">&nbsp; Enter The Enrollment Test ID : </p>
            <div class="col-sm-9">
                <input type="text" name="ENT_ID" class="form-control" autofocus>
            </div>
          </div>
          <div class="form-group" align="center">
            <p align="left">&nbsp; Enter The Enrollment Test Type : </p>
            <div class="col-sm-9">
                <input type="text" name="ENT_Type" class="form-control" autofocus>
            </div>
          </div>
          <div class="form-group" align="center">
            <p align="left">&nbsp; Enter Maximum marks in Enrollment Test : </p>
            <div class="col-sm-9">
                <input type="text" name="ENT_Marks" class="form-control" autofocus>
            </div>
        </div>
        <div class="form-group" align="center">
            <p align="left">&nbsp; Enter The Date of Enrollment Test : </p>
            <div class="col-sm-9">
                <input type="date" name="ENT_Date" class="form-control" autofocus>
            </div>
        </div>
          <div class="form-group" align="center">
              <p align="left">&nbsp; Enter The Enrollment Test Duration : </p>
              <div class="col-sm-9">
                  <input type="time" name="ENT_Duration" class="form-control" autofocus>
              </div>
            </div>
          <div class="form-group" align="center">
              <p align="left">&nbsp; Enter Enrollment Test Starting Time : </p>
              <div class="col-sm-9">
                  <input type="time" name="ENT_StartingTime" class="form-control" autofocus>
              </div>
          </div>
          <div class="form-group" align="center">
              <p align="left">&nbsp; Enter Enrollment Test Ending Time : </p>
              <div class="col-sm-9">
                  <input type="time" name="ENT_EndingTime" class="form-control" autofocus>
                  <button type="submit" class="btn btn-primary btn-block" name="schedule"id="btn-submit">Submit Details</button>

              </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>