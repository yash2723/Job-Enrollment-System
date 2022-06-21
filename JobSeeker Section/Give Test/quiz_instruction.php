<?php
if(isset($_POST["accept"]))
{
    if(isset($_POST["accept_instructions"]))
{
    header("Location: quiz.php");


}
else
{
    echo "<script> alert('You must need to accept all instructions.') </script>";
}

}

?>






<!DOCTYPE html>
<html lang="en">
<head>
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
        <link rel="stylesheet" href="quiz_instruction.css">
        <script src="https://kit.fontawesome.com/3adb198dec.js" crossorigin="anonymous"></script>
        

        <title>Job Finder - Online Exam</title>
</head>
<body>
    
    <!-- Navbar Section -->
  
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
      
      <div class="container">
        <h4>Exam Instructions</h4>
        <div class="card">
          <div class="card-title">
            Instructions to use the Aptitude test portal
          </div>
          <div class="card-body">
            <div class="card-text">
              <ol>
                
                <li>Basic requirement for Online Aptitude and Personality test:</li>
                  
                  <ul>
                    <li>Laptop/Desktop/Mobile phone.</li>
                    <li>Operating System: Windows , Mac or Linux </li>
                    <li>All industry standard web browsers (Internet Explorer , Mozilla Firefox , Google Chrome , Apple Safari)</li>
                    <li>Internet speed atleast 1 MBPS.</li>
                  </ul>
                
                <li>The following actions are restricted during Test:</li>
                
                  <ul>
                    <li>New Tab</li>
                    <li>Alter + Tab</li>
                    <li>Function Key</li>
                    <li>Cut, Copy, Paste</li>
                    <li>Print Screen</li>
                    <li>Alter + F4</li>
                    <li>Ctrl + any other key and Shift + any other key.</li>
                  </ul>

                <li>If the Applicant is found performing unfair means, his/her test shall be terminated at the same time.</li>

              </ol>
            </div>
          </div>
        </div>
        <div class="card" id="accept_instru">
            <form action="quiz_instruction.php" method="POST">
          <input type="checkbox" name="accept_instructions" id="accept_instructions" value="I Accept to Abide All Instructions">  I Accept to Abide All Instructions
          <br>
          <input type="submit" name="accept" id="accept_instru" class="btn btn-primary" value="start">
            </form>
        </div>
      </div>

      <div class="container-fluid" id="footer">
        Developed With ❤ By Sahaj Technologies.
      </div>
</body>
</html>