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
      die("Connection to this database failed due to" . mysqli_connect_error());
  }
  // echo "Success connecting to the db";

?>




<!doctype html>
<html>
<head>
	<title> View Posted Jobs </title>
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
		<link href="shocan.css" rel="stylesheet">
</head>
<body>

<!-- navigation bar -->
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

  <!-- main page -->

  <div class="container" style="padding-top: 100px;">
    <div class="row">
      <div class="col-8">
      
        <div class="card">
          <div class="card-body">
      
            <div class="card-title">
              <h3>
                <?php
                  $query = "SELECT * FROM `job enrollment system`.`job_details`";
                  $data = mysqli_query($con,$query);
                  $total = mysqli_num_rows($data);
                  echo $total; 
                ?>
                Jobs
              </h3>
              
            </div>
      
            <div class="separator"></div>
      
            <div class="card-text table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Job ID</th>
                    <th scope="col">Job Name</th>
                    <th scope="col">Job Type</th>
                    <th scope="col">Job Designation</th>
                    <th class="scope"></th>
                    <th class="scope"></th>
                  </tr>
                </thead>
                <tbody>
      
                  <?php
                      
                    $sql = "SELECT * FROM `job enrollment system`.`job_details` ";

                    $result = mysqli_query($con,$sql);

                    while ($row = mysqli_fetch_array($result)) {

                      $j_id = $row['Job_Id'];
                      $j_name = $row['J_Name']; 
                      $j_type = $row['J_Type']; 
                      $j_desgnation = $row['J_Designation']; 
                                                                              
                      echo "
                        <tr>
                          <td>".$j_id."</td>
                          <td>".$j_name."</td>
                          <td>".$j_type."</td>
                          <td>".$j_desgnation."</td>
                          <td>
                            <form method='post' action='shortlist_algo.php'>
                              <input type='hidden' name='JobName' value='".$j_name."'>
                              <button type='submit' class='btn' name='details-btn'> 
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-square-fill' viewBox='0 0 16 16'>
                                  <path d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z'/>
                                </svg> 
                              </button>
                            </form>
                          </td>
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