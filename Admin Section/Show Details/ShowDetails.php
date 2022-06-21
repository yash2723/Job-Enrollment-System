<?php
  session_start();

  if (!(isset($_SESSION['admin-mail']))) {
      header("Location: ../../Sign-in/sign-in.php");
  }
  
?>

<!doctype html>
<html>
<head>
	<title> Show Details </title>
	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

        <!-- Optional theme -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
  
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
		<link href="show_details_styles.css" rel="stylesheet">
</head>
<body>

    <!-- navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
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

    <!-- main section -->
	<center>
        <div class="demo">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-7">
                    <div class="menuTable">
                        <div class="menu-content fonts-google">
                            <div class="menuTable-header">
                                <h3 class="title">View <br> Questions<br>for Tests</h3>
                            </div>
                            <ul class="content-list">
                                <li>List all Job's <br> Respective Questions</li>    
                           </ul>
                            <div class="menuTable-signup">
                                <a href="viewQs.php">View</a>
                            </div>
                          </div>
                    </div>
                </div>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
               
                     <div class="col-md-5 col-sm-7">
                    <div class="menuTable blue">
                        <div class="menu-content fonts-google">
                            <div class="menuTable-header">
                                <h3 class="title">View <br> Shortlisted<br>Candidates</h3>
                            </div>
                            <ul class="content-list">
                                <li>Candidates whose score <br> is suitable for job. </li>
                                
                            </ul>
                           
                            <div class="menuTable-signup">
                                <a href="shortlist.php">View</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
    
    
                 <div class="col-md-5 col-sm-7">
                    <div class="menuTable maroon">
                        <div class="menu-content fonts-google">
                            <div class="menuTable-header">
                                <h3 class="title">View Jobseeker's Profile</h3>
                            </div>
                            <ul class="content-list">
                                <li>Display all registered <br> job seeker's Profile</li>
                                
                            </ul>
                            <div class="menuTable-signup">
                                <a href="viewProfile.php">View</a>
                            </div>
                        </div>
                    </div>
                   </div>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                     <div class="col-md-5 col-sm-7" >
                    <div class="menuTable purple">
                        <div class="menu-content fonts-google">
                            <div class="menuTable-header">
                                <h3 class="title">View <br> Posted <br>Jobs</h3>
                            </div>
                            <ul class="content-list">
                                <li>Display all posted <br> Job's by admin</li>
                            </ul>
                            <div class="menuTable-signup">
                                <a href="viewJob.php">View</a>
                            </div>
                        </div>
                    </div>
                </div>   
                     
            </div>
        </div>
    </div>
    </div>
    </center>
    </body>
    </html>
</body>
</html>