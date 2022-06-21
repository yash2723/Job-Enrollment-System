<?php
session_start();

if (!(isset($_SESSION['admin-mail']))) {
  header("Location: ../../Sign-in/sign-in.php");
}

$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server, $username, $password);

if (!$con) {
    die("Connection to this database failed due to" . mysqli_connect_error());
}
// echo "Success connecting to the db";

$C_Email = $_POST['C_Email'];

?>


<!doctype html>
<html>

<head>
    <title> Candidate Profile </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional theme -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="canprofile.css" rel="stylesheet">
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


    <!-- main profile section -->

    <?php

    $sql = "SELECT * FROM `job enrollment system`.`jobseeker_personal_details` WHERE JS_EmailID='$C_Email' ";

    $result = mysqli_query($con, $sql);

    $row = mysqli_fetch_array($result);
    $col1 = $row['JS_Name'];
    $col2 = $row['JS_Profession'];
    $col3 = $row['JS_Language'];
    $col4 = $row['JS_Age'];
    $col5 = $row['JS_Csalary'];
    $col6 = $row['JS_Esalary'];
    $col7 = $row['JS_Description'];
    $col8 = $row['JS_Phone'];
    $col9 = $row['JS_Email'];
    $col10 = $row['JS_Country'];
    $col11 = $row['JS_Postcode'];
    $col12 = $row['JS_City'];
    $col13 = $row['JS_Address'];
    $col14 = $row['JS_ProfileImg_name'];
    $col15 = $row['JS_ProfileImg_type'];
    $col16 = $row['JS_ProfileImg_size'];

    echo "
                <div class='container emp-profile'>
                    <form method='post'>
                        <div class='row'>
                            <div class='col-md-4'>
                                <div class='profile-img'>
                                    <img src='../../JobSeeker Section/Profile Page/upload/" . $col14 . "'
                                    alt='https://cdnd.et-origin.citrix.com/set_resources_4/84c1e40ea0e759e3f1505eb1788ddf3c_default_photo.png' />
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class='profile-head'>
                                    <h4>
                                        " . $col1 . "
                                    </h4>
                                    <h5>
                                        " . $col2 . "
                                    </h5>
                                    <!-- <p class='proile-rating'>RANKINGS : <span>#</span></p> -->

                                    <br>
                                    <br>
                                    <ul class='nav nav-tabs' id='myTab' role='tablist'>
                                        <li class='nav-item'>
                                            <a class='nav-link active' id='home-tab' data-toggle='tab' href='#home' role='tab' aria-controls='home' aria-selected='true'>About</a>
                                        </li>
                                        <li class='nav-item'>
                                            <a class='nav-link' id='profile-tab' data-toggle='tab' href='#profile' role='tab' aria-controls='profile' aria-selected='false'>Timeline</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class='row'>
                            <div class='col-md-4'>
                                <div class='profile-work' style='visibility: hidden;'>
                                    <p>WORK LINK</p>
                                    <a href='#'>Website Link</a><br />
                                    <a href='#'>CV Link</a><br />
                                    <a href='#'>Linkedin Profile</a>
                                    <p>SKILLS</p>
                                    <a href='#'>Web Designer</a><br />
                                    <a href='#'>Web Developer</a><br />
                                    <a href='#'>Software Developer</a><br />

                                </div>
                            </div>
                            <div class='col-md-8'>
                                <div class='tab-content profile-tab' id='myTabContent'>
                                    <div class='tab-pane fade show active' id='home' role='tabpanel' aria-labelledby='home-tab'>
                                        <div class='row'>
                                            <div class='col-md-6' style='font-family: 'poppins', serif'>
                                                <label>Name :</label>
                                            </div>
                                            <div class='col-md-6'>
                                                <p>" . $col1 . "</p>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-md-6' style='font-family: 'poppins', serif'>
                                                <label>Age :</label>
                                            </div>
                                            <div class='col-md-6'>
                                                <p>" . $col4 . "</p>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-md-6' style='font-family: 'poppins', serif'>
                                                <label>Email :</label>
                                            </div>
                                            <div class='col-md-6'>
                                                <p>" . $C_Email . "</p>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-md-6' style='font-family: 'poppins', serif'>
                                                <label>Phone :</label>
                                            </div>
                                            <div class='col-md-6'>
                                                <p>" . $col8 . "</p>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-md-6' style='font-family: 'poppins', serif'>
                                                <label>Profession :</label>
                                            </div>
                                            <div class='col-md-6'>
                                                <p>" . $col2 . "</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='tab-pane fade' id='profile' role='tabpanel' aria-labelledby='profile-tab'>
                                        <div class='row'>
                                            <div class='col-md-6' style='font-family: 'poppins', serif'>
                                                <label>Experience :</label>
                                            </div>
                                            <div class='col-md-6'>
                                                <p>Beginner</p>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-md-6' style='font-family: 'poppins', serif'>
                                                <label>Aptitude Test :</label>
                                            </div>
                                            <div class='col-md-6'>
                                                <p>#</p>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-md-6' style='font-family: 'poppins', serif'>
                                                <label>Total Projects :</label>
                                            </div>
                                            <div class='col-md-6'>
                                                <p>5</p>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-md-6' style='font-family: 'poppins', serif'>
                                                <label>Personality Test :</label>
                                            </div>
                                            <div class='col-md-6'>
                                                <p>#</p>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-md-6' style='font-family: 'poppins', serif'>
                                                <label>Job Type :</label>
                                            </div>
                                            <div class='col-md-6'>
                                                <p>6 months</p>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-md-12'>
                                                <label>Your Bio</label><br />
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <form method='post'>
                                <input type='hidden' name='C_Email' value=".$C_Email.">
                                <button style=' margin: auto; margin-top: 20px; width: 80%;' type='submit' class='btn btn-primary' name='details-btn' formaction='ShowCV.php'> 
                                    Show CV
                                </button>
                            </form>
                        </div>
                    </form>
                </div>
            ";

            
    ?>

</body>

</html>