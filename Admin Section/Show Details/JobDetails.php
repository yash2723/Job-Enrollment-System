<?php
    session_start();

    if (!(isset($_SESSION['admin-mail']))) {
      header("Location: ../../Sign-in/sign-in.php");
    }

    $server = "localhost";
    $username = "root";
    $password = "";


    $con = mysqli_connect($server , $username , $password);

    if(!$con)
    {
        // die("Connection to this database failed due to" . mysqli_connect_error());
    }

    $job_id = $_POST['JobID'];

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
    <link rel="stylesheet" href="../../JobSeeker Section/Job Details/job_details.css">
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

    <!-- </div> -->

    <!-- End Navbar Section -->


    <!-- main card -->
    <div class="container">

        <?php
            
            $query = "SELECT * FROM `job enrollment system`.`job_details` WHERE Job_ID='$job_id'";
            $data = mysqli_query($con,$query);

            while ($row = mysqli_fetch_array($data)) {

                $J_Name = $row['J_Name'];
                $J_Type = $row['J_Type'];
                $J_Designation = $row['J_Designation'];
                $J_KeySkill = $row['J_KeySkill'];
                $J_Qualification = $row['J_Qualification'];
                $J_Salary = $row['J_Salary'];
                $J_Experience = $row['J_Experience'];
                $J_Place = $row['J_Place'];
                $J_Vacancies = $row['J_Vacancies'];
                $J_Date = $row['J_Date'];
                $J_Description = $row['J_Description'];

                $arr = explode(".",$J_Description);

                echo "
                    <div class='card' id='card_main'>
                        <div class='card-img' style='margin : 10px 30px'>
                            <img src='../../JobSeeker Section/Job Details/images/".$J_Name.".png' alt='...' style='width:150px; height:150px;'>
                        </div>
                        <div class='card-body'>
                            <p class='card-title'>".$J_Name."</p>
                            <p class='card-title' id='card_llc'>For a Sahaj Technologies</p>
                            <p class='card-text'><i class='fas fa-graduation-cap'></i> &nbsp; ".$J_Qualification."</p>
                            <p class='card-text'><i class='fas fa-briefcase'></i> &nbsp; ".$J_Experience."</p>
                            <p class='card-text'><i class='fas fa-user-tie'></i> &nbsp; ".$J_KeySkill."</p>
                            <p class='card-text'><i class='fas fa-rupee-sign'></i> &nbsp; ".$J_Salary."</p>
                        </div>
                    </div>

                    <div class='card' id='card_details'>
                        <div class='card-body'>
                            <div class='card_details_title'>
                                <div class='card-title'>For a client of Sahaj Technologies - Job Details</div>
                            </div>

                            <hr>

                            <br>

                            <div class='card-text'>
                                <b>Job Summary</b>
                                <ul>
                                    <li><b>Job Type : </b> <span class='job_type'>".$J_Type."</span></li>
                                    <li><b>Job Role : </b> <span class='job_role'>".$J_Designation."</span></li>
                                    <li><b>Job Category : </b> <span class='job_category'>".$J_Name."</span></li>
                                    <li><b>Hiring Process : </b> <span class='job_type'>Face to Face Interview</span></li>
                                    <li><b>Who Can Apply : </b> <span class='job_type'>Experienced (".$J_Experience.")</span></li>
                                </ul>
                            </div>

                            <br>

                            <div class='card-text'>
                                <a href='#'><b>About for Sahaj Techonologies </b></a>
                            </div>
                                
                            <hr>
                            
                            ";
                            echo "    
                        </div>
                    </div>
                ";
            }

        ?>



    </div>
</body>

</html>