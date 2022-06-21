<?php
    session_start();

    if (!(isset($_SESSION['admin-mail']))) {
      header("Location: ../../Sign-in/sign-in.php");
    }
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
    <!-- font-awesome -->
    <script src="https://kit.fontawesome.com/41ab1a280e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="shocan.css">
    <title>Sahaj Technologies</title>
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

<div class="container" style="padding-top: 100px;">
    <div class="row">
      <div class="col-8">
      
        <div class="card">
          <div class="card-body">
      
            <div class="card-text table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Aptitude  Marks</th>
                    <th class="scope">CV Analysis Marks</th>
                    <th class="scope"></th>
                  </tr>
                </thead>
                <tbody>
      
                  <?php

                    $server = "localhost";
                    $username = "root";
                    $password = "";

                    $con = mysqli_connect($server , $username , $password);

                    if(!$con)
                    {
                        die("Connection to this database failed due to" . mysqli_connect_error());
                    }

                    $JobName = $_POST['JobName'];
    
                    $JobName = strtolower($JobName);
                    // $sql = "SELECT * FROM `test response`.`$JobName` ";

                    $sql = "SELECT *,RANK() OVER (ORDER BY `JS_TESTMARKS` + `JS_CVMARKS` DESC) `RANK` FROM `test response`.`$JobName`";

                    $result = mysqli_query($con,$sql);

                    while ($row = mysqli_fetch_array($result)) {

                      $js_fname = $row['fname'];
                      $js_lname = $row['lname']; 
                      $js_email = $row['EMAIL']; 
                      $js_testmarks = $row['JS_TESTMARKS']; 
                      $js_cvmarks = $row['JS_CVMARKS'];
                                                                              
                      echo "
                        <tr>
                          <td>".$js_fname."</td>
                          <td>".$js_lname."</td>
                          <td>".$js_email."</td>
                          <td>".$js_testmarks."</td>
                          <td>".$js_cvmarks."</td>
                          <td></td>
                        </tr>
                        ";
        
                    }                                                 
                      
                  ?>
      
                </tbody>
              </table>
            </div>
      
      
          </div>
        </div>
      
      </div>
    </div>
  </div>

</body>
</html>
